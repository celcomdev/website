<?php
Yii::app()->name = 'Bulk SMS API integration';
Yii::app()->clientScript->registerMetaTag('Empower your system with Celcom Africa\'s easy to use APIs.', 'description');
Yii::app()->clientScript->registerMetaTag('API integration, Celcom Africa SMS API, Bulk Email Integration,Bulk SMS Integration', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('site/developers', array('view' => 'developers-center'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
    <div id="forms">
        <request-demo-form></request-demo-form>
        <request-callback-form></request-callback-form>
    </div>
<?php $this->renderPartial('developers/_sms_api'); ?>
<?php //$this->renderPartial('developers/_email_api'); ?>