<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/approved_deposit.css">
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.offline_payment'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.funding_history'); ?> </a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
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
                                <th width="10%"><?php echo app('translator')->get('lang.f_id'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.details'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.amount'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('lang.date'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$value->id); ?></td>
                                    <td><?php echo e(@$value->details); ?></td>
                                    <td><?php echo e(@$value->amount); ?></td>
                                    <td><?php echo e(DateFormat(@$value->created_at)); ?></td>
                                </tr>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/fund/funding_history.blade.php ENDPATH**/ ?>