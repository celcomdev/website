<?php
Yii::app()->name = 'Bulk SMS in Nakuru, SMS Gateway in Nakuru - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS in Nakuru, SMS Gateway in Nakuru - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('Bulk SMS, SMS, SMS Marketing, SMS API, Text messages, Text SMS', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'bulk-sms-in-nakuru'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<section class="container bg-body pt-4">
    <div class="row px-2 justify-content-center align-items-center rounded">
        <div class="col-12 col-md-7 pt-0 pt-md-4">
            <div>
                <h2 class="mb-0 pb-0 text-body">Bulk SMS provider in Nakuru</h2>
                <hr class="hr-md border-3 mb-5 border-warning"/>
                <p>
                    Are you looking for a high priority bulk SMS provider in Nakuru? You can rely on our SMS API gateway
                    in Nakuru. Easily send promotional SMS and transactional SMS like one-time passcodes and bulk SMS
                    alerts from your web portal or any mobile device to your clients all over the world.
                </p>
                <p>
                    As a leading bulk SMS marketing company Kenya, we will help you to create custom text messages and
                    promote your product and services to your global clients as well. Our online SMS platform will help
                    you create bulk SMS campaigns, schedule text messages, as well as reporting and promoting your
                    product to your customers with ease. Bulk SMS will help you send offers, discounts, coupons,
                    reminders, and alerts to any device globally.
                </p>
                <p>
                    We offer the cheapest bulk SMS services. Get bulk SMS in Nakuru today! Besides Nakuru and it's
                    environments, Celcom Africa provides affordable bulks SMS service in other major towns in Kenya
                    including; <?php echo CHtml::link('Nairobi', array('/site/page', 'view' => 'bulk-sms-in-nairobi')); ?>
                    ,
                    <?php echo CHtml::link('Mombasa', array('/site/page', 'view' => 'bulk-sms-in-mombasa')); ?>,
                    <?php echo CHtml::link('Kisumu', array('/site/page', 'view' => 'bulk-sms-in-kisumu')); ?>,
                    and
                    <?php echo CHtml::link('Thika', array('/site/page', 'view' => 'bulk-sms-in-thika')); ?>,
                </p>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card rounded-4">
                <img class="img-fluid rounded-4" src="/images/city/nakuru.jpg"/>
            </div>
        </div>
    </div>
</section>
<?php $this->renderPartial('components/shared/_cta_one'); ?>
<?php $this->renderPartial('components/shared/_testimonials'); ?>
<div id="forms">
    <request-demo-form></request-demo-form>
    <request-callback-form></request-callback-form>
    <test-gateway-form></test-gateway-form>
</div>