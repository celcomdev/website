<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'jobs-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php if(Yii::app()->user->hasFlash('types')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('types'); ?>
	</div>
<?php endif; ?>
	<?php echo $form->errorSummary($model); ?>

	<?php $ops = "<ul>";
		$ops .="<li>".CHtml::link('Back', array('index'), array('class'=>'btn btn-primary ui-button'))."</li>";
		$ops .="<li>".CHtml::submitButton('+ Update', array('class'=>'btn btn-success ui-button'))."</li>";
		$ops .="</ul>";
		$this->beginWidget('Dashlet', array(
			'operations'=>$ops,
			'title'=>"<h2>Edit Job Posting</h2>",
		));
	?>

<?php $this->renderPartial('_form', array('form'=>$form, 'model'=>$model)); ?>

<div class="clearfix"></div>
	<div class="col-md-12 buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<div class="clearfix"></div>

<?php $this->endWidget();?>

<?php $this->endWidget(); ?>

</div><!-- form -->
