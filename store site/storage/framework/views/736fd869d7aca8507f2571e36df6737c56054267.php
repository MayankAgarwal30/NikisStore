
<?php $__env->startPush('css'); ?> 
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/payment_complete.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php
   $infix_general_settings =app('infix_general_settings');
?>
           <!-- banner-area start -->
           <div class="banner-area4">
            <div class="banner-area-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="banner-info">
                                <div class="payment_comfirmation_header">
                        <div class="payment_confirm_header">
                            <div class="payment_logo">
                                <img src="<?php echo e(asset('public/uploads/img/cart/write2.png')); ?>" alt="">
                            </div>
                        </div>
                        <div class="conformation-title">
                                <h2><?php echo app('translator')->get('lang.payment_complete'); ?>!</h2>
                                <p><?php echo app('translator')->get('lang.an_confirmation_email_is_coming_your_way'); ?> <br>
                                    <?php echo app('translator')->get('lang.this_item_is_now_available_on_your'); ?> 
                                    <?php if(Auth::user()->role_id == 4): ?>
                                    <a href="<?php echo e(route('author.download',@Auth::user()->id)); ?>"><?php echo app('translator')->get('lang.download'); ?> <?php echo app('translator')->get('lang.page'); ?></a> 
                                    <?php endif; ?>
                                    <?php if(Auth::user()->role_id == 5): ?>
                                    <a href="<?php echo e(url('downloads/'.@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.download'); ?> <?php echo app('translator')->get('lang.page'); ?></a> 
                                    
                                    <?php endif; ?>

                                </p>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-area end -->

    <!-- payment_confirm_start    -->
    <div class="payment_confim_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    
                    <div class="payment_confirm_prise_wrap gray-bg">
                        <div class="payment_confirm_prise_header d-flex justify-content-between align-items-center">
                            <h4><?php echo app('translator')->get('lang.your_order'); ?></h4>
                           
                        </div>

                        <?php $__currentLoopData = $data['order']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $value->itemOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <?php
                             $obj = json_decode(@$item->item, true);
                           ?> 

                            <div class="payment_wrap_body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="single-confirmation d-flex align-items-center">
                                            <div class="payment_wrap_thumb">
                                                <img src="<?php echo e(asset(@$obj['icon'])); ?>" alt="" width="80" height="80">
                                            </div>
                                            
                                            <div class="payment_info">
                                                    <h5> <a href="<?php echo e(route('singleProduct',[str_replace(' ', '-',$item->Item->title),$item->Item->id])); ?>"><?php echo e(@$item->Item->title); ?></a> </h5>
                                                    <p><?php echo app('translator')->get('lang.item_by'); ?> <a href="#"><?php echo e(@$obj['username']); ?></a> </p>
                                                    <p><?php echo app('translator')->get('lang.license'); ?>: <a href="#"> 
                                                        
                                                        <?php if(@$obj['license_type']== 1): ?>
                                                                <?php echo app('translator')->get('lang.Regular'); ?>
                                                            <?php elseif(@$obj['license_type']== 2): ?>
                                                                <?php echo app('translator')->get('lang.extended'); ?>
                                                            <?php else: ?>
                                                                <?php echo app('translator')->get('lang.commercial'); ?>
                                                            <?php endif; ?>
                                                            <?php echo app('translator')->get('lang.License'); ?></a></span>
                                                    </a> </p>
                                                    <p><?php echo app('translator')->get('lang.Support'); ?>: <a href="#"> <?php echo e(@$obj['support_time'] == 1?'6 Months':'12 Mohths'); ?> <?php echo app('translator')->get('lang.license'); ?></a> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-5">
                                        <div class="payment_btn_prise d-flex align-items-center">
                                            <?php if(Auth::user()->role_id == 4): ?>
                                                <a class="boxed-btn" href="<?php echo e(route('user.ItemDownloadAll',@$item->order_id)); ?>"><?php echo app('translator')->get('lang.download'); ?></a> 
                                            <?php endif; ?>
                                            <?php if(Auth::user()->role_id == 5): ?>
                                                <a class="boxed-btn" href="<?php echo e(route('user.ItemDownloadAll',@$item->order_id)); ?>"><?php echo app('translator')->get('lang.download'); ?></a> 
                                            <?php endif; ?>
                                             
                                            <div class="net_prise">
                                                <span><?php echo app('translator')->get('lang.price'); ?></span>
                                                <h3><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$item->subtotal); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/cart/paymentComplete.blade.php ENDPATH**/ ?>