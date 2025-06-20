<?php
Yii::app()->name = 'Bulk SMS For Hotels And Resorts In Kenya- Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS For Hotels And Resorts In Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-hotels-resorts'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
				<h1 class="text-center">Bulk SMS For Hotels & Resorts In Kenya</h1>
        <p class="lead text-center"></p>
      </div>
      <?php $this->widget('CallbackWidget'); ?>
    </div>
    <?php $this->widget('TestGateway'); ?>
  </div>
</div>

<div class="page-row-grid">
<div class="container">
	<div class="condense">
    <h1>Bulks SMS | Hospitality Industry</h1>
		<p class="text-center">The hospitality industry is one of the fastest-growing industries in Kenya whereby hotels, resorts and parks are playing a significant role in the growth of our economy. Holiday destinations, official meetings, conferences, weddings, birthdays and many more events, are held in hotels and resorts. As a result, bulk SMS plays a vital role in relaying information to customers about offers, new services, food festivals and other amenities </p>
	</div>
</div>
</div>
<?php $this->widget('CelcomWidget'); ?>
