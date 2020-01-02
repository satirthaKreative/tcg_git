<section class="inner-page">
    <img class="quote_img" src="<?= base_url('assets/front_assets/images/wrapper_img2.jpg') ?>">
    <div class="wrapper">

        <div class="container">
            <div class="row">
                <div class="page-wrapper col-md-10">
                    
                    <div class="top-section">

                        <ul class="nav-tab">
                            <li>
                                <a href="javascript:void" class="">Build</a>
                            </li>
                            <li class="">
                                <a href="javascript:;" class="">Upload</a>
                            </li>
                        </ul>

                        <div class="right_sec">
                            <div class="serach_sec">
                                <form>
                                    <input class="" type="search" id="search_data1" name="search_data" placeholder="Search" aria-label="Search" onkeyup="mySearch()" />
                                    <span class="search_icon">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </form>
                            </div>

                            <a href="javascript:void(0);">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>

                            <a href="javascript:void(0);"> 
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </a>
                        </div>

                        <div class="search_reasults">
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
                        </div>

                    </div>


                    <div class="table-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Y/N</th> -->
                                    <th scope="col">Format</th>
                                    <th scope="col">Archetype</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Request Time</th>
                                </tr>
                            </thead>
                            <tbody class="deck-tbl-show">
                                <tr>
                                    <td colspan="4" class="text-warning"><i class="fa fa-times"></i> No Data selected</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="ad-section col-md-2">
                    <img src="<?= base_url('assets/front_assets/images/ad-this.png') ?>  ">
              </div>
            </div>
        </div>
    </div>
            
</section>

<script>
    $(function(){
        $.ajax({
            url: '<?= base_url("Deck_Controller/deck_editor") ?>',
            type: 'post',
            dataType: 'json',
            success: function(event)
            {
                console.log(event);
                var html = '';
                for(var i=0;i<event.length;i++)
                {
                    res_time = parseInt(event[i].request_time) - parseInt(event[i].time_use);
                    secondsToHms(res_time);
                    html += '<li><a href="javascript:;" onclick="submitArche('+event[i].mainId+')"><span> <b> Archetype : </b>'+event[i].archetype_name+'</span> <span> <b> Format : </b>'+event[i].format_name+'</span>  <span> <b> Time : </b>'+secondsToHms(res_time)+'</span></a> <div class="count_sec"><span>1</span> <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a> </div></li>';
                }
                $(".s_result").html(html);
            }
        })
    })


    function mySearch(){
        var search_data = $("#search_data1").val();
        $.ajax({
            url : '<?= base_url("Deck_Controller/search_data/") ?>'+search_data,
            type: 'post',
            dataType: 'json',
            success:  function(event)
            {
                if(event == ''){
                    $(".s_result").html("<h4 class='text-warning'><i class='fa fa-times'></i> No details available</h4>");
                }
                else{
                    var html = '';
                    for(var i=0;i<event.length;i++)
                    {
                        res_time = parseInt(event[i].request_time) - parseInt(event[i].time_use);
                        secondsToHms(res_time);
                        html += '<li><span> <b> Archetype : </b>'+event[i].archetype_name+'</span> <span> <b> Format : </b>'+event[i].format_name+'</span>  <span> <b> Time : </b>'+secondsToHms(res_time)+'</span> <div class="count_sec"><span>1</span> <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a> </div></li>';
                    }
                    $(".s_result").html(html);
                }
            }
        })
    }




    function secondsToHms(d) {
        d = Number(d);
        var h = Math.floor(d / 3600);
        var m = Math.floor(d % 3600 / 60);
        var s = Math.floor(d % 3600 % 60);

        var mDisplay1,hDisplay1,sDisplay1;

        var hDisplay = h > 0 ? h + (h == 1 ? " hour , " : " hours, ") : "";
        var mDisplay = m > 0 ? m + (m == 1 ? " minute , " : " minutes, ") : "";
        var sDisplay = s > 0 ? s + (s == 1 ? " second " : " seconds") : "";
        if(parseInt(hDisplay)<10){hDisplay1 = '0'+hDisplay} else{ hDisplay1 = hDisplay; } 
        if(parseInt(mDisplay)<10){mDisplay1 = '0'+mDisplay} else{ mDisplay1 = mDisplay; }
        if(parseInt(sDisplay)<10){sDisplay1 = '0'+sDisplay} else{ sDisplay1 = sDisplay; } 

        return hDisplay1+ mDisplay1 + sDisplay1;
    }

    function secondsToHms2(d) {
        d = Number(d);
        var h = Math.floor(d / 3600);
        var m = Math.floor(d % 3600 / 60);
        var s = Math.floor(d % 3600 % 60);

        var mDisplay1,hDisplay1,sDisplay1;

        var hDisplay = h > 0 ? h + (h == 1 ? " hour , " : " hours, ") : "";
        var mDisplay = m > 0 ? m + (m == 1 ? " minute , " : " minutes, ") : "";
        var sDisplay = s > 0 ? s + (s == 1 ? " second " : " seconds") : "";
        if(parseInt(hDisplay)<10){hDisplay1 = '0'+hDisplay} else{ hDisplay1 = hDisplay; } 
        if(parseInt(mDisplay)<10){mDisplay1 = '0'+mDisplay} else{ mDisplay1 = mDisplay; }
        if(parseInt(sDisplay)<10){sDisplay1 = '0'+sDisplay} else{ sDisplay1 = sDisplay; } 

        return hDisplay1+ mDisplay1 + sDisplay1;
    }

    function submitArche(data_value){
        $.ajax({
            url: '<?= base_url("Deck_Controller/search_data_q/") ?>'+data_value,
            type: 'post',
            dataType: 'json',
            success: function(event)
            {
                console.log(event);
                var html = '';
                for(var i=0;i<event.length;i++)
                {
                    res_time = parseInt(event[i].request_time) - parseInt(event[i].time_use);
                    secondsToHms(res_time);
                    secondsToHms2(event[i].request_time);
                    html += '<tr><td>'+event[i].format_name+'</td><td>'+event[i].archetype_name+'</td><td>'+secondsToHms(res_time)+'</td><td>'+secondsToHms2(event[i].request_time)+'</td></tr>';
                }
                $(".deck-tbl-show").html(html);
            }
        })
    }
</script>