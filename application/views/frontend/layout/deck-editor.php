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
                                    <input class="" type="search" placeholder="Search" aria-label="Search">
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
                                    <th scope="col">Y/N</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Platform</th>
                                    <th scope="col">Format</th>
                                    <th scope="col">Archetype</th>
                                    <th scope="col">Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="check-group">
                                            <input type="checkbox" id="Johndeo">
                                            <label for="Johndeo"></label>
                                        </div>
                                    </td>
                                    <td>John Deo</td>
                                    <td>MTGA</td>
                                    <td>Standard</td>
                                    <td>Esper Midrange</td>
                                    <td>2 Hrs</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="check-group">
                                            <input type="checkbox" id="Annabell">
                                            <label for="Annabell"></label>
                                        </div>
                                    </td>
                                    <td>Anna Bell</td>
                                    <td>Cockatrice</td>
                                    <td>Modern</td>
                                    <td>GB Rock</td>
                                    <td>1 Hrs</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="check-group">
                                            <input type="checkbox" id="Mickhussy">
                                            <label for="Mickhussy"></label>
                                        </div>
                                    </td>
                                    <td>Mick Hussy</td>
                                    <td>Xmage</td>
                                    <td>Legacy</td>
                                    <td>Jeskai Control</td>
                                    <td>30 min</td>
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
                    html += '<li><span> <b> Archetype : </b>'+event[i].archetype_name+'</span> <span> <b> Format : </b>'+event[i].format_name+'</span>  <div class="count_sec"><span>2</span> <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a> </div></li>';
                }
                $(".s_result").html(html);
            }
        })
    })
</script>