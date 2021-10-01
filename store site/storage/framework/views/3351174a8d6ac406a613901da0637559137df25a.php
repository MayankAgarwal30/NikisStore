
<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

      <!-- banner-area start -->
    <div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">
                            <h2><?php echo app('translator')->get('lang.terms'); ?> <?php echo app('translator')->get('lang.&'); ?> <?php echo app('translator')->get('lang.conditions'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
    <!-- privaci_polecy_area start -->
    <div class="privaci_polecy_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-12">
                    <div class="privacy_inner gray-bg">
                        <?php $__currentLoopData = $term_conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term_condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
                        <div class="single_privacy">
                            <h2><?php echo e(@$term_condition->heading_title); ?></h2>
                            <span><?php echo e(@$term_condition->sub_title); ?></span>
                            
                            <?php if(!empty(@$term_condition->image)): ?>
                                <img class="mb-20 mt-20" width="780" height="auto" src="<?php echo e(url('/').'/'.@$term_condition->image); ?>" alt="">
                            <?php endif; ?>
                            
                            
                            <p><?php echo e(@$term_condition->short_description); ?></p>
                            <p><?php echo @$term_condition->description; ?></p>
                        </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- privaci_polecy_area end -->
   
 <?php $__env->stopSection(); ?>
 <?php $__env->startPush('js'); ?>
     
<script src="<?php echo e(asset('public/frontend/js/')); ?>/package.js"></script>
 <?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/term_conditions.blade.php ENDPATH**/ ?>