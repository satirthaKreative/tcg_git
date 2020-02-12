<?php  



    if(!isset($_SESSION['session_data']))



    {



        redirect('');



    }



?>



<section class="inner-page">



    <img class="quote_img" src="<?= base_url('assets/front_assets/images/wrapper_img2.jpg') ?>">



    <div class="wrapper">







        <div class="container">



            <div class="row">



                <div class="page-wrapper col-md-9">

                    <!-- <div class="form-group">

                         <select name="states" id="example" class="form-control"  multiple="multiple" style="display: none;">

                            <option value="AL">Alabama</option>

                            <option value="AK">Alaska</option>

                         </select>

                    </div> -->  



                    <h5>In this Section, select all decks you are willing to provide testing for. You can select multiple platforms simultaneously.  With free platforms or the use of a rental service, you can select all archetypes.</h5>

                    <!-- form -->

                    <form action="" id="provider-my-desk">



                    <div class="filter form-row">

                        

                       

                          

                        <div class="form-group">



                            <!-- <select class="form-control" id="platform_select">



                                



                            </select> -->



                            <select class="form-control platform_select_demo" name="platform_check_data[]" multiple="multiple" id="platform_select" onchange="platform_change()">

                                <!-- <option value="">Choose A Platform</option>

                                <option value="1">MTGA</option>

                                <option value="2">MTGO</option>

                                <option value="3">Cockatrice</option>

                                <option value="4">Xmage</option> -->

                            </select>



                        </div>



                        <div class="form-group" >



                            <select class="form-control" id="format_select" onchange="format_change()">







                            </select>



                        </div>



                    </div>







                    <div class="checkbox-section col-md-10">



                        <p><strong>Don’t see your deck listed?</strong> Use the Deck Editor to submit it to our moderators for addition.</p>







                        <div class="checkbox-content" id="check-join">







                            <!-- file upload -->







                        </div>







                    </div>

                    <button type="button" name="submit_data" class=" text-white" onclick="submit_provider_details()">Submit</button>

                    <span class="suc-msg-add"></span>

                    </form> 

                    <!-- /form-->



                </div>







                <div class="ad-section col-md-3">



                    <img src="<?= base_url('assets/front_assets/images/card_add.png'); ?>">



                </div>



            </div>



        </div>



    </div>



     



    <!-- ZModel -->



     <div class="modal addition_modal" id="myModelDetails" tabindex="-1" role="dialog">



       <div class="modal-dialog" role="document">



         <div class="modal-content">



           <div class="modal-header">



             <h5 class="modal-title">Modal title</h5>



             <button type="button" class="close" data-dismiss="modal" aria-label="Close">



               <span aria-hidden="true">&times;</span>



             </button>



           </div>



           <div class="modal-body">



             <ul>

                <li>4 Elvish Visionary</li>

                 <li>4 Forest</li>

             </ul>



           </div>



         </div>



       </div>



     </div>



     <!-- /Zmodel -->       



</section>







