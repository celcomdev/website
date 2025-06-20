<?php
Yii::app()->name = 'Contact Us|Celcom Africa |Bulk SMS & Communication Solutions';
// Yii::app()->name = 'Contact Page';
Yii::app()->clientScript->registerMetaTag('Contact Celcom Africa for reliable bulk SMS, Bulk Email, USSD, and communication solutions. Call us at +254 701 727 272 or email enquiries@celcomafrica.com', 'description');
// Yii::app()->clientScript->registerMetaTag('Are you seeking bulk SMS services of Celcom Africa or Have any Inquiries? Email: enquiries(@)celcomafrica.com. Call: +254701 372 468', 'description');
Yii::app()->clientScript->registerMetaTag('', 'keywords');
$canon = Yii::app()->createAbsoluteUrl('site/page', array('view' => 'contact'));
Yii::app()->clientScript->registerLinkTag('canonical', null, $canon);
?>
<section class="pt-4 pt-md-5 bg-primaryy pb-5">
    <div class="container">
        <div class="row px-2">
            <div class="col-12 col-md-7">
                <h3 class="fw-bold mb-3">Contact Us</h3>
                <h6 class="fw-light fst-italic mb-4 text-white">We'd Love To Hear From You.</h6>
                <p>
                    At Celcom Africa we love to hear from our customers, whether you are new to Bulk SMS services, or
                    are looking
                    to change your existing Bulk SMS supplier or need advice on how to use or send Bulk SMS,
                    USSD code, Short code, SMS API integration, just call Celcom Africa, and we will spring into action.
                </p>
                <div class="pt-4 pb-5 text-center text-lg-start pb-lg-0 pt-lg-5">
                    <button type="button" class="btn btn-outline-light px-4 rounded-5 fw-bold" data-bs-toggle="modal"
                        data-bs-target="#requestCallback" aria-haspopup="true">
                        Request A Callback
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-4 ms-auto position-relative">
                <div class="img-dotted d-none d-md-block"></div>
                <div class="text-center">
                    <img src="/themes/celcom/images/contact-us.svg" class="img-fluid" alt="contact us">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-body-tertiary">
    <div class="container">
        <div class="row align-items-center gx-md-5 gy-5 justify-content-center">
            <div class="col-md-6">
                <div id="forms" class="shadow rounded-3">
                    <contact-form></contact-form>
                    <request-callback-form></request-callback-form>
                </div>
            </div>
            <div class="col-12 col-md-6 px-4">
                <h6 class="text-secondaryy pb-2">Make a quick enquiry</h6>
                <h2 class="">Get in touch today</h2>
                <p>We are available 24/7 to assist you with any information or resources regarding our services that you
                    may need. Feel free to reach out now.</p>
                <div class="row row-cols-auto row-cols-md-2 g-5 pt-md-5">
                    <div class="col">
                        <i
                            class="bi bi-telephone text-primaryy mb-2 bg-primary-subtle p-3 d-inline-flex rounded-circle"></i>
                        <h6 class="mb-3">Call Us</h6>
                        <p>Have any queries regarding our services or products? Call for Support Now!</p>
                        <p class="mb-1 text-primaryy fw-medium">
                            <i class="bi bi-telephone pe-2"></i>+(254) 701 727 272
                        </p>
                    </div>
                    <div class="col">
                        <i
                            class="bi bi-chat-left-text text-success mb-2 bg-success-subtle p-3 d-inline-flex rounded-circle"></i>
                        <h6 class="mb-3">Chat Us</h6>
                        <p>
                            Our support team is available 24/7 to help you at anytime.
                        </p>
                        <p class="mb-1 text-primaryy fw-medium">
                            <i class="bi bi-chat-left-text pe-2"></i>Start a live chat
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container py-4">
    <div class="row px-2">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d249.3023452410373!2d36.803071662088485!3d-1.2704553837510109!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x20fd428c8a1e7e6b!2sCheap%20Bulk%20SMS%20Kenya%20%7C%20Celcom%20Africa%20Bulk%20SMS%20ltd!5e0!3m2!1sen!2ske!4v1569848793448!5m2!1sen!2ske"
            width="100%" height="360" frameborder="" style="border:0;" allowfullscreen="" class="">
        </iframe>
    </div>
</section>