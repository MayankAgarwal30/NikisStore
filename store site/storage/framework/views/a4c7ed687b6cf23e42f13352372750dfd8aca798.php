
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/dashboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/')); ?>public/backEnd/css/croppie.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/vendor_view.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php
   $infix_general_settings = app('infix_general_settings');
?>
<input type="text" hidden value="<?php echo e(@$data['user']->username); ?>" name="user_id" class="user_id">

<div class="banner-area3">
    <div class="banner-area-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="banner-info mb-30 d-flex justify-content-between align-items-center">
                        <div class="profile_author d-flex align-items-center">
                            <div class="thumb">
                                <img src="<?php echo e(@$data['user']->profile->image? asset(@$data['user']->profile->image):asset('public/frontend/img/profile/1.png')); ?>" width="100" alt="">
                            </div>
                                    <div class="profile_name">
                                    <h5><?php echo e(@$data['user']->username); ?></h5>
                                        <p><?php echo e(@$data['user']->profile->country->name , ','); ?> <?php echo app('translator')->get('lang.member_since'); ?> <?php echo e(DateFormat(@$data['user']->created_at)); ?> </p>
                                        <div class="view-follow">
                                             
                                            <a href="<?php echo e(route('user.portfolio',@$data['user']->username)); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.view'); ?> <?php echo app('translator')->get('lang.portfolio'); ?></a>
                                            <?php if(@$data['user']->id != Auth::id()): ?>
                                                <?php if(@Auth::check()): ?>
                                                    <?php if(CheckFollow(Auth::user()->id,$data['user']->id)): ?>
                                                        <a href="#" class="boxed-btn" id="UnfollowUser"><?php echo app('translator')->get('lang.unfollow'); ?></a>
                                                    <?php else: ?>
                                                        <a href="#" class="boxed-btn" id="FollowUser"><?php echo app('translator')->get('lang.follow'); ?></a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                <a href="<?php echo e(url('customer/login')); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.follow'); ?></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $item =App\ManageQuery::CountItemSell($data['user']->id); 
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
                                        <?php if(@$review_total > 0): ?>
                                            <?php else: ?>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="sate-total">
                                        <p><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.sales'); ?></p>
                                        <h3><?php echo e(@$item); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <!-- details-tablist-start -->
     <div class="details-tablist-area details-tablist-area-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="details-tablist ">
                            <nav>
                                <ul class="nav" id="myTab" role="tablist">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['profile'] == url()->current() ?'active':''); ?>" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="true"><?php echo app('translator')->get('lang.profile'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['portfolio'] == url()->current() ?'active':''); ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                            aria-controls="profile" aria-selected="false"><?php echo app('translator')->get('lang.portfolio'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['followers'] == url()->current() ?'active':''); ?>" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                            aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.followers'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['followings'] == url()->current() ?'active':''); ?>" id="Followings-tab" data-toggle="tab" href="#Followings"
                                            role="tab" aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.followings'); ?></a>
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
     </div>
        <!-- details-tablist-end -->
        <!-- main-details-area-start -->
    <div class="account-area account-area2 section-padding user_profile">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="col-xl-10 offset-xl-1 col-lg-12">
                        <div class="row">
                            <div class="col-xl-12 p-sm-0">
                                <div class="main-tab-content">
                                    <div class="tab-content" id="myTabContent">
                                        
                                        <div class="tab-pane fade <?php echo e(@$data['profile'] == url()->current() ?'show active':''); ?>  " id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="profile_profile">
                                                <div class="row">
                                                    <div class="col-xl-8 col-md-6">
                                                        <div class="big_logo gray-bg">
                                                            <div class="logo_thumb">
                                                                <img src="<?php echo e(@$data['user']->profile->logo_pic? asset(@$data['user']->profile->logo_pic):asset('public/frontend/img/banner/banner.png')); ?>" alt="">
                                                            </div>
                                                            <p><?php echo e(@$data['user']->profile->about); ?> </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">

                                                            <?php
                                                            $level=App\ManageQuery::UserLabel($data['user']->balance->amount); 
                                                            // DB::table('labels')->where('amount','<=',@$data['user']->balance->amount)->orderBy('id','desc')->first();
                                                            $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays(@$data['user']->created_at);
                                                            $badge=App\ManageQuery::UserBadge($date); 
                                                        ?>
                                                        <div class="badge_mark">
                                                                <div class="first_badge gray-bg">
                                                                    <img width="40" height="auto" src="<?php echo e(asset(@$level->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="Author level  <?php echo e(@$level->id); ?> : sold <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(round(@$data['user']->balance->amount > 50 ? @$data['user']->balance->amount: 0)); ?>+ on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                                                    <img width="40" height="auto" src="<?php echo e(asset(@$badge->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(@$level->id-1); ?> <?php echo e(@$badge->id == 1? 'Year' :'Years'); ?> of membarship on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                                     
                                                            </div>
                                                            <div class="social_profile gray-bg">
                                                                <h5><?php echo app('translator')->get('lang.social'); ?> <?php echo app('translator')->get('lang.profiles'); ?></h5>
                                                                <?php if(@$data['socila_icons']->behance != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->behance); ?>"><i class="fa fa-behance"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->deviantart != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->deviantart); ?>"><i class="fa fa-deviantart"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->digg != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->digg); ?>"><i class="fa fa-digg"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->dribbble != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->dribbble); ?>"><i class="fa fa-dribbble"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->facebook != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->facebook); ?>"><i class="fa fa-facebook"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->flickr != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->flickr); ?>"><i class="fa fa-flickr"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->github != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->github); ?>"><i class="fa fa-github"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->google_plus != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->google_plus); ?>"><i class="fa fa-google-plus"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->lastfm != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->lastfm); ?>"><i class="fa fa-lastfm"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->linkedin != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->linkedin); ?>"><i class="fa fa-linkedin"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->reddit != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->reddit); ?>"><i class="fa fa-reddit"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->soundcloud != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->soundcloud); ?>"><i class="fa fa-soundcloud"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->thumblr != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->thumblr); ?>"><i class="fa fa-thumblr"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->twitter != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->twitter); ?>"><i class="fa fa-twitter"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->vimeo != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->vimeo); ?>"><i class="fa fa-vimeo"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->youtube != ""): ?>
                                                                <a href="<?php echo e($data['socila_icons']->youtube); ?>"><i class="fa fa-youtube"></i></a>
                                                            <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php echo e(@$data['portfolio'] == url()->current() ?'show active':''); ?> " id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="portfolio_list gray-bg">
                                                <?php $__currentLoopData = $data['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div
                                                    class="single_portfolio_list  d-flex align-items-center justify-content-between">

                                                    <div class="portflio_thumb d-flex align-items-center col-lg-4">
                                                        <img src="<?php echo e(asset(@$item->icon)); ?>" alt="" width="100">
                                                        <div class="thumb_heading">
                                                        <h5><a href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->title),@$item->id])); ?>"><?php echo e(@$item->title); ?></a></h5>
                                                            <p><?php echo app('translator')->get('lang.item_by'); ?> <a href="<?php echo e(route('user.portfolio',@$item->user->username)); ?>"><?php echo e(@$item->user->username); ?></a> </p>
                                                        </div>
                                                    </div>

                                                    <div class="portfolio_details col-lg-4">
                                                        <p><?php echo app('translator')->get('lang.in'); ?>: <?php echo e(@$item->category->title); ?> / <?php echo e(@$item->subCategory->title); ?> <br>
                                                            <?php echo app('translator')->get('lang.high_resolution'); ?>: <?php echo e(@$item->resolution); ?>, <?php echo app('translator')->get('lang.compatible_browsers'); ?>: <?php echo e(@$item->compatible_browsers); ?>, <?php echo app('translator')->get('lang.compatible_with'); ?>: <br>
                                                            <?php echo e(@$item->compatible_with); ?>, <?php echo app('translator')->get('lang.Columns'); ?>: <?php echo e(@$item->columns); ?></p>
                                                    </div>

                                                    <?php if(@Auth::user()->id==$item->user_id): ?>
                                                    <div class="cart_heart d-flex col-lg-2">
                                                        
                                                       
                                                       

                                                       <a href="<?php echo e(route('author.itemEdit',$item->id)); ?>" class="heart"><i class=" ti-pencil-alt "></i></a>
                                                       <a  onclick="deleItem(<?php echo e($item->id); ?>)" class="heart heart2 trash"><i class="ti-trash"></i></a>
                                                       <a id="delete-form-<?php echo e($item->id); ?>" href="<?php echo e(route('author.itemDelete',$item->id)); ?>" class="dm_display_none"></a>

                                                    <a href="<?php echo e(route('author.ProductDownload',$item->id)); ?>"  class="heart heart2"><i class=" ti-import" ></i></a>
                                                    
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="cart_heart d-flex col-lg-2">
                                                        
                                                       <form action="<?php echo e(route('AddBuy')); ?>" method="POST" id="AddtoBuy<?php echo e(@$item->id); ?>">
                                                            <?php echo csrf_field(); ?>
                                                        <input type="text" hidden  name="_item_id" value="<?php echo e(@$item->id); ?>">
                                                        <input type="text" hidden  name="_item_percent" value="<?php echo e(@$data['BuyerFee']->fee/100); ?>">
                                                        <input type="text" hidden id="totalVal" name="totalVal" value="<?php echo e(@$item->Reg_total); ?>">
                                                        <a href="#" onclick="BuyNow(<?php echo e(@$item->id); ?>)" class="heart heart2"><i class="ti-shopping-cart"></i></a>
                                                        </form>
                                                       
                                                        
                                                    
                                                    </div>
                                                    <?php endif; ?>

                                                    

                                                    <div class="total-prise text-center col-lg-2">
                                                      <h2><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$item->Reg_total); ?></h2>
                                                        <p><?php echo app('translator')->get('lang.total'); ?> <?php echo e(@$item->sell); ?> <?php echo app('translator')->get('lang.purchases'); ?></p>
                                                    </div>

                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="Pagination">
                                                    <?php echo e(@$data['item']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php echo e(@$data['followers'] == url()->current() ?'show active':''); ?> " id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            <?php if(@$data['follower']): ?>
                                            <?php $__currentLoopData = $data['follower']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="follower gray-bg">
                                                    <?php if(isset($item->balance)): ?>
                                                    <div class="single_followers d-flex justify-content-between align-items-center ">
                                                        <div class="followers d-flex align-items-center">
                                                            <img width="80" height="auto" src="<?php echo e(@$item->profile->image? asset(@$item->profile->image):asset('public/frontend/img/profile/1.png')); ?>" alt="">
                                                            <div class="thumb_heading">
                                                                <h5><a href="<?php echo e(route('user.profile',@$item->username)); ?>"><?php echo e(@$item->username); ?></a></h5>
                                                                <p><?php echo app('translator')->get('lang.member_since'); ?>: <?php echo e(DateFormat(@$item->created_at)); ?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                             $level=App\ManageQuery::UserLabel($item->balance->amount); 
                                                            // DB::table('labels')->where('amount','<=',@$item->balance->amount)->orderBy('id','desc')->first();
                                                            $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays(@$item->created_at);
                                                            $badge=App\ManageQuery::UserBadge($date); 
                                                        ?>
                                                        <div class="bandge">
                                                                <img src="<?php echo e(asset(@$level->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="Author level  <?php echo e(@$level->id); ?> : sold <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(round(@$item->balance->amount > 50 ? @$item->balance->amount: 0)); ?>+ on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                                                <img src="<?php echo e(asset(@$badge->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(@$level->id-1); ?> <?php echo e(@$badge->id == 1? 'Year' :'Years'); ?> of membarship on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                                        </div>
                                                        <div class="rating">
                                                                <div class="rate">
                                                                        <?php
                                                                               
                                                                                $review_total=count(@$item->reviews);
                                                                                $total_star=0;
                                                                            ?>
                                                                            <?php if(@$review_total > 0): ?>
                                                                            
                                                                                <?php $__currentLoopData = $item->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php
                                                                                        $total_star = $total_star+$review->rating;
                                                                                    ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php
                                                                                        $total_star=$total_star/$review_total;
                                                                                    ?>
                                                                                    <?php if($total_star == .5): ?>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 1): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 1.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 2): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 2.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 3): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 3.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 4): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 4.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o"></i>
                                                                                    <?php elseif($total_star == 5): ?>
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
                                                                <p><?php echo e($review_total); ?> <?php echo app('translator')->get('lang.Ratings'); ?></p>
                                                        </div>
                                                                <div class="total-prise text-center">
                                                                   <h2> <?php echo e($item->item->sum('sell')); ?></h2>
                                                                    <p><?php echo app('translator')->get('lang.sales'); ?></p>
                                                                </div>
                                                    </div> 
                                                <?php endif; ?>                                                      
                                            </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="Pagination">
                                                            <?php echo e(@$data['follower']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                        </div>
                                                    <?php else: ?>
                                                     <h2><?php echo app('translator')->get('lang.no'); ?> <?php echo app('translator')->get('lang.followers'); ?></h2>
                                                   <?php endif; ?>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        <!-- Followings start here  -->
                                        <div class="tab-pane fade <?php echo e(@$data['followings'] == url()->current() ?'show active':''); ?> " id="Followings" role="tabpanel"
                                            aria-labelledby="Followings-tab">
                                           
                                            <div class="follower gray-bg">
                                                    <?php if(@$data['following']): ?>
                                                        <?php $__currentLoopData = $data['following']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(isset($item->balance)): ?>
                                                            <div
                                                                class="single_followers d-flex justify-content-between align-items-center ">
                                                                <div class="followers d-flex align-items-center">
                                                                    <img width="80" height="auto" src="<?php echo e(@$item->profile->image? asset(@$item->profile->image):asset('public/frontend/img/profile/1.png')); ?>" alt="" width="80" height="auto">
                                                                    <div class="thumb_heading">
                                                                        <h5><a href="<?php echo e(route('user.profile',@$item->username)); ?>"><?php echo e(@$item->username); ?></a></h5>
                                                                        <p><?php echo app('translator')->get('lang.member_since'); ?>: <?php echo e(DateFormat(@$item->created_at)); ?></p>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                 $level=App\ManageQuery::UserLabel($item->balance->amount); 
                                                                // DB::table('labels')->where('amount','<=',@$item->balance->amount)->orderBy('id','desc')->first();
                                                                $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays(@$item->created_at);
                                                                $badge=App\ManageQuery::UserBadge($date); 
                                                                    // $level=DB::table('labels')->where('amount','<=',@$item->balance->amount)->orderBy('id','desc')->first();
                                                                    // $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays($item->created_at);
                                                                    // $badge=DB::table('badges')->where('day','<=',@$date)->orderBy('id','desc')->first();
                                                                ?>
                                                                <div class="bandge">
                                                                        <img src="<?php echo e(asset(@$level->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="Author level  <?php echo e(@$level->id); ?> : sold <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(round(@$item->balance->amount > 50 ? @$item->balance->amount: 0)); ?>+ on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                                                        <img src="<?php echo e(asset(@$badge->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(@$level->id-1); ?> <?php echo e(@$badge->id == 1? 'Year' :'Years'); ?> of membarship on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                                             
                                                                    </div>
                                                                    <div class="rating">
                                                                            <div class="rate">
                                                                                <?php
                                                                               
                                                                                $review_total=count(@$item->reviews);
                                                                                $total_star=0;
                                                                            ?>
                                                                            <?php if(@$review_total > 0): ?>
                                                                            
                                                                                <?php $__currentLoopData = $item->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php
                                                                                        $total_star = $total_star+$review->rating;
                                                                                    ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php
                                                                                        $total_star=$total_star/$review_total;
                                                                                    ?>
                                                                                    <?php if($total_star == .5): ?>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 1): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 1.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 2): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 2.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 3): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 3.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 4): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                    <?php elseif($total_star == 4.5): ?>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star-half-o"></i>
                                                                                    <?php elseif($total_star == 5): ?>
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
                                                                            <p><?php echo e(@$review_total); ?> <?php echo app('translator')->get('lang.Ratings'); ?></p>
                                                                            </div>
                                                                            <div class="total-prise text-center">
                                                                               <h2> <?php echo e($item->item->sum('sell')); ?></h2>
                                                                                <p><?php echo app('translator')->get('lang.sales'); ?></p>
                                                                            </div>
                                                                        </div> 
                                                                
                                                            </div>   
                                                            <?php endif; ?>                                                   
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="Pagination">
                                                                <?php echo e(@$data['following']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                        </div>
                                                    <?php else: ?>
                                                    <h2><?php echo app('translator')->get('lang.no'); ?> <?php echo app('translator')->get('lang.following'); ?></h2>
                                                    <?php endif; ?>
                                                   
                                                </div>
                                        </div>
                                        <!-- Followings end  -->
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- main-details-area-end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<!-- Croppie js -->
<script src="<?php echo e(asset('/public/backEnd/js/')); ?>/croppie.js"></script>

<script src="<?php echo e(asset('public/frontend/js/vendorView.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/delete.js"></script>

    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/vendorView.blade.php ENDPATH**/ ?>