


<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/approved_deposit.css">
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.payment'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></a>
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
                                <h3 class="mb-0"><?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></h3>
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
                                <th width="10%"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.email'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.earnings'); ?> </th>
                                <th width="15%"><?php echo app('translator')->get('lang.status'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <tr id="<?php echo e(@$value->id); ?>">
                                    <td><?php echo e(@$value->user->username); ?></td>
                                    <td><?php echo e(@$value->user->email); ?></td>
                                    <td><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$value->user->balance->amount); ?></td>
                                    <td>
                                        <?php if(@$value->status == 0): ?>
                                            <?php echo app('translator')->get('lang.pending'); ?>
                                        <?php elseif(@$value->status == 1): ?>
                                            <?php echo app('translator')->get('lang.active'); ?>
                                        <?php else: ?>
                                        <?php echo app('translator')->get('lang.reject'); ?> 
                                        <?php endif; ?>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.CreditCardView',@$value->id)); ?>"> <?php echo app('translator')->get('lang.view'); ?></a>              
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
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/payment/credit_card_list.blade.php ENDPATH**/ ?>