<div class="col-md-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="form-group clearfix">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('Full-time'=>'Full-time','Part-Time'=>'Part-Time', 'Internship'=>'Internship'), array('Prompt'=>'none selected')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonList($model, 'status', array('1'=>'Open', '0'=>'Closed'), array('multiple'=>true,'separator'=>'&nbsp;', 'container'=>false,
			'labelOptions'=>array('class'=>''),
			'template'=>'<div class="radio-items">{beginLabel}{input} {labelTitle}{endLabel} </div>'
			)
		); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group clearfix">
		<?php echo $form->labelEx($model,'salary_range'); ?>
		<?php echo $form->textField($model,'salary_range',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'salary_range'); ?>
	</div>


		<div class="form-group">
			<?php echo $form->labelEx($model,'apply_by'); ?>
			<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				 'model' => $model,
				 'name'=>'apply_by',
					'attribute' => 'apply_by',
					//'value'=>date('Y-m-d'),
				 'options'=>array(
					 'minDate' => date('Y-m-d'),
					 'dateFormat'=>'yy-mm-dd',
					 'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
					 'showButtonPanel'=>true,
					 'class'=>'inputbox',
				 ),
				 'htmlOptions'=>array(
					 //'onchange' =>'getPrice()',
				 ),
			 ));
		 ?>
			<?php echo $form->error($model,'apply_by'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'introduction'); ?>
			<?php echo $form->textArea($model,'introduction',array('form-groups'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'introduction'); ?>
		</div>
</div>
<div class="col-md-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php $this->widget('application.extensions.ckeditor.CKEditor',array(
					'model'=>$model,
					'attribute'=>'description',
					'language' => ''.Yii::app()->language.'',
					'editorTemplate' => 'basic', /* full, basic */
					'skin' => 'v2',
					'toolbar'=>array(
						array('Source', '-', 'Bold','Italic','Underline','Strike'),
						array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'),
						array('NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'),
						array('Styles','Format','Font','FontSize','TextColor','BGColor'),
						array('Image', 'Link', 'Unlink', 'SpecialChar'),
					),
					//'options' => $options,
					'htmlOptions' => array('id'=>'description')
				));
			?>
			<?php echo $form->error($model,'description'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'qualifications'); ?>
			<?php $this->widget('application.extensions.ckeditor.CKEditor',array(
					'model'=>$model,
					'attribute'=>'qualifications',
					'language' => ''.Yii::app()->language.'',
					'editorTemplate' => 'basic', /* full, basic */
					'skin' => 'v2',
					'toolbar'=>array(
						array('Source', '-', 'Bold','Italic','Underline','Strike'),
						array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'),
						array('NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'),
						array('Styles','Format','Font','FontSize','TextColor','BGColor'),
						array('Image', 'Link', 'Unlink', 'SpecialChar'),
					),
					//'options' => $options,
					'htmlOptions' => array('id'=>'qualifications')
				));
			?>
			<?php echo $form->error($model,'qualifications'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'apply_info'); ?>
			<?php echo $form->textArea($model,'apply_info',array('form-groups'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'apply_info'); ?>
		</div>
</div>
