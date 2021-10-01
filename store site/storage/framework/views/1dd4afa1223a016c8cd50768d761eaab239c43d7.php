
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.free'); ?> <?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#" class="active"><?php echo app('translator')->get('lang.free'); ?> <?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area">
    <div class="container-fluid p-0">
       

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.free'); ?> <?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.list'); ?> </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                           
                                <tr>
                                    <th><?php echo app('translator')->get('lang.id'); ?></th>
                                    <th><?php echo app('translator')->get('lang.title'); ?></th>
                                    <th><?php echo app('translator')->get('lang.category'); ?></th>
                                    <th><?php echo app('translator')->get('lang.demo'); ?> <?php echo app('translator')->get('lang.url'); ?></th>
                                    <th><?php echo app('translator')->get('lang.image'); ?></th>
                                    <th><?php echo app('translator')->get('lang.price'); ?></th>
                                    <th><?php echo app('translator')->get('lang.author'); ?></th>
                                    <th><?php echo app('translator')->get('lang.sell'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td valign="top"><a target="_blank" href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->title),@$item->id])); ?>"><?php echo e(Str::limit(@$item->title,20)); ?></a></td>
                                    <td valign="top"><?php echo e(@$item->category->title); ?> / <?php echo e(@$item->subCategory->title); ?></td>
                                    <td valign="top"><a href="<?php echo e(@$item->demo_url); ?>" target="_blank" class="primary-btn small fix-gr-bg">Click here</a></td>
                                    <td valign="top"><img src="<?php echo e(asset(@$item->icon)); ?>" class="content_list_wh_40"></td>
                                    <td valign="top"><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$item->Reg_total); ?></td>
                                    <td aign="top"><a target="_blank" href="<?php echo e(route('user.profile',@$item->user->username)); ?>"><?php echo e(@$item->user->username); ?></a></td>
                                    
                                    <td><?php echo e(@$item->sell); ?></td>
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
                                                <a class="dropdown-item" target="_blank" href="<?php echo e(route('admin.product_viewSingle',[str_replace(' ', '-',@$item->title),@$item->id])); ?>"><?php echo app('translator')->get('lang.view'); ?></a>
                                                <a class="dropdown-item" target="_blank" href="<?php echo e(route('admin.contentEdit',@$item->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a> 
                                                <a class="dropdown-item" target="_blank" href="<?php echo e(route('admin.ProductDownload',@$item->id)); ?>"><?php echo app('translator')->get('lang.download'); ?></a> 
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal<?php echo e(@$item->id); ?>"  href=""><?php echo app('translator')->get('lang.delete'); ?></a>                                                 
                                                <a class="dropdown-item" onclick="FreeProduct(`<?php echo e(route('admin.free_product_deactive',$item->id)); ?>`)" data-toggle="modal" data-target="#FreeProduct<?php echo e(@$item->id); ?>" ><?php echo app('translator')->get('lang.move_to'); ?> <?php echo app('translator')->get('lang.paid'); ?></a>                                                 
                                                <?php if($item->status == 1): ?>
                                                   <a class="dropdown-item" data-toggle="modal" data-target="#ApproveClassModal<?php echo e(@$item->id); ?>"  href="">   <?php echo app('translator')->get('lang.deactive'); ?>  </a>
                                                <?php else: ?>   
                                                   <a class="dropdown-item" data-toggle="modal" data-target="#ApproveClassModal<?php echo e(@$item->id); ?>"  href=""> <?php echo app('translator')->get('lang.active'); ?></a>
                                                <?php endif; ?>
                                                   
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                  <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.item'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                    <a href="<?php echo e(route('admin.itemDelete',@$item->id)); ?>" class="text-light">
                                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                     </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                  <div class="modal fade admin-query" id="ApproveClassModal<?php echo e(@$item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.item'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                        <?php if($item->status == 1): ?>
                                                        <h4><?php echo app('translator')->get('lang.are_you_want_to_deactive'); ?></h4>
                                                        <?php else: ?>   
                                                        <h4><?php echo app('translator')->get('lang.are_you_want_to_Approve'); ?></h4>
                                                        <?php endif; ?>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                    <a href="<?php echo e(route('admin.Item_approve',$item->id)); ?>" class="text-light">
                                                            <?php if(@$item->status == 1): ?>
                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.deactive'); ?></button>
                                                            <?php else: ?>   
                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.approve'); ?></button>
                                                            <?php endif; ?>
                                                     </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade admin-query" id="FreeProduct<?php echo e(@$item->id); ?>" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('lang.product_free'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo e(route('admin.free_product_deactive',@$item->id)); ?>" method="POST" id="Free_form">
                                                <?php echo csrf_field(); ?>
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_active'); ?></h4>
                                                </div>

                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.submit'); ?></button>
                                            </div>
                                        </form>
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




<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/product/free_content_list.blade.php ENDPATH**/ ?>