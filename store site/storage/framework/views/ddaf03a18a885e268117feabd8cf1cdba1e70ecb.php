
<?php $__env->startSection('mainContent'); ?> 
<link rel="stylesheet" href="<?php echo e(url('Modules/Pages/Assets/css/style.css')); ?>">  
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.home_page'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.frontend_CMS'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.home_page'); ?> </a>
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
                                <?php echo app('translator')->get('lang.home_page'); ?>
                            </h3>

                        </div>
                      
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'home-page-update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                         <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id: ''); ?>"> 
                        <div class="white-box">
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <div class="add-visitor">  
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('homepage_title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="homepage_title" autocomplete="off" value="<?php echo e(isset($editData)? $editData->homepage_title:old('homepage_title')); ?>">
                                            <label><?php echo app('translator')->get('lang.Home_page'); ?> <?php echo app('translator')->get('lang.title'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('homepage_title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('homepage_title')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('homepage_description') ? ' is-invalid' : ''); ?>"
                                                type="text" name="homepage_description" autocomplete="off" value="<?php echo e(isset($editData)? $editData->homepage_description:old('homepage_description')); ?>">
                                            <label><?php echo app('translator')->get('lang.Home_page'); ?> <?php echo app('translator')->get('lang.description'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('homepage_description')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('homepage_description')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('feature_title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="feature_title" autocomplete="off" value="<?php echo e(isset($editData)? $editData->feature_title:old('feature_title')); ?>">
                                            <label><?php echo app('translator')->get('lang.feature'); ?> <?php echo app('translator')->get('lang.title'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('feature_title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('feature_title')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('feature_title_description') ? ' is-invalid' : ''); ?>"
                                                type="text" name="feature_title_description" autocomplete="off" value="<?php echo e(isset($editData)? $editData->feature_title_description:old('feature_title_description')); ?>">
                                            <label><?php echo app('translator')->get('lang.feature'); ?> <?php echo app('translator')->get('lang.title'); ?> <?php echo app('translator')->get('lang.description'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('feature_title_description')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('feature_title_description')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('product_title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="product_title" autocomplete="off" value="<?php echo e(isset($editData)? $editData->product_title:old('product_title')); ?>">
                                            <label><?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.title'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('product_title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('product_title')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('product_title_description') ? ' is-invalid' : ''); ?>"
                                                type="text" name="product_title_description" autocomplete="off" value="<?php echo e(isset($editData)? $editData->product_title_description:old('product_title_description')); ?>">
                                            <label><?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.title'); ?> <?php echo app('translator')->get('lang.description'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('product_title_description')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('product_title_description')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mt-40">
                                 
                                    <div class="col-lg-6"> 
                                        <div class="input-effect">
                                            <img height="200"  src="<?php echo e(file_exists(@$editData->banner_image) ? asset(@$editData->banner_image) : asset('public/frontend/img/banner/banner-img-1.png')); ?> " alt="">
                                        </div> 
                                    </div> 
                                    <div class="col-lg-6 mt-45" style="margin-top: 160px;">
                                        <div class="row no-gutters input-right-icon">
                                      
                                            <div class="col">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control <?php echo e($errors->has('banner_image') ? ' is-invalid' : ''); ?>" type="text"
                                                            id="placeholderPhoto"
                                                            placeholder=""
                                                            readonly="">
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('banner_image')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('banner_image')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input"
                                                        type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                            for="photo"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                    <input type="file" class="d-none" name="banner_image"
                                                    id="photo">
                                                </button>
                                                
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Pages/Resources/views/homePage.blade.php ENDPATH**/ ?>