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


	 .glyphicon.spinning {
	        animation: spin 1s infinite linear;
	        -webkit-animation: spin2 1s infinite linear;
	    }

	    @keyframes spin {
	        from { transform: scale(1) rotate(0deg); }
	        to { transform: scale(1) rotate(360deg); }
	    }

	    @-webkit-keyframes spin2 {
	        from { -webkit-transform: rotate(0deg); }
	        to { -webkit-transform: rotate(360deg); }
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


<body>
        <div id="sb-site">

            <?php echo $loading; ?>

            <div id="page-wrapper">

                <?php echo $profile_header; ?>
                <?php echo $sidebar; ?>

                <div id="page-content-wrapper" style="font-family: tahoma;">
                        <div id="page-content">
                            <div class="container">




                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="panel-group" id="accordion">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                             <span>
                                                                <b><i class="glyph-icon icon-bars"></i> Membership Card</b>
                                                            </span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <div class="example-box-wrapper">

                                                            <table id="tbl_issued_card" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>Card #</th>
                                                                    <th>Issued to Member</th>
                                                                    <th>Issued Date</th>
                                                                    <th>Activated by</th>
                                                                    <th>Date Activated</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>

                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                            <span>
                                                                <b><i class="glyph-icon icon-users"></i> Members Info</b>
                                                            </span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <table id="tbl_members" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Member</th>
                                                                <th>Address</th>
                                                                <th>Mobile #</th>
                                                                <th>Email</th>
                                                                <th>Telephone</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>

                                                        </table>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>




                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>




                <!--modal members-->
                <div class="modal fade" id="modal_members_info" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-9">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                        <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Membership Registration</b></h4>
                    </div>
                    <div class="modal-body" style="padding: 1%;font-family: tahoma;">



                        <div class="panel">
                            <div class="panel-body">
                                <label class="title-hero" style="text-transform: none;">
                                    <b><i class="glyph-icon icon-users"></i> Member Information</b>
                                </label>
                                <div class="example-box-wrapper">
                                    <form id="frm_member_info" class="form-horizontal bordered-row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">* Firstname : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cus_fname" placeholder="Firstname"  data-error-msg="Firstname is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Middlename : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cus_mname" placeholder="Middlename">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">* Lastname : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cus_lname" placeholder="Lastname"  data-error-msg="Lastname is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Mobile # : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cus_mobile_no" placeholder="Mobile #">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">* Email : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cus_email" placeholder="Email" data-error-msg="Email is required." required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Birthdate : </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="cus_bdate" class="form-control date-picker" name="" placeholder="Date of Birth">
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">

                        <button id="btn_continue_card_activation" type="button" class="btn btn-primary"><i class="glyph-icon icon-check-circle-o"></i><b>QR Code Scanner >></b></button>


                        <button id="btn_camera_scanner" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-camera"></i><b>Camera Scanner >></b></button>
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
                </div><!--modal members-->


                <div id="modal_confirmation" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this?</p>
                            </div>
                            <div class="modal-footer">
                                <button id="confirm_delete" type="button" class="btn btn-warning"><i class="glyph-icon icon-trash"></i> Confirm</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



            <!--modal card activation-->
            <div class="modal fade" id="modal_card_activation" style="margin-top: 10%;" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-9">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                            <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Card Activation</b></h4>
                        </div>
                        <div class="modal-body" style="padding: 1%;font-family: tahoma;">



                            <div class="panel">
                                <div class="panel-body">

                                    <div class="example-box-wrapper">
                                        <label>Please scan the Card to activate : </label><br />
                                        <div>
                                            <input id="txt_card_code" name="card_code" type="text" class="form-control">
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












            <!--modal members-->
            <div class="modal fade" id="modal_member_info" tabindex="-1" role="dialog" aria-labelledby="modal_user_registrationLabel" aria-hidden="true">
                <div class="modal-dialog" style="width: 85%;">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-9">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                            <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Member Information</b></h4>
                        </div>
                        <div class="modal-body" style="padding: 1%;font-family: tahoma;">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">

                                            <div class="example-box-wrapper">
                                                <form id="modal_frm_member_info_1" class="form-horizontal bordered-row">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">* Firstname : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cus_fname" class="form-control" id="" placeholder="Firstname"   data-error-msg="Firstname is required." required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Middlename : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cus_mname" class="form-control" id="" placeholder="Middlename">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">* Lastname : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cus_lname" class="form-control" id="" placeholder="Lastname"   data-error-msg="Lastname is required." required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">* Email : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cus_email" class="form-control" id="" placeholder="Email"   data-error-msg="Email is required." required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Mobile : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cus_mobile_no" class="form-control" id="" placeholder="Mobile #">
                                                        </div>
                                                    </div>




                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">

                                            <div class="example-box-wrapper">
                                                <form id="modal_frm_member_info_2" class="form-horizontal bordered-row">

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Telephone : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cus_telephone" class="form-control" id="" placeholder="Telephone #">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Birthdate : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cus_bdate" class="form-control date-picker" id="" placeholder="Date of Birth">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Address : </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" name="cus_address" placeholder="Address"></textarea>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button id="btn_save_member_info" type="button" class="btn btn-primary" style="font-family: tahoma;"><b><i class="glyph-icon icon-check-circle-o"></i> <span class=""></span> Save Changes</b></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!--modal members-->





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
                    var oTableCard; var oTableMember; var oSelectedRow;

                    var initializeGridControls=function(){


                            oTableCard=$('#tbl_issued_card').DataTable({
                                "dom": '<"toolbar">frtip',
                                "bLengthChange":false,
                                "ajax" : "Memberships/transaction/list",
                                "columns": [

                                    { targets:[1],data: "card_code" },
                                    { targets:[2],data: "member_name" },
                                    { targets:[3],data: "date_issued" },
                                    { targets:[4],data: "activated_by" },
                                    { targets:[5],data: "date_activated" },
                                    {
                                        targets:[6],
                                        render: function (data, type, full, meta){

                                            return '<center><a href="#" id="card_activation_delete"><i class="glyph-icon icon-trash"></i></a></center>';
                                        }
                                    }
                                ]
                            });

                            oTableMember=$('#tbl_members').DataTable({
                                "dom": '<"toolbar2">frtip',
                                "bLengthChange":false,
                                "ajax" : "Memberships/transaction/list",
                                "columns": [

                                    { targets:[1],data: "member_name" },
                                    { targets:[2],data: "cus_address" },
                                    { targets:[3],data: "cus_mobile_no" },
                                    { targets:[4],data: "cus_email" },
                                    { targets:[5],data: "cus_telephone" },
                                    {
                                        targets:[6],
                                        render: function (data, type, full, meta){
                                            return '<center><a href="#" id="member_edit_info"><i class="glyph-icon icon-edit"></i></a></center>';
                                        }
                                    }
                                ]

                            });

                            var createToolBarButton=function(){
                                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Register User Account" >'+
                                    '<i class="glyph-icon icon-bars"></i> <b>Register and Activate Membership Card</b></button>';
                                $("div.toolbar").html(_btnNew);
                            }();


                    }();




                    var bindEventControls=function(){

                        //register new member and issuance of card membership/activation
                        $('#btn_new').click(function(){
                            $('#modal_members_info').modal('show');
                        });


                        $('#btn_save_member_info').click(function(){
                        	var btn=$(this);
                            var f=$('#modal_frm_member_info_1');
                            var d=oTableMember.row(oSelectedRow).data();

                            if(validateRequiredFields(f)){

                                var _data=$('#modal_frm_member_info_1,#modal_frm_member_info_2').serializeArray();
                                _data.push({name:"member_id",value: d.customer_id});


                                //update members info
                                $.ajax({
                                    "dataType":"json",
                                    "type":"POST",
                                    "url":"Memberships/transaction/update",
                                    "data":_data,
                                    "beforeSend" : function(){
                                    	showSpinningProgress(btn);
                                    }
                                }).done(function(response){
                                    showNotification(response);
                                    if(response.stat=="success"){
                                        oTableMember.row(oSelectedRow).data(response.row_updated[0]).draw();
                                        oTableCard.ajax.reload();
                                        var m=$('#modal_member_info');
                                        clearFields(m); //clear all form fields
                                        m.modal('hide');
                                    }
                                }).always(function(){
                                    showSpinningProgress(btn);
                                });

                            }
                        });


                        $('#tbl_issued_card').on('click','#card_activation_delete',function(){
                            oSelectedRow=$(this).closest('tr'); //selected row
                            $('#modal_confirmation').modal('show');
                        });

                        $('#confirm_delete').click(function(){
                            //alert("ENTER OVERRIDE HERE!!!!");
                            $('#modal_confirmation').modal('hide');
                            var d=oTableCard.row(oSelectedRow).data();
                            $.ajax({
                                "dataType":"json",
                                "type":"POST",
                                "url":"Memberships/transaction/delete",
                                "data":[{name:"card_id",value: d.card_id},{name:"member_id",value: d.customer_id}]
                            }).done(function(response){
                                showNotification(response);
                                oTableCard.row(oSelectedRow).remove().draw();
                                oTableMember.ajax.reload();
                            });



                        });


                        $('#tbl_members').on('click','#member_edit_info',function(){
                            oSelectedRow=$(this).closest('tr');
                            var data=oTableMember.row(oSelectedRow).data();
                            var _parent=$('#modal_member_info');

                            $('input,textarea',_parent).each(function(){
                                var _elem=$(this);
                                $.each(data,function(name,value){
                                    if(_elem.attr('name')==name){
                                        _elem.val(value);
                                    }
                                });
                            });


                            $('#modal_member_info').modal('show');
                        });




                        //card activation modal
                        $('#btn_continue_card_activation').click(function(){
                            $('#modal_card_activation').modal('show');
                        });

                        //card number/triggers when qr code scanner sent text with keyascii 13 at the end
                        $('#txt_card_code').keypress(function(event){
                            if(event.keyCode==13){
                                var f=$('#frm_member_info');

                                if(validateRequiredFields(f)){ //if all required fields are supplied, continue for ajax post request

                                    var _data= f.serializeArray();
                                    _data.push({name:"card_code",value:$('#txt_card_code').val()}); //push card code value

                                    $.ajax({
                                        "dataType":"json",
                                        "type":"POST",
                                        "url":"Memberships/transaction/create",
                                        "data":_data
                                    }).done(function(response){
                                        showNotification(response);

                                        if(response.stat=="success"){

                                            oTableCard.row.add(response.row_added[0]).draw();//add new data to card table
                                            oTableMember.row.add(response.row_added[0]).draw();//add new data to card table

                                            clearFields(f); //clear all form fields
                                            $('#txt_card_code').val(""); //clear card code field
                                            $('#modal_card_activation').modal('hide');//hide activation modal
                                            $('#modal_members_info').modal('hide');//hide members modal
                                        }

                                    });


                                }else{
                                    //hide activation modal if validation is not fulfilled
                                    $('#modal_card_activation').modal('hide');
                                }

                            }
                        });


                    }();








    $('#btn_camera_scanner').click(function(){
        $('#camera_card_code').val('');
        $('#txt_card_code').val('');
        $('#modal_camera_scanner').modal('show');
        load();
    });




        $('#confirm_qr_data').click(function(event){
            
                var f=$('#frm_member_info');
                                if(validateRequiredFields(f)){ //if all required fields are supplied, continue for ajax post request

                                    var _data= f.serializeArray();
                                    _data.push({name:"card_code",value:$('#camera_card_code').val()}); //push card code value

                                    $.ajax({
                                        "dataType":"json",
                                        "type":"POST",
                                        "url":"Memberships/transaction/create",
                                        "data":_data
                                    }).done(function(response){
                                        showNotification(response);

                                        if(response.stat=="success"){

                                            oTableCard.row.add(response.row_added[0]).draw();//add new data to card table
                                            oTableMember.row.add(response.row_added[0]).draw();//add new data to card table

                                            clearFields(f); //clear all form fields
                                            $('#txt_card_code').val("");
                                            $('#camera_card_code').val(""); //clear card code field
                                            $('#modal_camera_scanner').modal('hide');//hide activation modal
                                            $('#modal_members_info').modal('hide');//hide members modal
                                        }

                                    });


                                }else{
                                    //hide activation modal if validation is not fulfilled
                                    $('#modal_card_activation').modal('hide');
                                }


            
        });  








                });


            </script>

        </div>
</body>

</html>