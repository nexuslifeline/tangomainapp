<?php

class User_group_right_model extends CORE_Model{

    protected  $table="user_group_rights"; //table name
    protected  $pk_id="user_rights_id"; //primary key id
    protected  $fk_id="user_group_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    public function create_default_administrator_rights(){

        $sql="INSERT IGNORE INTO user_group_rights(user_rights_id,user_group_id,link_code,is_default)
                SELECT link_id,1,link_code,0 FROM rights_links
            ";
        $this->db->query($sql);
    }


    function get_user_group_rights($user_group_id){
        $sql="SELECT rl.link_code,rl.link_name,rl.controller_name,
            IF(ISNULL(ugr.link_code),0,1)as is_allowed,
            ugr.is_default
            FROM rights_links as rl

            LEFT JOIN


            (SELECT x.link_code,x.is_default FROM user_group_rights as x WHERE x.user_group_id=$user_group_id)as ugr


            ON rl.link_code=ugr.link_code";
        return $this->db->query($sql)->result();
    }





    function get_default_user($user_group_id){
        $sql="SELECT * FROM user_group_rights  as ugr
        INNER JOIN rights_links  as rl ON
        ugr.link_code = rl.link_code
        WHERE ugr.user_group_id =$user_group_id AND ugr.is_default = 1 ";
        return $this->db->query($sql)->result();
    }






}




?>