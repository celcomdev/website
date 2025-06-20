<div class="webpage-grid">
  <div class="container">
    <h1 class="text-center">Confirm Order</h1>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover orders">
        <thead>
          <tr>
            <th width="20%" class="text-left">SMS Bundles</th>
            <th width="10%"class="text-left">No of Units</th>
            <th class="text-left">Price Per Unit</th>
            <th class="text-right" width="200px">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left"><?php echo $data['bundles']; ?></td>
            <td class="text-left"><?php //echo $; ?></td>
            <td class="text-left"><?php  echo $data['price']; ?></td>
            <td class="text-right"><?php echo $data['total']; ?></td>
          </tr>
        </tbody>

        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">
                <table class="table rules-table tally">
                  <tr class="cart-rules-<?php //echo $i; ?>">
                    <th class="text-right" style="border:none;">Sub Total:</th>
                    <td class="text-right"><?php echo $data['total']; ?></td>
                  </tr>
                  <tr class="cart-rules-<?php //echo $i; ?>">
                    <th class="text-right" style="border:none;">Grand Total</th>
                    <td class="text-right"><?php echo $data['total']; ?></td>
                  </tr>

                </table>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="clearfix"></div>
    <div class="form">
      <?php
       $form=$this->beginWidget('CActiveForm', array(
        'id'=>'confirm-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
          'validateOnSubmit'=>true,
        ),
      ));
      ?>
      <?php echo $form->errorSummary($model); ?>
      <div class="control">
        <div class="row">
          <div class="col-md-4 _terms">
            <div class="form-group">
              <div class="radio-field">
                <?php echo $form->checkBox($model,'agrees', array('class'=>'agrees')); ?>
              </div>
              <div class="radio-label">
                <?php echo $form->labelEx($model,'agrees'); ?>
                <?php echo $form->error($model,'agrees');  ?>
              </div>
            </div>
            <div class="form-group cart-ctrl">
              <?php echo CHtml::submitButton('Confirm Order', array('class'=>'btn green-btn')); ?>
            </div>
          </div>
        </div>
      </div>

    <?php $this->endWidget(); ?>
      </div>

  </div>
</div>
