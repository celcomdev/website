<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'jobs-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>

	<div class="operation">
		<ul>
			<li><?php echo CHtml::link('Back', array('index'), array('class' => 'btn btn-info')); ?></li>
			<li><?php echo CHtml::submitButton('Save', array('class' => 'btn btn-success')); ?></li>
		</ul>

	</div>
	<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title' => "<h2>Add Job Posting</h2>",
	));
	?>
	<?php echo $form->errorSummary($model); ?>

	<?php $this->renderPartial('_form', array('form' => $form, 'model' => $model)); ?>

	<?php $this->endWidget(); ?>
	<?php $this->endWidget(); ?>

</div><!-- form -->