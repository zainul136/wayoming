<?php $__env->startSection('meta'); ?>
    <title>Home - WY Commercial Registered Agent LLC</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    



    <section class="ServiceForm">
        <div class="container-fluid topHeading">
            <div class="row">
                <div class="col-md-12">
                    <div class="lc-block">
                        <div editable="rich">
                            <h1>Wyoming <span>Services</span> </h1>
                        </div>

                    </div><!-- /lc-block -->
                    <div class="lc-block">
                        <div editable="rich">
                            <h2>Our Business Is Making Your Businesss</h2>
                        </div>

                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
        </div>
        <div class="container-fluid SelectService d-flex" style="display: flex; margin: auto;">
            <div class="left">
                <h1>Select a <span>Type of Service</span> </h1>
                <div class="options" id="options">
                    <div class="option" onclick="SelectService(this, 'registered-agent')">
                        <input type="checkbox" id="registeredAgent" checked>
                        Registered Agent
                    </div>
                    <div class="option" onclick="SelectService(this, 'company')">
                        <input type="checkbox" id="findCompany">
                        Find a New Company
                    </div>
                    <div class="option " onclick="SelectService(this, 'registered-agent-renewal')">
                        <input type="checkbox">
                        Registered Agent Renewal
                    </div>
                </div>
            </div>
            <div class="right">
                <h2>
                    ORDER SUMMARY
                </h2>
                <h1>
                    Wyoming Registered Agent
                </h1>
                <div class="Servicebenefits ">
                    <div class=""> <img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>">1 Year Registered
                        Agent</div>
                    <div class=""> <img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>">Order Filled In 24
                        Hours</div>
                    <div class=""> <img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>">Wyoming Address Use
                    </div>
                    <div class=""> <img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>">Mail Forwarding (scan)
                    </div>
                    <div class=""> <img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>">No Identification
                        Required</div>
                    <div class=""> <img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>">International Clients
                        Welcome</div>
                </div>

                <a href="<?php echo e(route('register-agent')); ?>" class="btn d-flex justify-content-center align-items-center"
                    id="continueButton">Continue
                    <img src="https://wordpress-801914-2880314.cloudwaysapps.com/wp-content/uploads/2023/08/arrowright.png"
                        width="26" height="16" srcset="" sizes="" alt=""
                        class=" wp-image-186"></a>

                <p>Questions? <span>Call 307-317-3131</span> </p>
            </div>
        </div>
    </section>
    <!-- Start-->
    
    <!-- End-->

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        const SelectService = (e, serviceType) => {
            const options = document.querySelectorAll(".ServiceForm .options .option");
            const continueButton = $("#continueButton"); // Select the "Continue" button by ID

            if (serviceType === 'registered-agent') {
                continueButton.attr("href", "<?php echo e(route('register-agent')); ?>"); // Update the href attribute for agent
            } else if (serviceType === 'company') {
                continueButton.attr("href", "<?php echo e(route('register-corporation')); ?>"); // Update the href attribute for company
            }else{
                continueButton.attr("href", "<?php echo e(route('register-agent-renewal')); ?>");
            }

            for (let i = 0; i < options.length; i++) {
                options[i].classList.remove("active")
                options[i].querySelector("input").checked = false
            }
            e.classList.add("active")
            e.querySelector("input").checked = "true";

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp3\htdocs\wyoming_services\resources\views/frontend/index.blade.php ENDPATH**/ ?>