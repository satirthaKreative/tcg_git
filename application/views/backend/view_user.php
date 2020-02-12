<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Users</li>
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
              <h3 class="card-title">View Users</h3> 
              <center class="succ_msg"></center>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="view_user_table">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>User Email</th>
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
        url: '<?= base_url('Dashboard/view_users'); ?>',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(event){
          console.log(event);
          var html = "";
          var j_id = 1;
          for(var i = 0; i < event.length; i++){
            if(event[i].approve_status == 1){ 
              var suc = "<button type='button' class='btn btn-success' onclick='mydeactive("+event[i].id+")'>Active</button>";
            }else if(event[i].approve_status == 0){
              var suc = "<button type='button' class='btn btn-danger' onclick='myactive("+event[i].id+")'>Deactive</button>";
            }
            html += "<tr><td>"+j_id+"</td><td>"+event[i].user_name+"</td><td>"+event[i].user_email+"</td><td>"+suc+"</td></tr>";
            j_id++;
          }
          $("#view_user_table").html(html);
        }
      })
    })
    function mydeactive(id)
    {
      $.ajax({
        url: '<?= base_url('Dashboard/deactive_user/'); ?>'+id,
        type: 'post',
        data: id,
        dataType: 'json',
        success: function(event){
          if(event.no_error == true){
            $(".succ_msg").html('<b style="color:green;"> <i class="fa fa-check"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
            setTimeout(function(){ window.location.href='<?= base_url('Dashboard/Users'); ?>' }, 3000);
          }else{
            $(".succ_msg").html('<b style="color:red;"> <i class="fa fa-times"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
          }
        }
      });
    }
    function myactive(id)
    {
      $.ajax({
        url: '<?= base_url('Dashboard/active_user/'); ?>'+id,
        type: 'post',
        data: id,
        dataType: 'json',
        success: function(event){
          if(event.no_error == true){
            $(".succ_msg").html('<b style="color:green;"> <i class="fa fa-check"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
            setTimeout(function(){ window.location.href='<?= base_url('Dashboard/Users'); ?>' }, 3000);
          }else{
            $(".succ_msg").html('<b style="color:red;"> <i class="fa fa-times"></i>'+event.main_error+'</b>').fadeIn().delay(3000).fadeOut('slow');
          }
        }
      });
    }
  </script>