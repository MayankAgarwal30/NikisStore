

<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    .smtp_wrapper{
        display: none;
    }
    .smtp_wrapper_block{
        display: block;
    }
</style>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.email_settings'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.email_settings'); ?> </a>
            </div>
        </div>
    </div>
</section>

<section class="mb-40 student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <!-- Start Sms Details -->
            <div class="col-lg-12">
                <ul class="nav nav-tabs tab_column" role="tablist">
                   
                    <li class="nav-item">
                        <a class="nav-link active" href="#smtp" role="tab" data-toggle="tab">Smtp <?php echo app('translator')->get('lang.settings'); ?></a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#php" role="tab" data-toggle="tab">Php <?php echo app('translator')->get('lang.settings'); ?></a>
                    </li>

                    </li>  
                </ul>
            

               
                <div class="tab-content">
            

            <!-- Start Exam Tab -->
        <div role="tabpanel" class="tab-pane fade show active" id="smtp">
          
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'url' => 'systemsetting/update-email-settings-data', 'id' => 'email_settings1', 'enctype' => 'multipart/form-data'])); ?>

           
                <div class="row">
                <div class="col-lg-12">
                    
                  <div class="white-box">
                      
                         <input type="hidden" name="email_settings_url" id="email_settings_url" value="update-email-settings-data">
                         <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                         <input type="hidden" name="engine_type" id="engine_type" value="smtp">
                        
                        <div class="row justify-content-center mb-30 mt-40">
                            <div class="col-lg-6">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('from_name') ? ' is-invalid' : ''); ?>"
                                    type="text" name="from_name" id="from_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->from_name : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.from_name'); ?><span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('from_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('from_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        
                            <div class="col-lg-6">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('from_email') ? ' is-invalid' : ''); ?>"
                                    type="text" name="from_email" id="from_email" autocomplete="off" value="<?php echo e(isset($editData)? $editData->from_email : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.from'); ?> <?php echo app('translator')->get('lang.mail'); ?><span>*</span> </label>
                                    <span class="focus-border"></span>
                                     <?php if($errors->has('from_email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('from_email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                 
                        <div class="row justify-content-center">
                            <div class="col-lg-6 mb-30">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('mail_driver') ? ' is-invalid' : ''); ?>"
                                    type="text" name="mail_driver" id="mail_driver" autocomplete="off" value="<?php echo e(isset($editData)? $editData->mail_driver : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.mail'); ?> <?php echo app('translator')->get('lang.driver'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <span class="modal_input_validation red_alert"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-30">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('mail_host') ? ' is-invalid' : ''); ?>"
                                    type="text" name="mail_host" id="mail_host" autocomplete="off" value="<?php echo e(isset($editData)? $editData->mail_host : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.mail'); ?> <?php echo app('translator')->get('lang.host'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <span class="modal_input_validation red_alert"></span>
                                </div>
                            </div>
                          </div>
    
                           <div class="row justify-content-center">
                            <div class="col-lg-6 mb-30">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('mail_port') ? ' is-invalid' : ''); ?>"
                                    type="text" name="mail_port" id="mail_port" autocomplete="off" value="<?php echo e(isset($editData)? $editData->mail_port : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.mail'); ?> <?php echo app('translator')->get('lang.port'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <span class="modal_input_validation red_alert"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-30">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('mail_username') ? ' is-invalid' : ''); ?>"
                                    type="text" name="mail_username" id="mail_username" autocomplete="off" value="<?php echo e(isset($editData)? $editData->mail_username : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.mail'); ?> <?php echo app('translator')->get('lang.username'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <span class="modal_input_validation red_alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 mb-30">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('mail_password') ? ' is-invalid' : ''); ?>"
                                    type="password" name="mail_password" id="mail_password" autocomplete="off" value="<?php echo e(isset($editData)? $editData->mail_password : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.mail'); ?> <?php echo app('translator')->get('lang.password'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <span class="modal_input_validation red_alert"></span>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-30">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('mail_encryption') ? ' is-invalid' : ''); ?>"
                                    type="text" name="mail_encryption" id="mail_encryption" autocomplete="off" value="<?php echo e(isset($editData)? $editData->mail_encryption : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.mail'); ?> <?php echo app('translator')->get('lang.encryption'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <span class="modal_input_validation red_alert"></span>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-30">
                                <div class="input-effect">
                                    <select class="w-100 bb niceSelect form-control <?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>" id="active_status" name="active_status">
                                        <option data-display="<?php echo app('translator')->get('lang.select_status'); ?> *" value=""><?php echo app('translator')->get('lang.select_status'); ?> *</option>
                                        <option <?php if($active_mail_driver == "smtp"): ?> selected <?php endif; ?> value="1">Enable</option>
                                        <option <?php if($active_mail_driver == "php"): ?> selected <?php endif; ?> value="1">Disable</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                        <div class="row mt-30">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('lang.update'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                        
                </div>
                    
            </div>
     
            <?php echo e(Form::close()); ?>

            </div>
            
       
        <div role="tabpanel" class="tab-pane fade" id="php">
           
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'url' => 'systemsetting/update-email-settings-data', 'id' => 'email_settings1', 'enctype' => 'multipart/form-data'])); ?>

         
                <div class="row">
                <div class="col-lg-12">
                    
                  <div class="white-box">
                      
                         <input type="hidden" name="email_settings_url" id="email_settings_url" value="update-email-settings-data">
                         <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                         <input type="hidden" name="engine_type" id="engine_type" value="php">
                        
                        <div class="row justify-content-center mb-30 mt-40">
                            <div class="col-lg-4">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('from_name') ? ' is-invalid' : ''); ?>"
                                    type="text" name="from_name" id="from_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->from_name : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.from_name'); ?><span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('from_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('from_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        
                            <div class="col-lg-4">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('from_email') ? ' is-invalid' : ''); ?>"
                                    type="text" name="from_email" id="from_email" autocomplete="off" value="<?php echo e(isset($editData)? $editData->from_email : ''); ?>">
                                    <label><?php echo app('translator')->get('lang.from'); ?> <?php echo app('translator')->get('lang.mail'); ?><span>*</span> </label>
                                    <span class="focus-border"></span>
                                     <?php if($errors->has('from_email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('from_email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-30">
                                <div class="input-effect">
                                    <select class="w-100 bb niceSelect form-control <?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>" id="active_status" name="active_status">
                                        <option data-display="<?php echo app('translator')->get('lang.select_status'); ?> *" value=""><?php echo app('translator')->get('lang.select_status'); ?> *</option>
                                        <option <?php if($active_mail_driver == "php"): ?> selected <?php endif; ?> value="1">Enable</option>
                                        <option <?php if($active_mail_driver == "smtp"): ?> selected <?php endif; ?> value="1">Disable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                 
                        <div class="row mt-30">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('lang.update'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                        
                </div>
                    
            </div>
     
            <?php echo e(Form::close()); ?>

            </div>
            </div>
      
    

        </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/email_setting_view.blade.php ENDPATH**/ ?>