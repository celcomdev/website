<?php
Yii::app()->name = 'Bulk SMS For Real Estate In Kenya - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS For Real Estate In Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-real-estate'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
			<p class="lead text-center">Use our <b>Bulk SMS for real estate businesses in kenya</b>, to <b>send bulk SMS</b> from Ksh0.4 per SMS via our affordable SMS Gateway in Kenya </p>
      </div>
	     <div class="clearfix"> </div>
       <?php $this->widget('CallbackWidget'); ?>
    </div>
    <?php $this->widget('TestGateway'); ?>
  </div>
</div>

<div class="page-row-grid">
<div class="container">
	<div class="condense">
		<p class="text-center">Real estate is a multi-billion industry which is redefining the state of economy in Kenya. With Bulk SMS service, real estate companies can inform their customers on availability of land, houses either for lease or rent, newly launched projects which guarantees them growth and increased sales.</p>
  </div>
</div>
</div>
<?php $this->widget('CelcomWidget'); ?>
