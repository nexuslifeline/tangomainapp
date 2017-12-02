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






#main{
    margin: 15px auto;
    background:white;
    overflow: auto;
    width: 100%;
}
#header{
    background:white;
    margin-bottom:15px;
}
#mainbody{
    background: white;
    width:100%;
    display:none;
}
#footer{
    background:white;
}
#v{
    width:320px;
    height:240px;
}
#qr-canvas{
    display:none;
}
#outdiv
{
    width:320px;
    height:240px;
    border: solid;
    border-width: 3px 3px 3px 3px;
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
                                                                <b><i class="glyph-icon icon-gear"></i> Card Enlistment</b>
                                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="example-box-wrapper">

                                            <table id="tbl_cards" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Remarks</th>
                                                    <th>Received Date</th>
                                                    <th>Registered By</th>
                                                    <th>Activated</th>
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
<div class="modal fade" id="modal_card_enlistment" tabindex="-1" role="dialog" aria-labelledby="modal_card_enlistmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Card Information</b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">

                                <div class="example-box-wrapper">
                                    <form id="frm_card_info" class="form-horizontal bordered-row">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">* Card Code : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="card_code" name="card_code" placeholder="Scan or Enter Card Code"  data-error-msg="Card Code is required." required>     
                                               
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Enable WebCam Scanner
                                                
                                <i class="glyphicon glyphicon-camera"></i>
                                                </label>
                                            <i class="glyphicon glyphicon-ok"></i> 
                                            On <input type="radio" name="activate_camera" id="activate_camera">

                                                <i class="glyphicon glyphicon-remove"></i> Off <input type="radio"  name="activate_camera" id="off_camera">
                                            <div class="col-sm-8" > 
                                                

                                               



<div  id="cam_div" >
    <div id="main">
    
    <div id="mainbody">
    <table class="tsel" border="0" width="100%">
    <tr>
    <td valign="top" align="center" width="50%">
    <table class="tsel" border="0">
    <tr>
    <td colspan="2" align="center">
    <div id="outdiv">
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>

    <tr>
    <td colspan="3" align="center"></td>
    </tr>
    </table>
    </div>&nbsp;
    </div>
    <canvas id="qr-canvas" width="800" height="600"></canvas>
</div>




















                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description : </label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Remarks : </label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control" name="remarks" placeholder="Remarks"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Received : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control date-picker" name="date_received" placeholder="Date Received"  data-error-msg="Date Received is required." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Branch : </label>
                                            <div class="col-sm-8">
                                                <select name="branch_id" id="cbo_branches">
                                                    <?php foreach($branches as $branch){ ?>
                                                        <option value="<?php echo $branch->branch_id; ?>"><?php echo $branch->branch_name; ?></option>
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



<script type="text/javascript" src="assets/plugins/web_qr/llqrcode.js"></script>




<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

<script>
    $(document).ready(function(){
        var _cboBranches; var _txnMode; var oTableCard; var oSelectedRow;

        //*******************************************************************************************************************
        var initializeControls=function(){
            oTableCard=$('#tbl_cards').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Cards/transaction/list",
                "columns": [

                    { targets:[1],data: "card_code" },
                    { targets:[2],data: "description" },
                    { targets:[3],data: "remarks" },
                    { targets:[4],data: "date_received" },
                    { targets:[5],data: "registered_by" },
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
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Register New Card" > '+ 
                   
                    '<i class="glyph-icon icon-gear"></i> <b>Register New Card</b></button>';
                    $("div.toolbar").html(_btnNew);
            }();


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
                var m=$('#modal_card_enlistment');

                clearFields(m);
                m.modal('show');


            });

            //delete
            $('#tbl_cards').on('click','#delete_info',function(){
                oSelectedRow=$(this).closest('tr'); //selected row
                $('#modal_confirmation').modal('show');
            });

            //confirm delete
            $('#confirm_delete').click(function(){
                //alert("ENTER OVERRIDE HERE!!!!");
                $('#modal_confirmation').modal('hide');
                var d=oTableCard.row(oSelectedRow).data();
                    $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Cards/transaction/delete",
                    "data":[{name:"card_id",value: d.card_id}]
                }).done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){
                            oTableCard.row(oSelectedRow).remove().draw();
                        }

                });
            });


            //edit
            $('#tbl_cards').on('click','#edit_info',function(){
                _txnMode="edit";
                oSelectedRow=$(this).closest('tr');
                var data=oTableCard.row(oSelectedRow).data();
                var _parent=$('#modal_card_enlistment');
                $('input,textarea',_parent).each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                });
                $('#modal_card_enlistment').modal('show');
            });


            //save
            $('#btn_save_record').click(function(){
                var btn=$(this);
                var f=$('#frm_card_info');

                if(validateRequiredFields(f)){

                    var _data=f.serializeArray(); //serialize data in array format

                    if(_txnMode=="new"){
                        //save new card info
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Cards/transaction/create",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                //oTableCard.row(oSelectedRow).data(response.row_added[0]).draw();
                                oTableCard.row.add(response.row_added[0]).draw();//add new data to card table
                                clearFields(f); //clear all form fields
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }else{

                        var d=oTableCard.row(oSelectedRow).data();
                        _data.push({name:"card_id",value: d.card_id});
                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Cards/transaction/update",
                            "data":_data,
                            "beforeSend" : function(){
                                showSpinningProgress(btn);
                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                oTableCard.row(oSelectedRow).data(response.row_updated[0]).draw();
                                clearFields(f); //clear all form fields
                                $('#modal_card_enlistment').modal('hide');
                            }

                        }).always(function(){
                            showSpinningProgress(btn);
                        });
                    }


                }
            });

        }();





        $('#activate_camera').click(function(){
                load();
                $("#cam_div").show()
                $('#card_code').prop('readonly',true);
            });



        $('#off_camera').click(function(){
                stopStream();
                initCanvas(0, 0);
                $("#cam_div").hide();
                $('#card_code').prop('readonly',false);
            });


