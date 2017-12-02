




<div class="modal fade" id="modal_setup_reward" tabindex="-1" role="dialog" aria-labelledby="modal_members_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-gradient-9">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>&times;</b></button>
                <h4 class="modal-title" style="color: white;font-family: tahoma;"><b><i class="glyph-icon icon-bars"></i> Reward Preference </b></h4>
            </div>
            <div class="modal-body" style="padding: 1%;font-family: tahoma;">


                <form id="frm_preference_reward">
                <div class="panel">
                    <div class="panel-body">
                       <div class="row">
                           <div class="col-lg-8">
                               Send Reward Points (Member Birthday) :
                               <div class="div_reward_preference_loader" style="display: none;">
                                   <img src="assets/images/loader/facebook.gif" />
                               </div>

                               <div class="div_reward_preference">

                                   <select name="auto_points" class="form-control">
                                       <option value="1">Enable</option>
                                       <option value="0">Disable</option>
                                   </select>
                               </div>
                           </div>

                           <div class="col-lg-4">
                               Points :
                               <div class="div_reward_preference_loader" style="display: none;">
                                   <img src="assets/images/loader/facebook.gif" />
                               </div>
                               <div class="div_reward_preference">
                                    <input text="text" name="send_points" class="form-control" />
                               </div>
                           </div>
                       </div>

                        <br />

                        <div class="row">
                            <div class="col-lg-12">
                                Greetings :<br />
                                <div class="div_reward_preference_loader" style="display: none;">
                                    <img src="assets/images/loader/facebook.gif" />
                                </div>
                                <div class="div_reward_preference">
                                    <textarea name="greetings" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                </form>
            </div>
            <div class="modal-footer">

                <button id="btn_save_reward_preference" type="button" class="btn btn-primary"><i class="glyph-icon icon-check-circle"></i><span class=""></span> <b> Save Preference</b></button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!--modal members-->






<script type="text/javascript" src="assets/assets-minified/js-core.js"></script>
<script type="text/javascript" src="assets/assets-minified/admin-all-demo.js"></script>


<script type="text/javascript" src="assets/resources/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets/resources/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="assets/resources/widgets/datatable/datatable-tabletools.js"></script>


<!-- PNotify -->
<script type="text/javascript" src="assets/plugins/notify/pnotify.core.js"></script>
<script type="text/javascript" src="assets/plugins/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="assets/plugins/notify/pnotify.nonblock.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>




<script type="text/javascript">
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
        $(f).find('input:first').focus();

        $('.date-picker').val("<?php echo date('m/d/Y'); ?>");
    };



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

        return stat;
    };

    //initialize datepicker fields
    $('.date-picker').val("<?php echo date('m/d/Y'); ?>");
    $('.date-picker').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    //initialize auto-numeric fields
    $('.numeric').autoNumeric('init');


    //make sure to focus on the first input element of active modal
    $('.modal').on('shown.bs.modal',function(){    	
    	$(this).find('input').first().focus();
    });

</script>


<script>
    $(document).ready(function(){

        $('#link_setup_reward').click(function(e){
            $.ajax({
                "dataType":"json",
                "type":"GET",
                "url":"System_setup/transaction/get-reward-preference",
                "beforeSend": function(){
                    $('.div_reward_preference_loader').show();
                    $('.div_reward_preference').hide();
                }
            }).done(function(response){
                if(response.length>0){
                    $('select[name="auto_points"]').val(response[0].is_reward_enabled);
                    $('input[name="send_points"]').val(accounting.formatNumber(response[0].reward_points,0));
                    $('textarea[name="greetings"]').val(response[0].greetings);
                }


            }).always(function(){
                $('.div_reward_preference_loader').hide();
                $('.div_reward_preference').show();
            });


            $('#modal_setup_reward').modal('show');

        });

        $('#btn_save_reward_preference').click(function(){

            var btn=$(this);
            var _data=$('#frm_preference_reward').serializeArray();

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"System_setup/transaction/reward-preference",
                "data":_data,
                "beforeSend": showSpinningProgress(btn)
            }).done(function(response){
                showNotification(response);
                if(response.stat=="success"){
                    $('#modal_setup_reward').modal('hide');
                }
            }).always(function(){
                showSpinningProgress(btn);
            });
        });


    });

</script>