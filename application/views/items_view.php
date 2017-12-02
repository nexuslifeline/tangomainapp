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
                                                                <b><i class="glyph-icon icon-gear"></i> Item Information</b>
                                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_items" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Item</th>
                                                    <th>Category</th>
                                                    <th style="text-align: right">Redeem</th>
                                                    <th style="text-align: right">Reward</th>
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




<!--modal-->
<div class="modal fade" id="modal_items_info" tabindex="-1" role="dialog" aria-labelledby="modal_items_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Item Information</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">

                                <div class="example-box-wrapper">
                                    <form id="frm_items_info" class="form-horizontal bordered-row">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">* Item Code : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="item_code" placeholder="Item Code"  data-error-msg="Item Code is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Item Description : </label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="item_name" placeholder="Item Description / Name" data-error-msg="Item Name is required." required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Category : </label>

                                            <div class="col-sm-8">
                                                <select name="category_id" id="cbo_categories" data-error-msg="Item Category is required." required>
                                                    <option value="0">[ Create New Category ]</option>
                                                    <?php foreach($categories as $category){ ?>
                                                        <option value="<?php echo $category->category_id; ?>"><?php echo $category->cat_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block m-b-none">Required. Please select the category of item.</span>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Reward Points : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control numeric" style="text-align: right" name="acquired_points_reward" placeholder="Reward Points">
                                                <span class="help-block m-b-none">This is the Points to be acquired upon purchase.</span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Redeem Points : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control numeric" style="text-align: right" name="required_points_redeem" placeholder="Required Points">
                                                <span class="help-block m-b-none">This is the Points to be required for redeem.</span>
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
</div><!--modal-->


<div class="modal fade" id="modal_new_category" tabindex="-1" role="dialog" aria-labelledby="modal_items_infoLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 35%;">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Category Information</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">

                                <div class="example-box-wrapper">
                                    <form id="frm_category_info" class="form-horizontal bordered-row">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">* Category : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="cat_name" placeholder="Category"  data-error-msg="Category is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description : </label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="cat_description" placeholder="Description"></textarea>
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

                <button id="btn_create_category" type="button" class="btn btn-primary"><b><i class="glyph-icon icon-check-circle-o"></i> <span class=""></span> Save this Record</b></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!--modal-->



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
        var _txnMode; var oTableItems; var oSelectedRow; var _cboCategory;

        //*******************************************************************************************************************
        var initializeControls=function(){
            oTableItems=$('#tbl_items').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Items/transaction/list",
                "columns": [

                    { targets:[1],data: "item_code" },
                    { targets:[2],data: "item_name" },
                    { targets:[3],data: "cat_name" },
                    {
                        targets:[4],data: "required_points_redeem",
                        render: function (data, type, full, meta){
                            return accounting.formatNumber(data,2);
                        }
                    },
                    {
                        targets:[5],data: "acquired_points_reward",
                        render: function (data, type, full, meta){
                            return accounting.formatNumber(data,2);
                        }
                    },
                    {
                        targets:[6],
                        render: function (data, type, full, meta){
                            return '<center><a href="#" id="edit_info"><i class="glyph-icon icon-edit"></i></a> <a href="#" id="delete_info"><i class="glyph-icon icon-trash"></i></a></center>';
                        }
                    }
                ],

                "createdRow": function ( row, data, index ) {
                    $(row).find('td').eq(4).attr('style','text-align:right');
                    $(row).find('td').eq(3).attr('style','text-align:right');
                }

            });


            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Create New Item" >'+
                    '<i class="glyph-icon icon-gear"></i> <b> Create New Item</b></button>';
                $("div.toolbar").html(_btnNew);
            }();


            _cboCategory=$("#cbo_categories").select2({
                placeholder: "Please select category.",
                allowClear: true
            });

            _cboCategory.select2('val', null);






        }();
        //*******************************************************************************************************************



        var bindEventHandlers=function(){

            //new
            $('#btn_new').click(function(){
                _txnMode="new";

                var m=$('#modal_items_info');
                clearFields(m);
                m.modal('show');

            });

            //delete
            $('#tbl_items').on('click','#delete_info',function(){
                oSelectedRow=$(this).closest('tr'); //selected row
                $('#modal_confirmation').modal('show');
            });

            //confirm delete
            $('#confirm_delete').click(function(){
                //alert("ENTER OVERRIDE HERE!!!!");
                $('#modal_confirmation').modal('hide');
                var d=oTableItems.row(oSelectedRow).data();
                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Items/transaction/delete",
                    "data":[{name:"item_id",value: d.item_id}]
                }).done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        oTableItems.row(oSelectedRow).remove().draw();
                    }

                });
            });


            //edit
            $('#tbl_items').on('click','#edit_info',function(){
                _txnMode="edit";
                oSelectedRow=$(this).closest('tr');
                var data=oTableItems.row(oSelectedRow).data();
                var _parent=$('#modal_items_info');
                $('input,textarea',_parent).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });

                _cboCategory.select2('val', data.category_id);
                $('#modal_items_info').modal('show');
            });


            //save
            $('#btn_save_record').click(function(){
                var btn=$(this);
                var f=$('#frm_items_info');

                if(validateRequiredFields(f)){

                    var _data=f.serializeArray(); //serialize data in array format

                    if(_txnMode=="new"){
                        //save new card info
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Items/transaction/create",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                //oTableItems.row(oSelectedRow).data(response.row_added[0]).draw();
                                oTableItems.row.add(response.row_added[0]).draw();//add new data to card table
                                clearFields(f); //clear all form fields
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }else{

                        var d=oTableItems.row(oSelectedRow).data();
                        _data.push({name:"item_id",value: d.item_id});
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Items/transaction/update",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                oTableItems.row(oSelectedRow).data(response.row_updated[0]).draw();
                                clearFields(f); //clear all form fields
                                $('#modal_items_info').modal('hide');
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }


                }
            });



            //show new category
            //loads modal to create new department
            _cboCategory.on("select2:select", function (e) {

                var i=$(this).select2('val');

                if(i==0){ //new category
                    _cboCategory.select2('val',null)

                    var m=$('#modal_new_category');
                    m.modal('show');
                    clearFields(m);

                }

            });


            //create category
            $('#btn_create_category').click(function(){
                var f=$('#frm_category_info');
                var _data=f.serializeArray();
                var btn=$(this);

                if(validateRequiredFields(f)){
                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"Categories/transaction/create",
                        "data":_data,
                        "beforeSend" : function(){
                            showSpinningProgress(btn);
                        }
                    }).done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){
                            var _category=response.row_added[0];
                            $('#cbo_categories').append('<option value="'+_category.category_id+'" selected>'+_category.cat_name+'</option>');
                            $('#cbo_categories').select2('val',_category.category_id);
                            $('#modal_new_category').modal('hide');
                        }

                    }).always(function(){
                        showSpinningProgress(btn);
                    });
                }
            });



        }();






    });


</script>

</div>
</body>

</html>