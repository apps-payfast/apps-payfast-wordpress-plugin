<?php
$response_url = get_permalink() . "?return_url=true&";
$response = (object) $this->_paymentResponse;
?>

<?php
if ($response->response) {
    if ($response->success) {
        ?>

        <h2>Your payment has been received. Transaction was successful. </h2>
        <h4>Payment Reference ID: <?php echo $response->basket_id; ?></h4>

        <?php
    } else {
        ?>
        <h2>Your payment has not been received. Transaction was failed. </h2>
        <h4>Payment Reference ID: <?php echo $response->basket_id; ?></h4>
        <?php
    }
}
?>

<h3><?php echo get_bloginfo(); ?></h3>
<div class="row">


    <div class="col-5 col-s-9">
        <div class="aside2">
            <p><?php echo isset($this->merchantOptions['description']) ? $this->merchantOptions['description'] : ''; ?> </p>
        </div>        
    </div>

    <div class="col-5 col-s-12">
        <div class="aside">
              <div class="img-class"><img style="margin: auto;" src="<?php echo plugin_dir_url(__FILE__); ?>../images/payfast.png"></div>
            <form action="<?php echo $this->_payfastWebcheckout; ?>" method="post" name='payfast-payment-form' id='payfast-payment-form'>
                <h4 style="text-align: initial;">Payment Details</h4>

                
                <div class="form-group">
                    <INPUT placeholder="Total Amount" TYPE="number" NAME="TXNAMT" ID="payfast-TXNAMT"  class="field-control required form-inline-input" maxlength="5" required="required"  >
                    <select name="CURRENCY_CODE" class=" form-inline-input field-control " style="width: 40%;">
                        <option value="PKR">PKR</option>
                    </select>

                </div>
                
                
                <div><INPUT TYPE="tel" NAME="CUSTOMER_MOBILE_NO" placeholder="Mobile No."  class="field-control required" maxlength="14" required="required" ></div>

                
                <div ><INPUT TYPE="TEXT" NAME="CUSTOMER_EMAIL_ADDRESS" placeholder="Email" class="field-control required" required="required"></div>


                <INPUT TYPE="HIDDEN" NAME="MERCHANT_ID" value = "<?php echo $this->merchantOptions['merchant_id']; ?>">
                <INPUT TYPE="HIDDEN" NAME="MERCHANT_NAME" value = "<?php echo $this->merchantOptions['merchant_name']; ?>">
                <INPUT TYPE="HIDDEN" NAME="TOKEN" VALUE="<?php echo $this->_payfastAccessToken; ?>">
                <INPUT TYPE="HIDDEN" NAME="PROCCODE" VALUE="00">
                <INPUT TYPE="HIDDEN" NAME="SIGNATURE" VALUE="<?php echo md5(get_bloginfo()); ?>">
                <INPUT TYPE="HIDDEN" NAME="VERSION" VALUE="WP_VER_1.0">
                <INPUT TYPE="HIDDEN" NAME="TXNDESC" VALUE="Payment For <?php echo get_bloginfo(); ?>">
                <INPUT TYPE="HIDDEN" NAME="SUCCESS_URL" ID="SUCCESS_URL" VALUE="<?php echo $response_url; ?>">
                <INPUT TYPE="HIDDEN" NAME="FAILURE_URL" VALUE="<?php echo $response_url; ?>">
                <INPUT TYPE="HIDDEN" NAME="BASKET_ID" VALUE="<?php echo $this->generateBasketId(); ?>"> 
                <INPUT TYPE="HIDDEN" NAME="ORDER_DATE" VALUE="2018-02-13">
                <INPUT TYPE="HIDDEN" NAME="CHECKOUT_URL" VALUE="<?php echo $response_url; ?>">
                <INPUT TYPE="submit" id="payfast-paynow" value="PAY NOW" class="payment-submit">
            </form> 


        </div>
    </div>
</div>


