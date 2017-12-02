<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'Branch_model'
            )
        );

    }

    public function index() {

        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);

        $data['title']='Branch Management';

        $this->load->view('branch_view',$data);

    }


    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_branch=$this->Branch_model;

                $m_branch->begin();

                $m_branch->branch_name=$this->input->post('branch_name',TRUE);
                $m_branch->branch_address=$this->input->post('branch_address',TRUE);
                $m_branch->contact_person=$this->input->post('contact_person',TRUE);
                $m_branch->branch_landline=$this->input->post('branch_landline',TRUE);
                $m_branch->branch_mobile_no=$this->input->post('branch_mobile_no',TRUE);
                $m_branch->branch_id=$this->input->post('branch_id',TRUE);

                //auditing purposes
                $m_branch->set('date_created','NOW()');
                $m_branch->created_by_user=$this->session->user_id; //the user current session id
                $m_branch->save();

                $branch_id=$m_branch->last_insert_id();
                $m_branch->commit();



                if($m_branch->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Branch successfully registered.';
                    $response['row_added']=$this->get_response_rows($branch_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_branch=$this->Branch_model;
                $branch_id=$this->input->post('branch_id',TRUE);

                $m_branch->begin();

                $m_branch->branch_name=$this->input->post('branch_name',TRUE);
                $m_branch->branch_address=$this->input->post('branch_address',TRUE);
                $m_branch->contact_person=$this->input->post('contact_person',TRUE);
                $m_branch->branch_landline=$this->input->post('branch_landline',TRUE);
                $m_branch->branch_mobile_no=$this->input->post('branch_mobile_no',TRUE);
                $m_branch->branch_id=$this->input->post('branch_id',TRUE);

                //auditing purposes
                $m_branch->set('date_modified','NOW()');
                $m_branch->modified_by_user=$this->session->user_id; //the user current session id
                $m_branch->modify($branch_id);

                $m_branch->commit();



                if($m_branch->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Branch successfully updated.';
                    $response['row_updated']=$this->get_response_rows($branch_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;

            case 'delete':
                $m_branch=$this->Branch_model;
                $branch_id=$this->input->post('branch_id',TRUE);



                $m_branch->begin();

                $m_branch->is_deleted=1;
                $m_branch->set('date_deleted','NOW()');
                $m_branch->deleted_by_user=1;
                $m_branch->modify($branch_id);
                $m_branch->modify($branch_id);

                $m_branch->commit();

                if($m_branch->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Branch successfully deleted.';
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
        $m_branch=$this->Branch_model;

        return  $m_branch->get_list(

            'branches.is_active=TRUE AND branches.is_deleted=FALSE '.($id==null?'':' AND branches.branch_id='.$id),

            array(
                'branches.*'
            )

        );

    }






}
