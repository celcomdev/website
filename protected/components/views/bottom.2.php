
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
		'id'=>'dailogDemo',
		'options'=>array(
			'title'=>'Start Sending Bulk SMS Today',
			'autoOpen'=>false,
			'modal'=>true,
      'min-width' =>'70%',
      'width'=>'auto',
			 'max-width'=>'70%',
			'height'=>460,
		),
	));
?>
<div class="demo-form"></div>
<?php $this->endWidget();?>


<div class="action-panel-bottom">
    <div class="container">
    <div class="panel-bottom-text">
      <h4 class="text-center">Boost your business with our easy to use Bulk SMS Gateway</h4>
      <h5 class="text-center">Incredibly low price from 0.4 per SMS</h5>
      <h5 class="text-center">50 free Bulk SMS for testing bulk SMS service</h5>
      <p class="text-center">
        <?php echo CHtml::link('<i class="fa fa-exchange" aria-hidden="true"></i> get free demo', '#', array('class'=>'btn btn-blue',
          'onclick'=>'{
            freeDemo();
            $("#dailogDemo").dialog("open");
            return false;
          }'
        ));
        ?>
      </p>

    </div>
  </div>
</div>
<?php $this->widget('Counter'); ?>

<script type="text/javascript">
function freeDemo()
{
  $.ajax({
    type:'POST',
    dataType:'json',
    url:'<?php echo Yii::app()->createUrl('/site/demo') ?>',
    success:function(data)
    {
      if (data.status == 'failure')
      {
        $('#dailogDemo div.demo-form').html(data.div);
        $('#dailogDemo div.demo-form form').submit(freeDemo);
      } else {
      }
    }
  });
  return false;
}
</script>
