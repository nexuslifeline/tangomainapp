<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

            $this->load->model(
            array(
                'User_account_model',
                'User_group_model',
                'Category_model',
                'Branch_model',
                'Item_model',
                'Rights_link_model',
                'User_group_right_model'
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


        $this->Category_model->create_default_categories();
		$this->Item_model->create_default_item_tickets();
        $this->Rights_link_model->create_default_link_list();
        $this->User_group_model->create_default_user_group();
        $this->User_group_right_model->create_default_administrator_rights();
        $this->User_account_model->create_default_users();


       
        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);
        $data['title']='Loyal Points Management System';

        $this->load->view('login_view',$data);

    }



  
 function transaction($txn=null){

        switch($txn){

                //****************************************************************************
                case 'validate' :
            $user_name=$this->input->post('user_name');
            $password=$this->input->post('password');

            $m_user_account=$this->User_account_model;
            $result=$m_user_account->authenticate_user($user_name,$password);

                    if($result->num_rows()>0){//valid username and pword
                        

                      
                        $m_rights=$this->User_group_right_model;
                        $rights=$m_rights->get_list(
                            array(
                                'user_group_rights.user_group_id'=>$result->row()->user_group_id
                            ),
                            'user_group_rights.link_code'
                        );

                        $user_rights=array();
                        $parent_links=array();
                        foreach($rights as $right){
                            $main=explode('-',$right->link_code);
                            $user_rights[]=$right->link_code;
                            $parent_links[]=$main[0];
                        }
                       


                        $controller_name = $m_rights->get_default_user($result->row()->user_group_id);



                        if (count($controller_name)>0) {
                            $location = $controller_name[0]->controller_name;
                        }else{
                            if($result->row()->user_group_id){ //if admin
                                $location="Memberships";
                            }else{
                                $location = 'Profile';
                            }
                        }




                        //set session data here and response data
                        $this->session->set_userdata(
                            array(
                                'user_id'=>$result->row()->user_id,
                                'user_group_id'=>$result->row()->user_group_id,
                                'user_group'=>$result->row()->user_group,
                                'branch_id'=>$result->row()->branch_id,
                                'user_fullname'=>$result->row()->user_fullname,
                                'user_email'=>$result->row()->user_email,
                                'user_photo'=>$result->row()->user_photo,
                               'user_rights'=>$user_rights,
                               'parent_rights'=>$parent_links
                            )
                        );

                        $response['location'] = $location;
                        $response['title']='Success';
                        $response['stat']='success';
                        $response['msg']='User successfully authenticated.';

                        echo json_encode($response);

                    }else{ //not valid

                        $response['stat']='error';
                        $response['msg']='Invalid username or password.';
                        echo json_encode($response);

                    }

                    break;
                //****************************************************************************
                case 'logout' :
                    $this->end_session();
                //****************************************************************************


                break;

                default:


        }




    }


     

}
