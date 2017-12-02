<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memberships extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'Customer_model',
                'Card_model'
            )
        );

    }

    public function index() {

        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);
        $data['title']='Membership Registration';

        $this->load->view('membership_view',$data);

    }


    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_member=$this->Customer_model;
                $m_card=$this->Card_model;


                $cards=$m_card->get_list(
                    array(
                        'cards.card_code'=>$this->input->post('card_code',TRUE),
                        'cards.is_activated'=>FALSE
                    ),
                    array(
                        'cards.card_id'
                    )
                );

                //validate card
                if(count($cards)==0){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Card is not available. Please make sure card is not yet issued and registered on the database.';
                    echo json_encode($response);
                    exit;
                }

                //validate email if already in used




                $m_member->begin();

                $card_id=$cards[0]->card_id;

                $m_member->card_id=$card_id;
                $m_member->cus_fname=$this->input->post('cus_fname',TRUE);
                $m_member->cus_lname=$this->input->post('cus_lname',TRUE);
                $m_member->cus_mname=$this->input->post('cus_mname',TRUE);
                $m_member->cus_email=$this->input->post('cus_email',TRUE);

                if($this->input->post('memberships',TRUE)){
                    $m_member->member_type_id=$this->input->post('memberships',TRUE);
                }

                $m_member->cus_mobile_no=$this->input->post('cus_mobile_no',TRUE);
                $m_member->cus_bdate=date('Y-m-d',strtotime($this->input->post('cus_bdate',TRUE)));

                //member default account
                $m_member->cus_username=$this->input->post('cus_email',TRUE);
                $m_member->cus_password=sha1(date('Y',strtotime($this->input->post('cus_bdate',TRUE))));


                //auditing purposes
                $m_member->set('date_created','NOW()');
                $m_member->created_by_user=$this->session->user_id; //the user current session id
                $m_member->save();

                $member_id=$m_member->last_insert_id();

                //update card status
                $m_card->is_activated=1;
                $m_card->activated_by_user=$this->session->user_id; ////the user current session id
                $m_card->set('date_activated','NOW()');
                $m_card->modify($card_id);



                $m_member->commit();



                if($m_member->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Membership card successfully activated.';
                    $response['row_added']=$this->get_response_rows($member_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_member=$this->Customer_model;
                $member_id=$this->input->post('member_id',TRUE);

                $m_member->begin();
                $m_member->cus_fname=$this->input->post('cus_fname',TRUE);
                $m_member->cus_lname=$this->input->post('cus_lname',TRUE);
                $m_member->cus_mname=$this->input->post('cus_mname',TRUE);
                $m_member->cus_email=$this->input->post('cus_email',TRUE);

                if($this->input->post('memberships',TRUE)){
                    $m_member->member_type_id=$this->input->post('memberships',TRUE);
                }

                $m_member->cus_address=$this->input->post('cus_address',TRUE);
                $m_member->cus_telephone=$this->input->post('cus_telephone',TRUE);
                $m_member->cus_mobile_no=$this->input->post('cus_mobile_no',TRUE);
                $m_member->cus_bdate=date('Y-m-d',strtotime($this->input->post('cus_bdate',TRUE)));

                //auditing purposes
                $m_member->set('date_modified','NOW()');
                $m_member->modified_by_user=$this->session->user_id; //the user current session id
                $m_member->modify($member_id);

                $m_member->commit();



                if($m_member->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Member info successfully updated.';
                    $response['row_updated']=$this->get_response_rows($member_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'delete':
                $m_member=$this->Customer_model;
                $m_card=$this->Card_model;

                $member_id=$this->input->post('member_id',TRUE);
                $card_id=$this->input->post('card_id',TRUE);

                $m_member->begin();

                $m_member->is_deleted=1;
                $m_member->set('date_deleted','NOW()');
                $m_member->deleted_by_user=1;
                $m_member->modify($member_id);

                //make sure to update status of the card
                $m_card->is_activated=0;
                $m_card->modify($card_id);

                $m_member->commit();

                if($m_member->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Membership card successfully deleted.';
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong. Please try again later.';
                }

                echo json_encode($response);

                break;



        }
    }




    private function get_response_rows($id=null){
        $m_member=$this->Customer_model;

        return  $m_member->get_list(

            //send the parameter for filtering
            'customers.is_active=TRUE AND customers.is_deleted=FALSE'.($id==null?'':' AND customers.customer_id='.$id),

            //send array parameter for fields required
            array(
                'customers.*',
                'c.card_code',
                'c.description',
                'c.date_activated',
                'customers.date_created as date_issued',
                'DATE_FORMAT(customers.cus_bdate,"%m/%d/%Y")as cus_bdate',
                'CONCAT_WS(" ",customers.cus_fname,customers.cus_mname,customers.cus_lname) as member_name',
                'CONCAT_WS(" ",ua.user_fname,ua.user_lname) as activated_by',
                'IFNULL(mt.member_type,"") as member_type'
            ),

            //send parameter for the table joins
            array(
                array('cards as c','c.card_id=customers.card_id','left'),
                array('user_accounts as ua','ua.user_id=customers.created_by_user','left'),
                array('membership_type as mt','mt.member_type_id=customers.member_type_id','left')
            )

        );

    }






}
