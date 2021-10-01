
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.refund'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#" class="active"><?php echo app('translator')->get('lang.refund'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area DM_table_info">
        <div class="container-fluid p-0"> 
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title lm_mb_35 sm_mb_20">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.refund'); ?> <?php echo app('translator')->get('lang.list'); ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-12">                    
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                            <thead>
                        
                                <tr>
                                    <th><?php echo app('translator')->get('lang.title'); ?></th>
                                    <th><?php echo app('translator')->get('lang.category'); ?></th>
                                    <th><?php echo app('translator')->get('lang.demo'); ?> <?php echo app('translator')->get('lang.url'); ?></th>
                                    <th><?php echo app('translator')->get('lang.image'); ?></th>
                                    <th><?php echo app('translator')->get('lang.price'); ?></th>
                                    <th><?php echo app('translator')->get('lang.author'); ?></th>
                                    <th><?php echo app('translator')->get('lang.buyer'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['refund_order']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td valign="top"><a target="_blank" href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->Item->title),@$item->id])); ?>"><?php echo e(Str::limit(@$item->Item->title,20)); ?></a></td>
                                    <td valign="top"><?php echo e(@$item->Item->category->title); ?> / <?php echo e(@$item->Item->subCategory->title); ?></td>
                                    <td valign="top"><a href="<?php echo e(@$item->Item->demo_url); ?>" target="_blank" class="primary-btn small fix-gr-bg">Click here</a></td>
                                    <td valign="top"><img src="<?php echo e(asset(@$item->Item->icon)); ?>" class="refund_item_w_60_h_40"></td>
                                    <td valign="top"><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$item->itemOrder->subtotal); ?></td>
                                    <td aign="top"><a target="_blank" href="<?php echo e(route('user.profile',@$item->Item->user->username)); ?>"><?php echo e(@$item->Item->user->username); ?></a></td>
                                    <td aign="top"><a target="_blank" href="<?php echo e(route('user.profile',@$item->user->username)); ?>"><?php echo e(@$item->user->username); ?></a></td>
                                    <td valign="top">
                                                <?php if(@$item->status == 1): ?>
                                                <?php echo app('translator')->get('lang.active'); ?>
                                                <?php else: ?>   
                                                <?php echo app('translator')->get('lang.pending'); ?>
                                                <?php endif; ?>
                                    </td>
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#showBlogModal<?php echo e(@$item->id); ?>"><?php echo app('translator')->get('lang.view'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                             

                                    <div class="modal fade admin-query" id="showBlogModal<?php echo e(@$item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center"> 

                                                            <b>Product : </b><?php echo e($item->Item->title); ?>

                                                    </div>
                                                    <hr>
                                                <p  class="mb-0 dm_font_size_12">  <?php echo @$item->refund_details; ?></p>
                                                <cite title="Source Title" class="dm_float_right" >- <?php echo e(@$item->user->username); ?></cite>

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
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/js/sweet-alert.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/refund.js"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/refund/refund_item.blade.php ENDPATH**/ ?>