
<style>
    .page-item a {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    #div-scroll{
        max-height: 400px;
    }
    .deck-title span.icn i {
        color: #b31605;
        font-size: 15px;
        margin-left: 10px;
    }
    .cke_top{
        display: none !important;
    }
    .notification_box {
        position: fixed;
        bottom: 30%;
        z-index: 999;
        background-color: #ffffff;
        left: 0;
        width: 210px;
        text-align: center;
        padding: 10px 20px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.17);
        border-radius: 0 50px 50px 0;
    }

    .notification_box h2 {
        font-size: 14px;
        line-height: normal;
    }
</style>
<section class="inner-page">
    <img class="quote_img" src="<?= base_url('assets/front_assets/images/wrapper_img2.jpg') ?>">
    <div class="wrapper">

        <div class="container">
            <div class="row">
                <div class="page-wrapper col-md-9">
                    
                    <div class="top-section">

                        <ul class="nav-tab">
                            <li>
                                <a href="javascript:void" class="active">Build</a>
                            </li>
                            <li>
                                <a href="javascript:;" class="upload_btn" data-toggle="modal" data-target="#upload_modal">Upload</a>
                            </li>
                            <li>
                                <input class="" id="data_search_desk" onkeyup="search_check_data()" type="search" placeholder="Search card — ↑/↓: Select, ⏎: Add x1, ⇧⏎: Add x4">
                                <span class="search_icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </li>
                            <!-- <li class="">
                                <a href="javascript:;" class="" data-toggle="modal" data-target="#upload_modal">Upload</a>
                            </li> -->
                        </ul>

                        <!-- <div class="right_sec">
                            <div class="serach_sec">
                                <form id="form_data_submit">
                                    <input class="" type="text" id="search_data1" name="search_data" placeholder="Enter Custom Card Name" aria-label="Search" />
                                    <span class="search_icon">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                    <button type="button" onclick="add_details_data()" class="btn">Add</button>
                                </form>
                                <a href="javascript:;" class="upload_btn" data-toggle="modal" data-target="#upload_modal">Upload</a>
                            </div>

                            <a href="javascript:void(0);">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>

                            <a href="javascript:void(0);" data-toggle="modal" data-target="#save_modal"> 
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </a>
                        </div> -->

                        <!-- <div class="search_reasults">
                            <ul class="s_result">
                                <li>
                                    <span>Geist of Saint Traft</span> 
                                     <div class="count_sec">
                                        <span>2</span> 
                                        <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-share" aria-hidden="true"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div> -->

                    </div>

                    <div class="cab_main">
                        <div class="cab_clm">
                            <div class="table-responsive" id="div-scroll">
                                <table class="table table-hover table-content">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">Y/N</th> -->
                                            <th scope="col">Name</th>
                                            <th scope="col" colspan="2">Manacost</th>
                                        </tr>
                                    </thead>
                                    <tbody class="" id="show-all-tbl-name">
                                        <!-- <tr class="">
                                            <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">Aegis Automaton</a></td>
                                            <td colspan="">
                                                <ul>
                                                    <li>
                                                        <span title="{2}">2</span>
                                                    </li>
                                                    <li>
                                                        <img src="<?= base_url('assets/front_assets/images/b.png') ?>" alt="" title="{B}">
                                                    </li>
                                                    <li>
                                                        <img src="<?= base_url('assets/front_assets/images/u.png') ?>" alt="" title="{U}">
                                                    </li>
                                                    <li>
                                                        <img src="<?= base_url('assets/front_assets/images/w.png') ?>" alt="" title="{W}">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="position">
                                                <a href="javascript: ;" class="">
                                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr> -->
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination_div">
                                
                            </div>
                        </div>

                        <div class="sideboard_sec">
                            


                            <h4 class="deck-title">Main Deck</h4>


                            <!-- <div class="table-content maindeck_table">
                                <table class="table">
                                   
                                    <tbody class="maindeck-data">
                                        <tr>
                                            <td>Wall of Omens</td>
                                            <td class="close_link">
                                                <a href="javascript:void(0);"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Valorous Stance</td>
                                            <td class="close_link">
                                                <a href="javascript:void(0);"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->

                            <div class="table-responsive">
                                <table class="table table-hover table-content">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">Y/N</th> -->
                                            <th scope="col">Name</th>
                                            <th scope="col" colspan="">Manacost</th>
                                            <th scope="col" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="maindeck-data-show">
                                        <tr>
                                            <td colspan="3" class="text-center"> 
                                                <strong class="text-danger "><i class="fa fa-times"></i> No Data In Main Deck</strong>
                                            </td>
                                        </tr>
                                        <!-- <tr class="">
                                            <td colspan=""><a href="javascript:;" class="name" data-toggle="modal" data-target="#card_modal">Aegis Automaton</a></td>
                                            <td colspan="">
                                                <ul>
                                                    <li>
                                                        <span title="2">2</span>
                                                    </li>
                                                    <li>
                                                        <img src="<?= base_url('assets/front_assets/images/b.png') ?>" alt="" title="{B}">
                                                    </li>
                                                    <li>
                                                        <img src="<?= base_url('assets/front_assets/images/u.png') ?>" alt="" title="{U}">
                                                    </li>
                                                    <li>
                                                        <img src="<?= base_url('assets/front_assets/images/w.png') ?>" alt="" title="{W}">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="action">
                                                <a href="javascript:;" class="edit" data-toggle="modal" data-target="#edit_modal">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="" class="delet">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#save_modal"> 
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="position">
                                                <a href="javascript:;" class="">
                                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr> -->
                                        
                                    </tbody>
                                </table>
                            </div>




                            <h4 class="deck-title">Sideboard</h4>

                            <div class="table-responsive">
                                <table class="table table-hover table-content">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">Y/N</th> -->
                                            <th scope="col">Name</th>
                                            <th scope="col" colspan="">Manacost</th>
                                            <th scope="col" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="maindeck-data-sidebar" >
                                        <tr>
                                            <td colspan="3" class="text-center"> 
                                                <strong class="text-danger "><i class="fa fa-times"></i> No Data In Main Deck</strong>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="table-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Format</th>
                                            <th scope="col">Archetype</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Request Time</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody class="deck-tbl-show">
                                        <tr class="no-data">
                                            <td colspan="5" class="text-warning"><i class="fa fa-file-text-o" aria-hidden="true"></i> No data selected</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->


                        </div>
                    </div>


                </div>

                <div class="ad-section col-md-3">
                    <img src="<?= base_url('assets/front_assets/images/card_add.png') ?>  ">
              </div>
            </div>
        </div>
    </div>
            
