<!DOCTYPE html>
<html  lang="en">

<head>



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

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}


        .gradient-bg{
            height: 750px;
            width: 100%;
            background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
            opacity: 0.95;
        }

        h1{
            font-family: "Source Sans Pro", "Segoe UI", "Droid Sans", Tahoma, Arial, sans-serif;
            color: black;
            font-size: 70px;;
        }


        h2{
            font-family: "Source Sans Pro", "Segoe UI", "Droid Sans", Tahoma, Arial, sans-serif;
            color: black;
            font-size: 30px;;
        }


        table.gridtable {
            font-family: verdana,arial,sans-serif;
            font-size:14px;
            color:#333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
        }
        table.gridtable th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #04b4e7;
        }

        table.gridtable tfoot tr:last td {
            border-width: 1px;
            font-size:14px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
        }

        table.gridtable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }

        #owl-demo{
            display: block;
            overflow: hidden;
            width: 100%;
            height: 100vh;
            position: relative;
            background: #fff;
        }.items{
             width: 100%;
             height: 100%;
             overflow: hidden;
             z-index: 20;
             visibility: inherit;
             opacity: 1;
         }#owl-demo .item img{
              display: block;
              width: 100%;
              height: 100%;
          }
        div.owl-prev,div.owl-next{
            position: absolute;
            top:30%;
        }div.owl-prev{
             left: 0;
         }div.owl-next{
              right: 0;
          }.owl-controls.clickable .owl-buttons div{
               width: 20px;
               height: 100px;
               line-height: 100px;
               text-align: center;
               color: #fff;
               font-size: 20px;
               background: rgba(0,0,0, 0.7);
               border-radius: 0;
               -webkit-transition: all 0.2s ease-in-out;
               transition: all 0.2s ease-in-out;
           }.owl-pagination{
                position: absolute;
                bottom: 20px;
                left: 50%;
            }.owl-controls .owl-page span{
                 cursor: pointer;
                 position: relative !important;
                 background: rgba(0, 0, 0, 0.5) !important;
                 -webkit-border-radius: 10px;
                 border-radius: 10px;
                 -webkit-box-shadow: none;
                 -moz-box-shadow: none;
                 box-shadow: none;
                 width: 6px !important;
                 height: 6px !important;
                 border: 5px solid rgba(0, 0, 0, 0) !important;
                 display: inline-block;
                 margin-right: 2px !important;
                 margin-bottom: 0px !important;
                 -webkit-transition: background-color 0.2s, border-color 0.2s;
                 -moz-transition: background-color 0.2s, border-color 0.2s;
                 transition: background-color 0.2s, border-color 0.2s;
                 float:none !important;
                 box-sizing:content-box;
                 -moz-box-sizing:content-box;
                 -webkit-box-sizing:content-box;
             }.owl-controls .owl-page.active span{
                  background: rgba(255, 255, 255, 1) !important;
                  width: 6px !important;
                  height: 6px !important;
                  border: 5px solid rgba(0, 0, 0, 1) !important;
                  -webkit-box-shadow: none;
                  box-shadow: none;
              }



    </style>




</head>


<body style="height:100%, min-height:100%;width:100%, min-width:100%;" class="gradient-bg">
    <div class="row" id="div_advertisement">
        <div class="col-lg-12">
            <div class="example-box-wrapper">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">


                        <?php
                        $i=0;
                        foreach($advertisements as $item){  ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i===0?'active':''); ?>"></li>


                            <?php $i++; } ?>



                    </ol>
                    <div class="carousel-inner">
                        <?php
                            $i=0;
                        foreach($advertisements as $item){  ?>
                            <div class="item <?php echo ($i===0?'active':''); ?>">
                                <center><img src="<?php echo $item->images; ?>"  style="height: 70%;width: 100%;"></center>
                            </div>
                        <?php $i++; } ?>


                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyph-icon icon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyph-icon icon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="row" style="display: none;" id="div_transactions">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel" style="margin-top: 5px;margin-left: 20px;padding: 3%;">
                        <div class="panel-body" style="min-height: 665px;min-width: 700px;max-height: 400px;overflow: auto;">
                            <br />
                            <div id="transaction_info" style="display: none;">
                                <center>

                                    <h1 id="header_name" style="font-size: 40px;">Congratulations, Paul Christian Rueda!!</h1>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <h1 id="header_statement" style="">You have earned</h1>
                                    <h1 id="header_points" style="font-size: 110px;color:black;">100 Points</h1>


                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <h1 id="header_thanks" style="font-size: 40px;">Thank you!!</h1>


                                </center>
                            </div>


                            <div id="transaction_items" style="display: none;">


                                <h2>Hi! Your transactions are, </h2><br />
                                <table id="tbl_items" style="border:1px solid lightgray;font-font:tahoma;" class="gridtable" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>

                                        <th width="10%">Qty</th>
                                        <th >Description</th>
                                        <th width="12%" style="text-align: right">Points</th>
                                        <th width="12%" style="text-align: right">Total</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" style="height: 50px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><strong><i class="glyph-icon icon-star"></i> Total Points :</strong></td>
                                            <td style="text-align: center;font-weight: 600;color: red;" colspan="2" id="cell_total"><b>0.00</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        </div>
    </div>

    <div class="row" style="visibility: hidden;">
        <div class="col-lg-12">
            <div class="panel" style="margin-left: 20px;margin-right: 20px;">
                <div class="panel-body" style="min-height: 120px;min-width: 750px;background: transparent;">


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

    <!-- Owl carousel -->

    <link rel="stylesheet" type="text/css" href="assets/plugins/carousel/owlcarousel.css">
    <script type="text/javascript" src="assets/plugins/carousel/owlcarousel.js"></script>
    <script type="text/javascript" src="assets/plugins/carousel/owlcarousel-demo.js"></script>






    <script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });


    $(document).ready(function() {

        // carousel setup
        $(".owl-carousel").owlCarousel({
            navigation : false,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem: true,
            autoHeight: true,
            afterMove: top_align,
        });

        function top_align() {
            $(window).scrollTop(0);
            console.log('move');
        }

    });

    </script>



</body>

</html>