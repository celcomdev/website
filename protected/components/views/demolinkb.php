<?php echo CHtml::link('<i class="fa fa-exchange" aria-hidden="true"></i> Request Demo', "#demoz", array("id"=>"demnow", 'class'=>'btn btn-pill btn-outline-light'));
  $this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'#demnow',
    'config'=>array(
      'autoSize' => false,
      'scrolling'=>'no',
      'min-width' => '310px',
      'width'	 =>'100%',
    ),));
  ?>

<div style="display:none">
	<div id="demoz">
		<div class="modal-title">
			<span class="ui-md-title">Start Sending Bulk SMS Today</span>
		</div>
		<div class="rq-form-wrapper">
			<?php echo Yii::app()->controller->renderPartial('application.components.views._demo_form', array('model'=>$model)); ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
