<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rewards extends CORE_Controller
{

    function __construct() {
        parent::__construct('');



        $this->load->model(
            array(
                'Reward_preference_model',
                'Customer_model',
                'Birthday_reward'
            )
        );

    }

    public function index() {

        //date_default_timezone_set('Pacific/Guam');
        date_default_timezone_set('Asia/Manila');
        echo date('m/d/Y h:i')." - Philippines<br />";


        date_default_timezone_set('Pacific/Guam');
        echo date('m/d/Y h:i')." - Guam";


    }


    public  function transaction($txn=null){
        switch($txn){
            case 'send-points':
                $m_reward=$this->Reward_preference_model;

                $reward_info=$m_reward->get_list(
                    array('is_reward_enabled'=>1)
                );

                echo "<b>In reference of Current Server Time : </b><br /><br />";
                date_default_timezone_set('Asia/Manila');
                echo date('m/d/Y h:i')." - Philippines<br />";
                date_default_timezone_set('Pacific/Guam');
                echo date('m/d/Y h:i')." - Guam<br />";

                //first check if auto reward is enabled
                if(count($reward_info)>0){ //if true, auto reward is enabled
                    $points=$reward_info[0]->reward_points;
                    $m_bday_rewards=$this->Birthday_reward;

                    //get list of member that have birthdays
                    $m_members=$this->Customer_model;
                    $current_year=date('Y');
                    $current_date=date('d');
                    $current_month=date('m');




                    $celebrants=$m_members->get_list(
                        " cus_bdate LIKE '%-".$current_month."-".$current_date."' AND customer_id NOT IN (SELECT customer_id FROM birthday_rewards WHERE is_active=1 AND is_approved=1 AND bday_year=".$current_year.")"
                    );

                    //loop to each celebrants
                    //MUST BE OPTIMIZE!!!
                    foreach($celebrants as $celebrant){

                        $m_bday_rewards->customer_id=$celebrant->customer_id;
                        $m_bday_rewards->reward_points=$points;
                        $m_bday_rewards->bday_year=$current_year;
                        $m_bday_rewards->bday_day=$current_date;
                        $m_bday_rewards->bday_month=$current_month;
                        $m_bday_rewards->save();

                        //email each celebrant
                        $m_members->set('total_earn_pts','total_earn_pts+'.$points);
                        $m_members->set('current_pts','current_pts+'.$points);
                        $m_members->modify($celebrant->customer_id);


                    }


                }



                break;
        }
    }















}
