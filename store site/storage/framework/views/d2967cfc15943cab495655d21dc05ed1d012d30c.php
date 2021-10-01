
<?php $__env->startSection('mainContent'); ?>
    <link rel="stylesheet" href="<?php echo e(url('Modules/Pages/Assets/css/style.css')); ?>">
    <script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.privacy'); ?> <?php echo app('translator')->get('lang.policy'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.frontend_CMS'); ?> </a>
                    <a href="#"><?php echo app('translator')->get('lang.privacy'); ?> <?php echo app('translator')->get('lang.policy'); ?> </a>
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
                                    <?php echo app('translator')->get('lang.privacy'); ?> <?php echo app('translator')->get('lang.policy'); ?>
                                </h3>
                            </div>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'privacy-policy-update',
                            'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id: ''); ?>">
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row mt-40">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input class="primary-input form-control<?php echo e($errors->has('heading_title') ? ' is-invalid' : ''); ?>"
                                                       type="text" name="heading_title" autocomplete="off"
                                                       value="<?php echo e(isset($editData)? $editData->heading_title:old('heading_title')); ?>">
                                                <label><?php echo app('translator')->get('lang.heading'); ?> <?php echo app('translator')->get('lang.title'); ?> <span class="text-red">*</span></label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('heading_title')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('heading_title')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-40">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input class="primary-input form-control<?php echo e($errors->has('sub_title') ? ' is-invalid' : ''); ?>"
                                                       type="text" name="sub_title" autocomplete="off"
                                                       value="<?php echo e(isset($editData)? $editData->sub_title:old('sub_title')); ?>">
                                                <label><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.title'); ?> <span
                                                            class="text-red">*</span></label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('sub_title')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('sub_title')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-40">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <textarea name="short_description"
                                                          class="primary-input form-control<?php echo e($errors->has('short_description') ? ' is-invalid' : ''); ?>"
                                                          rows="5"><?php echo e(isset($editData)? $editData->short_description:old('short_description')); ?></textarea>
                                                <label><?php echo app('translator')->get('lang.short'); ?> <?php echo app('translator')->get('lang.description'); ?> <span
                                                            class="text-red">*</span></label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('short_description')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('short_description')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-40">
                                        <div class="col-lg-12">
                                            <?php if(!empty($editData->image)): ?>
                                                <img class="mb-20" height="80px;" width="120px;"  src="<?php echo e(asset('/')); ?><?php echo e($editData->image); ?>" >
                                            <?php endif; ?>
                                            <div class="row no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="input-effect">
                                                        <input class="primary-input" type="text" id="placeholderPhoto"
                                                               placeholder="<?php echo app('translator')->get('lang.upload'); ?> <?php echo app('translator')->get('lang.image'); ?>"
                                                               readonly="">
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button class="primary-btn-small-input" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="photo"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                        <input type="file" class="d-none" value="<?php echo e(old('photo')); ?>"
                                                               name="photo" id="photo">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-40">
                                        <div class="col-lg-12">
                                            <label><?php echo app('translator')->get('lang.description'); ?> <span class="text-red">*</span></label>
                                            <div class="input-effect">
                                                <textarea id="editor1"
                                                          class="primary-input form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"
                                                          name="description" id="" cols="30" rows="10"
                                                          data-sample-short><?php echo e(isset($editData)? $editData->description:old('description')); ?></textarea>

                                                <span class="focus-border"></span>
                                                <?php if($errors->has('description')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('description')); ?></strong>
                                            </span>
                                                <?php endif; ?>
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Pages/Resources/views/privacyPolicy.blade.php ENDPATH**/ ?>