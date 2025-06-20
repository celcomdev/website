<div class="modal fade" id="testOurGateway" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testOurGatewayLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-primaryy border-3 border-end-0 border-bottom-0 px-2">
            <div class="modal-header">
                <h4 class="modal-title text-primaryy fw-medium" id="testOurGatewayLabel">Test Our Gateway</h5>
                    <button type="button" class="btn-close bg-accent--lt rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'kallbck-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'action' => Yii::app()->createUrl('/site/cbk'),
                )); ?>
                <div class="w-75">
                    <div class="form-group mb-3">
                        <?php echo $form->textField($model, 'phone', array('placeholder' => 'Phone number', 'class' => 'form-control w-100 shadow-none')); ?>
                        <?php echo $form->error($model, 'phone'); ?>
                    </div>
                    <div class="form-group d-inline-flex ">
                        <?php $this->widget('CCaptcha'); ?>
                        <?php echo $form->textField($model, 'verifyCode', ['class' => 'form-control w-100 rounded-0 rounded-end-2 shadow-none border border-start-0']); ?>
                        <?php echo $form->error($model, 'verifyCode'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary me-3 btn-sm fw-semibold" data-bs-dismiss="modal">Cancel</button>
                <?php 
                //echo CHtml::submitButton('Test Now', array('class' => 'btn btn-primaryy fw-medium align-self-center btn-sm fw-semibold')); 
                echo Html::submitButton('Test Now', ['class' => 'btn btn-primaryy fw-medium align-self-center btn-sm fw-semibold', 'onclick' => 'return gtag_report_conversion();']);
                ?>
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
    </div>
</div>