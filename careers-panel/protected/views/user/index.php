<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<?php $ops = "<ul>";
	$ops .="<li>".CHtml::link('Change Password', array('change', 'id'=>$model->id), array('class'=>'btn btn-primary ui-button'))."</li>";
	$ops .="</ul>";
	$this->beginWidget('Dashlet', array(
			'operations'=>$ops,
			'title'=>"<h2>Admin Profile</h2>",
	));
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
	),
)); ?>

<?php $this->endWidget();?>
