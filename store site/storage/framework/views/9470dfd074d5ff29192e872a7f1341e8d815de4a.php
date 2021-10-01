
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/modules.css')); ?>">
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.backup_settings'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="<?php echo e(url('sms-settings')); ?>"><?php echo app('translator')->get('lang.backup_settings'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            

            <div class="col-lg-12">
                <div class="row">


                    <div class="col-lg-4 col-md-4">
                        <div class="main-title mb-20">
                            <h3 class="mb-0"> <?php echo app('translator')->get('lang.backup'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                    <div class="col-lg-8 text-right col-md-8  ">


                   
                        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                     
                         <span class="d-inline-block mb-20" tabindex="0" data-toggle="tooltip" title="Disabled Images <?php echo app('translator')->get('lang.backup'); ?>">
                            <button class="primary-btn small fix-gr-bg  demo_view"  type="button" ><?php echo app('translator')->get('lang.images'); ?> <?php echo app('translator')->get('lang.backup'); ?></button>
                          </span>
                            <span class="d-inline-block mb-20" tabindex="0" data-toggle="tooltip" title="Disabled Full Project <?php echo app('translator')->get('lang.backup'); ?>">
                            <button class="primary-btn small fix-gr-bg  demo_view"  type="button" ><?php echo app('translator')->get('lang.full_project'); ?> <?php echo app('translator')->get('lang.backup'); ?></button>
                          </span>
                          <span class="d-inline-block mb-20" tabindex="0" data-toggle="tooltip" title="Disabled Database <?php echo app('translator')->get('lang.backup'); ?>">
                            <button class="primary-btn small fix-gr-bg  demo_view"  type="button" ><?php echo app('translator')->get('lang.database'); ?> <?php echo app('translator')->get('lang.backup'); ?></button>
                          </span>
                          
                         <?php else: ?>
                                <a href="<?php echo e(url('systemsetting/get-backup-files/1')); ?>" class="primary-btn small fix-gr-bg  ">
                                    <span class="ti-arrow-circle-down pr-2"></span>
                                    <?php echo app('translator')->get('lang.images'); ?> <?php echo app('translator')->get('lang.backup'); ?>
                                </a>
                                <a href="<?php echo e(url('systemsetting/get-backup-files/2')); ?>" class="primary-btn small fix-gr-bg  ">
                                    <span class="ti-arrow-circle-down pr-2"></span>
                                    <?php echo app('translator')->get('lang.full_project'); ?> <?php echo app('translator')->get('lang.backup'); ?>
                            </a>
                                <a href="<?php echo e(url('systemsetting/get-backup-db')); ?>" class="primary-btn small fix-gr-bg "> <span class="ti-arrow-circle-down pr-2"></span> <?php echo app('translator')->get('lang.database'); ?> <?php echo app('translator')->get('lang.backup'); ?> </a>
                
                    <?php endif; ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="display school-table school-table-style" cellspacing="0" width="100%">
                                <thead>


                                    <?php if(session()->has('message-success') != "" ||
                                        session()->get('message-danger') != ""): ?>
                                        <tr>
                                            <td colspan="5">
                                                <?php if(session()->has('message-success')): ?>
                                                    <div class="alert alert-success">
                                                        <?php echo e(session()->get('message-success')); ?>

                                                    </div>
                                                    <?php elseif(session()->has('message-danger')): ?>
                                                        <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <th><?php echo app('translator')->get('lang.size'); ?></th>
                                        <th><?php echo app('translator')->get('lang.created_date_time'); ?></th>
                                        <th><?php echo app('translator')->get('lang.backup_files'); ?></th>
                                        <th><?php echo app('translator')->get('lang.file'); ?><?php echo app('translator')->get('lang.type'); ?> </th>
                                        <th><?php echo app('translator')->get('lang.action'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $sms_dbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sms_db): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php
                                            if(file_exists($sms_db->source_link)){
                                                $size = filesize($sms_db->source_link);
                                                $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                                                $power = $size > 0 ? floor(log($size, 1024)) : 0;
                                                echo number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                                            }else{
                                                echo 'File already deleted.';
                                            }
                                            ?>
                                        </td>
                                        <td> 
                                            <?php echo e($sms_db->created_at != ""?  Modules\Systemsetting\Entities\InfixGeneralSetting::DateConvater($sms_db->created_at):''); ?>


                                        </td>
                                        <td><?php echo e($sms_db->file_name); ?></td>
                                        <td>
                                            <?php
                                            if($sms_db->file_type == 0){
                                                echo 'Database';
                                            }else if($sms_db->file_type==1){
                                                echo 'Images';
                                            }else{
                                                echo 'Whole Project';
                                            }
                                            ?>
                                        </td>
                                        <td>

                    
                                            <a  class="primary-btn small tr-bg  " href="<?php echo e(url('/systemsetting/download-files/'.$sms_db->id)); ?>"  >
                                                <span class="pl ti-download"></span> <?php echo app('translator')->get('lang.download'); ?>
                                            </a>

                                            <?php
                                            if($sms_db->file_type == 10){
                                            ?> 
                                            
                                                <a  class="primary-btn small tr-bg  " href="<?php echo e(url('/systemsetting/restore-database/'.$sms_db->id)); ?>"  >
                                                    <span class="pl ti-upload"></span>  <?php echo app('translator')->get('lang.restore'); ?>
                                            </a>
                                            <?php
                                            } 
                                            ?>


                                        <a data-target="#deleteDatabase<?php echo e($sms_db->id); ?>" data-toggle="modal" class="primary-btn small tr-bg  " href="<?php echo e(url('/'.$sms_db->id)); ?>"  >
                                                <span class="pl ti-close"></span>  <?php echo app('translator')->get('lang.delete'); ?>
                                            </a>

                                        </td>
                                    </tr>



                                    <div class="modal fade admin-query" id="deleteDatabase<?php echo e($sms_db->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.backup'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                    </div>

                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                        <a href="<?php echo e(route('delete_database', [$sms_db->id])); ?>" class="text-light">
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/backupSettings.blade.php ENDPATH**/ ?>