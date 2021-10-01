 
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.language_settings'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.language_settings'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
        <?php if(isset($edit_languages)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('marks-grade')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">


            <div class="col-lg-12">

                <div class="main-title d-flex justify-content-between align-items-center">
                            <h3 class="mb-30">
                                <?php echo app('translator')->get('lang.language_setup'); ?>
                            </h3>
                                <a href="<?php echo e(url('systemsetting/language-setting')); ?>" class="primary-btn small fix-gr-bg mb-20">
                                    <span class="ti-plus pr-2"></span>
                                    <?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.language'); ?>
                                </a>
                        </div>
                <div class="row">
                    


                    <div class="col-lg-12 mt-40">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'translationTermUpdate', 'method' => 'POST'])); ?>


                        <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
                        <input type="hidden" id="language_universal" value="<?php echo e($language_universal); ?>" name="language_universal">
                      
                        
 <table id="table_id" class="display school-table mt-20" cellspacing="0" width="100%">

                            <thead>

                                <tr>

                                   <th><?php echo app('translator')->get('lang.default_phrases'); ?></th>
                                    <th><?php echo e($language_universal); ?> <?php echo app('translator')->get('lang.phrases'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                    <th><?php echo app('translator')->get('lang.default_phrases'); ?></th>
                                    <th><?php echo e($language_universal); ?> <?php echo app('translator')->get('lang.phrases'); ?></th>
                                </tr>
                                <?php $count=1; ?>
                                <?php $__currentLoopData = $sms_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="w-50"><?php echo e($row->en); ?></td>
                                    <td class="w-50">

                                        <div class="input-effect">
                                            <input type="hidden" name="InputId[<?php echo e($row->id); ?>]" value="<?php echo e($row->id); ?>">
                                            <input class="primary-input form-control<?php echo e($errors->has('language_universal') ? ' is-invalid' : ''); ?>"
                                                type="text" name="LU[<?php echo e($row->id); ?>]" autocomplete="off" value="<?php echo e($row->$language_universal); ?>">


                                            <span class="focus-border"></span>
                                            <?php if($errors->has('language_universal')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('language_universal')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>


                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        <div class="pull-right">
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('lang.update_language'); ?>
                                    </button>
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/language_setup.blade.php ENDPATH**/ ?>