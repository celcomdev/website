<?php
Yii::app()->name = 'Bulk SMS For Web Development Companies In Kenya - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS For Web Development Companies In Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-web-development'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);

?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
				 <h1 class="text-center">Bulk SMS For Web Development Companies in Kenya</h1>
				<p class="lead text-center">Use our <b>Bulk SMS for web development agencies in kenya</b>, to <b>send bulk SMS</b> from Ksh0.4 per SMS via our affordable SMS Gateway in Kenya </p>
      </div>
	     <div class="clearfix"> </div>
       <?php $this->widget('CallbackWidget'); ?>
    </div>
    <?php $this->widget('TestGateway'); ?>
  </div>
</div>

<div class="clearfix"></div>
<div class="page-row-grid">
<div class="container">
	<div class="condense">
		<p class="text-center">Bulk SMS is one way through which modern communication technology is used in key areas like messaging services, customer care services, human resource management, vendor relation managements, sales and  promotions. Web designers can use this communication technology to supplement their marketing strategy and communicate to their clients and staffs.
</p>
	</div>
</div>
</div>

<?php $this->widget('CelcomWidget'); ?>
