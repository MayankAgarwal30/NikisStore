<script>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error('<?php echo e($error); ?>','Error',{
                    closeButton:true,
                    progressBar:true,
                });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</script><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/error/error.blade.php ENDPATH**/ ?>