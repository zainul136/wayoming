<!doctype html>
<?php
$setting = \App\Models\Setting::pluck('value', 'name')->toArray();
$logo = isset($setting['logo']) ? 'uploads/' . $setting['logo'] : 'assets/media/logos/logo-light.png';
$favicon = isset($setting['favicon']) ? 'uploads/' . $setting['favicon'] : 'assets/media/logos/favicon.ico';
$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'www.CheckOuts.com';
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset($favicon)); ?>" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="<?php echo e(asset('frontend/css/fontawesome_all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- MAIN SITE STYLE SHEETS -->
    

    <link href="<?php echo e(asset('frontend/css/main.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('meta'); ?>


</head>

<body >

    <!-- Header Start -->
    <header>
        <div class="ham">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    <div class="headerContainer">

        <img src="<?php echo e(asset('frontend/images/logolg.png')); ?>" alt="">
        <nav>
            <a href="">Home</a>
            <a href="">Wyoming Registered Agent</a>
            <a href="">Form a Wyoming LLC</a>
            <a href="">Contact Us</a>
            <a href="">About Us</a>
        </nav>
        <button>
            Hire Us!
        </button>
    </div>
    </header>

    <!-- Header End -->

    <?php echo $__env->yieldContent('content'); ?>


    <!-- Help Text Modal Start -->
    <div class="modal fade" id="helpModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Got it</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Help Text Modal End -->
    <!-- Js -->
    <script src="<?php echo e(asset('frontend/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/loadingoverlay.min.js')); ?>"></script>


    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/frontend/layouts/master.blade.php ENDPATH**/ ?>