<?php
Yii::app()->name = 'Celcom Africa Careers|Celcom Africa Career Opportunities';
// Yii::app()->name = 'Careers';
Yii::app()->clientScript->registerMetaTag("Join Celcom Africa's dynamic team! Explore exciting career opportunities in communication solutions and grow with us. Apply today!", 'description');
// Yii::app()->clientScript->registerMetaTag('Are you seeking bulk SMS services of Celcom Africa or Have any Inquiries? Email: enquiries(@)celcomafrica.com. Call: +254701 372 468', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'careers'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<section class="pt-4 pt-md-5 bg-primaryy pb-5">
    <div class="container">
        <div class="row px-2">
            <div class="col-12 col-md-7">
                <h3 class="fw-bold mb-3">Open jobs</h3>
                <h6 class="fw-light fst-italic mb-4 text-white">Find Your dream job.</h6>
                <p>
                        We welcome professionals of every persuasion at Celcom Africa. If you see a position that sparks your imagination, please apply. 
                        Come help us grow a global Bulk SMS Provider, a fast-growing company where all feel proud to belong and do their best.
                    </p>
            </div>
            <div class="col-12 col-md-4 ms-auto position-relative">
                <div class="img-dotted d-none d-md-block">
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-light-2 pt-0 pb-lg-5 mt-6" style="z-index: -1">
    <!--    <div class="img-dotted"></div>-->
    <div class="container">
        <div class="row pb-3 p-4">
            <?php foreach($data as $career) { ?>
            <div class="col-md-6 col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                    <h6 class="fw-bolder text-dark mb-3">
                        <?php echo $career->title ?> ( <?php echo $career->type; ?> )
                    </h6>
                    </div>
                    <div class="card-body" style="min-height:170px;">
                        <div class="row gx-md-2 gx-1">
                            <div class="col-12">
                                
                                <p class="text-body">
                                <?php echo $career->introduction; ?>
                                </p>
                                <p class="text-body fs-6 mt-2">
                                    <b>Apply By:</b> <?php echo $career->apply_by; ?>
                                </p>
                                <?php if($career->salary_range) { ?>
                                <p class="text-body fs-6 mt-2">
                                    <b>Salary Range:</b> <?php echo $career->salary_range; ?>
                                </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-end">
                            <a href="<?php echo "/careers/view/{$career->alias}"; ?>" class="btn btn-md px-4 theme-btn py-2">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>