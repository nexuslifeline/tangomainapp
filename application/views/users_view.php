<!DOCTYPE html>
<html  lang="en">

<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}




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
                                                                <b><i class="glyph-icon icon-users"></i> Users Info</b>
                                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_users" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Fullname</th>
                                                    <th>Mobile</th>
                                                    <th>Address</th>
                                                    <th>Branch</th>
                                                    <th>Birthdate</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $x=1; for($i=11;$i<=45;$i++){ ?>
                                                    <tr>
                                                        <td><?php echo 'User'.$i; ?></td>
                                                        <td><?php echo 'Fname Mname Lname '.$x; $x++;  ?></td>
                                                        <td>093574676<?php echo $x; ?></td>
                                                        <td>Purok <?php echo $x; ?>, San Jose, San Simon, Pamp</td>
                                                        <td>Branch <?php echo $x; ?></td>
                                                        <td>09/14/2016</td>
                                                        <td style="text-align: center;">
                                                            <a href="#"><i class="glyph-icon icon-edit"></i></a>
                                                            <a href="#"><i class="glyph-icon icon-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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
<div class="modal fade" id="modal_user_registration" tabindex="-1" role="dialog" aria-labelledby="modal_user_registrationLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> User Registration</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">
                <form id="frm_user_info" class="form-horizontal bordered-row">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">

                                    <div class="example-box-wrapper">

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">* Firstname : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="user_fname" id="user_fname" placeholder="Firstname">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">* Lastname : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="user_lname" id="user_lname" placeholder="Lastname">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Middlename : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="user_mname" id="user_mname" placeholder="Middlename">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">* Email : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email Address">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Mobile : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="user_mobile" id="user_mobile" placeholder="Mobile">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Birthdate : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control date-picker" name="user_bdate" id="user_bdate" placeholder="Date of Birth">
                                                </div>
                                            </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">

                                    <div class="example-box-wrapper">

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">* Username : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username"  data-error-msg="Username is required." required>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    User Groups :
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="user_group_id" id="cbo_user_groups"   data-error-msg="User Group is required." required>
                                                        <?php foreach($user_groups as $user_group){ ?>
                                                            <option value="<?php echo $user_group->user_group_id; ?>"><?php echo $user_group->user_group; ?></option>
                                                        <?php } ?>
                                                    </select>


                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Branch : </label>
                                                <div class="col-sm-8">
                                                    <select name="branch_id" id="cbo_branches"   data-error-msg="Branch is required." required>
                                                        <?php foreach($branches as $branch){ ?>
                                                            <option value="<?php echo $branch->branch_id; ?>"><?php echo $branch->branch_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block m-b-none">Required. Please select the correct branch of the user.</span>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">* Password : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                    <span id="span_note" class="help-block m-b-none" style="display: none;">Leave it blank if you do not want to update the password.</span>

                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Confirm : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control"  name="c_password" id="c_password" placeholder="Confirm Password">
                                                </div>
                                            </div>





                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>









            </div>
            <div class="modal-footer">

                <button id="btn_save_record" type="button" class="btn btn-primary"><i class="glyph-icon icon-check-circle-o"></i> Record >></button>
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


<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>







<script>
    $(document).ready(function(){
        var _cboBranches;  var _cboUserGroup; var _txnMode; var oTableUser; var oSelectedRow;

        //*******************************************************************************************************************
        var initializeControls=function(){
            oTableUser=$('#tbl_users').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Users/transaction/list",
                "columns": [

                    { targets:[1],data: "user_name" },
                    { targets:[2],data: "user_fullname" },
                    { targets:[3],data: "user_mobile" },
                    { targets:[4],data: "user_address" },
                    { targets:[5],data: "branch_name" },
                    { targets:[6],data: "user_bdate" },
                    

                    {
                        targets:[7],
                        render: function (data, type, full, meta){
                            return '<center><a href="#" id="edit_info"><i class="glyph-icon icon-edit"></i></a> <a href="#" id="delete_info"><i class="glyph-icon icon-trash"></i></a></center>';
                        }
                    }

                ]
            });

                    var createToolBarButton=function(){
                            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Register User Account" >'+
                                '<i class="glyph-icon icon-users"></i> <b>Register User Account</b></button>';
                            $("div.toolbar").html(_btnNew);
                    }();



                _cboUserGroup=$("#cbo_user_groups").select2({
                    placeholder: "Please select user group.",
                    allowClear: true
                });

                _cboUserGroup.select2('val', null);


                _cboBranches=$("#cbo_branches").select2({
                    placeholder: "Please select branch.",
                    allowClear: true
                });

                _cboBranches.select2('val', null);







        }();
        //*******************************************************************************************************************



        var bindEventHandlers=function(){

            //new
            $('#btn_new').click(function(){
                _txnMode="new";
                var m=$('#modal_user_registration');
                $('#span_note').hide();
                clearFields(m);
                m.modal('show');
            });

            //delete
            $('#tbl_users').on('click','#delete_info',function(){
                oSelectedRow=$(this).closest('tr'); //selected row
                $('#modal_confirmation').modal('show');
                
            });

            //confirm delete
            $('#confirm_delete').click(function(){
                //alert("ENTER OVERRIDE HERE!!!!");
                $('#modal_confirmation').modal('hide');
                var u= oTableUser.row(oSelectedRow).data();
                    $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Users/transaction/delete",
                    "data":[{name:"user_id",value: u.user_id}]
                }).done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){
                             oTableUser.row(oSelectedRow).remove().draw();
                        }

                });
            });


            //edit
            $('#tbl_users').on('click','#edit_info',function(){
                _txnMode="edit";
                oSelectedRow=$(this).closest('tr');
                var data= oTableUser.row(oSelectedRow).data();
                var _parent=$('#modal_user_registration');
                $('input,textarea',_parent).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });

                $('#span_note').show();
                $('#cbo_user_groups').select2('val',data.user_group_id);
                $('#cbo_branches').select2('val',data.branch_id);

                $('input[name="password"]').val("");
                $('#modal_user_registration').modal('show');

            });


            //save
            $('#btn_save_record').click(function(){
                var btn=$(this);
                var f=$('#frm_user_info');

                if(validateRequiredFields(f)){

                    var _data=f.serializeArray(); //serialize data in array format

                    if(_txnMode=="new"){
                        //save new card info
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Users/transaction/create",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            },error: function(xhr, status, error) {
                                // check status && error
                                console.log(xhr);
                                }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                //oTableUser.row(oSelectedRow).data(response.row_added[0]).draw();
                                 oTableUser.row.add(response.row_added[0]).draw();//add new data to user table
                                clearFields(f); //clear all form fields
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }else{

                        var d=oTableUser.row(oSelectedRow).data();
                        _data.push({name:"user_id",value: d.user_id});
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Users/transaction/update",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }

                            ,error: function(xhr, status, error) {
                                // check status && error
                                console.log(xhr);
                                }

                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                 oTableUser.row(oSelectedRow).data(response.row_updated[0]).draw();
                                clearFields(f); //clear all form fields
                                $('#modal_user_registration').modal('hide');
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }


                }
            });

        }();






    });


</script>












</div>
</body>

</html>