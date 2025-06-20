<?php
Yii::app()->name = 'Thank you for getting in touch';
Yii::app()->clientScript->registerMetaTag('', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'success'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>

<section>
    <div class="container">
        <div class="card bg-primary-subtle text-success">
            <div class="card-body">
                <h1 class="text-center fw-bold">Thank you for getting in touch.</h1>
                <?php
                if (Yii::app()->user->hasFlash('success')): ?>
                    <div class="flash-success">
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!--        <div class="clearfix"></div>-->
    </div>
</section>