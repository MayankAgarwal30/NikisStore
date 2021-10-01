
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.general_settings'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.general_settings'); ?></a>
            </div>
        </div>
    </div>
</section>


<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">

<section class="student-details">
    <div class="container-fluid p-0">
        <?php echo $__env->make('backend.partials.alertMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">


            <div class="col-lg-12">
                <?php if(!isset($edit)): ?>
                <div class="row xm_3">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->get('lang.general_settings'); ?> <?php echo app('translator')->get('lang.view'); ?></h3>
                        </div>
                    </div>
                    <div class="offset-lg-6 col-lg-2 text-right col-md-6">
                        <a href="<?php echo e(route('edit_general_settings')); ?>" class="primary-btn small fix-gr-bg"> <span class="ti-pencil-alt"></span> <?php echo app('translator')->get('lang.edit'); ?>
                        </a>
                    </div>
                </div>
                <?php endif; ?>


                <div class="row">
                    <?php if(isset($edit)): ?>
               <div class="col-lg-12">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($edit)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.general_settings'); ?>
                            </h3>
                        </div>



                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'footer_setting_update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>



                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger')); ?>

                                        </div>
                                        <?php endif; ?>

                                        <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('system_name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="system_name" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->system_name:''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->id: ''); ?>">
                                            <label><?php echo app('translator')->get('lang.system_name'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('system_name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('system_name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"
                                                type="text" name="address" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->address:''); ?>">
                                             <label><?php echo app('translator')->get('lang.address'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('address')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('address')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                                type="text" name="phone" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->phone:''); ?>">
                                             <label><?php echo app('translator')->get('lang.phone'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('phone')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('phone')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                         <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                type="text" name="email" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->email:''); ?>">
                                             <label><?php echo app('translator')->get('lang.email'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('currency') ? ' is-invalid' : ''); ?>"
                                                type="text" name="currency" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->currency:''); ?>">
                                             <label><?php echo app('translator')->get('lang.currency'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('currency')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('currency')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('currency_symbol') ? ' is-invalid' : ''); ?>"
                                                type="text" name="currency_symbol" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->currency_symbol:''); ?>">
                                             <label><?php echo app('translator')->get('lang.currency_symbol'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('currency_symbol')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('currency_symbol')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('time_zone') ? ' is-invalid' : ''); ?>"
                                                type="text" name="time_zone" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->time_zone:''); ?>">
                                             <label><?php echo app('translator')->get('lang.time_zone'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('time_zone')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('time_zone')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-effect mt-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('copyright_text') ? ' is-invalid' : ''); ?>"
                                                type="text" name="copyright_text" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->copyright_text:''); ?>">
                                             <label><?php echo app('translator')->get('lang.copyright_text'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('copyright_text')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('copyright_text')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                      <button class="primary-btn fix-gr-bg" data-toggle="tooltip" >
                                            <span class="ti-check"></span>
                                            <?php if(!empty($footer_setting)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                           <?php echo app('translator')->get('lang.footer_setting'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
                    <?php else: ?>
                <div class="col-lg-12">
                        <div class="white-box">
                            <div class="student-meta-box">

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.system_name'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e($infix_general_setting->system_name); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.system_title'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e($infix_general_setting->system_title); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.address'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e($infix_general_setting->address); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.phone'); ?> <?php echo app('translator')->get('lang.no'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e($infix_general_setting->phone); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.email'); ?> <?php echo app('translator')->get('lang.address'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e($infix_general_setting->email); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.currency'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e($infix_general_setting->currency); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.currency_symbol'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">

                                                <?php if(isset($infix_general_setting)): ?>
                                                    <?php echo e($infix_general_setting->currency_symbol); ?>


                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.language_name'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e(@$infix_general_setting->name); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.time_zone'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                <?php echo e(@$infix_general_setting->time_zone); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                               <?php echo app('translator')->get('lang.auto_approval'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                
                                                    <?php if(@$infix_general_setting->auto_approve==1): ?>
                                                        <?php echo app('translator')->get('lang.enable'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('lang.disable'); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                               <?php echo app('translator')->get('lang.auto_update'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                    <?php if(@$infix_general_setting->auto_update==1): ?>
                                                        <?php echo app('translator')->get('lang.enable'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('lang.disable'); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                               <?php echo app('translator')->get('lang.google_analytics'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                    <?php if(@$infix_general_setting->google_an==1): ?>
                                                        <?php echo app('translator')->get('lang.enable'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('lang.disable'); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                               <?php echo app('translator')->get('lang.public_vendor_registration'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php if(isset($infix_general_setting)): ?>
                                                    <?php if(@$infix_general_setting->public_vendor==1): ?>
                                                        <?php echo app('translator')->get('lang.enable'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('lang.disable'); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(moduleStatusCheck('AmazonS3') == true): ?>
                                    
                                    <div class="single-meta">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="name">
                                                <?php echo app('translator')->get('lang.amazons3_host'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="value text-left">
                                                    <?php if(isset($infix_general_setting)): ?>
                                                        <?php if(@$infix_general_setting->is_s3_host==1): ?>
                                                            <?php echo app('translator')->get('lang.enable'); ?>
                                                        <?php else: ?>
                                                            <?php echo app('translator')->get('lang.disable'); ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>



                                









                                

                                <div class="single-meta ">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo app('translator')->get('lang.background_color'); ?>- 1
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left d-flex">
                                                
                                                <?php if(isset($data)): ?>
                                                <div class=" col-md-2 mt-2">
                                                    <div class="bg-color_general_settings"  style="background: <?php echo e($data->color1); ?> ; width:15px ; height:15px; "></div>
                                                </div>
                                                <div class="col-md-9"> <?php echo e($data->color1); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                    <?php echo app('translator')->get('lang.background_color'); ?>- 2
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left d-flex">
                                            
                                                  <?php if(isset($data)): ?>
                                                <div class=" col-md-2 mt-2">
                                                    <div class="bg-color_general_settings"  style="background: <?php echo e($data->color2); ?> ; width:15px ; height:15px; "></div>
                                                </div>
                                                <div class="col-md-9"> <?php echo e($data->color2); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                    <?php echo app('translator')->get('lang.search_box_color'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left d-flex">
                                                <?php if(isset($data)): ?>
                                                <div class=" col-md-2 mt-2">
                                                    <div class="bg-color_general_settings"  style="background: <?php echo e($data->color3); ?> ; width:15px ; height:15px; "></div>
                                                </div>
                                                <div class="col-md-9"> <?php echo e($data->color3); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/general_setting.blade.php ENDPATH**/ ?>