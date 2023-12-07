<?php $__env->startSection("content"); ?>

<main class="d-flex flex-column justify-content-start flex-grow-1 ">

    <!-- Start-->
    <div class="content_section section_space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 text-center">
                    <i class="far fa-check-circle fa-6x text-success"></i>
                    <h1 class="mb-3 text-success">Thank You!</h1>

                    <!-- <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
                    <?php if(Session::has('success_message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success_message')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(Session::has('error_message')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('error_message')); ?>

                    </div>
                    <?php endif; ?>
                    <!-- <p class="page_sub_title mb-0">Your Submission has been sent</p> -->
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary px-4 mt-5">Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End-->

</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("frontend.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/frontend/success.blade.php ENDPATH**/ ?>