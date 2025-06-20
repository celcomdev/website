<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $baseOne = Yii::app()->baseUrl;
    // $cs = Yii::app()->clientScript;

    // $cs->registerCoreScript('jquery');
    ?>
    <?php
    Yii::app()->clientScript->registerMetaTag('website', null, null, array('property' => 'og:type'));
    Yii::app()->clientScript->registerMetaTag(Yii::app()->name, null, null, array('property' => ''));
    Yii::app()->clientScript->registerMetaTag('en_US', null, null, array('property' => 'og:locale'));
    Yii::app()->clientScript->registerMetaTag('@CaBulkSMS', 'twitter:title');
    Yii::app()->clientScript->registerMetaTag('@CaBulkSMS', 'twitter:creator');
    Yii::app()->clientScript->registerMetaTag('summary_large_image', 'twitter:card');
    ?>
    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
    <link rel="shortcut icon" href="<?php Yii::app()->baseUrl; ?>/favicon.ico">
    <meta name="yandex-verification" content="ce5788bc525d95aa" />
    <meta name="google-site-verification" content="heVQEaiiXxEMQ9KhdnqYMRE0egBOYvW4Inhf2_q2RlU" />
    <meta name="facebook-domain-verification" content="zhfsxad298d9sezdqvxal0bpff8p92" />
    <meta name="msvalidate.01" content="39EFAE461EC11D751BC5C5303277A9D5" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- App CSS File -->
    <link href="/themes/celcom/css/app.css" rel="stylesheet">
    <style>
        ::placeholder {
            font-size: 0.92rem;
        }

        .form-control {
            padding-top: 0.56rem !important;
            padding-bottom: 0.56rem !important;
        }

        .form-control:focus {
            box-shadow: none !important;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .reg-logo>.w-25 {
            width: 8.75rem !important;
            margin-left: 6.5rem;
        }

        .clip-right {
            border-top-right-radius: 50px;
        }

        .copyright {
            color: #444444;
        }

        @media screen and (max-width: 992px) {
            .bg_gradient {
                padding-bottom: 120px;
            }

            .reg-logo>.w-25 {
                width: 10.5rem !important;
                margin-left: 2.25rem;
            }

            .clip-right {
                border-radius: 0;
            }

            .copyright {
                padding-top: 6px;
                color: #fff;
            }
        }

        .dots-left,
        .dots-right {
            background: url(/themes/celcom/images/dotted-img.png) no-repeat;
            width: 200px;
            height: 45px;
            position: absolute;
            left: 15px;
            opacity: .5;
            top: -15px;
        }

        .dots-right {
            right: 50px;
            top: 20px;
        }
    </style>
</head>

<body itemscope itemtype="http://schema.org/WebPage">
    <div class="container-fluid position-relative overflow-hidden">
        <div class="row min-vh-100">
            <div class="col-12 col-lg-6 px-lg-4 px-3 pt-4 order-lg-1">
                <div class="row pe-lg-4 align-items-center">
                    <div class="ps-0 ps-md-5 ps-lg-0 ps-xxl-4 ms-lg-4 ms-xxl-5 pb-5 pb-xxl-3">
                        <a class="navbar-brand reg-logo" href="/">
                            <img class="img-fluid w-25" src=" <?php echo $baseUrl . '/images/logo.png' ?>" srcset=" <?php echo $baseUrl . '/images/logo.png' ?>" alt="Celcom Logo" x2>
                        </a>
                    </div>
                    <div class="col-11 col-md-9 col-xxl-8 ps-md-5 mx-auto pt-xxl-5">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 bg_gradient position-relative clip-right">
                <div class="dots-right"></div>
                <div class="row pb-5 pt-5 pt-lg-0 gy-5 gy-lg-0 px-3 pe-lg-5 align-items-center">
                    <div class="col-12 col-md-7 col-lg-9 mx-auto px-lg-5 pt-5">
                        <img class="img-fluid pt-xxl-5" src="/themes/celcom/images/landing.svg" alt="">
                    </div>
                    <div class="col-12 col-md-7 col-lg-10 text-center mx-auto">
                        <div class="register-slider swiper pb-3">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <p class="fw-bold lh-md fs-4">
                                        We’re here to help you communicate better with your customers.
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="fw-bold lh-md fs-4">
                                        Use our unified platform to send, receive, and manage SMS conversations.
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="fw-bold lh-md fs-4">
                                        Integrate with our APIs to unlock your SMS superpowers.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer align-items-center pt-5 pt-lg-0 px-lg-5 pb-3">
            <div class="col-12 col-lg-5 order-1 order-lg-0">
                <p class="mb-0 text-white small text-center">Copyright
                    © <?php echo date('Y'); ?>
                    Celcom Africa | All rights reserved.
                </p>
            </div>
            <div class="col-12 col-lg-7 pt-5 pb-2 pt-lg-0 position-relative">
                <div class="dots-left"></div>
                <ul class="list-unstyled small list-group gap-1 gap-md-4 list-group-horizontal justify-content-center justify-content-lg-end">
                    <li class=""><a href="/privacy-policy" class="copyright">Terms & Conditions</a></li>
                    <li>|</li>
                    <li><a href="/terms-conditions" class="copyright">Privacy policy</a></li>
                    <li>|</li>
                    <li class=""><a href="/contact" class="copyright">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script src="/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/js/forms.js"></script>
    <script defer src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        new Swiper('.register-slider', {
            speed: 1000,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
        });
    </script>
</body>

</html>