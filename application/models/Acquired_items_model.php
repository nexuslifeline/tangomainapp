<?php

class Acquired_items_model extends CORE_Model {
    protected  $table="acquire_points_items";
    protected  $pk_id="acquire_item_id";
    protected  $fk_id="txn_acquired_id";

    function __construct() {
        parent::__construct();
    }





}



?>