<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_setup extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'System_model',
                'Reward_preference_model'
            )
        );

    }

    public function index() {

        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);




        $data['advertisements']=$this->System_model->get_list(array('advertisements.is_deleted'=>FALSE));


        $data['title']='Advertisement Setup';

        $this->load->view('system_view',$data);

    }


  
    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;


            case 'get-reward-preference':
                $m_preference=$this->Reward_preference_model;
                echo json_encode($m_preference->get_list(
                   null
                ));
                break;
            case 'reward-preference':
                $m_preference=$this->Reward_preference_model;
                $m_preference->delete('preference_id>0');

                $m_preference->is_reward_enabled=$this->input->post('auto_points',TRUE);
                $m_preference->reward_points=$this->get_numeric_value($this->input->post('send_points',TRUE));
                $m_preference->greetings=$this->input->post('greetings',TRUE);
                $m_preference->save();


                $response['title']='Save!';
                $response['stat']='success';
                $response['msg']='Preference successfully saved!';
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
                        $directory='assets/images/ads/';
                        $m_advertisements=$this->System_model;

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

                                //i love you gelyn!
                                $m_advertisements->images=$file_path;
                                $m_advertisements->save();

                                $id=$m_advertisements->last_insert_id();

                                $response['title']='Success!';
                                $response['stat']='success';
                                $response['msg']='Advertisement photo successfully uploaded.';

                                $response['path']=$file_path;
                                $response['advertisement_id']=$id;

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



            case 'set-active':
                $advertisement_id=$this->input->post('advertisement_id');
                $m_advertisements=$this->System_model;
                $m_advertisements->is_active=1;
                $m_advertisements->modify($advertisement_id);

                $response['title']='Success!';
                $response['stat']='info';
                $response['msg']='Advertisement photo successfully mark as active.';
                echo json_encode($response);

                break;

            case 'set-inactive':
                $advertisement_id=$this->input->post('advertisement_id');
                $m_advertisements=$this->System_model;
                $m_advertisements->is_active=0;
                $m_advertisements->modify($advertisement_id);

                $response['title']='Success!';
                $response['stat']='info';
                $response['msg']='Advertisement photo successfully mark as inactive.';
                echo json_encode($response);

                break;

            case 'delete-advertisement':
                $advertisement_id=$this->input->post('advertisement_id');
                $m_advertisements=$this->System_model;
                $m_advertisements->is_deleted=1;
                $m_advertisements->modify($advertisement_id);


                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Advertisement photo successfully deleted.';
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
