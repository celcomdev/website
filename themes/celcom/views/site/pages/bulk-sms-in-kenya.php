<?php
Yii::app()->name = 'Bulk SMS in kenya, SMS Gateway in Kenya - Celcom Africa Ltd';
Yii::app()->clientScript->registerMetaTag('Bulk SMS in kenya, SMS Gateway in Kenya - at a very affordable cost. high priority Bulk SMS', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'bulk-sms-in-kenya'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
    <div class="wpg-hds-grid py-5">
        <div class="wpg-hds-scr">
            <div class="container">
                <div class="wpg-hds-inside">
                    <h1 class="text-center"><?php echo CHtml::link('Bulk SMS in Kenya', array('site/page', 'view' => 'buy-bulksms-kenya')); ?></h1>
                    <p>Discover the <b>cheapest bulk SMS marketing</b> & SMS Gateway in Kenya. Use our <b> bulk SMS
                            gateways
                            in Kenya</b> and <b>free API</b> to <b>send bulk SMS</b> from KSh0.4 per SMS </p>
                </div>
                <div class="clearfix"></div>
                <?php $this->widget('CallbackWidget'); ?>
            </div>
            <?php $this->widget('TestGateway'); ?>
        </div>
    </div>
    <div class="page-row-grid">
        <div class="container">
            <div class="condense">
                <p>Bulk SMS is a fast and effective medium of communication which assists in sending branded messages to
                    your clients or customers at a very affordable cost wherever they are instantly and at once. Are you
                    in <?php echo CHtml::link('Nairobi', array('/site/page', 'view' => 'bulk-sms-in-nairobi')); ?>,
                    <?php echo CHtml::link('Mombasa', array('/site/page', 'view' => 'bulk-sms-in-mombasa')); ?>,
                    <?php echo CHtml::link('Kisumu', array('/site/page', 'view' => 'bulk-sms-in-kisumu')); ?>,
                    <?php echo CHtml::link('Nakuru', array('/site/page', 'view' => 'bulk-sms-in-nakuru')); ?>,
                    and
                    <?php echo CHtml::link('Thika', array('/site/page', 'view' => 'bulk-sms-in-thika')); ?>,
                    or any part of the country? we can help you acquire this service at a more affordable cost than you
                    may
                    think. Just give us a call or fill the application form and we will get back to you within the
                    shortest
                    time possible
                </p>
            </div>
        </div>
    </div>
<?php $this->widget('CelcomWidget'); ?>