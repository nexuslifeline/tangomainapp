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
                                                                <b><i class="glyph-icon icon-gear"></i> Branch Information</b>
                                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_branches" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Branch</th>
                                                    <th>Address</th>
                                                    <th>Contact Person</th>
                                                    <th>Landline</th>
                                                    <th>Mobile #</th>
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
<div class="modal fade" id="modal_branch_info" tabindex="-1" role="dialog" aria-labelledby="modal_branch_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Branch Information</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">

                                <div class="example-box-wrapper">
                                    <form id="frm_branch_info" class="form-horizontal bordered-row">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">* Branch : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="branch_name" placeholder="Branch Name"  data-error-msg="Branch Name is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Address : </label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="branch_address" placeholder="Address"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact Person : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact_person" placeholder="Contact Person">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Telephone # : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="branch_landline" placeholder="Telephone #">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mobile # : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="branch_mobile_no" placeholder="Mobile #">
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
        var _txnMode; var oTableBranch; var oSelectedRow;

        //*******************************************************************************************************************
        var initializeControls=function(){
            oTableBranch=$('#tbl_branches').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Branches/transaction/list",
                "columns": [

                    { targets:[1],data: "branch_name" },
                    { targets:[2],data: "branch_address" },
                    { targets:[3],data: "contact_person" },
                    { targets:[4],data: "branch_landline" },
                    { targets:[5],data: "branch_mobile_no" },
                    {
                        targets:[6],
                        render: function (data, type, full, meta){
                            return '<center><a href="#" id="edit_info"><i class="glyph-icon icon-edit"></i></a> <a href="#" id="delete_info"><i class="glyph-icon icon-trash"></i></a></center>';
                        }
                    }
                ]
            });


            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Register Branch" >'+
                    '<i class="glyph-icon icon-gear"></i> <b>Register Branch</b></button>';
                $("div.toolbar").html(_btnNew);
            }();






        }();
        //*******************************************************************************************************************



        var bindEventHandlers=function(){

            //new
            $('#btn_new').click(function(){
                _txnMode="new";
                $('#modal_branch_info').modal('show');
            });

            //delete
            $('#tbl_branches').on('click','#delete_info',function(){
                oSelectedRow=$(this).closest('tr'); //selected row
                $('#modal_confirmation').modal('show');
            });

            //confirm delete
            $('#confirm_delete').click(function(){
                //alert("ENTER OVERRIDE HERE!!!!");
                $('#modal_confirmation').modal('hide');
                var d=oTableBranch.row(oSelectedRow).data();
                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Branches/transaction/delete",
                    "data":[{name:"branch_id",value: d.branch_id}]
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        oTableBranch.row(oSelectedRow).remove().draw();
                    }

                });
            });


            //edit
            $('#tbl_branches').on('click','#edit_info',function(){
                _txnMode="edit";
                oSelectedRow=$(this).closest('tr');
                var data=oTableBranch.row(oSelectedRow).data();
                var _parent=$('#modal_branch_info');
                $('input,textarea',_parent).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });
                $('#modal_branch_info').modal('show');
            });


            //save
            $('#btn_save_record').click(function(){
                var btn=$(this);
                var f=$('#frm_branch_info');

                if(validateRequiredFields(f)){

                    var _data=f.serializeArray(); //serialize data in array format

                    if(_txnMode=="new"){
                        //save new card info
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Branches/transaction/create",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                //oTableBranch.row(oSelectedRow).data(response.row_added[0]).draw();
                                oTableBranch.row.add(response.row_added[0]).draw();//add new data to card table
                                clearFields(f); //clear all form fields
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }else{

                        var d=oTableBranch.row(oSelectedRow).data();
                        _data.push({name:"branch_id",value: d.branch_id});
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Branches/transaction/update",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                oTableBranch.row(oSelectedRow).data(response.row_updated[0]).draw();
                                clearFields(f); //clear all form fields
                                $('#modal_branch_info').modal('hide');
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