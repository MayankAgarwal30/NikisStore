

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.third_party_API'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.third_party_API'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
       
        <div class="row mt-40">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                  
                               <?php echo app('translator')->get('lang.setup_third_party_APIs'); ?>
                            </h3>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'google_analytics_setup',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <?php if(env('ANALYTICS_VIEW_ID')): ?>
                                                
                                        <?php endif; ?>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('view_id') ? ' is-invalid' : ''); ?>"
                                                        type="text"  name="view_id" autocomplete="off" value="<?php echo e(@$view_id); ?>" >
                                                    <label><?php echo app('translator')->get('lang.GOOGLE_ANALYTICS_VIEW_ID'); ?> <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('view_id')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('view_id')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-effect mt-20">
                                                    <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="">
                                                        
                                                        <?php echo app('translator')->get('lang.setup_google_analytics'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                   
                                    </div>
                                </div>

                                
                            </div>
                        
                        <?php echo e(Form::close()); ?>




                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fixer_setup',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


                        
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">

                                        

                                        <div class="row">
                                            <div class="col-lg-6 mt-20">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('access_key') ? ' is-invalid' : ''); ?>"
                                                        type="text"  name="access_key" autocomplete="off" value="<?php echo e(@$access_key); ?>" >
                                                    <label><?php echo app('translator')->get('lang.fixer_access_key'); ?> <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('access_key')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('access_key')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-effect mt-20">
                                                    <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="">
                                                        
                                                        <?php echo app('translator')->get('lang.setup_fixer'); ?> 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                   
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <?php if(moduleStatusCheck('AmazonS3') == true): ?>
            <div class="col-lg-12 mt-20">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                  
                                <?php echo app('translator')->get('lang.Amazon_S3'); ?>
                            </h3>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'AwsS3SettingSubmit',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">

                                       

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('access_key_id') ? ' is-invalid' : ''); ?>"
                                                        type="text"  name="access_key_id" value="<?php echo e(env('AWS_ACCESS_KEY_ID')??''); ?>" >
                                                    <label>Access Key Id <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('access_key_id')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('access_key_id')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('secret_key') ? ' is-invalid' : ''); ?>"
                                                        type="text"  name="secret_key" value="<?php echo e(env('AWS_SECRET_ACCESS_KEY')??''); ?>" >
                                                    <label>Secret Key <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('secret_key')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('secret_key')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mt-20">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('default_region') ? ' is-invalid' : ''); ?>"
                                                        type="text"  name="default_region" value="<?php echo e(env('AWS_DEFAULT_REGION')??''); ?>" >
                                                    <label>Default Region <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('default_region')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('default_region')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-20">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('bucket') ? ' is-invalid' : ''); ?>"
                                                        type="text"  name="bucket" value="<?php echo e(env('AWS_BUCKET')??''); ?>" >
                                                    <label>Bucket <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('bucket')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('bucket')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-12 mb-10 mt-15 text-center">
                                            <div class="input-effect mt-20">
                                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="">
                                                    
                                                    <?php echo app('translator')->get('lang.setup_aws3'); ?> 
                                                </button>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>

                                
                            </div>
                        
                        <?php echo e(Form::close()); ?>


                    </div>
                </div>
            </div>     
             <?php endif; ?>
            
        </div>

       
    </div>
</section>
<link rel="stylesheet" href="<?php echo e(asset('Modules/Systemsetting/Resources/assets/')); ?>/css/add_payment.css"/>
 <script src="<?php echo e(asset('Modules/Systemsetting/Resources/assets/')); ?>/js/systemSetting.js"></script>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/google_analytics.blade.php ENDPATH**/ ?>