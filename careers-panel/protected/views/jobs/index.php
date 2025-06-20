<?php $ops = "<ul>";
	$ops .="<li>".CHtml::link('Add New +', array('create'), array('class'=>'btn btn-primary ui-button'))."</li>";
	$ops .="</ul>";
	$this->beginWidget('Dashlet', array(
			'operations'=>$ops,
			'title'=>"<h2>Manage Jobs Postings</h2>",
	));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jobs-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>'',
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
			'id' => 'check',
			'selectableRows' => 2,
		),
		'title',
		'category',
		'type',
		array(
			'header'=>'Status',
			'name' =>'status',
			'value'=>'$data->status == 1 ? "Open" : "Closed"',
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
		'cssFile' => Yii::app()->baseUrl . '/css/grids/styles.css',
)); ?>
<?php $this->endWidget();?>
