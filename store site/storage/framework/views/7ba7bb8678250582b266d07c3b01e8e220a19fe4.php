<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/summernote.css')); ?>">


<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.become_author_text'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.frontend_CMS'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.become_author_text'); ?></a>
               
                
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <?php if(isset($editData) && Auth::user()->role_id == 1): ?>   
               <div class="row">
                   
                </div>
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
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12">
                      
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['become-author-store'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                       
                        
                         <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-12">
                                    <div class="row">
                                      
                                            <div class="col-lg-12 pt-5">
                                                <div class="input-effect">
                                                    <label><?php echo app('translator')->get('lang.description'); ?> <span>*</span> </label>
                                                        <textarea class=" site_image_hidden_bg_image form-control summernote-editor <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" rows="5" name="description" cols="50" id="editor1" ><?php echo @$editData->description; ?></textarea>
                                                        
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('description')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                    </div>    
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                      
                                    </div>    
                                </div>    
                                <div class="col-lg-12 mt-20 text-center">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-check"></span>
                                        <?php if(isset($editData)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div> 
            </div>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/frontend_editor.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Pages/Resources/views/become_author.blade.php ENDPATH**/ ?>