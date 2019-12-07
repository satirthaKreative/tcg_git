<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Format</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Format</li>
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
              <h3 class="card-title">View Format</h3> 
              <center class="succ_msg"></center>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Format Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="view_user_table">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Format Name</th>
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
            <h4 class="modal-title">Edit Format</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="update_slot_time_price">
              <div class="form-group">
                <label for="platform_name">Format Name</label>
                <input type="text" class="form-control" name="format_name" id="platform_name" aria-describedby="emailHelp" placeholder="Enter Format Name">
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
    <!-- Delete Model -->
    <div class="modal fade dlt_message" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
           <div class="successfull-msg">
               <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path></svg>
               
               <h4>Message deleted successfully</h4>
               </div>
          </div>
          
        </div>
      </div>
    </div>
  <script>
    $(function(){
      var data='';
      $.ajax({
        url: '<?= base_url('Admin_desk_controller/view_format_tbl'); ?>',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(event){
          console.log(event);
          var html = "";
          var j_id = 1;
          for(var i = 0; i < event.length; i++){
            
            html += "<tr><td>"+j_id+"</td><td>"+event[i].format_name+"<a href='javascript:;' onclick='my_remove("+event[i].id+")' style='float: right;'><i class='fa fa-trash' style='color:red'></i></a></td><td><a href='javascript:;' onclick='my_add("+event[i].id+")' class='btn btn-info'>Edit Format</a></td></tr>";
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
        url : '<?= base_url("Admin_desk_controller/show_format_details/"); ?>'+data_store,
        type: 'post',
        data: data_store,
        dataType: 'json',
        success:  function(event)
        {
          console.log(event);
          $("#platform_name").val(event[0].format_name);
          $('#save_data_button').attr('onClick', 'update_save_details('+event[0].id+');');
        }
      })
    }

    function update_save_details(data)
    {
      $.ajax({
        url: '<?= base_url("Admin_desk_controller/update_format_details/") ?>'+data,
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
        url: '<?= base_url('Admin_desk_controller/view_format_tbl'); ?>',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(event){
          console.log(event);
          var html = "";
          var j_id = 1;
          for(var i = 0; i < event.length; i++){
            
            html += "<tr><td>"+j_id+"</td><td>"+event[i].format_name+"</td><td><a href='javascript:;' onclick='my_add("+event[i].id+")' class='btn btn-info'>Edit Format</a></td></tr>";
            j_id++;
          }
          $("#view_user_table").html(html);
        }
      })
    }

    function my_remove(data)

    {

      if(confirm('Are you want to delete this item ?'))

      {

        var data_val = data;

        $.ajax({

          url: '<?= base_url('Admin_desk_controller/delete_format/') ?>',

          type: 'post',

          data: {data_val: data_val},

          dataType:  'json',

          success:  function(event)

          {

            if(event.no_error == true)

            {

              $("#delete_modal").modal('show');

              // $(".succ_msg").html("<b class='text-success'>"+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');

              setTimeout(function(){ $("#delete_modal").modal('hide');window.location.href='<?= base_url("Admin_desk_controller/view_format"); ?>' },3000);

            }

            else

            {

              $(".succ_msg").html("<b class='text-danger'>Action Not Successfully Done</b>").fadeIn().delay(3000).fadeOut('slow');

            }

          }

        })

      }

      else

      {



      }

    }
  </script>