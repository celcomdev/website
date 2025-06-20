<?php 

?>
<div class="row" id="buy-now">
<buy-now-form></buy-now-form>
<div class="form contacts mx-auto">
  <form id="contact-form" method="post">
      <div class="form-group">
        <input placeholder="Enter Email Address" 
        name="email" id="paypal_client_email" type="text">		
      </div>
      <div class="form-group">
        <input size="60" maxlength="150" placeholder="Amount($)" 
          name="phone" id="paypal_amount_usd" min="0" type="number">	
      </div>
      <div id="paypal-button-container"></div>
  </form>          
</div>
</div>


<div style="display:none">
	<div id="paynow">
		<div class="modal-title">
			<span class="ui-md-title">Buy Bulk SMS Bundles Now!</span>
		</div>
		<div class="rq-form-wrapper">
    
			<?php 
        echo Yii::app()->controller->renderPartial('application.components.views._pay_form', array('model'=>$model)); 
      ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
