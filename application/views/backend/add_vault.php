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

          <h1>Add Vault details</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>">Home</a></li>

            <li class="breadcrumb-item active">Vault View</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>



  <!-- Main content -->

  <section class="content">

    <div class="row">

      <div class="col-md-6 add_vault_details accordion_content">

        <div class="accordion">

          <div class="accordion-toggle active">

              <h3 class="card-title">Add Voult Details</h3>


              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-plus" aria-hidden="true"></i>
              </button>

          </div>

          <div class="accordion-content" style="display: block;">

            <?= form_open('Dashboard/update_admin_details', ['id'=>'form_admin']); ?>

            <div class="form-group">

              <label for="tot_voult_time">Total Time In Voult (<i style="color: red;">* in hours</i>)</label>

              <input type="number" id="tot_voult_time" class="form-control" name="total_voult_time" value="" min="1">

            </div>

            <input type="button" value="Save Total Time" class="btn btn-success float-right" onclick="total_voult();" id="insert_total_time">

            <input type="button" value="Update Total Time" class="btn btn-success float-right" onclick="update_total_voult();" id="update_total_time">

            <?= form_close(); ?>

            <center class="success_msg mt5" style="display: none;"></center>

          </div>
          <!-- /.card-body -->


          <div class="accordion-toggle">

              <h3 class="card-title">Add Voult Details</h3>


              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

                <i class="fa fa-plus" aria-hidden="true"></i>
              </button>

          </div>


          <div class="accordion-content" >
            <?= form_open('Dashboard/update_admin_details', ['id'=>'voult_time_slot']); ?>

            <div class="form-group" id="voult_price_solt_view">

              <div class="row">

                <div class="col-sm-3">

                  <label for="tot_voult_time0">Time Slot </label>

                  <input type="number" id="tot_voult_time0" class="form-control" name="time_slot[]" value="" min="1">

                </div>

                <div class="col-sm-3">

                  <label for="tot_voult_time1">Time Type</label>

                  <select name="time_type[]" class="form-control" required="required">

                    <option value="">Choose Time Type</option>

                    <option value="hours">Hours</option>

                    <option value="min">Minutes</option>

                  </select>

                </div>

                <div class="col-sm-3">

                  <label for="tot_voult_time2">Price Solt</label>

                  <input type="number" id="tot_voult_time2" class="form-control" name="time_slot_price[]" value="" min="1">

                </div>

                <div class="col-sm-2">

                  <label for="tot_voult_time3"></label>

                  <a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more(1)"><i class="fa fa-plus"></i></a>

                </div>

                <div class="col-sm-1">

                  

                </div>

                

              </div>

            </div>

                <center class="succ_msg1 mt5"></center>

                <input type="button" value="Save Time Slot & Price" class="btn btn-success float-right" onclick="add_time_solt_in_voult();" id="insert_slot_time">

            <!-- <input type="button" value="Save Total Time" class="btn btn-success float-right" onclick="total_voult();" id="insert_total_time">

            <input type="button" value="Update Total Time" class="btn btn-success float-right" onclick="update_total_voult();" id="update_total_time"> -->

            <?= form_close(); ?>

            <center class="succ_msg1 mt5" style="display: none;"></center>
          </div>
          <!-- /.card -->

        </div>

      </div>

    </div>

    

  </section>

  <!-- /.content -->

</div>

<!-- /.content-wrapper -->

<script>

  function total_voult()

  {

    var tot_voult_time = $("#tot_voult_time").val();

    var in_sec = parseInt(tot_voult_time)*3600;

    var in_min = parseInt(tot_voult_time)*60;



    $.ajax({

      url: '<?= base_url("Voult_Controller/add_total_voult_time"); ?>',

      data: {tot_voult_time:tot_voult_time,in_sec:in_sec,in_min:in_min},

      type: 'post',

      dataType: 'json',

      success:  function(event){

        console.log(event);

      }

    })

  }

  function update_total_voult()

  {

    var tot_voult_time = $("#tot_voult_time").val();

    var in_sec = parseInt(tot_voult_time)*3600;

    var in_min = parseInt(tot_voult_time)*60;



    $.ajax({

      url: '<?= base_url("Voult_Controller/update_total_voult_time"); ?>',

      data: {tot_voult_time:tot_voult_time,in_sec:in_sec,in_min:in_min},

      type: 'post',

      dataType: 'json',

      success:  function(event){

        console.log(event);

        if(event.no_error == true)

        {

          $("#tot_voult_time").val('');

          $(".success_msg").html("<b style='color:green;'> <i class ='fa fa-check'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');



        }

        else if(event.no_error == false)

        {

          $(".success_msg").html("<b style='color:red;'> <i class ='fa fa-times'></i>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

        }

      }

    })

  }

  $(function(){

    $.ajax({

      url: '<?= base_url("Voult_Controller/check_voult_total_time"); ?>',

      type: 'post',

      dataType: 'json',

      success:  function(event){

        if(event.total_count_res_time == 1)

        {

          $("#insert_total_time").hide();

          $("#update_total_time").show();

        }

        else if(event.total_count_res_time == 0)

        {

          $("#update_total_time").hide();

          $("#insert_total_time").show();

        }

      }

    })

  })



  function add_more(data)

  {

    var data = data+1;



    $("#voult_price_solt_view").append('<div class="row" id="ad_quick'+data+'"><div class="col-sm-3"><label for="tot_voult_time">Time Solt </label><input type="number" id="tot_voult_time" class="form-control" name="time_slot[]" value="" min="1"></div><div class="col-sm-3"><label for="tot_voult_time">Time Type</label><select name="time_type[]" class="form-control" required="required"><option value="">Choose Time Type</option><option value="hours">Hours</option><option value="min">Minutes</option></select></div><div class="col-sm-3"><label for="tot_voult_time">Price Solt</label><input type="number" id="tot_voult_time" class="form-control" name="time_slot_price[]" value="" min="1"></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more('+data+')"><i class="fa fa-plus"></i></a></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-danger add_more_btn" onclick="remove_more('+data+')"><i class="fa fa-times"></i></a></div><div class="col-sm-1"></div></div>');

    

  }



  function remove_more(data)

  {

    $("#ad_quick"+data).remove();

  }



  function add_time_solt_in_voult()

  {

    $.ajax({

      url: '<?= base_url("Voult_Controller/add_slot_time_price"); ?>',

      type: 'post',

      data: $("#voult_time_slot").serialize(),

      dataType: 'json',

      success: function(event)

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

</script>