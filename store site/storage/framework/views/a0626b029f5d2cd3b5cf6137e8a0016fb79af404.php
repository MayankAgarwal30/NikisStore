
<?php $__env->startSection('mainContent'); ?>

<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/approved_deposit.css">
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">  
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title sm_mb_20 lm_mb_35">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.author'); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-12">                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                            <thead>                           
                                <tr>
                                    <th width="10%"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                    <th width="15%"><?php echo app('translator')->get('lang.email'); ?></th>
                                    
                                    <th width="15%"><?php echo app('translator')->get('lang.login'); ?> <?php echo app('translator')->get('lang.permission'); ?></th>
                                    <th width="15%"><?php echo app('translator')->get('lang.image'); ?></th>
                                    <th width="15%"><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="<?php echo e(@$value->id); ?>">
                                    <td><?php echo e(@$value->username); ?></td>
                                    <td><?php echo e(@$value->email); ?></td>
                                    
                                    <td>                                                   
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" <?php echo e(@$value->access_status == 1? 'checked':''); ?> value="<?php echo e(@$value->access_status); ?>">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td valign="top"><img src="<?php echo e(@$value->profile->image ? asset(@$value->profile->image) :asset('public/frontend/img/profile/1.png')); ?>" class="add_fund_profile_img"></td>
                                    <td>
                                            <div class="row">
                                            <div class="col-sm-6">
            
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                    <?php echo app('translator')->get('lang.select'); ?>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                
                                            
                                                        <?php if(@$value->role_id == 4): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('admin.vendor_view',@$value->id)); ?>"> <?php echo app('translator')->get('lang.view'); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($value->role_id == 5): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('admin.customer_view',@$value->id)); ?>"> <?php echo app('translator')->get('lang.view'); ?></a>
                                                        <?php endif; ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('admin.vendor_edit',@$value->id)); ?>"> <?php echo app('translator')->get('lang.edit'); ?></a>
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal<?php echo e(@$value->id); ?>"  href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
            
                                                       
            
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                </tr>  

                                <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$value->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.author'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                    </div>
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                          <a href="<?php echo e(route('admin.vendorDeleted',@$value->id)); ?>" class="text-light">
                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                         </a>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
            </div>
    </div>
</section>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/vendor/vendor_list.blade.php ENDPATH**/ ?>