<!doctype html>
<?php
require_once 'data.php';
$social = "SELECT * FROM socials WHERE status = 1";
$social_icon = mysqli_query($data, $social);

$services = "SELECT * FROM services WHERE status = 1";
$service_q = mysqli_query($data, $services);

$profile = "SELECT * FROM profile";
$profile_q = mysqli_query($data, $profile);
$profile_assoc = mysqli_fetch_assoc($profile_q);

// primary office query start
$primnary_offc = "SELECT * FROM `offices` WHERE status = 1";
$primnary_offc_q = mysqli_query($data, $primnary_offc);
$primnary_offc_assoc =  mysqli_fetch_assoc($primnary_offc_q);
// primary office query end

// sub office query start
$sub_office = "SELECT * FROM `offices` WHERE status = 2";
$sub_office_q = mysqli_query($data, $sub_office);
// sub office query end

// portfoliosquery start
$portfolio = "SELECT * FROM `portfolios` WHERE status = 1";
$portfolio_q = mysqli_query($data, $portfolio);
// portfolios query end

// education start
$education = "SELECT * FROM `educations` ORDER BY year DESC";
$education_q = mysqli_query($data, $education);
// education end

// feature query start
$feature = "SELECT * FROM `features`";
$feature_q = mysqli_query($data, $feature);
$feature_assoc = mysqli_fetch_assoc($feature_q);
// feature query end

// review query start
$review = "SELECT * FROM `reviews` WHERE status = 1";
$review_q = mysqli_query($data, $review);
// review query end

// partner query start
$partner = "SELECT * FROM `partners` WHERE status = 1";
$partner_q = mysqli_query($data, $partner);
// partner query end
?>

