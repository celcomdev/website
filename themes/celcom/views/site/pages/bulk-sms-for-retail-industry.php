<?php
Yii::app()->name = 'Bulk SMS For Retail Industry in Kenya - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS in kenya, SMS Gateway in Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-retail-industry'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
			 <h1 class="text-center">Bulk SMS For Retail Industry in Kenya</h1>
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
    
		<p class="text-center"> Bulk SMS service offers you a gateway to achieving your business targets at a low cost. This service helps target new clientele, informing customers about your products and services and update upcoming discounts.</p>
<h2>How to use Retail bulk SMS in Kenya</h2>
    <ul>
      <li>You can send bulk SMS to customers with special offers, discounts and coupons.</li>
      <li>Bulk SMS marketing can be used to purchase and deliver notifications. E.g. you can send bulk text messages after someone has made a purchase on your website thanking them and giving them details of their purchase. </li>
      <li>Use link in your bulk SMS marketing strategy this will help you to bring back more people to your web store. </li>
      <li>Use bulk SMS in Kenya to let people know of new stock alerts or sales of a curtain product or service</li>
      <li>Bulk SMS marketing can also be used for loyalty programs – Allow customers to sign up to a SMS loyalty program and send them exclusive offers through text SMS whenever you have them.</li>
      <li>Use bulk SMS to take surveys –when a client purchases from you always send them a message. This will help you understand what your strengths and weaknesses are.</li>
    </ul>
   
	</div>

	</div>
</div>
</div>
<?php $this->widget('CelcomWidget'); ?>
