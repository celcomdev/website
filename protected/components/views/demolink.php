<?php echo CHtml::link('<i class="fa fa-exchange" aria-hidden="true"></i> Request Demo', "#freedom", array("id"=>"start", 'class'=>'btn demo-btn'));
  $this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'#start',
    'config'=>array(
      'autoSize' => false,
      'scrolling'=>'no',
      'min-width' => '310px',
      'width'	 =>'100%',
    ),));
  ?>

<div style="display:none">
	<div id="freedom">
		<div class="modal-title">
			<span class="ui-md-title">Start Sending Bulk SMS Today</span>
		</div>
		<div class="rq-form-wrapper">
			<?php echo Yii::app()->controller->renderPartial('application.components.views._demo_form', array('model'=>$model)); ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
