<?php
Yii::app()->name = 'Register or Create Free Account |Celcom Africa Account Login';
Yii::app()->clientScript->registerMetaTag('Register for a free account with Celcom Africa and start using our bulk SMS, test SMS Gateway, USSD, and communication services. Quick login and seamless access', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');
Yii::app()->clientScript->registerMetaTag('INDEX, DOFOLLOW', 'robots');

$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'register'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<div id="forms">
    <register-form></register-form>
    <!--    <request-callback-form></request-callback-form>-->
</div>
<!--<section class="bg-primaryy py-5">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <h3 class="pb-2">Account Registration</h3>-->
<!--                <p>-->
<!--                    Create an account with us and start using our messaging solutions.-->
<!--                </p>-->
<!--                <div class="pt-5 pb-4">-->
<!--                    <button type="button" class="btn btn-outline-light rounded-0 fw-semibold py-2 px-5"-->
<!--                            data-bs-toggle="modal"-->
<!--                            data-bs-target="#requestCallback" aria-haspopup="true">-->
<!--                        Request Callback-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<section class="reg-form pb-0">-->
<!--    <div class="container">-->
<!--        <div class="col-12">-->
<!--            <div class="row justify-content-center">-->
<!--                <div class="col-md-6">-->
<!--                    <div class="position-relative">-->
<!--                        <img class="img-fluid" src="/images/services/register.jpg" alt="Celcom contact Us">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-5">-->
<!--                    <div id="forms" class="shadow-md rounded-3">-->
<!--                        <register-form></register-form>-->
<!--                        <request-callback-form></request-callback-form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->