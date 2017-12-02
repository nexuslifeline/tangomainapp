<?php

class Rights_link_model extends CORE_Model{

    protected  $table="rights_links"; //table name
    protected  $pk_id="link_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function create_default_link_list(){
        $sql="INSERT IGNORE INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`,`controller_name`) VALUES
                                          (1,'1','1-1','Admin Dashboard','Dashboard'),
                                          (2,'2','2-1','Activate Card','Memberships'),
                                          (3,'2','2-2','Record Points','Record_points'),
                                          (4,'2','2-3','Redeem Points','Redeem_points'),
                                          (13,'2','2-4','Upgrade Membership','Member_upgrade'),
                                          (5,'3','3-1','Card Enlistment','Cards'),
                                          (6,'3','3-2','Item Masterlist','Items'),
                                          (7,'3','3-3','Category Masterlist','Categories'),
                                          (8,'4','4-1','Register User','Users'),
                                          (9,'4','4-2','Create User Rights','User_groups'),
                                          (10,'4','4-3','Create Branch','Branch'),
                                          (11,'4','4-4','User Profile','Profile'),
                                          (12,'4','4-5','Setup Member Types','Membership_types'),
                                          (14,'4','4-6','Setup Advertisement Images','System_setup'),
                                          (15,'4','4-7','Reward Preference','Dashboard')
                                        
            ";


        $this->db->query($sql);
    }



}




?>