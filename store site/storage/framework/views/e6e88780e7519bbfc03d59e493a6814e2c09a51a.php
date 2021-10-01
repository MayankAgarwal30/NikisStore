 <?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.send_email'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.promotional'); ?></a>
                <a href="#"> <?php echo app('translator')->get('lang.send_email'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.send_email'); ?> </h3>
                </div>
            </div>

        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin.sendEmailSms', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message-success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <?php elseif(session()->has('message-danger')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session()->get('message-danger')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-7">
                        <div class="white-box sm2_mb_20">
                            <div class="">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-effect mb-30">
                                            <input class="primary-input form-control<?php echo e($errors->has('email_sms_title') ? ' is-invalid' : ''); ?>" type="text" name="email_sms_title" autocomplete="off" value="<?php echo e(old('email_sms_title')); ?>">
                                            <label><?php echo app('translator')->get('lang.title'); ?> <span>*</span> </label>
                                            <span class="focus-border"></span>
                                             <?php if($errors->has('email_sms_title')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('email_sms_title')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12 d-flex mb-20">
                                            <div class="row">
                                                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('lang.send_through'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-40">
                                                    <div class="mr-30">
                                                        <input type="radio" name="send_through" id="Email" value="E" class="common-radio relationButton" checked>
                                                        <label for="Email"><?php echo app('translator')->get('lang.email'); ?></label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-effect">
                                            <label><?php echo app('translator')->get('lang.description'); ?> <span>*</span> </label>
                                            <textarea id="summernote" class="primary-input form-control <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="description" id="details"><?php echo e(old('description')); ?></textarea>
                                           
                                            <span class="focus-border textarea"></span> 
                                            <?php if($errors->has('description')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">

                        <div class="row student-details mt_0_sm">

                            <!-- Start Sms Details -->
                            <div class="col-lg-12">
                                <ul class="nav nav-tabs mt_0_sm mb-20" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#group_email_sms" selectTab="G" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.group'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" selectTab="I" href="#indivitual_email_sms" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.individual'); ?></a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <input type="hidden" name="selectTab" id="selectTab">
                                    <div role="tabpanel" class="tab-pane fade show active" id="group_email_sms">

                                        <div class="white-box">
                                            <div class="col-lg-12">
                                                <label><?php echo app('translator')->get('lang.message'); ?> <?php echo app('translator')->get('lang.to'); ?> </label>
                                                <br> <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="">
                                                    <input type="checkbox" id="role_<?php echo e(@$role->id); ?>" class="common-checkbox" value="<?php echo e(@$role->id); ?>" name="role[]">
                                                    <label for="role_<?php echo e(@$role->id); ?>"><?php echo e(@$role->name); ?></label>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                <?php if($errors->has('section')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('section')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="indivitual_email_sms">

                                        <div class="white-box">
                                            <div class="row mb-35">

                                                <div class="col-lg-12">
                                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>" name="role_id" id="staffsByRoleCommunication">
                                                        <option data-display="<?php echo app('translator')->get('lang.role'); ?>  *" value=""><?php echo app('translator')->get('lang.role'); ?> *</option>
                                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if(isset($editData)): ?>
                                                               <option value="<?php echo e(@$value->id); ?>" <?php echo e(@$value->id == @$editData->role_id? 'selected':''); ?>><?php echo e(@$value->name); ?></option>
                                                            <?php else: ?>
                                                               <option value="<?php echo e(@$value->id); ?>"><?php echo e(@$value->name); ?></option>
                                                            <?php endif; ?> 
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php if($errors->has('leave_type')): ?>
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                                        <strong><?php echo e($errors->first('leave_type')); ?></strong>
                                                    </span> <?php endif; ?>
                                                </div>

                                                <div class="col-lg-12 mt-30" id="selectStaffsDiv">
                                                    <label for="checkbox" class="mb-2"><?php echo app('translator')->get('lang.name'); ?></label>
                                                    
                                                    <select multiple id="selectStaffss" name="message_to_individual[]" class="select_Staff_width">

                                                    </select>
                                                    <div class="">
                                                    <input type="checkbox" id="checkbox_section" class="common-checkbox">
                                                    <label for="checkbox_section" class="mt-3"><?php echo app('translator')->get('lang.select_all'); ?> </label>
                                                    </div>
                                                    <?php if($errors->has('staff_id')): ?>
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                            <strong><?php echo e($errors->first('staff_id')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Individual Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <?php if(Auth::user()->role_id == 1 ): ?>
                <div class="white-box mt-30">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button class="primary-btn fix-gr-bg">
                                <span class="ti-check"></span> <?php echo app('translator')->get('lang.send'); ?>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  
<script src="<?php echo e(asset('public/backEnd/send_email.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/backend.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/communicate/sendEmailSms.blade.php ENDPATH**/ ?>