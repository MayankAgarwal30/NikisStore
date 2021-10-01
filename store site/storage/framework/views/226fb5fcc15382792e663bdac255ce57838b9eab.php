
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/index_item.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/index_modal.css">

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('frontend.partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php 
$homepage = Modules\Pages\Entities\InfixHomePage::where('active_status', 1)->first();
?> 
<input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
<div class="features-area section-padding1" onscroll="OnScroll()">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 offset-xl-3">
                <div class="section-title text-center mb-70">
                <h3><?php echo e($homepage->feature_title); ?></h3>
                    
                    <h4><?php echo e($homepage->feature_title_description); ?></h4>
                </div>
            </div>
        </div>


        
        <div class="row">
            <div class="col-xl-6 offset-xl-3">
                <div class="features-wrap " id="FeatureItem">

                </div>
            </div>
            <div class="col-lg-12">
                <div class="view-features text-center mt-80">
                   <a href="<?php echo e(route('feature_item')); ?>"  class="black-btn"><?php echo app('translator')->get('lang.view_all_featured_products'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- features-area-end -->


<?php
   $infix_general_settings = app('infix_general_settings');
?>




<!-- latest-goods-start -->
<div class="latest-goods-area gray-bg section-padding1" onscroll="OnScroll()">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xl-6">
                <div class="section-title mb-40">
                    <h3><?php echo e($homepage->product_title); ?></h3>
                    
                    <h4><?php echo e($homepage->product_title_description); ?></h4>
                </div>
            </div>
            <input type="hidden" id="currency_symbol" value="<?php echo e(@$infix_general_settings->currency_symbol); ?>">
            <div class="col-xl-6">
                <div class="portfolio-menu portfolio-menu2 text-xl-right text-lg-left text-sm-center">
                    <button class="active" value="all" id="all" data-filter="*"><?php echo app('translator')->get('lang.all_items'); ?></button>
                    <button data-filter=".cat1" value="bestsell" id="bestsell"><?php echo app('translator')->get('lang.best_sellers'); ?></button>
                    <button data-filter=".cat2" value="newest" id="newest"><?php echo app('translator')->get('lang.Newest'); ?></button>
                    <button data-filter=".cat3" value="bestrated" id="bestrated"><?php echo app('translator')->get('lang.best_rated'); ?></button>
                    <button data-filter=".cat4" value="trending" id="trending"><?php echo app('translator')->get('lang.Trending'); ?></button>
                    <button data-filter=".cat5" value="high" id="high"><?php echo app('translator')->get('lang.price_high_to_low'); ?></button>
                    <button data-filter=".cat6" value="low" id="low"><?php echo app('translator')->get('lang.price_low_to_high'); ?></button>
                </div>
            </div>
        </div>
        <div class="row grid databox " id="databox">
        </div>
        <div class="row bt">
        </div>
    </div>
</div>

<?php if(@$free_items_count >0): ?>
<!-- Free item Start -->
<div class="features-area section-padding1 pt-0" onscroll="OnScroll()">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 offset-xl-3">
                <div class="section-title text-center mb-70 mt-4">
                <h3><?php echo app('translator')->get('lang.free_product_of_the_month'); ?></h3>
                    
                    <h4><?php echo e($homepage->feature_title_description); ?></h4>
                </div>
            </div>
        </div>


        
        

         
         <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="features-wrap d-flex justify-content-center" id="FreeItem">

                </div>
            </div>

            <div class="col-lg-12">
                <div class="view-features text-center mt-80">
                    <a href="<?php echo e(route('free_items')); ?>"  class="black-btn"><?php echo app('translator')->get('lang.view_all_free_products'); ?></a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Free item end -->
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/item_load.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/filter.js"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/home/index.blade.php ENDPATH**/ ?>