<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dual_screen extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        $this->load->model('System_model');


    }

    public function index() {

        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);

        $data['title']='';

        $data['advertisements']=$this->System_model->get_list(array('advertisements.is_active'=>TRUE,'advertisements.is_deleted'=>FALSE));
        $this->load->view('dual_screen_view',$data);

    }




}
