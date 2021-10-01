
<?php $__env->startPush('css'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/license.css">
<?php $__env->stopPush(); ?>
<?php 
  $banner_coller = App\FrontSetting::where('active_status', 1)->first();
?> 
<?php $__env->startSection('content'); ?>

      <!-- banner-area start -->
    <div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">
                            <h2><?php echo app('translator')->get('lang.license'); ?></h2> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
    <!-- privaci_polecy_area start -->
    



    <div class="lisense_wrap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="content-main" id="content">
  
                    <div class="grid-container">
                
                    <h2 class="t-heading"><?php echo e($data->heading); ?></h2>

                    
                        <p class="t-body">
                          <?php echo e($data->heading_text); ?>

                        </p>
                
                        <div class="table_wrapper">
                          <table class="table-general" data-view="tableHighlightColumn" data-disable-first-column="true" data-selected-column="js-column-">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="js-column-regular">
                                        <h3 class="t-heading"><?php echo app('translator')->get('lang.regular'); ?></h3>
                                        
                                    </th>
                                    <th class="js-column-extended">
                                        <h3 class="t-heading"><?php echo app('translator')->get('lang.extended'); ?></h3>
                                        
                                    </th>
                                </tr>
                            </thead>
                
                            <tbody>
                              <?php $__currentLoopData = $license_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-left"><?php echo e(@$value->feature_title); ?></td>
                                    <td class="">
                                        <?php if(@$value->regular==1): ?>
                                          <span class="e-icon -icon-ok -color-green"><i class="fa fa-check" aria-hidden="true"></i></span>
                                        <?php else: ?>
                                          <span class="e-icon -icon-cancel -color-red"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="">
                                        <?php if(@$value->extended==1): ?>
                                          <span class="e-icon -icon-ok -color-green"><i class="fa fa-check" aria-hidden="true"></i></span>
                                        <?php else: ?>
                                          <span class="e-icon -icon-cancel -color-red"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        </div>

                
                        <h3 class="t-heading"><?php echo e($data->heading2); ?>:</h3>
                        <p class="t-body">
                          <?php echo e($data->heading2_text); ?>

                        </p>
              
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
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/license.blade.php ENDPATH**/ ?>