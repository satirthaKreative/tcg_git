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

			                <!-- <th scope="col">Archetype Filter</th> -->

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

			                <!-- <td>

			                    <select class="form-control arche-filter-class" id="arche-filter-cid<?= $key_art->mainId; ?>" name="Archetype_Filter">

			                    	<option value="">Archetype 1</option>

			                    	<option value="">Archetype 2</option>

			                    	<option value="">Archetype 3</option>

			                    </select>

			               	</td> -->

			                <td>
			                	<select class="form-control archl_class main_contain" name="Archetype" id="archl_class1<?= $key_art->mainId; ?>" onchange="change_arche_type(<?= $key_art->mainId; ?>)">

			                		<option value="">Archetype 1</option>

			                		<option value="">Archetype 2</option>

			                		<option value="">Archetype 3</option>

			                	</select>
			                </td>

			                <td>

			                	<a href="javascript:;" class="btn btn-primary" onclick="popup(<?= $key_art->mainId; ?>)" >Popup</a>

			                </td>

			                <td>

			                	<a href="javascript:void(0);" class="btn btn-success" onclick="click_act_model(<?= $key_art->mainId; ?>)">Accept</a>

			                </td>

			                <td>

			                	<select class="form-control archl_class" name="Archetype" id="archl_class2<?= $key_art->mainId; ?>" onchange="change_arche_type(<?= $key_art->mainId; ?>)">

			                		<option value="">Archetype 1</option>

			                		<option value="">Archetype 2</option>

			                		<option value="">Archetype 3</option>

			                	</select>

			            	</td>

			                <td>

			                	<a href="javascript:void(0);" class="btn btn-primary" onclick="denialPopup(<?= $key_art->mainId; ?>)">Denial (T)</a>

			                	<!-- <a href="javascript: ;" class="refresh_link" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a> -->

			                </td>

			            </tr>

			            <?php } ?>

			        	<?php }else{ ?>

						<tr>

							<td colspan="8"><span class="text-center text-warning"><i class="fa fa-times"> No Data Available</i></span></td>

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
			<select class="form-control mb-2" id="selective_arche_name">
		      <option value="">Archetype Filter</option>
		      <option value="">Aggro</option>
		    </select>
	        <textarea class="form-control" id="selective_denial_response" rows="3" placeholder="Type Denial Response Here…"></textarea>

	        <div class="btn-sec text-right mt-2">
	        	<span class="msg-section"></span>
	        	<button type="button" class="btn btn-primary" id="denial_sending_datas">Send</button>

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
					<select class="form-control data_acModal_select" id="ac_name_id">
				      <option value="">Select Option</option>
				      <option value="">Select Option2</option>
				    </select>

			    </div>

				<div class="col-6">
					<input type="email" id="email-exp-com" class="form-control" placeholder="name@example.com">
			    </div>
			</div>
	        

	        <textarea class="form-control" id="selective_denial_response1" placeholder="Your response" rows="3"></textarea>

	        <div class="btn-sec text-right mt-2">

	        	<button type="button" id="my_act_sand_btn" class="btn btn-primary" onclick="send_mail_data()">Send</button>

	    	</div>

    	</form>

      </div>

    </div>

  </div>

</div>

<!-- pagination anchor class add -->




<!-- Cross Arch Modal -->

<div class="modal fade" id="cross_arche_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-body">
      	<span class="cross"><i class="fa fa-times" aria-hidden="true"></i></span>
      	<h2>You must select a archetype from denial response</h2>

      </div>

    </div>

  </div>

</div>


<!-- success model open -->

<div class="modal fade" id="cross_send_mail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-body">
      	<span class="cross"><i class="fa fa-check" aria-hidden="true"></i></span>
      	<h2>Mail send successfully</h2>

      </div>

    </div>

  </div>

</div>



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
		
		var dataT1 = $("#archl_class2"+response_data).val();
		var dataT2 = $("#archl_class1"+response_data).val();
		console.log(dataT1+"  "+dataT2);
		if(dataT1 != ''){
			var dataTA = dataT1;
		}else if(dataT2 != ''){
			var dataTA = dataT2;
		}
		// console.log(dataTA);
		$.ajax({
			url: '<?= base_url("Archetype_admin_controller/checking_arche_name/") ?>',
			type: 'post',
			data: {dataTA: dataTA},
			dataType: 'json',
			success: function(event){
				// console.log(event.pagination_data);
				// alert(dataTA);
				$("#deckTblId"+response_data).find("#archl_class1"+response_data).html(event.pagination_data);
				$("#deckTblId"+response_data).find("#archl_class2"+response_data).html(event.pagination_data);
				// success data
				// alert(dataTA);
				$.ajax({
					url: "<?= base_url('Archetype_admin_controller/checking_archetype_wish/') ?>",
					type: "post",
					data: {dataTA: dataTA},
					dataType: "json",
					success: function(response){
						// console.log(response);
						$('#arche-filter-cid'+response_data).html(response.pagination_data1);
					}, error: function(response){

					}
				})
			}
		})
	}

	// change archetype1
	function change_arche_type1(response_data)
	{
		var dataT1 = $("#archl_class2"+response_data).val();
		var dataT2 = $("#archl_class1"+response_data).val();

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
				$("#deckTblId"+response_data).find("#archl_class2"+response_data).html(event.pagination_data);
				$("#deckTblId"+response_data).find("#archl_class1"+response_data).html(event.pagination_data);
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

	function click_act_model(data){
		var response_data =  data;
		var main_data = $("#archl_class1"+data).val();
		if(main_data == ''){
		$('#cross_arche_modal').modal('show');
		setTimeout(function(){ $("#cross_arche_modal").modal('hide'); },3000)
		}else{
			

			$.ajax({
				url: '<?= base_url("Archetype_admin_controller/checking_arche_name/") ?>',
				type: 'post',
				data: {dataTA: main_data},
				dataType: 'json',
				success: function(response){
					$(".data_acModal_select").html(response.pagination_data);
					$("#ac_modal").modal('show');
					$("#my_act_sand_btn").attr('onclick','send_mail_data('+response_data+')');
					// user data fetch
					$.ajax({
						url: "<?= base_url('Archetype_admin_controller/checking_for_users/') ?>",
						type: "post",
						data: {data: data},
						dataType: "json",
						success:  function(res){
							// console.log(res);
							$("#email-exp-com").val(res);
							// denial msg
							$.ajax({
								url: '<?= base_url("Archetype_admin_controller/checking_denial_msg/") ?>',
								type: 'post',
								data:  {response_data: response_data},
								dataType: 'json',
								success: function(rez){
									if(rez.denial_response != ' ' || rez.denial_response != null){
										$(".data_acModal_select").attr('id','ac_name_id'+response_data);
										$("#selective_denial_response1").attr('class','form-control checking_id'+response_data);
										$("#selective_denial_response1").val(rez.denial_response);
									}else{
										$("#selective_denial_response1").val('');
									}
								}, error:  function(rez){

								}
							})
						}, error: function(res){

						}
					})
				}, error: function(response){

				}
			})
		}
	}

	// danial response model
	function denialPopup(response_data)
	{
		var dataT1 = $("#archl_class2"+response_data).val();
		var dataT2 = $("#archl_class1"+response_data).val();

		if(dataT1 != ''){
			dataTA = dataT1;
		}else if(dataT2 != ''){
			dataTA = dataT2;
		}

		$.ajax({
			url: "<?= base_url('Archetype_admin_controller/checking_arche_name/') ?>",
			type: "POST",
			data: {dataTA:  dataTA},
			dataType: "json",
			success: function(event){
				$("#modal2").modal('show');
				$("#denial_sending_datas").attr('onclick','denial_send_data('+response_data+')');
				$("#selective_arche_name").html(event.pagination_data);

				// for denail response data checking

				$.ajax({
					url: '<?= base_url("Archetype_admin_controller/checking_denial_msg/") ?>',
					type: 'post',
					data:  {response_data: response_data},
					dataType: 'json',
					success: function(rez){
						if(rez.denial_response != ' ' || rez.denial_response != null){
							$("#selective_denial_response").val(rez.denial_response);
						}else{
							$("#selective_denial_response").val('');
						}
					}, error:  function(rez){

					}
				})
				
			}, error:  function(event){

			}
		})
	}
	// denial send data
	function denial_send_data(res_data)
	{
		var d_res = $("#selective_denial_response").val();
		$.ajax({
			url: "<?= base_url('Archetype_admin_controller/denial_send_data/') ?>",
			type: "POST",
			data: {res_data:  res_data,d_res:  d_res},
			dataType: "json",
			success: function(event){
				// console.log(event);
				if(event.err_msg == true){
					$(".msg-section").html("<b class='text-success'><i class='fa fa-check'></i>"+event.data_values+"</b>").fadeIn().delay(2900).fadeOut('slow');
					setTimeout(function(){ $("#modal2").modal('hide'); },3000);
				}else if(event.err_msg == false){
					$(".msg-section").html("<b class='text-danger'><i class='fa fa-times'></i>"+event.data_values+"</b>");
				}
			}, error:  function(event){

			}
		})
	}

	// send email for response acceptance
	function send_mail_data(rez_data)
	{	
		var main_arche_id = $("#ac_name_id"+rez_data).val();
		var main_descrip = $(".checking_id"+rez_data).val();
		$.ajax({
			url: "<?= base_url('Archetype_admin_controller/send_mail_data/') ?>",
			type: "post",
			data: {rez_data: rez_data,main_arche_id: main_arche_id,main_descrip:  main_descrip},
			dataType: "json",
			success: function(resp){
				console.log(resp);
				if(resp.no_error == true){
					$("#cross_send_mail_modal").modal('show');
					setTimeout(function(){ $("#cross_send_mail_modal").modal('hide'); $("#ac_modal").modal('hide'); },3000);
				}else if(resp.no_error == false){

				}
			}, error: function(resp){

			}
		})
	}
</script>

<!-- /Popup -->
