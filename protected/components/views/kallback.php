<div class="banner-cta-1">
  <a href="#" class="btn"><i class="fa fa-volume-control-phone"></i> +254 (0) 701 72 72 72</a>
  <?php echo CHtml::link('<i class="fa fa-volume-control-phone"></i> Request a Callback', "#freedom", array("id"=>"kalbak", 'class'=>'btn btn-pill btn-outline-light'));
  $this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'#kalbak',
    'config'=>array(
      'autoSize' => false,
      'scrolling'=>'no',
      'min-width' => '310px',
      'width'	 =>'100%',
    ),));
  ?>
</div>

<div style="display:none">
	<div id="freedom">
		<div class="modal-title">
			<span class="ui-md-title">Request a Call Back</span>
		</div>
		<div class="rq-form-wrapper">
			<?php echo Yii::app()->controller->renderPartial('application.components.views._cbk_form', array('model'=>$model)); ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
