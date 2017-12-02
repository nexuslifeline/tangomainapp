<?php


class Item_model extends CORE_Model {

    protected  $table="items";
    protected  $pk_id="item_id";

    function __construct() {
        parent::__construct();
    }

    public function create_default_item_tickets(){
        $sql="INSERT IGNORE INTO items(item_id,item_code,item_name,category_id,required_points_redeem,acquired_points_reward)
                VALUES(1,'T1','1 TICKET',1,0,0),
                      (2,'T2','2 TICKET',1,0,0),
                      (3,'T3','3 TICKET',1,0,0),
                      (4,'T4','4 TICKET',1,0,0),
                      (5,'T5','5 TICKET',1,0,0),
                      (6,'T6','6 TICKET',1,0,0),
                      (7,'T7','7 TICKET',1,0,0),
                      (8,'T8','8 TICKET',1,0,0),
                      (9,'T9','9 TICKET',1,0,0),
                      (10,'T10','10 TICKET',1,0,0)

            ";


        $this->db->query($sql);
    }



}


?>