
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/coupon.css">
<?php $__env->stopPush(); ?>
<?php
    @$frontCoupon = Modules\Pages\Entities\FrontCoupon::where('active_status', 1)->first();
?>
<?php $__env->startSection('content'); ?>

<input type="text" hidden  class="id" value="<?php echo e(Auth::user()->username); ?>">
<input type="text" hidden  class="coupon_id" value="<?php echo e(@$data['edit']->id); ?>">
       <!-- banner-area start -->
    <div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">
                            <h2><?php echo app('translator')->get('lang.coupon'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->

    <!-- details-tablist-start -->
    <div class="details-tablist-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="details-tablist">
                        <nav>
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(@$data['all'] == url()->current() ?'active':''); ?>" id="home-tab" data-toggle="tab" href="#<?php echo e(@$data['all'] == url()->current() ?'home':''); ?>" role="tab"
                                        aria-controls="home" aria-selected="true"><?php echo app('translator')->get('lang.all_active_coupons'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(@$data['add'] == url()->current() ?'active':''); ?> " id="profile-tab" data-toggle="tab" 
                                        href="#<?php echo e(@$data['add'] == url()->current() ?'profile':''); ?>" role="tab"
                                    aria-controls="profile" aria-selected="false"> <?php if(@$data['edit']): ?> <?php echo app('translator')->get('lang.edit'); ?> <?php else: ?> <?php echo app('translator')->get('lang.add'); ?> <?php endif; ?> <?php echo app('translator')->get('lang.coupon'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(@$data['delete'] == url()->current() ?'active':''); ?>" href="<?php echo e(route('author.Coupon_Delete_view')); ?>"><?php echo app('translator')->get('lang.deleted_coupons'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(@$data['expire'] == url()->current() ?'active':''); ?>" href="<?php echo e(route('author.CouponExpire')); ?>"><?php echo app('translator')->get('lang.expired_coupons'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(@$data['inactive'] == url()->current() ?'active':''); ?>" href="<?php echo e(route('author.CouponInactive')); ?>"><?php echo app('translator')->get('lang.inactive_coupons'); ?></a>
                                </li>
                              
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- details-tablist-end -->

    <!-- main-details-area-start -->
    <div class="main-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-lg-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-tab-content">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade <?php echo e(@$data['all'] == url()->current() ?'show active':''); ?>" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="my_coupon">
                                            <div class="my_coupens_headeing mb-30">
                                                <h3><?php echo app('translator')->get('lang.all_coupons'); ?></h3>
                                                <p><?php echo e(@$frontCoupon->coupon); ?>

                                                </p>
                                            </div>
                                            <table class="table">
                                                <tr>
                                                   
                                                    <th style ="width:20%"><?php echo app('translator')->get('lang.coupon_code'); ?></th>
                                                    <th style ="width:15%"><?php echo app('translator')->get('lang.coupon_type'); ?></th>
                                                    <th style ="width:15%"><?php echo app('translator')->get('lang.discounted_amount'); ?></th>
                                                    
                                                    <th style ="width:15%"><?php echo app('translator')->get('lang.valid_date'); ?></th>
                                                    <th style ="width:30%"><?php echo app('translator')->get('lang.action'); ?></th>
                                                </tr>
                                                <?php $__currentLoopData = @$data['coupon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    
                                                    
                                                    <td style ="width:20%"><?php echo e(@$item->coupon_code); ?></td>
                                                    <td style ="width:15%"><?php echo e(@$item->coupon_type == 1? 'Multiple':'Once'); ?> </td>
                                                    <td style ="width:15%"><?php echo e(@$item->discount_type == 1? '': @GeneralSetting()->currency_symbol); ?> <?php echo e(@$item->discount); ?> <?php echo e(@$item->discount_type == 1? '%':''); ?></td>
                                                    
                                                    <td style ="width:15%" data-label="Period2"><?php echo e(DateFormat(@$item->to)); ?></td>
                                                    <td style ="width:20%" class="edit-buttons"><button
                                                            class="delete" onclick="deleItem(<?php echo e(@$key); ?>)"><?php echo app('translator')->get('lang.delete'); ?></button><button class="edit"><a href="<?php echo e(route('author.couponEdit',@$item->id)); ?>"
                                                            class="edit text-white"><?php echo app('translator')->get('lang.edit'); ?></a></button></td>
                                                            <a id="delete-form-<?php echo e(@$key); ?>" href="<?php echo e(route('author.couponDelete',@$item->id)); ?>" class="dm_display_none"></a>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                            <div class="Pagination">
                                                <?php echo e(@$data['coupon']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade <?php echo e(@$data['add'] == url()->current() ?'show active':''); ?>" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="my_coupon">
                                                <div class="my_coupens_headeing mb-15">
                                                    <h3><?php echo app('translator')->get('lang.add_coupon'); ?></h3>
                                                    <p><?php echo e(@$frontCoupon->add_coupon); ?>

                                                    </p>
                                                </div>
                                                <?php if(@$data['edit']): ?>
                                                 <form action="<?php echo e(route('author.couponUpdate',@$data['edit']->id)); ?>" method="POST" id="couponStore" enctype="multipart/form-data">
                                                <?php else: ?>   
                                                    <form action="<?php echo e(route('author.couponStore')); ?>" method="POST" id="couponStore" enctype="multipart/form-data">
                                                <?php endif; ?>
                                                   <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="row">
                                                                            <div class="col-xl-12 col-md-12">
                                                                                <label for="name"><?php echo app('translator')->get('lang.coupon_code'); ?> <span>*</span></label>
                                                                                <input type="text" placeholder="<?php echo app('translator')->get('lang.enter_coupon_code'); ?>" name="coupon_code" value="<?php echo e(isset($data['edit'])? $data['edit']->coupon_code :old('coupon_code')); ?>">
                                                                                <input type="text" name="id" hidden value="<?php echo e(@$data['edit']->id); ?>">
                                                                                <?php if($errors->has('coupon_code')): ?>
                                                                                <span class="invalid-feedback invalid-select error"
                                                                                        role="alert">
                                                                                    <strong><?php echo e($errors->first('coupon_code')); ?></strong>
                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="col-xl-12 col-md-12 ">
                                                                                    <label for=""><?php echo app('translator')->get('lang.coupon_type'); ?> <span>*</span></label>
                                                                                    <div class="row ml-5">
                                                                                                                                                                           
                                                                                        <div class="col-lg-1"><input type="radio" id="once" value="0" <?php echo e(isset($data['edit'])? $data['edit']->coupon_type == 0 ? 'checked' : '' :'checked'); ?> name="coupon_type"></div>
                                                                                        <div class="col-lg-3 mt-2"><label for="once"><?php echo app('translator')->get('lang.once'); ?></label></div>  
                                                                                                                                                                          
                                                                                        <div class="col-lg-1"><input type="radio" id="multiple" value="1" <?php echo e(isset($data['edit'])? $data['edit']->coupon_type == 1 ? 'checked' : '' :''); ?> name="coupon_type"></div>
                                                                                        <div class="col-lg-3 mt-2"><label for="multiple"><?php echo app('translator')->get('lang.multiple'); ?></label></div>   
                                                                                        <?php if($errors->has('coupon_type')): ?>
                                                                                        <span class="invalid-feedback invalid-select error"
                                                                                                role="alert">
                                                                                            <strong><?php echo e($errors->first('coupon_type')); ?></strong>
                                                                                        </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-12 col-md-12 ">
                                                                                    <label for=""><?php echo app('translator')->get('lang.coupon_discount'); ?> <span>*</span></label>
                                                                                    <div class="row ml-5">
                                                                                                                                                                           
                                                                                        <div class="col-lg-1"><input type="radio" value="0" id="fixed" name="discount_type" <?php echo e(isset($data['edit'])? $data['edit']->discount_type == 0 ? 'checked' : '' :'checked'); ?> ></div>
                                                                                        <div class="col-lg-3 mt-2"><label for="fixed"><?php echo app('translator')->get('lang.fixed'); ?></label></div> 
                                                                                                                                                                        
                                                                                        <div class="col-lg-1"><input type="radio" id="percent" value="1" name="discount_type" <?php echo e(isset($data['edit'])? $data['edit']->discount_type == 0? '':'checked' :old('discount_type')); ?> ></div>
                                                                                        <div class="col-lg-3 mt-2"><label for="percent"><?php echo app('translator')->get('lang.percent'); ?> (%)</label></div>    
                                                                                        <?php if($errors->has('discount')): ?>
                                                                                        <span class="invalid-feedback invalid-select error"
                                                                                                role="alert">
                                                                                            <strong><?php echo e($errors->first('discount')); ?></strong>
                                                                                        </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                   <input type="text"  placeholder="<?php echo app('translator')->get('lang.enter_fix_discount'); ?>" id="discountfixed" name="discount" value="<?php echo e(isset($data['edit'])? $data['edit']->discount :old('discount')); ?>">
                                                                                </div>
                                                                            
                                                                            
                                                                            <div class="col-xl-12 col-md-12">
                                                                                <label for="name"><?php echo app('translator')->get('lang.valid_date'); ?> <span>*</span></label>
                                                                                <input id="from" placeholder="<?php echo app('translator')->get('lang.from_date'); ?>" name="from" value="<?php echo e(isset($data['edit'])? date('y-m-d',strtotime($data['edit']->from)) :old('from')); ?>" >
                                                                                <?php if($errors->has('from')): ?>
                                                                                <span class="invalid-feedback invalid-select error"
                                                                                        role="alert">
                                                                                    <strong><?php echo e($errors->first('from')); ?></strong>
                                                                                </span>
                                                                                <?php endif; ?>
                                                                                <input id="to"  name="to" placeholder="<?php echo app('translator')->get('lang.to_date'); ?>" value="<?php echo e(isset($data['edit'])? date('y-m-d',strtotime($data['edit']->to)) :old('to')); ?>" >
                                                                               
                                                                                <?php if($errors->has('to')): ?>
                                                                                <span class="invalid-feedback invalid-select error"
                                                                                        role="alert">
                                                                                    <strong><?php echo e($errors->first('to')); ?></strong>
                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-effect">
                                                                                        <select class="wide<?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>" name="active_status">
                                                                                            <option data-display="<?php echo app('translator')->get('lang.status'); ?> *" value=""><?php echo app('translator')->get('lang.status'); ?> *</option> 
                                                                                            <option value="1" <?php echo e(isset($data['edit'])? $data['edit']->status == 1?'selected':'': 'selected'); ?> ><?php echo app('translator')->get('lang.active'); ?></option> 
                                                                                            <option value="2" <?php echo e(isset($data['edit'])? $data['edit']->status == 2?'selected':'': ''); ?>><?php echo app('translator')->get('lang.inactive'); ?></option> 
                                                                                        </select>
                                                                                        <span class="focus-border"></span>
                                                                                        <?php if($errors->has('active_status')): ?>
                                                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                                                            <strong><?php echo e($errors->first('active_status')); ?></strong>
                                                                                        </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="coupns-btn">
                                                            <button type="submit" class="boxed-btn">
                                                                 
                                                                <?php if(@$data['edit']): ?>
                                                                <?php echo app('translator')->get('lang.update'); ?>
                                                                <?php else: ?>
                                                                <?php echo app('translator')->get('lang.add'); ?>
                                                                <?php endif; ?>
                                                                <?php echo app('translator')->get('lang.coupon'); ?>
                                                            </button>
                                                        </div>
                                                    </form>
                                            </div>
                                    </div>
                                    <div class="tab-pane fade <?php echo e(@$data['delete'] == url()->current() ?'show active':''); ?>" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <?php
                                           
                                        ?>
                                        <div class="my_coupon">
                                                <div class="my_coupens_headeing mb-30">
                                                    <h3><?php echo app('translator')->get('lang.deleted_coupons'); ?></h3>
                                                    <p><?php echo e(@$frontCoupon->delete_coupon); ?>

                                                    </p>
                                                </div>
                                                <table class="table">
                                                    <tr>
                                                       
                                                        <th><?php echo app('translator')->get('lang.coupon_code'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.coupon_type'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.discounted_amount'); ?></th>
                                                        
                                                        <th><?php echo app('translator')->get('lang.valid_date'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.action'); ?></th>
                                                    </tr>
                                                    <?php $__currentLoopData = @$data['delete_coupon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                       
                                                        <td><?php echo e(@$item->coupon_code); ?></td>
                                                        <td><?php echo e(@$item->coupon_type == 1? 'Multiple':'Once'); ?> </td>
                                                        <td><?php echo e(@$item->discount_type == 1? '%': @GeneralSetting()->currency_symbol); ?> <?php echo e(@$item->discount); ?></td>
                                                        
                                                        <td data-label="Period2"><?php echo e(DateFormat(@$item->to)); ?></td>
                                                        <td class="edit-buttons"><button class="delete" onclick="RestoreItem(<?php echo e(@$key); ?>)" ><?php echo app('translator')->get('lang.restore'); ?></button></td>
                                                                <a id="restore-form-<?php echo e(@$key); ?>" href="<?php echo e(route('author.couponRestore',@$item->id)); ?>" class="dm_display_none"></a>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                                <div class="Pagination">
                                                        <?php echo e(@$data['coupon']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane fade <?php echo e(@$data['expire'] == url()->current() ?'show active':''); ?>" id="expire" role="tabpanel"
                                        aria-labelledby="expire-tab">
                                        <?php
                                            
                                        ?>
                                        <div class="my_coupon">
                                                <div class="my_coupens_headeing mb-30">
                                                    <h3><?php echo app('translator')->get('lang.expired_coupons'); ?></h3>
                                                    <p><?php echo e(@$frontCoupon->expired_coupon); ?>

                                                    </p>
                                                </div>
                                                <table class="table">
                                                    <tr>
                                                       
                                                        <th><?php echo app('translator')->get('lang.coupon_code'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.coupon_type'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.discounted_amount'); ?></th>
                                                        
                                                        <th><?php echo app('translator')->get('lang.valid_date'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.action'); ?></th>
                                                    </tr>
                                                    <?php $__currentLoopData = $data['expired_coupon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                       
                                                        <td><?php echo e(@$item->coupon_code); ?></td>
                                                        <td><?php echo e(@$item->coupon_type == 1? 'Multiple':'Once'); ?> </td>
                                                        <td><?php echo e(@$item->discount_type == 1? '%':@GeneralSetting()->currency_symbol); ?> <?php echo e(@$item->discount); ?></td>
                                                        
                                                        <td data-label="Period2"><?php echo e(DateFormat(@$item->to)); ?></td>
                                                        <td class="edit-buttons"><button><a href="<?php echo e(route('author.couponEdit',@$item->id)); ?>"
                                                                class="edit text-white"><?php echo app('translator')->get('lang.edit'); ?></a></button></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                                <div class="Pagination">
                                                        <?php echo e(@$data['coupon']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                </div>
                                            </div>
                                    </div>

                                    
                                    <div class="tab-pane fade <?php echo e(@$data['inactive'] == url()->current() ?'show active':''); ?>" id="expire" role="tabpanel"
                                        aria-labelledby="expire-tab">
                                        <?php
                                            
                                        ?>
                                        <div class="my_coupon">
                                                <div class="my_coupens_headeing mb-30">
                                                    <h3><?php echo app('translator')->get('lang.inactive_coupons'); ?></h3>
                                                    <p><?php echo e(@$frontCoupon->Inactive_coupon); ?>

                                                    </p>
                                                </div>
                                                <table class="table">
                                                    <tr>
                                                       
                                                        <th><?php echo app('translator')->get('lang.coupon_code'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.coupon_type'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.discounted_amount'); ?></th>
                                                        
                                                        <th><?php echo app('translator')->get('lang.valid_date'); ?></th>
                                                        <th><?php echo app('translator')->get('lang.action'); ?></th>
                                                    </tr>
                                                    <?php $__currentLoopData = $data['inactive_coupon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                       
                                                        <td><?php echo e(@$item->coupon_code); ?></td>
                                                        <td><?php echo e(@$item->coupon_type == 1? 'Multiple':'Once'); ?> </td>
                                                        <td><?php echo e(@$item->discount_type == 1? '%':@GeneralSetting()->currency_symbol); ?> <?php echo e(@$item->discount); ?></td>
                                                        
                                                        <td data-label="Period2"><?php echo e(DateFormat(@$item->to)); ?></td>
                                                        <td class="edit-buttons"><button><a href="<?php echo e(route('author.couponEdit',@$item->id)); ?>"
                                                                class="edit text-white"><?php echo app('translator')->get('lang.edit'); ?></a></button></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                                <div class="Pagination">
                                                        <?php echo e(@$data['coupon']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-details-area-end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/coupon.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/delete.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/vendor/coupon_list.blade.php ENDPATH**/ ?>