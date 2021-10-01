<?php $__env->startSection('mainContent'); ?>

<link rel="stylesheet" href="<?php echo e(asset('/Modules/RolePermission/public/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assign_permission.css">

<section class="sms-breadcrumb mb-40 white-box lol">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.role_permission'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.role_permission'); ?></a> 
            </div>
        </div>
    </div>
</section>

<div class="role_permission_wrap">
        <div class="permission_title">
            <h4><?php echo app('translator')->get('lang.assign_permission'); ?> (<?php echo e(@$role->name); ?>)</h4>
        </div>
    </div>

    <div class="erp_role_permission_area ">



        <!-- single_permission  -->

    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign_permission_update',
                        'method' => 'POST'])); ?>

                        <div  class="mesonary_role_header">
            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single_role_blocks">
                    <div class="single_permission" id="">
                        <div class="permission_header d-flex align-items-center justify-content-between">
                            <div>
                                <input type="hidden" name="module_id[<?php echo e(@$module->id); ?>]" value="<?php echo e(@$module->id); ?>">
                                <input type="checkbox" name="permission[<?php echo e(@$module->id); ?>]" value="1"  id="Main_Module_<?php echo e(@$module->id); ?>" class="common-radio permission-checkAll main_module_id_" <?php echo e($module->permission == 1 ? 'checked':''); ?> >
                            <label for="Main_Module_<?php echo e(@$module->id); ?>"><?php echo e(@$module->name); ?></label>
                            </div>
                        </div>


                        
                    
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>
         <div class="row mt-40">
            <div class="col-lg-12 text-center">
                <button class="primary-btn fix-gr-bg">
                    <span class="ti-check"></span>
                    <?php echo app('translator')->get('submit'); ?>
                    
                </button>
            </div>
        </div>

         <?php echo e(Form::close()); ?>



    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/rolepermission/assign_permission.blade.php ENDPATH**/ ?>