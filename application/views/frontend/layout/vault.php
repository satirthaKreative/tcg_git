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
                <div class="page-wrapper col-md-9">
                    <div class="timer-section">
                        <img src="<?= base_url('assets/front_assets/'); ?>images/clock-icon.png">

                        <div class="progress-area">
                            <div class="progress">
                                <div class="progress-bar" style="width:<?= $_SESSION['voult_percentage_show'] ?>%"></div>
                            </div>

                            <ul class="percentage">
                                <li>
                                    <span>
                                        0%
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        25%
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        50%
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        75%
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        100%
                                    </span>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="volte_area">
                        <?php 
                        # actual slot of time percentage
                        $percentage_voult_time = $_SESSION['voult_percentage_show'];
                        # total price
                        $total_price_of_voult = ''; 
                        # condition 
                        if($percentage_voult_time <= 25)
                        {
                            $total_price_of_voult = 30;
                        }
                        else if(25<$percentage_voult_time && $percentage_voult_time<75)
                        {
                            $total_price_of_voult = (-(1/2)*$percentage_voult_time)+42.5;
                        }
                        else if($percentage_voult_time >= 75)
                        {
                            $total_price_of_voult = 5;
                        }
                        $_SESSION['total_price_of_voult_test_new'] = round($total_price_of_voult,1);
                        ?>
                        <h3>Current Vault time price <strong>$<span><?= round($total_price_of_voult,1); ?></span></strong></h3>

                        <!-- <ul>
                            <li>
                                <span>If vault time</span> <strong> > 75%</strong>  
                                <h3>$<span>30</span></h3>
                            </li>
                            <li>
                               <span>If vault time</span>   <strong> > 25%</strong>  
                               <h3>$<span>30</span></h3>
                            </li>
                            <li>
                               <span>If vault time</span>  <strong> < 25% - < 75%</strong>  
                               <h3>$<span>42.5</span></h3>

                            </li>
                        </ul> -->

                        
                        <!-- <figure class="highlight">
                            <pre>
                                <code class="language-html" data-lang="html">


                                    <span>If vault time > 75%, Price $5</span>
                                    <span>If x<25, y=$30</span>
                                    <span>If 25<x<75, Y=(-1/2)x+42.5</span>
                                </code>

                            </pre>

                        </figure> -->

                        <!-- <h5 class="note">(round up to nearest $0.50 increment)</h5> -->

                        <!-- <h4>
                            The Incentive Vault is <strong><?= $_SESSION['voult_percentage_show']; ?>%</strong> Full
                        </h4>
                        <h4>
                            Additional Time Price: <strong>$86.00</strong>
                        </h4> -->
                        <!-- <a href="javascript:void(0); data-toggle="modal" data-target="#volte-purchase">Purchase</a> -->

                        <button type="button" class="purchase_link" data-toggle="modal" data-target="#volte-purchase">
                            Purchase
                        </button>

                        <div class="volte-image">
                            <img src="<?= base_url('assets/front_assets/'); ?>images/volte.png" alt="">
                        </div>
                    </div>
                    
                </div>

                <div class="ad-section col-md-3">
                    <img src="<?= base_url('assets/front_assets/'); ?>images/card_add.png">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Choose Your Payment Method</h5>
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
                <select class="purchase-time" onchange="check_time_value()">
                    
                </select>
                <span class="prevent_btn"></span>
                <!--<p>With your credit card ending in **** **** **** 1245</p>-->

                <a id="prevent_btn" href="javascript:void(0);" onclick="Payment();">Purchase</a>

            </div>

        </form>

      </div>


    </div>
  </div>
</div>

<script>
    $(function(){
        var total_time_of_price_voult = parseFloat('<?= $_SESSION["total_price_of_voult_test_new"] ?>');
        $.ajax({
            url : "<?php echo  base_url('Voult_time_controller/index'); ?>",
            type: "POST",
            dataType:  "json",
            success:  function(event)
            {
                console.log(event);
                var html = '';
                    html += "<option value=''>Select Timeframe</option>";
                for(var i = 0; i<event.length; i++)
                {
                    var price_new_check = event[i].time_slot_price;
                    var convert_price_new_check = (parseFloat(price_new_check)+parseFloat(total_time_of_price_voult));
                    html += "<option value = "+event[i].id+"><b>"+event[i].time_slot+"</b> "+event[i].time_type+" (Price : "+convert_price_new_check+" USD)</option>";
                }
                $(".purchase-time").html(html);
            }
        })
    })

    // check time value
    function check_time_value()
    {
        var purchase_time = $(".purchase-time").val();
        // alert(purchase_time);
        $.ajax({
            url: "<?php echo base_url('Voult_time_controller/prevent_buy_time') ?>",
            type: "post",
            data: {purchase_time: purchase_time},
            dataType: "json",
            success:  function(event)
            {
                console.log(event);
                if(event.no_error == true)
                {
                    $("#prevent_btn").attr('onclick','Payment()');
                }
                else if(event.no_error == false)
                {
                    $(".prevent_btn").html("<i class='text-danger'>You can't buy more than 5 hours total time</i>").fadeIn().delay(3000).fadeOut('slow');
                    $("#prevent_btn").removeAttr('onclick');
                }
            }
        })
    }

    // payment
    // payment
    function Payment()
    {
        var parchase_time = $('.purchase-time').val();
        var del = $('input[name="payment"]:checked').val();

        // ajax calling
        if(del == 'card'){
            $.ajax({
                url: "<?php echo base_url('Voult_time_controller/session_create'); ?>",
                type: "post",
                data: {parchase_time: parchase_time},
                dataType: "json",
                success:  function(event)
                {
                   console.log(event); 
                   window.location.href="<?= base_url('Payment/'); ?>";
                }
            });
        }
        else if(del == 'paypal'){
            $.ajax({
                url: "<?php echo base_url('Voult_time_controller/session_create_paypal'); ?>",
                type: "post",
                data: {parchase_time: parchase_time},
                dataType: "json",
                success:  function(event)
                {
                   console.log(event); 
                   window.location.href="<?= base_url('PaypalPay/'); ?>";
                }
            });
        }
    }
</script>