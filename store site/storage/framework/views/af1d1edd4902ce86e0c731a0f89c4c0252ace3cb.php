
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
<?php  
// $setting = App\SmGeneralSettings::find(1); 

@$setting = Modules\Systemsetting\Entities\InfixGeneralSetting::find(1);
if(!empty(@$setting->currency_symbol)){ @$currency = @$setting->currency_symbol; }else{ @$currency = '$'; } ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.profile'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href=""><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.profile'); ?></a>
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
                <h3 class="mb-20"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.details'); ?></h3>
            </div>
            <div class="student-meta-box">
                <div class="student-meta-top"></div>
                <?php if(!empty(@$data->profile->image)): ?>
                <img class="student-meta-img img-100" src="<?php echo e(asset(@$data->profile->image)); ?>"  alt="">
                <?php else: ?>
                <img class="student-meta-img img-100" src="<?php echo e(asset('public/backEnd/img/admin/staff.png')); ?>"  alt="">
                <?php endif; ?>
                <div class="white-box">
                    <div class="single-meta mt-10">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                    <?php echo app('translator')->get('lang.admin'); ?> <?php echo app('translator')->get('lang.name'); ?>
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
                                 <?php echo app('translator')->get('lang.date_of_joining'); ?>
                            </div>
                            <div class="value">
                                <?php if(isset($data)): ?>
                                <?php echo e(DateFormat(@$data->created_at)); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

            <!-- Start Student Details -->
            <div class="col-lg-9 staff-details">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item edit-button">
                                <a href="<?php echo e(route('admin.profile_edit',@$data->id)); ?>" class="primary-btn small fix-gr-bg float-right"><?php echo app('translator')->get('lang.edit'); ?></a>
                            </li>
                        </ul>
                        <div class="white-box mt-2">
                            <h4 class="stu-sub-head"><?php echo app('translator')->get('lang.personal_info'); ?></h4>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="">
                                            <?php echo app('translator')->get('lang.mobile_no'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-6">
                                        <div class="">
                                            <?php if(isset($data)): ?><?php echo e(@$data->profile->mobile); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                            <?php echo app('translator')->get('lang.email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data)): ?><?php echo e(@$data->email); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                           <?php echo app('translator')->get('lang.company'); ?> <?php echo app('translator')->get('lang.name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data->profile->company_name)): ?><?php echo e(@$data->profile->company_name); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                            <?php echo app('translator')->get('lang.address'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data->profile->address)): ?><?php echo e(@$data->profile->address); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                            <?php echo app('translator')->get('lang.Date_of_birth'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data->profile->dob)): ?> <?php echo e(DateFormat(@$data->profile->dob)); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                            <?php echo app('translator')->get('lang.marital_status'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                             <?php if(@$data->profile->marital_status == "married"): ?>
                                                <?php echo app('translator')->get('lang.married'); ?>
                                             <?php endif; ?>
                                             <?php if(@$data->profile->marital_status == "unmarried"): ?>
                                                <?php echo app('translator')->get('lang.unmarried'); ?>
                                             <?php endif; ?>
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/admin/profile.blade.php ENDPATH**/ ?>