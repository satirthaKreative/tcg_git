

<div class="content-wrapper">

	<section class="content-header">
      <div class="container-fluid">
	        <div class="row mb-2">
	        	<div class="col-sm-6">
					<h1>Archetype editor view</h1>
				</div>
	        </div>
	    </div>	
	</section>


	<div class="archetypr_data p-2">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered table-striped dataTable">
			        <thead>
			            <tr>
			                <th scope="col">Format</th>
			                <th scope="col">Archetype Filter</th>
			                <th scope="col">Archetype Name</th>
			                <th scope="col">Popup .TXT</th>
			                <th scope="col">Acceptance Response</th>
			                <th scope="col">Denial Response (Too similar)</th>
			                <th scope="col"> Denial Response (Type)</th>
			            </tr>
			        </thead>
			        <tbody class="deck-tbl-show">
			        	<?php if(count($article)){ ?>
			            <?php foreach ($article as $key_art) { ?>
			            <tr>
			                <td><?= $key_art->format_name; ?></td>
			                <td><?= $key_art->archetype_filter; ?></td>
			                <td><?= $key_art->archetype_name; ?></td>
			                <td>
			                	<a href="javascript:;" class="btn btn-primary" onclick="popup(<?= $key_art->mainId; ?>)" >Popup</a>
			                </td>
			                <td>
			                	<a href="javascript:void(0);" class="btn btn-success">Accept</a>
			                </td>
			                <td>
			                	<select class="form-control archl_class" name="Archetype" onchange="change_arche_type(<?= $key_art->mainId; ?>)">
			                		<option value="">Archetype 1</option>
			                		<option value="">Archetype 2</option>
			                		<option value="">Archetype 3</option>
			                	</select>
			            	</td>
			                <td>
			                	<a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modal2">Denial (T)</a>
			                </td>
			            </tr>
			            <?php } ?>
			        	<?php }else{ ?>
						<tr>
							<td colspan="7"><span class="text-center text-warning"><i class="fa fa-times"> No Data Available</i></span></td>
						</tr>
			        	<?php } ?>
			        </tbody>
			    </table>
			    <?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>




<!-- Popup Field -->
<div class="modal fade" id="popup_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suspendisse lectus </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
        	<li>4 Elvish Visionary</li>
        	<li>4 Forest</li>
        </ul>
      </div>

    </div>
  </div>
</div>





<!-- modal2 -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Denial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form>
	        <textarea class="form-control" rows="3" placeholder="Type Denial Response Here…"></textarea>
	        <div class="btn-sec text-right mt-2">
	        	<button type="button" class="btn btn-primary">Send</button>
	    	</div>
    	</form>
      </div>
    </div>
  </div>
</div>

<!-- pagination anchor class add -->
<script>
	$(function(){
		$(".page-item a").addClass('page-link');
		// ajax archetype
		$.ajax({
			url: '<?= base_url("Archetype_admin_controller/arche_how_check/") ?>',
			type: 'post',
			dataType: 'json',
			success: function(event){
				console.log(event);
				var html = 'Check Archetype';
				for(var i=0; i<event.length; i++)
				{
					html += '<option value="">'+event[i].archetype_filter+'</option>';
				}
				$(".archl_class").html(html);
			}
		})
	})
</script>
<!-- /End pagination -->

<!-- Popup -->
<script>
	function popup(data)
	{
		$("#popup_field").modal('show');
		$.ajax({
			url: '<?= base_url("Archetype_admin_controller/popup/") ?>'+data,
			type: 'post',
			dataType: 'json',
			success: function(event){
				$(".modal-title:first").html(event[0].archetype_name);
				// $(".modal-body:first").html(event[0].a_details);
				var full_data_str = event[0].a_details;
				values=full_data_str.split(',');
				//$(".modal-body:first").html(values[0]);

				var htmlVal = "";
				$.each(values, function(index,value) {
				  htmlVal += "<li>"+value+"</li>";
				});
				$(".modal-body:first ul").html(htmlVal);
			}
		})
			
	}
</script>
<!-- /Popup -->
<style>
	div#popup_field .modal-body {
	    max-height: 300px;
	    min-height: auto;
	    overflow-y: auto;
	}

	div#popup_field .modal-body ul {
	    padding: 20px;
	}

	div#popup_field .modal-body ul li {
	    display: inline-block;
	    width: 50%;
	    margin-bottom: 6px;
	}
</style>