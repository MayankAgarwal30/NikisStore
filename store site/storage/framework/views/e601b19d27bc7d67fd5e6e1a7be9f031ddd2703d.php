
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
            <h1><?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('admin.adCategory')); ?>" class="active"><?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                <a href="#" class="active"><?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.edit'); ?></a>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
        <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('admin.adCategory')); ?>" class="primary-btn small fix-gr-bg">
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
                            <h3 class="mb-30">

                                <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.category'); ?>
                            </h3>
                        </div>
                        <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                            <form action="<?php echo e(url('admin/add-category-store-update')); ?>"  method="POST" class="form-horizontal" enctype="multipart/form-data" id="addCategory">
                        <?php else: ?>
                            <form action="<?php echo e(url('admin/add-category-store')); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data" id="addCategory">
                        <?php endif; ?>
                            <?php echo csrf_field(); ?>

                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title"
                                                   autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->title :old('title')); ?>">

                                            <input type="hidden" name="id" value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
                                            <label><?php echo app('translator')->get('lang.title'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('title')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" type="text" name="description" autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->description:old('description')); ?>">

                                            <label><?php echo app('translator')->get('lang.description'); ?> </label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('description')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('up_permission') ? ' is-invalid' : ''); ?>" name="up_permission">
                                                <option data-display="<?php echo app('translator')->get('lang.up'); ?> <?php echo app('translator')->get('lang.permission'); ?> *" value=""><?php echo app('translator')->get('lang.up'); ?> <?php echo app('translator')->get('lang.permission'); ?> *</option> 
                                                 <option value="1" <?php echo e(@$data['edit']->up_permission ==1 ?'selected':old('up_permission') ==(1 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.yes'); ?></option> 
                                                <option value="2" <?php echo e(@$data['edit']->up_permission ==2 ?'selected':old('up_permission') ==(2 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.no'); ?></option> 
                                            </select>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('up_permission')): ?>
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong><?php echo e($errors->first('up_permission')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('up_permission') ? ' is-invalid' : ''); ?>" name="file_permission">
                                                <option data-display="<?php echo app('translator')->get('lang.file'); ?> <?php echo app('translator')->get('lang.permission'); ?> *" value=""><?php echo app('translator')->get('lang.file'); ?> <?php echo app('translator')->get('lang.permission'); ?> *</option> 
                                               <option value="1" <?php echo e(@$data['edit']->file_permission ==1 ?'selected':old('file_permission') ==(1 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.yes'); ?></option> 
                                                <option value="2" <?php echo e(@$data['edit']->file_permission ==2 ?'selected':old('file_permission') ==(2 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.no'); ?></option> 
                                            </select>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('file_permission')): ?>
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong><?php echo e($errors->first('file_permission')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('recommended_price') ? ' is-invalid' : ''); ?>" type="text" name="recommended_price"
                                                   autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->recommended_price :old('recommended_price')); ?>">
                                            <label><?php echo app('translator')->get('lang.RECM_regular'); ?> <?php echo app('translator')->get('lang.price'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('recommended_price')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('recommended_price')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('recommended_price_extended') ? ' is-invalid' : ''); ?>" type="text" name="recommended_price_extended"
                                                   autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->recommended_price_extended :old('recommended_price_extended')); ?>">
                                            <label><?php echo app('translator')->get('lang.RECM_extended'); ?>   <?php echo app('translator')->get('lang.price'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('recommended_price_extended')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('recommended_price_extended')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('recommended_price_commercial') ? ' is-invalid' : ''); ?>" type="text" name="recommended_price_commercial"
                                                   autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->recommended_price_commercial :old('recommended_price_commercial')); ?>">
                                            <label><?php echo app('translator')->get('lang.RECM_commercial'); ?>   <?php echo app('translator')->get('lang.price'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('recommended_price_commercial')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('recommended_price_commercial')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                            <div class="">
                                            <input type="checkbox" id="category" class="common-checkbox" name="show_menu" value="1" <?php echo e(isset($data['edit'])?(@$data['edit']->show_menu == 1? 'checked':''):''); ?>>
                                            <label for="category"><?php echo app('translator')->get('lang.show_in_menu'); ?></label>
                                        </div>
                                    </div>
                                </div>

                                <?php if(isset($data['edit'])): ?>
                                    
                               
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <select id="category_status" class="niceSelect w-100 bb form-control<?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>" onchange="changeOrder()" name="active_status">
                                                <option data-display="<?php echo app('translator')->get('lang.status'); ?> *" value=""><?php echo app('translator')->get('lang.status'); ?> *</option> 
                                                <option value="1" <?php echo e(@$data['edit']->active_status ==1 ?'selected':old('active_status') ==(1 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.active'); ?></option> 
                                                <option value="2" <?php echo e(@$data['edit']->active_status ==2 ?'selected':old('active_status') ==(2 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.inactive'); ?></option> 
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
                                <?php endif; ?>
                                <?php
                                    $categories_position=ItemCategory();
                                    $positions=[];
                                    $order=[];
                                    foreach($categories_position as $cat_position){
                                        $positions[$cat_position->id]=$cat_position->position;
                                    }
                                    $category_count=$categories_position->count();
                                    for ($i=1; $i < $category_count+1; $i++) { 
                                       $order[$i]=$i;
                                    }
                                    $positions=array_diff($order,$positions);
                                    $max_order=max($order)+1;
                                   
                                ?>

                                <div class="row mt-25 dm_display_none" id="position_div" >
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('position') ? ' is-invalid' : ''); ?>" name="position">
                                                <option data-display="<?php echo app('translator')->get('lang.position'); ?> *" value=""><?php echo app('translator')->get('lang.position'); ?> *</option> 
                                               <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orde): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               
                                            <option data-display="<?php echo e($orde); ?>" value="<?php echo e($orde); ?>" ><?php echo e($orde); ?></option> 
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               <option data-display="<?php echo e($max_order); ?>" value="<?php echo e($max_order); ?>"><?php echo e($max_order); ?></option> 
                                            </select>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('position')): ?>
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong><?php echo e($errors->first('position')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if(@$data['edit']->active_status==1): ?>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('position') ? ' is-invalid' : ''); ?>" name="position">
                                                    <option data-display="<?php echo app('translator')->get('lang.position'); ?> *" value=""><?php echo app('translator')->get('lang.position'); ?> *</option> 
                                                    <option data-display="<?php echo e(@$data['edit']->position); ?>" value="<?php echo e(@$data['edit']->position); ?>"><?php echo e(@$data['edit']->position); ?></option> 
                                                    
                                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orde): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-display="<?php echo e($orde); ?>" value="<?php echo e($orde); ?>" <?php echo e(@$data['edit']->position ==$orde ? 'selected':''); ?>><?php echo e($orde); ?></option> 
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('position')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('position')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                
                                <div class="row mt-50">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            <?php if(isset($data['edit'])): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                            <?php echo app('translator')->get('lang.category'); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title sm_mb_20 lm_mb_35">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                           
                                <tr>
                                    <th><?php echo app('translator')->get('lang.position'); ?></th>
                                    <th><?php echo app('translator')->get('lang.up'); ?> <?php echo app('translator')->get('lang.permission'); ?></th>
                                    <th><?php echo app('translator')->get('lang.file'); ?> <?php echo app('translator')->get('lang.permission'); ?></th>
                                    <th><?php echo app('translator')->get('lang.title'); ?></th>
                                    <th><?php echo app('translator')->get('lang.RECM_regular'); ?></th>
                                    <th><?php echo app('translator')->get('lang.RECM_extended'); ?></th>
                                    <th><?php echo app('translator')->get('lang.RECM_commercial'); ?></th>
                                    
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td valign="top"><?php echo e($item->position); ?></td>
                                    <td valign="top">
                                                    <?php if(@$item->up_permission == 1): ?>
                                                    <?php echo app('translator')->get('lang.yes'); ?>
                                                    <?php else: ?>   
                                                    <?php echo app('translator')->get('lang.no'); ?>
                                                    <?php endif; ?>
                                    </td>
                                    <td valign="top">
                                                    <?php if(@$item->file_permission == 1): ?>
                                                    <?php echo app('translator')->get('lang.yes'); ?>
                                                    <?php else: ?>   
                                                    <?php echo app('translator')->get('lang.no'); ?>
                                                    <?php endif; ?>
                                    </td>
                                    <td valign="top"><?php echo e(@$item->title); ?></td>
                                    <td valign="top"><?php echo e(@$item->recommended_price); ?></td>
                                    <td valign="top"><?php echo e(@$item->recommended_price_extended); ?></td>
                                    <td valign="top"><?php echo e(@$item->recommended_price_commercial); ?></td>
                                    
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo e(url('admin/add-category-edit/'.@$item->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal<?php echo e(@$item->id); ?>"  href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                  <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.category'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                      <a href="<?php echo e(route('admin.deleteCategory',@$item->id)); ?>" class="text-light">
                                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                     </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/product/adCategory.blade.php ENDPATH**/ ?>