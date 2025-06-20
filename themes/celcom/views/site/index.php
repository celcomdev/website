<?php 
$this->pageTitle = 'Cheap Bulk SMS Kenya|Bulk SMS Provider |SMS API Gateway';
//$this->pageTitle = 'The Best Bulk SMS Provider in Kenya | Celcom Africa';
Yii::app()->clientScript->registerMetaTag('Celcom Africa is the best and cheapest Bulk SMS provider offering cheap bulk SMS services, USSD codes & shortcodes, and Bulk Email and SMS Gateway across Africa', 'description');
Yii::app()->clientScript->registerMetaTag('bulk SMS service, bulk SMS provider, bulk SMS gateway, bulk SMS, bulkSMS, bulk SMS messages, SMS API, USSD, Shortcodes, bulk SMS API, bulk SMS kenya, bulk SMS marketing, Cheap bulk SMS, affordable bulk sms, bulk sms free software kenya, Shortcodes', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('/site/index', array());
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
Yii::app()->clientScript->registerMetaTag('Celcom Africa is the best and cheapest Bulk SMS provider offering cheap bulk SMS services, USSD codes & shortcodes, and Bulk Email and SMS Gateway across Africa', 'og:description');
// Yii::app()->clientScript->registerMetaTag('Reliable Bulk SMS provider in Kenya with affordable packages. Experienced in bulk SMS services, SMS API, USSD shortcode & IVR.', 'og:description');
Yii::app()->clientScript->registerMetaTag('Bulk SMS Provider |Cheap Bulk SMS Kenya|Celcom Africa SMS', null, null, array('property' => 'og:title'));
//Yii::app()->clientScript->registerMetaTag('Bulk SMS Kenya | Cheap Bulk SMS Services in Kenya cabulksms.com', null, null, array('property' => 'og:title'));
Yii::app()->clientScript->registerMetaTag('Celcom Africa is the most trusted and best bulk SMS provider in Kenya, offering cheap bulk SMS services, USSD Code and shortcodes, Bulk SMS API and Bulk Email', null, null, array('property' => 'og:description'));
// Yii::app()->clientScript->registerMetaTag('Reliable Bulk SMS provider in Kenya with affordable packages. Experienced in bulk SMS services, SMS API, USSD shortcode & IVR.', null, null, array('property' => 'og:description'));
Yii::app()->clientScript->registerMetaTag($canon, null, null, array('property' => 'og:url'));
Yii::app()->clientScript->registerMetaTag(Yii::app()->getBaseUrl(true) . '/images/sms-features.png', null, null, array('property' => 'og:image'));
Yii::app()->clientScript->registerMetaTag('Bulk SMS Provider |Cheap Bulk SMS Kenya|Celcom Africa SMS', 'twitter:title');
//Yii::app()->clientScript->registerMetaTag('Bulk SMS Kenya | Cheap Bulk SMS Services in Kenya cabulksms.com', 'twitter:title');
Yii::app()->clientScript->registerMetaTag('Celcom Africa is the most trusted and best bulk SMS provider in Kenya, offering cheap bulk SMS services, USSD Code and shortcodes, Bulk SMS API and Bulk Email', 'twitter:description');
// Yii::app()->clientScript->registerMetaTag('Reliable Bulk SMS provider in Kenya with affordable packages. Experienced in bulk SMS services, SMS API, USSD shortcode & IVR.', 'twitter:description');
Yii::app()->clientScript->registerMetaTag(Yii::app()->getBaseUrl(true) . '/images/sms-features.png', 'twitter:image');
?>

<?php echo Yii::app()->controller->renderPartial('components/home/_slider'); ?>
<?php echo Yii::app()->controller->renderPartial('components/home/_services'); ?>
<?php echo Yii::app()->controller->renderPartial('components/shared/_cta_one'); ?>
<?php echo Yii::app()->controller->renderPartial('components/home/_business'); ?>
<?php echo Yii::app()->controller->renderPartial('components/home/_customers'); ?>
<?php echo Yii::app()->controller->renderPartial('components/home/_devs'); ?>
<?php echo Yii::app()->controller->renderPartial('components/home/_why_celcom'); ?>
<?php echo Yii::app()->controller->renderPartial('components/shared/_clients'); ?>
<?php $this->renderPartial('components/shared/_testimonials'); ?>
<?php echo Yii::app()->controller->renderPartial('components/shared/_cta_three'); ?>

<div id="forms">
    <request-demo-form></request-demo-form>
    <request-callback-form service="Bulk SMS Services"></request-callback-form>
    <partner-with-us service="our Reseller Program"></partner-with-us>
    <test-gateway-form></test-gateway-form>
</div>
