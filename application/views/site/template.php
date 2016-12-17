<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="images/favicon.html">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("template/"); ?>css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("template/"); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("template/"); ?>css/motive/motive-tourist.css"><!--[if lt IE 9]>
        <script src="./js/html5shiv.min.js"></script>
        <script src="./js/respond.min.js"></script><![endif]-->
        <script src="<?php echo base_url("template/"); ?>js/modernizr.custom.js">
        </script>
    </head>
    <body class="cssAnimate ct-headroom--scrollUpMenu">
        <div class="ct-preloader">
            <div class="ct-preloader-content"></div>
        </div>
        <?php $this->load->view('site/mobilemenu'); ?>

        <div id="ct-js-wrapper" class="ct-pageWrapper">

            <?php $this->load->view('site/menu'); ?>

            <?php $this->load->view('site/slider'); ?>

            <?php $this->load->view($content_page) ?>


            <?php $this->load->view('site/footer'); ?>
        </div>
        <script src="<?php echo base_url("template/"); ?>js/jquery.min.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/light-gallery/js/lightGallery.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/main-compiled.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/magnific-popup/init.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/isotope/jquery.isotope.min.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/isotope/imagesloaded.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/isotope/infinitescroll.min.js"></script>
        <script src="<?php echo base_url("template/"); ?>js/isotope/init.js"></script>


        <!-- end switcher -->
    </body>

    <!-- Mirrored from tourstickets.html.themeplayers.net/guide-tour/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Dec 2016 13:17:22 GMT -->
</html>