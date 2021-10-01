
<?php $__env->startPush('css'); ?>


    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/refund_req.css">
  
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!-- banner-area start -->
    <div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">  
                            <h2><?php echo app('translator')->get('lang.request_refund'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
    <!-- pricing_area_start -->
    <div class="pricing_area section-padding">
        <div class="container">
          
            <div class="row justify-content-center">
                
                <div class="col-xl-8 col-lg-8">
                    <?php if(count($data['item_order']) > 0): ?>                     
                <form action="<?php echo e(route('user.refundStore')); ?>" class="checkout-form" id="refund_store" method="POST" enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                        <div class="col-xl-12 col-md-12 ">
                            <label for="name"><?php echo app('translator')->get('lang.choose'); ?> <?php echo app('translator')->get('lang.your'); ?> <?php echo app('translator')->get('lang.purchase'); ?> *</label>
                            <select class="wide state customselect "
                                 name="item_id">
                                <option data-display="" value=""><?php echo app('translator')->get('lang.select'); ?></option>
                               <?php $__currentLoopData = $data['item_order']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php
                                if (in_array($item->order_id, $data['refunds_list']))
                                    {
                                    continue;
                                    }
                                ?>  
                                   <option value="<?php echo e(@$item->order_id); ?>" <?php echo e(@$item->item_id== old('item_id')); ?>><?php echo e(@$item->Item->title); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select><br>
                            <small><?php echo app('translator')->get('lang.submit_separate'); ?></small>
                            <?php if($errors->has('item_id')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('item_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-12 col-md-12 mt-4">
                            <label for="name"><?php echo app('translator')->get('lang.main_reason'); ?> *</label>
                            <select class="wide state customselect "
                                 name="ref_id" id="state">
                                <option data-display="Select" value=""><?php echo app('translator')->get('lang.select'); ?></option> 
                                <?php $__currentLoopData = $data['refund']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e(@$item->id); ?>" <?php echo e(@$item->item_id== old('ref_id')); ?>><?php echo e(@$item->name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select><br>
                            <small><?php echo app('translator')->get('lang.reason_request'); ?></small>
                            <?php if($errors->has('ref_id')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('ref_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-12 col-md-12 mt-4 ml-1">
                                <label for="name"><?php echo app('translator')->get('lang.describe_details'); ?> *</label><br>
                                <textarea name="refund_details" id="editor1" ></textarea>

                                <?php if($errors->has('refund_details')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('refund_details')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-12 col-md-12 mt-4 mb-5 text-right">
                                <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.send_request'); ?></button>
                        </div>
                    </form>
                    <?php else: ?>

                    <div class="col-xl-12 col-md-12 mb-5 text-center">
                            <h3><?php echo app('translator')->get('lang.dont_item'); ?> <?php echo app('translator')->get('lang.purchase'); ?></h3>
                         </div>
                    <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
    <!-- pricing_area_end -->
 <?php $__env->stopSection(); ?>
 <?php $__env->startPush('js'); ?>

 <script src="<?php echo e(asset('public/frontend/js/')); ?>/refund.js"></script>
 <script src="<?php echo e(asset('public/frontend/js/')); ?>/frontend_editor.js"></script>

 <?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/refund_request.blade.php ENDPATH**/ ?>