
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.management'); ?></a>
                <a href="<?php echo e(route('admin.user_list')); ?>"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area  DM_table_info ">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?> </h3>
                </div>
            </div>
           <?php if(Auth::user()->role_id == 1 ): ?>
                <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                    <a href="<?php echo e(route('admin.add_user')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.user'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
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
              </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin.user_search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <div class="col-lg-4">
                              <select class="niceSelect w-100 bb form-control" name="role_id" id="role_id">
                                    <option data-display="Role" value=""> <?php echo app('translator')->get('lang.select'); ?> </option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input" type="text" placeholder=" <?php echo app('translator')->get('lang.search_by_email'); ?>" name="email">
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                           </div>
                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input" type="text" placeholder="<?php echo app('translator')->get('lang.search_by_name'); ?>" name="username">
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                           </div>
                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search pr-2"></span>
                                <?php echo app('translator')->get('lang.search'); ?>
                            </button>
                        </div>
                    </div>
            <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
 <div class="row mt-40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title lm_mb_35 sm_mb_20">
                        <h3 class="mb-0"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                    </div>
                </div>
            </div>

         <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('lang.username'); ?></th>
                                <th><?php echo app('translator')->get('lang.role'); ?></th>
                                <th><?php echo app('translator')->get('lang.country'); ?></th>
                                <th><?php echo app('translator')->get('lang.image'); ?></th>
                                <th><?php echo app('translator')->get('lang.mobile'); ?></th>
                                <th><?php echo app('translator')->get('lang.email'); ?></th>
                                <th><?php echo app('translator')->get('lang.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->username); ?></td>
                                <td><?php echo e(!empty($value->role->name)?$value->role->name:''); ?></td>
                                <td><?php echo e(@$value->profile->country->name); ?></td>
                                <td><img src="<?php echo e(@$value->profile->image? asset(@$value->profile->image):asset('public/frontend/img/profile/1.png')); ?>" width="60" height="auto" alt=""></td>
                                <td><?php echo e(@$value->profile->mobile); ?></td>
                                <td><?php echo e(@$value->email); ?></td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            <?php echo app('translator')->get('lang.select'); ?>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?php echo e(route('admin.customer_view', $value->id)); ?>"><?php echo app('translator')->get('lang.view'); ?></a>
                                           <?php if(Auth::user()->role_id == 1 ): ?>

                                            <a class="dropdown-item" href="<?php echo e(route('admin.user_edit', $value->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                           <?php endif; ?>
                                           <?php if(Auth::user()->role_id == 1 ): ?>

                                                <?php if($value->role_id != Auth::user()->role_id ): ?>
                                            
                                                <a class="dropdown-item modalLink" data-toggle="modal" data-modal-size="modal-md" data-target="#deleteHumanDepartModal<?php echo e($value->id); ?>" href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                       
                                        </div>
                                    </div>
                                </td>
                            </tr>




                            <div class="modal fade admin-query" id="deleteHumanDepartModal<?php echo e($value->id); ?>" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.user'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                            </div>

                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                 <?php echo e(Form::open(['url' => 'admin/vendor-deleted/'.$value->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                 <?php echo e(Form::close()); ?>

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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/HumanResource/Resources/views/index.blade.php ENDPATH**/ ?>