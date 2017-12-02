<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_points extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

            $this->load->model(
                array(
                    'Item_model',
                    'Acquired_model',
                    'Acquired_items_model',
                    'Redeem_model',
                    'Redeem_items_model',
                    'Customer_model',
                    'Birthday_reward'
                )
            );

    }

    public function index() {

        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['top_menu']=$this->load->view('template/top_menu_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);
        $data['title']='Reward Points';


        $data['menu_items']=$this->Item_model->get_list('items.is_deleted=0 AND items.is_active=1',null,null,null,null,TRUE,10);
        $data['items']=$this->Item_model->get_list(

                   null
                , //no id filter
                array(
                           'items.item_id',
                           'items.item_code',
                           'items.item_name',
                           'items.category_id',
                           'FORMAT(items.required_points_redeem,2)as required_points_redeem',
                           'FORMAT(items.acquired_points_reward,2)as acquired_points_reward'
                         
                ),
                array(
                    // parameter (table to join(left) , the reference field)
                    array('categories','items.category_id=categories.category_id','left')

                )

            );
        $this->load->view('record_points_view',$data);


    }




    function transaction($txn = null,$id_filter=null) {
            switch ($txn){
                case 'list':  //this returns JSON of Purchase Order to be rendered on Datatable
                    $m_acquired=$this->Acquired_model;
                    $response['data']=$this->row_response(
                        array(
                            
                        )
                    );
                    echo json_encode($response);
                    break;


        
                case 'items': //items on the specific PO, loads when edit button is called
                    $m_items=$this->Acquired_items_model;

                    $response['data']=$m_items->get_list(
                        array('txn_acquired_id'=>$id_filter),
                        array(
                            'acquire_points_items.*',
                            'items.item_id',
                            'items.item_name'
                        ),
                        array(
                            array('items','items.item_id=acquire_points_items.item_id','left')
                        ),
                        'acquire_points_items.item_id DESC'
                    );


                    echo json_encode($response);
                    break;


                case 'items-list': //items on the specific PO, loads when edit button is called
                    $m_items=$this->Item_model;
                    
                    $response['data']=$m_items->get_list(
                        array(
                            'items.is_deleted'=>0,
                            'items.is_active'=>1
                        ),
                        array(
                            'items.*'
                        ),
                        array(
                            array('categories as c','items.category_id=c.category_id','left')
                        ),
                        'items.item_id DESC'
                    );


                    echo json_encode($response);
                    break;





          
                case 'create':
                    $m_acquired=$this->Acquired_model;
                    $m_customers=$this->Customer_model;


                    $card_code=$this->input->post('card_code',TRUE);
                    $customers=$m_customers->get_list(
                        "is_active=1 AND is_deleted=0 AND card_id=(SELECT card_id FROM cards WHERE card_code='".$card_code."')",
                        array(
                            'customers.customer_id'
                        )
                    );

                    if(count($customers)==0){
                        $response['title'] = 'Invalid Code!';
                        $response['stat'] = 'error';
                        $response['msg'] = 'Sorry, card code is invalid! Please make sure card is already issued and activated.';
                        die(json_encode($response));
                    }


                    //validate card if already issued to customer
                    if(count($customers)==0){
                        $response['title'] = 'Invalid!';
                        $response['stat'] = 'error';
                        $response['msg'] = 'Invalid Card Identification! Please make sure card is activated.';

                        die(json_encode($response));
                    }

                    $customer_id=$customers[0]->customer_id;

                    
                    $m_acquired->begin();

                    $m_acquired->set('date_created','NOW()'); //treat NOW() as function and not string
                    $m_acquired->created_by_user=$this->session->user_id;
                    $m_acquired->customer_id=$customer_id;
                    $m_acquired->total_points_acquired=$this->get_numeric_value($this->input->post('summary_total_pts',TRUE));

                    $m_acquired->save();
                    $txn_acquired_id=$m_acquired->last_insert_id();

                    $m_acquired->acq_txn_no='ACQ-000000'.$txn_acquired_id;
                    $m_acquired->modify($txn_acquired_id);


                    $m_acq_items=$this->Acquired_items_model;
                    $item_id=$this->input->post('item_id',TRUE);
                    $item_qty=$this->input->post('item_qty',TRUE);

                    $item_points=$this->input->post('acquired_points',TRUE);
                    $acquired_points=$this->input->post('pt_line_total',TRUE);
                

                    for($i=0;$i<count($item_id);$i++){

                        $m_acq_items->txn_acquired_id=$txn_acquired_id;
                        $m_acq_items->item_id=$item_id[$i];
                        $m_acq_items->item_qty=$item_qty[$i];

                        $m_acq_items->points_each=$this->get_numeric_value($item_points[$i]);
                        $m_acq_items->acquired_points=$this->get_numeric_value($acquired_points[$i]);


                        $m_acq_items->save();
                    }


                    $acquired_points=$m_acquired->get_list(
                        array(
                            'acquire_points_info.customer_id'=>$customer_id
                        ),
                        array(
                            'IFNULL(SUM(acquire_points_info.total_points_acquired),0)as total_points_acquired'
                        )
                    );

                    $total_points_acquired=$acquired_points[0]->total_points_acquired;


                    $m_redeem=$this->Redeem_model;
                    $redeem_points=$m_redeem->get_list(
                        array(
                            'redeem_info.customer_id'=>$customer_id
                        ),
                        array(
                            'IFNULL(SUM(redeem_info.total_points_redeem),0)as total_points_redeem'
                        )
                    );

                    $m_rewards=$this->Birthday_reward;
                    $reward_points=$m_rewards->get_list(
                        array(
                            'birthday_rewards.customer_id'=>$customer_id
                        ),
                        array(
                            'IFNULL(SUM(birthday_rewards.reward_points),0)as total_reward_points'
                        )
                    );

                    $total_points_redeem=$redeem_points[0]->total_points_redeem;

                    $total_points_acquired=$acquired_points[0]->total_points_acquired;

                    $total_rewards_point=$reward_points[0]->total_reward_points;

                    //update points of current member
                    $m_customers->total_earn_pts=$total_points_acquired;
                    $m_customers->current_pts=$total_points_acquired-$total_points_redeem+$total_rewards_point;
                    $m_customers->modify($customer_id);



                    $m_acquired->commit();



                    if($m_acquired->status()===TRUE){
                        $response['title'] = 'Success!';
                        $response['stat'] = 'success';
                        $response['msg'] = 'Point successfully Recorded!.';

                        $response['row_added'] = $this->row_response($txn_acquired_id);

                        echo json_encode($response);
                    }


                    break;

            


            

            }

    }









 function row_response($filter_value){
        return $this->Acquired_model->get_list(
            $filter_value,
            array(
            'acquire_points_info.*',
            'crd.*',
            'CONCAT_WS(" ",c.cus_fname,c.cus_lname)as customer_name',
            'CONCAT_WS(" ",ua.user_fname,ua.user_lname)as user_fullname'
            ),
            array(
                 array('user_accounts as ua','acquire_points_info.created_by_user=ua.user_id','left'),
                 array('customers as c','acquire_points_info.customer_id=c.customer_id','left'),
                 array('cards as crd','c.card_id=crd.card_id','left'), 
            )
        );
    }











}
