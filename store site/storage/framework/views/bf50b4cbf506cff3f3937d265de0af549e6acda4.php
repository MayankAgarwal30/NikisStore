
<?php $__env->startSection('title','Registration'); ?>

<?php
    $logo_conditions = ['title'=>'Logo', 'active_status'=>1];
    $dashboard_bg_conditoins = ['is_default'=>1, 'active_status'=>1, 'id'=>4];
    $dashboard_background=dashboard_background($dashboard_bg_conditoins);
    $logo = dashboard_background($logo_conditions);
?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/')); ?>/auth.css">
    <style>.login_resister_area .single_resister_sildbar::after { background: url("<?php echo e(url('/'.@$dashboard_background->image)); ?>") no-repeat; background-size:cover;  }</style>
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>
<!-- login_resister_area-start -->
    <div class="login_resister_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-12 col-lg-5">
                    <div class="single_resister_sildbar">
                        <div class="logo">
                        <a href="<?php echo e(url('/')); ?>">
                                <img src="<?php echo e(@$logo ? asset(@$logo->image) : asset('public/frontend/img/Logo.png')); ?>" alt="" class="signup_logo" >
                            </a>
                        </div>
                        <div class="resister_text">
                            <?php echo @$dashboard_background->additional_text; ?>

                        </div>
                        
                        <div class="resister_social_links">
                            <nav> 
                                <ul>
                                    <?php echo getSocialIconsDynamic(); ?> 
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="main-login-form">
                        <div class="resistration-bg">
                            <img src="<?php echo e(asset('public/frontend/img/')); ?>/pattern/Pattern.png" alt="">
                        </div>
                      <a class="resiter" href="<?php echo e(url('login')); ?>"><?php echo app('translator')->get('lang.login'); ?></a>
                        <div class="col-xl-6 offset-xl-1">
                            <div class="login_form_content">
                                
                                <div class="login_form_field">
                                <form action="<?php echo e(route('customer_registration')); ?>" method="POST" id="cus_registration1">
                                    <?php echo csrf_field(); ?>
                                        <div class="col-xl-12">
                                                <h3><?php echo e(str_replace('_', ' ',config('app.name') )); ?> <?php echo app('translator')->get('lang.registration'); ?></h3>
                                                <p><?php echo app('translator')->get('lang.enter_login'); ?></p>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="full_name"><?php echo app('translator')->get('lang.full_name'); ?><span>*</span></label>
                                            <input type="text" name="full_name" value="<?php echo e(old('full_name')); ?>" placeholder="<?php echo app('translator')->get('lang.enter_full_name'); ?>" required class="<?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e(@$message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="username"><?php echo app('translator')->get('lang.username'); ?>*<span>*</span></label>
                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.enter_username'); ?>" name="username" value="<?php echo e(old('username')); ?>" required class="<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e(@$message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="email"><?php echo app('translator')->get('lang.email'); ?> <?php echo app('translator')->get('lang.address'); ?>  <span>*</span></label>
                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.username_email_address'); ?>" value="<?php echo e(old('email')); ?>" name="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger  text-red" role="alert">
                                                    <?php echo e(@$message); ?>

                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="name"><?php echo app('translator')->get('lang.password'); ?><span>*</span></label>
                                            <input name="password" id="password" type="password" placeholder="<?php echo app('translator')->get('lang.enter_passowrd'); ?>"  class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" role="alert">
                                                    <strong><?php echo e(@$message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="name"><?php echo app('translator')->get('lang.confirm'); ?> <?php echo app('translator')->get('lang.password'); ?><span>*</span></label>
                                            <input type="password" name="password_confirmation" placeholder="<?php echo app('translator')->get('lang.confirm_passowrd'); ?>" class="<?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span  class="text-danger" role="alert">
                                                    <strong><?php echo e(@$message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>                             
                                        <input type="hidden"  id="recaptcha_check" value="<?php echo e(re_captcha_settings('status')); ?>">
                                        <?php if(re_captcha_settings('status') == 1): ?> 
                                            <div class="col-xl-12 col-md-12">
                                                <label for="captcha"><?php echo app('translator')->get('lang.re_captcha'); ?></label>
                                                <?php echo NoCaptcha::renderJs(); ?>

                                                <?php echo NoCaptcha::display(); ?>

                                                <span class="text-danger"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-xl-12">
                                              <button type="submit" class="boxed-btn mt-35"><?php echo app('translator')->get('lang.register'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- login_resister_area-end -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/auth/sign_up.blade.php ENDPATH**/ ?>