
<?php $__env->startSection('mainContent'); ?>

<?php
function showPicName($data){
$name = explode('/', $data);
return $name[4];
}
function showJoiningLetter($data){
$name = explode('/', $data);
return $name[3];
}
function showResume($data){
$name = explode('/', $data);
return $name[3];
}
function showOtherDocument($data){
$name = explode('/', $data);
return $name[3];
}

?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.method'); ?> <?php echo app('translator')->get('lang.view'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.method'); ?> <?php echo app('translator')->get('lang.view'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="mb-40 student-details">
    <div class="container-fluid p-0">
        <div class="row">
         <div class="col-lg-3">
            <!-- Start Student Meta Information -->
            <div class="main-title">
                <h3 class="mb-20"><?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.method'); ?> <?php echo app('translator')->get('lang.view'); ?></h3>
            </div>
            <div class="student-meta-box">
                <div class="student-meta-top"></div>
                <?php if(!empty(@$data->profile->image)): ?>
                <img class="student-meta-img img-100" src="<?php echo e(asset(@$data->profile->image)); ?>"  alt="">
                <?php else: ?>
                <img class="student-meta-img img-100" src="<?php echo e(asset('public/frontend/img/profile/1.png')); ?>"  alt="">
                <?php endif; ?>
                <div class="white-box">
                    <div class="single-meta mt-10">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.name'); ?>
                            </div>
                            <div class="value">
                                <?php if(isset($data)): ?><?php echo e(@$data->user->full_name); ?><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <?php echo app('translator')->get('lang.role'); ?> 
                            </div>
                            <div class="value">
                               <?php if(isset($data)): ?><?php echo e(@$data->user->role->name); ?><?php endif; ?>
                           </div>
                       </div>
                   </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <?php echo app('translator')->get('lang.balance'); ?> 
                            </div>
                            <div class="value">
                               <?php if(isset($data)): ?><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$data->user->balance->amount); ?><?php endif; ?>
                           </div>
                       </div>
                   </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <?php echo app('translator')->get('lang.date_of_joining'); ?>
                            </div>
                            <div class="value">
                                <?php if(isset($data)): ?>
                                <?php echo e(date('jS M, Y', strtotime(@$data->user->created_at))); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Student Meta Information -->

            </div>

            <!-- Start Student Details -->
            <div class="col-lg-9 staff-details">
        
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#Earning" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.method'); ?></a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Start Profile Tab -->
                    <!-- Start leave Tab -->
                    <div role="tabpanel" class="tab-pane fade show active" id="Earning">
                            <div class="white-box">
                            <h4 class="stu-sub-head"><?php echo app('translator')->get('lang.added'); ?> <?php echo app('translator')->get('lang.card'); ?></h4>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="">
                                             <?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-6">
                                        <div class="">
                                            <?php if(isset($data)): ?><?php echo e(@$data->card_name); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.number'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data)): ?><?php echo e(@$data->card_number); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.cvc'); ?> 
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data)): ?><?php echo e(@$data->cvc); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.expiration'); ?> <?php echo app('translator')->get('lang.date'); ?> 
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php echo e(@$data->exp_mm); ?>/<?php echo e(@$data->exp_yy); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                    <a href="<?php echo e(route('admin.paymentMethodApprove',@$data->id)); ?>" class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                               <?php if(@$data->status == 0): ?>
                                                   <?php echo app('translator')->get('lang.approve'); ?>
                                              <?php else: ?>
                                                   <?php echo app('translator')->get('lang.deactive'); ?>
                                               <?php endif; ?>
                                        </a>
                                    </div>
                                </div>

                        </div>
                    </div>
                    

                </div>
            </div>
       </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/payment/payment_method_view.blade.php ENDPATH**/ ?>