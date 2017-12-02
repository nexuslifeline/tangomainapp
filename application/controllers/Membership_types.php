<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_types extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'Membership_type_model'
            )
        );

    }

    public function index() {



        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);

        $data['title']='Membership Type Management';

        $this->load->view('membership_type_view',$data);

    }


    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_type=$this->Membership_type_model;

                $m_type->begin();

                $m_type->member_type=$this->input->post('member_type',TRUE);
                $m_type->member_description=$this->input->post('member_description',TRUE);
                $m_type->required_points=$this->get_numeric_value($this->input->post('required_points',TRUE));


                //auditing purposes
                $m_type->set('date_created','NOW()');
                $m_type->created_by_user=$this->session->user_id; //the user current session id
                $m_type->save();

                $member_type_id=$m_type->last_insert_id();
                $m_type->commit();



                if($m_type->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Membership type successfully created.';
                    $response['row_added']=$this->get_response_rows($member_type_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_type=$this->Membership_type_model;
                $member_type_id=$this->input->post('member_type_id',TRUE);

                $m_type->begin();

                $m_type->member_type=$this->input->post('member_type',TRUE);
                $m_type->member_description=$this->input->post('member_description',TRUE);
                $m_type->required_points=$this->get_numeric_value($this->input->post('required_points',TRUE));

                //auditing purposes
                $m_type->set('date_modified','NOW()');
                $m_type->modified_by_user=$this->session->user_id; //the user current session id
                $m_type->modify($member_type_id);

                $m_type->commit();



                if($m_type->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Membership type successfully updated.';
                    $response['row_updated']=$this->get_response_rows($member_type_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;

            case 'delete':
                $m_type=$this->Membership_type_model;
                $member_type_id=$this->input->post('member_type_id',TRUE);



                $m_type->begin();

                $m_type->is_deleted=1;
                $m_type->set('date_deleted','NOW()');
                $m_type->deleted_by_user=1;
                $m_type->modify($member_type_id);
                $m_type->modify($member_type_id);

                $m_type->commit();

                if($m_type->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Membership type successfully deleted.';
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
        $m_type=$this->Membership_type_model;

        return  $m_type->get_list(

            'membership_type.is_active=TRUE AND membership_type.is_deleted=FALSE '.($id==null?'':' AND membership_type.member_type_id='.$id),

            array(
                'membership_type.*',
                'membership_type.is_active as status'
            )

        );

    }






}
