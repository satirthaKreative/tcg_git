



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

				<table class="table table-responsive table-bordered table-striped dataTable">

			        <thead>

			            <tr>
			            	<th scope="col">Client Name</th>

			                <th scope="col">Card Name</th>

			                <th scope="col">Format</th>

			                <th scope="col">Archetype Filter</th>

			                <th scope="col">Archetype Name</th>

			                <th scope="col">Popup .TXT</th>

			                <th scope="col">Acceptance Response</th>

			                <th scope="col">Denial Response (Too similar)</th>

			                <th scope="col">Denial Response (Type)</th>

			            </tr>

			        </thead>

			        <tbody class="deck-tbl-show">

			        	<?php if(count($article)){ ?>

			            <?php foreach ($article as $key_art) { ?>

			            <tr id="deckTblId<?= $key_art->mainId; ?>">
			            	<td><?= $key_art->user_name; ?></td>

			                <td><?= $key_art->card_name; ?></td>

			                <td><?= $key_art->main_format_name; ?></td>

			                <td>

			                    <select class="form-control arche-filter-class" name="Archetype_Filter">

			                    	<option value="">Archetype 1</option>

			                    	<option value="">Archetype 2</option>

			                    	<option value="">Archetype 3</option>

			                    </select>

			               	</td>

			                <td>
			                	<select class="form-control archl_class" name="Archetype" id="archl_class1" onchange="change_arche_type(<?= $key_art->mainId; ?>)">

			                		<option value="">Archetype 1</option>

			                		<option value="">Archetype 2</option>

			                		<option value="">Archetype 3</option>

			                	</select>
			                </td>

			                <td>

			                	<a href="javascript:;" class="btn btn-primary" onclick="popup(<?= $key_art->mainId; ?>)" >Popup</a>

			                </td>

			                <td>

			                	<a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#ac_modal">Accept</a>

			                </td>

			                <td>

			                	<select class="form-control archl_class" name="Archetype" id="archl_class2" onchange="change_arche_type1(<?= $key_art->mainId; ?>)">

			                		<option value="">Archetype 1</option>

			                		<option value="">Archetype 2</option>

			                		<option value="">Archetype 3</option>

			                	</select>

			            	</td>

			                <td>

			                	<a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modal2">Denial (T)</a>

			                	<a href="javascript: ;" class="refresh_link" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a>

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

        	<!-- <li>4 Elvish Visionary</li>

        	<li>4 Forest</li> -->

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
			<select class="form-control mb-2">
		      <option value="">Archetype Filter</option>
		      <option value="">Aggro</option>
		    </select>
	        <textarea class="form-control" rows="3" placeholder="Type Denial Response Here…"></textarea>

	        <div class="btn-sec text-right mt-2">

	        	<button type="button" class="btn btn-primary">Send</button>

	    	</div>

    	</form>

      </div>

    </div>

  </div>

</div>

<!-- Accepet Modal -->

<div class="modal fade" id="ac_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      	<form>
			<div class="form-row mb-2">
				<div class="col-6">
					<select class="form-control">
				      <option value="">Select Option</option>
				      <option value="">Select Option2</option>
				    </select>

			    </div>

				<div class="col-6">
					<input type="email" class="form-control" placeholder="name@example.com">
			    </div>
			</div>
	        

	        <textarea class="form-control" placeholder="Your response" rows="3"></textarea>

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

		// archetype filter select box

		$.ajax({

			url: '<?= base_url("Archetype_admin_controller/arche_how_check/") ?>',

			type: 'post',

			dataType: 'json',

			success: function(event){

				// console.log(event);

				var html = '<option value="">Check Archetype</option>';

				for(var i=0; i<event.length; i++)

				{

					html += '<option value="'+event[i].id+'">'+event[i].archetype_filter+'</option>';

				}

				$(".arche-filter-class").html(html);

			}

		})

		// archetype name

		$.ajax({
			url: '<?= base_url("Archetype_admin_controller/arche_name_check/") ?>',

			type: 'post',

			dataType: 'json',

			success: function(event){

				// console.log(event);

				var html = '<option value="">Archetype Name</option>';

				for(var i=0; i<event.length; i++)

				{

					html += '<option value="'+event[i].id+'">'+event[i].archetype_name+'</option>';

				}

				$(".archl_class").html(html);

			}
		})
		

		

	});

	// change archetype
	function change_arche_type(response_data)
	{
		var dataT1 = $("#archl_class2").val();
		var dataT2 = $("#archl_class1").val();

		if(dataT1 != ''){
			dataTA = dataT1;
		}else if(dataT2 != ''){
			dataTA = dataT2;
		}

		$.ajax({
			url: '<?= base_url("Archetype_admin_controller/checking_arche_name/") ?>',
			type: 'post',
			data: {dataTA: dataTA},
			dataType: 'json',
			success: function(event){
				$("#deckTblId"+response_data).find("#archl_class1").html(event.pagination_data);
				$("#deckTblId"+response_data).find("#archl_class2").html(event.pagination_data);
				// success data
			}
		})
	}

	// change archetype1
	function change_arche_type1(response_data)
	{
		var dataT1 = $("#archl_class2").val();
		var dataT2 = $("#archl_class1").val();

		if(dataT1 != ''){
			dataTA = dataT1;
		}else if(dataT2 != ''){
			dataTA = dataT2;
		}

		$.ajax({
			url: '<?= base_url("Archetype_admin_controller/checking_arche_name/") ?>',
			type: 'post',
			data: {dataTA: dataTA},
			dataType: 'json',
			success: function(event){
				$("#deckTblId"+response_data).find("#archl_class2").html(event.pagination_data);
				$("#deckTblId"+response_data).find("#archl_class1").html(event.pagination_data);
			}
		})
	}

	

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
				$(".modal-title:first").html(event[0].card_name);

				// $(".modal-body:first").html(event[0].a_details);

				var full_data_str = event[0].card_details;

				values=full_data_str.split(',');

				//$(".modal-body:first").html(values[0]);



				var htmlVal = "";

				$.each(values, function(index,value) {

				  if(value == ''){
				  	htmlVal += "";
				  }else{
				  	htmlVal += "<li>"+value+"</li>";
				  } 
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