</section>




<!-- Save Modal -->
<div class="modal fade" id="save_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="save_deck_data_id">Save</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="save_card_deck_sec">
            <div class="form-row">
                <!-- Input card_name -->
                <input type="hidden" name="card_name" id="card_name_upload" value="">
                <!-- Input manacost -->
                <input type="hidden" name="manacost" id="manacost_upload" value="">
                <!-- Input decktype -->
                <input type="hidden" name="decktype" id="decktype_upload" value=""> 

                <div class="form-group col-sm-6">
                    
                    <input type="text" class="form-control" id="deck_name" value="" placeholder="Deck Name">
                </div>
                <div class="form-group col-sm-6">
                    
                    <select class="form-control" id="format_sct">
                        <option>Format</option>
                        <option>Format 2</option>
                    </select>
                </div>
            
            </div>
            
            <p>Your deck will be submitted to our moderators and approved for a providable archetype.  Thank you for your help in improving TCGTester!</p>
            <div class="btn-section text-right">
                <button type="button" onclick="save_deck_data()" class="btn btn-primary">Submit</button>  
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>



<!-- Upload Modal -->
<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="">
              
                         
            <div class="form-group">
                
                <textarea class="form-control" rows="3" name="" placeholder="4 Elvish Visionary"></textarea>
            </div>

            <div class="btn-section text-right">
                <button type="button" class="btn btn-primary">Enter</button>  
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>





<!-- Edit Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edir_deck_data_id">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="edit_card_deck_sec">
            <!-- Input card_name -->
            <input type="hidden" name="card_name" id="card_name" value="">
            <!-- Input manacost -->
            <input type="hidden" name="manacost" id="manacost" value="">
            <!-- Input decktype -->
            <input type="hidden" name="decktype" id="decktype" value="">                          
            <div class="form-group">

                <textarea class="form-control" rows="10" name="comment" id="user_comment" placeholder="1 Ancient Tomb
                    1 Barren Moor
                    1 Blast Zone
                    1 Bojuka Bog
                    1 Cabal Coffers
                    1 Phyrexian Tower
                    25 Snow-Covered Swamp
                    1 Strip Mine">   
                </textarea>

            </div>

            <div class="btn-section text-right">
                <div class="suc"></div>
                <button type="button" class="btn btn-primary" onclick="edit_deck_data()">Enter</button>  
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>



