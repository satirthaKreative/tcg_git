<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Advertisement</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>">Home</a></li>
             <li class="breadcrumb-item active">Add Advertisement</li>
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
             <h3 class="card-title">Add Image Advertise</h3>

             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                 <i class="fas fa-minus"></i></button>
             </div>
           </div>
           <div class="card-body">
             <?= form_open_multipart('Dashboard/add_advertisement', ['id'=>'form_adv_img']); ?>
             <div class="form-group">
               <label for="inputName">Image Advertize</label>
               <input type="file" id="multiFiles" class="form-control" name="image_user_files[]" multiple >
               <p><small class="text-danger">* Upload multiple images</small></p>
             </div>
             <input type="button" value="Save Images" class="btn btn-success float-right" id="submit_img">
             <?= form_close(); ?>
             <center class="success_msg mt5" style="display: none;"></center>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
   	</div>
   	<div class="row">
       <div class="col-md-6">
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">Add Video Advertise</h3>

             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                 <i class="fas fa-minus"></i></button>
             </div>
           </div>
           <div class="card-body">
             <?= form_open_multipart('Dashboard/add_advertisement', ['id'=>'form_adv_video']); ?>
             <div class="form-group">
               <label for="inputName">Video Advertize</label>
               <input type="file" id="inputName_video" class="form-control" name="video_user_files[]" multiple>
               <p><small class="text-danger">* Upload multiple videos</small></p>
             </div>
             <input type="button" value="Save videos" class="btn btn-success float-right" id="submit_video">
             <?= form_close(); ?>
             <center class="success_msg1 mt5" style="display: none;"></center>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
     </div>
   </section>
   <!-- /.content -->
 </div>

<script type="text/javascript">
    $(document).ready(function (e) {
        $('#submit_img').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('multiFiles').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("image_user_files[]", document.getElementById('multiFiles').files[x]);
            }
            $.ajax({
                url: '<?= base_url('Dashboard/upload_image'); ?>', // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    console.log(response); // display success response from the server
                    if(response.no_error == true)
                    {
                    	$("input[type='file']").val('');
                    	$(".success_msg").html("<b style='color:green;'><i class='fa fa-check'></i>"+response.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
                    }
                    else if(response.no_error == false)
                    {
                    	$("input[type='file']").val('');
                    	$(".success_msg").html("<b style='color:red;'><i class='fa fa-times'></i>"+response.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
                    }
                },
                error: function (response) {
                    console.log(response); // display error response from the server
                }
            });
        });
    });

    $(document).ready(function (e) {
        $('#submit_video').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('inputName_video').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("video_user_files[]", document.getElementById('inputName_video').files[x]);
            }
            $.ajax({
                url: '<?= base_url('Dashboard/upload_video'); ?>', // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    console.log(response); // display success response from the server
                    if(response.no_error == true)
                    {
                    	$("input[type='file']").val('');
                    	$(".success_msg1").html("<b style='color:green;'><i class='fa fa-check'></i> "+response.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
                    }
                    else if(response.no_error == false)
                    {
                    	$("input[type='file']").val('');
                    	$(".success_msg1").html("<b style='color:red;'><i class='fa fa-times'></i> "+response.main_error+"</b>").fadeIn().delay(3000).fadeOut('slow');
                    }
                },
                error: function (response) {
                    console.log(response); // display error response from the server
                }
            });
        });
    });
</script>