
<?php $__env->startSection('title', $setting['homepage_title'] ?? ''); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($setting['homepage_keywords'] ?? ''); ?>">
    <meta name="description" content="<?php echo e($setting['homepage_description'] ?? ''); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .effect-img2 , .effect-img
    {
        /*height: 568px !important;*/
        width: 100% !important;
        object-fit: contain !important;
    }
    .features-list_features h4 , .features-list_features_2 h4{
        font-size:16px;
        font-weight:700;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa url(<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/hbg.jpg) no-repeat 50% center;background-size: cover;">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--PAGE BANNER-->
            <div class="banner-box" style="padding: 8% 0 10% !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 banner-left-bar">
                            <div class="hero__copy">
                                <h1><?php echo e($setting['banner_heading'] ?? ''); ?></h1>
                                <p><?php echo e($setting['banner_description'] ?? ''); ?></p>

                                    <a href="<?php echo e(route('our.mission')); ?>" class="btn btn-primary text-white">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="right-box">
                                <div class="screenshot">
                                    <img src="<?php echo e(asset($setting['banner_image'] ?? '')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!--END HEADER-->

<!--MAIN CONTENT SECTION-->
<section class="content">

    <!--BOTTOM BANNER BAR LEARN MORE-->
    <div class="banner2">
        <div class="container">
            <div class="row align-center">
                <div class="col-sm-9">
                    <h2><?php echo e($setting['reopening_journey_heading'] ?? ''); ?></h2>
                    <p><?php echo e($setting['reopening_journey_description'] ?? ''); ?></p>
                </div>
                <div class="col-sm-3 text-right learnmore">
                    <a href="<?php echo e(route('find.homeopath')); ?>" class="btn btn-black">Find a Homeopath</a>
                </div>
            </div>
        </div>
    </div>


    <!--Advocates & Homeopath Description SECTION-->
    <div class="container pt-5">
        <div class="row">
            <div class="col-sm-5 text-center box1 mb-5">
                <div style=" margin:0 auto">
                    <img height="100" src="<?php echo e(asset($setting['chwg_for_advocates_icon'] ?? '')); ?>" alt="advocates">
                </div>
                <h2><?php echo e($setting['chwg_for_advocates'] ?? 'CHWG for Advocates'); ?></h2>
                <p ><?php echo e($setting['chwg_for_advocates_description'] ?? ''); ?></p>
                <a href="<?php echo e(route('advocates')); ?>" class="learnMore txt16">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="col-sm-2" >
                <div class="seprator"></div>
            </div>
            <div class="col-sm-5 text-center box1 mb-5">
                <div style=" margin:0 auto">
                    <img height="100" src="<?php echo e(asset($setting['chwg_for_homeopaths_icon'] ?? '')); ?>" alt="homeopathic">
                </div>
                <h2><?php echo e($setting['chwg_for_homeopaths'] ?? 'CHWG for Homeopaths'); ?></h2>
                <p ><?php echo e($setting['chwg_for_homeopaths_description'] ?? ''); ?></p>
                <a href="<?php echo e(route('homeopathy.practitioners')); ?>" class="learnMore txt16">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>



    <!--HELPFUL RESOURCES SECTION-->
    <div class="box2">
        <div class="container">
            <h3 class="heading">Helpful Resources</h3>
            <p class="txt21 text-center" style="margin:20px auto 5%; max-width:1003px;"><?php echo e($setting['helpful_resource_sub_heading'] ?? ''); ?></p>
            <div class="row">
                <div class="col-sm-4">
                    <div class="product1">
                        <img src="<?php echo e(asset($setting['helpful_resource_1st_thumbnail'] ?? '')); ?>" alt="">
                        <div class="inner">
                            <h3><?php echo e($setting['helpful_resource_1st_heading'] ?? ''); ?></h3>
                            <p><?php echo e($setting['helpful_resource_1st_description'] ?? ''); ?></p>
                            <a href="<?php echo e(route('our.mission')); ?>">Read <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product1">
                        <img src="<?php echo e(asset($setting['helpful_resource_2nd_thumbnail'] ?? '')); ?>" alt="">
                        <div class="inner">
                            <h3><?php echo e($setting['helpful_resource_2nd_heading'] ?? ''); ?></h3>
                            <p><?php echo e($setting['helpful_resource_2nd_description'] ?? ''); ?></p>
                            <a href="<?php echo e(route('explore.homeopathy')); ?>">Read <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product1">
                        <img src="<?php echo e(asset($setting['helpful_resource_3rd_thumbnail'] ?? '')); ?>" alt="">
                        <div class="inner">
                            <h3><?php echo e($setting['helpful_resource_3rd_heading'] ?? ''); ?></h3>
                            <p><?php echo e($setting['helpful_resource_3rd_description'] ?? ''); ?></p>
                            <a href="<?php echo e(route('faqs')); ?>">Read <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--SECURE NON CERECARE SECTION-->
    <div class="box3">
        <div class="container">
            <h3 class="heading" ><?php echo e($setting['secure_heading'] ?? ''); ?></h3>
            <p class="txt21 text-center" ><?php echo e($setting['secure_description'] ?? ''); ?></p>

            <div class="row mt-5">
                <div class="col-md-12 col-lg-4">
                    <div class="product2">
                        <h3 class="txt24 fwb" style="margin-bottom:12px">
                        <img src="<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/img1.svg" alt="">
                        <span class="dib vm" style="margin-left:10px"><?php echo e($setting['secure_1st_heading'] ?? ''); ?></span>
                        </h3>
                        <p class="mt10 txt16">
                            <?php echo e($setting['secure_1st_description'] ?? ''); ?>

                        </p>
                        
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="product2">
                        <h3 class="txt24 fwb" style="margin-bottom:12px">
                        <img src="<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/img2.svg" alt="">
                        <span class="dib vm" style="margin-left:10px"><?php echo e($setting['secure_2nd_heading'] ?? ''); ?></span>
                        </h3>
                        <p class="mt10 txt16">
                            <?php echo e($setting['secure_2nd_description'] ?? ''); ?>

                        </p>
                        
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="product2">
                        <h3 class="txt24 fwb" style="margin-bottom:12px">
                        <img src="<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/img3.svg" alt="">
                        <span class="dib vm" style="margin-left:10px"><?php echo e($setting['secure_3rd_heading'] ?? ''); ?></span>
                        </h3>
                        <p class="mt10 txt16">
                            <?php echo e($setting['secure_3rd_description'] ?? ''); ?>

                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div style="margin:0 auto; max-width:75%">
            <img src="<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/box3bg.png" alt="">
        </div>
    </div>


    <!--CHWG SECTION FOR HOMEOPATHS-->
    <div class="container" style="padding:50px 15px;">
        <h3 class="heading"><?php echo e($setting['what_is_ch_for_homeo_heading'] ?? 'What is CHWG for Homeopaths'); ?></h3>
        <p class="txt21 text-center" style="margin:20px auto ; max-width:903px;">
            <?php echo e($setting['what_is_ch_for_homeo_description'] ?? ''); ?>

        </p>
        <div class="text-center">
            <a href="<?php echo e(route('contact.us')); ?>" class="btn btn-primary btn-blue ">Contact Us</a>
            <a href="<?php echo e(route('homeopathy.practitioners')); ?>" class="btn btn-primary  btn-blue2" style="margin-left:10px">Learn More</a>
        </div>
    </div>
    <div id="tabs" class="current-documents partial-app-features-slideshow2">
        <div class="features-list" >
            <div class="inner-item">
                <div id="documents" >
                    <img src="<?php echo e(asset($setting['what_is_ch_for_homeo_1st_thumbnail'] ?? '')); ?>" class="effect-img img-active" alt="" />
                </div>
                <div id="spreadsheets">
                    <img src="<?php echo e(asset($setting['what_is_ch_for_homeo_2nd_thumbnail'] ?? '')); ?>" class="effect-img" alt="" />
                </div>
                <div id="slides" >
                    <img src="<?php echo e(asset($setting['what_is_ch_for_homeo_3rd_thumbnail'] ?? '')); ?>" class="effect-img" alt="" />
                </div>
                <div id="chat" >
                    <img src="<?php echo e(asset($setting['what_is_ch_for_homeo_4th_thumbnail'] ?? '')); ?>" class="effect-img" alt="" />
                </div>
            </div>
            <div class="features-list_features pl-30">
                <ul>
                    <li class="effect-tb" data-feature-id="documents">
                        <a class="home-tab-documents" href="#documents" >
                            <h4><i><?php echo e($setting['what_is_ch_for_homeo_1st_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_homeo_1st_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_homeo_1st_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                    <li class="effect-tb" data-feature-id="spreadsheets" >
                        <a class="home-tab-spreadsheets" href="#spreadsheets">
                            <h4><i><?php echo e($setting['what_is_ch_for_homeo_2nd_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_homeo_2nd_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_homeo_2nd_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                    <li  class="effect-tb" data-feature-id="slides">
                        <a class="home-tab-slides" href="#slides">
                            <h4><i><?php echo e($setting['what_is_ch_for_homeo_3rd_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_homeo_3rd_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_homeo_3rd_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                    <li class="effect-tb" data-feature-id="chat" >
                        <a class="home-tab-chat" href="#chat">
                            <h4><i><?php echo e($setting['what_is_ch_for_homeo_4th_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_homeo_4th_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_homeo_4th_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>



    <!--CHWG SECTION FOR ADVOCATES-->
    <div class="container" style="padding:50px 15px;">
        <h3 class="heading"><?php echo e($setting['what_is_ch_for_adv_heading'] ?? 'What is CHWG for Advocates'); ?></h3>
        <p class="txt21 text-center" style="margin:20px auto ; max-width:903px;">
            <?php echo e($setting['what_is_ch_for_adv_description'] ?? ''); ?>

        </p>
        <div class="text-center">
            <a href="<?php echo e(route('contact.us')); ?>" class="btn btn-primary btn-blue ">Contact Us</a>
            <a href="<?php echo e(route('advocates')); ?>" class="btn btn-primary  btn-blue2" style="margin-left:10px">Learn More</a>
        </div>
    </div>
    <div id="tabs1" class="current-documents_1 partial-app-features-slideshow2">
        <div class="features-list">
            <div class="inner-item">
                <div id="documents_1" >
                    <img src="<?php echo e(asset($setting['what_is_ch_for_adv_1st_thumbnail'] ?? '')); ?>" class="effect-img2 img-active2" alt="" />
                </div>
                <div id="spreadsheets_1">
                    <img src="<?php echo e(asset($setting['what_is_ch_for_adv_2nd_thumbnail'] ?? '')); ?>" class="effect-img2" alt="" />
                </div>
                <div id="slides_1" >
                    <img src="<?php echo e(asset($setting['what_is_ch_for_adv_3rd_thumbnail'] ?? '')); ?>" class="effect-img2" alt="" />
                </div>
                <div id="chat_1" >
                    <img src="<?php echo e(asset($setting['what_is_ch_for_adv_4th_thumbnail'] ?? '')); ?>" class="effect-img2" alt="" />
                </div>
            </div>
            <div class="features-list_features_2 pl-30">
                <ul>
                    <li class="effect-tb2" data-features-id="documents_1">
                        <a class="home-tab-documents_2" href="#documents_1" >
                            <h4><i><?php echo e($setting['what_is_ch_for_adv_1st_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_adv_1st_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_adv_1st_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                    <li class="effect-tb2" data-features-id="spreadsheets_1" >
                        <a class="home-tab-spreadsheets_2" href="#spreadsheets_1">
                            <h4><i><?php echo e($setting['what_is_ch_for_adv_2nd_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_adv_2nd_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_adv_2nd_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                    <li  class="effect-tb2" data-features-id="slides_1">
                        <a class="home-tab-slides_2" href="#slides_1">
                            <h4><i><?php echo e($setting['what_is_ch_for_adv_3rd_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_adv_3rd_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_adv_3rd_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                    <li class="effect-tb2" data-features-id="chat_1" >
                        <a class="home-tab-chat_2" href="#chat_1">
                            <h4><i><?php echo e($setting['what_is_ch_for_adv_4th_word'] ?? ''); ?></i> <?php echo e($setting['what_is_ch_for_adv_4th_title'] ?? ''); ?></h4>
                            <p class="txt16"><?php echo e($setting['what_is_ch_for_adv_4th_summary'] ?? ''); ?></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>


    <!--TRY CHWG FRE SECTION-->



<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script type="application/javascript">
    $(document).ready(function() {
    var is_manual = true;
    var interval1;
    var Current_Tab = 1;
    var Cycle_Speed_Seconds = 1;
    $(function () {
    $("#tabs").tabs();
    setTimeout(function () {
    console.log("start");
    $('.home-tab-documents, .home-tab-spreadsheets, .home-tab-slides, .home-tab-chat').click(function () {
    // console.log("click");
    if (is_manual == false) {
    is_manual = true;
    } else if (is_manual == true) {
    clearInterval(interval1);
    }
    return true;
    });
    //set the interval to swap between tabs
    interval1 = setInterval(function () {
    //indicate that the click was trigerred automatically:
    is_manual = false;
    if (Current_Tab == 1) {
    Current_Tab = 2;
    $('.home-tab-documents').trigger('click');
    } else if (Current_Tab == 2) {
    Current_Tab = 3;
    $('.home-tab-spreadsheets').trigger('click');
    } else if (Current_Tab == 3) {
    Current_Tab = 4;
    $('.home-tab-slides').trigger('click');
    }else if (Current_Tab == 4) {
    Current_Tab = 1;
    $('.home-tab-chat').trigger('click');
    }
    },Cycle_Speed_Seconds* 3000);
    }, 0);
    });
    $('.features-list_features ul li').click(function(e) {
    var $this = $(this),
    id = $this.attr('data-feature-id');
    $('.effect-img').fadeOut();
    $('#'+id+' > img').fadeIn(1000);
    $('#tabs').removeClass('current-documents');
    $('#tabs').removeClass('current-spreadsheets');
    $('#tabs').removeClass('current-slides');
    $('#tabs').removeClass('current-chat');
    $('#tabs').addClass('current-'+id);
    });
    ///// @2nd    method ///
    var is_manual_2 = true;
    var interval1_2;
    var Current_Tab_2 = 1;
    var Cycle_Speed_Seconds_2 = 1;
    $(function () {
    $("#tabs1").tabs();
    setTimeout(function () {
    console.log("start");
    $('.home-tab-documents_2, .home-tab-spreadsheets_2, .home-tab-slides_2, .home-tab-chat_2').click(function () {
    // console.log("click");
    if (is_manual_2 == false) {
    is_manual_2 = true;
    } else if (is_manual_2 == true) {
    clearInterval(interval1_2);
    }
    return true;
    });
    //set the interval to swap between tabs
    interval1_2 = setInterval(function () {
    //indicate that the click was trigerred automatically:
    is_manual_2 = false;
    if (Current_Tab_2 == 1) {
    Current_Tab_2 = 2;
    $('.home-tab-documents_2').trigger('click');
    } else if (Current_Tab_2 == 2) {
    Current_Tab_2 = 3;
    $('.home-tab-spreadsheets_2').trigger('click');
    } else if (Current_Tab_2 == 3) {
    Current_Tab_2 = 4;
    $('.home-tab-slides_2').trigger('click');
    }else if (Current_Tab_2 == 4) {
    Current_Tab_2 = 1;
    $('.home-tab-chat_2').trigger('click');
    }
    },Cycle_Speed_Seconds_2* 4000);
    }, 0);
    });
    $('.features-list_features_2 ul li').click(function(e) {
    var $this = $(this),
    ids = $this.attr('data-features-id');
    $('.effect-img2').fadeOut();
                $('#'+ids+' > img').fadeIn(1000);
    $('#tabs1').removeClass('current-documents_1');
    $('#tabs1').removeClass('current-spreadsheets_1');
    $('#tabs1').removeClass('current-slides_1');
    $('#tabs1').removeClass('current-chat_1');
    $('#tabs1').addClass('current-'+ids);
    });
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/index.blade.php ENDPATH**/ ?>