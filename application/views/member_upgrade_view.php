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
                                            <span style="font-family: tahoma;">
                                                <b><i class="glyph-icon icon-gear"></i> Candidate for Membership Upgrade</b>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_membership_upgrade" width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                                                <thead>
                                                    <tr>

                                                        <th style="width: 10%;">Card #</th>
                                                        <th style="width: 40%;">Member</th>
                                                        <th style="width: 10%;">Earn Pts.</th>
                                                        <th style="width: 15%;">Current</th>
                                                        <th style="width: 15%;">Upgrade To</th>
                                                        <th style="width: 10%;">Action</th>
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




                        <div class="panel-group" id="accordion">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <span style="font-family: tahoma;">
                                                <b><i class="glyph-icon icon-gear"></i> Override Membership Type</b>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_members" width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>Card #</th>
                                                    <th>Member</th>
                                                    <th>Membership</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
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
</div>


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


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Membership : </label>
                                            <div class="col-sm-8">
                                                <select name="memberships" id="cbo_membership" data-error-msg="Supplier is required." required>
                                                    <?php foreach($memberships as $membership){ ?>
                                                        <option value="<?php echo $membership->member_type_id; ?>"><?php echo $membership->member_type; ?></option>
                                                    <?php } ?>
                                                </select>

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


<?php echo $js_dependencies; ?>
<script src="assets/plugins/select2/select2.full.min.js"></script>

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
        var oTableMemberUpgrade; var oSelectedRow; var oTableMembers; var _cboMemberships;

        var initializeControls=function() {


            _cboMemberships=$('#cbo_membership').select2({
                placeholder: "Please select membership.",
                allopwClear: true
            });




            oTableMemberUpgrade = $('#tbl_membership_upgrade').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange": false,
                "bPaginate":true,
                "bInfo":true,
                "ajax": "Member_upgrade/transaction/upgrade-candidate-list",
                "columns": [

                    {targets: [0], data: "card_code"},
                    {targets: [1], data: "member"},
                    {
                        targets: [2],
                        data: "total_earn_pts",
                        render: function (data, type, full, meta) {
                            return accounting.formatNumber(data,2);
                        }
                    },
                    {targets: [3], data: "member_type_current"},
                    {
                        targets: [4],
                        data: "member_type_upgrade",
                        render: function (data, type, full, meta) {
                            return '<span class="font-black"><b>'+data+'</b></span>';
                        }
                    },
                    {
                        targets: [5],
                        render: function (data, type, full, meta) {
                            return '<center><button name="btn_upgrade" type="button" class="btn btn-success"><i class="glyph-icon icon-check-circle-o"></i> Upgrade</button></center>';
                        }
                    }
                ],
                "createdRow": function ( row, data, index ) {
                    $('td:eq(2)', row).attr("style","text-align:right;");
                }
            });

            oTableMembers = $('#tbl_members').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange": false,
                "bPaginate":false,
                "bInfo":false,
                "ajax": "Memberships/transaction/list",
                "columns": [

                    {targets: [0], data: "card_code"},
                    {targets: [1], data: "member_name"},
                    {
                        targets: [2],
                        data: "member_type",
                        render: function (data, type, full, meta) {
                            return '<span class="font-black"><b>'+data+'</b></span>';
                        }
                    },
                    {targets: [3], data: "cus_email"},
                    {targets: [4], data: "cus_mobile_no"},
                    {
                        targets: [5],
                        render: function (data, type, full, meta) {
                            return '<center><button name="btn_override" type="button" class="btn btn-danger"><i class="glyph-icon icon-check-circle-o"></i> Override</button></center>';
                        }
                    }
                ]
            });




        }();



        var bindEventHandlers=function(){


            $('#btn_save_member_info').click(function(){
                var btn=$(this);
                var f=$('#modal_frm_member_info_1');
                var d=oTableMembers.row(oSelectedRow).data();

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
                            oTableMembers.row(oSelectedRow).data(response.row_updated[0]).draw();
                            var m=$('#modal_member_info');
                            clearFields(m); //clear all form fields
                            m.modal('hide');
                        }
                    }).always(function(){
                        showSpinningProgress(btn);
                    });

                }
            });


            $('#tbl_members > tbody').on('click','button[name="btn_override"]',function(){

                oSelectedRow=$(this).closest('tr');
                var data=oTableMembers.row(oSelectedRow).data();
                var _parent=$('#modal_member_info');

                $('input,textarea',_parent).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });

                $('#cbo_membership').select2('val',data.member_type_id);


                $('#modal_member_info').modal('show');
            });



            $('#tbl_membership_upgrade > tbody').on('click','button[name="btn_upgrade"]',function(){

                var oSelectedRow=$(this).closest('tr');
                var data=oTableMemberUpgrade.row(oSelectedRow).data();

                var upgrade_id=data.member_type_upgrade_id;
                var member_id=data.customer_id;

                var _data=[];
                _data.push(
                    {name:"member_id",value:member_id},
                    {name:"upgrade_id",value:upgrade_id}
                );


                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Member_upgrade/transaction/upgrade",
                    "data":_data,
                    "beforeSend" : function(){
                        //showSpinningProgress(btn);
                    }
                }).done(function(response){
                    showNotification(response);

                    if(response.stat=="success"){
                        oTableMemberUpgrade.row(oSelectedRow).remove().draw();
                    }


                }).always(function(){
                    //showSpinningProgress(btn);
                });



            });




        }();





    });






</script>

</div>
</body>

</html>