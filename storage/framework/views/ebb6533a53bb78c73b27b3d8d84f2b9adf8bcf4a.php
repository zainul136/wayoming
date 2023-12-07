
<?php
$setting = \App\Models\Setting::pluck('value', 'name')->toArray();
$auth_logo = isset($setting['auth_logo']) ? 'uploads/' . $setting['auth_logo'] : 'assets/media/logos/logo-light.png';
$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
$auth_image = isset($setting['auth_image']) ? 'uploads/' . $setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
$agent_fixed_price = isset($setting['agent_fixed_price']) ? $setting['agent_fixed_price'] : '20.00';
$company_fixed_price = isset($setting['company_fixed_price']) ? $setting['company_fixed_price'] : '135.00';

$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
$stripe_client = isset($setting['stripe_client']) ? $setting['stripe_client'] : 'pk_test_0EgBbBMGnb4kCquzWTPh6dKC00glHV9dZS';
?>
<?php $__env->startSection('meta'); ?>
    <title>Place a Registered Agent Service Order - WY Commercial Registered Agent LLC</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="LoginRegister">

        <div class="container">
            <div class="left">
                <img src="<?php echo e(asset('frontend/images/logolg.png')); ?>" alt="">
                <h1><span> Wyoming</span> Form</h1>
                <p>You need an account to proceed to our application. </p>
            </div>
            <div class="right">
                <div class="top" style="margin-bottom: 10px;">
                    <div class="bg"></div>
                    <p onclick="toggleForms('login')" class="active" style="cursor: pointer;">Login</p>
                    <p onclick="toggleForms('register')" style="cursor: pointer;">Register</p>
                </div>

                <?php echo $__env->make('client.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form action="<?php echo e(route('login')); ?>" method="POST" class="login">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="current_url" value="<?php echo e(basename(request()->url())); ?>">

                    <div class="input">
                        <label for="">Email</label>
                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                            placeholder="Enter email">
                    </div>
                    <div class="input">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="loginPassword" placeholder="Password">
                    </div>
                    <a href="">Forgot Password</a>
                    <button type="submit">Login</button>
                </form>

                
                <form method="POST" action="<?php echo e(url('register')); ?>" class="register active">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="current_url" value="<?php echo e(basename(request()->url())); ?>">

                    <div class="input">
                        <label for="">Name</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                            value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus placeholder="Enter Name">
                    </div>
                    <div class="input">
                        <label for="">Email</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                            value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Enter Email">

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="input">
                        <label for="">Password</label>
                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                            required autocomplete="new-password" placeholder="Password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="input">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required
                            autocomplete="new-password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>

        const toggleForms = (value) => {
            const register = document.querySelector(".register")
            const bg = document.querySelector(".right .bg")
            const p = document.querySelectorAll(".right p")
            const login = document.querySelector(".login")
            if (value == "login") {
                register.classList.remove("active")
                login.classList.add("active")
                bg.style.left = ".5rem"
                p[0].style.color = "white"
                p[1].style.color = "black"
            } else {
                register.classList.add("active")
                bg.style.left = "52%"
                login.classList.remove("active")
                p[0].style.color = "black"
                p[1].style.color = "white"

            }
        }

        toggleForms('register');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/frontend/login.blade.php ENDPATH**/ ?>