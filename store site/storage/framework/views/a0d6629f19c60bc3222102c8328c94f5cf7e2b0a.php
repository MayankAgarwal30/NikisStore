<?php
     $notification=app('sm_notifications');
?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/css/')); ?>/live_search.css">
<nav class="navbar navbar-expand-lg up_navbar">
    <div class="container-fluid">
        <div class="col-lg-12">
        <div class='up_dash_menu'>
        <button type="button" id="sidebarCollapse" class="btn d-lg-none nav_icon">
                <i class="ti-more"></i>
            </button>
<input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
        <ul class="nav navbar-nav mr-auto search-bar">
                <li class="">
                    <div class="input-group">
                        <span>
                            <i class="ti-search" aria-hidden="true" id="search-icon"></i>
                        </span>

                        <input type="text" class="form-control primary-input input-left-icon" placeholder="Search"
                            id="search" onkeyup="showResult(this.value)"/>
                        <span class="focus-border"></span>
                    </div>
                    <div id="livesearch"></div>
                </li>
            </ul>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto nav_icon" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="nav navbar-nav mr-auto nav-buttons flex-sm-row">
                <li class="nav-item">
                    <a class="primary-btn white mr-10" href="<?php echo e(url('/')); ?>"><?php echo app('translator')->get('lang.website'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="primary-btn white mr-10" href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                </li>
                
            </ul>

                    <?php
                    if(Schema::hasTable('infix_languages')){
                        // @$languages = Modules\Systemsetting\Entities\InfixLanguage::all();
                        @$active_language=Modules\Systemsetting\Entities\InfixLanguage::where('active_status',1)->first();
                    }
                    ?>


           
            <?php if(@$styles): ?>
            
                      
                        <ul class="nav navbar-nav mr-auto nav-setting flex-sm-row d-none d-lg-block colortheme">
                            <li class="nav-item active">
                                <select class="niceSelect infix_theme_style" id="infix_theme_style">
                                    <option data-display="<?php echo app('translator')->get('lang.select_styles'); ?>" value="0"><?php echo app('translator')->get('lang.select_styles'); ?></option>
                                    <?php $__currentLoopData = $styles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e(@$style->id); ?>" <?php echo e(@$style->id == $active_style->id?'selected':''); ?>><?php echo e(@$style->style_name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </li>
                        </ul>


                        <ul class="nav navbar-nav mr-auto nav-setting flex-sm-row d-none d-lg-block colortheme">
                            <li class="nav-item active">
                               <select class="niceSelect languageChange" name="languageChange" id="languageChangeMenu">
                                        <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.language'); ?>" value="0"><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.language'); ?></option>
                                        <?php
                                            $languages=app('infix_languages');
                                        ?>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-display="<?php echo e($lang->native); ?>" value="<?php echo e($lang->language_universal); ?>" <?php echo e($lang->language_universal == app()->getLocale()? 'selected':''); ?>><?php echo e($lang->native); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </li>
                        </ul>



                        

                        <?php endif; ?>

            <!-- Start Right Navbar -->
            <ul class="nav navbar-nav right-navbar">
                

                    <li class="nav-item notification-area   d-none d-lg-block">
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown">
    
                                    <span class="badge"><?php echo e(count(@$notification)); ?></span>
                                    <span class="flaticon-notification"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="white-box">
                                        <div class="p-h-20">
                                            <p class="notification"><?php echo app('translator')->get('lang.you_have'); ?> <span><?php echo e(count(@$notification)); ?> <?php echo app('translator')->get('lang.new'); ?></span>
                                                <?php echo app('translator')->get('lang.notification'); ?></p>
                                        </div>
                                        <?php $__currentLoopData = @$notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item pos-re linkk" href="<?php echo e(@$val->link); ?>" name="tabs" data-id="<?php echo e(@$val->id); ?>">
                                        <div class="single-message single-notifi">
                                            <div class="d-flex">
                                                <span class="ti-bell"></span>
                                                <div class="d-flex align-items-center ml-10">
                                                    <div class="mr-60">
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="<?php echo e(@$val->message); ?>">
                                                        <p class="message"><?php echo e(@$val->message); ?></p>
                                                        </span>
                                                    </div>
                                                <div class="mr-10 text-right bell_time">
                                                    <p class="time pl-2"><small><?php echo e(DateFormat(@$val->created_at)); ?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                        <a href="<?php echo e(route('admin.mark_all_as_read')); ?>" class="primary-btn text-center text-uppercase mark-all-as-read">
                                            <?php echo app('translator')->get('lang.mark_all_as_read'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                <li class="nav-item setting-area">
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">

                                <?php if(!empty(@Auth::user()->profile->image)): ?>
                                <img class="rounded-circle" src="<?php echo e(asset(@Auth::user()->profile->image)); ?>"  alt="">
                                <?php else: ?>
                                <img class="rounded-circle" src="<?php echo e(asset('public/backEnd/img/admin/staff.png')); ?>"  alt="">
                                <?php endif; ?>
                        </button>
                        <div class="dropdown-menu profile-box">
                            <div class="white-box">
                                <a class="dropdown-item" href="#">
                                    <div class="">
                                        <div class="d-flex">
                                            <?php if(!empty(@Auth::user()->profile->image)): ?>
                                                <img class="client_img" src="<?php echo e(asset(@Auth::user()->profile->image)); ?>"alt="">
                                            <?php else: ?>
                                                <img class="client_img" src="<?php echo e(asset('public/backEnd/img/admin/staff.png')); ?>"alt="">
                                            <?php endif; ?>
                                            <div class="d-flex ml-10">
                                                <div class="">
                                                    <h5 class="name text-uppercase"><?php echo e(Auth::user()->username); ?></h5>
                                                    <p class="message"><?php echo e(Auth::user()->email); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <ul class="list-unstyled">
                                    <li>
                                        
                                        <a href="<?php echo e(route('admin.profile', Auth::user()->id)); ?>">
                                            <span class="ti-user"></span>
                                            <?php echo app('translator')->get('lang.profile'); ?> <?php echo app('translator')->get('lang.view'); ?>
                                        </a>
                                        
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('admin.password_change')); ?>">
                                            <span class="ti-key"></span>
                                            <?php echo app('translator')->get('lang.password'); ?>
                                        </a>
                                    </li>
                                    <li>

                                        <a href="<?php echo e(route('admin.logout')); ?>">
                                            <span class="ti-unlock"></span>
                                            <?php echo app('translator')->get('lang.logout'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- End Right Navbar -->
        </div>
        </div>
        </div>
    </div>
</nav>


<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>
<?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/partials/menu.blade.php ENDPATH**/ ?>