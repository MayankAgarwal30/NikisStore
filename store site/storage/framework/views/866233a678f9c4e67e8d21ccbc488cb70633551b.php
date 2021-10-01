
<?php $__env->startSection('mainContent'); ?> 
<link rel="stylesheet" href="<?php echo e(url('Modules/Pages/Assets/css/style.css')); ?>">  
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.license'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.frontend_CMS'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.license'); ?> <?php echo app('translator')->get('lang.page'); ?> </a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row"> 
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"> <?php echo app('translator')->get('lang.update'); ?>
                                    <?php echo app('translator')->get('lang.license'); ?> <?php echo app('translator')->get('lang.page'); ?> 
                            </h3>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'LicensePageUpdate',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                         <input type="hidden" name="id" value="<?php echo e(isset($editData1)? $editData1->id: ''); ?>"> 
                        <div class="white-box">
                            <div class="add-visitor">  
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('heading') ? ' is-invalid' : ''); ?>"
                                                type="text" name="heading" autocomplete="off" value="<?php echo e(isset($editData1)? $editData1->heading:old('heading')); ?>">
                                            <label><?php echo app('translator')->get('lang.heading'); ?>-1<span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('heading')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('heading')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                        name="heading_text"><?php echo e(isset($editData1)? @$editData1->heading_text: old('heading_text')); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.heading_text'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('heading_text')): ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('heading_text')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('heading2') ? ' is-invalid' : ''); ?>"
                                                type="text" name="heading2" autocomplete="off" value="<?php echo e(isset($editData1)? $editData1->heading2:old('heading2')); ?>">
                                            <label><?php echo app('translator')->get('lang.heading'); ?>-2<span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('heading2')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('heading2')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                        name="heading2_text"><?php echo e(isset($editData1)? @$editData1->heading2_text: old('heading2_text')); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.heading_text'); ?> -2 <span class="text-red">*</span></label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('heading2_text')): ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('heading2_text')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                      <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title=" test ">
                                            <span class="ti-check"></span>
                                            <?php if(isset($editData1)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?> 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor mt-40">
    <div class="container-fluid p-0">
        <?php if(isset($editData)): ?>
      
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('pages/license')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add'); ?>
                </a>
            </div>
        </div>
       
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($editData)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.Features'); ?>
                            </h3>
                        </div>
                        <?php if(isset($editData)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => ['license-feature-update'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <input type="hidden" name="id" value="<?php echo e($editData->id); ?>">
                        <?php else: ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => ['license-feature-store'],
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>

                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row"> 

                                    <div class="col-lg-12 mb-20">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('feature_title') ? ' is-invalid' : ''); ?>"
                                            type="text" name="feature_title" autocomplete="off" value="<?php echo e(isset($editData)? $editData->feature_title : ''); ?>">
                                            <label><?php echo app('translator')->get('lang.feature_title'); ?> <span>*</span> </label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('feature_title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('feature_title')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                        <div class="col-lg-12"> 
                                            <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('lang.regular'); ?> <?php echo app('translator')->get('lang.license'); ?>  </p>
                                            <div class="d-flex radio-btn-flex ml-40">
                                                <div class="mr-30">
                                                    <input type="radio" name="regular" id="relationFather" value="1" class="common-radio relationButton "<?php echo e(isset($editData) && $editData->regular == "1"? 'checked': ''); ?>  <?php echo e(old('regular') == "1"? 'checked': ''); ?>>
                                                    <label for="relationFather"><?php echo app('translator')->get('lang.yes'); ?></label>
                                                </div>
                                                <div class="mr-30">
                                                    <input type="radio" name="regular" id="relationMother" value="0" class="common-radio relationButton "<?php echo e(isset($editData) && $editData->regular == "0"? 'checked': ''); ?> <?php echo e(old('regular') == "0"? 'checked': ''); ?>>
                                                    <label for="relationMother"><?php echo app('translator')->get('lang.no'); ?></label>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                
                                    <div class="row mt-40">
                                        <div class="col-lg-12"> 
                                            <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('lang.extended'); ?> <?php echo app('translator')->get('lang.license'); ?>  </p>
                                            <div class="d-flex radio-btn-flex ml-40">
                                                <div class="mr-30">
                                                    <input type="radio" name="extended" id="extended_yes" value="1" class="common-radio relationButton "<?php echo e(isset($editData) && $editData->extended == "1"? 'checked': ''); ?> <?php echo e(old('extended') == "1"? 'checked': ''); ?>>
                                                    <label for="extended_yes"><?php echo app('translator')->get('lang.yes'); ?></label>
                                                </div>
                                                <div class="mr-30">
                                                    <input type="radio" name="extended" id="extended_no" value="0" class="common-radio relationButton" <?php echo e(isset($editData) && $editData->extended == "0"? 'checked': ''); ?> <?php echo e(old('extended') == "0"? 'checked': ''); ?>>
                                                    <label for="extended_no"><?php echo app('translator')->get('lang.no'); ?></label>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            <?php if(isset($editData)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('lang.total'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                    <thead> 
                        <tr >
                            <th> <?php echo app('translator')->get('lang.sl'); ?></th>
                            <th> <?php echo app('translator')->get('lang.feature_title'); ?></th>
                            <th> <?php echo app('translator')->get('lang.regular'); ?>  <?php echo app('translator')->get('lang.license'); ?></th> 
                            <th> <?php echo app('translator')->get('lang.extended'); ?>  <?php echo app('translator')->get('lang.license'); ?></th> 
                            <th> <?php echo app('translator')->get('lang.action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($data)): ?>
                        <?php $count=1; ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($count++); ?></td>
                            <td><?php echo e(@$value->feature_title); ?></td> 
                            <td class="text-center">  <span class="text-center <?php echo e((@$value->regular==1)? 'ti-check text-success ':'ti-close text-danger'); ?> "> </span> </td>
                            <td class="text-center">  <span class="text-center <?php echo e((@$value->extended==1)? 'ti-check text-success ':'ti-close text-danger'); ?> "> </span> </td>
                            <td>
                                <div class="row">
                                <div class="col-sm-6">

                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <?php echo app('translator')->get('lang.select'); ?>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo e(url('license-feature-edit',$value->id)); ?>"> <?php echo app('translator')->get('lang.edit'); ?></a>
                                   
                                      <a class="dropdown-item" data-toggle="modal" data-target="#deleteCategoryModal<?php echo e($value->id); ?>"  href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                            </td>
                        </tr>
                                    <div class="modal fade admin-query" id="deleteCategoryModal<?php echo e($value->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.feature'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                      <a href="<?php echo e(url('license-feature-delete',$value->id)); ?>" class="text-light">
                                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                     </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</div>

    <script src="<?php echo e(asset('/')); ?>public/backEnd/backend_modules.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Pages/Resources/views/license_page.blade.php ENDPATH**/ ?>