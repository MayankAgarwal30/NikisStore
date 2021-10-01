
<?php $__env->startSection('mainContent'); ?>



<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.payment_method'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.payment_method'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($payment_method)): ?>
            <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                    <a href="<?php echo e(url('payment-method')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('lang.add'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        

        <div class="row mt-40">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.payment_method'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('lang.sl'); ?></th>
                                    <th><?php echo app('translator')->get('lang.logo'); ?></th>
                                    <th><?php echo app('translator')->get('lang.method'); ?></th>
                                    <th><?php echo app('translator')->get('lang.configuration'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count=1; ?>
                                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                                <tr>
                                    <td><?php echo e($count++); ?></td>
                                    <td>
                                        <img  src="<?php echo e(file_exists(@$payment_method->logo) ? asset($payment_method->logo) : asset('public/no_logo.png')); ?>" width="50" height="50" alt="logo">
       
                                </td>
                                    <td><?php echo e($payment_method->gateway_name); ?></td>
                                    <td> <a class="primary-btn small fix-gr-bg" href="<?php echo e(route('payment_method_config', [$payment_method->id])); ?>"><?php echo app('translator')->get('lang.view'); ?></a></td>
                                    <td>
                                        <?php if($payment_method->active_status==1): ?>
                                            <button class="primary-btn small bg-success text-white border-0">Enabled</button>
                                        <?php else: ?> 
                                            <button class="primary-btn small bg-danger text-white border-0">Diabled</button>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php if($payment_method->type != "System"): ?>
                                                        <a  class="dropdown-item" href="<?php echo e(url('systemsetting/payment-method-config',$payment_method->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                        
                                                    <?php endif; ?>
                                                    <?php if($payment_method->active_status==1): ?>
                                                        <a  class="dropdown-item" href="<?php echo e(url('systemsetting/payment-method-disable',$payment_method->id)); ?>"><?php echo app('translator')->get('lang.disable'); ?></a>
                                                    <?php else: ?>
                                                        <a  class="dropdown-item" href="<?php echo e(url('systemsetting/payment-method-enable',$payment_method->id)); ?>"><?php echo app('translator')->get('lang.enable'); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade admin-query" id="deletePaymentMethodModal<?php echo e($payment_method->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.payment_method'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                    <a href="<?php echo e(route('payment_method_delete', [$payment_method->id])); ?>" class="text-light">
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
<link rel="stylesheet" href="<?php echo e(asset('Modules/Systemsetting/Resources/assets/')); ?>/css/add_payment.css"/>
 <script src="<?php echo e(asset('Modules/Systemsetting/Resources/assets/')); ?>/js/systemSetting.js"></script>
>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/payment_method_setting.blade.php ENDPATH**/ ?>