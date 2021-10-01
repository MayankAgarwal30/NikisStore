
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/index_item.css">
    <style>
    .verify_mail_area{
        padding: 243px 0 250px 0;
    }
    .verify_text h3{
        font-size: 32px;
        color:#000000;
        margin-bottom: 21px;
        font-weight: 700;
        magin-bottom: 0;
        margin-bottom: 50px;
    }
    .verify_text p{
        color: #888888;
        font-size: 14px;
        font-weight: 300;
        margin-bottom: 0;
    }
    .verify_text p a{
        font-weight: 500;
        color: #000;
        border-bottom: 1px solid #000;
    }
    .verify_text p a:hover{
        color: #7c32ff;
        border-bottom: 1px solid #7c32ff;
    }
    .links_back{
        background: #fafafa;
        padding: 25px 55px;
        display: inline-block;
    }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<div class="banner-area4">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-info">
                            <h2>Mail Verify</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="verify_mail_area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="verify_text text-center">
                        <h3>Verify your Email Address</h3>
                        <div class="links_back">
                            <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

                            <?php echo e(__('If you did not receive the email')); ?>,
                            <form action="<?php echo e(route('verification_resend')); ?>" method="post" class="mt-20">
                                <?php echo csrf_field(); ?>
                                <button class="boxed-btn" type="submit"><?php echo e(__('click here to request another')); ?></button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/email/veriry_mail.blade.php ENDPATH**/ ?>