var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;

var stopThis;

var imghtml='<div id="qrfile"><canvas id="out-canvas" width="320" height="240"></canvas>'+
    '<div id="imghelp">drag and drop a QRCode here'+
    '<br>or select a file'+
    '<input type="file" onchange="handleFiles(this.files)"/>'+
    '</div>'+
'</div>';

var vidhtml = '<video id="v" autoplay></video>';

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;
  if(files.length>0)
  {
    handleFiles(files);
  }
  else
  if(dt.getData('URL'))
  {
    qrcode.decode(dt.getData('URL'));
  }
}

function handleFiles(f)
{
    var o=[];
    
    for(var i =0;i<f.length;i++)
    {
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

            qrcode.decode(e.target.result);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]); 
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if(stype!=1)
        return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                qrcode.decode();
            }
            catch(e){       
                console.log(e);
               stopThis =  setTimeout(captureToCanvas, 500);
            };
        }
        catch(e){       
                console.log(e);
              stopThis =  setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function read(a)
{
    var html="";
    if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
        html+="<a target='_blank' href='"+a+"'>"+a+"</a>";
    html+=""+htmlEntities(a)+"";
    document.getElementById("card_code").value =html; 
 
}   


function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}
function success(stream) {
    if(webkit)
        v.src = window.URL.createObjectURL(stream);
    


    else
    if(moz)
    {
        v.mozSrcObject = stream;
        v.play();
    }
    else
        v.src = stream;
    gUM=true;
stopThis =   setTimeout(captureToCanvas, 500);
}
       





function error(error) {
    gUM=false;
    return;
}

function load()
{

                gCtx = null;
                gCanvas = null;
                c=0;
                stype=0;
                gUM=false;
                webkit=false;
                moz=false;
                v=null;

    if(isCanvasSupported() && window.File && window.FileReader)
    {
        initCanvas(800, 600);
        qrcode.callback = read;
        document.getElementById("mainbody").style.display="inline";
        setwebcam();
    }
    else
    {
        document.getElementById("mainbody").style.display="inline";
        document.getElementById("mainbody").innerHTML='<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>'+
        '<br><p id="mp2">sorry your browser is not supported</p><br><br>'+
        '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
    }
}

function setwebcam()
{
    
    var options = true;
    if(navigator.mediaDevices && navigator.mediaDevices.enumerateDevices)
    {
        try{
            navigator.mediaDevices.enumerateDevices()
            .then(function(devices) {
              devices.forEach(function(device) {
                if (device.kind === 'videoinput') {
                  if(device.label.toLowerCase().search("back") >-1)
                    options={'deviceId': {'exact':device.deviceId}, 'facingMode':'environment'} ;
                }
                console.log(device.kind + ": " + device.label +" id = " + device.deviceId);
              });
              setwebcam2(options);
            });
        }
        catch(e)
        {
            console.log(e);
        }
    }
    else{
        console.log("no navigator.mediaDevices.enumerateDevices" );
        setwebcam2(options);
    }
    
}

function setwebcam2(options)
{
    console.log(options);
    

    if(stype==1)
    {
               stopThis =  setTimeout(captureToCanvas, 500);    
        return;
    }
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");


    if(n.getUserMedia)
    {
        webkit=true;
        n.getUserMedia({video: options, audio: false}, success, error);
    }
    else
    if(n.webkitGetUserMedia)
    {
        webkit=true;
        n.webkitGetUserMedia({video:options, audio: false}, success, error);
    }
    else
    if(n.mozGetUserMedia)
    {
        moz=true;
        n.mozGetUserMedia({video: options, audio: false}, success, error);
    }


    stype=1;
    stopThis =    setTimeout(captureToCanvas, 500);
}








function stopStream () {

    v.pause();
    v.src = "";
    clearTimeout(stopThis);
    error();


}

function setimg()
{
    document.getElementById("result").innerHTML="";
    if(stype==2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    document.getElementById("qrimg").style.opacity=1.0;
    document.getElementById("webcamimg").style.opacity=0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);  
    qrfile.addEventListener("dragover", dragover, false);  
    qrfile.addEventListener("drop", drop, false);
    stype=2;
}






    });


</script>

</div>
</body>

</html>