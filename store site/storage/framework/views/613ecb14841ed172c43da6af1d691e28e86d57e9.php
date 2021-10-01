
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/payment_selection.css">
<?php
   $infix_general_settings = app('infix_general_settings');
   $system_logo = app('infix_background_settings');
   $system_logo = $system_logo[0];
?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/payment.css">
   <!-- banner-area start -->
   <div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">
                            <h2><?php echo app('translator')->get('lang.payment'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
    <!-- checkout_area start -->
    <div class="payment_area section-padding">
        <div class="container">
            <div class="row"> 
                <div class="col-xl-10 offset-xl-1">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="biling_address gray-bg">
                                <div class="biling-header d-flex justify-content-between align-items-center">
                                    <h4><?php echo app('translator')->get('lang.billing_details'); ?></h4>
                                   <a href="<?php echo e(route('customer.cheackout')); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                </div>
                                <div class="biling_body_content">
                                    <p><?php echo e(@$data['user']->profile->first_name); ?> <?php echo e(@$data['user']->profile->last_name); ?></p>
                                    <p><?php echo e(@$data['user']->profile->address); ?></p>
                                    <p><?php echo e(@$data['user']->profile->city->name); ?> - <?php echo e(@$data['user']->profile->zipcode); ?> </p>
                                    <p> <?php echo e(@$data['user']->profile->state->name); ?> , <?php echo e(@$data['user']->profile->country->name); ?> </p>
                                </div>
                            </div>
                            <div class="select_payment_method">
                                <div class="input_box_tittle">
                                        <h4><?php echo app('translator')->get('lang.payment_method'); ?></h4>
                                        
                                    </div>
                                    
                                    <div class="privaci_polecy_area section-padding checkout_area ">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-12">
                                                    <div class="deposite_payment_wrapper customer_payment_wrapper">
                                                        
                                                        <?php if( in_array('Stripe',$payment_methods)): ?>
                                                            <!-- single_deposite_item  -->
                                                            <div class="single_deposite_item">
                                                                <div class="deposite_header text-center"><?php echo e(__('Stripe')); ?></div>
                                                                <div class="deposite_button text-center"> 
                                                                    <form action="<?php echo e(route('user.ItemPayment')); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <script
                                                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                                                data-key="<?php echo e(env('STRIPE_KEY')); ?>"
                                                                                data-name="Stripe Payment"
                                                                                data-image=<?php echo e(asset(@$system_logo->image)); ?>

                                                                                data-locale="auto"
                                                                                data-currency="usd">
                                                                        </script>
                                                                        <input hidden value="<?php echo e(convert_to_usd(Cart::subtotal())); ?>"  readonly="readonly" type="text" id="amount" name="amount">
                                                                        <div class="mt-5 text-center">
                                                                            <button href="#" class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.make'); ?> <?php echo app('translator')->get('lang.payment'); ?></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if( in_array('PayPal',$payment_methods)): ?>
                                                            <!-- single_deposite_item  -->
                                                            <div class="single_deposite_item">
                                                                <div class="deposite_header text-center">
                                                                    <?php echo e(__('Paypal')); ?>

                                                                </div>
                                                                <div class="deposite_button text-center">
                                                                    
                                                                    <form action="<?php echo e(route('paypal_payment')); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input hidden value="<?php echo e(convert_to_usd(Cart::subtotal())); ?>"  readonly="readonly" type="text" id="amount" name="amount">
                                                                        <div class="mt-5 text-center">
                                                                            <input type="submit" name="submit" style="border: aliceblue;"  class="boxed-btn" value="<?php echo app('translator')->get('lang.make'); ?> <?php echo app('translator')->get('lang.payment'); ?>">
                                                                            
                                                                        </div>
                                                                    </form>
                                                                    
    
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if( in_array('Razorpay',$payment_methods)): ?>
                                                            <!-- single_deposite_item  -->
                                                            <div class="single_deposite_item">
                                                                <div class="deposite_header text-center">
                                                                    <?php echo e(__('Razorpay')); ?>

                                                                </div>
                                                                <div class="deposite_button text-center"> 
                                                                
                                                                    <form action="<?php echo e(route('user.payment.razer')); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>                                                        
                                                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                                            data-key="<?php echo e(env('RAZOR_KEY')); ?>"
                                                                            data-amount=<?php echo e(convert_to_inr(Cart::subtotal())*100); ?>

                                                                            data-buttontext=""
                                                                            data-name="<?php echo e(str_replace('_', ' ',config('app.name') )); ?>"
                                                                            data-description="Cart Payment"
                                                                            data-image="<?php echo e(asset(@$system_logo->image)); ?>"
                                                                            data-prefill.name= <?php echo e(@Auth::user()->username); ?>

                                                                            data-prefill.email= <?php echo e(@Auth::user()->email); ?>

                                                                            data-theme.color="#ff7529">
                                                                        </script>
                                                                        <div class="mt-5 text-center">
                                                                            <button href="#" class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.make'); ?> <?php echo app('translator')->get('lang.payment'); ?></button>
                                                                        </div>
                                                                    </form> 
                                                                </div>
                                                            </div>
                                                        <?php endif; ?> 
                                                        
                                                        <!-- single_deposite_item  -->
                                                        <div class="single_deposite_item">
                                                            <div class="deposite_header text-center">
                                                                <?php echo e(__('InfixHub Credit')); ?>

                                                            </div>
                                                            <div class="deposite_button text-center">
                                                                <div class="mt-5 text-center mb-5">
                                                                    <a href="#" data-toggle="modal" data-target="#MakePaymentFromCredit" class="boxed-btn">Make Payment</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div  class="modal fade " id="MakePaymentFromCredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">My Account</h5>
                                                                </div>
                                                                
                                                                <form action="<?php echo e(route('user.payment_main_balance')); ?>" id="infix_payment_form1" method="POST" name="payment_main_balance" >
                                                                    <?php echo csrf_field(); ?> 
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-xl-6 col-md-6">
                                                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.my'); ?> <?php echo app('translator')->get('lang.balance'); ?></label>
                                                                                <input type="text" class="bank_deposit_input"  placeholder="Bank Name" name="bank_name" value="<?php echo e(@Auth::user()->balance->amount); ?>" readonly>
                                                                            </div>
                                                                            <div class="col-xl-6 col-md-6">
                                                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.your'); ?> <?php echo app('translator')->get('lang.item'); ?> <?php echo app('translator')->get('lang.price'); ?> </label>
                                                                                <input type="text"  name="amount" class="bank_deposit_input"  placeholder="Name of account owner" value="<?php echo e(Cart::subtotal()); ?>" readonly>
                                                                            </div> 
                                                                        </div>
                                                                        <?php if( @Auth::user()->balance->amount > Cart::subtotal()): ?> 
                                                                        <div class="row">
                                                                            <div class="col-lg-12">                                                                                
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <?php endif; ?>
 
                                                                    </div>
                                                                    <div class="modal-footer d-flex justify-content-between">
                                                                        <button type="button" class="boxed-btn-white " data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                                        
                                                                        <?php if( @Auth::user()->balance->amount > Cart::subtotal()): ?> 
                                                                            <button  class="button boxed-btn"   type="submit">
                                                                                <?php echo app('translator')->get('lang.pay'); ?> 
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <a class="button boxed-btn" href="<?php echo e(route('user.deposit',@Auth::user()->username)); ?>"><?php echo e(__('Fund Deposit')); ?></a>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                
                            </div>
                        </div>
                        <div class="col-xl-3">
                        <form action="<?php echo e(route('customer.payment_store')); ?>" method="POST">                                        
                                <?php echo csrf_field(); ?>
                            <div class="your_order mt-lg-2">
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
                                            <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(Cart::subtotal()); ?>

                                    </span>
                                
                                </div>
                                <div class="mt-3 text-center">
                                    <?php if($total_tax>0): ?>
                                    <p><?php echo app('translator')->get('lang.price_displayed_excludes_sales_tax'); ?></p>
                                   <?php endif; ?>
                                </div>
                               
                            </div>
                            <div class="mt-5 text-center">
                               
                                
                            </div>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout_area end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/frontend/js/')); ?>/checkout.js"></script>
    <script src="<?php echo e(asset('public/frontend/js/')); ?>/payment_section.js"></script>
 
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/cart/payment.blade.php ENDPATH**/ ?>