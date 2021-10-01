

<?php $__env->startSection('code', '500'); ?>
<?php $__env->startSection('title', __('Error')); ?>

<style>
	.back_image{
		background-image: url(<?php echo e(asset('/svg/500.svg')); ?>);
	}
</style>

<?php $__env->startSection('image'); ?>
    <div class="back_image absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __('Whoops, something went wrong on our servers.')); ?>

<?php echo $__env->make('errors::illustrated-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/errors/500.blade.php ENDPATH**/ ?>