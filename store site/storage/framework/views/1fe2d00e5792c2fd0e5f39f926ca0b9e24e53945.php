


<?php $__env->startSection('mainContent'); ?>
<script src="<?php echo e(asset('/')); ?>public/backEnd/vendors/js/jquery-3.2.1.min.js"></script>
    <style type="text/css">
        #selectStaffsDiv, .forStudentWrapper {
            display: none;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        #waiting_loader{
            display: none;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background: linear-gradient(90deg, #7c32ff 0%, #c738d8 51%, #7c32ff 100%);
        }

        input:focus + .slider {
            box-shadow: 0 0 1px linear-gradient(90deg, #7c32ff 0%, #c738d8 51%, #7c32ff 100%);
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.module_manage'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.module_manage'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-10 col-xs-6 col-md-6 col-6 no-gutters ">
                            <div class="main-title sm_mb_20 sm2_mb_20 md_mb_20 mb-30 ">
                                <h3 class="mb-0"> <?php echo app('translator')->get('lang.module_manage'); ?></h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-6 col-md-6 col-6 no-gutters ">
                            <a href="<?php echo e(route('ModuleRefresh')); ?>" class="primary-btn fix-gr-bg small pull-right"> <i
                                        class="ti-reload"> </i> Refresh</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <table id="default_table" class="display school-table school-table-style" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('lang.sl'); ?></th>
                                    <th><?php echo app('translator')->get('lang.name'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <?php $count=1; ?>
                                <?php $__currentLoopData = $is_module_available; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $is_module_available = 'Modules/' . $row->getName(). '/Providers/' .$row->getName(). 'ServiceProvider.php';
                                        if (! file_exists($is_module_available)){
                                            continue;
                                        }
                                        $is_data = \App\InfixModuleManager::where('name', $row->getName())->first();

                                    ?>
                                    <tr>
                                        <td><?php echo e(@$count++); ?></td>
                                        <td>
                                           <strong> <?php echo e(@$row->getName()); ?> </strong>
                                            <?php if(!empty($is_data->purchase_code)): ?> <p class="text-success">Verified |
                                                Published
                                                on <?php echo e(date("F jS, Y", strtotime(@$is_data->activated_date))); ?></p> <?php else: ?><p
                                                    class="text-danger"> Not Verified <?php endif; ?>  </p>
                                        </td>
                                        <td>
                                           
                                            <?php if( moduleStatusCheck($row->getName() ) == False): ?> 
                                                <a class="primary-btn small <?php echo e(@$row->getName()); ?> bg-warning text-white border-0"
                                                   href="#"> <?php echo app('translator')->get('lang.disable'); ?> </a>
                                            <?php else: ?>
                                                <a class="primary-btn small <?php echo e(@$row->getName()); ?> bg-success text-white border-0"
                                                   href="#"> <?php echo app('translator')->get('lang.enable'); ?> </a>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                           
                                            <?php if(file_exists($is_module_available)): ?>
                                                <?php
                                                    $system_settings= Modules\Systemsetting\Entities\InfixGeneralSetting::first();
                                                
                                                    $is_moduleV= $is_data;
                                                    $configName = $row->getName();
                                                    $availableConfig=$system_settings->$configName;

                                                    // dd($availableConfig);
                                                ?>
                                                <?php if(@$availableConfig==0 || @@$is_moduleV->purchase_code== null): ?>
                                                    
                                                    <input type="hidden" name="name" value="<?php echo e(@$configName); ?>">
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <div class="col-lg-12 text-center">
                                                                    
                                                                    <?php if(Illuminate\Support\Facades\Config::get('app.app_pro')): ?>
                                                                        <a class="primary-btn fix-gr-bg"
                                                                           data-toggle="modal"
                                                                           data-target="#proVerify<?php echo e(@$configName); ?>"
                                                                           href="#"><?php echo app('translator')->get('lang.verify'); ?></a>
                                                                    <?php else: ?>
                                                                   
                                                                        <a class="primary-btn fix-gr-bg"
                                                                           data-toggle="modal"
                                                                           data-target="#Verify<?php echo e(@$configName); ?>"
                                                                           href="#"><?php echo app('translator')->get('lang.verify'); ?></a>

                                                                    <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php else: ?>
                                                <?php
                                                    
                                                ?>
                                                    <?php if('AmazonS3' == $row->getName()): ?>
                                                        <div id="waiting_loader" class="waiting_loader<?php echo e(@$row->getName()); ?>"><img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" width="44" height="44" /><br>Installing..</div>
                                                        <label class="switch module_switch_label<?php echo e(@$row->getName()); ?>">

                                                            <input type="checkbox" data-id="<?php echo e(@$row->getName()); ?>" id="ch<?php echo e(@$row->getName()); ?>" class="switch-input1 module_switch" <?php echo e(moduleStatusCheck($row->getName() ) == false? '':'checked'); ?>>
                                                            <span class="slider round"></span>

                                                        </label>
                                                    <?php else: ?>
                                                        <p class="primary-btn fix-gr-bg small">Default</p>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </td>


                                    </tr>
                                    <div class="modal fade admin-query" id="proVerify<?php echo e(@$configName); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Module Verification</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'ManageAddOnsValidation', 'method' => 'POST'])); ?>

                                                    <input type="hidden" name="name" value="<?php echo e(@$configName); ?>">

                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="form-group">
                                                        <label for="user">Email :</label>
                                                        <input type="text" class="form-control " name="email"
                                                               required="required" placeholder="Enter Your Email"
                                                               value="<?php echo e(old('email')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="purchasecode">Purchase Code:</label>
                                                        <input type="text" class="form-control" name="purchase_code"
                                                               required="required"
                                                               placeholder="Enter Your Purchase Code"
                                                               value="<?php echo e(old('purchasecode')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domain">Installation Path:</label>
                                                        <input type="text" class="form-control" name="domain"
                                                               required="required" value="<?php echo e(url('/')); ?>" readonly>
                                                    </div>
                                                    <div class="row mt-40">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="primary-btn fix-gr-bg">
                                                                <span class="ti-check"></span>
                                                                <?php echo app('translator')->get('lang.verify'); ?>
                                                            </button>

                                                        </div>
                                                    </div>

                                                    <?php echo e(Form::close()); ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade admin-query" id="Verify<?php echo e(@$configName); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Module Verification</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'ManageAddOnsValidation', 'method' => 'POST'])); ?>

                                                    <input type="hidden" name="name" value="<?php echo e(@$configName); ?>">

                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="form-group">
                                                        <label for="user">Envato Username :</label>
                                                        <input type="text" class="form-control " name="envatouser"
                                                               required="required"
                                                               placeholder="Enter Your Envato User Name"
                                                               value="<?php echo e(old('envatouser')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="purchasecode">Envato Purchase Code:</label>
                                                        <input type="text" class="form-control" name="purchase_code"
                                                               required="required"
                                                               placeholder="Enter Your Envato Purchase Code"
                                                               value="<?php echo e(old('purchasecode')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="domain">Installation Path:</label>
                                                        <input type="text" class="form-control"
                                                               name="installationdomain" required="required"
                                                               placeholder="Enter Your Installation Domain"
                                                               value="<?php echo e(url('/')); ?>" readonly>
                                                    </div>
                                                    <div class="row mt-40">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="primary-btn fix-gr-bg">
                                                                <span class="ti-check"></span>
                                                                <?php echo app('translator')->get('lang.verify'); ?>
                                                            </button>

                                                        </div>
                                                    </div>

                                                    <?php echo e(Form::close()); ?>

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

    <script>
        $(document).on('click','.module_switch',function (){
            var url = $("#url").val();
            var module = $(this).data('id');
console.log(url);
            $.ajax({
                type: "GET",
                dataType: "json",
                // beforeSend: function(){
                //     $(".module_switch_label"+module).hide();
                //     $(".waiting_loader"+module).show();
                // },
                url: url + "/" + "manage-adons-enable/" + module,
                success: function(data) {
                    $(".waiting_loader"+module).hide();
                    $(".module_switch_label"+module).show();
                    if (data["success"]) {
                        if (data["data"] == "enable") {
                            $(`.${module}`).removeClass("bg-warning");
                            $(`.${module}`).addClass("bg-success");
                            $(`.${module}`).text("Enable");
                        } else {
                            $(`.${module}`).removeClass("bg-success");
                            $(`.${module}`).addClass("bg-warning");
                            $(`.${module}`).text("Disable");
                        }
                        toastr.success(data["success"], "Success Alert");
                    } else {
                        toastr.error(data["error"], "Faild Alert");
                    }
                },
                error: function(data) {
                    console.log("Error:", data["error"]);
                },
            })
        })

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/module_manage.blade.php ENDPATH**/ ?>