<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kufa - Personal Portfolio HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/animate.min.css">
    <link rel="stylesheet" href="front/css/magnific-popup.css">
    <link rel="stylesheet" href="front/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="front/css/flaticon.css">
    <link rel="stylesheet" href="front/css/slick.css">
    <link rel="stylesheet" href="front/css/aos.css">
    <link rel="stylesheet" href="front/css/default.css">
    <link rel="stylesheet" href="front/css/style.css">
    <link rel="stylesheet" href="front/css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.php" class="navbar-brand logo-sticky-none"><img src="front/img/logo/logo.png" alt="Logo"></a>
                                <a href="index.php" class="navbar-brand s-logo-none"><img src="front/img/logo/s_logo.png" alt="Logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index-2.html">
                    <img src="front/img/logo/logo.png" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>
                        <?= $primnary_offc_assoc['adress'] ?>
                    </p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p> <?= $primnary_offc_assoc['phone'] ?></p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>
                        <?= $primnary_offc_assoc['email'] ?>
                    </p>
                </div>
            </div>
            <div class="social-icon-right mt-20">
                <?php
                foreach ($social_icon as $key => $value) { ?>
                    <a target="_blank" href="<?php
                                                if (strstr($value['link'], 'https://')) {
                                                    echo $value['link'];
                                                } else {
                                                    if (strstr($value['link'], 'http://')) {
                                                        echo $value['link'];
                                                    } else {
                                                        echo 'https://' . $value['link'];
                                                    }
                                                }
                                                ?>"> <i class="<?= $value['icon'] ?>"></i></a></li>

                <?php }
                ?>
            </div>
        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                            <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <span class="type"></span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.6s">I'm <?= $profile_assoc['user_name']; ?> , <?= $profile_assoc['tagline']; ?></p>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                <ul>
                                    <?php
                                    foreach ($social_icon as $key => $value) { ?>
                                        <li><a target="_blank" href="<?php
                                                                        if (strstr($value['link'], 'https://')) {
                                                                            echo $value['link'];
                                                                        } else {
                                                                            if (strstr($value['link'], 'http://')) {
                                                                                echo $value['link'];
                                                                            } else {
                                                                                echo 'https://' . $value['link'];
                                                                            }
                                                                        }
                                                                        ?>">
                                                <i class="<?= $value['icon'] ?>"></i></a></li>

                                    <?php }
                                    ?>

                                </ul>
                            </div>
                            <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="banner-img text-right">
                            <img src="dashboard/img-upload/user_image/<?= $profile_assoc['user_image']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="front/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="front/img/banner/banner_img2.png" title="me-01" alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            <p><?= $profile_assoc['about']; ?></p>
                            <h3>Education:</h3>
                        </div>
                        <!-- Education Item -->
                        <?php
                        foreach ($education_q as $key => $value) { ?>
                            <div class="education">
                                <div class="year"><?= $value['year']; ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= strtoupper($value['title']); ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width:<?= $value['progress']; ?>%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <!-- End Education Item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($service_q as $key => $value) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?= $value['icon']; ?>"></i>
                                <h3><?= $value['name']; ?></h3>
                                <p>
                                    <?= $value['summary']; ?>
                                </p>

                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($portfolio_q as $key => $value) {
                    ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
                                <div class="speaker-thumb">
                                    <img src="dashboard/img-upload/portfolio_image/featured_image/<?= $value['portfolio_image']; ?>" alt="img">
                                </div>
                                <div class="speaker-overlay">
                                    <span><?= $value['catagory']; ?></span>
                                    <h4>
                                        <a href="portfolio-single.php?id=<?= $value['id']; ?>">
                                            <?= $value['title']; ?>
                                        </a>
                                    </h4>
                                    <a href="portfolio-single.php?id=<?= $value['id']; ?>" class="arrow-btn">More information <span></span></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-award"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count"><?= $feature_assoc['feature_item']; ?></span></h2>
                                    <span>Feature Item</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-like"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count"><?= $feature_assoc['active_product']; ?></span></h2>
                                    <span>Active Products</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-event"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count"><?= $feature_assoc['year']; ?></span></h2>
                                    <span>Year Experience</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-woman"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count"><?= $feature_assoc['client'] / 1000; ?></span>k</h2>
                                    <span>Our Clients</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">

                        <div class="testimonial-active">
                            <?php foreach ($review_q as $key => $value) { ?>
                                <div class="single-testimonial text-center">
                                    <img width="100%" src="dashboard/img-upload/review_image/<?= $value['image'] ?>" alt="">
                                </div>
                            <?php }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">

                <div class="row brand-active">
                    <?php foreach ($partner_q as $key => $value) {?>
                    <div  class="col-xl-2" >
                        <div  class="single-brand">
                            <img width="60%"  src="dashboard/img-upload/partner_company/<?=$value['image'] ?>" alt="img"> 
                        </div>
                    </div>
                    <?php }
                    ?>
                </div>
            </div>

        </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                            <?php
                            foreach ($sub_office_q as $key => $value) { ?>
                                <br>
                                <h5>OFFICE IN <span><?= ucwords($value['country']); ?></span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $value['adress']; ?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $value['phone']; ?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $value['email']; ?></li>
                                    </ul>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="#">
                                <input type="text" placeholder="your name *">
                                <input type="email" placeholder="your email *">
                                <textarea name="message" id="message" placeholder="your message *"></textarea>
                                <button class="btn">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->


    <script>
        var typed = new Typed('.type', {
            strings: ["First sentence.", "Second sentence."],
            typeSpeed: 30
        });
    </script>

    <!-- JS here -->
    <script src="front/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="front/js/popper.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/isotope.pkgd.min.js"></script>
    <script src="front/js/one-page-nav-min.js"></script>
    <script src="front/js/slick.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <script src="front/js/ajax-form.js"></script>
    <script src="front/js/wow.min.js"></script>
    <script src="front/js/aos.js"></script>
    <script src="front/js/jquery.waypoints.min.js"></script>
    <script src="front/js/jquery.counterup.min.js"></script>
    <script src="front/js/jquery.scrollUp.min.js"></script>
    <script src="front/js/imagesloaded.pkgd.min.js"></script>
    <script src="front/js/jquery.magnific-popup.min.js"></script>
    <script src="front/js/plugins.js"></script>
    <script src="front/js/main.js"></script>
</body>
<script>
    var typed = new Typed('.type', {
        strings: ["<?= $profile_assoc['user_name']; ?> "],
        typeSpeed: 110,
        loopCount: Infinity,
        showCursor: false,
        startDelay: 700,
        backDelay: 500,
        backSpeed: 70,
        smartBackspace: true,
        loop: true,
    });
</script>
<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->

</html>