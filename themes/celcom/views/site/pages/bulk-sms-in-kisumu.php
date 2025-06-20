<?php
Yii::app()->name = 'Bulk SMS in Kisumu, SMS Gateway in Kisumu - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS in Kisumu, SMS Gateway in Kisumu - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('bulk sms kisumu city, bulk sms cost kisumu', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'bulk-sms-in-kisumu'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<section class="container bg-body pt-4">
    <div class="row px-2 justify-content-center align-items-center rounded">
        <div class="col-12 col-md-7 pt-0 pt-md-4">
            <div>
                <h2 class="mb-0 pb-0 text-body">Text Messaging in Kisumu</h2>
                <hr class="hr-md border-3 mb-5 border-warning"/>
                <p>
                    Celcom Africa is a reputable affordable bulk SMS provider in Kenya. With a five star award winning
                    bulk SMS service in Bulk SMS, SMS API, USSD code and short code.
                </p>
                <p>
                    Bulk SMS Software is a marketing tool that allows you to send thousands of messages in a single
                    second. Celcom Africa offers affordable bulk SMS services in Kenya. Get more leads and reach a wider
                    client base through our SMS API gateway which is fast and a more reliable bulk SMS messaging
                    solution. Celcom Africa bulk SMS is a leading bulk SMS provider in Kenya. Over 8+ years Celcom
                    Africa has consolidated its presence in the market of bulk SMS and has been providing world-class
                    bulk SMS services to its clients. We provide an easy to use bulk SMS platform that assist you to
                    send text SMS in Kenya, with our instant messaging services your cost is significantly lowered.
                </p>
                <p>
                    We offer the cheapest bulk SMS services. Get bulk SMS in Kisumu today! Besides Kisumu and it's
                    environments, Celcom Africa provides affordable bulks SMS service in other major towns in Kenya
                    including; <?php echo CHtml::link('Nairobi', array('/site/page', 'view' => 'bulk-sms-in-nairobi')); ?>
                    ,
                    <?php echo CHtml::link('Mombasa', array('/site/page', 'view' => 'bulk-sms-in-mombasa')); ?>,
                    <?php echo CHtml::link('Nakuru', array('/site/page', 'view' => 'bulk-sms-in-nakuru')); ?>,
                    and
                    <?php echo CHtml::link('Thika', array('/site/page', 'view' => 'bulk-sms-in-thika')); ?>,
                </p>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card rounded-4">
                <img class="img-fluid rounded-4" alt="Kisumu- Lake Victoria" src="/images/city/kisumu.webp"/>
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