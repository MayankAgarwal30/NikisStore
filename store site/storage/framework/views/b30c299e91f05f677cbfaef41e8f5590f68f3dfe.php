
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php
function showPicName($data){
$name = explode('/', $data);
return $name[array_key_last($name)];
}
?>


<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <?php if(@$edit): ?>                
               <h1><?php echo app('translator')->get('lang.edit'); ?>  <?php echo app('translator')->get('lang.user'); ?></h1>
            <?php else: ?>
              <h1><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.new'); ?> <?php echo app('translator')->get('lang.user'); ?></h1>
            <?php endif; ?>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.management'); ?></a>
                <?php if(@$edit): ?>                
                <a href="#"><?php echo app('translator')->get('lang.edit'); ?> <?php echo app('translator')->get('lang.user'); ?></a>
                <?php else: ?>
                 <a href="#"><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.new'); ?> <?php echo app('translator')->get('lang.user'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.information'); ?></h3>
                </div>
            </div>

            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                <a href="<?php echo e(route('admin.user_list')); ?>" class="primary-btn small fix-gr-bg">
                     <?php echo app('translator')->get('lang.all'); ?> <?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.list'); ?>
                </a>
            </div>
            
        </div>
        <?php if(@isset($edit)): ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin.add_user_update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <?php else: ?>            
          <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin.add_user_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success')): ?>
                <div class="alert alert-success">
                  <?php echo e(session()->get('message-success')); ?>

              </div>
              <?php elseif(session()->has('message-danger')): ?>
              <div class="alert alert-danger">
                  <?php echo e(session()->get('message-danger')); ?>

              </div>
              <?php endif; ?>
              <div class="white-box">
                <div class="">
                   
                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                    <input type="hidden" name="id" id="id" value="<?php echo e(isset($edit) ? $edit->id : ''); ?>"> 
                    <div class="row ">
                     
                        <div class="col-lg-3 mb-30">
                            <div class="input-effect">
                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>" name="role_id" id="role_id">
                                    <option data-display="Role *" value=""><?php echo app('translator')->get('lang.select'); ?></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php echo e(isset($edit) ? $edit->role_id == $value->id? 'selected': '' : old('role_id') == ($value->id? 'selected': '')); ?> ><?php echo e($value->name); ?></option>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="focus-border"></span>
                                <?php if($errors->has('role_id')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('role_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                            <div class="input-effect">
                                <input class="primary-input form-control <?php echo e($errors->has('first_name') ? 'is-invalid' : ' '); ?>" type="text"  name="first_name" value="<?php echo e(isset($edit) ? $edit->profile->first_name : old('first_name')); ?>">
                                <span class="focus-border"></span>
                                <label><?php echo app('translator')->get('lang.first'); ?> <?php echo app('translator')->get('lang.name'); ?> <span>*</span> </label>
                                <?php if($errors->has('first_name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                            <div class="input-effect">
                                <input class="primary-input form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" type="text"  name="last_name" value="<?php echo e(isset($edit) ? $edit->profile->last_name : old('last_name')); ?>">
                                <span class="focus-border"></span>
                                <label><?php echo app('translator')->get('lang.last'); ?> <?php echo app('translator')->get('lang.name'); ?> <span>*</span> </label>
                                <?php if($errors->has('last_name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                            <div class="input-effect">
                                <input class="primary-input form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" type="text" name="username" value="<?php echo e(old('username')? old('username') : @$edit->username); ?>">
                                <span class="focus-border"></span>
                                <label><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.name'); ?> <span>*</span></label>
                                <?php if($errors->has('username')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('username')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                       <div class="col-lg-3 mb-30">
                        <div class="input-effect">
                            <input class="primary-input form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="email"  name="email" value="<?php echo e(old('email')? old('email') : @$edit->email); ?>">
                            <span class="focus-border"></span>
                            <label><?php echo app('translator')->get('lang.email'); ?> <span>*</span> </label>
                            <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 mb-30">
                        <div class="no-gutters input-right-icon">
                            <div class="col">
                                <div class="input-effect">
                                    <input class="primary-input date form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                     name="date_of_birth" value="<?php echo e(old('date_of_birth')? old('date_of_birth') : @$edit->profile->dob); ?>" autocomplete="off">
                                    <span class="focus-border"></span>
                                    <label><?php echo app('translator')->get('lang.Date_of_birth'); ?></label>
                                    <?php if($errors->has('date_of_birth')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('date_of_birth')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="" type="button">
                                    <i class="ti-calendar" id="start-date-icon"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-30">
                        <div class="no-gutters input-right-icon">
                            <div class="col">
                                <div class="input-effect">
                                    <input class="primary-input date form-control<?php echo e($errors->has('date_of_joining') ? ' is-invalid' : ''); ?>" id="date_of_joining" type="text"
                                     name="date_of_joining" value="<?php echo e(isset($edit->profile->date_of_joining) ?$edit->profile->date_of_joining: date('m/d/Y')); ?>">
                                    <span class="focus-border"></span>
                                    <label> <?php echo app('translator')->get('lang.date_of_joining'); ?> <span>*</span> </label>
                                    <?php if($errors->has('date_of_joining')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('date_of_joining')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="" type="button">
                                    <i class="ti-calendar" id="date_of_joining"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-30">
                        <div class="input-effect">
                            <input class="primary-input form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" type="text" onkeypress="return isNumberKey(event)"  name="mobile" value="<?php echo e(old('mobile')? old('mobile') : @$edit->profile->mobile); ?>">
                            <span class="focus-border"></span>
                            <label><?php echo app('translator')->get('lang.mobile'); ?> <span></span> </label>
                            <?php if($errors->has('mobile')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('mobile')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row ">
                
                
                <div class="col-lg-6 mt-45">
                <div class="row no-gutters input-right-icon">
              
                    <div class="col">
                        <div class="input-effect">
                            <input class="primary-input form-control <?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" type="text"
                                    id="placeholderPhoto"
                                    placeholder="<?php echo e(@$edit->profile->image != ""? showPicName(@$edit->profile->image):'Profile Photo (100 * 100 px)'); ?>"
                                    readonly="">
                            <span class="focus-border"></span>
                            <?php if($errors->has('image')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('image')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="primary-btn-small-input"
                                type="button">
                            <label class="primary-btn small fix-gr-bg"
                                    for="photo"><?php echo app('translator')->get('lang.browse'); ?></label>
                            <input type="file" class="d-none" name="image"
                            id="photo">
                        </button>
                        
                    </div>
                </div>
            </div>
                    <div class="col-lg-6">
                        <div class="input-effect">
                            <textarea class="primary-input form-control <?php echo e($errors->has('current_address') ? 'is-invalid' : ''); ?>" cols="0" rows="4" name="current_address" id="current_address"><?php echo e(isset($edit) ? $edit->profile->address : old('current_address')); ?></textarea>
                            <label><?php echo app('translator')->get('lang.address'); ?> <span></span> </label>
                            <span class="focus-border textarea"></span>
    
                            <?php if($errors->has('current_address')): ?>
                             <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('current_address')); ?></strong>
                            </span>
                            <?php endif; ?> 
                        </div>
                    </div>
    
                </div>

<div class="row mt-40">
    <div class="col-lg-12 text-center">
        <button class="primary-btn fix-gr-bg">
            <span class="ti-check"></span>
            
            <?php if(@isset($edit)): ?>
            <?php echo app('translator')->get('lang.update'); ?>  <?php echo app('translator')->get('lang.user'); ?> 
        <?php else: ?>
            <?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.user'); ?>
        <?php endif; ?>

        </button>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php echo e(Form::close()); ?>

</div>
</section>

<div class="modal" id="LogoPic">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('lang.Crop_Image_And_Upload'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="resize"></div>
                <button class="btn rotate float-lef" data-deg="90" > 
                <i class="ti-back-right"></i></button>
                <button class="btn rotate float-right" data-deg="-90" > 
                <i class="ti-back-left"></i></button>
                <hr>
                
                <button class="primary-btn fix-gr-bg pull-right" id="upload_logo"><?php echo app('translator')->get('lang.crop'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/croppie.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/editStaff.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/HumanResource/Resources/views/add_user.blade.php ENDPATH**/ ?>