
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.coupon'); ?></a>
                <a href="<?php echo e(route('admin.coupon')); ?>" class="active"><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                <?php if(isset($data['edit']) && !empty(@$data['edit'])): ?>
                <a href="#" class="active"><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.edit'); ?></a>
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
                <a href="<?php echo e(route('admin.coupon')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title lm_mb_35 sm_mb_20">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 mt-30">
                        <?php if(isset($data['edit'])): ?>
                        <form action="<?php echo e(route('admin.couponUpdate')); ?>" method="post">
                        <?php else: ?>
                        <form action="<?php echo e(route('admin.couponStore')); ?>" method="post">
                        <?php endif; ?>
                        
                            <?php echo csrf_field(); ?>
                            <div class="white-box">
                                <div class="add-visitor">
                                        <input type="hidden" name="id" value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">

                                        <div class="row mb-30">
                                            <div class="col-lg-12">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('coupon_code') ? ' is-invalid' : ''); ?>" type="text" name="coupon_code"
                                                           autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->coupon_code :old('coupon_code')); ?>">
                                                    <label><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.code'); ?> <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('coupon_code')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('coupon_code')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-lg-12">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e($errors->has('discount') ? ' is-invalid' : ''); ?>" type="text" name="discount"
                                                           autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->discount :old('discount')); ?>">
                                                    <label><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.amount'); ?> <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('discount')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('discount')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-40">
                                                <div class="col-lg-12">
                                                    <div class="input-effect">
                                                        <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('coupon_type') ? ' is-invalid' : ''); ?>"
                                                                name="coupon_type">
                                                            <option data-display="<?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.type'); ?> *" value=""><?php echo app('translator')->get('lang.coupon'); ?> <?php echo app('translator')->get('lang.type'); ?></option>
                                                            <option  value="0" <?php echo e(isset($data['edit'])? ($data['edit']->coupon_type==0? 'selected':'' ) :''); ?>><?php echo app('translator')->get('lang.once'); ?></option>
                                                            <option  value="1" <?php echo e(isset($data['edit'])? ($data['edit']->coupon_type==1? 'selected':'' ) :''); ?>><?php echo app('translator')->get('lang.multiple'); ?></option>
                                                           
                                                        </select>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('coupon_type')): ?>
                                                            <span class="invalid-feedback invalid-select"
                                                                  role="alert">
                                                                <strong><?php echo e($errors->first('coupon_type')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row mb-40">
                                                <div class="col-lg-12">
                                                    <div class="input-effect">
                                                        <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('discount_type') ? ' is-invalid' : ''); ?>"
                                                                name="discount_type">
                                                            <option data-display="<?php echo app('translator')->get('lang.discount'); ?> <?php echo app('translator')->get('lang.type'); ?> *" value=""><?php echo app('translator')->get('lang.discount'); ?> <?php echo app('translator')->get('lang.type'); ?></option>
                                                            <option  value="0" <?php echo e(isset($data['edit'])? ($data['edit']->discount_type==0? 'selected':'' ) :''); ?>><?php echo app('translator')->get('lang.fixed'); ?></option>
                                                            <option  value="1" <?php echo e(isset($data['edit'])? ($data['edit']->discount_type==1? 'selected':'' ) :''); ?>><?php echo app('translator')->get('lang.percent'); ?> (%)</option>
                                                           
                                                        </select>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('discount_type')): ?>
                                                            <span class="invalid-feedback invalid-select"
                                                                  role="alert">
                                                                <strong><?php echo e($errors->first('discount_type')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
    

                                    <div class="row mt-30">
                                        <div class="col-lg-12">
                                         <div class="input-effect">
                                             <input class="primary-input date form-control <?php echo e($errors->has('from') ? ' is-invalid' : ''); ?>" type="text" value="<?php echo e(isset($data['edit'])? date('m/d/Y',strtotime($data['edit']->from))  :''); ?>" readonly placeholder="<?php echo app('translator')->get('lang.start_date'); ?>" id="startDate"  name="from">
                                             <span class="focus-border"></span>
                                                     <?php if($errors->has('from')): ?>
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong><?php echo e($errors->first('from')); ?></strong>
                                                     </span>
                                                     <?php endif; ?>
                                         </div>
                                     </div>
                                    </div>
                                     <div class="row mt-30">
                                        <div class="col-lg-12">
                                         <div class="input-effect">
                                             <input class="primary-input date form-control <?php echo e($errors->has('to') ? ' is-invalid' : ''); ?>" type="text" value="<?php echo e(isset($data['edit'])? date('m/d/Y',strtotime($data['edit']->to)) :''); ?>" readonly placeholder="<?php echo app('translator')->get('lang.end_date'); ?>" id="endDate"  name="to">
                                             <span class="focus-border"></span>
                                                <?php if($errors->has('to')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('to')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                         </div>
                                     </div>
                                    </div>
                                 
    
    
    
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>" name="active_status">
                                                    <option data-display="<?php echo app('translator')->get('lang.status'); ?> *" value=""><?php echo app('translator')->get('lang.status'); ?> *</option> 
                                                    <option value="1" <?php echo e(isset($data['edit'])? $data['edit']->status == 1?'selected':'': 'selected'); ?> ><?php echo app('translator')->get('lang.active'); ?></option> 
                                                    <option value="2" <?php echo e(isset($data['edit'])? $data['edit']->status == 2?'selected':'': ''); ?>><?php echo app('translator')->get('lang.inactive'); ?></option> 
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
    
    
    
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg">
                                                <span class="ti-check"></span>
                                                <?php if(isset($data['edit'])): ?>
                                                    <?php echo app('translator')->get('lang.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('lang.save'); ?>
                                                <?php endif; ?>
                                                <?php echo app('translator')->get('lang.coupon'); ?>
    
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                           
                                <tr>
                                    <th><?php echo app('translator')->get('lang.code'); ?></th>
                                    <th><?php echo app('translator')->get('lang.discount'); ?></th>
                                    
                                    <th><?php echo app('translator')->get('lang.coupon_type'); ?></th>
                                    <th><?php echo app('translator')->get('lang.discount'); ?> <?php echo app('translator')->get('lang.type'); ?></th>
                                    <th><?php echo app('translator')->get('lang.valid'); ?> <?php echo app('translator')->get('lang.date'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['coupon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td valign="top"><?php echo e(@$item->coupon_code); ?> </td>
                                    <td valign="top"><?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$item->discount); ?></td>
                                    
                                    <td valign="top">
                                        <?php if($item->coupon_type==0): ?>
                                            <?php echo app('translator')->get('lang.once'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('lang.multiple'); ?>
                                        <?php endif; ?> 
                                    </td>
                                    <td valign="top">
                                        <?php if($item->discount_type==0): ?>
                                            <?php echo app('translator')->get('lang.fixed'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('lang.percent'); ?>
                                        <?php endif; ?> 
                                    </td>
                                    <td valign="top">
                                        <?php echo e(DateFormat(@$item->from)); ?> - 
                                        <?php echo e(DateFormat(@$item->to)); ?>


                                    </td>
                                    <td valign="top">
                                            <?php if(@$item->status == 1  && date('y-m-d', strtotime(@$item->from)) <= date('y-m-d') && date('y-m-d', strtotime(@$item->to)) >= date('y-m-d') ): ?>
                                            <?php echo app('translator')->get('lang.active'); ?>
                                            <?php else: ?>   
                                            <?php echo app('translator')->get('lang.inactive'); ?>
                                            <?php endif; ?>
                                    </td>
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo e(route('admin.coupon_edit',$item->id)); ?>"  ><?php echo app('translator')->get('lang.edit'); ?></a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal<?php echo e(@$item->id); ?>" ><?php echo app('translator')->get('lang.delete'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                  <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.coupon'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                      <a href="<?php echo e(route('admin.deletecoupon',@$item->id)); ?>" class="text-light">
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



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/coupon/coupon_list.blade.php ENDPATH**/ ?>