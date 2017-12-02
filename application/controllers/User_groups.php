<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_groups extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'User_group_model',
                 'User_group_right_model'
            )
        );

    }

    public function index() {

        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);

        $data['title']='User group and permission';
        $this->load->view('user_group_view',$data);

    }


    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_group=$this->User_group_model;

                $m_group->begin();

                $m_group->user_group=$this->input->post('user_group',TRUE);
                $m_group->access_description=$this->input->post('access_description',TRUE);


                //auditing purposes
                $m_group->set('date_created','NOW()');
                $m_group->created_by_user=$this->session->user_id;//the user current session id
                $m_group->save();

                $user_group_id=$m_group->last_insert_id();
                $m_group->commit();



                if($m_group->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User Group successfully registered.';
                    $response['row_added']=$this->get_response_rows($user_group_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_group=$this->User_group_model;
                $user_group_id=$this->input->post('user_group_id',TRUE);

                $m_group->begin();

                $m_group->user_group=$this->input->post('user_group',TRUE);
                $m_group->access_description=$this->input->post('access_description',TRUE);


                //auditing purposes
                $m_group->set('date_modified','NOW()');
                $m_group->modified_by_user=$this->session->user_id; //the user current session id
                $m_group->modify($user_group_id);

                $m_group->commit();



                if($m_group->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User Group successfully updated.';
                    $response['row_updated']=$this->get_response_rows($user_group_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;

            case 'delete':
                $m_group=$this->User_group_model;
                $user_group_id=$this->input->post('user_group_id',TRUE);



                $m_group->begin();

                $m_group->is_deleted=1;
                $m_group->set('date_deleted','NOW()');
                $m_group->deleted_by_user=1;
                $m_group->modify($user_group_id);
                $m_group->modify($user_group_id);

                $m_group->commit();

                if($m_group->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User Group successfully deleted.';
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong. Please try again later.';
                }

                echo json_encode($response);

                break;

            case 'save-rights':
                $m_rights=$this->User_group_right_model;
                $id=$this->input->post('user_group_id',TRUE);


                $m_rights->delete_via_fk($id);

                $link_code=$this->input->post('link_code',TRUE);

                    $code = $this->input->post('is_default',TRUE);
                 
                    
                  
                foreach($link_code as $link){
                    if($link!="0"){
      
                    if($link==$code){
                        $a = 1;
                        }else{
                        $a = 0;
                    }
                        $m_rights->user_group_id=$id;
                        $m_rights->link_code=$link;
                        $m_rights->is_default=$a;
                        $m_rights->save();

                       
                    }
                }


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'User rights successfully saved.';
                echo json_encode($response);
                break;

        }
    }




    private function get_response_rows($id=null){
        $m_group=$this->User_group_model;

        return  $m_group->get_list(

            'user_groups.is_active=TRUE AND user_groups.is_deleted=FALSE '.($id==null?'':' AND user_groups.user_group_id='.$id),

            array(
                'user_groups.*',
                'user_groups.is_active as status',
                'CONCAT_WS(" ",ua.user_fname,ua.user_lname)as created_by_user'
            ),

            array(
                array('user_accounts as ua','ua.user_id=user_groups.created_by_user','left')
            )

        );

    }







}
