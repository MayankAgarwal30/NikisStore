

<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/approved_deposit.css">
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.payment'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.payment'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
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
                                <h3 class="mb-0"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
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
                                <th width="15%"><?php echo app('translator')->get('lang.phone'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.earnings'); ?> </th>
                                <th width="15%"><?php echo app('translator')->get('lang.status'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.method'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.send'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $author_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <tr id="<?php echo e(@$value->id); ?>">
                                    <td><?php echo e(@$value->username); ?></td>
                                    <td><?php echo e(@$value->payout_email); ?></td>
                                    <td><?php echo e(@$value->payout_phone); ?></td>
                                    <td><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$value->user->balance->amount); ?></td>

                                    <td><?php echo e(@$value->user->CheckPaymnent(@$value->user_id) ? 'Paid' : 'Unpaid'); ?></td>
                                    
                                    <td><?php echo e(@$value->payment_method_name); ?></td>
                                    <td>
                                      <?php if(@$value->user->balance->amount>0): ?>                                            
                                        <a href="<?php echo e(route('admin.WithdrawUser',@$value->user_id)); ?>" class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('lang.send'); ?> <?php echo app('translator')->get('lang.money'); ?></a>
                                      <?php else: ?> 
                                        <span><?php echo app('translator')->get('lang.empty'); ?></span>  
                                      <?php endif; ?>
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/payment/pay.blade.php ENDPATH**/ ?>