<!-- Card Modal -->
<div class="modal fade" id="card_modal_checking" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  
</div>


<!-- // tiny editor -->
<script type="text/javascript">
    CKEDITOR.replace( 'comment', { removePlugins: 'toolbar' }  );
</script>
<script>
    
    function maindeck_model(data,deck)
    {
        jQuery("#card_name").val(data);
        jQuery("#decktype").val(deck);

        jQuery("#edit_modal").modal('show');
        jQuery("#edir_deck_data_id").html(data+" - "+deck);
    }

    function sidedeck_model(data,deck)
    {
        jQuery("#card_name").val(data);
        jQuery("#decktype").val(deck);
        jQuery("#edit_modal").modal('show');
        jQuery("#edir_deck_data_id").html(data+" - "+deck);
    }

    function save_maindeck_data(data,deck)
    {
        jQuery("#card_name_upload").val(data);
        jQuery("#decktype_upload").val(deck);
        jQuery("#deck_name").val(deck);
        jQuery("#save_modal").modal('show');
        jQuery("#save_deck_data_id").html(data+" - "+deck);
    }

    function save_particuler_data(data,deck)
    {
        jQuery("#card_name_upload").val(data);
        jQuery("#decktype_upload").val(deck);
        jQuery("#deck_name").val(deck);

        jQuery("#save_modal").modal('show');
        jQuery("#save_deck_data_id").html(data+" - "+deck);
    }

    // update div
    // function updateDiv(){
    //     var editorText = CKEDITOR.instances.comment.getData();
    //     $('#user_comment').html(editorText);
    // }
    // edit deck data
    function edit_deck_data()
    {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var card_name = jQuery("#card_name").val();
        var decktype = jQuery("#decktype").val();
        var comment = jQuery("#user_comment").val();
        // alert(comment);
        $.ajax({
            url: '<?= base_url("DeckEditorController/edit_deck_data/") ?>',
            type: 'POST',
            data: {card_name: card_name,decktype: decktype,comment: comment},
            dataType: 'json',
            success: function(event)
            {
                // console.log(event);
                // alert(event);
                jQuery("#user_comment").val();
                jQuery(".suc").html("<b class='text-success'><i class='fa fa-check'></i> Successfully send those response</b>").fadeIn().delay(3000).fadeOut('slow');
                setTimeout(function(){ jQuery("#edit_modal").modal('hide'); },3000);
            }, error:  function(event)
            {

            }
        })
    }

    // save deck data
    function save_deck_data(){
        var card_name = jQuery("#card_name_upload").val();
        var decktype = jQuery("#decktype_upload").val();
        var format_scl = jQuery("#format_sct").val();

        $.ajax({
            url: '<?= base_url("DeckEditorController/save_deck_data/") ?>',
            type: 'POST',
            data: {card_name: card_name,decktype: decktype,format_scl: format_scl},
            dataType: 'json',
            success:  function(response)
            {
                jQuery("#deck_name").val();
                jQuery(".suc").html("<b class='text-success'><i class='fa fa-check'></i> Successfully send those response</b>").fadeIn().delay(3000).fadeOut('slow');
                setTimeout(function(){ jQuery("#save_modal").modal('hide'); },3000);
            }
        })
    }
