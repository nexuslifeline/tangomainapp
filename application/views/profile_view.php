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

<div data-widget-group="group1">
<div class="row">
<div class="col-md-12">


<div id="div_user_fields">
<div class="panel panel-default">


<div class="panel-body">

    <h4 style="font-family: tahoma;"><span style="margin-left: 1%"><strong><i class="fa fa-users"></i> User Information</strong></span></h4>
    <hr /><br />

    <form id="frm_users" role="form" class="form-horizontal row-border">


        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">* User Name :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-users"></i>
                                                                </span>
                    <input type="text" name="user_name" class="form-control" value="<?php echo $user_info->user_name; ?>" placeholder="User Name" data-error-msg="User name is required!" required>
                </div>
            </div>
        </div>




        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">* Password :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-lock"></i>
                                                                </span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <span class="help-block m-b-none"><b><i class="fa fa-lock"></i> Update Password</b> (Please leave it blank if you do not want to update your password)</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">* Confirm Password :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-lock"></i>
                                                                </span>
                    <input type="password" name="user_confirm_password" class="form-control" placeholder="Confirm Password">
                </div>

                <span class="help-block m-b-none">Please make sure password match.</span>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">* Firstname :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-users"></i>
                                                                </span>
                    <input type="text" name="user_fname" class="form-control" value="<?php echo $user_info->user_fname; ?>" placeholder="Firstname" data-error-msg="Firstname is required!" required>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label"> Middlename :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-users"></i>
                                                                </span>
                    <input type="text" name="user_mname" class="form-control" value="<?php echo $user_info->user_mname; ?>" placeholder="Middlename">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">* Lastname :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-users"></i>
                                                                </span>
                    <input type="text" name="user_lname" class="form-control" value="<?php echo $user_info->user_lname; ?>" placeholder="Lastname" data-error-msg="Lastname is required!" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">Birthdate :</label>

            <div class="col-md-7">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="txt_bdate" name="user_bdate" value="<?php echo $user_info->birth_date; ?>" type="text" class="form-control" value="<?php echo date("m/d/Y"); ?>">
                </div>

            </div>

        </div>


        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">Address :</label>
            <div class="col-md-7">
                <textarea name="user_address" class="form-control"><?php echo $user_info->user_address; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">Email Address :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-envelope-o"></i>
                                                                </span>
                    <input type="text" name="user_email" class="form-control" value="<?php echo $user_info->user_email; ?>" placeholder="Email Address">
                </div>
            </div>
        </div>

    

        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">Mobile No :</label>
            <div class="col-md-7">
                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-send"></i>
                                                                </span>
                    <input type="text" name="user_mobile" class="form-control" value="<?php echo $user_info->user_mobile; ?>" placeholder="Mobile No">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-2 col-md-offset-1 control-label">Photo :</label>
            <div class="col-md-5">
                <div class="input-group">
                    <div class="" style="border:1px solid black;height: 230px;width: 210px;vertical-align: middle;">

                        <div id="div_img_user" style="position:relative;">
                            <img name="img_user" src="<?php echo $user_info->user_photo; ?>" style="object-fit: fill; !important; height: 100%;width: 100%;" />
                            <input type="file" name="file_upload[]" class="hidden">
                        </div>

                        <div id="div_img_loader" style="display: none;">
                            <img name="img_loader" src="assets/img/loader/ajax-loader-sm.gif" style="display: block;margin:40% auto auto auto; " />
                        </div>
                    </div>

                    <button type="button" id="btn_browse" class="btn btn-primary "  style="margin-top: 2%;text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Browse Photo</button>
                    <button type="button" id="btn_remove_photo"  class="btn btn-primary" style="margin-top: 2%;text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Remove</button>
                </div>
            </div>
        </div>




    </form>


    <br /><br />








</div>
<div class="panel-footer">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-3">
            <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><i class="fa fa-check-circle"></i> <span class=""></span>  Update Profile</button>
        </div>
    </div>


</div>
</div>
</div>




</div>
</div>
</div>
</div> <!-- .container-fluid -->

</div> <!-- #page-content -->
</div>


<div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-sm">
        <div class="modal-content"><!---content--->
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>

            </div>

            <div class="modal-body">
                <p id="modal-body-message">Are you sure ?</p>
            </div>

            <div class="modal-footer">
                <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Yes</button>
                <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">No</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->




<footer role="contentinfo">
    <div class="clearfix">
        <ul class="list-unstyled list-inline pull-left">
            <li><h6 style="margin: 0;">&copy; 2016 - Paul Christian Rueda</h6></li>
        </ul>
        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
    </div>
</footer>




</div>
</div>


</div>


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
    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboUserGroup;



    var initializeControls=function(){



        $('#txt_bdate').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });




    }();






    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_user_list tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                row.child( format( row.data() ) ).show();
                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }



            }
        } );


        $('#btn_new').click(function(){
            _txnMode="new";
            showList(false);
        });

        $('#btn_browse').click(function(event){
            event.preventDefault();
            $('input[name="file_upload[]"]').click();
        });


        $('#btn_remove_photo').click(function(event){
            event.preventDefault();
            $('img[name="img_user"]').attr('src','assets/images/anonymous-icon.png');
        });



        $('#tbl_user_list tbody').on('click','button[name="edit_info"]',function(){
            ///alert("ddd");
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.user_id;

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name&&_elem.attr('type')!='password'){
                        _elem.val(value);
                    }

                });


            });

            $('img[name="img_user"]').attr('src',data.user_photo);
            showList(false);

        });

        $('#tbl_user_list tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.user_id;

            $('#modal_confirmation').modal('show');
        });


        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_user').hide();
            $('#div_img_loader').show();


            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });


            $.ajax({
                url : 'Users/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    //console.log(response);
                    //alert(response.path);
                    $('#div_img_loader').hide();
                    $('#div_img_user').show();
                    $('img[name="img_user"]').attr('src',response.path);

                }
            });

        });


        $('#btn_save').click(function(){

            if(validateRequiredFields($('#frm_users'))){

                    updateUserAccount().done(function(response){
                        showNotification(response);
                        //dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        //clearFields($('#frm_users'));
                        //showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });


            }

        });


    })();


    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

            if($(this).is('select')){
                if($(this).select2('val')==0||$(this).select2('val')==null){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }else{
                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }



        });


        if($('input[name="user_confirm_password"]').val()!=$('input[name="password"]').val()){
            showNotification({title:"Error!",stat:"error",msg:"Password did not match."});
            $('input[name="user_confirm_password"]').focus();
            stat=false;
        }

        return stat;
    };




    var updateUserAccount=function(){
        var _data=$('#frm_users').serializeArray();
        _data.push({name : "user_photo" ,value : $('img[name="img_user"]').attr('src')});


        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Users/transaction/update-profile",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };



    var showList=function(b){
        if(b){
            $('#div_user_list').show();
            $('#div_user_fields').hide();
        }else{
            $('#div_user_list').hide();
            $('#div_user_fields').show();
        }
    };

    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };



    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        //$(f).find('select').select2('val',null);
        $(f).find('input:first').focus();
    };






});




</script>


</body>


</html>

</div>
</body>

</html>