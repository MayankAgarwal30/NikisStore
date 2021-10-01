
<?php $__env->startSection('mainContent'); ?> 
<link rel="stylesheet" href="<?php echo e(url('Modules/Pages/Assets/css/style.css')); ?>">  
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.faqs'); ?> <?php echo app('translator')->get('lang.list'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.frontend_CMS'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.faqs'); ?> <?php echo app('translator')->get('lang.list'); ?> </a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        
        <div class="row">  

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"> 
                                <?php if(@$editData): ?>
                                    <?php echo app('translator')->get('lang.update'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.faqs'); ?> 
                            </h3>
                        </div>
                      
                        <?php if(@$editData): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'faqs-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                            <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id:old('id')); ?>"> 
                         <?php else: ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'faqs-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                         <?php endif; ?> 


                        <div class="white-box">
                                
                            <div class="add-visitor">  
                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('question_title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="question_title" autocomplete="off" value="<?php echo e(isset($editData)? $editData->question_title:old('question_title')); ?>">
                                            <label><?php echo app('translator')->get('lang.question'); ?> <?php echo app('translator')->get('lang.title'); ?> <span class="text-red">*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('question_title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('question_title')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>



                                <div class="row mt-40">
                                    <div class="col-lg-12"> 
                                            <label><?php echo app('translator')->get('lang.question'); ?> <?php echo app('translator')->get('lang.answer'); ?>  <span class="text-red">*</span></label>
                                        <div class="input-effect">
                                            <textarea id="editor" class="primary-input form-control<?php echo e($errors->has('question_answer') ? ' is-invalid' : ''); ?>" name="question_answer" id="" cols="30" rows="10" data-sample-short><?php echo isset($editData)? $editData->question_answer:old('question_answer'); ?></textarea> 
                                            
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('question_answer')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('question_answer')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> 
                                    </div> 
                                </div>



                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                      <button type="submit" class="primary-btn fix-gr-bg">
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
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.faqs'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead> 
                                <tr>
                                    <th><?php echo app('translator')->get('lang.sl'); ?></th>
                                    <th><?php echo app('translator')->get('lang.question'); ?> <?php echo app('translator')->get('lang.title'); ?> </th>
                                    <th><?php echo app('translator')->get('lang.question'); ?> <?php echo app('translator')->get('lang.answer'); ?> </th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sl=1;
                                ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($sl++); ?></td>
                                    <td><?php echo e($row->question_title); ?></td>
                                    <td><?php echo $row->question_answer; ?></td>
                                    
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"> 
                                                <a class="dropdown-item" href="<?php echo e(route('faqs-edit', [$row->id])); ?>"><?php echo app('translator')->get('lang.edit'); ?></a> 
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteFAQ<?php echo e($row->id); ?>"  href="<?php echo e(route('faqs-delete', [$row->id])); ?>"><?php echo app('translator')->get('lang.delete'); ?></a>
                                        
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                  <div class="modal fade admin-query" id="deleteFAQ<?php echo e($row->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.faqs'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                    <a href="<?php echo e(route('faqs-delete', [$row->id])); ?>" class="text-light">
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




    <script src="<?php echo e(asset('/')); ?>public/backEnd/backend_modules.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Pages/Resources/views/faqs.blade.php ENDPATH**/ ?>