<?php
Yii::app()->name = 'Thanks';
Yii::app()->clientScript->registerMetaTag('', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');
Yii::app()->clientScript->registerMetaTag('NOINDEX, FOLLOW', 'robots');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'thanks'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>

<section>
    <div class="container">
        <div class="card bg-primary-subtle text-success">
            <div class="card-body">
                <h3 class="text-center fw-bold">Thank you for getting in touch!</h3>
                <h6 class="lead text-center">We will get back to you shortly</h6>
            </div>
        </div>
    </div>
</section>