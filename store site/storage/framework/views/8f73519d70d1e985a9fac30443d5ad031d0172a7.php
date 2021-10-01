<?php if(@$paginator->hasPages()): ?>
    <ul role="navigation">
        
        <?php if(@$paginator->onFirstPage()): ?>
            
            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>"><a class="arrow" href="#"><i
                class="fa fa-caret-left"></i></a></li>
        <?php else: ?>
            <li class="page-item">
                <a class="arrow" href="<?php echo e(@$paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>"><i
                    class="fa fa-caret-left"></i></a>
            </li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string(@$element)): ?>
                <li class="page-item disabled" aria-disabled="true"><span ><?php echo e(@$element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array(@$element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(@$page == $paginator->currentPage()): ?>
                        <li class="page-item active" aria-current="page"><a class="active"><?php echo e(@$page); ?></a></li>
                    <?php else: ?>
                        <li class="page-item"><a  href="<?php echo e($url); ?>"><?php echo e(@$page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item">
                <a class="arrow"  href="<?php echo e(@$paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>"> <?php if(@$paginator->lastItem()): ?><i class="fa fa-caret-right"></i> <?php endif; ?></a>
            </li>
        <?php else: ?>
           
            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>"><a class="arrow" href="#"><i
                class="fa fa-caret-right"></i></a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/paginate/frontentPaginate.blade.php ENDPATH**/ ?>