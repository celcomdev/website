<?php
Yii::app()->name = 'Bulk SMS Churches In Kenya - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS For  Churches In Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view'=>'bulk-sms-for-churches'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>

<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
				<h1 class="text-center">Bulk SMS for Churches</h1>
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
    <h3>Bulk SMS in Kenya | Religious Organization</h3>
		<p class="text-center">Over the years, we have acquired core strength in the Educational Sector.  Our SMS has tailor-made options for schools and colleges like sending AGM reminders SMS to parents, absentees, sending Fee reminders, sending meetings to notice, Dynamic SMS, sending exam results, sending SMS from Excel and many more.<br> <br>
    Churches benefit from the same when sending general notifications, announcements, fellowship dates and in case a member of the church passes on.
    </p>
	</div>
	
	  <h3>Here are some of the ways you can use Bulk SMS in Churches</h3>
    <ul>
      <li>Bulk SMS helps nurture your congregation on a daily basis. Send bible quote and nurturing messages.</li>
      <li>Use text marketing to conduct follow-up on for first-time church service visitors.</li>
      <li>Send thank you SMS messages to visitors for attending church service.</li>
      <li>The priest can use text messages to invite church members and non-church members for fellowship</li>
      <li>Invite participates on an outreach program through bulk SMS services</li>
<li>Send text message reminders for meetings to church members.</li>
<li>Send bulk SMS messages to all members with items like prayers, songs, bible verses </li>
<li>Send messages that give comfort to your congregation.</li>
    </ul>
  		 


</div>
</div>

<?php $this->widget('CelcomWidget'); ?>
