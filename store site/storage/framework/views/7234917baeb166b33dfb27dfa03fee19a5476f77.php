
<?php $__env->startSection('mainContent'); ?>


<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.KnowledgeBase'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#" class="active"><?php echo app('translator')->get('lang.KnowledgeBase'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area DM_table_info">

        <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                    <a href="<?php echo e(route('add_knowledge_base')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('lang.add'); ?>
                    </a>
                </div>
            </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'SearchquestionList', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>

        <div class="row mb-25">
            <div class="col-lg-12">
            <div class="white-box">
                <div class="row">
                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                    <div class="col-lg-6 sm_mb_20 sm2_mb_20 md_mb_20">
                        <select class="niceSelect w-100 bb form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="category">
                            <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.category'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.category'); ?></option>
                            <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(isset($data['category'])? ($item->id == $data['category']? 'selected':''):''); ?>><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('class')): ?>
                        <span class="invalid-feedback invalid-select" role="alert">
                            <strong><?php echo e($errors->first('class')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-effect sm_mb_20 sm2_mb_20 md_mb_20">
                            <input class="primary-input" type="text" name="key" value="<?php echo e(isset($data['key'])?$data['key']:''); ?>">
                            <label><?php echo app('translator')->get('lang.search_by_name'); ?></label>
                            <span class="focus-border"></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 mt-20 text-right">
                        <button type="submit" class="primary-btn small fix-gr-bg" id="btnsubmit">
                            <span class="ti-search pr-2"></span>
                            <?php echo app('translator')->get('lang.search'); ?>
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <?php echo e(Form::close()); ?>


  <?php if(isset($data['knowledge_base'])): ?>
    <div class="container-fluid p-0">
            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-10 no-gutters">
                        <div class="main-title ">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.KnowledgeBase'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>

                </div>
                <div class="row pt-20">
                    <div class="col-lg-12">
                        
                        


                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>

                                <tr>
                                    
                                    <th><?php echo app('translator')->get('lang.category'); ?></th>
                                    <th><?php echo app('translator')->get('lang.question'); ?></th>
                                    <th><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.question'); ?></th>
                                    
                                    

                                    
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $data['knowledge_base']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td valign="top"><?php echo e(Str::limit($item->name)); ?></td>
                                    <td valign="top"><?php echo e(Str::limit($item->first_question)); ?></td>
                                    <td valign="top"><?php echo e(Str::limit($item->sub_question)); ?></td>
                                  
                                  
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                             
                                                <a class="dropdown-item" data-toggle="modal" data-target="#showBlogModal<?php echo e($item->id); ?>"><?php echo app('translator')->get('lang.view'); ?></a>
                                                <a class="dropdown-item" href="<?php echo e(route('kn_baseEdit',$item->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteblogModal<?php echo e($item->id); ?>"  href=""><?php echo app('translator')->get('lang.delete'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                
                                <div class="modal fade admin-query" id="showBlogModal<?php echo e($item->id); ?>" >
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <div class="text-center">
                                            </div>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">                                
                                                    <b><?php echo app('translator')->get('lang.question'); ?> : </b>  <?php echo e($item->first_question); ?> </div>                                                
                                                    <div class="col-lg-12">  
                                                        <b><?php echo app('translator')->get('lang.sub_question'); ?> : </b>  <?php echo e($item->sub_question); ?> </div>                                                
                                                    </div>
                                                    <div class="row mt-40">
                                                    <div class="col-lg-12">  
                                                        <p  class="mb-0 blog_description"> <b><?php echo app('translator')->get('lang.answer'); ?>:</b>  <?php echo $item->answer; ?></p>                                
                                                    </div>
                                                    </div>
                                                    <div class="row">                                             
                                                        <div class="col-lg-12 text-right">
                                                            <img src="<?php echo e(url('/')); ?>/Modules/Blog/002-grid.png" height="20px" width="20px" alt="category_icon"> <?php echo e($item->name); ?>                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                  <div class="modal fade admin-query" id="deleteblogModal<?php echo e($item->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.KnowledgeBase'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                    <a href="<?php echo e(route('blogKnBase',$item->id)); ?>" class="text-light">
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
    <?php endif; ?>
</section>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/KnowledgeBase/Resources/views/index.blade.php ENDPATH**/ ?>