

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.general_settings'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(url('general-settings')); ?>"><?php echo app('translator')->get('lang.general_settings'); ?> <?php echo app('translator')->get('lang.view'); ?></a>
              </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-title">
                    <h3 class="mb-30">
                        <?php echo app('translator')->get('lang.update'); ?>
                   </h3>
                </div>
            </div>
        </div>
	<?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

    <?php else: ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update_general_setting', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

  <?php endif; ?>
<input type="hidden" name="id" value="<?php echo e($infix_general_setting->id); ?>" >
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="row ">
                            <div class="col-lg-4 mb-40">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('system_name') ? ' is-invalid' : ''); ?>"
                                    type="text" name="system_name" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->system_name : old('system_name')); ?>">
                                    <label><?php echo app('translator')->get('lang.system_name'); ?> <span>*</span></label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('system_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('system_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-40">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('system_title') ? ' is-invalid' : ''); ?>"
                                    type="text" name="system_title" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->system_title : old('system_title')); ?>">
                                    <label><?php echo app('translator')->get('lang.system_title'); ?> <span>*</span></label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('system_title')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('system_title')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <div class="col-lg-4 mb-40">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                    type="text" name="phone" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->phone: old('phone')); ?>">
                                    <label><?php echo app('translator')->get('lang.phone'); ?> <span>*</span></label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('phone')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>




                        </div>

                        <div class="row ">
                        <div class="col-lg-4 mb-40">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                    type="email" name="email" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->email: old('email')); ?>">
                                    <label><?php echo app('translator')->get('lang.email'); ?> <span>*</span></label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                           <div class="col-lg-4 mb-40">
                                <div class="input-effect">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('language_id') ? ' is-invalid' : ''); ?>" name="language_id" id="language_id">
                                        <option data-display="<?php echo app('translator')->get('lang.language'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> <span>*</span></option>
                                        <?php if(isset($languages)): ?>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($value->id); ?>"
                                        <?php if(isset($infix_general_setting)): ?>
                                        <?php if($infix_general_setting->language_id == $value->id): ?>
                                        selected
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        ><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('language_id')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('language_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-40">
                                <div class="input-effect">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('date_format_id') ? ' is-invalid' : ''); ?>" name="date_format_id" id="date_format_id">
                                        <option data-display="<?php echo app('translator')->get('lang.select_date_format'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> <span>*</span></option>
                                        <?php if(isset($dateFormats)): ?>
                                        <?php $__currentLoopData = $dateFormats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"
                                        <?php if(isset($infix_general_setting)): ?>
                                        <?php if($infix_general_setting->date_format_id == $value->id): ?>
                                        selected
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        ><?php echo e($value->normal_view); ?> [<?php echo e($value->format); ?>]</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('date_format_id')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('date_format_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                        </div>

                        <div class="row ">

                        <div class="col-lg-4 mb-40">
                                    <div class="input-effect">
                                         <select name="time_zone" class="niceSelect w-100 bb form-control <?php echo e($errors->has('time_zone') ? ' is-invalid' : ''); ?>" id="time_zone">
                                            <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.time_zone'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.time_zone'); ?> *</option>

                                            <?php $__currentLoopData = $time_zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time_zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($time_zone->id); ?>" <?php echo e($time_zone->id == $infix_general_setting->time_zone_id? 'selected':''); ?>><?php echo e($time_zone->time_zone); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                        <span class="focus-border"></span>
                                            <?php if($errors->has('time_zone')): ?>
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong><?php echo e($errors->first('time_zone')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                     </div>
                                </div>




                                <div class="col-lg-4 mb-40">
                                    <div class="input-effect">
                                         <select name="currency" class="niceSelect w-100 bb form-control <?php echo e($errors->has('currency') ? ' is-invalid' : ''); ?>" id="gs_currency">
                                            <option data-display="<?php echo app('translator')->get('lang.select_currency'); ?>" value=""><?php echo app('translator')->get('lang.select_currency'); ?></option>
                                             <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($currency->code); ?>" <?php echo e(isset($infix_general_setting)? ($infix_general_setting->currency  == $currency->code? 'selected':''):''); ?>><?php echo e($currency->name); ?> (<?php echo e($currency->code); ?>)</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('currency')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('currency')); ?></strong>
                                        </span>
                                        <?php endif; ?>

                                     </div>
                                </div>

                            <div class="col-lg-4 mb-40">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('currency_symbol') ? ' is-invalid' : ''); ?>"
                                    type="text" name="currency_symbol" autocomplete="off" value="<?php echo e(isset($infix_general_setting)? $infix_general_setting->currency_symbol : old('currency_symbol')); ?>" id="gs_currency_symbol" readonly="">
                                    <label><?php echo app('translator')->get('lang.currency_symbol'); ?> <span>*</span></label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('currency_symbol')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('currency_symbol')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex relation-button mb-40">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('lang.auto_approval'); ?></p> 
                                <div class="d-flex radio-btn-flex ml-30">
                                    <div class="mr-20">
                                        <input type="radio" name="auto_approve" id="approve_enable"  <?php echo e(@$infix_general_setting->auto_approve==1? 'checked': ''); ?> value="1" class="common-radio relationButton">
                                        <label for="approve_enable"><?php echo app('translator')->get('lang.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="auto_approve" id="approve_disable" <?php echo e(@$infix_general_setting->auto_approve==0? 'checked': ''); ?> value="0" class="common-radio relationButton" >
                                        <label for="approve_disable"><?php echo app('translator')->get('lang.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-40 d-flex relation-button">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('lang.auto_update'); ?></p>
                                <div class="d-flex radio-btn-flex ml-30">
                                    <div class="mr-20">
                                        <input type="radio" name="auto_update" id="update_enable" <?php echo e(@$infix_general_setting->auto_update==1? 'checked': ''); ?> value="1" class="common-radio relationButton">
                                        <label for="update_enable"><?php echo app('translator')->get('lang.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="auto_update" id="update_disable" <?php echo e(@$infix_general_setting->auto_update==0? 'checked': ''); ?> value="0" class="common-radio relationButton">
                                        <label for="update_disable"><?php echo app('translator')->get('lang.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-40 d-flex relation-button">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('lang.google_analytics'); ?></p>
                                <div class="d-flex radio-btn-flex ml-30">
                                    <div class="mr-20">
                                        <input type="radio" name="google_an" id="ga_update_enable" <?php echo e(@$infix_general_setting->google_an==1? 'checked': ''); ?> value="1" class="common-radio relationButton">
                                        <label for="ga_update_enable"><?php echo app('translator')->get('lang.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="google_an" id="ga_update_disable" <?php echo e(@$infix_general_setting->google_an==0? 'checked': ''); ?> value="0" class="common-radio relationButton">
                                        <label for="ga_update_disable"><?php echo app('translator')->get('lang.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-40 d-flex relation-button">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('lang.public_vendor_registration'); ?></p>
                                <div class="d-flex radio-btn-flex ml-30">
                                    <div class="mr-20">
                                        <input type="radio" name="public_vendor" id="public_vendor_enable" <?php echo e(@$infix_general_setting->public_vendor==1? 'checked': ''); ?> value="1" class="common-radio relationButton">
                                        <label for="public_vendor_enable"><?php echo app('translator')->get('lang.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="public_vendor" id="public_vendor_disable" <?php echo e(@$infix_general_setting->public_vendor==0? 'checked': ''); ?> value="0" class="common-radio relationButton">
                                        <label for="public_vendor_disable"><?php echo app('translator')->get('lang.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(moduleStatusCheck('AmazonS3') == true): ?>
                            
                            <div class="row">
                                <div class="col-lg-6 mb-40 d-flex relation-button">
                                    <p class="text-uppercase mb-0"><?php echo app('translator')->get('lang.amazons3_host'); ?></p>
                                    <div class="d-flex radio-btn-flex ml-30">
                                        <div class="mr-20">
                                            <input type="radio" name="is_s3_host" id="is_s3_host_enable" <?php echo e(@$infix_general_setting->is_s3_host==1? 'checked': ''); ?> value="1" class="common-radio relationButton">
                                            <label for="is_s3_host_enable"><?php echo app('translator')->get('lang.enable'); ?></label>
                                        </div>
                                        <div class="mr-20">
                                            <input type="radio" name="is_s3_host" id="is_s3_host_disable" <?php echo e(@$infix_general_setting->is_s3_host==0? 'checked': ''); ?> value="0" class="common-radio relationButton">
                                            <label for="is_s3_host_disable"><?php echo app('translator')->get('lang.disable'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        <?php endif; ?>

                        <div class="row ">
                            <div class="col-lg-12 md-30">
                                <div class="input-effect">
                                <textarea class="primary-input form-control" cols="0" rows="4" name="address" id="address"><?php echo e(isset($infix_general_setting) ? $infix_general_setting->address : old('address')); ?></textarea>
                                    <label><?php echo app('translator')->get('lang.address'); ?> <span></span> </label>
                                    <span class="focus-border textarea"></span>

                                </div>
                            </div>
                        </div>
                         <?php if($errors->has('address')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                    
                    </div>






                    <div class="">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        
                        <div class="mt-40" >
                                <h5><?php echo app('translator')->get('lang.banner'); ?> <?php echo app('translator')->get('lang.image'); ?> <?php echo app('translator')->get('lang.color'); ?>:</h5>
                        </div>
                        <div class="row mt-20" >
                            <div class="col-lg-4">
                                <div class="input-effect">
                                    <label><?php echo app('translator')->get('lang.background_color'); ?>-1 <span>*</span></label>
                                    <input class="color primary-input form-control<?php echo e($errors->has('color1') ? ' is-invalid' : ''); ?>" id="input1" type="text" name="color1" autocomplete="off" value="<?php echo e(isset($editData1)? $editData1->color1: old('color1')); ?>">
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('color1')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('color1')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-effect">
                                    <label><?php echo app('translator')->get('lang.background_color'); ?>-2 <span>*</span></label>
                                    <input class="color primary-input form-control<?php echo e($errors->has('color2') ? ' is-invalid' : ''); ?>" id="input1" type="text" name="color2" autocomplete="off" value="<?php echo e(isset($editData1)? $editData1->color2: old('color2')); ?>">
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('color2')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('color2')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                    <div class="input-effect">
                                        <label><?php echo app('translator')->get('lang.search_box_color'); ?><span>*</span></label>
                                        <input class="color primary-input form-control<?php echo e($errors->has('color3') ? ' is-invalid' : ''); ?>"  id="input1" type="text" name="color3" autocomplete="off" value="<?php echo e(isset($editData1)? $editData1->color3: old('color3')); ?>">
                                        <span class="focus-border"></span>
                                        <?php if($errors->has('color3')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('color3')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                   
                </div>


                    <div class="row mt-40">
                        <div class="col-lg-12 text-center">
                             <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> 
                                <button   class="primary-btn small fix-gr-bg  demo_view password_update_btn" type="button" ><?php echo app('translator')->get('lang.update'); ?></button>
                                </span>
                            <?php else: ?>
                                <button type="submit" class="primary-btn fix-gr-bg">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('lang.update'); ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>

</div>
 <script src="<?php echo e(asset('Modules/Systemsetting/Resources/assets/')); ?>/js/systemSetting.js"></script>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/updateGeneralSettings.blade.php ENDPATH**/ ?>