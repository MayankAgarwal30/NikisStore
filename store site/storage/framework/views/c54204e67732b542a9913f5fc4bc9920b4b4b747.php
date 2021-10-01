
<?php $__env->startSection('mainContent'); ?>



<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.footer_menu'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(url('footer-menu')); ?>" class="active"><?php echo app('translator')->get('lang.footer_menu'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-3 ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">

                                <?php if(isset($editData) && !empty(@$editData)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.footer_menu'); ?>
                            </h3>
                        </div>
                        <?php if(isset($editData) && !empty(@$editData)): ?>
                            <form action="<?php echo e(url('footer-menu-store-update')); ?>"  method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <?php else: ?>
                            <form action="<?php echo e(url('footer-menu-store')); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data" id="addbadge">
                        <?php endif; ?>

                            <?php echo csrf_field(); ?>

                        <div class="white-box ">
                            <div class="add-visitor <?php echo e(!isset($editData)? 'disabledbutton':''); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('menu_title') ? ' is-invalid' : ''); ?>" type="text" name="menu_title"
                                                   autocomplete="off" value="<?php echo e(isset($editData)? $editData->menu_title :old('menu_title')); ?>">

                                            <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id: ''); ?>">
                                            <label><?php echo app('translator')->get('lang.menu_title'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('menu_title')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('menu_title')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('menu_url') ? ' is-invalid' : ''); ?>" type="text" name="menu_url" autocomplete="off" value="<?php echo e(isset($editData)? $editData->menu_url:old('menu_url')); ?>">

                                            <label><?php echo app('translator')->get('lang.menu_url'); ?> </label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('menu_url')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('menu_url')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('position_no') ? ' is-invalid' : ''); ?>"
                                                name="position_no" id="position_no">
                                                <option data-display="Select Position No *"
                                                        value="">Select</option>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($editData)): ?>
                                                        <option
                                                            value="<?php echo e($value->position_no); ?>" <?php echo e($value->position_no == $editData->position_no? 'selected':''); ?>><?php echo e($value->position_no); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($value->position_no); ?>" <?php echo e(old('position_no')!=''? (old('position_no') == $value->position_no? 'selected':''):''); ?> ><?php echo e($value->position_no); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('position_no')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('position_no')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="row mt-50">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            <?php if(isset($editData)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                            <?php echo app('translator')->get('lang.menu'); ?>

                                        </button>
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
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.footer_menu'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                           
                                <tr>
                                    <th><?php echo app('translator')->get('lang.position'); ?></th>
                                    <th><?php echo app('translator')->get('lang.menu_title'); ?></th>
                                    <th><?php echo app('translator')->get('lang.menu_url'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td valign="top"><?php echo e($item->position_no); ?></td>
                                   
                                    <td valign="top"><?php echo e(@$item->menu_title); ?></td>
                                    <td valign="top"><?php echo e(@$item->menu_url); ?></td>
                                    
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo e(url('edit_footer-menu/'.@$item->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </div>
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



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/footer_menu/footer_menu.blade.php ENDPATH**/ ?>