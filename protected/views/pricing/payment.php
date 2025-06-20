<?php $this->pageTitle='Order Checkout || Payment Gateway -'. Yii::app()->name;
	Yii::app()->clientScript->registerMetaTag('NOINDEX, NOFOLLOW', 'robots');
?>

<div class="wpg-hds-grid">
  <div class="wpg-hds-scr">
    <div class="container">
      <div class="wpg-hds-inside pricy">
				<h1 class="text-center">Select Payment Method</h1>
					<p class="text-center lead">Please select the preferred service to use to make payment.</p>
      </div>
	     <div class="clearfix"> </div>
    </div>
    <?php //$this->widget('TestGateway'); ?>
  </div>
</div>

<div class="">
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<div class="form cheki-out">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'payment-method-form',
					'enableAjaxValidation'=>false,
					'clientOptions'=>array(),
				  'htmlOptions' => array('enctype'=>'multipart/form-data'),
				)); ?>
				<div class="form-fields-wrapper">

					<div class="order-form-wrapper">
						<?php echo $form->errorSummary($model); ?>

						<div class="col-md-6 checkout-method">
							<div class="payment-method form-group">
								<div class="method-img">
									<img src="<?php echo Yii::app()->baseUrl.'/images/cards/paypal.jpg '; ?>" alt="" class="img-responsive">
								</div>
								<div class="method-frm">
									<input value="PayPal" class="" name="Methods[code]" id="Methods_code" type="radio">
									<?php echo $form->labelEx($model, "Paypal", array('class'=>'required')); ?>
								</div>
							</div>
						</div>

						<div class="col-md-6 checkout-method">
							<div class="payment-method form-group">
								<div class="method-img">
									<img src="<?php echo Yii::app()->baseUrl.'/images/cards/ipay.png'; ?>" alt="" class="img-responsive">
								</div>
								<div class="method-frm">
									<input value="IPAY" class="" name="Methods[code]" id="Methods_code" type="radio">
									<?php echo $form->labelEx($model, 'IpayAfrica', array('class'=>'required')); ?>
								</div>
							</div>
						</div>

						<div class="form-group inline-fields text-center">
							<div class="submit-row">
							 	<?php echo CHtml::submitButton('Proceed', array('class'=>'btn btn-success')); ?>
							</div>
						</div>
					</div>
				</div>
				<?php $this->endWidget();?>
			</div><!-- form -->
		</div>
	</div>
</div>