</script>
<script>
    window.onload = unloadPage;
    function unloadPage()
    {
        $.ajax({
            url: '<?= base_url("DeckEditorController/unset_session_card/") ?>',
            type: 'POST',
            dataType: 'json',
            success: function(event){
                
            }, error:  function(event){

            }
        })
    }
    // Refresh list checking loading .....
    $(function(){
        show_format_details();
        function show_format_details()
        {
            $.ajax({
                url: '<?= base_url("DeckEditorController/formatPage/") ?>',
                type: 'POST',
                dataType: 'json',
                success: function(event){
                    // console.log(event);
                    var html = '<option>Format Name</option>';
                    for(var i = 0;i<event.length;i++){
                        html += '<option value="'+event[i].id+'">'+event[i].format_name+'</option>';
                    }
                    $("#format_sct").html(html);
                }, error:  function(event){

                }
            })
        }
        function load_page_data(page){
            $.ajax({
                url: '<?= base_url("DeckEditorController/pagination/"); ?>'+page,
                type: 'GET',
                dataType: 'json',
                success: function(event){
                    console.log(event);
                    $('#show-all-tbl-name').html(event.total_cards);
                    $(".pagination_div").show();
                    $(".pagination_div").html(event.pagination_link);
                }, error:  function(event){
                    
                }
            });
        }

        load_page_data(1);

        $(document).on('click','.pagination li a',function(data){
            data.preventDefault();
            var page = $(this).data('ci-pagination-page');
            load_page_data(page);
        });
    //  refresh button 
        jQuery(".refresh_thispage").on('click',function(){
            location.reload();
        })
    });

    function show_card_data(key_data){
        var val = key_data;
        $.ajax({
            url: '<?= base_url("DeckEditorController/show_card_data/") ?>',
            type: 'post',
            data: {val: val},
            dataType: 'json',
            success: function(event){
               console.log(event);
                jQuery('#card_modal_checking').html(event.pagination_link);
                $("#card_modal_checking").modal('show');
            }, error: function(event){

            }
        })
    }

    function search_check_data()
    {
        var search_card_data = $("#data_search_desk").val();
            $.ajax({
                url: '<?= base_url("DeckEditorController/pagination_search/"); ?>',
                type: 'POST',
                data: {search_card_data: search_card_data},
                dataType: 'json',
                success: function(event){
                    if(search_card_data != ''){
                        if(event.total_cards){
                            $('#show-all-tbl-name').html(event.total_cards);
                        }else{
                            $('#show-all-tbl-name').html('<tr class="no-data"><td colspan="3" class="text-warning"><i class="fa fa-file-text-o" aria-hidden="true"></i> No data selected</td></tr>');
                        }
                        $(".pagination_div").hide();
                    }else{
                        $(".pagination_div").show();
                    }
                }, error:  function(event){
                    
                }
            });
    }

    function add_details_data ()
    {
        var search_data1 = jQuery("#search_data1").val();
        $.ajax({
            url: '<?= base_url("DeckEditorController/card_addition/") ?>'+search_data1,
            type: 'post',
            dataType: 'json',
            success: function(response){
                $('.maindeck-data-show').html(response.pagination_link);
                jQuery('#search_data1').val('');
            }, error:  function(response){

            }
        })
    }

    //

    function myOnClickChange(data_wrap)
    {
        // alert(data_wrap);
        $.ajax({
            url: '<?= base_url("DeckEditorController/card_sidebar_addition/") ?>'+data_wrap,
            type: 'post',
            dataType: 'json',
            success: function(response){

                console.log(response);
                console.log(data_wrap);
                var data_rap = data_wrap.replace(" ", "202");
                console.log(data_rap);
                jQuery('.maindeck-data-show').find("#"+data_rap).hide();
                jQuery('.maindeck-data-sidebar').html(response.pagination_link);
                // jQuery('#search_data1').val('');
                
            }, error:  function(response){

            }
        })
    }
    function myOnClickShowChange(data_wrap)
    {
        $.ajax({
            url: '<?= base_url("DeckEditorController/card_addition/") ?>'+data_wrap,
            type: 'post',
            dataType: 'json',
            success: function(response){
                console.log(response);
                console.log(data_wrap);
                var data_rap = data_wrap.replace(" ", "202");
                $('.maindeck-data-sidebar').find("#"+data_rap).hide();
                $('.maindeck-data-show').html(response.pagination_link);
            }, error:  function(response){

            }
        })
    }

    function myclickDownData(data_wrap)
    {
        // alert(data_wrap);
        $.ajax({
            url: '<?= base_url("DeckEditorController/onclickDownData/") ?>'+data_wrap,
            type: 'post',
            dataType: 'json',
            success: function(response){
                console.log(response);
                $('.maindeck-data-sidebar').find("#"+data_wrap).hide();
                $('.maindeck-data-show').html(response.pagination_link);
                // jQuery('#search_data1').val('');
            }, error:  function(response){

            }
        })
    }

    // delete data from side-deck
    function delete_particular_deck(data_check)
    {
        var data_rap = data_check.replace(" ", "202");
        // alert("#"+data_check);
        $('.maindeck-data-sidebar').find('#'+data_rap).hide();
        myOnClickShowChange(data_check);
    }

    // delete data from main-deck
    function delete_main_data_deck(data_wrap)
    {
        var data_rap = data_wrap.replace(" ", "202");
        $.ajax({
            url: "<?= base_url('DeckEditorController/removeDataMainDeck/') ?>"+data_wrap,
            type: "post",
            dataType: "json",
            success: function(data_resopnse)
            {
                $('.maindeck-data-show').find('#'+data_rap).hide();
            } 
        }) 
    }



</script>