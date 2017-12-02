<!DOCTYPE html>
<html  lang="en">

<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}

        .toolbar{
            float: left;
        }

        .control-label{
            font-family: tahoma;
            font-weight: normal;
        }

        .select2-container{
            min-width: 100%;
        }


        .login-background {
            background: #d5f2fe; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(top, #feffff, #00bca4); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(top, #feffff, #00bca4); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(top, #feffff, #00bca4); /* For Firefox 3.6 to 15 */
            background: linear-gradient(top, #feffff, #00bca4); /* Standard syntax */
        }







    </style>


    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title> <?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <?php echo $css_dependencies; ?>

    <?php if(isset($other_css_dependencies)>0){ ?>
        <?php foreach($other_css_dependencies as $css){ ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
        <?php } ?>
    <?php } ?>




</head>


<body class="login-background">
<div id="sb-site">

<?php echo $loading; ?>

<div id="page-wrapper">

    <?php echo $profile_header; ?>


    <div id="page-content-wrapper" style="font-family: tahoma;padding: 1%;"><br />


        <div class="row">
            <div class="col-lg-12">
                <div class="content-box pad20A " style="border: 3px solid #00bca4;background-color: #ebfefc">
                    <div class="ribbon">
                        <div class="bg-primary">Menus</div>
                    </div>

                    <div style="padding-left: 4%;padding-top: 0%;padding-bottom: 0%;">

                        <?php echo $top_menu; ?>


                    </div>



                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-9">

                <div class="panel" style="border:4px solid #03aa98;">

                    <div class="panel-body" style="min-height: 640px;background-color: #ebfefc;">
                        <!--<div class="row">
                            <div class="input-group" style="border:2px solid #06ac9b;border-radius: 6px;">
                                <input type="text" class="form-control">
                                <div class="input-group-btn" style="">
                                    <button id="btn_browse_item" type="button" class="btn btn-default" tabindex="-1" style="border:1px solid #06ac9b;">
                                        <i class="glyph-icon icon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
            -->
                        <br />

                        <div class="row">
                            <div class="panel" style="border: 4px solid #03aa98;">

                                <div class="panel-heading" style="border-bottom: 3px solid #03aa98;background-color: #00bca4;">
                                    <h4 class="panel-title">

                                        <span style="font-family: tahoma;font-size: small;" class="font-white">
                                            <b><i class="glyph-icon icon-star"></i> Reward Points</b>
                                        </span>


                                        <span class="pull-right font-white" style="font-family: tahoma;font-size: small;">
                                            <i class="glyph-icon icon-area-chart"></i> Total Reward Points : <b><span id="span_total_points" class="font-white">0.00</span></b>
                                        </span>

                                    </h4>
                                </div>

                                <div class="panel-body"  style="min-height: 400px;padding: 1px;max-height: 400px;overflow: auto;background-color: #ebfefc">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br />


                                        <form id="frm_items">
                                            <div class="table-responsive">
                                                <table id="tbl_items" style="overflow: scroll;" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-font:tahoma;">
                                                    <thead>
                                                    <tr>

                                                        <th width="10%">Qty</th>
                                                        <th >Description</th>
                                                        <th width="12%" style="text-align: right">Reward</th>
                                                        <th width="12%" style="text-align: right">Total</th>
                                                        <td style="display: none;">Item ID</td><!-- product id -->
                                                        <th width="5%"><center>Action</center></th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5" style="height: 50px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" style="text-align: right;"><strong><i class="glyph-icon icon-star"></i> Total Reward Points :</strong></td>
                                                            <td align="right" colspan="2" id="cell_total" color="red"><b>0.00</b></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="panel border-black">
                                <div class="panel-body"  style="padding: 10px;">

                                    <button id="btn_view_history" class="btn btn-primary  btn-link font-white"><b>View Transaction History</b></button>

                                    <button id="btn_search_item" class="btn btn-primary btn-link font-white"><b>Search Item / Products</b></button>

                                    <button id="btn_search_member" class="btn btn-primary btn-link font-white"><b>Search Member Record</b></button>

                                    <div class="pull-right">
                                    <button id="btn_clear_items" style="width: 220px;" class="btn btn-border btn-alt border-red btn-link font-red"><b>Clear Items on List</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>


            <div class="col-lg-3">

                <div class="panel" style="border:4px solid #03aa98;">

                    <div class="panel-heading" style="border-bottom: 4px solid #00bca4;background-color:#00bca4; ">
                        <h4 class="panel-title">
                             <span style="font-family: tahoma;font-size: small;" class="font-white">
                                            <b><i class="glyph-icon icon-cubes"></i> Ticket Packages</b>
                             </span>
                        </h4>
                    </div>


                    <div class="panel-body" style="min-height: 600px;background-color: #ebfefc;">

                        <?php for($i=0;$i<=count($menu_items)-1;$i++){ ?>
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <a href="#" data-item-id="<?php echo $menu_items[$i]->item_id; ?>" data-item-name="<?php echo $menu_items[$i]->item_name; ?>" data-item-points="<?php echo $menu_items[$i]->acquired_points_reward; ?>" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-primary tile_box_menu">

                                    <div class="tile-header">
                                       <b><?php echo $menu_items[$i]->item_name; ?></b>
                                    </div>

                                    <div class="tile-content-wrapper">
                                        <i class="glyph-icon icon-file"></i>
                                    </div>
                                </a>
                            </div>


                        <?php } ?>



                        <div class="row">
                            <button id="btn_continue_card_activation" type="button" class="btn btn-primary col-lg-12" style="height: 40px;"><i class="glyph-icon icon-check-circle-o"></i> <b>QR Code Scan or Enter Card #</b></button>
                        </div>

                            <br />
                        <div class="row">
                              <button id="btn_camera_scanner" type="button" class="btn btn-warning col-lg-12" style="height: 40px;"><i class="glyph-icon icon-check-circle-o"></i> <b>Scan using Camera >></b></button>
                        </div>

                    </div>
                </div>


            </div>
        </div>



    </div>
</div>



<div class="modal fade" id="modal_card_activation" style="margin-top: 10%;" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Card Identification</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">



                <div class="panel">
                    <div class="panel-body">

                        <div class="example-box-wrapper">
                            <label>Please scan the Card : </label><br />
                            <div>
                                <input style="" id="txt_card_code" name="card_code" type="text" class="form-control">
                            </div>
                            
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">



            </div>
        </div>
    </div>
</div><!--modal card activation-->





<div class="modal fade" id="modal_camera_scanner" style="margin-top: 10%;" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Card Identification</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">



                <div class="panel">
                    <div class="panel-body">

                        <div class="example-box-wrapper">
                            <label>Please scan the Card : </label><br />
                            <div>
                                <input  readonly="  " id="camera_card_code" name="card_code" type="text" class="form-control">
                            </div>
                            <?php include('qr_view/index.html');?>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">


             <button id="confirm_qr_data" type="button" class="btn btn-success"><i class="glyph-icon icon-check-circle-o"></i> Proceed</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>         




            </div>
        </div>
    </div>
</div><!--modal card activation-->










<div class="modal fade" id="modal_item_list" style="margin-top: 10%;" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Item Enlisment</b></h4>

            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">
                <div class="panel">
                    <div class="panel-body">

                        <table id="tbl_items_enlistment" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-font:tahoma;">
                            <thead>
                            <tr>

                                <th width="15%" >Item #</th>
                                <th width="50%" >Item Name</th>
                                <th width="30%"  style="text-align: right">Points</th>

                                <th  width="5%"><center>Action</center></th>

                            </tr>
                            </thead>
                            <tbody>


                            </tbody>


                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div><!--modal item list-->





<div class="modal fade" id="modal_history" style="margin-top: 10%;" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Transaction History</b></h4>

            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">
                <div class="panel">
                    <div class="panel-body">

                        <table id="tbl_history" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th>Tnx #</th>
                                <th>Card #</th>
                                <th>Customer Name </th>
                                <th>Total Pts.</th>
                                <th>Process By</th>
                                <th>Tnx Date</th>

                            </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div><!--modal item list-->


<div class="modal fade" id="modal_member_enlistment" style="margin-top: 10%;" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Member Details</b></h4>

            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">
                <div class="panel">
                    <div class="panel-body">

                        <table id="tbl_member_enlistment" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th>Card Code #</th>
                                <th>Customer Name </th>
                                <th>Current Pts.</th>
                                <th>Total Pts.</th>
                               

                            </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div><!--modal member list-->





<?php echo $js_dependencies; ?>

<?php if(isset($other_js_dependencies)>0){ ?>
    <?php foreach($other_js_dependencies as $js){ ?>
        <script type="text/javascript" src="<?php echo $js; ?>"></script>
    <?php } ?>
<?php } ?>


<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

<script>
    $(document).ready(function(){



        var oItemEnlistment; var oTableHistory; var dualDisplayHandle; var flagInactive=true;

        var oTableItems={

            qty : 'td:eq(0)',
            acquired_points_reward : 'td:eq(2)',
            total : 'td:eq(3)',
            item_id : 'td:eq(4)'

        };


        var initializeControls=function(){
            oItemEnlistment=$('#tbl_items_enlistment').DataTable({
                        "dom": '<"toolbar">frtip',
                        "bLengthChange":false,
                        "iDisplayLength" : 5,
                        "ajax" : "Record_points/transaction/items-list/",
                        "columns": [

                            { targets:[0],data: "item_code" },
                            { targets:[1],data: "item_name" },
                            { targets:[2],data: "acquired_points_reward" },
                            {
                                targets:[3],
                                render: function (data, type, full, meta){
                                    return '<button type="button" name="add_item" class="btn btn-success"><i class="fa fa-plus"></i></button>';
                                }
                            }

                        ],

                        "createdRow": function ( row, data, index ) {
                            $('td:eq(0)', row).attr("width","15%;");
                            $('td:eq(1)', row).attr("width","65%;");
                            $('td:eq(2)', row).attr("width","15%;");
                            $('td:eq(2)', row).attr("width","5%;");

                            $('td:eq(2)', row).attr("style","text-align:right;");
                            $('td:eq(3)', row).attr("style","text-align:center;");


                        }
                    });



                    oTableHistory=$('#tbl_history').DataTable({
                        "dom": '<"toolbar">frtip',
                        "bLengthChange":false,
                        "iDisplayLength" : 5,
                        "ajax" : "Record_points/transaction/list",
                        "columns": [

                            { targets:[1],data: "acq_txn_no" },
                            { targets:[2],data: "card_code" },
                            { targets:[3],data: "customer_name" },
                            { targets:[4],data: "total_points_acquired" },
                            { targets:[5],data: "user_fullname" },
                            
                            { targets:[6],data: "date_created" }
                        ]
                    });


                    oTableMember_enlistment=$('#tbl_member_enlistment').DataTable({
                        "dom": '<"toolbar">frtip',
                        "bLengthChange":false,
                        "iDisplayLength" : 5,
                        "ajax" : "Memberships/transaction/list",
                        "columns": [

                            { targets:[1],data: "card_code" },
                            { targets:[2],data: "member_name" },
                            { targets:[3],data: "current_pts" },
                            { targets:[4],data: "total_earn_pts" }
                        ]
                    });



        }();



        var bindEventHandlers=function(){

            $('#btn_dual_display').click(function(){
                dualDisplayHandle = window.open("Dual_screen","dsv", "location=0,status=0,scrollbars=0,width=700,height=400");
                if (dualDisplayHandle.location.href === "about:blank") {
                    dualDisplayHandle = window.open("Dual_screen", "dsv", "location=0,status=0,scrollbars=0,width=700,height=400");
                } else {
                    dualDisplayHandle.focus();
                }
            });


            $('.tile_box_menu').click(function(){


                var item_id = $(this).data('item-id');
                var item_name = $(this).data('item-name');
                var acquired_points = $(this).data('item-points');

                $('#tbl_items > tbody').prepend(newRowItem({
                    item_qty : "1",
                    item_name : item_name,
                    acquired_points : acquired_points,
                    pt_line_total : 1*acquired_points,
                    item_id: item_id
                }));

                reInitializeNumeric();
                reComputeTotal();
            });

            $('#btn_view_history').click(function(){
                $('#modal_history').modal('show');
            });


            $('#btn_continue_card_activation').click(function(){
                $('#txt_card_code').val('');
                $('#modal_card_activation').modal('show');
                
            });




            $('#btn_browse_item,#btn_search_item').click(function(){
                $('#modal_item_list').modal('show');
            });


            $('#tbl_items > tbody').on('click','button[name="remove_item"]',function(){
                $(this).closest('tr').remove();
                reComputeTotal();
                showAdvertisement();
            });


            //track every changes on numeric fields
            $('#tbl_items tbody').on('keyup','input.numeric',function(){
                var row=$(this).closest('tr');
                var acquired_points_reward=parseFloat(accounting.unformat(row.find(oTableItems.acquired_points_reward).find('input.numeric').val()));
                var qty=parseFloat(accounting.unformat(row.find(oTableItems.qty).find('input.numeric').val()));
                var line_total=acquired_points_reward*qty;
                $(oTableItems.total,row).find('input.numeric').val(accounting.formatNumber(line_total,2)); // line total

                reComputeTotal();
            });


            $('#btn_clear_items').click(function(){
                $('#tbl_items > tbody').html('');
                reComputeTotal();
                showAdvertisement();
            });


            $('#tbl_items_enlistment > tbody').on('click','button[name="add_item"]',function(){
                    var row=$(this).closest('tr');
                    var data=oItemEnlistment.row(row).data();

                    var item_id = data.item_id;
                    var item_name = data.item_name;
                    var acquired_points = data.acquired_points_reward;

                    $('#tbl_items > tbody').prepend(newRowItem({
                        item_qty : "1",
                        item_name : item_name,
                        acquired_points : acquired_points,
                        pt_line_total : 1*acquired_points,
                        item_id: item_id
                    }));

                    reInitializeNumeric();
                    reComputeTotal();

            });


            $('#txt_card_code').keypress(function(event){
                if(event.keyCode==13){
                    var f=$('#modal_card_activation');

                    if(validateRequiredFields(f)){ //if all required fields are supplied, continue for ajax post request

                        var _data= $('#frm_items').serializeArray();
                        var tbl_summary=$('#tbl_purchase_summary');
                        _data.push({name:"card_code",value:$('#txt_card_code').val()}); //push card code value
                        _data.push({name : "summary_total_pts", value : $('#cell_total').text()});

                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Record_points/transaction/create",
                            "data":_data
                        }).done(function(response){
                           
                            showNotification(response);
                            reComputeTotal();

                            if(response.stat=="success"){
                                var data_row=response.row_added[0];
                                oTableHistory.row.add(data_row).draw();


                                $('#modal_card_activation').modal('hide');//hide activation modal
                                $('#txt_card_code').val(""); //clear card code field
                                $('#camera_card_code').val("")
                                $('#modal_camera_scanner').modal('hide');//hide activation modal

                                $('#modal_members_info').modal('hide');//hide members modal



                                if(dualDisplayHandle!=null&&dualDisplayHandle!=undefined){

                                    dualDisplayHandle.$('#transaction_info').show();
                                    dualDisplayHandle.$("#transaction_items").hide();

                                    dualDisplayHandle.$('#header_name').html("Congratulations, "+data_row.customer_name+".");
                                    dualDisplayHandle.$('#header_statement').html("You have earned ");
                                    dualDisplayHandle.$('#header_points').html(data_row.total_points_acquired+" Points");
                                }

                                clearFields(f); //clear all form fields

                            }else{
                                $('#txt_card_code').val("");
                                $('#camera_card_code').val(""); //clear card code field
                            }
                        });


                    }else{
                        //hide activation modal if validation is not fulfilled
                        $('#modal_card_activation').modal('hide');
                    }
                }
            });


        }();



        var reComputeTotal=function(){
            var rows=$('#tbl_items > tbody tr');
            var total_pts=0;

            $.each(rows,function(){
                total_pts+=parseFloat(accounting.unformat($(oTableItems.total,$(this)).find('input.numeric').val()));
            });

            $('#cell_total').html('<center><strong><h4 style="font-color:black;">'+accounting.formatNumber(total_pts,2)+'</h4></strong><center>');
            $('#span_total_points').html(accounting.formatNumber(total_pts,2));


            drawDualScreenItemList(total_pts);

        };

        var reInitializeNumeric=function(){
            $('.numeric').autoNumeric('init');
        };


        var clearFields=function(f){
            //$('input,textarea',f).val('');
            //$(f).find('input:first').focus();
            $('#txt_card_code').val('');
            $('#cell_total').html('<center><strong><h4 style="font-color:black;">'+accounting.formatNumber(0,2)+'</h4></strong><center>');
            $('#span_total_points').html(accounting.formatNumber(0,2));


            $('#tbl_items > tbody').html('');
            showAdvertisement(8000);
        };


        var showAdvertisement=function(timeout=1000){
            var rows=$('#tbl_items > tbody tr');

            if(rows.length==0){
                setTimeout(function(){
                    dualDisplayHandle.$('#div_transactions').hide();
                    dualDisplayHandle.$('#div_advertisement').show();
                },timeout);
            }

        };




        var newRowItem=function(d){

            return '<tr>'+
            '<td width="10%"><input name="item_qty[]" type="text" class="numeric form-control" value="'+ d.item_qty+'"></td>'+
            '<td width="30%">'+d.item_name+'</td>'+
            '<td width="11%"><input name="acquired_points[]" type="text" class="numeric form-control" value="'+accounting.formatNumber(d.acquired_points,2)+'" style="text-align:right;"></td>'+

            '<td width="11%" align="right"><input name="pt_line_total[]" type="text" class="numeric form-control" style="text-align: right;" value="'+ accounting.formatNumber(d.pt_line_total,2)+'" readonly></td>'+

            '<td style="display: none;"><input name="item_id[]" type="text" class="numeric form-control" value="'+ d.item_id+'" readonly></td>'+
            '<td align="center"><button type="button" name="remove_item" class="btn btn-default"><i class="fa fa-trash"></i></button></td>'+
            '</tr>';
        };











    $('#btn_camera_scanner').click(function(){
        $('#camera_card_code').val('');
        $('#txt_card_code').val('');
        $('#modal_camera_scanner').modal('show');
        load();
    });




        $('#confirm_qr_data').click(function(event){
            
                var f=$('#modal_camera_scanner');

                if(validateRequiredFields(f)){ //if all required fields are supplied, continue for ajax post request

                    var _data= $('#frm_items').serializeArray();
                    var tbl_summary=$('#tbl_purchase_summary');
                    _data.push({name:"card_code",value:$('#camera_card_code').val()}); //push card code value
                    _data.push({name : "summary_total_pts", value : $('#cell_total').text()});

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"Record_points/transaction/create",
                        "data":_data
                    }).done(function(response){
                        showNotification(response);
                        reComputeTotal();

                        if(response.stat=="success"){
                            var data_row=response.row_added[0];
                            oTableHistory.row.add(data_row).draw();




                            $('#txt_card_code').val(""); //clear card code field
                            $('#camera_card_code').val("")
                            $('#modal_camera_scanner').modal('hide');//hide activation modal
                            $('#modal_card_activation').modal('hide');//hide activation modal
                            $('#modal_members_info').modal('hide');//hide members modal

                            if(dualDisplayHandle!=null&&dualDisplayHandle!=undefined){

                                dualDisplayHandle.$('#transaction_info').show();
                                dualDisplayHandle.$("#transaction_items").hide();

                                dualDisplayHandle.$('#header_name').html("Congratulations, "+data_row.customer_name+".");
                                dualDisplayHandle.$('#header_statement').html("You have earned ");
                                dualDisplayHandle.$('#header_points').html(data_row.total_points_acquired+" Points");
                            }
                            clearFields(f); //clear all form fields


                        }else{
                            $('#txt_card_code').val("");
                            $('#camera_card_code').val(""); //clear card code field
                        }




                    });


                }else{
                    //hide activation modal if validation is not fulfilled
                    $('#modal_camera_scanner').modal('hide');
                }
            
        });




        var drawDualScreenItemList=function(total_points){
            if(dualDisplayHandle!=null&&dualDisplayHandle!=undefined){
                var rows=$("#tbl_items > tbody tr");

                dualDisplayHandle.$('#div_transactions').show();
                dualDisplayHandle.$('#div_advertisement').hide();

                dualDisplayHandle.$("#transaction_items").show();
                dualDisplayHandle.$("#transaction_info").hide();

                var ddhTable=dualDisplayHandle.$("#tbl_items > tbody");
                var ddhCellTotal=dualDisplayHandle.$("#cell_total");

                ddhTable.html('');
                $.each(rows,function(){

                    var qty=$(this).find('td:eq(0) input').val();
                    var desc=$(this).find('td:eq(1)').text();
                    var points=$(this).find('td:eq(2) input').val();
                    var total=$(this).find('td:eq(3) input').val();

                    ddhTable.append('<tr><td style="text-align: right;">'+qty+'</td><td>'+desc+'</td><td style="text-align: right;">'+points+'</td><td style="text-align: right;">'+total+'</td></tr>');

                });
                ddhCellTotal.html(accounting.formatNumber(total_points,2));
            }
        };


        var setReferenceHandle=function(){
            try{
                dualDisplayHandle = window.open("Dual_screen","dsv", "location=0,status=0,scrollbars=0,width=700,height=400");

                if (dualDisplayHandle.location.href === "about:blank") {
                    dualDisplayHandle = window.open("Dual_screen", "dsv", "location=0,status=0,scrollbars=0,width=700,height=400");
                } else {
                    dualDisplayHandle.focus();
                }
            }catch(err){
                dualDisplayHandle = window.open("Dual_screen","dsv", "location=0,status=0,scrollbars=0,width=700,height=400");
            }

        }();




$('#btn_search_member').click(function(){
    $('#modal_member_enlistment').modal('show');  
});

    });



</script>

</div>
</body>

</html>