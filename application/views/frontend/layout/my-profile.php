
<section class="inner-page profile-section">
    <img class="quote_img" src="<?= base_url('assets/front_assets/images/wrapper_img2.jpg'); ?>">
    <div class="wrapper">

        <div class="container">
            <div class="row">

                <div class="sidebar col-md-3">
                    <div class="pro-section">
                        <div class="img-section">
                            <img src="<?= base_url('assets/front_assets/images/pro_img.png'); ?>">
                        </div>
                        <a href="javascript:void(0);">John Deo</a>
                    </div>

                    <ul class="appende_tabs">
                        <li>
                            <a href="javascrript:void(0);" class="tablinks active" onclick="openCity(event, 'Communations-info')">Communications Settings</a>
                        </li>
                        <li>
                            <a href="javascrript:void(0);" class="tablinks" onclick="openCity(event, 'time-info')">Time Settings</a>
                        </li>
                        <li>
                            <a href="javascrript:void(0);" class="tablinks" onclick="openCity(event, 'account-info')">Account Information</a>
                        </li>
                        <li>
                            <a href="javascrript:void(0);" class="tablinks" onclick="openCity(event, 'billing-info')">Billing Information</a>
                        </li>
                        <li>
                            <a href="javascrript:void(0);" >Sign Out</a>
                        </li>
                    </ul>
                </div>

                <div class="page-wrapper col-md-9">
                    
                    <!-- Communations Settings -->
                    <div id="Communations-info" class="communations-settings tabcontent" style="display: block;">
                        
                        <div class="tab_section2">

                            <!-- Material checked -->
                            <div class="switch">
                                <label>
                                    Away
                                    <input type="checkbox" checked>
                                    <span class="lever"></span> Available
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Preferred Communication:</label>
                                <select class="form-control">
                                    <option>Time Frame</option>
                                    <option>Time Frame2</option>
                                </select>
                            </div>

                        </div>
                        
                        <div class="form-section2">
                            <div class="form-group">
                                <label>Blocked Users</label>

                                <input type="search" class="form-control" placeholder="Search">

                            </div>
                        </div>

                        <div class="table-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Unblock</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Satisfaction Rating</th>
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
                                        <td>
                                            <div class="rating">

                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>

                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Annabel">
                                                <label for="Annabel"></label>
                                            </div>
                                        </td>
                                        <td>Anna Bell</td>
                                        <td>
                                            <div class="rating">

                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>

                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Mickhussy">
                                                <label for="Mickhussy"></label>
                                            </div>
                                        </td>
                                        <td>Mick Hussy</td>
                                        <td>
                                            <div class="rating">

                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>

                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>


                        <h3>Recent Testing Conversations</h3>

                        <div class="table-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Unblock</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Communication</th>
                                        <th scope="col">File Type</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Audio">
                                                <label for="Audio"></label>
                                            </div>
                                        </td>
                                        <td>John Deo</td>
                                        <td>Audio</td>
                                        <td>.WAV</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Docx">
                                                <label for="Docx"></label>
                                            </div>
                                        </td>
                                        <td>Mick Hussy</td>
                                        <td>Audio</td>
                                        <td>.TXT</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="check-group">
                                                <input type="checkbox" id="Audio2">
                                                <label for="Audio2"></label>
                                            </div>
                                        </td>
                                        <td>Anna Bell</td>
                                        <td>Audio</td>
                                        <td>.WAV</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Time Settings -->
                    <div id="time-info" class="time-settings tabcontent">
                        <div class="timer-section">
                            <img src="https://www.ecollegestreet.in/tcgtester/assets/front_assets/images/clock-icon.png">

                            <div class="progress-area">
                                <div class="progress">
                                    <div class="progress-bar" style="width:02%"></div>
                                </div>

                                <ul>
                                    <li>
                                        <span>
                                            0 Hr
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            1 Hr
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            2 Hr
                                        </span>
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div class="volte_area">
                            <h3>
                                Increase Your Vault Volume: <strong>1 Hour for $85.00</strong> Full
                            </h3>
                            <h4>
                                The Incentive Vault is <strong>90%</strong> Full.
                            </h4>
                            <h4>
                                Additional Time Price: <strong>$85.00</strong>
                            </h4>

                            <button type="button" class="purchase_link" data-toggle="modal" data-target="#volte-purchase">
                                Purchase
                            </button>
                        </div>

                    </div>


                    <!-- Account Information -->
                    <div id="account-info" class="account-information tabcontent" >
                        <form action="">
                            <div class="form-group row">
                                <label class="col-sm-3">User name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="John Deo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" placeholder="johndeo45@test.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Password:</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="Enter password">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Edit</button>
                                    
                        </form>
                    </div>


                    <!-- Billing Information -->
                    <div id="billing-info" class="billing-information tabcontent">
                        <form action="">
                            <div class="form-group col-sm-6">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" placeholder="John Deo">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Billing Address:</label>
                                <input type="text" class="form-control" placeholder="100 Main St New York , NY 55555">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Credit Card:</label>
                                <select class="form-control">
                                    <option>Masetr card</option>
                                    <option>set 2</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Credit Card Number:</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Expiration Date:</label>

                                <div class="input-group date" data-date-format="dd.mm.yyyy">
                                    <input  type="text" class="form-control" data-date-format="dd/mm/yyyy" id="datepicker">
                                    
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>


                            </div>

                            <div class="form-group col-sm-3">
                                <label>CVV:</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Email:</label>
                                <input type="email" class="form-control" placeholder="">
                            </div>
                            
                            <div class="btn-section">
                                <button type="submit" class="btn btn-primary">Edit</button>  
                            </div>
                        </form>
                    </div>

                </div>

            </div>


            <div class="ad-section2">
                <img src="<?= base_url('assets/front_assets/images/ad-this2.png'); ?>">
            </div>


        </div>
    </div>
            
</section>



<script type="text/javascript">
                       

        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
 

</script>

