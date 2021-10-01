
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
                            <h2><?php echo app('translator')->get('lang.become_an'); ?> <?php echo app('translator')->get('lang.author'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->

    <div class="privaci_polecy_area section-padding">
        <div class="container">
            <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-12">
                  <div class="row">
                      <form action="javascript:;" method="POST" id="become_form">
                          <?php echo csrf_field(); ?>
                      <div class="col-10">
                        <?php echo @$author_text->description; ?>

                          <div class="row mt-5">
                              <div class="col-lg-10"><input type="checkbox" value="0"  id="tearms_"><label for="tearms_" class="ml-2"> <?php echo app('translator')->get('lang.by_continuing_you_agree_to_the'); ?> <a href="javasrcipt:;"><?php echo e(GeneralSetting()->system_name); ?> <?php echo app('translator')->get('lang.terms'); ?></a></label></div>                                                                                     
                              <span class="invalid-feedback invalid-select ml-4 dm_display_block" role="alert">
                                  <strong id="Selectterms"></strong>
                              </span>
                         </div>
                         <div class="coupns-btn mt-5">
                            <button type="submit" onclick="BeAuthor()" class="boxed-btn"><?php echo app('translator')->get('lang.continue'); ?></button>
                        </div>
                      </div>
                    </form>
                  </div>
                    
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/ticket.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/Become_author.blade.php ENDPATH**/ ?>