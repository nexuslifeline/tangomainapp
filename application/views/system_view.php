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



<link rel="stylesheet" type="text/css" href="assets/frontend-elements/portfolio-navigation.css">

<!-- Mixitup -->

<div class="portfolio-controls mrg10L mrg10R radius-all-4 portfolio-nav-alt bg-blue clearfix controls">
    <div class="container text-center">
        <ul class="float-none">
            <li class="filter" data-filter="all">Advertisement Images</li>

        </ul>
    </div>
</div>
<div class="clearfix">
<ul id="portfolio-grid" class="reset-ul row">

<?php foreach($advertisements as $item){ ?>

    <li class="col-lg-3 col-sm-6 col-md-4 mix hover_2">
        <div class="thumbnail-box" style="border:10px solid <?php echo ($item->is_active?'black;':'red;'); ?>;">
            <div class="thumb-content">
                <div class="center-vertical">
                    <div class="center-content">
                        <div class="thumb-btn animated bounceInDown">
                            <a href="#" name="btn_mark_active" class="btn btn-md btn-round btn-success" data-image-id="<?php echo $item->advertisement_id; ?>" title="Set as Active"><i class="glyph-icon icon-check"></i></a>
                            <a href="#" name="btn_mark_inactive" class="btn btn-md btn-round btn-gray" data-image-id="<?php echo $item->advertisement_id; ?>" title="Set as Inactive"><i class="glyph-icon icon-remove"></i></a>
                            <a href="#" name="btn_mark_deleted" class="btn btn-md btn-round btn-danger" data-image-id="<?php echo $item->advertisement_id; ?>" title="Delete this Advertisement"><i class="glyph-icon icon-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thumb-overlay bg-primary"></div>
            <img src="<?php echo $item->images; ?>" style="height: 350px;<?php echo ($item->is_active?'':'filter: grayscale(100%);'); ?>" />
        </div>
    </li>





<?php } ?>



</ul>
</div>

<div class="divider"></div>



        <div class="form-group">
                      <div class="col-md-5">
                <div class="input-group">
           
                    <input type="file" name="file_upload[]" class="hidden">
                    
                    <button type="button" id="btn_browse" class="btn btn-primary "  style="margin-top: 2%;text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Import Advertisement Image</button>

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
        </div>
    </div>
</div>




<?php echo $js_dependencies; ?>

<?php if(isset($other_js_dependencies)>0){ ?>
    <?php foreach($other_js_dependencies as $js){ ?>
        <script type="text/javascript" src="<?php echo $js; ?>"></script>
    <?php } ?>
<?php } ?>







<script type="text/javascript" src="assets/widgets/mixitup/mixitup.js"></script>
<script type="text/javascript" src="assets/widgets/mixitup/images-loaded.js"></script>
<script type="text/javascript" src="assets/widgets/mixitup/isotope.js"></script>
<script type="text/javascript" src="assets/widgets/mixitup/portfolio-demo.js"></script>




<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

<script>
    $(document).ready(function(){
       

                $('#btn_browse').click(function(event){
                        event.preventDefault();
                        $('input[name="file_upload[]"]').click();
                    });
                });



                $('#portfolio-grid').on('click','a[name="btn_mark_active"]',function(){
                    var objList=$(this).closest('li');
                    var id=$(this).data('image-id');

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"System_setup/transaction/set-active",
                        "data": {advertisement_id:id}
                    }).done(function(response){
                        showNotification(response);
                        if(response.stat=="info"){
                            objList.find('img').css('filter','none');
                            objList.find('.thumbnail-box').css('border','10px solid black');
                        }
                    });


                });


                $('#portfolio-grid').on('click','a[name="btn_mark_inactive"]',function(){
                    var objList=$(this).closest('li');
                    var id=$(this).data('image-id');

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"System_setup/transaction/set-inactive",
                        "data": {advertisement_id:id}
                    }).done(function(response){
                        showNotification(response);
                        if(response.stat=="info"){
                            objList.find('img').css('filter','grayscale(100%)');
                            objList.find('.thumbnail-box').css('border','10px solid red');
                        }
                    });
                });


                $('#portfolio-grid').on('click','a[name="btn_mark_deleted"]',function(){
                    var objList=$(this).closest('li');
                    var id=$(this).data('image-id');

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"System_setup/transaction/delete-advertisement",
                        "data": {advertisement_id:id}
                    }).done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){
                            objList.fadeOut(750, function() {
                                $(this).remove();
                            });
                        }
                    });
                });




    $('input[name="file_upload[]"]').change(function(event){
                            var _files=event.target.files;


                            var data=new FormData();
                            $.each(_files,function(key,value){
                                data.append(key,value);
                            });

                            var btn=$('#btn_browse');
                            $.ajax({
                                url : 'System_setup/transaction/upload',
                                type : "POST",
                                data : data,
                                cache : false,
                                dataType : 'json',
                                processData : false,
                                contentType : false,
                                beforeSend: function(){
                                    showSpinningProgress(btn);
                                },
                                success : function(response){
                                    $('#portfolio-grid').append(createImageStructure(response));
                                }
                            }).always(function(){
                                showSpinningProgress(btn);
                            });

                        });



                var createImageStructure=function(data){
                    return     '<li class="col-lg-3 col-sm-6 col-md-4 mix hover_2" style="display: inline-block; opacity: 1;">'+
                                '<div class="thumbnail-box" style="border:10px solid black;">'+
                                '<div class="thumb-content">'+
                                '<div class="center-vertical">'+
                                '<div class="center-content">'+
                                '<div class="thumb-btn animated bounceInDown">'+
                                '<a href="#" name="btn_mark_active" class="btn btn-md btn-round btn-success" data-image-id="'+data.advertisement_id+'" title="Set as Active"><i class="glyph-icon icon-check"></i></a>'+
                                '<a href="#" name="btn_mark_inactive" class="btn btn-md btn-round btn-gray" data-image-id="'+data.advertisement_id+'" title="Set as Inactive"><i class="glyph-icon icon-remove"></i></a>'+
                                '<a href="#" name="btn_mark_deleted" class="btn btn-md btn-round btn-danger" data-image-id="'+data.advertisement_id+'" title="Delete this Advertisement"><i class="glyph-icon icon-trash"></i></a>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="thumb-overlay bg-primary"></div>'+
                                '<img src="'+data.path+'" style="height: 350px;" />'+
                                '</div>'+
                                '</li>';

                };



</script>

</div>
</body>

</html>