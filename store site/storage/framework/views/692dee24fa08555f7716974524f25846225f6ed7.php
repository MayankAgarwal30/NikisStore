
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/approved_deposit.css">
<?php
    function showPicName($data){
        $name = explode('/', $data);
        return $name[3];
    }
?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1> <?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('admin.reCaptcha')); ?>" class="active"> <?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                <a href="#" class="active"> <?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.edit'); ?></a>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
        <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('admin.reCaptcha')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title ">
                            <h3 class="mb-30">

                                <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                 <?php echo app('translator')->get('lang.re_captcha'); ?>
                            </h3>
                        </div>
                        <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                            <form action="<?php echo e(url('admin/recaptcha-setting-update')); ?>"  method="POST" class="form-horizontal" enctype="multipart/form-data" id="addfee">
                        
                        <?php endif; ?>
                            <?php echo csrf_field(); ?>

                        <div class="white-box">
                            <div class="add-visitor">
                                    <input type="hidden" name="id"
                                    value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>" name="type">
                                                <option data-display="<?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.type'); ?> *" value=""> <?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.type'); ?> *</option> 
                                                <option value="1" <?php echo e(isset($data['edit'])? $data['edit']->type == 1?'selected':'': ''); ?> ><?php echo app('translator')->get('lang.google'); ?> <?php echo app('translator')->get('lang.re_captcha'); ?></option> 
                                            </select>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('type')): ?>
                                            <span class="invalid-feedback " role="alert">
                                                <strong><?php echo e($errors->first('type')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title"
                                                   autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->title :old('title')); ?>">
                                            <label><?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.title'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('title')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('sitekey') ? ' is-invalid' : ''); ?>" type="text" name="sitekey"
                                                   autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->sitekey :old('sitekey')); ?>">
                                            <label><?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.site_key'); ?>  <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('sitekey')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('sitekey')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('secretkey') ? ' is-invalid' : ''); ?>" type="text" name="secretkey"
                                                   autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->secretkey :old('secretkey')); ?>">
                                            <label><?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.secret_key'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('secretkey')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('secretkey')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>" name="active_status">
                                                <option data-display="<?php echo app('translator')->get('lang.status'); ?> *" value=""><?php echo app('translator')->get('lang.status'); ?> *</option> 
                                                <option value="1" <?php echo e(isset($data['edit'])? $data['edit']->status == 1?'selected':'': ''); ?> ><?php echo app('translator')->get('lang.active'); ?></option> 
                                                <option value="2" <?php echo e(isset($data['edit'])? $data['edit']->status == 0?'selected':'': ''); ?>><?php echo app('translator')->get('lang.inactive'); ?></option> 
                                            </select>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('active_status')): ?>
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong><?php echo e($errors->first('active_status')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <a target="_blank" href="https://www.google.com/recaptcha/admin/create"><?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.link'); ?> </a>
                                           
                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <?php if(isset($data['edit'])): ?>
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                                <?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.re_captcha'); ?>                                                
                                            </button>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title lm_mb_35 sm_mb_20">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                           
                                <tr>
                                    <th><?php echo app('translator')->get('lang.type'); ?></th>
                                    <th><?php echo app('translator')->get('lang.re_captcha'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['re_captcha']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="<?php echo e(@$item->id); ?>">
                                    <td valign="top">
                                        <?php if(@$item->type == 1): ?>
                                           <?php echo app('translator')->get('lang.google'); ?>  <?php echo app('translator')->get('lang.re_captcha'); ?> 
                                        <?php endif; ?>
                                    </td>
                                    <td valign="top"><?php echo e(@$item->title); ?></td>
                                    <td valign="top">
                                        <label class="switch">                                                
                                                <input type="checkbox" class="switch_recaptch" <?php echo e(@$item->status == 1? 'checked':''); ?> value="<?php echo e(@$item->status); ?>">
                                                <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo e(url('admin/recaptcha-setting-edit/'.@$item->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/re_captcha/index.blade.php ENDPATH**/ ?>