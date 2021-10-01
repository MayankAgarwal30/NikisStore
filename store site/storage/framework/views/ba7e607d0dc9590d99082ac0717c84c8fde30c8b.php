<div class="banner-area3">
        <div class="banner-area-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="banner-info mb-30 d-flex justify-content-between align-items-center">
                            <div class="profile_author d-flex align-items-center">
                                <div class="thumb">
                                <?php
                                    $profile=$data['user']->profile->image;
                                ?>
                                <img src="<?php echo e(file_exists(@$profile) ? asset($profile) : asset('public/uploads/user/user.png')); ?> " width="100" alt="">
                                </div>
                                <div class="profile_name">
                                   <h5><?php echo e(@$data['user']->username); ?></h5>
                                    <p><?php echo e(@$data['user']->profile->country->name,','); ?> <?php echo app('translator')->get('lang.member_since'); ?> <?php echo e(DateFormat(@$data['user']->created_at)); ?> </p>
                                    <?php if(@Auth::user()->id != @$data['user']->id): ?>
                                    <div class="view-follow">
                                        <a href="#" class="boxed-btn"><?php echo app('translator')->get('lang.view_portfolio'); ?></a>
                                        <a href="#" class="boxed-btn"><?php echo app('translator')->get('lang.follow'); ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                             <?php if(@Auth::user()->role_id == 4): ?>
                            <?php
                                $item = App\ManageQuery::CountItemSell($data['user']->id);
                            ?>
                                <div class="rating d-flex">
                                    <div class="rating-star">
                                    <?php
                                        $review_total=count(@$data['item_review']);
                                        $total_star=0;
                                    ?>
                                    <?php if(@$review_total > 0): ?>
                                     
                                    <?php $__currentLoopData = @$data['item_review']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $total_star = @$total_star+@$review->rating;
                                    ?>
                                    <?php
                                        $countable_star=$total_star/$review_total;
                                        $row_countable_star= floor($countable_star * 100) / 100;
                                        if ($row_countable_star>0 && $row_countable_star<=.5) {
                                            $countable_star=.5;
                                        }  
                                        if ($row_countable_star>.5 && $row_countable_star<=1) {
                                            $countable_star=1;
                                        } 
                                         if ($row_countable_star>1 && $row_countable_star<=1.5) {
                                            $countable_star=1.5;
                                            
                                        }  
                                        if ($row_countable_star>1.5 && $row_countable_star<=2) {
                                            $countable_star=2;
                                            
                                        } 
                                        if ($row_countable_star>2 && $row_countable_star<=2.5) {
                                            $countable_star=2.5;
                                            
                                        } 
                                        if ($row_countable_star>2.5 && $row_countable_star<=3) {
                                            $countable_star=3;
                                            
                                        }
                                         if ($row_countable_star>3 && $row_countable_star<=3.5) {
                                            $countable_star=3.5;
                                            
                                        } 
                                        if ($row_countable_star>3.5 && $row_countable_star<=4) {
                                            $countable_star=4;
                                            
                                        } 
                                        if($row_countable_star>4 && $row_countable_star<=4.5) {
                                            $countable_star=4.5;
                                            
                                        }
                                        if($row_countable_star>4.5 && $row_countable_star<=5) {
                                            $countable_star=5;
                                            
                                        }
                                    ?>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <p><?php echo e(@$countable_star); ?> <?php echo app('translator')->get('lang.Ratings'); ?></p>
                                        <?php if(@$countable_star == .5): ?>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 1): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 1.5): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 2): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 2.5): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 3): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 3.5): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 4): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        <?php elseif(@$countable_star == 4.5): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        <?php elseif(@$countable_star == 5): ?>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        <?php endif; ?>
                                       
                                        <?php else: ?>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="sate-total">
                                        <p><?php echo app('translator')->get('lang.total_sales'); ?></p>
                                        <h3><?php echo e(@$item); ?></h3>
                                    </div>
                                </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/partials/vendor_banner.blade.php ENDPATH**/ ?>