<?php


class Customer_model extends CORE_Model {

    protected  $table="customers";
    protected  $pk_id="customer_id";

    function __construct() {
        parent::__construct();
    }


    public function get_upgrade_candidate_list(){
        $sql="SELECT m.*,(mt.member_type) as member_type_upgrade
                FROM

                (SELECT

                c.customer_id,ca.card_id,ca.card_code,
                CONCAT_WS(' ',c.cus_fname,c.cus_mname,c.cus_lname)as member,
                c.total_earn_pts,

                IFNULL(c.member_type_id,0) as member_type_current_id,
                mt.member_type as member_type_current,


                IFNULL((

                SELECT mt.member_type_id
                FROM membership_type as mt WHERE c.total_earn_pts>=mt.required_points
                ORDER BY mt.required_points DESC LIMIT 1

                ),0) as member_type_upgrade_id


                FROM customers as c
                INNER JOIN cards as ca ON ca.card_id=c.card_id
                LEFT JOIN membership_type as mt ON c.member_type_id=mt.member_type_id) as m

                LEFT JOIN membership_type as mt ON mt.member_type_id=m.member_type_upgrade_id
                WHERE m.member_type_upgrade_id<>m.member_type_current_id AND m.member_type_upgrade_id>0";

        return $this->db->query($sql)->result();
    }



}


?>