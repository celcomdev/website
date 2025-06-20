<?php
Yii::app()->name = 'Bulk SMS For Automotive Companies In Kenya - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS For Automotive Companies In Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-automotive'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>

<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
				<h1 class="text-center">Bulk SMS For Automotive Companies In Kenya.</h1>
				<p class="lead text-center">Use our <b>Bulk SMS for automotive industry in kenya</b>, to <b>send bulk SMS</b> from Ksh0.4 per SMS via our affordable SMS Gateway in Kenya </p>
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
		<p class="text-center">Automotive industry deals with assembling, retail and distribution of motor vehicles in Kenya, Bulk SMS will enable them in announcing new models, change of prices and location of offers.</p>
	</div>
</div>
</div>

<?php $this->widget('CelcomWidget'); ?>
