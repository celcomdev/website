<div class="form contacts">

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'contact-form',
'enableClientValidation'=>true,
'clientOptions'=>array(
    'validateOnSubmit'=>true,
),
)); ?>
    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->textField($model,'name', array('placeholder'=>'full name ...')); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="form-group">
      <?php echo $form->textField($model,'phone', array('placeholder'=>'phone number ...')); ?>
      <?php echo $form->error($model,'phone'); ?>
    </div>
    <div class="form-group">
      <?php echo $form->textField($model,'email', array('placeholder'=>'email address')); ?>
      <?php echo $form->error($model,'email'); ?>
 		</div>
    <?php if(CCaptcha::checkRequirements()): ?>
				<div class="form-group">
					<div class="kaptcha-fig">
						<?php $this->widget('CCaptcha'); ?>
					</div>
					<div class="kaptcha-cod">
					<?php echo $form->textField($model,'verifyCode', array('placeholder'=>'Enter Verification Code')); ?>
					<?php echo $form->error($model,'verifyCode'); ?>
					</div>
				</div>
			<?php endif;  ?>
			<div class="clearfix"></div>
		

    <div class="form-group buttons">
      <div class="text-center">
        <?php 
            //echo CHtml::submitButton('Submit', array('class' => 'btn btn-white')); 
            echo Html::submitButton('Submit', [
            'class' => 'btn btn-primary', 
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
