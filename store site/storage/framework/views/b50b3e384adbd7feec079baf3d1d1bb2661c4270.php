
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.log'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('admin.userLog')); ?>" class="active"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.log'); ?></a>
                
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title sm_mb_20 lm_mb_20">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.log'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                           
                                <tr>
                                    <th><?php echo app('translator')->get('lang.name'); ?></th>
                                    <th><?php echo app('translator')->get('lang.role'); ?></th>
                                    <th><?php echo app('translator')->get('lang.last'); ?> <?php echo app('translator')->get('lang.login'); ?></th>
                                    <th><?php echo app('translator')->get('lang.last'); ?> <?php echo app('translator')->get('lang.login'); ?> <?php echo app('translator')->get('lang.ip'); ?></th>
                                    <th><?php echo app('translator')->get('lang.device'); ?></th>
                                    <th><?php echo app('translator')->get('lang.Browsers'); ?></th>
                                    <th><?php echo app('translator')->get('lang.country'); ?></th>
                                    <th><?php echo app('translator')->get('lang.city'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['userlog']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td valign="top"><?php echo e(@$item->user->username); ?></td>
                                    <td valign="top"><?php echo e(@$item->user->role->name); ?></td>
                                    <td valign="top"><?php echo e(DateFormat(@$item->last_login_at)); ?></td>
                                    <td valign="top"><?php echo e(@$item->last_login_ip); ?></td>
                                    <td valign="top"><?php echo e(@$item->device); ?></td>
                                    <td valign="top"><?php echo e(@$item->browser); ?></td>
                                    <td valign="top"><?php echo e(@$item->country_name); ?></td>
                                    <td valign="top"><?php echo e(@$item->city); ?></td>
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal<?php echo e(@$item->id); ?>" ><?php echo app('translator')->get('lang.delete'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                  <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.log'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                      <a href="<?php echo e(route('admin.userLogDelete',$item->id)); ?>" class="text-light">
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
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/userlog/index.blade.php ENDPATH**/ ?>