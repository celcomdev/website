<?php
Yii::app()->name = 'Bulk SMS Pricing|Cost of Bulk SMS in Kenya|Cheap Bulk SMS';
// Yii::app()->name = ' Cost & Pricing - Bulk SMS Sending - Celcom Africa Bulk SMS';
Yii::app()->clientScript->registerMetaTag('Affordable Bulk SMS Pricing in Kenya. Get the best rates for bulk SMS services. Explore our cheap bulk SMS options. Cost of Bulk SMS Kenya.Start saving today!', 'description');
// Yii::app()->clientScript->registerMetaTag('Bulk SMS Sending Cost. Cost of Bulk SMS sending in Kenya from 0.4 with Celcom Africa', 'description');
Yii::app()->clientScript->registerMetaTag('cost of SMS, bulk sms cost, kenya bulk sms cost', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'bulk-sms-pricing'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);

// Yii::app()->clientScript
//         ->registerScriptFile(
//             "https://www.paypal.com/sdk/js?client-id=AdFJNg6m5VHKkZguhmq0febpK49V0PV15hTPHPgU-QEFqg4vrnWl_KyVsMTVNkn21cXOZg5IfNfFDCy5&disable-funding=credit,card", 
//             CClientScript::POS_END
//         );
Yii::app()->clientScript
    ->registerScriptFile(
        "/js/app.js",
        CClientScript::POS_END
    );
?>
<div id="forms">
    <request-demo-form></request-demo-form>
    <request-callback-form></request-callback-form>
</div>
<section class="text-center pt-4">
    <div class="container">
        <div class="row px-2 justify-content-center">
            <div class="col-12 col-md-12 pt-0 pt-md-4">
                <div>
                    <h3 class="fw-bold">Cost of Bulk SMS in Kenya</h3>
                    <hr class="hr-md border-3 mx-auto pb-3 border-warning" />
                    <p class="">
                        With Celcom Africa the only cost you'll incur is that of purchasing bulk SMS units.
                        In fact, it's like we're giving you a free phone, but in order for you to use it, you'll
                        need to
                        load it up with some airtime.

                        We ensure that buying bulk sms credits is simple. Choose from the payment options on your
                        left
                        to
                        find the one that best suits you. Your privacy & security comes first. There is a minimum
                        requirement of 500 credits for all bulk SMS messages bought.
                    </p>
                </div>
                <div class="pt-4 d-flex justify-content-between justify-content-md-center">
                    <button type="button" class="btn btn-primaryy px-md-5 fw-bold rounded-5" data-bs-toggle="modal" data-bs-target="#requestCallback" aria-haspopup="true">
                        Request callback
                    </button>
                    <span class="px-2 px-md-5"></span>
                    <button type="button" class="btn btn-light slider_btn px-md-5 rounded-5 fw-bold" data-bs-toggle="modal" data-bs-target="#requestDemo" aria-haspopup="true">
                        Request Demo
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="container pt-4">
<div class="row px-2 justify-content-center">
    <?php if (Yii::app()->session['error_status']) : ?>
        <div class="flash-error clearfix">
            <p class="lead">Kindly select appropriate SMS Bundle to continue</p>
        </div>
    <?php endif; ?>
    <h5 class="pt-3">Buy Bulk SMS in Kenya</h5>
    <p class="pb-3">
        If you have an existing account, click on the "BUY NOW" button to pay directly.
    </p>
    <div id="buy-now">
        <buy-now-form></buy-now-form>
    </div>
</div>
</section> -->
<!-- <?php $this->widget('Bottom'); ?> -->
<!-- <script type="text/javascript">
$(document).ready(function() {
    $("td a.btn").click(function() {
        var min = $(this).attr('data-min');
        var max = $(this).attr('data-max');
        var price = $(this).attr('data-price');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {
                min: min,
                max: max,
                price: price
            },
            url: '<?php echo Yii::app()->createUrl('/pricing'); ?>',
            success: function(data) {
                if (data.redirect) {
                    window.location = data.redirect;
                }
            }
        });
        return false;
    });
});
</script> -->