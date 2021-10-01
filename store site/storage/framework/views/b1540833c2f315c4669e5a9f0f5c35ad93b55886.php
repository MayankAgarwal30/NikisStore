
<?php $__env->startSection('mainContent'); ?>
    <?php
        function showPicName($data){
            $name = explode('/', $data);
            return $name[3];
        }
    ?>
   

<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/modules.css')); ?>">
    <section class="sms-breadcrumb mb-40 white-box up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.site_image_settings'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.site_image_settings'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">  
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('lang.site_image_settings'); ?></h3>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
                                <thead>
                                <?php if(session()->has('message-success') != "" ||
                                session()->get('message-danger') != ""): ?>
                                    <tr>
                                        <td colspan="4">
                                            <?php if(session()->has('message-success-status')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo app('translator')->get('lang.inserted_message'); ?>
                                                </div>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo app('translator')->get('lang.error_message'); ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo app('translator')->get('lang.sl'); ?></th>
                                    <th><?php echo app('translator')->get('lang.title'); ?></th>
                                    
                                    <th><?php echo app('translator')->get('lang.background'); ?> <?php echo app('translator')->get('lang.image'); ?></th>
                                    
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $editDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($editData->id); ?></td>
                                        <td><?php echo e($editData->title); ?></td>
                                        
                                        <td>
                                             <?php if($editData->type == 'image'): ?>
                                            <img src="<?php echo e(asset($editData->image)); ?>" 
                                            <?php if(@$editData->id == 3 || @$editData->id == 4): ?>
                                                width="220px" height="auto"
                                            <?php elseif(@$editData->id == 2): ?>
                                                width="60px" height="auto"
                                            <?php else: ?>
                                                width="180px" height="auto">
                                            <?php endif; ?>
                                             
                                            <?php else: ?>
                                             <div class="site_image_color" style="background-color:<?php echo e($editData->color); ?> "></div>
                                            <?php endif; ?>
                                        </td>
                                        </td>

                                        <td>
                                           
                                            <?php if($editData->id==4): ?>
                                                <a href="#" data-toggle="modal" class="primary-btn small fix-gr-bg mb-20" data-target="#modalLogin">View Text</a>
                                            <?php endif; ?>
                                            <?php if($editData->id==5): ?>
                                                <a href="#" data-toggle="modal" class="primary-btn small fix-gr-bg mb-20" data-target="#modalAddBrand">View Text</a>
                                            <?php endif; ?>
                                           <a  data-toggle="modal" onclick="lol(<?php echo e($editData->id); ?>)" class="primary-btn small fix-gr-bg mb-20" data-target="#addQuery<?php echo e($editData->id); ?>"  href="#"> <?php echo app('translator')->get('lang.change'); ?></a>

                                        </td>
                                    
                                    </tr>
                                    
                                    <div class="modal fade" id="modalLogin" >
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   
                                                     <h4 class="modal-title" id="modalAddBrandLabel"><?php echo app('translator')->get('lang.sign_in_page_message'); ?></h4>
                                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    
                                                </div>
                                            <?php
                                                $message=App\ManageQuery::SiteInageMessage(4);
                                            ?>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(url('systemsetting/update_login_msg')); ?>" method="post">
                                                   <?php echo csrf_field(); ?>
                                                     <textarea id="summernoteLogin" class="primary-input form-control<?php echo e($errors->has('signin_message') ? ' is-invalid' : ''); ?>" name="signin_message"  cols="30" rows="30"><?php echo e($message->additional_text); ?></textarea>
                                                     <div class="row mt-20">
                                                        <div class="col-lg-12 text-center">
                                                            <button id="AddBrandButton" type="submit" class="primary-btn small fix-gr-bg mb-20"><?php echo app('translator')->get('lang.update'); ?></button>
                                                        
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                                   
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalAddBrand" >
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   
                                                     <h4 class="modal-title" id="modalAddBrandLabel"><?php echo app('translator')->get('lang.404_error_message_text'); ?></h4>
                                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    
                                                </div>
                                            <?php
                                                $message=App\ManageQuery::SiteInageMessage(5);
                                            ?>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(url('systemsetting/update_error_msg')); ?>" method="post">
                                                   <?php echo csrf_field(); ?>
                                                     <textarea id="summernoteError" class="primary-input form-control<?php echo e($errors->has('message') ? ' is-invalid' : ''); ?>" name="message"  cols="30" rows="30"><?php echo e($message->additional_text); ?></textarea>
                                                     <div class="row mt-20">
                                                        <div class="col-lg-12 text-center">
                                                            <button id="AddBrandButton" type="submit" class="primary-btn small fix-gr-bg mb-20"><?php echo app('translator')->get('lang.update'); ?></button>
                                                        
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                                   
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    

              
                                <div class="modal fade admin-query" id="addQuery<?php echo e($editData->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Change <?php echo e($editData->title); ?> </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <center>
                                                        <br/><br/>
                                                    <?php if(isset($editData->image)): ?>
                                                            <div id="image" class="mb-30">
                                                            <img <?php if(@$editData->id == 3 || @$editData->id == 4): ?> width="240px" height="auto" <?php elseif(@$editData->id == 2): ?> width="80px" height="auto" <?php else: ?> width="220px" height="auto" <?php endif; ?> id="preview_image" src="<?php echo e(asset($editData->image)); ?>"/>
                                                            <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw  site_image_spinner" ></i>
                                                        </div>
                                                    <?php else: ?>
                                                        <div id="image" class="mb-20">
                                                            <img width="200" height="auto" id="preview_image" src="<?php echo e(asset('images/noimage.jpg')); ?>"/>
                                                            <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw  site_image_spinner" ></i>
                                                        </div>
                                                    <?php endif; ?>
                                                        <form>
                                                        <p>
                                                            <a href="javascript:changeProfile()" class="primary-btn small fix-gr-bg mb-20 site_image_upload_a">
                                                                <?php echo app('translator')->get('lang.upload_photo'); ?>
                                                            </a>&nbsp;&nbsp;
                                                        </p>
                                                        <input type="file" id="bg_image" hidden class="site_image_hidden_bg_image"/>
                                                        <input type="hidden" id="file_name"/>
                                                        <form>
                                                    </center>
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
<center>
    <br/><br/>


</center>
<!-- JavaScripts -->
<script src="<?php echo e(asset('/')); ?>Modules/Systemsetting/Resources/assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo e(asset('/')); ?>Modules/Systemsetting/Resources/assets/js/fontawesome.js"></script>

<script src="<?php echo e(asset('/')); ?>public/backEnd/ajax_image_upload.js"></script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/site_image_setting.blade.php ENDPATH**/ ?>