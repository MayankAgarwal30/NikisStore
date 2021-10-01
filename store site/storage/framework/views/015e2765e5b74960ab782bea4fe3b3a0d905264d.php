
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
                <h1><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#" class="active"><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                </div>
            </div>
        </div>
    </section>


    <section class="admin-visitor-area DM_table_info">
        <div class="container-fluid p-0">
            <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('admin.subCategory')); ?>" class="primary-btn small fix-gr-bg">
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
                                    <?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.category'); ?> 
                                </h3>
                            </div>
                            <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                                <form action="<?php echo e(url('admin/sub-category-update')); ?>" method="POST"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <?php else: ?>
                                        <form action="<?php echo e(url('admin/sub-category-store')); ?>" method="POST"
                                              class="form-horizontal" enctype="multipart/form-data">
                                            <?php endif; ?>
                                            <?php echo csrf_field(); ?>

                                            <div class="white-box">
                                                <div class="add-visitor">
                                                    <div class="row mb-25">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>"
                                                                        name="category_id">
                                                                    <option data-display="<?php echo app('translator')->get('lang.category'); ?> *"
                                                                            value=""><?php echo app('translator')->get('lang.category'); ?> *
                                                                    </option>
                                                                    <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value=<?php echo e(@$item->id); ?> <?php echo e(@$item->id == @$data['edit']->item_category_id ?'selected':old('category_id') ==( @$item->id ? 'selected':'')); ?>><?php echo e(@$item->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="focus-border"></span>
                                                                <?php if($errors->has('category_id')): ?>
                                                                    <span class="invalid-feedback invalid-select"
                                                                          role="alert">
                                                                        <strong><?php echo e($errors->first('category_id')); ?></strong>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <input class="primary-input form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                                       type="text" name="title" autocomplete="off"
                                                                       value="<?php echo e(isset($data['edit'])? $data['edit']->title:old('title')); ?>">

                                                                <input type="hidden" name="id"
                                                                       value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
                                                                <label><?php echo app('translator')->get('lang.name'); ?> <span>*</span></label>
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
                                                                <input class="primary-input form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"
                                                                       type="text" name="description" autocomplete="off"
                                                                       value="<?php echo e(isset($data['edit'])? $data['edit']->description:old('description')); ?>">

                                                                <input type="hidden" name="id"
                                                                       value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
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
                                                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>"
                                                                        name="active_status">
                                                                    <option data-display="<?php echo app('translator')->get('lang.status'); ?> *"
                                                                            value=""><?php echo app('translator')->get('lang.status'); ?> *
                                                                    </option>
                                                                    <option value="1" <?php echo e(@$data['edit']->active_status ==1 ?'selected':old('active_status') ==(1 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.active'); ?></option>
                                                                    <option value="2" <?php echo e(@$data['edit']->active_status ==2 ?'selected':old('active_status') ==(2 ? 'selected':'')); ?>><?php echo app('translator')->get('lang.inactive'); ?></option>
                                                                </select>
                                                                <span class="focus-border"></span>
                                                                <?php if($errors->has('active_status')): ?>
                                                                    <span class="invalid-feedback invalid-select"
                                                                          role="alert">
                                                                        <strong><?php echo e($errors->first('active_status')); ?></strong>
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
                                                    <div class="row mt-40">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="primary-btn fix-gr-bg">
                                                                <span class="ti-check"></span>
                                                                <?php if(isset($data['edit'])): ?>
                                                                    <?php echo app('translator')->get('lang.update'); ?>
                                                                <?php else: ?>
                                                                    <?php echo app('translator')->get('lang.save'); ?>
                                                                <?php endif; ?>

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
                                <h3 class="mb-0"><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.list'); ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>

                                <tr>
                                    <th><?php echo app('translator')->get('lang.name'); ?></th>
                                    <th><?php echo app('translator')->get('lang.category'); ?></th>
                                    <th><?php echo app('translator')->get('lang.description'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data['subCategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td valign="top"><?php echo e(@$item->title); ?></td>
                                        <td valign="top"><?php echo e(@$item->category !=""? @$item->category->title:""); ?></td>
                                        <td valign="top"><?php echo e(@$item->description); ?></td>
                                        <td valign="top">
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    <?php echo app('translator')->get('lang.select'); ?>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.editSubCategory',@$item->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                       data-target="#deleteClassModal<?php echo e(@$item->id); ?>"
                                                       href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$item->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.category'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                    </div>

                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                        <a href="<?php echo e(route('admin.deleteSubCategory',@$item->id)); ?>" class="text-light">
                                                            <button class="primary-btn fix-gr-bg"
                                                                    type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
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





<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/product/subCategory.blade.php ENDPATH**/ ?>