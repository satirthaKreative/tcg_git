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

          <h1>Add Archetype Filters</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>">Home</a></li>

            <li class="breadcrumb-item active">Archetype Filter View</li>

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

            <h3 class="card-title">Add Archetype Filter </h3>



            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-plus" aria-hidden="true"></i>
            </button>

          </div>

          <div class="accordion-content" style="display: block;">

            <?= form_open('Dashboard/update_admin_details', ['id'=>'voult_time_slot']); ?>

            <div class="form-group" id="voult_price_solt_view">

              <div class="row">

                <div class="col-sm-5">

                  <label for="choose_format_data">Choose Format </label>

                  <select  class="form-control choose_format_data" name="format_name1[]" value="" placeholder="Archetype Format Name" required="required">

                    

                  </select>

                </div>

                <div class="col-sm-5">

                  <label for="tot_voult_time0">Filter Name </label>

                  <input type="text" id="tot_voult_time0" class="form-control" name="filter_name[]" value="" placeholder="Archetype Filter Name">

                </div>

                <div class="col-sm-1">

                  <a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more(1)"><i class="fa fa-plus"></i></a>

                </div>

                <div class="col-sm-1">

                  

                </div>

                

              </div>

            </div>

                <center class="succ_msg1 mt5"></center>

                <input type="button" value="Save Data" class="btn btn-success float-right" onclick="add_time_solt_in_voult();" id="insert_slot_time">

            <?= form_close(); ?>

          </div>

          <!-- /.card-body -->


          <div class="accordion-toggle">

            <h3 class="card-title">Add Archetype Name </h3>


            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-plus" aria-hidden="true"></i>
            </button>

          </div>

          <div class="accordion-content">

            <?= form_open('Dashboard/update_admin_details', ['id'=>'voult_time_slot1']); ?>

            <div class="form-group" id="voult_price_solt_view1">

              <div class="row">

                <div class="col-sm-5">

                  <label for="choose_filter_data">Choose Filter </label>

                  <select  class="form-control choose_filter_data" name="filter_name1[]" value="" placeholder="Archetype Filter Name" required="required">

                    

                  </select>

                </div>

                <div class="col-sm-5">

                  <label for="tot_voult_time0">Archetype Name </label>

                  <input type="text" id="tot_voult_time0" class="form-control" name="archetype_name1[]" value="" placeholder="Archetype Name">

                </div>

                <div class="col-sm-1">

                  <a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more1(1)"><i class="fa fa-plus"></i></a>

                </div>

                <div class="col-sm-1">

                  

                </div>

                

              </div>

            </div>

                <center class="succ_msg2 mt5"></center>

                <input type="button" value="Save Data" class="btn btn-success float-right" onclick="add_time_solt_in_voult1();" id="insert_slot_time">

            <?= form_close(); ?>

          </div>


        </div>

        <!-- /.card -->

      </div>



      <div class="col-md-6">

        <div class="card card-primary">

          

          <!-- /.card-body -->

        </div>

        <!-- /.card -->

      </div>

    </div>

  </section>

  <!-- /.content -->

</div>



<script>

  $(function(){

    // filter

    $.ajax({

      url: '<?= base_url('Archetype_filter/view_archetype_filter'); ?>',

      type: 'post',

      dataType: 'json',

      success:  function(event)

      {

        console.log(event);

          var html = '';

              html += '<option value="">Choose Filter</option>';

          for(var i = 0 ; i < event.length ; i++)

          {

              html += '<option value="'+event[i].id+'">'+event[i].archetype_filter+'</option>'; 

          }

          $(".choose_filter_data").html(html);

      }

    });

    // format

    $.ajax({

      url: '<?= base_url('Archetype_filter/view_archetype_format'); ?>',

      type: 'post',

      dataType: 'json',

      success:  function(event)

      {

        console.log(event);

          var html = '';

              html += '<option value="">Choose Format</option>';

          for(var i = 0 ; i < event.length ; i++)

          {

              html += '<option value="'+event[i].id+'">'+event[i].format_name+'</option>'; 

          }

          $(".choose_format_data").html(html);

      }

    })

  })







  function add_more(data)

  {

    var data = data+1;



    $("#voult_price_solt_view").append('<div class="row" id="ad_quick'+data+'"><div class="col-sm-5"><label for="choose_filter_data">Choose Filter </label><select  class="form-control choose_format_data" name="format_name1[]" value="" placeholder="Archetype Filter Name" required="required"></select></div><div class="col-sm-5"><label for="tot_voult_time0">Filter Name </label><input type="text" id="tot_voult_time0" class="form-control" name="filter_name[]" value="" placeholder="Archetype Filter Name"></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more(1)"><i class="fa fa-plus"></i></a></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-danger add_more_btn" onclick="remove_more('+data+')"><i class="fa fa-times"></i></a></div></div>');

    show_double1();

    

  }



  function remove_more(data)

  {

    $("#ad_quick"+data).remove();

  }



  function add_time_solt_in_voult()

  {

    $.ajax({

      url: '<?= base_url("Archetype_filter/add_archetype_filter"); ?>',

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





  function add_more1(data1)

  {

    var data1 = data1+1;



    $("#voult_price_solt_view1").append('<div class="row" id="ad_quick1'+data1+'"><div class="col-sm-5"><label for="choose_filter_data">Choose Filter </label><select class="form-control choose_filter_data" name="filter_name1[]" value="" placeholder="Archetype Filter Name" required="required"></select></div><div class="col-sm-5"><label for="tot_voult_time0">Archetype Name </label><input type="text" id="tot_voult_time0" class="form-control" name="archetype_name1[]" value="" placeholder="Archetype Name"></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-success add_more_btn" onclick="add_more1('+data1+')"><i class="fa fa-plus"></i></a></div><div class="col-sm-1"><a href="javascript:;" name="add_more" class="btn btn-danger add_more_btn" onclick="remove_more1('+data1+')"><i class="fa fa-times"></i></a></div></div>');



    show_double();

    

  }



  function remove_more1(data)

  {

    $("#ad_quick1"+data).remove();

  }



  function show_double()

  {

    var data = '';

    $.ajax({

      url: '<?= base_url('Archetype_filter/view_archetype_filter'); ?>',

      type: 'post',

      data: data,

      dataType: 'json',

      success:  function(event)

      {

        console.log(event);

          var html = '';

              html += '<option value="">Choose Filter</option>';

          for(var i = 0 ; i < event.length ; i++)

          {

              html += '<option value="'+event[i].id+'">'+event[i].archetype_filter+'</option>'; 

          }

          $(".choose_filter_data").html(html);

      }

    })

  }



  function add_time_solt_in_voult1()

  {

    $.ajax({

      url: '<?= base_url("Archetype_filter/add_archetype_filter1"); ?>',

      type: 'post',

      data: $("#voult_time_slot1").serialize(),

      dataType: 'json',

      success: function(event)

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



  function show_double1()

  {

    $.ajax({

      url: '<?= base_url('Archetype_filter/view_archetype_format'); ?>',

      type: 'post',

      dataType: 'json',

      success:  function(event)

      {

        console.log(event);

          var html = '';

              html += '<option value="">Choose Format</option>';

          for(var i = 0 ; i < event.length ; i++)

          {

              html += '<option value="'+event[i].id+'">'+event[i].format_name+'</option>'; 

          }

          $(".choose_format_data").html(html);

      }

    })

  }

</script>