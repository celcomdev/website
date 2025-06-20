<?php
Yii::app()->name = 'Thank you for getting in touch';
Yii::app()->clientScript->registerMetaTag('', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');
Yii::app()->clientScript->registerMetaTag('NOINDEX, FOLLOW', 'robots');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'success'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>

<div class="container py-5">
    <div class="wpg-hds-scr">
        <div class="container">
            <div class="wpg-hds-inside">
                <?php
                if (Yii::app()->user->hasFlash('success')) : ?>
                    <?php echo Yii::app()->user->getFlash('success'); ?>

                <?php endif; ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>