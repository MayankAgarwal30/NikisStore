
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

    <section class="admin-visitor-area">
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
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30"><?php if(isset($edit_languages)): ?>
                                        <?php echo app('translator')->get('lang.edit'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('lang.add'); ?>
                                    <?php endif; ?>
                                    <?php echo app('translator')->get('lang.language'); ?>
                                </h3>
                            </div>
                            <?php if(isset($selected_languages)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'language-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'languageAdd', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <div class="white-box">
                                <div class="add-visitor">
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

                                    <?php if(isset($selected_languages)): ?>
                                        <input type="hidden" name="id" value="<?php echo e($selected_languages->id); ?>">

                                    <?php endif; ?>

                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <select
                                                    class="niceSelect w-100 bb form-control <?php echo e($errors->has('lang_id') ? ' is-invalid' : ''); ?>"
                                                    name="lang_id" id="lang_id">
                                                    <option data-display="<?php echo app('translator')->get('lang.select_language'); ?>"
                                                            value=""><?php echo app('translator')->get('lang.select_language'); ?></option>
                                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($lang->id); ?>"
                                                            <?php echo e(isset($selected_languages) ? ($selected_languages->lang_id == $lang->id )? 'selected':'':''); ?>

                                                        > <?php echo e($lang->name); ?> - <?php echo e($lang->native); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                               
                                            </div>
                                            


                                        </div>
                                         <?php if($errors->has('lang_id')): ?>
                                                    <span class="invalid-feedback pt-10" role="alert">
                                                    <strong><?php echo e($errors->first('lang_id')); ?></strong>
                                                </span>
                                        <?php endif; ?>
                                    </div>


                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg">
                                                <span class="ti-check"></span>
                                                <?php if(isset($selected_languages)): ?>
                                                    <?php echo app('translator')->get('lang.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('lang.save'); ?>
                                                <?php endif; ?>
                                                <?php echo app('translator')->get('lang.language'); ?>
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
                                <h3 class="mb-30"><?php echo app('translator')->get('lang.language'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php

                            ?>

                            <div class="table-responsive">
                                <table class="display school-table school-table-style" cellspacing="0" width="100%">


                                    <thead>
                                    <?php if(session()->has('message-success-delete') != "" ||session()->has('langChange')!= "" ||
                                    session()->get('message-danger-delete') != ""): ?>
                                        <tr>
                                            <td colspan="6">
                                                <?php if(session()->has('message-success-delete')): ?>
                                                    <div class="alert alert-success">
                                                        <?php echo e(session()->get('message-success-delete')); ?>

                                                    </div>
                                                <?php elseif(session()->has('message-danger-delete')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(session()->get('message-danger-delete')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <?php if(session()->has('langChange')): ?>
                                                    <div class="alert alert-success">
                                                        <?php echo e(session()->get('langChange')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo app('translator')->get('lang.sl'); ?></th>
                                        <th><?php echo app('translator')->get('lang.language'); ?></th>
                                        <th><?php echo app('translator')->get('lang.native'); ?></th>
                                        <th><?php echo app('translator')->get('lang.universal'); ?></th>

                                        <th><?php echo app('translator')->get('lang.status'); ?></th>
                                        <th><?php echo app('translator')->get('lang.action'); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $i=0;
                                        $active     = 'primary-btn-small-input primary-btn small fix-gr-bg';
                                        $inactive   =  'primary-btn small tr-bg';
                                    ?>

                                    <?php $__currentLoopData = $sms_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sms_language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?>

                                            <td><?php echo e($sms_language->language_name); ?></td>
                                            <td><?php echo e($sms_language->native); ?></td>
                                            <td><?php echo e($sms_language->language_universal); ?></td>


                                            <td>
                                            <?php if($sms_language->active_status==1): ?>
                                                <!-- <span class="badge badge-pill badge-success"></span> -->
                                                    <b><?php echo app('translator')->get('lang.active'); ?></b>

                                            <?php else: ?>
                                                <!-- <span class="badge badge-pill badge-secondary"></span> -->
                                                    <?php echo app('translator')->get('lang.inactive'); ?>
                                                <?php endif; ?>

                                            </td>
                                            <td>

                                                <?php if($sms_language->active_status==1): ?>
                                                    <a href="<?php echo e(URL::to('/systemsetting/change-language/'.$sms_language->id)); ?>"
                                                    class="<?php echo e($sms_language->active_status==1?$active:$inactive); ?> "   > <span
                                                            class="ti-check"></span> <?php echo app('translator')->get('lang.default'); ?></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(URL::to('/systemsetting/change-language/'.$sms_language->id)); ?>"
                                                    class="<?php echo e($sms_language->active_status==1?$active:$inactive); ?> "   > <span
                                                            class="ti-check"></span> <?php echo app('translator')->get('lang.make_default'); ?></a>
                                                <?php endif; ?>

                                                

                                                <a href="<?php echo e(url('/')); ?>/systemsetting/language-setup/<?php echo e($sms_language->language_universal); ?> "
                                                class="primary-btn small tr-bg  "   > <span
                                                        class="ti-settings"></span> <?php echo app('translator')->get('lang.setup'); ?> </a>

                                                <?php if($sms_language->language_universal !='en' && $sms_language->active_status !=1): ?>

                                                <a href="<?php echo e(url('/')); ?>/systemsetting/language-delete" class="primary-btn small tr-bg " data-toggle="modal"
                                                    data-target="#deleteLanguage<?php echo e($sms_language->id); ?>" >
                                                        <span class="ti-close"></span> <?php echo app('translator')->get('lang.remove'); ?>
                                                </a>
                                                <?php else: ?>
                                            
                                                <?php endif; ?>


                                                <div class="modal fade admin-query"
                                                    id="deleteLanguage<?php echo e($sms_language->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.language'); ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    &times;
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_remove'); ?></h4>
                                                                </div>

                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                            data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                                    <?php echo e(Form::open(['url' => 'systemsetting/language-delete/', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                                                                    <input type="hidden" name="id"
                                                                        value="<?php echo e($sms_language->id); ?>">
                                                                    <button class="primary-btn fix-gr-bg"
                                                                            type="submit"><?php echo app('translator')->get('lang.remove'); ?></button>
                                                                    <?php echo e(Form::close()); ?>

                                                                </div>
                                                            </div>

                                                        </div>
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
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/language_setting.blade.php ENDPATH**/ ?>