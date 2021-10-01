
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.seo'); ?> <?php echo app('translator')->get('lang.setting'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_setting'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.seo'); ?> <?php echo app('translator')->get('lang.setting'); ?></a>
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
                            <h3 class="mb-30"><?php if(isset($editData)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.seo'); ?>  <?php echo app('translator')->get('lang.setting'); ?>
                            </h3>
                        </div>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'seo-setting-update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                         <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id: ''); ?>">


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

                                    </div>
                                </div>




                                            <div class="row  d-none">
                                                <div class="col-lg-6 mt-30">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('site_name') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="site_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->site_name:old('site_name')); ?>">
                                                        <label><?php echo app('translator')->get('lang.site'); ?> <?php echo app('translator')->get('lang.name'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('site_name')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('site_name')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-30">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('site_title') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="site_title" autocomplete="off" value="<?php echo e(isset($editData)? $editData->site_title:old('site_title')); ?>">
                                                        <label><?php echo app('translator')->get('lang.site'); ?> <?php echo app('translator')->get('lang.title'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('site_title')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('site_title')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row ">
                                                <div class="col-lg-6 mt-30">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('site_author') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="site_author" autocomplete="off" value="<?php echo e(isset($editData)? $editData->site_author:old('site_author')); ?>">

                                                        <label><?php echo app('translator')->get('lang.site'); ?> <?php echo app('translator')->get('lang.author'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('site_author')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('site_author')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-30">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('keyword') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="keyword" autocomplete="off" value="<?php echo e(isset($editData)? $editData->keyword:old('keyword')); ?>">

                                                        <label><?php echo app('translator')->get('lang.keyword'); ?>   <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('keyword')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('keyword')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mt-30">
                                                <div class="col-lg-12">
                                                    <div class="input-effect">
                                                        <textarea class="primary-input form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" name="description" id="" cols="30" rows="10"><?php echo e(isset($editData)? $editData->description:old('description')); ?></textarea>

                                                        <label><?php echo app('translator')->get('lang.description'); ?>   <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('description')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>



                                <div class="row mt-30">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/seo_setting.blade.php ENDPATH**/ ?>