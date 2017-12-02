<?php


class User_group_model extends CORE_Model {

    protected  $table="user_groups";
    protected  $pk_id="user_group_id";

    function __construct() {
        parent::__construct();
    }

    public function create_default_user_group(){

        $sql="INSERT IGNORE INTO user_groups(user_group_id,user_group,access_description)
                VALUES('1','System Administrator','Can access all features.')
            ";
        $this->db->query($sql);
    }


}


?>