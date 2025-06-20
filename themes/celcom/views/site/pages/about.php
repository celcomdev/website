<?php
Yii::app()->name = 'Bulks SMS Provider in Kenya|Bulk SMS API|Bulk Email|USSD';
// Yii::app()->name = 'Celcom Africa is Bulks SMS Solution Provider in Kenya';
Yii::app()->clientScript->registerMetaTag("Celcom Africa is Kenya's leading provider of bulk SMS, Bulk Email, USSD, SMS API, and USSD services. For schools, NGOs & more for seamless communication", 'description');
// Yii::app()->clientScript->registerMetaTag('Celcom Africa is dedicated service provider company in Kenya that deals with Bulk SMS services, SMS gateways, SMS short codes and IVR services.', 'description');
Yii::app()->clientScript->registerMetaTag('BulkSMS Company in Kenya, BulkSMS Kenya, Bulk SMS Company, Text messages, bulk SMS messages, Bulk SMS API, Bulk SMS API gateway, bulk SMS API, Bulk SMS gateway API services, bulk text messages ', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'about'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div id="forms">
    <request-demo-form></request-demo-form>
    <request-callback-form></request-callback-form>
</div>
<?php $this->renderPartial('components/about/_slider'); ?>
<?php $this->renderPartial('components/shared/_cta_one'); ?>
<?php $this->renderPartial('components/about/_features'); ?>
<?php $this->renderPartial('components/shared/_clients'); ?>
<?php $this->renderPartial('components/shared/_testimonials'); ?>