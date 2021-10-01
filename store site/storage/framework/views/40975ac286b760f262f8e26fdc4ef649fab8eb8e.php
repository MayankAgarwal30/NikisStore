
<?php $__env->startSection('mainContent'); ?> 
<link rel="stylesheet" href="<?php echo e(url('Modules/Pages/Assets/css/style.css')); ?>">  
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.ticket'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.frontend_CMS'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.ticket'); ?> <?php echo app('translator')->get('lang.page'); ?> </a>
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
                                    <?php echo app('translator')->get('lang.ticket'); ?> <?php echo app('translator')->get('lang.page'); ?> 
                            </h3>

                        </div>
                      
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'TicketPageUpdate',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                         <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id: ''); ?>"> 
                        <div class="white-box">
                            <div class="add-visitor">  

                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('heading') ? ' is-invalid' : ''); ?>"
                                                type="text" name="heading" autocomplete="off" value="<?php echo e(isset($editData)? $editData->heading:old('heading')); ?>">
                                            <label><?php echo app('translator')->get('lang.heading'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('heading')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('heading')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                        name="ticket_text"><?php echo e(isset($editData)? @$editData->ticket_text: old('ticket_text')); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.ticket_text'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('ticket_text')): ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($errors->first('ticket_text')); ?></strong>
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
 
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Pages/Resources/views/ticket_page.blade.php ENDPATH**/ ?>