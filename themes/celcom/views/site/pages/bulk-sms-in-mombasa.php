<?php
Yii::app()->name = 'Bulk SMS in Mombasa, SMS Gateway in Mombasa - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS in Mombasa, SMS Gateway in Mombasa - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'bulk-sms-in-mombasa'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<section class="container bg-body pt-4">
    <div class="row px-2 justify-content-center align-items-center rounded">
        <div class="col-12 col-md-7 pt-0 pt-md-4">
            <div>
                <h2 class="mb-0 pb-0 text-body">Bulk SMS in Mombasa</h2>
                <hr class="hr-md border-3 mb-5 border-warning"/>
                <p>
                    Reach more clients, get more value with bulk SMS service in Mombasa. Our bulk SMS platform is one of
                    the most cost-effective and easy to use instant messaging solution.
                </p>
                <p>
                    Engage more customers with personalized SMS and targeted promotions for instant delivery of bulk
                    SMSs. Get a free sender ID for your bulk SMS marketing. Try us today!

                    We offer cheap bulk SMS services in Kenya. With our SMS API gateway get more customers with faster
                    and more reliable instant messaging from the best bulk SMS providers in Kenya.

                    Create custom bulk SMS and promote your product all over the world. Our online web platform will
                    help you automate your payment, schedule bulk SMS messages, as well as download reports and promote
                    your product to your customers with ease.

                    We offer the cheapest bulk SMS services. Get bulk SMS in Mombasa today! Besides Mombasa, we offer
                    affordable bulks SMS service in other major towns in Kenya
                    including; <?php echo CHtml::link('Nairobi', array('/site/page', 'view' => 'bulk-sms-in-nairobi')); ?>
                    ,
                    <?php echo CHtml::link('Kisumu', array('/site/page', 'view' => 'bulk-sms-in-kisumu')); ?>,
                    <?php echo CHtml::link('Nakuru', array('/site/page', 'view' => 'bulk-sms-in-nakuru')); ?>,
                    and
                    <?php echo CHtml::link('Thika', array('/site/page', 'view' => 'bulk-sms-in-thika')); ?>,
                </p>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card rounded-4">
                <img class="img-fluid rounded-4" src="/images/city/mombasa.avif"/>
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