<?php
Yii::app()->name = ' Cost & Pricing - Bulk SMS Sending - Celcom Africa Bulk SMS';
Yii::app()->clientScript->registerMetaTag('Bulk SMS Sending Cost. Cost of Bulk SMS sending in Kenya from 0.4 with Celcom Africa', 'description');
Yii::app()->clientScript->registerMetaTag('cost of SMS, bulk sms cost, kenya bulk sms cost', 'keywords');
?>
<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside">
				<h1 class="text-center">Bulk SMS Pricing</h1>
				<p class="lead text-center">Bulk SMS simply costs less with Celcom Africa. You only pay a one off set up fees to enjoy Bulk SMS services from Celcom Africa </p>
      </div>
	     <div class="clearfix"> </div>
    </div>
    <?php //$this->widget('TestGateway'); ?>
  </div>
</div>

<div class="page-row-grid">
	<div class="container">
		<?php if(Yii::app()->session['error_status']): ?>
		<div class="flash-error clearfix">
			<p class="lead">Kindly select appropriate SMS Bundle to continue</p>
		</div>
		<?php endif; ?>
    <h2>Buy Bulk SMS in Kenya</h2>
    <div class="clearfix"></div>
		<div class="col-md-6" id="bundle_price">
 			<table class="table table-striped pricing">
				<thead>
					<tr>
						<th scope="col">SMS Bundles</th>
						<th scope="col" align="right">Order</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $d): ?>
					<tr>
						<th  scope="row"><?php echo $d->min_sms.' - '.$d->max_sms; ?> messages</th>
						<td align="right">
              <?php echo CHtml::ajaxLink('Buy Now',
    						array('/pricing/buy', 'id'=>$d->id),
    						array(
    							'type'=>'POST',
    							'success'=>'js:function(){window.location.reload(true); }',
    						),
    						array('class'=>'btn btn-blue')
              ); ?>
							<?php /*echo CHtml::link('Buy Now', '#', array(
						 		 'class'=>'btn btn-blue',
						 		 'onclick'=>'{
						 			payNow('.$d->id.');
						 			$("#dailogBundles").dialog("open");
						 			return false;
						 		}'
						 	 )
             ); */?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
			<div class="col-md-6 celcom-pricing-grid">
        <h2 class="">Cost of Bulk SMS in Kenya</h2>
				<p class="lead">The only cost you'll incur is that of purchasing SMS units.<br>
				In fact, it's like we're giving you a free phone, but in order for you to use it, you'll need to load it up with some airtime.</p>

			<h2>Purchasing from Celcom Africa</h2>
			<p>We ensure that buying sms credits is simple. Choose from the payment options below to find the one that best suits you. Your privacy & security comes first. There is a minimum requirement of 500 credits for all purchases.</p>

			</ul>
			</div>
	</div>
</div>

<div class="clearfix"></div>
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
		'id'=>'dailogBundles',
		'options'=>array(
			'title'=>'Buy Bulk SMS Today',
			'autoOpen'=>false,
			'modal'=>true,
       'width' => 500,
      'min-width' =>'100%',
			'max-width'=>'100%',
			'height'=>525,
		),
	));
?>
<div class="buyform"></div>
<?php $this->endWidget();?>
<div class="clearfix"></div>
<script type="text/javascript">
function payNow(id)
{
	$.ajax({
		type:'POST',
		dataType:'json',
		data:{id:id},
		url:'<?php echo Yii::app()->createUrl('/pricing/buynow'); ?>',
		success:function(data)
		{
			if (data.status == 'failure')
			{
				$('#dailogBundles div.buyform').html(data.div);
				$('#dailogBundles div.buyform form').submit(payNow);
			}

			// if (data['redirect']) {
      //   location = data['redirect'];
      // }
		}
	});
	return false;
}
</script>
