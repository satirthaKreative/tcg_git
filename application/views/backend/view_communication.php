<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Communication</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Communication</li>
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
              <h3 class="card-title">View Communication</h3> 
              <center class="succ_msg"></center>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Communication Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="view_user_table">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Communication Name</th>
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
  <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Communication</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="update_slot_time_price">
              <div class="form-group">
                <label for="platform_name">Communication Name</label>
                <input type="text" class="form-control" name="communication_name" id="platform_name" aria-describedby="emailHelp" placeholder="Enter Communication Name">
              </div>
            </form>
            <center class="success_msg mt5"></center>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" id="save_data_button" class="btn btn-primary" onclick="update_save_details()">Save Data</button>
          </div>
        </div>
        
      </div>
    </div>
  <script>
    $(function(){
      var data='';
      $.ajax({
        url: '<?= base_url('Admin_desk_controller/view_communication_tbl'); ?>',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(event){
          console.log(event);
          var html = "";
          var j_id = 1;
          for(var i = 0; i < event.length; i++){
            
            html += "<tr><td>"+j_id+"</td><td>"+event[i].communication_name+"</td><td><a href='javascript:;' onclick='my_add("+event[i].id+")' class='btn btn-info'>Edit Communication</a></td></tr>";
            j_id++;
          }
          $("#view_user_table").html(html);
        }
      })
    })

    function my_add(data)
    {
      var data_store = data;
      $('#myModal').modal('toggle');
      $('#myModal').modal('show');

      $.ajax({
        url : '<?= base_url("Admin_desk_controller/show_communication_details/"); ?>'+data_store,
        type: 'post',
        data: data_store,
        dataType: 'json',
        success:  function(event)
        {
          console.log(event);
          $("#platform_name").val(event[0].communication_name);
          $('#save_data_button').attr('onClick', 'update_save_details('+event[0].id+');');
        }
      })
    }

    function update_save_details(data)
    {
      $.ajax({
        url: '<?= base_url("Admin_desk_controller/update_communication_details/") ?>'+data,
        data: $("#update_slot_time_price").serialize(),
        type: 'post',
        dataType: 'json',
        success:  function(event)
        {
          console.log(event);
          if(event.no_error == true)
          {
            $(".success_msg").html("<b class='text-success'> <i class='fa fa-check'></i> "+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
            setTimeout(function(){ $('#myModal').modal('hide');refresh_tbl();  }, 3000);
          }
          else
          {
            $(".success_msg").html("<b class='text-danger'> <i class='fa fa-times'></i> Something went wrong! data don't updated</b>").fadeIn().delay(3000).fadeOut('slow');
          }
        }
      })
    }

    function refresh_tbl()
    {
      var data='';
      $.ajax({
        url: '<?= base_url('Admin_desk_controller/view_communication_tbl'); ?>',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(event){
          console.log(event);
          var html = "";
          var j_id = 1;
          for(var i = 0; i < event.length; i++){
            
            html += "<tr><td>"+j_id+"</td><td>"+event[i].communication_name+"</td><td><a href='javascript:;' onclick='my_add("+event[i].id+")' class='btn btn-info'>Edit Communication</a></td></tr>";
            j_id++;
          }
          $("#view_user_table").html(html);
        }
      })
    }
  </script>