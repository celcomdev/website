<div class="banner-form banner-search">
	<div class="bnr-frm-inside">
		<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'enquiry-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'action' => Yii::app()->createUrl('/site'),
		)); ?>
		<h3 class="text-center">Request a Callback</h3>
			<?php echo $form->errorSummary($model); ?>
			<div class="form-group">
				<div class="field-iconz">
					<?php echo $form->textField($model,'name', array('encode'=>false,'placeholder'=>'Enter Full Name')); ?>
					<?php echo $form->error($model,'name'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="field-iconz">
					<?php echo $form->textField($model,'phone', array('encode'=>false, 'placeholder'=>'Enter Your Phone')); ?>
					<?php echo $form->error($model,'phone'); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="field-iconz">

				</div>
				<?php echo $form->textField($model,'email', array('encode'=>false, 'placeholder'=>'Enter Your Email')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->textArea($model,'body',array('rows'=>2, 'encode'=>false, 'placeholder'=>' Email Message...')); ?>
				<?php echo $form->error($model,'body'); ?>
			</div>

			<?php if(CCaptcha::checkRequirements()): ?>
				<div class="form-group">
					<div class="kaptcha-fields">
						<?php $this->widget('CCaptcha'); ?>
						<?php echo $form->textField($model,'verifyCode', array('class'=>'captcha', 'placeholder'=>'Enter code')); ?>
						<?php echo $form->error($model,'verifyCode'); ?>
					</div>
				</div>
			<?php endif; ?>
		 <div class="clearfix"> </div>
			<div class="form-group clearfix">
				<div class="buttons enquirybtn">
				<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-green')); ?>
			</div>
			</div>

		<?php $this->endWidget(); ?>

		</div><!-- form -->
	</div>

</div>
