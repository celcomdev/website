<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'changepassword-form',
		//'enableAjaxValidation'=>true,
		'clientOptions'=>array(
		//	'validateOnSubmit'=>true,
		),
	)); ?>

<?php $ops = "<ul>";
		$ops .="<li>".CHtml::link('Back', array('index'), array('class'=>'btn btn-primary ui-button'))."</li>";
	  $ops .="<li>".CHtml::submitButton('Save', array('class'=>' btn btn-success', 'encode'=>false))."</li>";
		$ops .="</ul>";
	$this->beginWidget('Dashlet', array(
			'operations'=>$ops,
			'title'=>"<h2>Change Password</h2>",
	));
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
	<?php echo $form->labelEx($model,'oldPassword'); ?>
	<?php echo $form->passwordField($model,'oldPassword'); ?>
	<?php echo $form->error($model,'oldPassword'); ?>
	</div>

	<div class="form-group">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo "Minimal password length 4 symbols"; ?>
	</p>
	</div>

	<div class="form-group">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>


	<div class="form-group submit">
	<?php echo CHtml::submitButton("Save", array('class'=>'btn btn-danger')); ?>
	</div>


	<?php $this->endWidget(); ?>
  <?php $this->endWidget(); ?>

</div><!-- form -->
