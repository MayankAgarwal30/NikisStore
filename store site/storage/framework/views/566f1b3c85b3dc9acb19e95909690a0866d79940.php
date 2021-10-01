
<?php $__env->startSection('mainContent'); ?>

<?php
function showPicName($data){
$name = explode('/', $data);
return $name[4];
}
function showJoiningLetter($data){
$name = explode('/', $data);
return $name[3];
}
function showResume($data){
$name = explode('/', $data);
return $name[3];
}
function showOtherDocument($data){
$name = explode('/', $data);
return $name[3];
}

?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.customer'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('admin.customer')); ?>"><?php echo app('translator')->get('lang.customer'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                <a href=""><?php echo app('translator')->get('lang.customer'); ?> <?php echo app('translator')->get('lang.edit'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="mb-40 student-details">
    <div class="container-fluid p-0">
        <div class="row">
         <div class="col-lg-3">
            <!-- Start Student Meta Information -->
            <div class="main-title">
                <h3 class="mb-20"><?php echo app('translator')->get('lang.customer'); ?> <?php echo app('translator')->get('lang.details'); ?></h3>
            </div>
            <div class="student-meta-box">
                <div class="student-meta-top"></div>
                <?php if(!empty(@$data->profile->image)): ?>
                <img class="student-meta-img img-100" src="<?php echo e(asset(@$data->profile->image)); ?>"  alt="">
                <?php else: ?>
                <img class="student-meta-img img-100" src="<?php echo e(asset('public/frontend/img/profile/1.png')); ?>"  alt="">
                <?php endif; ?>
                <div class="white-box">
                    <div class="single-meta mt-10">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                    <?php echo app('translator')->get('lang.customer'); ?> <?php echo app('translator')->get('lang.name'); ?>
                            </div>
                            <div class="value">

                                <?php if(isset($data)): ?><?php echo e(@$data->full_name); ?><?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                    <?php echo app('translator')->get('lang.role'); ?> 
                            </div>
                            <div class="value">
                               <?php if(isset($data)): ?><?php echo e(@$data->role->name); ?><?php endif; ?>
                           </div>
                       </div>
                   </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                 <?php echo app('translator')->get('lang.date_of_joining'); ?>
                            </div>
                            <div class="value">
                                <?php if(isset($data)): ?>
                                <?php echo e(DateFormat(@$data->created_at)); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Student Meta Information -->

            </div>

            <!-- Start Student Details -->
            <div class="col-lg-9 staff-details">
        
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#studentProfile" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.profile'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Earning" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.balance'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#staffDocuments" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ItemBuy" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.buy'); ?> <?php echo app('translator')->get('lang.item'); ?></a>
                    </li>
                    <li class="nav-item edit-button">
                        <a href="<?php echo e(route('admin.customer_edit',@$data->id)); ?>" class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('lang.edit'); ?>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Start Profile Tab -->
                    <div role="tabpanel" class="tab-pane fade show active" id="studentProfile">
                        <div class="white-box">
                            <h4 class="stu-sub-head"><?php echo app('translator')->get('lang.personal_info'); ?></h4>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="">
                                            <?php echo app('translator')->get('lang.mobile_no'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-6">
                                        <div class="">
                                            <?php if(isset($data)): ?><?php echo e(@$data->profile->mobile); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                            <?php echo app('translator')->get('lang.email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data)): ?><?php echo e(@$data->email); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                               <?php echo app('translator')->get('lang.company'); ?> <?php echo app('translator')->get('lang.name'); ?>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php if(isset($data->profile->company_name)): ?><?php echo e(@$data->profile->company_name); ?><?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('lang.address'); ?>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php if(isset($data->profile->address)): ?><?php echo e(@$data->profile->address); ?><?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('lang.Date_of_birth'); ?>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php if(isset($data->profile->dob)): ?> <?php echo e(DateFormat(@$data->profile->dob)); ?><?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('lang.marital_status'); ?>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                 <?php if(@$data->profile->marital_status == "married"): ?>
                                                    <?php echo app('translator')->get('lang.married'); ?>
                                                 <?php endif; ?>
                                                 <?php if(@$data->profile->marital_status == "unmarried"): ?>
                                                    <?php echo app('translator')->get('lang.unmarried'); ?>
                                                 <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </div>
                    </div>
                    <!-- End Profile Tab -->

                    <!-- Start leave Tab -->
                    <div role="tabpanel" class="tab-pane fade" id="Earning">
                        <div class="white-box">
                            <div class="row mt-30">
                                <div class="col-lg-12">
                                    <div class="row">
                                            <div class="col-lg-3 col-6">
                                                <a href="#" class="d-block">
                                                    <div class="white-box single-summery">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <h3> <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(@$data->balance->amount); ?></h3>
                                                                <p class="mb-0"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.balance'); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End leave Tab -->

                    <!-- Start Documents Tab -->
                    <div role="tabpanel" class="tab-pane fade" id="staffDocuments">
                        <div class="white-box">
                            <h4 class="stu-sub-head"><?php echo app('translator')->get('lang.added'); ?> <?php echo app('translator')->get('lang.card'); ?></h4>
                            <?php if(isset($data->credit_card)): ?>                            
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="">
                                             <?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-6">
                                        <div class="">
                                            <?php if(isset($data->credit_card)): ?><?php echo e(@$data->credit_card->name); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.number'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data->credit_card)): ?><?php echo e(@$data->credit_card->card_number); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.cvc'); ?> 
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(isset($data->credit_card)): ?><?php echo e(@$data->credit_card->cvc); ?><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.expiration'); ?> <?php echo app('translator')->get('lang.date'); ?> 
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php echo e(@$data->credit_card->exp_mm); ?>/<?php echo e(@$data->credit_card->exp_yy); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>                           
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.status'); ?> 
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7">
                                        <div class="">
                                            <?php if(@$data->credit_card->status == 1): ?>
                                            <?php echo app('translator')->get('lang.active'); ?>
                                            <?php else: ?>   
                                            <?php echo app('translator')->get('lang.pending'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <?php else: ?>
                            <div class="single-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="">
                                                <?php echo app('translator')->get('lang.no'); ?> 
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <?php endif; ?>                         

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ItemBuy">
                            <div class="white-box">
                                <div class="text-right mb-20">
                                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
    
                                        <thead>
                                       
                                            <tr>
                                                <th><?php echo app('translator')->get('lang.title'); ?></th>
                                                <th><?php echo app('translator')->get('lang.category'); ?></th>
                                                <th><?php echo app('translator')->get('lang.demo'); ?> <?php echo app('translator')->get('lang.url'); ?></th>
                                                <th><?php echo app('translator')->get('lang.image'); ?></th>
                                                <th><?php echo app('translator')->get('lang.price'); ?></th>
                                                <th><?php echo app('translator')->get('lang.status'); ?></th>
                                                <th><?php echo app('translator')->get('lang.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data->itemOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>  
                                                <td hidden><?php echo e(@$item->id); ?></td>
                                                <td><a target="_blank" href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->Item->title),@$item->id])); ?>"><?php echo e(Str::limit(@$item->Item->title,20)); ?></a></td>
                                                <td valign="top"><?php echo e(@$item->Item->category->title); ?> / <?php echo e(@$item->Item->subCategory->title); ?></td>
                                                <td valign="top"><a href="<?php echo e(@$item->Item->demo_url); ?>" target="_blank" class="primary-btn small fix-gr-bg">Click here</a></td>
                                                <td valign="top"><img src="<?php echo e(asset($item->Item->icon)); ?>" height="40px" width="40px"></td>
                                                <td valign="top"><?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(@$item->subtotal); ?></td>
                                                <td valign="top">
                                                            <?php if($item->status == 1): ?>
                                                            <?php echo app('translator')->get('lang.active'); ?>
                                                            <?php else: ?>   
                                                            <?php echo app('translator')->get('lang.pending'); ?>
                                                            <?php endif; ?>
                                                </td>
                                                <td valign="top">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo app('translator')->get('lang.select'); ?>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                         <a class="dropdown-item" target="_blank" href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->Item->title),@$item->Item->id])); ?>"><?php echo app('translator')->get('lang.view'); ?></a>
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                         </div>
                        
                    </div>                   
                    
                </div>
            </div>
       </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/customer/customer_View.blade.php ENDPATH**/ ?>