<?php


class Category_model extends CORE_Model {

    protected  $table="categories";
    protected  $pk_id="category_id";

    function __construct() {
        parent::__construct();
    }


    public function create_default_categories(){

        $sql="INSERT IGNORE INTO categories(category_id,cat_name,cat_description)
                VALUES('1','Tickets','Tickets'),
                ('2','Store Items','Store Items')
            ";
        $this->db->query($sql);
    }

}


?>