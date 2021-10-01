<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/css')); ?>/add_fund.css">
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.fund'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.fund'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
       

    <div class="col-md-12">

        <div class="row student-details mt_0_sm">

            <!-- Start Sms Details -->
            <div class="col-lg-12 p-0">
                <ul class="nav nav-tabs mt_0_sm mb-20 ml-0 mb-40 sm_mb_20" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#group_email_sms" selectTab="G" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.author'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" selectTab="I" href="#indivitual_email_sms" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.customer'); ?></a>
                    </li>
                    

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <input type="hidden" name="selectTab" id="selectTab">
                    <div role="tabpanel" class="tab-pane fade show active" id="group_email_sms">
                        <table id="table_id" class="display school-table  mt-20" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                    <th width="15%"><?php echo app('translator')->get('lang.email'); ?></th>
                                    <th width="10%"><?php echo app('translator')->get('lang.balance'); ?></th>
                                    
                                    
                                    <th width="15%"><?php echo app('translator')->get('lang.image'); ?></th>
                                    <th width="5%"><?php echo app('translator')->get('lang.date'); ?></th>
                                    <th width="15%"><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="<?php echo e(@$value->id); ?>">
                                    
                                    <td><?php echo e(@$value->username); ?></td>
                                    <td><?php echo e(@$value->email); ?></td>
                                    <td><?php echo e(@$value->amount); ?></td>
                                    
                                    
                                    <td valign="top"><img src="<?php echo e(@$value->profile->image ? asset(@$value->profile->image) :asset('public/frontend/img/profile/1.png')); ?>" class="add_fund_profile_img"></td>
                                    <td><?php echo e(DateFormat(@$value->balances_updated_at)); ?></td>
                                    <td>
                                            <div class="row">
                                            <div class="col-sm-6">
            
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                    <?php echo app('translator')->get('lang.select'); ?>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#AddFund<?php echo e(@$value->id); ?>"  href="#"><?php echo app('translator')->get('lang.add'); ?></a>
                                                        <a class="dropdown-item" href="<?php echo e(route('admin.fundHistory',@$value->id)); ?>"><?php echo app('translator')->get('lang.funding_history'); ?></a>
                                                    
            
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                </tr>  

                                <div class="modal fade admin-query" id="AddFund<?php echo e(@$value->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.fund'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                <form action="<?php echo e(url('admin/add-fund')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                    <div class="row no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="input-effect">
                                                                <input class="primary-input form-control" id="fund_amount" min="1" type="number" name="fund_amount" value="">
                                                                <label><?php echo app('translator')->get('lang.amount'); ?><span>*</span></label>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="user_id" value="<?php echo e(@$value->id); ?>">
                                                    
                                        
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                            <a href="<?php echo e(route('admin.customerDeleted',@$value->id)); ?>" class="text-light">
                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.add'); ?></button>
                                                            </a>
                                                    </div>

                                                </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="indivitual_email_sms">
                        <div class="row mb-35">

                            <div class="col-lg-12">
                                <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('lang.email'); ?></th>
                                        <th width="10%"><?php echo app('translator')->get('lang.balance'); ?></th>
                                        
                                        
                                        <th width="15%"><?php echo app('translator')->get('lang.image'); ?></th>
                                        <th width="5%"><?php echo app('translator')->get('lang.date'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('lang.action'); ?></th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="<?php echo e(@$value->id); ?>">
                                            
                                            <td><?php echo e(@$value->username); ?></td>
                                            <td><?php echo e(@$value->email); ?></td>
                                                <td><?php echo e(@$value->amount); ?></td>
                                            
                                            
                                            <td valign="top"><img src="<?php echo e(@$value->profile->image ? asset(@$value->profile->image) :asset('public/frontend/img/profile/1.png')); ?>" class="add_fund_profile_img"></td>
                                            <td><?php echo e(DateFormat(@$value->balances_updated_at)); ?></td>
                                            <td>
                                                <div class="row">
                                                <div class="col-sm-6">
                
                                                <div class="dropdown">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                        <?php echo app('translator')->get('lang.select'); ?>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#AddFund<?php echo e(@$value->id); ?>"  href="#"><?php echo app('translator')->get('lang.add'); ?></a>
                                                            <a class="dropdown-item" href="<?php echo e(route('admin.fundHistory',@$value->id)); ?>"><?php echo app('translator')->get('lang.funding_history'); ?></a>
                                                        
                
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                    </tr>  
        
                                    <div class="modal fade admin-query" id="AddFund<?php echo e(@$value->id); ?>" >
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.fund'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
        
                                                    <div class="modal-body">
                                                    <form action="<?php echo e(url('admin/add-fund')); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                        <div class="row no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="input-effect">
                                                                    <input class="primary-input form-control" id="fund_amount" min="0" type="number" name="fund_amount" value="">
                                                                    <label><?php echo app('translator')->get('lang.amount'); ?><span>*</span></label>
                                                                    <span class="focus-border"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="user_id" value="<?php echo e(@$value->id); ?>">
                                                        
                                            
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                                
                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.add'); ?></button>
                                                            
                                                        </div>

                                                    </form>
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
                    <!-- End Individual Tab -->

                   
                </div>
            </div>
        </div>
    </div>




    </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/fund/add_fund.blade.php ENDPATH**/ ?>