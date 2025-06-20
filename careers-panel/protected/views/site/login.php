<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'focus'=>array($model,'username'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="login-wrap">
    <div class="block-error">
			<?php echo Yii::app()->user->getFlash('block'); ?>
    </div>

		<div class="row">
			<div class="form-group inputs">
				<?php  echo $form->textField($model,'username', array('placeholder'=>'Username','tabindex'=>1)); ?><span class="new-status">&nbsp;</span>
				<?php echo $form->error($model,'username'); ?>
			</div>
		</div>

		<div class="row">
			<div class="form-group inputs">
				<?php echo $form->passwordField($model,'password' , array('placeholder'=>'Password','tabindex'=>2)); ?><span class="new-status">&nbsp;</span>
				<?php echo $form->error($model,'password'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-7">
					<?php echo CHtml::link('Forgot Password?',array('forgotpassword'), array('tabindex'=>4)); ?>
			</div>
			<div class="col-md-5">
				<?php echo CHtml::submitButton('Login',array('align'=>'center','class'=>'submit','id'=>'login-button','tabindex'=>3)); ?>
			</div>
		</div>

	</div>
<?php $this->endWidget(); ?>
