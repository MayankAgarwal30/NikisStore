

<?php $__env->startPush('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/item.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/cart.css">
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
                                <h2><?php echo app('translator')->get('lang.shopping_cart'); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-area end -->
        <!-- main_cart-area-start -->
        <div class="main_cart-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12">
                        <div class="row">
                            <div class="col-xl-8 col-12 col-lg-8">
                                <div class="cart_description" >
                                    <div class="cart_description_heading">
                                        <?php if(@count(Cart::content()) > 0 ): ?>

                                        <?php
                                            $total_tax=0.00;
                                        ?>
                                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                           $total_tax+= @$item->options['tax'];
                                        ?>
                                        <div class="single_cart_description gray-bg">
                                            <div class="single_cart_left d-flex justify-content-between">
                                                <div class="card_inner d-flex align-items-center">
                                                    <div class="image">
                                                        <img src="<?php echo e(asset(@$item->options['icon'])); ?>" alt="">
                                                    </div>
                                                    <div class="single_cart_heading">
                                                    <h3><?php echo e($item->name); ?></h3>
                                                    <p>
                                                        <span><?php echo app('translator')->get('lang.item_by'); ?> <a href="<?php echo e(route('user.profile',$item->options['username'])); ?>"><?php echo e(@$item->options['username']); ?></a></span> 
                                                        <span><?php echo app('translator')->get('lang.License'); ?>: <a>
                                                            <?php if(@$item->options['license_type']== 1): ?>
                                                                <?php echo app('translator')->get('lang.Regular'); ?>
                                                            <?php elseif(@$item->options['license_type']== 2): ?>
                                                                <?php echo app('translator')->get('lang.extended'); ?>
                                                            <?php else: ?>
                                                                <?php echo app('translator')->get('lang.commercial'); ?>
                                                            <?php endif; ?>
                                                            <?php echo app('translator')->get('lang.License'); ?></a></span>
                                                            <br>
                                                         <span><?php echo app('translator')->get('lang.support'); ?>: <a class="support_time<?php echo e(@$item->id); ?>"><?php echo e(@$item->options['support_time'] == 1? '06':'12'); ?> <?php echo app('translator')->get('lang.months'); ?> <?php echo app('translator')->get('lang.support'); ?></a></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card_des_prise d-flex align-items-center justify-content-center">
                                                 <span class="totalP<?php echo e($item->id); ?>"><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(number_format(@$item->price,2)); ?></span>
                                                    <a  onclick="deleItem(`<?php echo e($item->id); ?>`)"><i class="ti-close"></i></a>
                                                    <a id="delete-form-<?php echo e($item->id); ?>" href="<?php echo e(route('CartDelete',@$item->rowId)); ?>" class="dm_display_none"></a>
                                                </div>
                                                <input type="number" hidden value="<?php echo e(@$item->price); ?>" class="total<?php echo e(@$item->id); ?>">
                                                <input type="text" hidden value="<?php echo e(@$item->rowId); ?>" class="rowId<?php echo e(@$item->id); ?>">
                                                <input type="number" hidden value="<?php echo e(@$item->options['Extd_percent']); ?>" class="Extd_percent">
                                                <input type="number" hidden value="<?php echo e(@$item->options['support_charge']); ?>" class="support_charge<?php echo e(@$item->id); ?>">
                                            </div>
                                            <div class="check-here d-none">
                                                <label>
                                                    <input id="support<?php echo e(@$item->id); ?>" class="support" type="checkbox" <?php echo e(@$item->options['support_time'] == 1? '':'checked'); ?>  onclick="ChangeItem(`<?php echo e(@$item->id); ?>`)">
                                                    <span class="checkmark"><?php echo app('translator')->get('lang.extent_support_time'); ?> +@ <?php echo e(@$item->options['support_charge']? number_format(@$item->options['support_charge'] ,2) : @$item->price*$item->options['Extd_percent']); ?> <span><?php echo app('translator')->get('lang.save'); ?> $23.50</span></span>
                                                </label> 
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <?php else: ?>
                                          <h4><?php echo app('translator')->get('lang.your_shopping_cart_is_empty'); ?> <?php echo e(@count($data['cart_item'])); ?></h4>
                                        <?php endif; ?>
                                    </div>
                                    <div class="cart_button_area d-flex justify-content-between align-items-center">
                                    <a href="<?php echo e(url('/')); ?>" class="boxed-btn-gray"><?php echo app('translator')->get('lang.continue_shopping'); ?></a>
                                        <?php if(@count(Cart::content()) > 0 ): ?>
                                            <a href="#" onclick="deleItemAll()" class="boxed-btn"><?php echo app('translator')->get('lang.empty_cart'); ?></a>
                                            <a id="delete-form-lol" href="<?php echo e(route('CartDeleteAll')); ?>" class="dm_display_none"></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(@count(Cart::content()) > 0 ): ?>
                           <input type="number" hidden id="subtotal" value="<?php echo e(Cart::subtotal()); ?>">
                            <div class="col-xl-4 col-lg-4">
                                    
                                <div class="total_cart_area">
                                        <div class="order_input_field">
                                            <form action="" id="couponForm">
                                                <input type="text" placeholder="<?php echo app('translator')->get('lang.enter_coupon_code'); ?>" id="coupon_code" name="coupon_code">
                                                <?php if(@count(Cart::content()) > 0 ): ?>
                                                        <button id="CouponCode" type="submit"><?php echo app('translator')->get('lang.apply'); ?></button>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        
                                    <span><?php echo app('translator')->get('lang.your_cart_total_is'); ?> </span>
                                    <h2 id="copon_applied" class="text-success"></h2>
                                        <h1 class="totalPrice"><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(Cart::subtotal()); ?></h1>
                                        <?php if($total_tax>0): ?>
                                            <h3>Tax= <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e($total_tax); ?></h3>
                                        <?php endif; ?>
                                        
                                                </form>
                                                <?php 
                                                    @$is_address = Auth::user()->profile;
                                                    ?> 
                                                    <?php if( !empty($is_address->first_name) && 
                                                    !empty($is_address->country_id) && 
                                                    !empty($is_address->state_id) && 
                                                    !empty($is_address->city_id) && 
                                                    !empty($is_address->zipcode) &&
                                                    !empty($is_address->address) ): ?>
                                                    <a href="<?php echo e(route('customer.payment')); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.secure_checkout'); ?></a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('customer.cheackout')); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.secure_checkout'); ?></a>
                                                    <?php endif; ?>
                                    <?php if($total_tax>0): ?>
                                        <p><?php echo app('translator')->get('lang.price_displayed_excludes_sales_tax'); ?></p>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                         <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main_cart-area-end -->
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/delete.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/item_preview.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/cart/cart.blade.php ENDPATH**/ ?>