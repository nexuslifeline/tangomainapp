<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_upgrade extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'Customer_model',
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

        $data['other_css_dependencies']=array('assets/plugins/select2/select2.min.css');
        $data['other_js_dependencies']=array('assets/plugins/select2/select2.full.min.js');

        $data['title']='Pending Membership Upgrade';
        $data['memberships']=$this->Membership_type_model->get_list();


        $this->load->view('member_upgrade_view',$data);

    }


    public  function transaction($txn=null){
        switch($txn){
            case 'upgrade-candidate-list':

                $m_customers=$this->Customer_model;
                $response['data']=$m_customers->get_upgrade_candidate_list();
                echo json_encode($response);

                break;

            case 'upgrade':
                $m_customers=$this->Customer_model;

                $member_id=$this->input->post('member_id',TRUE);
                $upgrade_id=$this->input->post('upgrade_id',TRUE);

                $m_customers->member_type_id=$upgrade_id;
                $m_customers->modify($member_id);


                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Member successfully upgraded.';
                echo json_encode($response);

                break;


        }
    }





}
