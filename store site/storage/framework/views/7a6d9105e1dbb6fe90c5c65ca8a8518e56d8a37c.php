
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/css/')); ?>/pending_product.css">
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.pending'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#" class="active"><?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.pending'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
       

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title sm_mb_20 lm_mb_35>
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.pending'); ?> <?php echo app('translator')->get('lang.list'); ?> </h3>
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
                                    <th><?php echo app('translator')->get('lang.feedback'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td valign="top"><?php echo e($key+1); ?></td>
                                    <td valign="top"><a target="_blank" href="<?php echo e(route('admin.product_viewSingle',[str_replace(' ', '-',@$item->title),$item->id])); ?>"><?php echo e(Str::limit(@$item->title,20)); ?></a></td>
                                    <td valign="top"><?php echo e(@$item->category->title); ?> / <?php echo e(@$item->subCategory->title); ?></td>
                                    <td valign="top"><a href="<?php echo e(@$item->demo_url); ?>" target="_blank" class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('lang.click_here'); ?></a></td>
                                    <td valign="top"><img src="<?php echo e(asset(@$item->icon)); ?>" class="content_list_wh_40"></td>
                                    <td valign="top"><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$item->Reg_total); ?></td>
                                    <td aign="top"><a target="_blank" href="<?php echo e(route('user.profile',@$item->user->username)); ?>"><?php echo e(@$item->user->username); ?></a></td>
                                    <td valign="top"><a href="" data-toggle="modal" data-target="#FeedBack<?php echo e($item->id); ?>"  class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('lang.feedback'); ?></a></td>
                                    <td valign="top">
                                                <?php if(@$item->status == 2): ?>
                                                <?php echo app('translator')->get('lang.soft_rejected'); ?>
                                                <?php endif; ?>   
                                                <?php if(@$item->status == 0): ?>
                                                <?php echo app('translator')->get('lang.pending'); ?>
                                                <?php endif; ?>
                                                <?php if(@$item->status == 3): ?>
                                                <?php echo app('translator')->get('lang.hard_rejected'); ?>
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
                                                <a class="dropdown-item" href="<?php echo e(route('admin.itemApprove',@$item->id)); ?>"><?php echo app('translator')->get('lang.approve'); ?></a> 
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal<?php echo e(@$item->id); ?>"  href=""><?php echo app('translator')->get('lang.delete'); ?></a>                                                 
                                                
                                                   
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                  <div class="modal fade admin-query Feedb" id="FeedBack<?php echo e(@$item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.feedback'); ?> </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?php echo e(route('admin.item_feedback',@$item->id)); ?>" method="POST" id="Feedback_form">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row mt-40 main_color">
                                                        <div class="col-lg-12">
                                                                <label><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.message'); ?>   <span class="text-red">*</span></label>
                                                            <div class="input-effect">
                                                                <small><?php echo @$item->user_msg; ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-40">
                                                            <div class="col-lg-12">
                                                                <label><?php echo app('translator')->get('lang.subject'); ?>   <span class="text-red">*</span></label>
                                                                <div class="input-effect">
                                                                    <input class="primary-input form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" name="subject" id="subject">
                                                                    <span class="invalid-feedback dm_display_block mt-0"  role="alert"><strong id="subject_error"></strong></span>
                                                                    <span class="focus-border"></span>
                                                                    <?php if($errors->has('subject')): ?>
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong><?php echo e($errors->first('subject')); ?></strong>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row mt-40">
                                                        <div class="col-lg-12">
                                                                <label><?php echo app('translator')->get('lang.reply'); ?>   <span class="text-red">*</span></label>
                                                            <div class="input-effect">
                                                                <textarea id="summernote" class="primary-input summernote form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" name="description" id="" cols="30" rows="10" data-sample-short><?php echo e(old('description')); ?></textarea>
                    
                                                                <span class="focus-border"></span>
                                                                <?php if($errors->has('description')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-40">
                                                        <div class="col-lg-12">
                                                                <label><?php echo app('translator')->get('lang.status'); ?>   <span class="text-red">*</span></label>
                                                            <div class="input-effect">
                                                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>" name="status">
                                                                            <option data-display="<?php echo app('translator')->get('lang.status'); ?> *" value=""><?php echo app('translator')->get('lang.status'); ?> *</option> 
                                                                            <option value="1" <?php echo e(isset($data['edit'])? $data['edit']->status == 1?'selected':'': 'selected'); ?> ><?php echo app('translator')->get('lang.approve'); ?></option> 
                                                                            <option value="2" <?php echo e(isset($data['edit'])? $data['edit']->status == 2?'selected':'': ''); ?>><?php echo app('translator')->get('soft'); ?> <?php echo app('translator')->get('lang.reject'); ?></option> 
                                                                            <option value="3" <?php echo e(isset($data['edit'])? $data['edit']->status == 2?'selected':'': ''); ?>><?php echo app('translator')->get('hard'); ?> <?php echo app('translator')->get('lang.reject'); ?></option> 
                                                                        </select>
                                                                        <span class="focus-border"></span>
                                                                        <?php if($errors->has('status')): ?>
                                                                        <span class="invalid-feedback " role="alert">
                                                                            <strong><?php echo e($errors->first('status')); ?></strong>
                                                                        </span>
                                                                        <?php endif; ?>
                                                            </div>
                                                        </div>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
            </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
   
<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/product/pending_product.blade.php ENDPATH**/ ?>