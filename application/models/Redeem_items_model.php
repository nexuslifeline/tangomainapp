<?php

class Redeem_items_model extends CORE_Model {
    protected  $table="redeem_items";
    protected  $pk_id="redeem_item_id";
    protected  $fk_id="txn_redeem_id";

    function __construct() {
        parent::__construct();
    }





}



?>