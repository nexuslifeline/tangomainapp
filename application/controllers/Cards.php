<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cards extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        //$this->validate_session(); //validate session

        $this->load->model(
            array(
                'Card_model',
                'Branch_model'
            )
        );

    }

    public function index() {
        //select 2 plugin
        $data['other_js_dependencies']=array(
            'assets/plugins/select2/select2.full.min.js'
        );

        $data['other_css_dependencies']=array(
            'assets/plugins/select2/select2.min.css'
        );//select 2 plugin


        $data['js_dependencies']=$this->load->view('template/js_scripts','',TRUE);
        $data['css_dependencies']=$this->load->view('template/css_files','',TRUE);
        $data['profile_header']=$this->load->view('template/profile_header_view','',TRUE);
        $data['sidebar']=$this->load->view('template/sidebar_view','',TRUE);
        $data['loading']=$this->load->view('template/loading_view','',TRUE);

        $data['title']='Card Enlistment';
        $data['branches']=$this->Branch_model->get_list(array('branches.is_active'=>TRUE,'branches.is_deleted'=>FALSE));

        $this->load->view('cards_view',$data);

    }


    public function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data']=$this->get_response_rows();
                echo json_encode($response);
                break;

            case 'create':
                $m_card=$this->Card_model;
                $card_code=$this->input->post('card_code',TRUE);

                //validate if card is already registered
                $card_exists=$m_card->get_list(array('cards.is_active'=>TRUE,'cards.is_deleted'=>FALSE,'cards.card_code'=>$card_code));
                if(count($card_exists)>0){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, this card is already registered.';
                    echo json_encode($response);
                    exit;
                }



                $m_card->begin();

                $m_card->card_code=$this->input->post('card_code',TRUE);
                $m_card->description=$this->input->post('description',TRUE);
                $m_card->remarks=$this->input->post('remarks',TRUE);
                $m_card->date_received=date('Y-m-d',strtotime($this->input->post('date_received',TRUE)));

                //auditing purposes
                $m_card->set('date_created','NOW()');
                $m_card->created_by_user=$this->session->user_id; //the user current session id
                $m_card->save();

                $card_id=$m_card->last_insert_id();
                $m_card->commit();



                if($m_card->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Card successfully enlisted.';
                    $response['row_added']=$this->get_response_rows($card_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;


            case 'update':
                $m_card=$this->Card_model;
                $card_id=$this->input->post('card_id',TRUE);

                $m_card->begin();
                $m_card->card_code=$this->input->post('card_code',TRUE);
                $m_card->description=$this->input->post('description',TRUE);
                $m_card->remarks=$this->input->post('remarks',TRUE);
                $m_card->date_received=date('Y-m-d',strtotime($this->input->post('date_received',TRUE)));

                //auditing purposes
                $m_card->set('date_modified','NOW()');
                $m_card->modified_by_user=$this->session->user_id; //the user current session id
                $m_card->modify($card_id);

                $m_card->commit();



                if($m_card->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Card information successfully updated.';
                    $response['row_updated']=$this->get_response_rows($card_id);
                }else{
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Something went wrong! Please try again.';
                }

                echo json_encode($response);

                break;

            case 'delete':
                $m_card=$this->Card_model;
                $card_id=$this->input->post('card_id',TRUE);

                //validate if card is already activated, it cannot be deleted
                $card_activated=$m_card->get_list(array('cards.is_activated'=>TRUE,'cards.card_id'=>$card_id));
                if(count($card_activated)>0){
                    $response['title']='Error!';
                    $response['stat']='error';
                    $response['msg']='Sorry, this card is already activated and cannot be deleted anymore.';
                    echo json_encode($response);
                    exit;
                }

                $m_card->begin();

                $m_card->is_deleted=1;
                $m_card->set('date_deleted','NOW()');
                $m_card->deleted_by_user=1;
                $m_card->modify($card_id);

                //make sure to update status of the card
                $m_card->is_activated=0;
                $m_card->modify($card_id);

                $m_card->commit();

                if($m_card->status()===TRUE){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Card information successfully deleted.';
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
        $m_card=$this->Card_model;

        return  $m_card->get_list(

            'cards.is_active=TRUE AND cards.is_deleted=FALSE '.($id==null?'':' AND cards.card_id='.$id),

            array(
                'cards.*',
                'cards.is_activated as status',
                'DATE_FORMAT(cards.date_received,"%m/%d/%Y")as date_received',
                'CONCAT_WS(" ",ua.user_fname,ua.user_lname) as registered_by'
            ),

            array(
                array('user_accounts as ua','ua.user_id=cards.created_by_user','left')
            )


        );

    }






}
