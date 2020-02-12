<style>

  .add_more_btn{

    margin-top: 31px;

    border-radius: 20px;

  }

</style>

<!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper" >

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <div class="container-fluid">

       <div class="row mb-2">

         <div class="col-sm-6">

           <h1>Desk Editor</h1>

         </div>

         <div class="col-sm-6">

           <ol class="breadcrumb float-sm-right">

             <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>">Home</a></li>

             <li class="breadcrumb-item active">Add Desk Details</li>

           </ol>

         </div>

       </div>

     </div><!-- /.container-fluid -->

   </section>



   <!-- Main content -->

   <section class="content">

    <div class="row">

      <div class="col-md-6 accordion_content">

        <div class="accordion">

          <div class="accordion-toggle active">

            <h3 class="card-title">Add Platform</h3>

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-plus" aria-hidden="true"></i>
            </button>

          </div>

          <div class="accordion-content" style="display: block;">

            <?= form_open('Dashboard/update_admin_details', ['id'=>'platform_form']); ?>

            <div class="form-group" id="voult_price_solt_view">

              <div class="row">

                <div class="col-sm-10">

                  <label for="tot_voult_time0">Platform name </label>

                  <input type="text" id="tot_voult_time0" class="form-control" name="platform_name[]" value="" placeholder="Enter Platform Name">

                </div>

                <div class="col-sm-1">

                  <a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more_platform(1)"><i class="fa fa-plus"></i></a>

                </div>

                <div class="col-sm-1">

                  

                </div>

                

              </div>

            </div>

                <input type="button" value="Save Platform Details" class="btn btn-success float-right" onclick="add_platform();" id="insert_slot_time">

            <?= form_close(); ?>

            <center class="succ_msg1 mt5" style="display: none;"></center>

          </div>

          <!-- /.card-body -->

          

          <div class="accordion-toggle">

            <h3 class="card-title">Add Format</h3>

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-plus" aria-hidden="true"></i>
            </button>

          </div>

          <div class="accordion-content">

            <?= form_open('Dashboard/update_admin_details', ['id'=>'format_form']); ?>

            <div class="form-group" id="voult_price_solt_view1">

              <div class="row">

                <div class="col-sm-10">

                  <label for="tot_voult_time0">Format name </label>

                  <input type="text" id="tot_voult_time0" class="form-control" name="format_name[]" value="" placeholder="Enter Format Name">

                </div>

                <div class="col-sm-1">

                  <a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more_format(1)"><i class="fa fa-plus"></i></a>

                </div>

                <div class="col-sm-1">

                  

                </div>

                

              </div>

            </div>

                <input type="button" value="Save Format Details" class="btn btn-success float-right" onclick="add_format();" id="insert_slot_time">

            <?= form_close(); ?>

            <center class="succ_msg2 mt5" style="display: none;"></center>

          </div>

          <!-- /.card -->


          <div class="accordion-toggle">

            <h3 class="card-title">Add Communiaction</h3>

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fa fa-plus" aria-hidden="true"></i>
            </button>

          </div>

          <div class="accordion-content">

            <?= form_open('Dashboard/update_admin_details', ['id'=>'communication_form']); ?>

            <div class="form-group" id="voult_price_solt_view2">

              <div class="row">

                <div class="col-sm-10">

                  <label for="tot_voult_time0">Communication Type </label>

                  <input type="text" id="tot_voult_time0" class="form-control" name="communication_name[]" value="" placeholder="Enter communication Name">

                </div>

                <div class="col-sm-1">

                  <a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more_communication(1)"><i class="fa fa-plus"></i></a>

                </div>

                <div class="col-sm-1">

                  

                </div>

                

              </div>

            </div>

                <input type="button" value="Save Communication Details" class="btn btn-success float-right" onclick="add_communication();" id="insert_slot_time">

            <?= form_close(); ?>

            <center class="succ_msg3 mt5" style="display: none;"></center>

          </div>

          <!-- /.card-body -->

      </div>
      
    </div>

      

    </div>

   </section>

   <!-- /.content -->

 </div>



 <!-- Adding Platform -->

 <script>



  // platform script

   function add_more_platform(data)

   {

      var data = data+1;



      $("#voult_price_solt_view").append('<div class="row" id="ad_platform'+data+'"><div class="col-sm-10"><label for="tot_voult_time0">Platform name </label><input type="text" id="tot_voult_time0" class="form-control" name="platform_name[]" value="" placeholder="Enter Platform Name"></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more_platform('+data+')"><i class="fa fa-plus"></i></a></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-danger add_more_btn" onclick="remove_more_platform('+data+')"><i class="fa fa-times"></i></a></div></div>');

   }



   function remove_more_platform(data)

   {

     $("#ad_platform"+data).remove();

   }



   function add_platform()

   {

      $.ajax({

        url : '<?= base_url('Admin_desk_controller/add_platform'); ?>',

        type: 'post',

        data: $("#platform_form").serialize(),

        dataType: 'json',

        success:  function(event)

        {

          console.log(event);

          if(event.no_error == true)

          {

            $(".succ_msg1").html("<b style='color:green;'> <i class ='fa fa-check'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

          }

          else if(event.no_error == false)

          {

            $(".succ_msg1").html("<b style='color:red;'> <i class ='fa fa-times'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

          }

        }

      })

   }



   // format script

   function add_more_format(data)

   {

      var data = data+1;



      $("#voult_price_solt_view1").append('<div class="row" id="ad_platform1'+data+'"><div class="col-sm-10"><label for="tot_voult_time0">Format name </label><input type="text" id="tot_voult_time0" class="form-control" name="format_name[]" value="" placeholder="Enter Format Name"></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more_format('+data+')"><i class="fa fa-plus"></i></a></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-danger add_more_btn" onclick="remove_more_format('+data+')"><i class="fa fa-times"></i></a></div></div>');

   }



   function remove_more_format(data)

   {

     $("#ad_platform1"+data).remove();

   }



   function add_format()

   {

      $.ajax({

        url : '<?= base_url('Admin_desk_controller/add_format'); ?>',

        type: 'post',

        data: $("#format_form").serialize(),

        dataType: 'json',

        success:  function(event)

        {

          console.log(event);

          if(event.no_error == true)

          {

            $(".succ_msg2").html("<b style='color:green;'> <i class ='fa fa-check'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

          }

          else if(event.no_error == false)

          {

            $(".succ_msg2").html("<b style='color:red;'> <i class ='fa fa-times'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

          }

        }

      })

   }



   // communication script

   function add_more_communication(data)

   {

      var data = data+1;



      $("#voult_price_solt_view2").append('<div class="row" id="ad_platform2'+data+'"><div class="col-sm-10"><label for="tot_voult_time0">Communication name </label><input type="text" id="tot_voult_time0" class="form-control" name="communication_name[]" value="" placeholder="Enter Communication Name"></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more_communication('+data+')"><i class="fa fa-plus"></i></a></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-danger add_more_btn" onclick="remove_more_communication('+data+')"><i class="fa fa-times"></i></a></div></div>');

   }



   function remove_more_communication(data)

   {

     $("#ad_platform2"+data).remove();

   }



   function add_communication()

   {

      $.ajax({

        url : '<?= base_url('Admin_desk_controller/add_communication'); ?>',

        type: 'post',

        data: $("#communication_form").serialize(),

        dataType: 'json',

        success:  function(event)

        {

          console.log(event);

          if(event.no_error == true)

          {

            $(".succ_msg3").html("<b style='color:green;'> <i class ='fa fa-check'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

          }

          else if(event.no_error == false)

          {

            $(".succ_msg3").html("<b style='color:red;'> <i class ='fa fa-times'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

          }

        }

      })

   }

 </script>