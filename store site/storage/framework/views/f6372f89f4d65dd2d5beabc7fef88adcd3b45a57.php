
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
            <h1><?php echo app('translator')->get('lang.withdraws'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('admin.payableUser')); ?>"><?php echo app('translator')->get('lang.vendor'); ?> <?php echo app('translator')->get('lang.withdraws'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
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
                <h3 class="mb-20"><?php echo app('translator')->get('lang.vendor'); ?> <?php echo app('translator')->get('lang.info'); ?></h3>
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
                                <?php echo app('translator')->get('lang.vendor'); ?> <?php echo app('translator')->get('lang.name'); ?>
                            </div>
                            <div class="value">
                                <?php if(isset($data)): ?><?php echo e(@$data->full_name); ?><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <?php echo app('translator')->get('lang.role'); ?> 
                            </div>
                            <div class="value">
                               <?php if(isset($data)): ?><?php echo e(@$data->role->name); ?><?php endif; ?>
                           </div>
                       </div>
                   </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <?php echo app('translator')->get('lang.balance'); ?> 
                            </div>
                            <div class="value">
                               <?php if(isset($data)): ?> <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(@$data->balance->amount); ?><?php endif; ?>
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
                                <?php echo e(date('jS M, Y', strtotime(@$data->created_at))); ?>

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
                        <a class="nav-link active" href="#Earning" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.earnings'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#studentProfile" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.payment'); ?></a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#withdraw_history" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.withdraws'); ?> <?php echo app('translator')->get('lang.history'); ?></a>
                    </li> 
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Start Profile Tab -->
                    <!-- Start leave Tab -->
                    <div role="tabpanel" class="tab-pane fade show active" id="Earning">
                            <div class="white-box">
                                <div class="row mt-30">
                                    <div class="col-lg-12">
                                        <div class="row">
                                                <div class="col-lg-3 col-6">
                                                    <a href="#" class="d-block">
                                                        <div class="white-box single-summery">
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <h3> <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(@$data->balance->amount); ?> </h3>
                                                                    <p class="mb-0"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.earning'); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div role="tabpanel" class="tab-pane fade " id="studentProfile">
                        <div class="white-box">
                            <h4 class="stu-sub-head"><?php echo app('translator')->get('lang.vendor'); ?> <?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.info'); ?></h4>
                          

                            <div class="single-info">
                                    <form accept-charset="UTF-8" action="<?php echo e(route('admin.paymentAuthor')); ?>" class="require-validation"  id="payment-form" method="post">
                                        <?php echo e(csrf_field()); ?>

                                       <input type="text" hidden value="<?php echo e(@$payout_setup->user_id); ?>" name="user_id">
                                       <input type="text" hidden value="<?php echo e(@$payout_setup->id); ?>" name="payment_method_id">
                                        <div class='form-row'>
                                            <div class='col-xl-12 form-group'>
                                                <label class='control-label'><?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.name'); ?></label> <input value="<?php echo e(@$payout_setup->payment_method_name); ?>" name="card_name"
                                                    class='form-control' size='4' type='text' readonly>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                            <div class='col-xl-12 form-group'>
                                                <label class='control-label'><?php echo app('translator')->get('lang.email'); ?></label> <input
                                            autocomplete='off' class='form-control card-number' size='20' value="<?php echo e(@$payout_setup->payout_email); ?>" name="email"
                                                    type='text' readonly>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                            <div class='col-xl-12 form-group'>
                                                <label class='control-label'><?php echo app('translator')->get('lang.phone'); ?></label> <input
                                            autocomplete='off' class='form-control card-number' size='20' value="<?php echo e(@$payout_setup->payout_phone); ?>" name="phone"
                                                    type='text' readonly>
                                            </div>
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class='col-xl-12 form-group'>
                                                <label class='control-label'> <?php echo app('translator')->get('lang.total'); ?></label> <input
                                                    class='form-control' placeholder='YYYY' value="<?php echo e(@$data->balance->amount); ?>" name="amount"
                                                     type='text'>
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class='col-xl-12 form-group text-center'>
                                                <button type="submit" class="primary-btn fix-gr-bg"><?php echo app('translator')->get('lang.paid'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="withdraw_history">
                        <div class="white-box">
                            <h4><?php echo app('translator')->get('lang.withdraws'); ?> <?php echo app('translator')->get('lang.history'); ?></h4>
                            <div class="text-right mb-20">
                                <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                    <thead>
                                   
                                        <tr class="withdraw_vendor_aligh_left">
                                            
                                            <th><?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                            <th><?php echo app('translator')->get('lang.email'); ?></th>
                                            <th><?php echo app('translator')->get('lang.phone'); ?></th>
                                            <th><?php echo app('translator')->get('lang.amount'); ?></th>
                                            <th><?php echo app('translator')->get('lang.withdraws'); ?> <?php echo app('translator')->get('lang.date'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>  
                                            
                                            <td valign="top"><?php echo e(@$item->payment_method_name); ?></td>
                                            <td valign="top"><?php echo e(@$item->payout_email); ?></td>
                                            <td valign="top"><?php echo e(@$item->payout_phone); ?></td>
                                            <td valign="top"><?php echo e(@$item->amount); ?></td>
                                             <td valign="top"><?php echo e(DateFormat($item->created_at)); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/payment/withdraw_vendor.blade.php ENDPATH**/ ?>