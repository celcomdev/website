<?php
Yii::app()->name = 'Bulk SMS in Nairobi, SMS Gateway in Nairobi - Cabulksms.com';
Yii::app()->clientScript->registerMetaTag('Bulk SMS in Nairobi,  Bulk SMS compnay Nairobi provides Nairobi SMS Gateway, text marketing services - starting at Ksh 0.4 per SMS.', 'description');
Yii::app()->clientScript->registerMetaTag('bulk sms company nairobi, nairob bulks sms, bulks sms kenya, nairobi sms gateway', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'bulk-sms-in-nairobi'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>

<section class="container bg-body pt-4">
    <div class="row px-2 justify-content-center align-items-center rounded">
        <div class="col-12 col-md-7 pt-0 py-md-5">
            <div>
                <h2 class="mb-0 pb-0 text-body">Bulk SMS in Nairobi, SMS Gateway in Nairobi</h2>
                <hr class="hr-md border-3 mb-5 border-warning"/>
                <p>
                    We offer bulk SMS reseller program with free SMS API across Nairobi and bulk SMS services at a very
                    low cost from as low as 0.4 per SMS.
                </p>
                <p>
                    As a reputable and leading bulk SMS marketing company in Kenya. Celcom Africa has gained a lot of
                    popularity due to its cheap reliable bulk SMS messaging solutions in major towns such
                    as <?php echo CHtml::link('Mombasa', array('/site/page', 'view' => 'bulk-sms-in-mombasa')); ?>,
                    <?php echo CHtml::link('Kisumu', array('/site/page', 'view' => 'bulk-sms-in-kisumu')); ?>,
                    <?php echo CHtml::link('Nakuru', array('/site/page', 'view' => 'bulk-sms-in-nakuru')); ?>,
                    and
                    <?php echo CHtml::link('Thika', array('/site/page', 'view' => 'bulk-sms-in-thika')); ?>,. Our
                    bulk SMS services are mainly used in companies, enterprises and organizations including and not
                    limited to media houses, advertising, marketing agencies, and educational institutions.
                    Reach your audience through our bulk SMS services in Nairobi. We sell Church, SME, Sacco, School
                    bulk SMS. Bulk SMS in Kenya have been known to provide security e.g. bank use bulk SMS to improve
                    clients security, OTP for transactional processes, and promote products and services.

                    Get bulk SMS in Nairobi today!
                </p>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card rounded-4 border-0">
                <img class="img-fluid rounded-4" src="/images/city/nairobi.webp"/>
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