<div class="card bg-body-secondary rounded-5 px-1" style="padding-top: 0.2rem;padding-bottom: 0.2rem">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'kallbck-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'action' => Yii::app()->createUrl('/site/cbk'),
    )); ?>
    <div class="row row-cols-2 align-items-center gx-0 gap-0">
        <div class="col-xxl py-0">
            <?php echo $form->textField($model, 'phone', array('class' => 'form-control border-0 w-100 rounded-5 shadow-none bg-body-secondary', 'placeholder' => 'Enter your phone number', 'required' => true)); ?>
            <?php echo $form->error($model, 'phone'); ?>
        </div>
        <div class="col-sm text-end">
            <div class="btn-group buttons align-self-center">
                <?php 
                echo CHtml::submitButton('Send Request', array('class' => 'btn fw-bold rounded-5 btn-primaryy px-4 py-2','onclick' => 'gtag_report_conversion();' )); 
            //  echo Html::submitButton('Send Request', ['class' => 'btn fw-bold rounded-5 btn-primaryy px-4 py-2','onclick' => 'return gtag_report_conversion();']);
                ?>
            </div>
        </div>
    </div>
</div>
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
