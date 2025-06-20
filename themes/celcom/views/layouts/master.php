<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    Yii::app()->clientScript->registerMetaTag('website', null, null, array('property' => 'og:type'));
    Yii::app()->clientScript->registerMetaTag(Yii::app()->name, null, null, array('property' => ''));
    Yii::app()->clientScript->registerMetaTag('en_US', null, null, array('property' => 'og:locale'));
    Yii::app()->clientScript->registerMetaTag('@Celcom Africa', 'twitter:title');
    Yii::app()->clientScript->registerMetaTag('@Celcom Africa', 'twitter:creator');
    Yii::app()->clientScript->registerMetaTag('summary_large_image', 'twitter:card');

    $baseUrl = Yii::app()->theme->baseUrl;
    $baseOne = Yii::app()->baseUrl;
    ?>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS Files -->
    <link href="/assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/themes/prism-tomorrow.min.css">

    <!-- App CSS -->
    <link rel="stylesheet" href="/themes/celcom/css/docs.css">

    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143260352-4">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-143260352-4');
    </script>
    <script data-schema="Organization" type="application/ld+json">
        {
            "@context": "https://www.schema.org",
            "@type": "Organization",
            "name": "Celcom Africa",
            "url": "https://www.celcomafrica.com/",
            "logo": "https://www.celcomafrica.com/themes/celcom/images/logo.png",
            "description": "Bulk SMS kenya. Send Bulk SMS messages starting at KSh0.3 with the leading Kenya bulk SMS Company. Buy bulk SMS services & bulk SMS Gateway API. Send ✓Bulk SMS, ✓shortcode, ✓USSD",
            "sameAs": [
                "https://www.pinterest.com/cabulksms",
                "https://twitter.com/smscelcom",
                "https://www.instagram.com/bulksmsproviderkenya/",
                "https://www.facebook.com/bulksmsproviderkenya/",
                "https://www.linkedin.com/in/celcom-africa-bulk-sms-34a754189/"
            ],
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+254 0701727272",
                "contactType": "customer service",
                "contactOption": "Support",
                "areaServed": "Kenya",
                "availableLanguage": "English",
                "url": "https://www.celcomafrica.com/contact"
            }]
        }
    </script>
    <script data-schema="Organization" type="application/ld+json">
        {
            "@context": "https://www.schema.org",
            "@type": "LocalBusiness",
            "name": "Celcom Africa",
            "image": "https://www.celcomafrica.com/themes/celcom/images/logo.png",
            "description": "Bulk SMS kenya. Send Bulk SMS messages starting at KSh0.3 with the leading Kenya bulk SMS Company. Buy bulk SMS services & bulk SMS Gateway API. Send ✓Bulk SMS, ✓shortcode, ✓USSD",
            "url": "https://www.celcomafrica.com/",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.9",
                "ratingCount": "998",
                "reviewCount": "998"
            },
            "telephone": "+254 0701727272",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "1st Floor Arbor House, Aboretum road, Nairobi",
                "addressLocality": "Aboretum Rd",
                "postalCode": "0101",
                "addressCountry": "ken"
            },
            "priceRange": "0.40"
        }
    </script>
    <style>
        :root {
            --primary-color: rgb(0, 11, 118);
            --secondary-color: #8f0fa0;
        }

        .theme-btn {
            text-transform: capitalize;
            color: #fff !important;
            padding: 8px 37px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            position: relative;
            display: inline-flex !important;
            border-radius: 90px;
            background-image: linear-gradient(to right,
                    var(--primary-color) 0%,
                    var(--secondary-color) 51%,
                    var(--primary-color) 100%);
            background-size: 200% auto;
        }

        .bg-sample-code {
            font-size: 0.85rem;
            background: #1B223D !important;
        }
    </style>
</head>

<body itemscope itemtype="http://schema.org/WebPage" class="docs-page">
    <header class="header fixed-top">
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2 px-4">
                <div class="docs-logo-wrapper">
                    <div class="site-logo">
                        <a class="navbar-brand" href="/">
                            <img class="logo-icon img-fluid" src="<?php echo $baseUrl . '/images/logo.png' ?>" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="docs-top-utilities d-flex justify-content-end align-items-center">
                    <div class="top-search-box d-none d-lg-flex">
                        <form class="search-form">
                            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
                            <button type="submit" class="btn search-btn" value="Search"><i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                    <ul class="social-list list-inline mx-md-3 mx-lg-5 mb-0 d-none d-lg-flex">
                        <li class="list-inline-item"><a href="#"><i class="bi bi-github fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="bi bi-twitter fa-fw"></i></a></li>
                    </ul>
                    <button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible d-xl-none" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <span class="d-none d-xl-block">
                        <?php echo CHtml::link('Login Here', array('/register'), array('class' => 'btn btn-md px-4 theme-btn', 'target' => '_blank')); ?>
                    </span>
                </div>
            </div>
        </div>
    </header>

    <div class="docs-wrapper">
        <?php require_once('_sidebar.php'); ?>
        <div class="docs-content">
            <div class="container">
                <!-- Include content pages -->
                <?php echo $content; ?>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gumshoe/5.1.1/gumshoe.polyfills.min.js"></script>
    <script src="/themes/celcom/js/docs.js"></script>
    <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/prism.min.js"></script>
    <script>
        Prism.highlightAll();
    </script>
</body>

</html>