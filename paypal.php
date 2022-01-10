<?php
require_once 'header.php';
require_once 'includes/functions.php';

$total_price = totalPrice();
$total_price_final = $total_price / 186.17;

?>
<html>
    <head>
        <title>payment</title>
        <style>
            .pa-inner-container{
                width:430px;
                margin-top: 50px;
                margin: 0 auto;
                height: 300px;
                
            }
        </style>
    </head>
    <body>
        <div class="pa-container">
            <div class="pa-inner-container">
                <h1 style="font-family:montserrat;text-align:center;">Pay with PayPal</h1>
                <form  name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="custom" value="SELLER: 1, BUYER: 2">
                    <input type="hidden" name="business" value="sb-bud1r1379674@business.example.com">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="item_name" value="Art work name 101">

                    <input type="hidden" name="item_number" value="101">
                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="amount" value="<?php echo $total_price_final; ?>">
                    <input type="image" src="images/paypal.png" border="0" name="submit" alt="Pay with PayPal - it's fast and secure!">
                </form>
            </div>
        </div>
        <?php require_once 'footer.php'; ?>
    </body>
</html>