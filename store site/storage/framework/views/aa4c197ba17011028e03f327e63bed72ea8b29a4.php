
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/kn_base.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


  <!-- banner-area start -->
    <div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">
                            <h2><?php echo app('translator')->get('lang.knowledge_base'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->

    <!-- knowledge_tabs_area start -->
    <div class="knowledge_tabs_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="my_custom_navs gray-bg">
                                <h5><?php echo app('translator')->get('lang.knowledge_base'); ?> <?php echo app('translator')->get('lang.Category'); ?></h5>
                                <div class="nav flex-column" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <?php $__currentLoopData = $know_base_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                        <a class="nav-link <?php if($key==0): ?> show active <?php endif; ?>" id="v-pills-home-tab" data-toggle="pill"
                                            href="#v-pills-home<?php echo e(@$category->id); ?>" role="tab" aria-controls="v-pills-home"
                                            aria-selected="true"><?php echo e(@$category->name); ?></a>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="my_tab_content gray-bg">
                                <div class="tab-content" id="v-pills-tabContent">
                                     <?php $__currentLoopData = $know_base_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade  <?php if($key==0): ?> show active <?php endif; ?> " id="v-pills-home<?php echo e(@$category->id); ?>" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="single_knowledge_tab accordion-container">
                                            <nav>
                                                <ul>
                                                  
                                                    <?php $__currentLoopData = $category->firstQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title_question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="set">
                                                            <a>
                                                                <?php echo e(@$title_question->first_question); ?>

                                                            </a>
                                                            <div class="content">
                                                                <div id="accordion">
                                                                 
                                                                    <?php $__currentLoopData = $title_question->secondQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_q_answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  
                                                                        <div class="card">
                                                                            <div class="card-header" id="heading<?php echo e(@$sub_q_answer->id); ?>">
                                                                                <h5 class="mb-0">
                                                                                    <button class="btn btn-link collapsed"
                                                                                        data-toggle="collapse"
                                                                                        data-target="#collapse<?php echo e(@$sub_q_answer->id); ?>"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapse<?php echo e(@$sub_q_answer->id); ?>">
                                                                                    <?php echo e(@$sub_q_answer->sub_question); ?>

                                                                                    </button>
                                                                                </h5>
                                                                            </div>
                                                                            <div id="collapse<?php echo e(@$sub_q_answer->id); ?>" class="collapse"
                                                                                aria-labelledby="heading<?php echo e(@$sub_q_answer->id); ?>"
                                                                                data-parent="#accordion">
                                                                                <div class="card-body">
                                                                                    <?php echo @$sub_q_answer->answer; ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- knowledge_tabs_area end -->
 <?php $__env->stopSection(); ?>
 <?php $__env->startPush('js'); ?>
   
<script src="<?php echo e(asset('public/frontend/js/')); ?>/package.js"></script>

 <?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/knowledge_base.blade.php ENDPATH**/ ?>