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
                <div class="page-wrapper col-md-10">
                    <h5>In this Section, select all decks you are willing to provide testing for. You can select multiple platforms simultaneously.  With free platforms or the use of a rental service, you can select all archetypes.</h5>

                    <div class="filter form-row">
                        <div class="form-group">
                            <select class="form-control" id="platform_select">
                                
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
                </div>

                <div class="ad-section col-md-2">
                    <img src="<?= base_url('assets/front_assets/images/ad-this.png'); ?>">
                </div>
            </div>
        </div>
    </div>
     
    <!-- ZModel -->
     <div class="modal" id="myModelDetails" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Modal title</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <p>Modal body text goes here.</p>
           </div>
         </div>
       </div>
     </div>
     <!-- /Zmodel -->       
</section>

<script>
    // show platform select
    $(function(){
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
            }
        })
    })

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
                    html += '<div class="form-check"><input class="form-check-input  d'+event[i].id+'" type="checkbox" onclick="my_on_check('+event[i].id+')" value="" id="defaultCheck1"><label class="form-check-label" for="defaultCheck1">'+event[i].archetype_filter+'<br><strong>( '+event[i].archetype_name+' )</strong></label></div>';
                }
                $("#check-join").html(html);
            }
        });
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
                        html += '<div class="form-check"><input class="form-check-input d'+event[i].id+'" type="checkbox" value="" onclick="my_on_check('+event[i].id+')" id="defaultCheck1"><label class="form-check-label" for="defaultCheck1">'+event[i].archetype_filter+'<br><strong>( '+event[i].archetype_name+' )</strong></label></div>';
                    }
                }

                $("#check-join").html(html);
            }
        })
    }

    // show checkbox details
    $(function(){
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
    })

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
                console.log(event);
                $(".modal-title").html(event[0].archetype_name);
                $(".modal-body").find('p').html(event[0].a_details);
                $("#myModelDetails").modal('show');
            }
        }) 
    }

    $("#myModelDetails").on("hidden.bs.modal", function () {
        // put your default event here
        $('.checkbox-content').find('input[type=checkbox]').prop("checked", false);;
    });

    
</script>