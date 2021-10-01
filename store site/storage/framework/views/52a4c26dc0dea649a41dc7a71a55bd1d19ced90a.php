<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/approved_deposit.css">
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.approved_deposit_request'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.bank_payment'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.approved_deposit_request'); ?> </a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
       

            <div class="row mt-40 mb-25">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                            <h3 class="mb-0"><?php echo e(@$user_info->full_name); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        
            <!-- </div> -->
            <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="15%"><?php echo app('translator')->get('lang.dipositor'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.amount'); ?></th>
                                <th width="40%"><?php echo app('translator')->get('lang.bank_info'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.date'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $approved_deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                
                                <td><?php echo e(@$value->full_name); ?></td>
                                <td><?php echo e(@$value->amount); ?></td>
                                <td>
                                    <ul>
                                        <li><?php echo app('translator')->get('lang.name'); ?>: <?php echo e(@$value->bank_name); ?> </li>
                                        <li><?php echo app('translator')->get('lang.account_no'); ?>: <?php echo e(@$value->account_number); ?> </li>
                                        <li><?php echo app('translator')->get('lang.owner_name'); ?> : <?php echo e(@$value->owner_name); ?> </li>
                                    </ul>
                                </td>
                                <td><?php echo e(DateFormat(@$value->created_at)); ?></td>
                                <td>
                                    <?php if(@$value->status==1): ?>
                                        <?php echo app('translator')->get('lang.approved'); ?>
                                    <?php else: ?>
                                        
                                    
                                    <div class="row">
                                    <div class="col-sm-6">
    
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            <?php echo app('translator')->get('lang.select'); ?>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          
                                            
                                            <a class="dropdown-item" data-toggle="modal" data-target="#DeleteFund<?php echo e(@$value->id); ?>"  href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#ApproveDeposit<?php echo e(@$value->id); ?>"  href="#"><?php echo app('translator')->get('lang.approve'); ?></a>
                                            
    
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>  

                            
                            <div class="modal fade admin-query" id="EditFund<?php echo e(@$value->id); ?>" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('lang.edit'); ?> <?php echo app('translator')->get('lang.fund'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                        <form action="<?php echo e(url('admin/update-fund')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                            <div class="row no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="input-effect">
                                                    <input class="primary-input form-control" id="fund_amount" min="0" type="number" name="fund_amount" value="<?php echo e(@$value->amount); ?>">
                                                        <label><?php echo app('translator')->get('lang.amount'); ?><span>*</span></label>
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="fund_id" value="<?php echo e(@$value->id); ?>">
                                            
                                
                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                 
                                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.update'); ?></button>
                                                
                                            </div>

                                        </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="modal fade admin-query" id="DeleteFund<?php echo e(@$value->id); ?>" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.deposit'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                            </div>

                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                  <a href="<?php echo e(route('admin.depositDelete',@$value->id)); ?>" class="text-light">
                                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                 </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade admin-query" id="ApproveDeposit<?php echo e(@$value->id); ?>" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('lang.approve'); ?> <?php echo app('translator')->get('lang.deposit'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4><?php echo app('translator')->get('lang.are_you_sure_to_approve_this_deposit_request'); ?></h4>
                                            </div>

                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                  <a href="<?php echo e(route('admin.approveDeposit',@$value->id)); ?>" class="text-light">
                                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.approve'); ?></button>
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/fund/approved_deposit.blade.php ENDPATH**/ ?>