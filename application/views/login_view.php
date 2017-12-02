<!DOCTYPE html>
<html lang="en" class="coming-soon">


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

    <body class="focused-form animated-content"  style="background-image: url('assets/images/system/login.jpg');background-size: 100%"  >
		<?php echo $loading; ?>






	<div id="page-header" class="bg-gradient-9" >
    <div id="header-nav-left">
        <div class="user-account-btn ">
         

              
                <span style="color:white;font-family: tahoma;"><img style="padding: 0px;margin: 0px;position:relative;   top:-10px; border-radius: 1px;left:    -5px " height="50x"  width="50px" src="assets/images/system/tango-logo-1.png">  <b>Loyalty Points Management</b></span>
               
            </a>
           
        </div>
    </div><!-- #header-nav-left -->

    <div id="header-nav-right">
       


       
    </div><!-- #header-nav-right -->

</div>
		



        
<div class="container" id="login-form" style="margin-top:10px;" >
	<a href="Login" class="login-logo"></a>
		<div class="row">
       

       
            <div class="col-md-4 col-md-offset-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Login Form</h2>

                    </div>
                    <div class="panel-body">
                        
                        <form action="#" class="form-horizontal" id="validate-form">
                            <div class="form-group mb-md">
                                <div class="col-xs-12">
                                    <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="ti ti-user"></i>
                                        </span>
                                        <input name="user_name" type="text" class="form-control" placeholder="Username" data-parsley-minlength="20" placeholder="At least 6 characters" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-md">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="ti ti-key"></i>
                                        </span>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-n">
                                <div class="col-xs-12">
                                    <a href="#" class="pull-left">Forgot password?</a>
                                    <div class="checkbox-inline icheck pull-right p-n">
                                        <label for="">
                                            <input type="checkbox"></input>
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="clearfix">
                            <button id="btn_register" class="btn btn-default pull-left">Register</button>
                            <button id="btn_login" class="btn btn-primary ladda-button pull-right" data-style="expand-left" data-spinner-color="white" data-size="l"><span class=""></span> Login</button>

                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="#" class="btn btn-label btn-social btn-facebook mb-md"><i class="ti ti-facebook"></i>Connect with Facebook</a>
                    <a href="#" class="btn btn-label btn-social btn-twitter mb-md"><i class="ti ti-twitter"></i>Connect with Twitter</a>
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


            var bindEventHandlers=(function(){

                $('#btn_login').click(function(){



                    validateUser().done(function(response){

                        showNotification(response);

                        if(response.stat=="success"){
                            setTimeout(function(){
                                window.location.href = response.location;
                            },600);
                        }

                    }).always(function(){
                       


                    });


                });


                $('input').keypress(function(evt){
                    if(evt.keyCode==13){ $('#btn_login').click(); }
                });


            })();



            var validateUser=(function(){
                var _data={user_name : $('input[name="user_name"]').val() , password : $('input[name="password"]').val()};

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/validate",
                    "data" : _data,
                    "beforeSend": function(){

                    }
                });
            });


            var showNotification=function(obj){
                PNotify.removeAll(); //remove all notifications
                new PNotify({
                    title:  obj.title,
                    text:  obj.msg,
                    type:  obj.stat
                });
            };




        });
    </script>


</body>


</html>