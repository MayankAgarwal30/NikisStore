
<?php $__env->startPush('css'); ?>

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
    <!-- privaci_polecy_area start -->
    <div class="privaci_polecy_area section-padding checkout_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-12">
                        <div class="single_account_wrap white-bg">
                            <?php if($user->profile->first_name == "" || $user->profile->last_name == "" || $user->profile->company_name == "" || $user->profile->mobile == "" || $user->profile->address == "" || $user->profile->country_id == "" || $user->profile->state_id == "" || $user->profile->city_id == "" || $user->profile->zipcode == ""): ?> 
                                <h4><?php echo app('translator')->get('lang.Billing'); ?> <?php echo app('translator')->get('lang.Information'); ?></h4>
                                <p><?php echo app('translator')->get('lang.welcome_message_for_vendor'); ?>.</p>
                            <?php endif; ?>
                                <div class="fund_add_form_div" >
                                        <span id="alert-danger" class="alert alert-danger d-none"></span>
                                    </div>
                                  <form action="<?php echo e(route('user.depositStore')); ?>" class="single_account-form checkout-form" method="POST"  >
                                    <?php echo csrf_field(); ?>
                                    <?php if($user->profile->first_name == "" || $user->profile->last_name == "" || $user->profile->company_name == "" || $user->profile->mobile == "" || $user->profile->address == "" || $user->profile->country_id == "" || $user->profile->state_id == "" || $user->profile->city_id == "" || $user->profile->zipcode == ""): ?> 
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <label for="first_name"> <?php echo app('translator')->get('lang.first_name'); ?> <span>*</span></label>
                                            <input type="text" placeholder="First name" name="first_name" value="<?php echo e(isset($user)? $user->profile->first_name:old('first_name')); ?>">
                                            <?php if($errors->has('first_name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="last_name"><?php echo app('translator')->get('lang.last_name'); ?> *</label>
                                            <input type="text" placeholder="Last name" name="last_name" value="<?php echo e(isset($user)? $user->profile->last_name:old('last_name')); ?>">
                                            <?php if($errors->has('last_name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <label for="compnay"><?php echo app('translator')->get('lang.company'); ?> *</label>
                                            <input type="text" placeholder="Company name" name="company_name" value="<?php echo e(isset($user)? $user->profile->company_name:old('company_name')); ?>">
                                            <?php if($errors->has('company_name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('company_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="phone"><?php echo app('translator')->get('lang.phone'); ?> *</label>
                                            <input type="text" placeholder="Phone number" name="mobile" value="<?php echo e(isset($user)? $user->profile->mobile:old('mobile')); ?>">
                                            <?php if($errors->has('mobile')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('mobile')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="email"><?php echo app('translator')->get('lang.email'); ?> *</label>
                                            <input type="email" value="<?php echo e(@$user->email? @$user->email:'Email Address'); ?>" readonly>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <input type="text" placeholder="Address*" name="address" value="<?php echo e(isset($user)? $user->profile->address:old('address')); ?>">
                                            <?php if($errors->has('address')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('address')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="country"><?php echo app('translator')->get('lang.country'); ?> </label>
                                            <select class="wide customselect country"
                                                name="country_id" style="display: none">
                                                <option data-display="Country*">
                                                    Select</option>
                                                <?php $__currentLoopData = $data['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                                        
                                                <option value="<?php echo e(@$item->id); ?>" <?php echo e(@$user->profile->country_id == $item->id ?'selected':''); ?>><?php echo e(@$item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('country_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('country_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="state"><?php echo app('translator')->get('lang.state'); ?> </label>
                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.state'); ?>/<?php echo app('translator')->get('lang.region'); ?>" name="state_id" value="<?php echo e(isset($data['user'])? $data['user']->profile->state_id:old('state_id')); ?>">
                                   
                                            <?php if($errors->has('state_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('state_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="city"><?php echo app('translator')->get('lang.city'); ?> </label>
                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.city'); ?>" name="city_id" value="<?php echo e(isset($data['user'])? $data['user']->profile->city_id:old('city_id')); ?>">
                                         
                                            <?php if($errors->has('city_id')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('city_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    
                                        <div class="col-xl-6 col-md-6">
                                            <label for="zip"><?php echo app('translator')->get('lang.postcode_ZIP'); ?> </label>
                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.zip_postal_code'); ?>" name="zipcode" value="<?php echo e(isset($data['user'])? $data['user']->profile->zipcode:old('zipcode')); ?>">
                                     
                                            <?php if($errors->has('zipcode')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('zipcode')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <?php endif; ?>
                                    <div class="row mb-40">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="Deposit"><?php echo app('translator')->get('lang.deposit_amount'); ?> *</label>
                                                <input type="text"  onkeyup="isNumberKeyDecimal(this);" id="_deposit"  name="amount" value="<?php echo e(old('amount')); ?>">
                                                <?php if($errors->has('amount')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('amount')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if($user->profile->first_name == "" || $user->profile->last_name == "" || $user->profile->company_name == "" || $user->profile->mobile == "" || $user->profile->address == "" || $user->profile->country_id == "" || $user->profile->state_id == "" || $user->profile->city_id == "" || $user->profile->zipcode == ""): ?> 
                                                
                                            <?php else: ?>
                                                <div class="check-out-btn ">
                                                    <button type="submit" id="deposit_" class="boxed-btn mt-1"><?php echo app('translator')->get('lang.save'); ?>
                                                        <?php echo app('translator')->get('lang.info'); ?></button>
                                                </div>
                                            <?php endif; ?>
                                    </div>
                                    
                                    
                                    <?php if($user->profile->first_name == "" || $user->profile->last_name == "" || $user->profile->company_name == "" || $user->profile->mobile == "" || $user->profile->address == "" || $user->profile->country_id == "" || $user->profile->state_id == "" || $user->profile->city_id == "" || $user->profile->zipcode == ""): ?> 
                                        <div class="check-out-btn">
                                            <button type="submit" id="deposit_" class="boxed-btn"><?php echo app('translator')->get('lang.save'); ?>
                                                <?php echo app('translator')->get('lang.info'); ?></button>
                                        </div>
                                    <?php endif; ?>
                                </form>
                        </div>
                        

                        </div>
            </div>
        </div>
    </div>
    <!-- privaci_polecy_area end -->
   
 <?php $__env->stopSection(); ?>
 <?php $__env->startPush('js'); ?>
 <script src="<?php echo e(asset('public/frontend/js/')); ?>/fund_add.js"></script>
 <script src="https://checkout.stripe.com/checkout.js"></script>
 <script src="<?php echo e(asset('/')); ?>public/frontend/js/v_4.4_jquery.form.js"></script>
 <script src="<?php echo e(asset('public/frontend/js/')); ?>/fund_add2.js"></script>


 <?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/payment/fund_add.blade.php ENDPATH**/ ?>