<script>





    // window.onload=function(){

      

        



    // }

    // show format select



    $(function(){



        var data1 = '';



        $.ajax({



            url: '<?= base_url('MyDesk/my_archetype_view'); ?>',



            data: data1,



            type: 'post',



            dataType: 'json',



            success:  function(event)



            {



                // console.log(event);



                var html = '';



                for(var i=0;i<event.length;i++)



                {



                    html += '<div class="form-check"><input class="form-check-input  d'+event[i].id+'" type="checkbox" onclick="my_on_check('+event[i].id+')" value="" id="defaultCheck1"><label class="form-check-label" for="defaultCheck1">'+event[i].archetype_filter+' - <span>'+event[i].archetype_name+'</span></label></div>';



                }



                $("#check-join").html(html);



            }



        });



        //





        var data2 = '';



        $.ajax({



            url: '<?= base_url('MyDesk/show_format'); ?>',



            data: data2,



            type: 'post',



            dataType: 'json',



            success:  function(event)



            {



                var html = '';



                    html += '<option value="">Choose A Format</option>';



                for(var i=0;i<event.length;i++)



                {



                    html += '<option value='+event[i].id+'>'+event[i].format_name+'</option>';



                }



                $("#format_select").html(html);



            }



        });



        // 



        var data = '';



        $.ajax({



            url: '<?= base_url('MyDesk/show_platform'); ?>',



            data: data,



            type: 'post',



            dataType: 'json',



            success:  function(event)



            {



                var html = '';



                    html += '<option value="">Choose A Platform</option>';



                for(var i=0;i<event.length;i++)



                {



                    html += '<option value='+event[i].id+'>'+event[i].platform_name+'</option>';



                }



                $("#platform_select").html(html);

                // platform select demo

                $('.platform_select_demo').val(0);

                $('.platform_select_demo').trigger("chosen:updated");

                // end platform select demo

                // loading multiple select

                var $multiSelects = $("select[multiple='multiple']");

                function install(){

                    $multiSelects.bsMultiSelect();

                }

                install();

                // loading end multi select

            }



        })



    });







    // check format wish date



    function format_change()



    {



        var data_id = $("#format_select").val();



        $.ajax({



            url: '<?= base_url("MyDesk/my_format_change") ?>',



            data: {data_id: data_id},



            type: 'post',



            dataType: 'json',



            success: function(event)



            {



                console.log(event);



                var html = '';



                if(event == false){



                    html += 'No Details Available';



                }



                else



                {



                    for(var i=0;i<event.length;i++)



                    {



                        html += '<div class="form-check"><input class="form-check-input d'+event[i].id+'" type="checkbox" name="archetype_check_name[]" value="'+event[i].id+'" onclick="my_on_check('+event[i].id+')" id="defaultCheck1"><label class="form-check-label" for="defaultCheck1">'+event[i].archetype_filter+' - <span>'+event[i].archetype_name+' </span></label></div>';



                    }



                }







                $("#check-join").html(html);



            }



        })



    }







    // show checkbox details







    function my_on_check(data)



    {



        var data_v = data;



        $.ajax({



            url: '<?= base_url("MyDesk/modelDetailsShow") ?>',



            type: 'post',



            data: {data_v: data_v},



            dataType: 'json',



            success: function(event)



            {

                //alert($(".d"+data).val());

                $(".modal-title:first").html(event[0].archetype_name);

                // $(".modal-body:first").html(event[0].a_details);

                var full_data_str = event[0].a_details;

                values=full_data_str.split(',');

                //$(".modal-body:first").html(values[0]);



                var htmlVal = "";

                $.each(values, function(index,value) {

                  htmlVal += "<li>"+value+"</li>";

                });



                // console.log(event);



                // $(".modal-title").html(event[0].archetype_name);



                // $(".modal-body").find('p').html(event[0].a_details);



                $("#myModelDetails").modal('show');



                $(".modal-body:first ul").html(htmlVal);

            }



        }) 



    }







    // $("#myModelDetails").on("hidden.bs.modal", function () {



    //     // put your default event here



    //     $('.checkbox-content').find('input[type=checkbox]').prop("checked", false);;



    // });



    //show platform select



   



    // function platform_change(){

    //     alert($("#platform_select").val());

    // }





    function submit_provider_details(){

       

        var platform_check = $("#platform_select").val();

        var format_check = $("#format_select").val();

        //alert(platform_check);



        var checked = []

        $("input[name='archetype_check_name[]']:checked").each(function ()

        {

            checked.push(parseInt($(this).val()));

        });



        $.ajax({

            url: '<?= base_url("MyDesk/insertProviderDetails/") ?>',

            type: 'post',

            data: {platform_check:  platform_check, checked: checked,format_check: format_check },

            dataType: 'json',

            success:  function(event)

            {

                if(event.no_error == true)

                {

                    $(".suc-msg-add").html("<b class='text-success'><i class='fa fa-check'></i> "+event.err_msg+"</b>").fadeIn().delay(3000).fadeOut('slow');

                }

                else if(event.no_error == false)

                {

                    $(".suc-msg-add").html("<b class='text-danger'><i class='fa fa-times'></i> No data added</b>").fadeIn().delay(3000).fadeOut('slow');

                }

            }

        })

        // alert(checked);

    }

    



</script>



<!-- /Popup -->

<style>

    div#myModelDetails .modal-body {

        max-height: 300px;

        min-height: auto;

        overflow-y: auto;

    }



    div#myModelDetails .modal-body ul {

        padding: 20px;

    }



    div#myModelDetails .modal-body ul li {

        display: inline-block;

        width: 50%;

        margin-bottom: 6px;

    }

    .mt15{

        margin: 15px;

    }

</style>