
<?php $__env->startSection('mainContent'); ?>

<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.payment_method'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.payment_method'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        

        
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title d-flex justify-content-between align-items-center">
                            <h3 class="mb-30"><?php if(isset($payment_method)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.payment_method'); ?>
                            </h3>
                            <?php if(isset($payment_method)): ?>
                                <a href="<?php echo e(url('systemsetting/payment-method-setting')); ?>" class="primary-btn small fix-gr-bg mb-20">
                                   
                                    <?php echo app('translator')->get('lang.payment_method'); ?> <?php echo app('translator')->get('lang.list'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if(isset($payment_method)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'payment_method_update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'payment_method_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>

                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('method') ? ' is-invalid' : ''); ?>"
                                                        type="text" readonly name="method_name" autocomplete="off" value="<?php echo e(isset($payment_method)? $payment_method->gateway_name:''); ?>">
                                                    <input type="hidden" name="id" value="<?php echo e(isset($payment_method)? $payment_method->id: ''); ?>">
                                                    <label><?php echo app('translator')->get('lang.method_name'); ?> <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('method_name')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('method_name')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-effect mt-20 ml-25">
                                                        <div class="text-left float-left">
        
                                                            <a href="<?php echo e($payment_method->is_config_required); ?>" target="_blank" class="primary-btn small fix-gr-bg mb-20">
                                   
                                                                <?php echo e($payment_method->gateway_name); ?> <?php echo app('translator')->get('lang.dashboard'); ?>
                                                            </a>
                                                         </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(@$payment_method->gateway_name == 'PayPal'): ?>
                                        <div class="row">
                                        <div class="col-lg-6 mt-30">
                                            <div class="input-effect input-right-icon">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="input-effect">
                                                                <input class="primary-input add_input" id="placeholderInput" type="text" placeholder="Logo"
                                                                    readonly>
                                                            </div>
                                                            <button class="primary-btn-small-input" type="button">
                                                                <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                                <input type="file" class="d-none" id="browseFile" name="logo">
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-2 ml-25">
                                            <div class="input-effect mt-40 ">
                                                    <div class="text-left float-left">
                                                        <input type="radio"  name="mode"  <?php echo e($payment_method->mode== 1 ? 'checked' : ''); ?> id="mode_check" value="1" class="common-radio relationButton">
                                                        <label for="mode_check"><?php echo app('translator')->get('lang.sandbox'); ?></label>
                                                     </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-effect mt-40 ">
                                                    <div class="text-left float-left">
                                                        <input type="radio"  name="mode"  <?php echo e($payment_method->mode== 2 ? 'checked' : ''); ?> id="live_mode_check" value="2" class="common-radio relationButton">
                                                        <label for="live_mode_check"><?php echo app('translator')->get('lang.live'); ?></label>
                                                     </div>
                                            </div>
                                        </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-lg-12 mt-30">
                                            <div class="input-effect input-right-icon">
                                                <div class="row">
                                                    <div class="col-lg-12 p-0">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="input-effect">
                                                                <input class="primary-input add_input" id="placeholderInput" type="text" placeholder="Logo"
                                                                    readonly>
                                                            </div>
                                                            <button class="primary-btn-small-input" type="button">
                                                                <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                                <input type="file" class="d-none" id="browseFile" name="logo">
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <br>

                      <div id="showHideDiv"  class="field_wrapper update_payment_method_field_wrapper">
                                            <?php
                                                $count=1;
                                            ?>
                                            <?php $__currentLoopData = $envvalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $env): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php
                                                $envTerm = explode(":", $env);

                                            ?>
                                    <div class="add_payment_btn">
                                        <div class="row mt-40 align-itesm-center justify-content-between ">
                                                <div class="col-lg-6">
                                                    <div class="input-effect add_single_payment">
                                                        <input class="primary-input form-control<?php echo e($errors->has('field_name') ? ' is-invalid' : ''); ?>" type="text" name="field_name[]" autocomplete="off" value="<?php echo e($envTerm[0]); ?>">
                                                        <label><?php echo app('translator')->get('lang.env_terms'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('field_name')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('field_name')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('field_value') ? ' is-invalid' : ''); ?>" type="text" name="field_value[]" autocomplete="off" value="<?php echo e($envTerm[1]); ?>">
                                                        <label><?php echo app('translator')->get('lang.env_value'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('field_value')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('field_value')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                        

                                     </div>
                                 </div>
                                        <?php
                                        $count++
                                        ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                            </div>
                        </div>
                    </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                      <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title=" test ">
                                            <span class="ti-check"></span>
                                            <?php if(isset($payment_method)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
 <link rel="stylesheet" href="<?php echo e(asset('Modules/Systemsetting/Resources/assets/')); ?>/css/add_payment.css"/>
 <script src="<?php echo e(asset('Modules/Systemsetting/Resources/assets/')); ?>/js/systemSetting.js"></script>
 


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/update_payment_method.blade.php ENDPATH**/ ?>