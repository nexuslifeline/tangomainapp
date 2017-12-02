<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CORE_Controller
{

    function __construct() {
        parent::__construct('');



        $this->load->model(
            array(
                'User_account_model',
                'User_group_model',
                'Branch_model'
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
        $data['title']='User Registration';

        $data['user_groups']=$this->User_group_model->get_list(array('user_groups.is_active'=>TRUE,'user_groups.is_deleted'=>FALSE));
        $data['branches']=$this->Branch_model->get_list(array('branches.is_active'=>TRUE,'branches.is_deleted'=>FALSE));

        $this->load->view('users_view',$data);

    }



    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_user_account=$this->User_account_model;
                $user_email=$this->input->post('user_email',TRUE);


                if($this->input->post('user_email')==null){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, Invalid email address!';
                    echo json_encode($response);
                    exit;
                }


                if($this->input->post('password')==null){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, Invalid user password!';
                    echo json_encode($response);
                    exit;
                }


                if($this->input->post('c_password')!=$this->input->post('password')){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, Password did not match!';
                    echo json_encode($response);
                    exit;
                }


                //validate if user_email is already registered
                $user_email_exists=$m_user_account->get_list(array('user_accounts.is_active'=>TRUE,'user_accounts.is_deleted'=>FALSE,'user_accounts.user_email'=>$user_email));

                if(count($user_email_exists)>0){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, This email is already in use.';
                    echo json_encode($response);
                    exit;
                }

                //validate if username is already registered

                
                $user_name=$this->input->post('user_name',TRUE);
                $user_name_exists=$m_user_account->get_list(array('user_accounts.is_active'=>TRUE,'user_accounts.is_deleted'=>FALSE,'user_accounts.user_name'=>$user_name));
                
                if(count($user_name_exists)>0){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, This username is already in use.';
                    echo json_encode($response);
                    exit;
                }


            $m_user_account->begin();


            $m_user_account->user_name=$this->input->post('user_name',TRUE);
            $m_user_account->password=sha1($this->input->post('password',TRUE));
            $m_user_account->user_email=$this->input->post('user_email',TRUE);
            $m_user_account->user_fname=$this->input->post('user_fname',TRUE);
            $m_user_account->user_lname=$this->input->post('user_lname',TRUE);
            $m_user_account->user_mname=$this->input->post('user_mname',TRUE);
            $m_user_account->user_bdate=date('Y-m-d',strtotime($this->input->post('user_bdate',TRUE)));
            //auditing purposes

            $m_user_account->branch_id=$this->input->post('branch_id',TRUE);
            $m_user_account->user_group_id=$this->input->post('user_group_id',TRUE);
            $m_user_account->user_address=$this->input->post('user_address',TRUE);
            $m_user_account->user_mobile=$this->input->post('user_mobile',TRUE);
            $m_user_account->user_photo=$this->input->post('user_photo',TRUE);
            $m_user_account->set('date_created','NOW()');

            $m_user_account->save();
            $user_id=$m_user_account->last_insert_id();
            $m_user_account->commit();



                if($m_user_account->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User successfully registered.';
                    $response['row_added']=$this->get_response_rows($user_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_user_account=$this->User_account_model;
                $user_id=$this->input->post('user_id',TRUE);

                if($this->input->post('password')!=null){ //if password is provide, user wanted to update the password so it must be validated
                    if($this->input->post('c_password')!=$this->input->post('password')){
                        $response['title']='Error!';
                        $response['stat']='error';
                        $response['msg']='Sorry, Password did not match!';
                        echo json_encode($response);
                        exit;
                    }
                }


                $m_user_account->begin();
                $m_user_account->user_name=$this->input->post('user_name',TRUE);

                if($this->input->post('password')!=null){ //if not provided, do not updated password
                    $m_user_account->password=sha1($this->input->post('password',TRUE));
                }

                $m_user_account->user_email=$this->input->post('user_email',TRUE);
                $m_user_account->user_fname=$this->input->post('user_fname',TRUE);
                $m_user_account->user_lname=$this->input->post('user_lname',TRUE);
                $m_user_account->user_mname=$this->input->post('user_mname',TRUE);
                $m_user_account->user_bdate=date('Y-m-d',strtotime($this->input->post('user_bdate',TRUE)));
                //auditing purposes

                $m_user_account->branch_id=$this->input->post('branch_id',TRUE);
                $m_user_account->user_group_id=$this->input->post('user_group_id',TRUE);
                $m_user_account->user_address=$this->input->post('user_address',TRUE);
                $m_user_account->user_mobile=$this->input->post('user_mobile',TRUE);
                $m_user_account->user_photo=$this->input->post('user_photo',TRUE);



                //auditing purposes
                $m_user_account->set('date_modified','NOW()');
                $m_user_account->modified_by_user=$this->session->user_id; //the user current session id
                $m_user_account->modify($user_id);

                $m_user_account->commit();



                if($m_user_account->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User information successfully updated.';
                    $response['row_updated']=$this->get_response_rows($user_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;

            case 'delete':
                $m_user_account=$this->User_account_model;
                $user_id=$this->input->post('user_id',TRUE);
                $m_user_account->begin();
                $m_user_account->is_deleted=1;
                $m_user_account->set('date_modified','NOW()');
                $m_user_account->modified_by_user=1;
                $m_user_account->modify($user_id);
                //make sure to update status of the user
                $m_user_account->is_active=0;
                $m_user_account->modify($user_id);
                $m_user_account->commit();

                if($m_user_account->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User information successfully deleted.';
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong. Please try again later.';
                }

                echo json_encode($response);

                break;








   case 'upload':
                $allowed = array('png', 'jpg', 'jpeg','bmp');

                $data=array();
                $files=array();
                $directory='assets/images/user/';

                foreach($_FILES as $file){

                    $server_file_name=uniqid('');
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_path=$directory.$server_file_name.'.'.$extension;
                    $orig_file_name=$file['name'];

                    if(!in_array(strtolower($extension), $allowed)){
                        $response['title']='Invalid!';
                        $response['stat']='error';
                        $response['msg']='Image is invalid. Please select a valid photo!';
                        die(json_encode($response));
                    }

                    if(move_uploaded_file($file['tmp_name'],$file_path)){
                        $response['title']='Success!';
                        $response['stat']='success';
                        $response['msg']='Image successfully uploaded.';
                        $response['path']=$file_path;
                        echo json_encode($response);
                    }
                }
                break;
            case 'update-profile' :
                $m_users=$this->User_account_model;

                $user_account_id=$this->session->user_id;

                $m_users->user_name=$this->input->post('user_name',TRUE);

                if($this->input->post('password',TRUE)!=null){
                    $m_users->password=sha1($this->input->post('password',TRUE));
                }

                $m_users->user_lname=$this->input->post('user_lname',TRUE);
                $m_users->user_fname=$this->input->post('user_fname',TRUE);
                $m_users->user_mname=$this->input->post('user_mname',TRUE);
                $m_users->user_address=$this->input->post('user_address',TRUE);
                $m_users->user_email=$this->input->post('user_email',TRUE);
                $m_users->user_mobile=$this->input->post('user_mobile',TRUE);
                
                $m_users->user_bdate=date('Y-m-d',strtotime($this->input->post('user_bdate',TRUE)));
                //$m_users->user_group_id=$this->input->post('user_group_id',TRUE);
                $m_users->user_photo=$this->input->post('user_photo');

                $m_users->set('date_modified','NOW()');
                $m_users->modified_by_user=$this->session->user_id;
                $m_users->modify($user_account_id);


                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Profile successfully updated.';

                echo json_encode($response);

                break;

























        }
    }









  






      private  function get_response_rows($id=null){
        $m_user_account=$this->User_account_model;

        return  $m_user_account->get_list(

            //send the parameter for filtering
            'user_accounts.is_active=TRUE AND user_accounts.is_deleted=FALSE'.($id==null?'':' AND user_accounts.user_id='.$id),

            //send array parameter for fields required
            array(
                'user_accounts.*',
                'ug.user_group',
                'b.branch_name',
                'DATE_FORMAT(user_accounts.user_bdate,"%m/%d/%Y")as user_bdate',
                'CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_mname,user_accounts.user_lname) as user_fullname'
            ),

             //send parameter for the table joins
              array(
                array('user_groups as ug','user_accounts.user_group_id=ug.user_group_id','left'),
                array('branches as b','user_accounts.branch_id=b.branch_id','left')
            )
        );

    }


}
