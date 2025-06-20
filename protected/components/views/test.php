<div class="test-panel-grid">
  <div class="container">
    <div class="col-md-9 col-md-offset-1">
      <div class="form test-gateway">
        <?php $form=$this->beginWidget('CActiveForm', array(
        	'id'=>'enquiry-form',
        	'enableClientValidation'=>true,
        	'clientOptions'=>array(
        		'validateOnSubmit'=>true,
        	),
          'action'=>Yii::app()->createUrl('/site/index'),
        )); ?>
        <div class="row">
          <div class="col-md-3 col-12 p-1">
            <div class="form-group">
              <input type="tel" name="" id="" class="input is-primary">
            </div>
          </div>
          <div class="col-md-3 col-12 p-1">
            <div class="g-recaptcha" data-sitekey="6LfJazYiAAAAAEvowuYV8wSKaTxKc2-SpGnk8u4n"></div>
          </div>
          <div class="col-md-3 col-12 p-1">
            <button type="submit" class="button">Test Gateway</button>
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
      <div class="clearfix"></div>
      </div><!-- form -->
    </div>
  </div>
</div>
