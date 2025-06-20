<div class="">
    <div class="">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="form">
                        <?php $form = $this->beginWidget('CActiveForm', array(
              'id' => 'kallbck-form',
              'enableClientValidation' => true,
              'clientOptions' => array(
                'validateOnSubmit' => true,
              ),
            )); ?>
                        <h4>Enter Your Mobile number</h4>
                        <p>and Get Instant Call Back on Your Mobile.</p>

                        <div class="row">
                            <div class="col-md-12 f-mobile">
                                <?php echo $form->textField($model, 'phone', array('placeholder' => 'Your mobile number')); ?>
                                <?php echo $form->error($model, 'phone'); ?>
                            </div>
                        </div>

                        <div class="form-group clearfix captchaz">
                            <?php $this->widget('CCaptcha'); ?>
                            <?php echo $form->textField($model, 'verifyCode'); ?>
                            <?php echo $form->error($model, 'verifyCode'); ?>
                        </div>
                        <div class="clearfix">
                            <div class="btn-group buttons align-self-center pull-left">
                                <?php 
                                    //echo CHtml::submitButton('Submit', array('class' => 'purple')); 
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
                <div class="col-md-5">
                    <div class="pp-imgz">
                        <img src="<?php echo Yii::app()->baseUrl . '/images/sms.png' ?>" class="img-responsive"
                            alt="Send Bulk SMS in Kenya">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="text-center">
                <h3>Call: <a href="tel:701727272">+254 (0) 701 72 72 72</a></h3>
            </div>
        </div>
    </div>
</div>