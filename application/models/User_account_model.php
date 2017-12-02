<?php


class User_account_model extends CORE_Model {

    protected  $table="user_accounts";
    protected  $pk_id="user_id";

    function __construct() {
        parent::__construct();
    }




 function authenticate_user($uname,$pword){
        $this->db->select('ua.user_id,ua.user_fname,ua.branch_id,ua.user_group_id,ug.user_group,ua.user_photo,ua.user_email,CONCAT_WS(" ",ua.user_fname,ua.user_mname,ua.user_lname) as user_fullname');
        $this->db->from('user_accounts as ua');
        $this->db->join('user_groups as ug', 'ua.user_group_id = ug.user_group_id','left');
        $this->db->join('branches as b', 'ua.branch_id = b.branch_id','left');
        $this->db->where('ua.user_name', $uname);
        $this->db->where('ua.password', sha1($pword));
        $this->db->where('ua.is_active', true);
        return $this->db->get();

    }



    public function create_default_users(){

        $sql="INSERT INTO user_accounts(user_id,user_name,password,user_email,user_lname,user_fname,user_mname,user_bdate,branch_id,user_group_id,user_address,is_active,is_deleted)
                VALUES('1','admin',sha1('admin'),'nexuslifeline@gmail.com','Lifeline','Nexus','','2016-01-01',1,1,'Pampanga, Philippines',1,0)

                ON DUPLICATE KEY UPDATE

                user_accounts.user_group_id=1,
                user_accounts.is_active=1,
                user_accounts.is_deleted=0

            ";
        $this->db->query($sql);
    }









}


?>