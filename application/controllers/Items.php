<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'Item_model',
                'Category_model'
            )
        );

    }

    public function index() {


        $data['other_js_dependencies']=array(
            'assets/plugins/select2/select2.full.min.js'
        );

        $data['other_css_dependencies']=array(
            'assets/plugins/select2/select2.min.css'
        );



        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);

        $data['title']='Item Management';
        $data['categories']=$this->Category_model->get_list(array('categories.is_active'=>TRUE,'categories.is_deleted'=>FALSE));

        $this->load->view('items_view',$data);

    }


    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_item=$this->Item_model;
                $item_code=$this->input->post('item_code',TRUE);

                //validate if code already in database
                $code_exist=$m_item->get_list(array('items.is_active'=>TRUE,'items.is_deleted'=>FALSE,'items.item_code'=>$item_code));
                if(count($code_exist)>0){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, item code already exists. Please enter new item code.';
                    echo json_encode($response);
                    exit;
                }


                $m_item->begin();

                $m_item->item_code=$item_code;
                $m_item->item_name=$this->input->post('item_name',TRUE);
                $m_item->category_id=$this->input->post('category_id',TRUE);
                $m_item->required_points_redeem=$this->get_numeric_value($this->input->post('required_points_redeem',TRUE));
                $m_item->acquired_points_reward=$this->get_numeric_value($this->input->post('acquired_points_reward',TRUE));


                //auditing purposes
                $m_item->set('date_created','NOW()');
                $m_item->created_by_user=$this->session->user_id; //the user current session id
                $m_item->save();

                $item_id=$m_item->last_insert_id();
                $m_item->commit();



                if($m_item->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Item successfully registered.';
                    $response['row_added']=$this->get_response_rows($item_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_item=$this->Item_model;
                $item_id=$this->input->post('item_id',TRUE);

                $m_item->begin();

                $m_item->item_code=$this->input->post('item_code',TRUE);
                $m_item->item_name=$this->input->post('item_name',TRUE);
                $m_item->category_id=$this->input->post('category_id',TRUE);
                $m_item->required_points_redeem=$this->get_numeric_value($this->input->post('required_points_redeem',TRUE));
                $m_item->acquired_points_reward=$this->get_numeric_value($this->input->post('acquired_points_reward',TRUE));

                //auditing purposes
                $m_item->set('date_modified','NOW()');
                $m_item->modified_by_user=$this->session->user_id; //the user current session id
                $m_item->modify($item_id);

                $m_item->commit();



                if($m_item->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Item successfully updated.';
                    $response['row_updated']=$this->get_response_rows($item_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;

            case 'delete':
            
                $m_item=$this->Item_model;
                $item_id=$this->input->post('item_id',TRUE);
                $m_item->begin();

                $m_item->is_deleted=1;
                $m_item->set('date_deleted','NOW()');
                $m_item->deleted_by_user=1;
                $m_item->modify($item_id);
                $m_item->modify($item_id);

                $m_item->commit();

                if($m_item->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Item successfully deleted.';
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
        $m_item=$this->Item_model;

        return  $m_item->get_list(

            'items.is_active=TRUE AND items.is_deleted=FALSE '.($id==null?'':' AND items.item_id='.$id),

            array(
                'items.*',
                'c.cat_name'
            ),

            array(
                array('categories as c','c.category_id=items.category_id','left')
            )

        );

    }






}
