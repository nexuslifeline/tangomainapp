<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'Category_model'
            )
        );

    }

      public function index() {

        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);

        $data['title']='Categories';

        $this->load->view('categories_view',$data);

    }



    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_item=$this->Category_model;

                $m_item->begin();

                $m_item->cat_name=$this->input->post('cat_name',TRUE);
                $m_item->cat_description=$this->input->post('cat_description',TRUE);


                //auditing purposes
                $m_item->set('date_created','NOW()');
                $m_item->created_by_user=$this->session->user_id; //the user current session id
                $m_item->save();

                $category_id=$m_item->last_insert_id();
                $m_item->commit();



                if($m_item->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Category successfully created.';
                    $response['row_added']=$this->get_response_rows($category_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_item=$this->Category_model;
                $category_id=$this->input->post('category_id',TRUE);

                $m_item->begin();

                $m_item->cat_name=$this->input->post('cat_name',TRUE);
                $m_item->cat_description=$this->input->post('cat_description',TRUE);

                //auditing purposes
                $m_item->set('date_modified','NOW()');
                $m_item->modified_by_user=$this->session->user_id; //the user current session id
                $m_item->modify($category_id);

                $m_item->commit();



                if($m_item->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Category successfully updated.';
                    $response['row_updated']=$this->get_response_rows($category_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;

            case 'delete':
                $m_item=$this->Category_model;
                $category_id=$this->input->post('category_id',TRUE);



                $m_item->begin();

                $m_item->is_deleted=1;
                $m_item->set('date_deleted','NOW()');
                $m_item->deleted_by_user=1;
                $m_item->modify($category_id);
                $m_item->modify($category_id);

                $m_item->commit();

                if($m_item->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Category successfully deleted.';
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
        $m_item=$this->Category_model;

        return  $m_item->get_list(

            'categories.is_active=TRUE AND categories.is_deleted=FALSE '.($id==null?'':' AND categories.category_id='.$id),

            array(
                'categories.*',
                'categories.is_active as status',
                'CONCAT_WS(" ",ua.user_fname,ua.user_lname) as created_by_user'
            ),

            array(
                array('user_accounts as ua','ua.user_id=categories.created_by_user','left')
            )

        );

    }






}
