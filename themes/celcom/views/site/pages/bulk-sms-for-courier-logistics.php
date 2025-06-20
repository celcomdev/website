<?php
Yii::app()->name = 'Bulk SMS For Courier And Logistics In Kenya- Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS For Courier And Logistics In Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-courier-logistics'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
				<h1 class="text-center">Bulk SMS For Courier & Logistics In Kenya</h1>
        <p class="lead text-center"></p>
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
    <h1>Bulk SMS Marketing | Courier & Logistics Industry</h1>
		<p class="text-center">Courier and logistics companies mostly deal with letter transfers, official or personal documents, gifts, and other kinds of cargos. Due to this, Bulk SMS service comes in handy at receiving and dispatching of cargo with minimal complaints from the sender. Bulk SMS services not only help in tracking the cargo but also maintain security and authentication from their unique sender ID.</p>
    <p>With SMS API gateway and mobile SMS alerts, courier and logistic companies can check the order status of products and customer can also benefit from real-time text alerts, notification regarding product delivery status.</p>
    <p>Bulk SMS messaging has become an efficient mode of communication for businesses to inform clients about the consignment delivery status, track the where abouts, send out alerts and important updates regarding the delivery status.</p>
    <h2>Benefits of bulk SMS in Courier and logistics companies</h2>
    <ul>
      <li>Low Cost - Bulk SMS messages are cheaper compared to other communication models and marketing tool.</li>
      <li>Customer retention - Timely updates can help to improve customer retention rates.</li>
      <li>Instant & direct – On average people are on their mobile phone. Text SMS can be received and read instantly – usually within 3 minutes of delivery.</li>
      <li>Customer convenience - Sending delivery status, notifications, alerts, discount and offers via bulk SMS will significantly improve customer relationships.</li>
    </ul>
	</div>
</div>
</div>

<?php $this->widget('CelcomWidget'); ?>
