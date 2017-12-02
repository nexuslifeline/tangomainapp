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
                                                                <b><i class="glyph-icon icon-gear"></i> Membership Type Information</b>
                                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_membership_types" cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Member Type</th>
                                                    <th>Description</th>
                                                    <th style="text-align: right;">Required Pts.</th>
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
<div class="modal fade" id="modal_membership_type" tabindex="-1" role="dialog" aria-labelledby="modal_membership_typeLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Membership Type Information</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">

                                <div class="example-box-wrapper">
                                    <form id="frm_membership_type_info" class="form-horizontal bordered-row">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">* Member Type : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="member_type" placeholder="Membership Type"  data-error-msg="Membership type is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description : </label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="member_description" placeholder="Description"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">* Required Points : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control numeric" style="text-align: right;" name="required_points" placeholder="Required Points" data-error-msg="Points is required." required>

                                                <span class="help-block m-b-none">Please specify the points required to be this member type.</span>
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
        var _txnMode; var oTableMemberType; var oSelectedRow;

        //*******************************************************************************************************************
        var initializeControls=function(){
            oTableMemberType=$('#tbl_membership_types').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Membership_types/transaction/list",
                "columns": [

                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "member_type" },
                    { targets:[2],data: "member_description" },
                    {
                        targets:[3],data: "required_points",
                        render: function (data, type, full, meta){
                            return accounting.formatNumber(data,2);
                        }
                    },
                    {
                        targets:[4],
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
                        targets:[5],
                        render: function (data, type, full, meta){
                            return '<center><a href="#" id="edit_info"><i class="glyph-icon icon-edit"></i></a> <a href="#" id="delete_info"><i class="glyph-icon icon-trash"></i></a></center>';
                        }
                    }
                ],

                "createdRow": function ( row, data, index ) {
                    $(row).find('td').eq(3).attr('style','text-align:right');
                }

            });


            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title=" Create New Membership Type" >'+
                    '<i class="glyph-icon icon-gear"></i> <b> Create New Membership Type</b></button>';
                    $("div.toolbar").html(_btnNew);
            }();






        }();
        //*******************************************************************************************************************



        var bindEventHandlers=function(){
            //expand icon folder
            var detailRows = [];

            $('#tbl_membership_types tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = oTableMemberType.row( tr );
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

                    $.ajax({
                        "dataType":"html",
                        "type":"POST",
                        "url":"Templates/layout/po/"+ d.purchase_order_id,
                        "beforeSend" : function(){
                            row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                        }
                    }).done(function(response){
                        row.child( response ).show();
                        // Add to the 'open' array
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                    });




                }
            } );



            //new
            $('#btn_new').click(function(){
                _txnMode="new";
                $('#modal_membership_type').modal('show');
            });

            //delete
            $('#tbl_membership_types').on('click','#delete_info',function(){
                oSelectedRow=$(this).closest('tr'); //selected row
                $('#modal_confirmation').modal('show');
            });

            //confirm delete
            $('#confirm_delete').click(function(){
                //alert("ENTER OVERRIDE HERE!!!!");
                $('#modal_confirmation').modal('hide');
                var d=oTableMemberType.row(oSelectedRow).data();
                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Membership_types/transaction/delete",
                    "data":[{name:"member_type_id",value: d.member_type_id}]
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        oTableMemberType.row(oSelectedRow).remove().draw();
                    }

                });
            });


            //edit
            $('#tbl_membership_types').on('click','#edit_info',function(){
                _txnMode="edit";
                oSelectedRow=$(this).closest('tr');
                var data=oTableMemberType.row(oSelectedRow).data();
                var _parent=$('#modal_membership_type');
                $('input,textarea',_parent).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });
                $('#modal_membership_type').modal('show');
            });


            //save
            $('#btn_save_record').click(function(){
                var btn=$(this);
                var f=$('#frm_membership_type_info');

                if(validateRequiredFields(f)){

                    var _data=f.serializeArray(); //serialize data in array format

                    if(_txnMode=="new"){
                        //save new card info
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Membership_types/transaction/create",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                //oTableMemberType.row(oSelectedRow).data(response.row_added[0]).draw();
                                oTableMemberType.row.add(response.row_added[0]).draw();//add new data to card table
                                clearFields(f); //clear all form fields
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }else{

                        var d=oTableMemberType.row(oSelectedRow).data();
                        _data.push({name:"member_type_id",value: d.member_type_id});
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Membership_types/transaction/update",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                oTableMemberType.row(oSelectedRow).data(response.row_updated[0]).draw();
                                clearFields(f); //clear all form fields
                                $('#modal_membership_type').modal('hide');
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