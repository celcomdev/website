<div class="modal fade" id="quickEnquiry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="quickEnquiryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-primaryy px-1 border-2 shadow-lg rounded-1">
            <div class="modal-header">
                <h5 class="modal-title text-primaryy fw-medium">
                    Thank you for your Interest in Our Services
                </h5>
                <button type="button" class="btn-close bg-primaryy--lt rounded-circle" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="card d-none d-lg-block bg-body-secondary rounded-0 shadow-md border-0">
                <div class="card-body">
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'enquiry-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    )); ?>
                    <h6 class="mb-4 fw-medium lh-md">Please fill out the form below and we will be in touch as soon as
                        possible.</h6>
                    <?php echo $form->errorSummary($model); ?>
                    <div class="form-group mb-4">
                        <?php echo $form->textField($model, 'name', array("class" => 'form-control rounded-3 border-0 shadow-none', 'encode' => false, 'placeholder' => 'Name')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </div>

                    <div class="form-group mb-4">
                        <?php echo $form->textField($model, 'phone', array("class" => 'form-control rounded-3 border-0 shadow-none', 'encode' => false, 'placeholder' => 'Phone')); ?>
                        <?php echo $form->error($model, 'phone'); ?>
                    </div>

                    <div class="form-group mb-4">
                        <?php echo $form->textField($model, 'email', array("class" => 'form-control rounded-3 border-0 shadow-none', 'encode' => false, 'placeholder' => 'Email')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>

                    <div class="form-group mb-3">
                        <?php echo $form->textArea($model, 'body', array("class" => 'form-control shadow-none border-0 rounded-3', 'rows' => 4, 'cols' => 5, 'encode' => false, 'placeholder' => ' Type you message...')); ?>
                        <?php echo $form->error($model, 'body'); ?>
                    </div>

                    <!-- <?php if (CCaptcha::checkRequirements()) : ?>
			<div class="form-group mb-3">
				<div class="col-md-6">
					<?php $this->widget('CCaptcha'); ?>
				</div>
				<div class="col-md-6">
					<?php echo $form->textField($model, 'verifyCode', array("class" => 'form-control', 'placeholder' => 'Enter code')); ?>
					<?php echo $form->error($model, 'verifyCode'); ?>
				</div>
			</div>
		<?php endif; ?> -->

                    <div class="form-group">
                        <div class="text-end">
                            <?php echo CHtml::submitButton('Send Enquiry', ['class' => "btn btn-sm btn-primaryy px-4"]); ?>
                        </div>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>