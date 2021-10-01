
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
                            <h2><?php echo app('translator')->get('lang.market_apis'); ?></h2>
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
                        <div class="single_privacy">
                            <p><?php echo @$market_api->description; ?></p>
                        </div>
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
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/market_apis.blade.php ENDPATH**/ ?>