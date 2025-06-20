
<div class="">
  <div class="">
    <div class="modal-body">
      <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
        	'id'=>'contact-form',
        	'enableClientValidation'=>true,
        	'clientOptions'=>array(
        		'validateOnSubmit'=>true,
        	),
          'action'=>Yii::app()->createUrl('/site/pay'),
        )); ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group f-user">
           		<?php echo $form->textField($model,'name', array('placeholder'=>'Enter full name')); ?>
           		<?php echo $form->error($model,'name'); ?>
         	  </div>
          </div>
          <div class="col-md-6">
            <div class="form-group f-email">
          		<?php echo $form->textField($model,'email', array('placeholder'=>'Enter email')); ?>
          		<?php echo $form->error($model,'email'); ?>
          	</div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group f-mobile">
              <?php echo $form->textField($model,'phone',array('placeholder'=>'Enter phone number')); ?>
              <?php echo $form->error($model,'phone'); ?>
          	</div>
          </div>
          <div class="col-md-6">
            <div class="form-group f-money">
              <?php echo $form->textField($model,'amount',array('placeholder'=>'Enter amount to pay.')); ?>
              <?php echo $form->error($model,'amount'); ?>
          	</div>
          </div>
        </div>

        <?php /* ?>
        <div class="row clearfix">
          <div class="form-group captchaz">
            <div class="col-md-9">
              <div class="kapcha-img">
                <?php $this->widget('CCaptcha'); ?>
              </div>
              <?php echo $form->textField($model,'verifyCode'); ?>
              <?php echo $form->error($model,'verifyCode'); ?>
            </div>


          </div>
        </div>
        <?php */ ?>

        <div class="row">
          <div class="btn-group buttons align-self-center pull-right">
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
      </div><!-- form -->
    </div>

    <div class="modal-footer">
      <div class="text-center">
        <h3>Call: <a href="tel:701727272">+254 (0) 701 72 72 72</a></h3>
      </div>
    </div>
  </div>
</div>
