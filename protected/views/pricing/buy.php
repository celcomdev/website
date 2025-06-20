<?php
Yii::app()->name = 'Buy Bulk SMS Kenya. Cost of Bulk SMS Kenya';
Yii::app()->clientScript->registerMetaTag('Buy cheap Bulk SMS in Kenya with Celcom Africa offering Bulk SMS service in Kenya from KSh0.4 per sms', 'description');
Yii::app()->clientScript->registerMetaTag('buy bulk sms, sms service  kenya, cost of SMS, bulk sms cost, kenya bulk sms cost', 'keywords');
?>

<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside pricy text-center">
        <h1 class="text-center">Buy Now</h1>
        <h3>Your SMS Bundle is between <?php echo $model->min_sms . ' & ' . $model->max_sms; ?> bundles</h3>
        <p>Price range from Ksh 0.4 to Ksh 0.8 per SMS</p>
      </div>
      <div class="clearfix"> </div>
    </div>
    <?php //$this->widget('TestGateway'); 
    ?>
  </div>
</div>

<div class="page-row-grid">
  <div class="container">
    <div class="text-center">
      <h2>Complete the form below to proceed</h2>
    </div>
    <div class="col-md-6 col-md-offset-3" id="bundle_price">
      <?php $this->renderPartial('_bundles', array('model' => $model)); ?>

      <div class="clearfix"> </div>
      <p class="lead text-center"><b>If you have an existing account, click on the button below to pay
          directly.</b> </p>
      <?php $this->widget('PayOn'); ?>
    </div>

  </div>
</div>

<div class="clearfix"></div>