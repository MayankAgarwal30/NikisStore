
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/item.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/checkout.css">

<?php $__env->stopPush(); ?>
<?php
   $infix_general_settings = app('infix_general_settings');
?>
<?php $__env->startSection('content'); ?>
<!-- banner-area start -->
<div class="banner-area4">
    <div class="banner-area-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="banner-info">
                        <h2><?php echo app('translator')->get('lang.Checkout'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner-area end -->
<!-- checkout_area start -->
<div class="checkout_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                     <form action="<?php echo e(route('customer.store')); ?>" class="checkout-form" id="checkout_store" method="POST">
                        <?php echo csrf_field(); ?>
                            <h4><?php echo app('translator')->get('lang.billing_details'); ?></h4>
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <label for="name"><?php echo app('translator')->get('lang.first_name'); ?> <span>*</span></label>
                                    <input name="first_name" type="text" placeholder="Enter First name" value="<?php echo e(isset($data['user'])? $data['user']->profile->first_name:old('first_name')); ?>">
                                    <?php if($errors->has('first_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <label for="name"><?php echo app('translator')->get('lang.last_name'); ?><span>*</span></label>
                                    <input name="last_name" type="text" placeholder="Enter Last name" value="<?php echo e(isset($data['user'])? $data['user']->profile->last_name:old('last_name')); ?>">
                                    <?php if($errors->has('last_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <label for="name"><?php echo app('translator')->get('lang.company_name'); ?></label>
                                    <input name="company_name" type="text" placeholder="Enter company name" value="<?php echo e(isset($data['user'])? $data['user']->profile->company_name:old('company_name')); ?>">
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <label for="name"><?php echo app('translator')->get('lang.address'); ?><span>*</span></label>
                                    <input name="address" type="text" placeholder="Enter address" value="<?php echo e(isset($data['user'])? $data['user']->profile->address:old('address')); ?>"> 
                                    <?php if($errors->has('address')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                                <div class="col-xl-6 col-md-6 city_id">
                                    <label for="name"><?php echo app('translator')->get('lang.country_name'); ?><span>*</span></label>
                                    <select class="wide customselect country"
                                         name="country_id" id="country">
                                        <option data-display="Country*">
                                            <?php echo app('translator')->get('lang.select'); ?></option>
                                        <?php $__currentLoopData = $data['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                                        
                                        <option value="<?php echo e($item->id); ?>" <?php echo e(@$data['user']->profile->country_id == $item->id ?'selected':''); ?>><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('country_id')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('country_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <label for="name"><?php echo app('translator')->get('lang.state'); ?>/<?php echo app('translator')->get('lang.region'); ?> <span></span></label>
                                  
                                    <input type="text" placeholder="<?php echo app('translator')->get('lang.state'); ?>/<?php echo app('translator')->get('lang.region'); ?>" name="state_id" value="<?php echo e(isset($data['user'])? $data['user']->profile->state_id:old('state_id')); ?>">
                                         
                                    <?php if($errors->has('state_id')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('state_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-xl-6 col-md-6 city">
                                       
                                    <label for="name"><?php echo app('translator')->get('lang.city'); ?></label>
                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.city'); ?>" name="city_id" value="<?php echo e(isset($data['user'])? $data['user']->profile->city_id:old('city_id')); ?>">
                                         
                                    <?php if($errors->has('city_id')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('city_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                              
                                <div class="col-xl-6 col-md-6">
                                    <label for="name"><?php echo app('translator')->get('lang.zip_postal_code'); ?><span></span></label>
                                    <input type="text" placeholder="<?php echo app('translator')->get('lang.zip_postal_code'); ?>" name="zipcode" value="<?php echo e(isset($data['user'])? $data['user']->profile->zipcode:old('zipcode')); ?>">
                                        <?php if($errors->has('zipcode')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('zipcode')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="check-out-btn">
                                <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.procced_to_payment'); ?></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="your_order">
                            <div class="order_header">
                                <h4><?php echo app('translator')->get('lang.your_order'); ?></h4>
                                
                            </div>
                           
                            <div class="products_total_list ">
                                <div class="products_total_list-heder d-flex justify-content-between">
                                    <span><?php echo app('translator')->get('lang.product'); ?></span>
                                    <span><?php echo app('translator')->get('lang.total'); ?></span>
                                </div>
                                <ul>
                                    <?php if(@count(Cart::content()) > 0 ): ?>
                                        <?php
                                        $total_tax=0.00;
                                        ?>
                                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                             $total_tax+= $item->options['tax'];
                                         ?>
                                            <li>
                                                <span><?php echo e(@$item->name); ?></span>
                                                <span><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$item->price); ?></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="products_list_bottom">
                                <span><?php echo app('translator')->get('lang.total'); ?></span>
                                <span class="prise_tag">
                                    $<?php echo e(Cart::subtotal()); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<script src="<?php echo e(asset('public/frontend/js/')); ?>/checkout.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/cart/checkout.blade.php ENDPATH**/ ?>