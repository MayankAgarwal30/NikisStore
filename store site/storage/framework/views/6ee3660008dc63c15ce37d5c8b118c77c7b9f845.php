
<?php $__env->startSection('mainContent'); ?>
<?php
function showPicName($data){
$name = explode('/', $data);
return $name[3];
}
?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.edit'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('admin.vendor')); ?>"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.edit'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area ">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.edit'); ?></h3>
                </div>
            </div>
        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['admin.vendor_update',@$data->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' =>'profile'])); ?>

        <div class="row">
            <div class="col-lg-12">
              <div class="white-box">
                <div class="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h4><?php echo app('translator')->get('lang.basic_info'); ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>

                    <input type="hidden" name="staff_id" value="<?php echo e(@$data->id); ?>"> 
                    <div class="row mb-30 mt-20">
                        <div class="col-lg-3">
                            <div class="input-effect">
                                <input class="primary-input form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" type="text"  name="username" readonly value="<?php if(isset($data)): ?><?php echo e(@$data->username); ?> <?php endif; ?>">
                                <span class="focus-border"></span>
                                <label><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.name'); ?> *</label>
                                <?php if($errors->has('username')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('username')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                                <div class="row col-lg-9 mb-30">
                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" type="text" name="first_name" value="<?php echo e((isset($data->profile->first_name)) ? $data->profile->first_name : old('first_name')); ?>">
                                            <span class="focus-border"></span>
                                            <label><?php echo app('translator')->get('lang.first'); ?> <?php echo app('translator')->get('lang.name'); ?> *</label>
                                            <?php if($errors->has('first_name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('first_name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" type="text" name="last_name" value="<?php echo e((isset($data->profile->last_name)) ? $data->profile->last_name : old('last_name')); ?>">
                                            <span class="focus-border"></span>
                                            <label><?php echo app('translator')->get('lang.last'); ?> <?php echo app('translator')->get('lang.name'); ?> *</label>
                                            <?php if($errors->has('last_name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('last_name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('company_name') ? ' is-invalid' : ''); ?>" type="text"  name="company_name" value="<?php echo e((isset($data->profile->company_name)) ? @$data->profile->company_name : old('company_name')); ?>">
                                            <span class="focus-border"></span>
                                            <label><?php echo app('translator')->get('lang.company'); ?> <?php echo app('translator')->get('lang.name'); ?></label>
                                            <?php if($errors->has('company_name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('company_name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" type="text" name="address" value="<?php echo e((isset($data->profile->address)) ? $data->profile->address : old('address')); ?>">
                                            <span class="focus-border"></span>
                                            <label><?php echo app('translator')->get('lang.address'); ?></label>
                                            <?php if($errors->has('address')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('address')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-lg-4">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="email" name="email" value="<?php if(isset($data)): ?><?php echo e(@$data->email); ?> <?php endif; ?>">
                                            <span class="focus-border"></span>
                                            <label><?php echo app('translator')->get('lang.email'); ?></label>
                                            <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="input-effect">
                                                    <input class="primary-input date form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                    name="date_of_birth" value="<?php echo e(date('m/d/Y', strtotime(@$data->profile->date_of_birth))); ?>">
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
                                    <div class="col-lg-4">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="input-effect">
                                                    <input class="primary-input date form-control<?php echo e($errors->has('date_of_joining') ? ' is-invalid' : ''); ?>" id="date_of_joining" type="text"
                                                    name="date_of_joining" value="<?php echo e(date('m/d/Y', strtotime(@$data->profile->date_of_joining))); ?> ">
                                                    <span class="focus-border"></span>
                                                    <label><?php echo app('translator')->get('lang.date_of_joining'); ?></label>
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
                                    <div class="col-lg-4 mt-40">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" type="text" name="mobile" value="<?php echo e(isset($data->profile->mobile) ? $data->profile->mobile : old('mobile')); ?>">
                                            <span class="focus-border"></span>
                                            <label><?php echo app('translator')->get('lang.mobile'); ?></label>
                                            <?php if($errors->has('mobile')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('mobile')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-40">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control" name="marital_status">
                                                <option data-display="Marital Status" value=""><?php echo app('translator')->get('lang.marital_status'); ?></option>
                                                
                                                <option value="married" <?php echo e(@$data->profile->marital_status == "married"? 'selected':''); ?>><?php echo app('translator')->get('lang.married'); ?></option>
                                                <option value="unmarried" <?php echo e(@$data->profile->marital_status == "unmarried"? 'selected':''); ?>><?php echo app('translator')->get('lang.unmarried'); ?></option>
                                                
                                            </select>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-40">
                                            <div class="row no-gutters input-right-icon mb-20">
                                            <div class="col">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control <?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" type="text"
                                                          id="placeholderPhoto" 
                                                           placeholder="<?php echo e(@$data->profile->image != ""? showPicName(@$data->profile->image):'Profile Photo (100 * 100 px)'); ?>"
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
                                
                                
                              <br>
                            </div>
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.update'); ?>
                                    </button>
                                </div>
                            </div>

                           

</div>
</div>
</div>
<?php echo e(Form::close()); ?>

</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/vendor/vendorEdit.blade.php ENDPATH**/ ?>