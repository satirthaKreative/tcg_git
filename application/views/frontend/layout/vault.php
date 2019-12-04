<?php  
    if(!isset($_SESSION['session_data']))
    {
        redirect('');
    }
?>
<section class="inner-page">
    <img class="quote_img" src="<?= base_url('assets/front_assets/'); ?>images/wrapper_img2.jpg">
    <div class="wrapper">

        <div class="container">
            <div class="row">
                <div class="page-wrapper col-md-10">
                    <div class="timer-section">
                        <img src="<?= base_url('assets/front_assets/'); ?>images/clock-icon.png">

                        <div class="progress-area">
                            <div class="progress">
                                <div class="progress-bar" style="width:90%"></div>
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
                        <h4>
                            The Incentive Vault is <strong>90%</strong> Full
                        </h4>
                        <h4>
                            Additional Time Price: <strong>$86.00</strong>
                        </h4>
                        <!-- <a href="javascript:void(0); data-toggle="modal" data-target="#volte-purchase">Purchase</a> -->

                        <button type="button" class="purchase_link" data-toggle="modal" data-target="#volte-purchase">
                            Purchase
                        </button>

                        <div class="volte-image">
                            <img src="<?= base_url('assets/front_assets/'); ?>images/volte.png" alt="">
                        </div>
                    </div>
                    
                </div>

                <div class="ad-section col-md-2">
                    <img src="<?= base_url('assets/front_assets/'); ?>images/ad-this.png">
                </div>
            </div>
        </div>
    </div>
            
</section>


<!-- Modal -->
<div class="modal fade" id="volte-purchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choose Your Payemnt Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="payment-method">
                <label for="card" class="method">
                    <span class="card-logos mt15">
                        <img src="<?= base_url('assets/front_assets/'); ?>images/visa_logo.png"/>
                        <img src="<?= base_url('assets/front_assets/'); ?>images/mastercard_logo.png"/>
                    </span>

                    <span class="radio-input">
                        <input id="card" type="radio" name="payment" value="card" checked="checked"> Credit card
                    </span>
                </label>

                <label for="paypal" class="method paypal">
                    <span class="card-logos mt15">
                        <img src="<?= base_url('assets/front_assets/'); ?>images/paypal_logo.png"/>
                    </span>
                    <div class="radio-input">
                        <input id="paypal" type="radio" name="payment" value="paypal"> paypal
                    </div>
                </label>
            </div>

            <div class="payment">
                <label >You will purchase</label>
                <select class="purchase-time">
                    
                </select>
                <p>With your credit card ending in **** **** **** 1245</p>

                <a href="javascript:void(0);" onclick="Payment();">Purchase</a>

            </div>

        </form>

      </div>


    </div>
  </div>
</div>
<script>
    $(function(){
        $.ajax({
            url : "<?php echo  base_url('Voult_time_controller/index'); ?>",
            type: "POST",
            dataType:  "json",
            success:  function(event)
            {
                console.log(event);
                var html = '';
                for(var i = 0; i<event.length; i++)
                {
                    html += "<option value = "+event[i].convert_seconds+">"+event[i].time_slot+" "+event[i].time_type+"</option>";
                }
                $(".purchase-time").html(html);
            }
        })
    })

    function Payment()
    {
        window.location.href="<?= base_url('Payment/'); ?>";
    }
</script>