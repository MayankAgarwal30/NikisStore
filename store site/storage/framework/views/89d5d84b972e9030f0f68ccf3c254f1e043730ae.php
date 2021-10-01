
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
                                <img src="<?php echo e(@$logo ? asset(@$logo->image) : asset('public/frontend/img/Logo.png')); ?>" alt="" width="123">
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
                        <a class="resiter" href="<?php echo e(url('register')); ?>"><?php echo app('translator')->get('lang.register'); ?></a>
                        <div class="col-xl-6 offset-xl-1">
                            <div class="login_form_content">
                                <div class="login_form_field">



                            
                                

                                <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                    <div class="supper_buttons">

                                        <?php 
                                            $superadmin = App\ManageQuery::GetDemoUser(1); 
                                            $agent = App\ManageQuery::GetDemoUser(2); 
                                            $admin = App\ManageQuery::GetDemoUser(3); 
                                            $vendor = App\ManageQuery::GetDemoUser(4); 
                                            $customer = App\ManageQuery::GetDemoUser(5); 

                                        ?>
                                        <?php if(!empty( $superadmin)): ?>
                                            <form action="<?php echo e(url('login')); ?>" method="POST" id="login" >
                                                <?php echo csrf_field(); ?>
                                                 <input type="hidden" name="email" value="<?php echo e(@$superadmin->email); ?>">
                                                 <input type="hidden"  name="password" value="12345678">
                                                <button type="submit" class="boxed-btn">superadmin</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php if(!empty( $agent)): ?>
                                            <form action="<?php echo e(url('login')); ?>" method="POST" id="login" >
                                                <?php echo csrf_field(); ?>
                                                 <input type="hidden" name="email" value="<?php echo e(@$agent->email); ?>">
                                                 <input type="hidden"  name="password" value="12345678">
                                                <button type="submit" class="boxed-btn">Agent</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php if(!empty( $admin)): ?>
                                            <form action="<?php echo e(url('login')); ?>" method="POST" id="login" >
                                                <?php echo csrf_field(); ?>
                                                 <input type="hidden" name="email" value="<?php echo e(@$admin->email); ?>">
                                                 <input type="hidden"  name="password" value="12345678">
                                                <button type="submit" class="boxed-btn">admin</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php if(!empty( $vendor)): ?>
                                            <form action="<?php echo e(url('login')); ?>" method="POST" id="login" >
                                                <?php echo csrf_field(); ?>
                                                 <input type="hidden" name="email" value="<?php echo e(@$vendor->email); ?>">
                                                 <input type="hidden"  name="password" value="12345678">
                                                <button type="submit" class="boxed-btn">Author</button>
                                            </form>
                                            <?php endif; ?>
                                        <?php if(!empty( $customer)): ?>
                                            <form action="<?php echo e(url('login')); ?>" method="POST" id="login">
                                                <?php echo csrf_field(); ?>
                                                 <input type="hidden" name="email" value="<?php echo e(@$customer->email); ?>">
                                                 <input type="hidden"  name="password" value="12345678">
                                                <button type="submit" class="boxed-btn">customer</button>
                                            </form>
                                            <?php endif; ?>
                                        </div>
                                 <?php endif; ?>
                                        



                                    <form action="<?php echo e(url('login')); ?>" method="POST" id="cust_login">
                                        <?php echo csrf_field(); ?>
                                        <div class="col-xl-12">
                                                <?php if(session()->has('message-success')): ?>
                                                <div class="alert alert-success">
                                                  <?php echo e(session()->get('message-success')); ?>

                                              </div>
                                              <?php elseif(session()->has('message-danger')): ?>
                                              <div class="alert alert-danger">
                                                  <?php echo e(session()->get('message-danger')); ?>

                                              </div>
                                              <?php endif; ?>
                                              <h3><?php echo e(str_replace('_', ' ',config('app.name') )); ?> <?php echo app('translator')->get('lang.login'); ?></h3>
                                              <p><?php echo app('translator')->get('lang.enter_login'); ?></p>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="name"><?php echo app('translator')->get('lang.email'); ?> <?php echo app('translator')->get('lang.address'); ?> <span class="required_icon">*</span></label>
                                            <input type="email" placeholder="<?php echo app('translator')->get('lang.email'); ?>" name="email" value="<?php echo e(old('email')); ?>" class="<?php $__errorArgs = ['email'];
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
                                                <span class="red_alart" role="alert">
                                                    <?php echo e(@$message); ?>

                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="name"><?php echo app('translator')->get('lang.password'); ?> <span class="required_icon">*</span></label>
                                            <input type="password" placeholder="<?php echo app('translator')->get('lang.enter_passowrd'); ?>" name="password" class="<?php $__errorArgs = ['password'];
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
                                                <span class="red_alart  text-red" role="alert">
                                                    <strong><?php echo e(@$message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="forgot-pass d-flex align-items-center justify-content-between">
                                                <div class="checkit">
                                                    <span class="chebox-style-custom">
                                                        <input class="styled-checkbox" id="styled-checkbox-2"
                                                            type="checkbox" value="value2" checked>
                                                        <label for="styled-checkbox-2"></label>
                                                    </span>
                                                    <span class="keep-me-login" >
                                                        <?php echo app('translator')->get('lang.keep_me_logged_in'); ?>
                                                    </span>
                                                </div>
                                                <div class="forgot-pass-link">
                                                    <a href="<?php echo e(route('password.request')); ?>" class="forgot-pass"><?php echo app('translator')->get('lang.forgot'); ?> <?php echo app('translator')->get('lang.password'); ?> ?</a>
                                                </div>
                                            </div>
                                        </div>
                                            <?php
                                                   $reCaptcha =  App\ManageQuery::ReCaptchaSetting();
                                            ?>
                                         <input type="text" hidden id="recaptcha_check" value="<?php echo e(@$reCaptcha->status); ?>">
                                        <?php if(@$reCaptcha->status == 1): ?> 
                                        <div class="col-xl-12 col-md-12">
                                            <label for="captcha"><?php echo app('translator')->get('lang.re_captcha'); ?></label>
                                              <?php echo NoCaptcha::renderJs(); ?>

                                              <?php echo NoCaptcha::display(); ?>

                                            <span class="text-danger"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <div class="col-xl-12 mt-10">
                                            <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.login'); ?></button>
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
<script src="<?php echo e(asset('public/frontend/frontend.js')); ?>"></script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/auth/sign_in.blade.php ENDPATH**/ ?>