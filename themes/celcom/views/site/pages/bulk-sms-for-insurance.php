<?php
Yii::app()->name = 'Bulk SMS For Insurance In Kenya - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS For Insurance In Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-insurance'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>

<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
				 <h1 class="text-center">Bulk SMS For Insurance In Kenya</h1>
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
    <h2>Bulks SMS | Insurance industry</h2>
		<p class="text-center">Insurance industry being one of the oldest and well established in Kenya, needs to acquire a modern way of reaching out to their customers of whom they have interacted with over years and also the new ones. Bulk SMS services is not only for Insurance companies to communicate or update about insurance premium and other insurance policies and services but also any Insurance agent can afford this Bulk SMS services.</p>

    <h2>How Can I Use Bulk SMS In Insurance Industry?</h2>
    <ul>
      <li>You can use bulk SMS to send payment reminders to your clients</li>
      <li>Use bulk SMS services to schedule meetings with your clients</li>
      <li>Use SMS marketing to promote new services to your clients</li>
      <li>Use text messages to get feedback from client about your service by taking SMS survey.</li>
      <li>Update client on their claims as soon as you get notification that their claims are ready</li>
      <li>Send quotes to clients or use USSD code to generate service quotes e.g. TEXT “Health to 202020”</li>
      <li>Use bulk SMS marketing tools to send clients links of your website, offers, meet up location, office map etc.</li>
    </ul>
    
	</div>
</div>
</div>
<?php $this->widget('CelcomWidget'); ?>
