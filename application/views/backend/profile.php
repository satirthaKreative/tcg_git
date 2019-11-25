

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile View</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Profile View</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <?= form_open('Dashboard/update_admin_details', ['id'=>'form_admin']); ?>
              <div class="form-group">
                <label for="inputName">User Name</label>
                <input type="text" id="inputName" class="form-control" name="user_name" value="">
              </div>
              <div class="form-group">
                <label for="inputEmail">User Email</label>
                <input type="text" id="inputEmail" class="form-control" name="user_email" value="">
              </div>
              <div class="form-group">
                <label for="inputPass">User password</label>
                <input type="password" id="inputPass" class="form-control" name="user_pass" value="">
              </div>
              <div class="form-group">
                <label for="inputDescription">About Admin</label>
                <textarea id="inputDescription" class="form-control" name="about_des" rows="4"></textarea>
              </div>
              <!-- <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
              </div> -->
              <!-- <div class="form-group">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" id="inputProjectLeader" class="form-control">
              </div> -->
              <input type="button" value="Update Admin Details" class="btn btn-success float-right" onclick="update_details();">
              <?= form_close(); ?>
              <center class="success_msg mt5" style="display: none;"></center>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" class="form-control">
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <!-- <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div> -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
// view admin details
$(function(){
  var data = "";
  $.ajax({
    url: '<?= base_url('Dashboard/view_admin_details'); ?>',
    type: 'post',
    data: data,
    dataType: 'json',
    success: function(event){
      console.log(event);
      // console.log(event[0].id);
      $('#inputName').val(event[0].user_name);
      $('#inputPass').val(event[0].user_pass);
      $('#inputEmail').val(event[0].user_email);
      $('#inputDescription').val(event[0].about_des);
    }
  });
});
// admin update details
function update_details(){
  $.ajax({
    url: '<?= base_url("Dashboard/update_admin_details"); ?>',
    type: 'post',
    data: $("#form_admin").serialize(),
    dataType: 'json',
    success:  function(event){
      if(event.no_error == true){
        $(".success_msg").html("<b style='color:green;'><i class='fa fa-check'></i> "+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
      }else if(event.no_error == false){
        $(".success_msg").html("<b style='color:red;'><i class='fa fa-times'></i> "+event.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
      }    
    }
  })
} 
</script>