
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.order'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#" class="active"><?php echo app('translator')->get('lang.order'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
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
                        <div class="main-title lm_mb_35 sm_mb_20 ">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.order'); ?> <?php echo app('translator')->get('lang.list'); ?> </h3>
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
                                <?php $__currentLoopData = $data['item_order']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                if (in_array($item->order_id, $data['refunds_list']))
                                    {
                                    continue;
                                    }
                                ?>  
                                <tr>
                                    
                                    <td valign="top"><?php echo e(Str::limit(@$item->Item->title,20)); ?></td>
                                    <td valign="top"><?php echo e(@$item->Item->category->title); ?> / <?php echo e(@$item->Item->subCategory->title); ?></td>
                                    <td valign="top"><a href="<?php echo e(@$item->Item->demo_url); ?>" target="_blank" class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('lang.click_here'); ?></a></td>
                                    <td valign="top"><img src="<?php echo e(asset(@$item->Item->thumbnail)); ?>" class="order_item_thumb" ></td>
                                    <td valign="top"><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$item->subtotal); ?></td>
                                    <td aign="top"><a target="_blank" href="<?php echo e(route('user.profile',@$item->Item->user->username)); ?>"><?php echo e(@$item->Item->user->username); ?></a></td>
                                    <td aign="top"><a target="_blank" href="<?php echo e(route('user.profile',@$item->buyer->username)); ?>"><?php echo e(@$item->buyer->username); ?></a></td>
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
                                             <a class="dropdown-item" target="_blank" href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->Item->title),@$item->Item->id])); ?>"><?php echo app('translator')->get('lang.view'); ?></a>
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
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/order/order_item.blade.php ENDPATH**/ ?>