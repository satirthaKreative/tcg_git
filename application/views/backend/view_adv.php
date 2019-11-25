<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Advertize</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Advertize</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">View Advertize</h3> 
              <center class="succ_msg"></center>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Advertize</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="view_user_table">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Advertize</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(function(){
      var data='';
      $.ajax({
        url: '<?= base_url('Dashboard/full_adv_view'); ?>',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(event){
          console.log(event);
          var html = "";
          var j_id = 1;
          for(var i = 0; i < event.length; i++){
            // checking status
            if(event[i].image_status == 1){ 
              var suc = "<button type='button' class='btn btn-success' onclick='mydeactive("+event[i].id+")'>Enable</button>";
            }else if(event[i].image_status == 0){
              var suc = "<button type='button' class='btn btn-danger' onclick='myactive("+event[i].id+")'>Disable</button>";
            }
            // checking video / image
            if(event[i].type_iv == 'i'){ 
              var data_show = "<img src='<?php echo base_url(); ?>"+event[i].adv_images+"' height='100' width='200'  alt='Image not found'/>";
              var data_type = '<b style="color:green;">Image</b>';
            }else if(event[i].type_iv == 'v'){
              var data_show = "<video width='200' height='100' controls><source src='<?php echo base_url(); ?>"+event[i].adv_images+"'></video>";
              var data_type = '<b style="color:#0b8bf9;">Video</b>';
            }
            html += "<tr><td>"+j_id+"</td><td>"+data_show+"</td><td>"+data_type+"</td><td>"+suc+"</td></tr>";
            j_id++;
          }
          $("#view_user_table").html(html);
        }
      })
    })
    function mydeactive(id)
    {
      $.ajax({
        url: '<?= base_url('Dashboard/deactive_adv/'); ?>'+id,
        type: 'post',
        data: id,
        dataType: 'json',
        success: function(event){
          if(event.no_error == true){
            $(".succ_msg").html('<b style="color:green;"> <i class="fa fa-check"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
            setTimeout(function(){ window.location.href='<?= base_url('Dashboard/view_advertise'); ?>' }, 3000);
          }else{
            $(".succ_msg").html('<b style="color:red;"> <i class="fa fa-times"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
          }
        }
      });
    }
    function myactive(id)
    {
      $.ajax({
        url: '<?= base_url('Dashboard/active_adv/'); ?>'+id,
        type: 'post',
        data: id,
        dataType: 'json',
        success: function(event){
          if(event.no_error == true){
            $(".succ_msg").html('<b style="color:green;"> <i class="fa fa-check"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
            setTimeout(function(){ window.location.href='<?= base_url('Dashboard/view_advertise'); ?>' }, 3000);
          }else{
            $(".succ_msg").html('<b style="color:red;"> <i class="fa fa-times"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
          }
        }
      });
    }
  </script>