<?php
// Set Meta Tags For SEO
Yii::app()->name = 'Bulk SMS Sending for Schools - Celcom Africa Bulk SMS';
Yii::app()->clientScript->registerMetaTag('Celcom Africa Bulk SMS for Schools send school reports cards sms, fee balances sms, alerts sms, reminders sms, notification sms to parents, students and teachers', 'description');
Yii::app()->clientScript->registerMetaTag('Cheap Reliable Bulk SMS, Bulk SMS for schools, School Attendance, Leave SMS,Easiest Bulk SMS Software For Schools, Bulk SMS alerts for schools, Send Free SMS from schools, Bulk SMS for Schools, Cheapest Bulk SMS Provider, Cheapest Bulk SMS services provider in Nairobi, Bulk SMS Kenya, schools bulk sms, Cheapest Bulk SMS provider, SMS gateway, Parental engagment for schools, Free bulk SMS, Cheap bulk SMS, Affordable bulk SMS, bulk sms for school, School bulk SMS, Bulk SMS, SMS, Alert SMS, Reminder SMS, Notification SMS, SMS API, Branded SMS, Branded SMS API', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulksms-for-schools'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
        <h1 class="text-center">Bulk SMS for Kenyan Schools, Colleges & Universities</h1>
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
      <h2>Bulk SMS | Learning Institutions</h2>
      <p>It is now easy to send school reports cards and fee balances to parents via our bulk SMS services for schooL.</p>
      <p>Our bulk SMS for Schools is a special edition of Celcom Africa that not only helps schools do bulk SMS messaging but also lets them send report cards and fee balance notifications to parents via bulk SMS.</p>
      <p>Besides, it packs all the features that users love about Celcom bulk SMS: SMS branding, long SMS, importation of contacts from Excel files, multiple account users, elegance and simplicity etc. And it's all FREE.</p>

      <h2>Sounds Nice, But How Else Can I Use Celcom Africa Bulk SMS?</h2>
      <p>There are many uses of Celcom Africa bulk SMS for Schools and the only limitation is your imagination. To help you get started though, here are some:</p>
      <ul>
        <li>Use bulk SMS to inform parents about school opening and closing dates</li>
        <li>Use text messages to send meeting invitations and reminders</li>
        <li>Bulk SMS can be used to communicate emergency situations.</li>
        <li>Keep parents in the know regarding school trips, communal works through bulk SMS.</li>
        <li>Send information through SMS messages to parents about the school's achievements.</li>
        <li>Use text messages to send fee structures</li>
        <li>Use bulk text marketing for seasonal greetings e.g during Easter, Christmas, Id-ul-Fitr, Diwali etc.</li>
      </ul>

</ul>
    </div>
	</div>
</div>
<div class="clearfix"></div>
<?php $this->widget('CelcomWidget'); ?>
