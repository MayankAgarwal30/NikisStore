
<?php $__env->startPush('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/dashboard.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/payment_selection.css">

<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
<script src="<?php echo e(asset('/')); ?>public/frontend/js/jquery-3.3.1.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

      <!-- banner-area start -->
    <div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">
                            <h2><?php echo app('translator')->get('lang.fund_deposit'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
    <!-- payment area start -->
    <div class="privaci_polecy_area section-padding checkout_area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="deposite_payment_wrapper">
                        <!-- single_deposite_item  -->
                        <?php if( in_array('Stripe',$data)): ?>
                            <div class="single_deposite_item">
                                <div class="deposite_header text-center">
                                    <?php echo e(__('Stripe')); ?>

                                </div>
                                <div class="deposite_button text-center"> 
                                    <form action="<?php echo e(route('user.stripe_deposit')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="<?php echo e(env('STRIPE_KEY')); ?>"
                                            data-name="Stripe Payment"
                                            data-image=<?php echo e(asset(GeneralSetting()->logo)); ?>

                                            data-locale="auto"
                                            data-currency="usd">
                                        </script>
                                        <input hidden value="<?php echo e(Session::get('deposit_amount')); ?>"  readonly="readonly" type="text" id="amount" name="amount">
                                        <div class="mt-5 text-center mb-5">
                                            <button href="#" class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.make'); ?> <?php echo app('translator')->get('lang.payment'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( in_array('PayPal',$data)): ?>
                            <!-- single_deposite_item  -->
                            <div class="single_deposite_item">
                                <div class="deposite_header text-center">
                                    <?php echo e(__('Paypal')); ?>

                                </div>
                                <div class="deposite_button text-center">
                                    <form action="<?php echo e(route('paypal_deposit')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input hidden value="<?php echo e(Session::get('deposit_amount')); ?>"  readonly="readonly" type="text" id="amount" name="amount">
                                        <div class="mt-5 text-center mb-5">
                                            
                                            <input type="submit" name="submit" style="border: aliceblue;"  class="boxed-btn" value="<?php echo app('translator')->get('lang.make'); ?> <?php echo app('translator')->get('lang.payment'); ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( in_array('Razorpay',$data)): ?> 
                            <!-- single_deposite_item  -->
                            <div class="single_deposite_item">
                                <div class="deposite_header text-center">
                                    Razorpay
                                </div>
                                <div class="deposite_button text-center"> 
                                    <form action="<?php echo e(route('user.deposit_payment.razer')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>                                                       
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                data-key="<?php echo e(env('RAZOR_KEY')); ?>"
                                                data-amount=<?php echo e((int)Session::get('deposit_amount')*100); ?>

                                                data-buttontext=""
                                                data-name="<?php echo e(str_replace('_', ' ',config('app.name') )); ?>"
                                                data-description="Cart Payment"
                                                data-image="<?php echo e(asset(GeneralSetting()->logo)); ?>"
                                                data-prefill.name= <?php echo e(@Auth::user()->username); ?>

                                                data-prefill.email= <?php echo e(@Auth::user()->email); ?>

                                                data-theme.color="#531191">
                                        </script>
                                        <div class="mt-5 text-center mb-5">
                                                <button href="#" class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.make'); ?> <?php echo app('translator')->get('lang.payment'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( in_array('Bank',$data)): ?> 
                            <!-- single_deposite_item  -->
                            <div class="single_deposite_item">
                                <div class="deposite_header text-center">
                                    Bank
                                </div>
                                <div class="deposite_button text-center">
                                    <div class="mt-5 text-center mb-5">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="boxed-btn">Make Payment</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div  class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Bank Payment </h5>
                                </div>
                                <form name="bank_payment" action=" <?php echo e(route('user.bank_payment')); ?> " class="single_account-form" method="POST" id=""  onsubmit="return validateForm()" >
                                    <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.bank_name'); ?> <span>*</span></label>
                                                <input type="text" class="bank_deposit_input"  placeholder="Bank Name" name="bank_name" value="<?php echo e(@old('bank_name')); ?>" >
                                                <span class="invalid-feedback" role="alert" id="bank_name"></span>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.name_of_account_owner'); ?> <span>*</span></label>
                                                <input type="text"  name="owner_name" class="bank_deposit_input"  placeholder="Name of account owner" value="<?php echo e(@old('owner_name')); ?>">
                                                <span class="invalid-feedback" role="alert" id="owner_name"></span>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.account_no'); ?> <span>*</span></label>
                                                <input type="text" class="bank_deposit_input"  placeholder="Account number" name="account_number" value="<?php echo e(@old('account_number')); ?>" >                                             
                                                <span class="invalid-feedback" role="alert" id="account_number"></span> 
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.amount'); ?> <span>*</span></label>
                                                <input type="number" step="any" min="0"  name="amount" class="bank_deposit_input"  placeholder="Amount"
                                                 value="<?php echo e(Session::get('deposit_amount')); ?>">
                                                <span class="invalid-feedback" role="alert" id="amount_validation"></span>
                                            </div>
                                        </div>
                                            <?php
                                                $bank_setup=explode(',',$payment_methods->where('id',4)->first()->env_terms);
                                            ?>
                                            <fieldset>
                                                <legend>Bank Account Info</legend>
                                                    <table class="table">
                                                        <?php $__currentLoopData = $bank_setup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                            <?php
                                                                $b_setup=explode(':',$setup);
                                                            ?>
                                                            <tr>
                                                                <td><strong><?php echo e(str_replace('_',' ',@$b_setup[0])); ?></strong> </td>
                                                                <td><?php echo e(@$b_setup[1]); ?></td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </table>
                                            </fieldset>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="boxed-btn-white " data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                        <button class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.make'); ?> <?php echo app('translator')->get('lang.payment'); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
    
    <!-- payment area end -->
   
 <?php $__env->stopSection(); ?>
 <?php $__env->startPush('js'); ?>
 <script src="<?php echo e(asset('public/frontend/js/')); ?>/fund_add.js"></script>
 <script src="https://checkout.stripe.com/checkout.js"></script>
 <script src="<?php echo e(asset('/')); ?>public/frontend/js/v_4.4_jquery.form.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/payment_section.js"></script>


 <?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/payment/payment_selection.blade.php ENDPATH**/ ?>