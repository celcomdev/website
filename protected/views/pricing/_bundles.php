<div class="">
  <div class="">
      <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
        	'id'=>'bundles-form',
          'enableAjaxValidation'=>false,
        //  'enableClientValidation'=>true,
          'focus'=>array($model,'sms_bundle'),
        	'clientOptions'=>array(
            //'afterValidate' => 'js:function(form, data, hasError){}'
          ),
          //'action'=>Yii::app()->createUrl('/pricing/buy'),
        )); ?>

    	<?php echo $form->errorSummary(array($model)); ?>
        <div class="col-md-12">
          <div class="form-group f-user">
            <?php echo $form->textField($model,'name', array('placeholder'=>'full name')); ?>
            <?php echo $form->error($model,'name'); ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group f-email">
            <?php echo $form->textField($model,'email', array('placeholder'=>'email')); ?>
            <?php echo $form->error($model,'email'); ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group f-mobile">
            <?php echo $form->textField($model,'phone',array('placeholder'=>'telephone')); ?>
            <?php echo $form->error($model,'phone'); ?>
          </div>
        </div>
        <div class="hint">Enter SMS Units Between <?php echo $model->min_sms.' - '. $model->max_sms; ?></div>
        <div class="col-md-12">
          <div class="form-group f-city">
            <?php //echo $form->labelEx($model,'sms_bundle'); ?>
            <?php echo $form->textField($model,'sms_bundle',array('placeholder'=>'Enter '.$model->min_sms.' - '. $model->max_sms.' SMSes')); ?>
            <?php echo $form->error($model,'sms_bundle'); ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="hint">sender ID branding costs one time fee of Kshs 8,000 per network</div>
          <div class="form-group sender">
            <?php echo $form->radioButtonList($model, 'sender_id', array('0'=>'No', '1'=>'Yes'), array('separator'=>'&nbsp;', 'container'=>false, 'labelOptions'=>array('class'=>''),
		          'template'=>'<div class="radio-items">{beginLabel}{input} {labelTitle}{endLabel} </div>'
		          )); ?>
              <?php echo $form->error($model,'sender_id'); ?>
          </div>
        </div>
        <?php echo $form->hiddenField($model, 'sms_price'); ?>
        <?php echo $form->hiddenField($model, 'min_sms'); ?>
        <?php echo $form->hiddenField($model, 'max_sms', array('value'=>$model->max_sms)); ?>
        <div class="text-center">
          <div class="btn-group buttons align-self-center">
            <?php 
            //echo CHtml::submitButton('Submit', array('class'=>'purple')); 
            echo Html::submitButton('Submit', [
            'class' => 'purple', 
            'onclick' => 'return gtag_report_conversion();'
            ]);
            ?>
          </div>
        </div>
        
        <?php
            // Assuming this is the contact page view file (contact.php or similar)
        ?>
            <!-- Event snippet for Lead Form 1 conversion page -->
            <script>
            function gtag_report_conversion(url) {
              var callback = function () {
                if (typeof(url) != 'undefined') {
                  window.location = url;
                }
              };
              gtag('event', 'conversion', {
                  'send_to': 'AW-628810872/M_HmCK7HhNgZEPjI66sC',
                  'event_callback': callback
              });
              return false;
            }
            </script>


      <?php $this->endWidget(); ?>
    </div>

    <div class="modal-footer">
      <div class="text-center">
        <h3>Call: <a href="tel:701727272">+254 (0) 701 72 72 72</a></h3>
      </div>
    </div>
  </div>
</div>
