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
                                                             <span>
                                                                <b><i class="glyph-icon icon-gear"></i> User Group and Permissions</b>
                                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_user_groups" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>User Group</th>
                                                    <th>Description</th>
                                                    <th>Date Created</th>
                                                    <th>Created by</th>
                                                    <th>Status</th>
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
<div class="modal fade" id="modal_user_group_info" tabindex="-1" role="dialog" aria-labelledby="modal_user_group_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> User Group and Permissions</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">

                                <div class="example-box-wrapper">
                                    <form id="frm_user_group_info" class="form-horizontal bordered-row">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">* User Group : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="user_group" placeholder="User Group"  data-error-msg="Branch Name is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description : </label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="access_description" placeholder="Description"></textarea>
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

                <button id="btn_save_record" type="button" class="btn btn-primary"><b><i class="glyph-icon icon-check-circle-o"></i> <span class=""></span> Save this Record</b></button>
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
        var _txnMode; var oTableGroup; var oSelectedRow;

        //*******************************************************************************************************************
        var initializeControls=function(){
            oTableGroup=$('#tbl_user_groups').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "User_groups/transaction/list",
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    
                    { targets:[2],data: "user_group" },
                    { targets:[3],data: "access_description" },
                    { targets:[4],data: "date_created" },
                    { targets:[5],data: "created_by_user" },
                    {
                        targets:[6],
                        data: "status",
                        render: function (data, type, full, meta){
                            if(data=="1"){
                                return '<center><i class="glyph-icon icon-check-circle" style="color:green;"></i></center>';
                            }else{
                                return '<center><i class="glyph-icon icon-times-circle" style="color:red;"></i></center>';
                            }
                        }

                    },
                    {
                        targets:[7],
                        render: function (data, type, full, meta){
                            return '<center><a href="#" id="edit_info"><i class="glyph-icon icon-edit"></i></a> <a href="#" id="delete_info"><i class="glyph-icon icon-trash"></i></a></center>';
                        }
                    }
                ]
            });


            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Create New User Group" >'+
                    '<i class="glyph-icon icon-gear"></i> <b>Create New User Group</b></button>';
                $("div.toolbar").html(_btnNew);
            }();






        }();
        //*******************************************************************************************************************



        var bindEventHandlers=function(){
        var detailRows = [];

            $('#tbl_user_groups tbody').on( 'click', 'tr td.details-control', function () {
            
                    var tr = $(this).closest('tr');
                    var row =    oTableGroup.row( tr );
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
                        var d=row.data();
console.log(d);
                        $.ajax({
                            "dataType":"html",
                            "type":"POST",
                            "url":"Templates/layout/user-rights?id="+ d.user_group_id,
                            "beforeSend" : function(){
                                row.child( '<center><br /><img src="assets/images/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                            }
                        }).done(function(response){
                            row.child( response ).show();
                            // Add to the 'open' array


                      
                            reInitializeSpecificButton(d.user_group_id);

                            if ( idx === -1 ) {
                                detailRows.push( tr.attr('id') );
                            }
                        });



                    }
                } );


  

            //new
            $('#btn_new').click(function(){
                _txnMode="new";
                $('#modal_user_group_info').modal('show');
            });

            //delete
            $('#tbl_user_groups').on('click','#delete_info',function(){
                oSelectedRow=$(this).closest('tr'); //selected row
                $('#modal_confirmation').modal('show');
            });

            //confirm delete
            $('#confirm_delete').click(function(){
                //alert("ENTER OVERRIDE HERE!!!!");
                $('#modal_confirmation').modal('hide');
                var d=oTableGroup.row(oSelectedRow).data();
                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"User_groups/transaction/delete",
                    "data":[{name:"user_group_id",value: d.user_group_id}]
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        oTableGroup.row(oSelectedRow).remove().draw();
                    }

                });
            });


            //edit
            $('#tbl_user_groups').on('click','#edit_info',function(){
                _txnMode="edit";
                oSelectedRow=$(this).closest('tr');
                var data=oTableGroup.row(oSelectedRow).data();
                var _parent=$('#modal_user_group_info');
                $('input,textarea',_parent).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });
                $('#modal_user_group_info').modal('show');
            });


            //save
            $('#btn_save_record').click(function(){
                var btn=$(this);
                var f=$('#frm_user_group_info');

                if(validateRequiredFields(f)){

                    var _data=f.serializeArray(); //serialize data in array format

                    if(_txnMode=="new"){
                        //save new card info
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"User_groups/transaction/create",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                //oTableGroup.row(oSelectedRow).data(response.row_added[0]).draw();
                                oTableGroup.row.add(response.row_added[0]).draw();//add new data to card table
                                clearFields(f); //clear all form fields
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }else{

                        var d=oTableGroup.row(oSelectedRow).data();
                        _data.push({name:"user_group_id",value: d.user_group_id});
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"User_groups/transaction/update",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                oTableGroup.row(oSelectedRow).data(response.row_updated[0]).draw();
                                clearFields(f); //clear all form fields
                                $('#modal_user_group_info').modal('hide');
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }


                }
            });

        }();



    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        //$(f).find('select').select2('val',null);
        $(f).find('input:first').focus();
    };


  

    var reInitializeSpecificButton=function(id){
        var parentDiv=$('#user_rights_'+id);
        parentDiv.on('click','button#btn_user_group_rights_'+id,function(){
            var btn=this;
            var _data=parentDiv.find('form').serializeArray();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"User_groups/transaction/save-rights",
                "data":_data,
                "beforeSend": showSpinningProgress(btn)
            }).done(function(response){
                showNotification(response);
            }).always(function(){
                showSpinningProgress(btn);
            });


        });
    };





    });



 function  fnChecked(e){
            var  checkbox=$('input[type=checkbox]');
            checkbox.prop("checked", false);
            $(e).prop("checked", true);
      }



</script>

</div>
</body>

</html>