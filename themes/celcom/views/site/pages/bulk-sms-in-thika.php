<?php
Yii::app()->name = 'Bulk SMS in Thika, SMS Gateway in Thika - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS in Thika, SMS Gateway in Thika - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('Thika Bulk SMS services, SMS, SMS Marketing, SMS API, Text messages, Text SMS', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'bulk-sms-in-thika'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<section class="container bg-body pt-4">
    <div class="row px-2 justify-content-center align-items-center rounded">
        <div class="col-12 col-md-7 pt-0 pt-md-4">
            <div>
                <h2 class="mb-0 pb-0 text-body">Bulk SMS Marketing in Thika</h2>
                <hr class="hr-md border-3 mb-5 border-warning"/>
                <p>
                    Are you looking for high priority Bulk SMS? then you can rely on our bulk SMS Gateway in Thika with
                    hassle-free functions. We are among the leading and cheapest bulk SMS providers in Kenya.
                </p>
                <p>
                    Our bulk SMS services are variable as we understand the uniqueness of your business. Celcom Africa
                    text messaging software is a simple and efficient tool for sending bulk SMS messages and managing
                    contacts and recipient groups. The web platform is designed with you in mind. You can quickly update
                    your text SMS credits and upload recipient details, it is especially suitable for small and larger
                    volume bulk SMS messaging.
                </p>
                <p>
                    Besides Thika and it's environments, Celcom Africa provides affordable bulks SMS service in other
                    major towns in Kenya
                    including; <?php echo CHtml::link('Nairobi', array('/site/page', 'view' => 'bulk-sms-in-nairobi')); ?>
                    ,
                    <?php echo CHtml::link('Mombasa', array('/site/page', 'view' => 'bulk-sms-in-mombasa')); ?>,
                    <?php echo CHtml::link('Kisumu', array('/site/page', 'view' => 'bulk-sms-in-kisumu')); ?>, and
                    <?php echo CHtml::link('Nakuru', array('/site/page', 'view' => 'bulk-sms-in-nakuru')); ?>,
                </p>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card rounded-4">
                <img class="img-fluid rounded-4" src="/images/city/thika.jpg"/>
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