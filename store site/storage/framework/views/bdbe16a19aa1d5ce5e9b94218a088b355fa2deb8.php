
<?php $__env->startSection('mainContent'); ?>



<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.about'); ?>  <?php echo app('translator')->get('lang.system'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.about'); ?>  <?php echo app('translator')->get('lang.system'); ?> </a>
                </div>
            </div>
        </div>
    </section>   

    <section class="admin-visitor-area up_admin_visitor empty_table_tab">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4">
                 
                   <?php if(!appMode()): ?>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'updateSystem', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                   <?php endif; ?>
                   
                    <div class="white-box sm_mb_20 sm2_mb_20 md_mb_20 ">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->get('lang.Upload_From_Local_Directory'); ?></h3>
                        </div>
                        <div class="add-visitor">

                            <div class="row no-gutters input-right-icon mb-20">
                                <div class="col">
                                    <div class="input-effect">
                                        <input
                                            class="primary-input form-control <?php echo e($errors->has('content_file') ? ' is-invalid' : ''); ?>"
                                            readonly="true" type="text"
                                            placeholder="<?php echo e(isset($editData->file) && @$editData->file != ""? getFilePath3(@$editData->file):app('translator')->get('lang.browse')); ?> "
                                            id="placeholderPhoto" name="content_file">
                                        <span class="focus-border"></span>
                                        <?php if($errors->has('content_file')): ?>
                                            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('content_file')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="primary-btn-small-input" type="button">
                                        <label class="primary-btn small fix-gr-bg"
                                               for="photo"><?php echo app('translator')->get('lang.browse'); ?></label>
                                        <input type="file" class="d-none form-control" name="updateFile"
                                               required
                                               id="photo">
                                    </button>

                                </div>
                            </div>
                            <?php
                            $tooltip = "";
                            if (appMode()){
                                $tooltip ='For the demo version, you cannot change this';
                            }
                        ?>

                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                        <span class="ti-check"></span>
                                        <?php if(isset($session)): ?>
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

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <h2 class="main-title"><?php echo app('translator')->get('lang.about'); ?>  <?php echo app('translator')->get('lang.system'); ?> </h2>
                                <div class="add-visitor">
                                    <table style="width:100%; box-shadow: none;"  class="display school-table school-table-style about_system_table">
                                        <?php 
                                            @$data = app('infix_general_settings');
                                            $importFile = Illuminate\Support\Facades\File::get(storage_path('app/' . '.version'));
                                        ?>
                                        <tr>

                                            <td><?php echo app('translator')->get('lang.software_version'); ?></td>
                                            <td>
                                                <?php if($importFile): ?>
                                                    <?php echo e(@$importFile); ?>

                                                <?php else: ?>
                                                    <?php echo e(@$data->software_version); ?>

                                                <?php endif; ?>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo app('translator')->get('lang.Check_update'); ?></td>
                                            <td><a href="https://codecanyon.net/user/codethemes/portfolio" target="_blank"> <i class="ti-new-window"> </i><?php echo app('translator')->get('lang.update'); ?> </a> </td>
                                        </tr> 
                                        <tr>
                                            <td> <?php echo app('translator')->get('lang.PHP_version'); ?></td>
                                            <td><?php echo e(phpversion()); ?></td>
                                        </tr>
                                        <tr>
                                            <td> <?php echo app('translator')->get('lang.curl_enable'); ?></td>
                                            <td><?php
                                            if  (in_array  ('curl', get_loaded_extensions())) {
                                                echo 'enable';
                                            }
                                            else {
                                                echo 'disable';
                                            }
                                            ?></td>
                                        </tr>
                           
                                        
                                        <tr>
                                            <td> <?php echo app('translator')->get('lang.purchase_code'); ?></td>
                                            <td><?php echo e(__('Verified')); ?></td>
                                        </tr>
                           

                                        <tr>
                                            <td><?php echo app('translator')->get('lang.install_domain'); ?></td>
                                            <td><?php echo e(@$data->system_domain); ?></td>
                                        </tr>

                                        <tr>
                                            <td> <?php echo app('translator')->get('lang.system_activated_date'); ?></td>
                                            <td><?php echo e(DateFormat(@$data->system_activated_date)); ?></td>
                                        </tr>

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




<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/aboutSystem.blade.php ENDPATH**/ ?>