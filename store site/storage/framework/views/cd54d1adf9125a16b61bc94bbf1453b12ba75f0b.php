
<?php $__env->startSection('mainContent'); ?> 
<link rel="stylesheet" href="<?php echo e(url('Modules/Pages/Assets/css/style.css')); ?>">  
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.coupon'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.frontend_CMS'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.page'); ?> </a>
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
                        <div class="main-title">
                            <h3 class="mb-30"> <?php echo app('translator')->get('lang.update'); ?>
                                    <?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.page'); ?> 
                            </h3>

                        </div>
                      
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'coupon-text-update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                         <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id: ''); ?>"> 
                        <div class="white-box">
                            <div class="add-visitor">  
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                        name="coupon"><?php echo e(isset($editData)? @$editData->coupon: old('coupon')); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.coupon'); ?> *<span></span></label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('coupon')): ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('coupon')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                        name="add_coupon"><?php echo e(isset($editData)? @$editData->add_coupon: old('add_coupon')); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.add_coupon'); ?> *<span></span></label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('add_coupon')): ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('add_coupon')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                        name="delete_coupon"><?php echo e(isset($editData)? @$editData->delete_coupon: old('delete_coupon')); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.delete_coupon'); ?> *<span></span></label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('delete_coupon')): ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('delete_coupon')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                        name="expired_coupon"><?php echo e(isset($editData)? @$editData->expired_coupon: old('expired_coupon')); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.expired_coupon'); ?> *<span></span></label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('expired_coupon')): ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('expired_coupon')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                      <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title=" test ">
                                            <span class="ti-check"></span>
                                            <?php if(isset($editData)): ?>
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



<script src="<?php echo e(asset('/')); ?>public/backEnd/backend_modules.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Pages/Resources/views/coupon.blade.php ENDPATH**/ ?>