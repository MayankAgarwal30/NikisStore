
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/dashboard.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/dashboard.css">
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
<?php $__env->stopPush(); ?>
 
<?php
   $infix_general_settings =app('infix_general_settings');
?>
<?php $__env->startSection('content'); ?>
      <?php echo $__env->make('frontend.partials.vendor_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- details-tablist-start -->
     <input type="text" hidden value="<?php echo e(url('/')); ?>" id="url">
      <input type="text" hidden value="<?php echo e(@$data['user']->username); ?>" name="user_id" class="user_id">
     <div class="details-tablist-area details-tablist-area-two menu_md_bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="details-tablist ">
                            <nav>
                                <ul class="nav" id="myTab" role="tablist">
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <li class="nav-item">
                                       <a class="nav-link <?php echo e(@$data['dashboard'] == url()->current() ?'active':''); ?> " id="Dashboard-tab" data-toggle="tab" href="#Dashboard"
                                            role="tab" aria-controls="Dashboard" aria-selected="false"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4 || @Auth::user()->role_id == 5): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['profile'] == url()->current() ?'active':''); ?>" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="true"><?php echo app('translator')->get('lang.profile'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
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
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4 || @Auth::user()->role_id == 5): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['setting'] == url()->current() ?'active':''); ?>" id="Settings-tab" data-toggle="tab" href="#Settings" role="tab"
                                            aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.settings'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['hiddenItem'] == url()->current() ?'active':''); ?>" id="Hidden-tab" data-toggle="tab" href="#Hidden" role="tab"
                                            aria-controls="contact" aria-selected="false" ><?php echo app('translator')->get('lang.hidden_items'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4 || @Auth::user()->role_id == 5): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['download'] == url()->current() ?'active':''); ?>" id="Downloads-tab" data-toggle="tab" href="#Downloads"
                                            role="tab" aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.Downloads'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['reviews'] == url()->current() ?'active':''); ?>" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                                            aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.reviews'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['refunds'] == url()->current() ?'active':''); ?>" id="refunds-tab" data-toggle="tab" href="#refunds" role="tab"
                                            aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.refunds'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['payout'] == url()->current() ?'active':''); ?>" id="payouts_show-tab" data-toggle="tab" href="#payouts_show" role="tab"
                                            aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.payouts'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['earning'] == url()->current() ?'active':''); ?>" id="Followings-tab00" data-toggle="tab" href="#Followings00"
                                            role="tab" aria-controls="contact00" aria-selected="false"><?php echo app('translator')->get('lang.earnings'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(@$data['statement'] == url()->current() ?'active':''); ?>"
                                         id="Statements-tab" data-toggle="tab" href="#Statements"
                                            role="tab" aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.statements'); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
     </div>
        <!-- details-tablist-end -->
    
        <!-- main-details-area-start -->
    <div class="account-area account-area2 section-padding user_profile pb_60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-12 p-sm-0">
                            <div class="main-tab-content">
                                <div class="tab-content" id="myTabContent">
                                    
                                    <?php if(Auth::user()->role_id ==4): ?>
                                        
                                    
                                    <div class="tab-pane  <?php echo e(@$data['dashboard'] == url()->current() ?'show active':''); ?> " id="Dashboard" role="tabpanel"
                                        aria-labelledby="Dashboard-tab">
                                        <div class="dash_board">
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <div class="dashboard_iner gray-bg">
                                                        <div class="bash_bord_header">
                                                            <h3><?php echo app('translator')->get('lang.welcome_for_author'); ?>
                                                                <br>
                                                                <?php echo app('translator')->get('lang.with_Infix_Digital_Marketplace'); ?>.</h3>
                                                            <p><?php echo app('translator')->get('lang.welcome_message_for_vendor'); ?>.</p>
                                                        </div>
                                                       
                                                        <?php
                                                        
                                                            $item=App\ManageQuery::UserFirstItem();
                                                            // DB::table('items')->where('user_id',Auth::user()->id)->first();
                                                        ?>
                                                        <?php if($item): ?>
                                                        <?php if(@Auth::check() && @Auth::user()->role_id == 4): ?>
                                                        <div class="row">
                                                                
                                                                <div class="col-xl-12">
                                                                    <div class="single-dashbord">
                                                                        <h3><?php echo app('translator')->get('lang.your'); ?> <?php echo app('translator')->get('lang.profile'); ?></h3>
                                                                        <p><?php echo app('translator')->get('lang.we_do_not_sell'); ?>.</p>
                                                                        <a href="<?php echo e(route('author.profile', $data['user']->id)); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.view'); ?> <?php echo app('translator')->get('lang.my'); ?>
                                                                            <?php echo app('translator')->get('lang.profile'); ?> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if(@Auth::check() && @Auth::user()->role_id == 4): ?>
                                                            <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="single-dashbord">
                                                                            <h3><?php echo app('translator')->get('lang.Upload_Your_First_Item'); ?> </h3>
                                                                            <p><?php echo app('translator')->get('lang.we_do_not_sell'); ?>.</p>
                                                                            <a href="<?php echo e(route('author.content')); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.upload'); ?> <?php echo app('translator')->get('lang.my'); ?> <?php echo app('translator')->get('lang.first'); ?>
                                                                                <?php echo app('translator')->get('lang.item'); ?></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="single-dashbord">
                                                                            <h3><?php echo app('translator')->get('lang.your'); ?> <?php echo app('translator')->get('lang.profile'); ?></h3>
                                                                        <p><?php echo app('translator')->get('lang.we_do_not_sell'); ?>.</p>
                                                                            <a href="<?php echo e(route('author.profile', $data['user']->id)); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.view'); ?> <?php echo app('translator')->get('lang.my'); ?>
                                                                                <?php echo app('translator')->get('lang.profile'); ?> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        
                                                        <div class="Requirements">
                                                            <h4><?php echo app('translator')->get('lang.tax'); ?> <?php echo app('translator')->get('lang.requirements'); ?></h4>
                                                            <p><?php echo app('translator')->get('lang.we_do_not_sell'); ?>.</p>
                                                        </div>
                                                        <p class="dash_para"><?php echo app('translator')->get('lang.profile_update_message'); ?>.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="upload_side_bar white-2 gray-bg">
                                                        <form action="<?php echo e(route('author.contentSelect')); ?>" method="POST" id="select_content">
                                                            <?php echo csrf_field(); ?>
                                                        <div class="upload_inner">
                                                            <h3><?php echo app('translator')->get('lang.uplaod'); ?> <?php echo app('translator')->get('lang.item'); ?></h3>
                                                            <?php
                                                                $categoryItem=App\ManageQuery::CategoryUpPermission();
                                                                // DB::table('item_categories')->where('up_permission', 1)->orderBy('id','desc')->get();
                                                            ?>
                                                                <select class="wide" id="select_category" name="category">
                                                                    <option data-display="Select Category">Select Category</option>
                                                                <?php $__currentLoopData = $categoryItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_gr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($cat_gr->id); ?>" <?php echo e(@Session::get('categorySlect')->id == $cat_gr->id ?'selected':''); ?>><?php echo e($cat_gr->title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <button class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.category'); ?></button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4 || @Auth::user()->role_id == 5): ?>
                                    <div class="tab-pane fade <?php echo e(@$data['profile'] == url()->current() ?'show active':''); ?>  " id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="profile_profile">
                                            <div class="row">
                                                <div class="col-xl-8 col-md-6">
                                                    <div class="big_logo gray-bg">
                                                        <div class="logo_thumb mb-0">
                                                            <img src="<?php echo e(@$data['user']->profile->logo_pic? asset(@$data['user']->profile->logo_pic):asset('public/frontend/img/banner/banner.png')); ?>" alt="">
                                                        </div>
                                                        <p><?php echo @$data['user']->profile->about; ?> </p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="badge_mark">
                                                            <?php
                                                                $level=App\ManageQuery::UserLabel($data['user']->balance->amount); 
                                                                // DB::table('labels')->where('amount','<=',@$data['user']->balance->amount)->orderBy('id','desc')->first();
                                                                $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays(@$data['user']->created_at);
                                                                $badge=App\ManageQuery::UserBadge($date); 
                                                            ?>
                                                        <div class="first_badge gray-bg">
                                                            <img height="auto" width="40" src="<?php echo e(asset(@$level->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="Author level  <?php echo e(@$level->id); ?> : sold <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(@round($data['user']->balance->amount > 50 ? $data['user']->balance->amount: 0)); ?>+ on <?php echo e(GeneralSetting()->system_name); ?> " alt="">
                                                            <img height="auto" width="40" src="<?php echo e(asset(@$badge->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(@$badge->time); ?> years of membarship on <?php echo e(GeneralSetting()->system_name); ?> " alt="">
                                                        </div>
                                                        
                                                        <div class="social_profile gray-bg">
                                                            <h5><?php echo app('translator')->get('lang.social_profiles'); ?></h5>
                                                            <?php if(@$data['socila_icons']->behance != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->behance); ?>"><i class="fa fa-behance"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->deviantart != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->deviantart); ?>"><i class="fa fa-deviantart"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->digg != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->digg); ?>"><i class="fa fa-digg"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->dribbble != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->dribbble); ?>"><i class="fa fa-dribbble"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->facebook != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->facebook); ?>"><i class="fa fa-facebook"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->flickr != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->flickr); ?>"><i class="fa fa-flickr"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->github != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->github); ?>"><i class="fa fa-github"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->google_plus != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->google_plus); ?>"><i class="fa fa-google-plus"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->lastfm != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->lastfm); ?>"><i class="fa fa-lastfm"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->linkedin != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->linkedin); ?>"><i class="fa fa-linkedin"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->reddit != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->reddit); ?>"><i class="fa fa-reddit"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->soundcloud != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->soundcloud); ?>"><i class="fa fa-soundcloud"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->thumblr != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->thumblr); ?>"><i class="fa fa-thumblr"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->twitter != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->twitter); ?>"><i class="fa fa-twitter"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->vimeo != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->vimeo); ?>"><i class="fa fa-vimeo"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(@$data['socila_icons']->youtube != ""): ?>
                                                                <a target="_blank" href="<?php echo e($data['socila_icons']->youtube); ?>"><i class="fa fa-youtube"></i></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>   
                                    <?php if(Auth::user()->role_id == 4): ?>                                   
                                    <div class="tab-pane fade <?php echo e(@$data['portfolio'] == url()->current() ?'show active':''); ?> " id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="portfolio_list gray-bg">
                                            <?php if(count(@$data['item']) > 0): ?>
                                                
                                            <?php $__currentLoopData = @$data['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div
                                                class="row single_portfolio_list  d-flex align-items-center justify-content-between">
                                                
                                                <div class="portflio_thumb d-flex align-items-center col-lg-4">
                                                    <img src="<?php echo e(asset($item->icon)); ?>" alt="" width="100">
                                                    <div class="thumb_heading">
                                                    <h5><a href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->title),@$item->id])); ?>"><?php echo e(@$item->title); ?></a></h5>
                                                        <p><?php echo app('translator')->get('lang.item_by'); ?> <a href="#"><?php echo e(@Auth::user()->username); ?></a> </p>
                                                    </div>
                                                </div>

                                                <div class="portfolio_details col-lg-4">
                                                    <p><?php echo app('translator')->get('lang.in'); ?>: <?php echo e(@$item->category->title); ?> / <?php echo e(@$item->subCategory->title); ?> <br>
                                                        <?php echo app('translator')->get('lang.high_resolution'); ?>: <?php echo e(@$item->resolution); ?>,<br>  <?php echo app('translator')->get('lang.compatible_browsers'); ?>: <?php echo e(@$item->compatible_browsers); ?>,<br>  <?php echo app('translator')->get('lang.compatible_with'); ?>:
                                                        <?php echo e(@$item->compatible_with); ?>,<br> <?php echo app('translator')->get('lang.Columns'); ?>: <?php echo e(@$item->columns); ?></p>
                                                </div>

                                                <div class="cart_heart d-flex col-lg-2">
                                                    <?php if(@Auth::user()->role_id == 5): ?>
                                                <a href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->title),@$item->id])); ?>" class="heart heart2"><i class="ti-shopping-cart"></i></a>
                                                    <a href="#" class="heart heart2"><i class=" ti-heart "></i></a>
                                                    <a href="#" class="heart heart2"><i class=" ti-import"></i></a>
                                                    <?php endif; ?>

                                                    <?php if(@Auth::user()->role_id == 4): ?>
                                                    <a href="<?php echo e(route('author.itemEdit',$item->id)); ?>" class="heart"><i class=" ti-pencil-alt "></i></a>
                                                    <a  onclick="deleItem(<?php echo e($item->id); ?>)" class="heart heart2 trash"><i class="ti-trash"></i></a>
                                                    <a id="delete-form-<?php echo e($item->id); ?>" href="<?php echo e(route('author.itemDelete',$item->id)); ?>" class="dm_display_none"></a>
                                                    <a href="<?php echo e(route('author.ProductDownload',$item->id)); ?>"  class="heart heart2"><i class=" ti-import" ></i></a>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="total-prise text-center col-lg-2">
                                                    <h2><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$item->Reg_total); ?></h2>
                                                    <p><?php echo app('translator')->get('lang.total'); ?> <?php echo e($item->sell); ?> <?php echo app('translator')->get('lang.purchases'); ?></p>
                                                </div>

                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="Pagination">
                                                <?php echo e(@$data['item']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                            </div>
                                            <?php else: ?>
                                            <h1><?php echo app('translator')->get('lang.no_item'); ?></h1>
                
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(Auth::user()->role_id == 4): ?>
                                    <div class="tab-pane fade <?php echo e(@$data['followers'] == url()->current() ?'show active':''); ?> " id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div class="follower gray-bg">
                                            <?php if(count(@$data['follower'])): ?>
                                                <?php $__currentLoopData = @$data['follower']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($item->balance)): ?>
                                                <div
                                                    class="single_followers d-flex justify-content-between align-items-center ">
                                                    <div class="followers d-flex align-items-center">
                                                        <img src="<?php echo e(@$item->profile->logo_pic? asset(@$data['user']->profile->logo_pic):asset('public/frontend/img/profile/1.png')); ?>" alt="" width="80" height="auto">
                                                        <div class="thumb_heading">
                                                            <h5><a href="<?php echo e(route('user.profile',@$item->username)); ?>"><?php echo e($item->username); ?></a></h5>
                                                            <p><?php echo app('translator')->get('lang.member_since'); ?>: <?php echo e(DateFormat($item->created_at)); ?></p>
                                                        </div> 
                                                    </div>
                                                    <?php
                                                        // $level=DB::table('labels')->where('amount','<=',@$item->balance->amount)->orderBy('id','desc')->first();
                                                        // $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays($item->created_at);
                                                        // $badge=DB::table('badges')->where('day','<=',@$date)->orderBy('id','desc')->first();

                                                           $level=App\ManageQuery::UserLabel($item->balance->amount); 
                                                            // DB::table('labels')->where('amount','<=',@$item->balance->amount)->orderBy('id','desc')->first();
                                                            $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays(@$item->created_at);
                                                            $badge=App\ManageQuery::UserBadge($date); 
                                                    ?>
                                                <div class="bandge">
                                                    <img height="auto" width="40" src="<?php echo e(asset(@$level->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="Author level  <?php echo e(@$level->id); ?> : sold <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(round(@$item->balance->amount > 50 ? @$item->balance->amount: 0)); ?>+ on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                                    <img height="auto" width="40" src="<?php echo e(asset(@$badge->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(@$level->id-1); ?> <?php echo e(@$badge->id == 1? 'Year' :'Years'); ?> of membarship on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                            
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
                                                        <?php if($review->rating == .5): ?>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 1): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 1.5): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 2): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 2.5): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 3): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 3.5): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 4): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php elseif($review->rating == 4.5): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        <?php elseif($review->rating == 5): ?>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="Pagination">
                                                    <?php echo e(@$data['follower']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                </div>
                                                <?php else: ?>
                                                <h1><?php echo app('translator')->get('lang.no'); ?> <?php echo app('translator')->get('lang.followers'); ?></h1>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>
                                   
                                    <!-- Followings start here  -->
                                    <div class="tab-pane fade <?php echo e(@$data['followings'] == url()->current() ?'show active':''); ?> " id="Followings" role="tabpanel"
                                        aria-labelledby="Followings-tab">
                                        <div class="follower gray-bg">
                                            <?php if(count(@$data['following'])): ?>
                                                <?php $__currentLoopData = $data['following']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div
                                                        class="single_followers d-flex justify-content-between align-items-center ">
                                                        <div class="followers d-flex align-items-center">
                                                                <img src="<?php echo e(@$item->profile->logo_pic? asset(@$item->profile->logo_pic):asset('public/frontend/img/profile/1.png')); ?>" alt="">
                                                            <div class="thumb_heading">
                                                                <h5><a href="<?php echo e(route('user.profile',@$item->username)); ?>"><?php echo e($item->username); ?></a></h5>
                                                                <p>Member Since: <?php echo e(DateFormat(@$item->created_at)); ?></p>
                                                            </div>
                                                        </div>

                                                        <?php
                                                            // $level=DB::table('labels')->where('amount','<=',$item->balance->amount)->orderBy('id','desc')->first();
                                                            // $date=Carbon\Carbon::parse(Carbon\Carbon::now())->diffInDays($item->created_at);
                                                            // $badge=DB::table('badges')->where('day','<=',$date)->orderBy('id','desc')->first();

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
                                                                $review_total=count($item->reviews);
                                                                $total_star=0;
                                                            ?>
                                                            <?php if(@$review_total > 0): ?>
                                                            
                                                                <?php $__currentLoopData = $item->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $total_star = $total_star+$review->rating;
                                                                ?>
                                                                <?php if($review->rating == .5): ?>
                                                                <i class="fa fa-star-half-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 1): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 1.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 2): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 2.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 3): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 3.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 4): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                <?php elseif($review->rating == 4.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                <?php elseif($review->rating == 5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <div class="Pagination">
                                                    <?php echo e(@$data['following']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                </div>
                                                <?php else: ?> 
                                                <h1><?php echo app('translator')->get('lang.no'); ?> <?php echo app('translator')->get('lang.Following'); ?></h1>   
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>    
                                    <?php endif; ?>
                                    <!-- Followings end  -->
                                    <?php if(@Auth::user()->role_id == 4 || @Auth::user()->role_id == 5): ?>
                                    <div class="tab-pane fade <?php echo e(@$data['setting'] == url()->current() ?'show active':''); ?>" id="Settings" role="tabpanel"
                                        aria-labelledby="Settings-tab">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="my_custom_navs gray-bg">
                                                    <h5><?php echo app('translator')->get('lang.personal'); ?> <?php echo app('translator')->get('lang.details'); ?></h5>
                                                    <div class="nav flex-column" id="v-pills-tab" role="tablist"
                                                        aria-orientation="vertical">
                                                        
                                                        <a class="nav-link  <?php echo e(!str_contains(Request::fullUrl(),'?')?'active':''); ?>" id="v-pills-home-tab"
                                                            data-toggle="pill" href="#v-pills-home" role="tab"
                                                            aria-controls="v-pills-home"
                                                            aria-selected="true"><?php echo app('translator')->get('lang.personal'); ?> <?php echo app('translator')->get('lang.Information'); ?></a>
                                                        <a class="nav-link <?php echo e(str_contains(Request::fullUrl(),'profile_updated')?'active':''); ?>" id="v-pills-profile-tab"
                                                            data-toggle="pill" href="#v-pills-profile" role="tab"
                                                            aria-controls="v-pills-profile"
                                                            aria-selected="false"><?php echo app('translator')->get('lang.profile'); ?></a>
                                                        <a class="nav-link <?php echo e(str_contains(Request::fullUrl(),'email_setting')?'active':''); ?>" id="v-pills-messages-tab"
                                                            data-toggle="pill" href="#v-pills-messages" role="tab"
                                                            aria-controls="v-pills-messages"
                                                            aria-selected="false"><?php echo app('translator')->get('lang.email'); ?> <?php echo app('translator')->get('lang.setting'); ?></a>
                                                        <?php if(@Auth::user()->role_id == 5): ?>
                                                        <a class="nav-link <?php echo e(str_contains(Request::fullUrl(),'card_updated')?'active':''); ?>" id="v-pills-settings-tab"
                                                            data-toggle="pill" href="#v-pills-settings" role="tab"
                                                            aria-controls="v-pills-settings"
                                                            aria-selected="false"><?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></a>
                                                            <?php endif; ?>
                                                            <a class="nav-link <?php echo e(str_contains(Request::fullUrl(),'social_updated')?'active':''); ?>" id="v-pills-Description-tab"
                                                            data-toggle="pill" href="#v-pills-Description"
                                                            role="tab" aria-controls="v-pills-settings"
                                                            aria-selected="false"><?php echo app('translator')->get('lang.social'); ?> <?php echo app('translator')->get('lang.network'); ?></a>
                                                        <?php if(@Auth::user()->role_id == 4): ?>
                                                        <a class="nav-link <?php echo e(str_contains(Request::fullUrl(),'api_key')?'active':''); ?>" id="v-pills-Api-Key-tab"
                                                            data-toggle="pill" href="#v-pills-Api-Key"
                                                            role="tab" aria-controls="v-pills-settings"
                                                            aria-selected="false">Genarate API KEY</a>
                                                        <?php endif; ?>
                                                        <a class="nav-link" id="v-pills-fund-tab"
                                                            data-toggle="pill" href="#v-pills-fund"
                                                            role="tab" aria-controls="v-pills-settings"
                                                            aria-selected="false">Fund History</a>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-8">
                                                <div class="my_tab_content">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade <?php echo e(!str_contains(Request::fullUrl(),'?')?'show active':''); ?> " id="v-pills-home"
                                                            role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            <div class="single_account_wrap gray-bg">
                                                                <h4><?php echo e(@$data['profile_setting']->heading1); ?></h4>
                                                                <p><?php echo e(@$data['profile_setting']->text1); ?></p>
                                                                
                                                                <?php if(@Auth::user()->role_id == 4): ?>  
                                                                <form action="<?php echo e(route('author.personalUpdate',  $data['user']->id)); ?>" class="single_account-form" method="POST" id="personal_infor">
                                                                <?php endif; ?>
                                                                <?php if(@Auth::user()->role_id == 5): ?>  
                                                                <form action="<?php echo e(route('customer.personalUpdate',  $data['user']->id)); ?>" class="single_account-form" method="POST" id="personal_infor">
                                                                <?php endif; ?>
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="id" value="<?php echo e(@$data['user']->id); ?>">
                                                                    <div class="row">
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.first_name'); ?> *" name="first_name" value="<?php echo e(isset($data['user']->profile->first_name)? $data['user']->profile->first_name : old('first_name')); ?>">
                                                                            <?php if($errors->has('first_name')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.last_name'); ?> *" name="last_name" value="<?php echo e(isset($data['user']->profile->last_name)? $data['user']->profile->last_name:old('last_name')); ?>">
                                                                            <?php if($errors->has('last_name')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.user_name'); ?> *" name="username" value="<?php echo e(isset($data['user']->username)? $data['user']->username:old('username')); ?>" disabled>
                                                                            <?php if($errors->has('username')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('username')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.phone_number'); ?> *" name="mobile" value="<?php echo e(isset($data['user']->profile->mobile)? $data['user']->profile->mobile:old('mobile')); ?>">
                                                                            <?php if($errors->has('mobile')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('mobile')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-12 col-md-12">
                                                                            <input type="email" name="email" placeholder="<?php echo app('translator')->get('lang.email'); ?> *" value="<?php echo e(@$data['user']->email? @$data['user']->email:'Email Address'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="check-out-btn">
                                                                        <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.save'); ?>
                                                                            <?php echo app('translator')->get('lang.changes'); ?></button>
                                                                    </div>
                                                                </form>
                                                                
                                                            </div>

                                                            
                                                            <div class="single_account_wrap gray-bg">
                                                                <h4><?php echo e(@$data['profile_setting']->heading2); ?></h4>
                                                                <p><?php echo e(@$data['profile_setting']->text2); ?></p>
                                                                <?php if(@Auth::user()->role_id == 4): ?>
                                                                <form method="POST" action="<?php echo e(url('author/author-change-password')); ?>" enctype="multipart/form-data">  
                                                                <?php endif; ?>
                                                                <?php if(@Auth::user()->role_id == 5): ?>  
                                                                <form method="POST" action="<?php echo e(url('customer-change-password')); ?>" enctype="multipart/form-data">  
                                                                <?php endif; ?>
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row justify-content-center mt-3 no-gutters" >
                                                                        <div class="col-xl-6 col-md-8">
                                                                            <div class="col-12 mb-30">
                                                                                <input id="password" type="password" placeholder="<?php echo app('translator')->get('lang.current_password'); ?>" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="current_password" required >
                                                                                <?php if($errors->has('current_password')): ?>
                                                                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                                                                        <strong class="dashboard_msg_clr" ><?php echo e($errors->first('current_password')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            
                                                                            <div class="col-xl-12 mb-30">
                                                                                <input id="password" type="password" placeholder="<?php echo app('translator')->get('lang.new_password'); ?>" class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_password" required>
                                                                                <?php if($errors->has('new_password')): ?>
                                                                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                                                                        <strong class="dashboard_msg_clr" ><?php echo e($errors->first('new_password')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="col-xl-12 mb-30">
                                                                                <input id="password-confirm" type="password" class="form-control" placeholder="<?php echo app('translator')->get('lang.confirm_password'); ?>" name="confirm_password" required >
                                                                                <?php if($errors->has('confirm_password')): ?>
                                                                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                                                                        <strong class="dashboard_msg_clr" ><?php echo e($errors->first('confirm_password')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="check-out-btn col-12 text-center mb-4">
                                                                                <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.changes'); ?>
                                                                                    <?php echo app('translator')->get('lang.password'); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </form>
                                                            </div>
                                                            
                                                            <div class="single_account_wrap gray-bg">
                                                                <h4><?php echo e(@$data['profile_setting']->heading3); ?></h4>
                                                                <p><?php echo e(@$data['profile_setting']->text3); ?></p>
                                                                <?php if(@Auth::user()->role_id == 4): ?>  
                                                                <form action="<?php echo e(route('author.personalUpdate',  $data['user']->id)); ?>" class="single_account-form" method="POST" id="personal_info">
                                                                <?php endif; ?>
                                                                <?php if(@Auth::user()->role_id == 5): ?>  
                                                                <form action="<?php echo e(route('customer.personalUpdate',  $data['user']->id)); ?>" class="single_account-form" method="POST" id="personal_info">
                                                                <?php endif; ?>
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="id" value="<?php echo e(@$data['user']->id); ?>">
                                                                    <div class="row">
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.first_name'); ?>*" name="first_name" value="<?php echo e(isset($data['user']->profile->first_name)? $data['user']->profile->first_name : old('first_name')); ?>">
                                                                            <?php if($errors->has('first_name')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.last_name'); ?>*" name="last_name" value="<?php echo e(isset($data['user']->profile->last_name)? $data['user']->profile->last_name:old('last_name')); ?>">
                                                                            <?php if($errors->has('last_name')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-12 col-md-12">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.company_name'); ?>" name="company_name" value="<?php echo e(isset($data['user']->profile->company_name)? $data['user']->profile->company_name:old('company_name')); ?>">
                                                                            <?php if($errors->has('company_name')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('company_name')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.phone_number'); ?>" name="mobile" value="<?php echo e(isset($data['user']->profile->mobile)? $data['user']->profile->mobile:old('mobile')); ?>">
                                                                            <?php if($errors->has('mobile')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('mobile')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <input type="email" name="email" value="<?php echo e(@$data['user']->email? @$data['user']->email:'Email Address'); ?>" readonly>
                                                                        </div>
                                                                        <div class="col-xl-12 col-md-12">
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.address'); ?>*" name="address" value="<?php echo e(isset($data['user']->profile->address)? $data['user']->profile->address:old('address')); ?>">
                                                                            <?php if($errors->has('address')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('address')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6 city_id">
                                                                            <label for="name"><?php echo app('translator')->get('lang.country_name'); ?> *</label>
                                                                            <select class="wide customselect country"
                                                                                name="country_id" id="country">
                                                                                <option data-display="Country*">
                                                                                    <?php echo app('translator')->get('lang.select'); ?></option>
                                                                                <?php $__currentLoopData = $data['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                                        
                                                                                <option value="<?php echo e($item->id); ?>" <?php echo e(@$data['user']->profile->country_id == $item->id ?'selected':''); ?>><?php echo e($item->name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                            <?php if($errors->has('country_id')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('country_id')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6 city_id">
                                                                                <label for="name"><?php echo app('translator')->get('lang.state'); ?>/<?php echo app('translator')->get('lang.region'); ?></label>
                                                                                
                                                                                <input type="text" placeholder="<?php echo app('translator')->get('lang.state'); ?>/<?php echo app('translator')->get('lang.region'); ?>" name="state_id" value="<?php echo e(isset($data['user']->profile->state_id)? $data['user']->profile->state_id:old('state_id')); ?>">
                                                                          
                                                                                <?php if($errors->has('state_id')): ?>
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong><?php echo e($errors->first('state_id')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        <div class="col-xl-6 col-md-6 city_id">
                                                                            
                                                                            <label for="name"><?php echo app('translator')->get('lang.city'); ?></label>
                                                                            
                                                                            <input type="text" placeholder="<?php echo app('translator')->get('lang.city'); ?>" name="city_id" value="<?php echo e(isset($data['user']->profile->city_id)? $data['user']->profile->city_id:old('city_id')); ?>">
                                                                            <?php if($errors->has('city_id')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('city_id')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    
                                                                        <div class="col-xl-6 col-md-6">
                                                                            <label for="zip_postal_code"><?php echo app('translator')->get('lang.zip_postal_code'); ?> </label>
                                                                            <input type="text" placeholder="Postcode/ZIP" name="zipcode" value="<?php echo e(isset($data['user']->profile->zipcode)? $data['user']->profile->zipcode:old('zipcode')); ?>">
                                                                            <?php if($errors->has('zipcode')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('zipcode')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="check-out-btn">
                                                                        <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.save'); ?>
                                                                            <?php echo app('translator')->get('lang.changes'); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade <?php echo e(str_contains(Request::fullUrl(),'profile_updated')?'show active':''); ?>" id="v-pills-profile"
                                                            role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                            <form action="<?php echo e(route('user.profilePic',$data['user']->id)); ?>" method="POST" enctype="multipart/form-data" >
                                                                <?php echo csrf_field(); ?>
                                                                <div class="profile_avater gray-bg">
                                                                    <h4>Avatar</h4>
                                                                    <div class="avater_upoad">
                                                                        
                                                                        <?php
                                                                            $profile=$data['user']->profile->image;
                                                                        ?>
                                                                        <img src="<?php echo e(file_exists(@$profile) ? asset($profile) : asset('public/uploads/user/user.png')); ?> " width="100" alt="">
                                                                        <div class="image_upload_field">
                                                                            <div class="upload-image">
                                                                                <label class="mt-2 mb-2" for="#"><?php echo app('translator')->get('lang.profile'); ?> <?php echo app('translator')->get('lang.image'); ?></label>
                                                                                <div class="upload_image_input profile_pic">
                                                                                    <input type="file"
                                                                                        placeholder="No file selected" class="file-upload" name="profile_pic" onchange="readURL(this);">
                                                                                    <div class="upload_image_overlay">
                                                                                        <span
                                                                                            class="brouse-here"><?php echo app('translator')->get('lang.browse'); ?>...</span>
                                                                                        <span id="Propic_chng"><?php echo app('translator')->get('lang.No_file_selected'); ?></span>
                                                                                        <i class="ti-plus d-none"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p><?php echo app('translator')->get('lang.image_upload_requirement_100'); ?></p>
                                                                                <?php if($errors->has('profile_pic')): ?>
                                                                                <span class="invalid-feedback invalid-select error"
                                                                                        role="alert">
                                                                                    <strong><?php echo e($errors->first('profile_pic')); ?></strong>
                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile_page">
                                                                        <h4><?php echo app('translator')->get('lang.about'); ?></h4>
                                                                            <textarea class="summernote" id="editor1" cols="30" rows="10" name="about"><?php echo e(isset($data['user']->profile->about) ? $data['user']->profile->about : old('about')); ?></textarea>
                                                                            <?php if($errors->has('about')): ?>
                                                                            <span class="invalid-feedback invalid-select error"
                                                                                    role="alert">
                                                                                <strong><?php echo e($errors->first('about')); ?></strong>
                                                                            </span>
                                                                            <?php endif; ?>
                                                                        <div class="image_upload_field">
                                                                            <div class="upload-image">
                                                                                <label class="mt-2 mb-2" for="#"><?php echo app('translator')->get('lang.banner'); ?> 
                                                                                    <?php echo app('translator')->get('lang.image'); ?></label>
                                                                                <div class="upload_image_input profile_pic">
                                                                                    <input type="file"
                                                                                        placeholder="No file selected"  name="backgroud_pic" onchange="BackImg(this)" id="back_pic_user">
                                                                                    <div class="upload_image_overlay">
                                                                                        <span
                                                                                            class="brouse-here"><?php echo app('translator')->get('lang.browse'); ?>...</span>
                                                                                        <span id="back_pic"><?php echo app('translator')->get('lang.No_file_selected'); ?></span>
                                                                                        <i class="ti-plus d-none"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p><?php echo app('translator')->get('lang.image_upload_400'); ?></p>
                                                                                <?php if($errors->has('backgroud_pic')): ?>
                                                                                <span class="invalid-feedback invalid-select error"
                                                                                        role="alert">
                                                                                    <strong><?php echo e($errors->first('backgroud_pic')); ?></strong>
                                                                                </span>
                                                                                <?php endif; ?>
                                                                                <button  type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.save'); ?>
                                                                                    <?php echo app('translator')->get('lang.changes'); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </form>
                                                        </div>

                                                        
                                                        
                                                        <div class="tab-pane fade <?php echo e(str_contains(Request::fullUrl(),'email_setting')?'show active':''); ?>" id="v-pills-messages"
                                                            role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                <?php
                                                            $email_setting=App\ManageQuery::UserEmailNotificationSettings();
                                                            // DB::table('email_notification_settings')->where('user_id',Auth::user()->id)->first();
                                                            ?>
                                                            <?php if(!empty($email_setting)): ?>
                                                                <form action="<?php echo e(route('customer.userEmailNotificationUpdate')); ?>" method="post" >
                                                            <?php else: ?>
                                                                <form action="<?php echo e(route('customer.userEmailNotificationStore')); ?>" method="post" >
                                                            <?php endif; ?>
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="id" value="<?php echo e(isset($email_setting) ? $email_setting->id : ''); ?>">
                                                            <div class="email_setting gray-bg" id="">
                                                                <h4> <?php echo app('translator')->get('lang.email_settings'); ?> </h4>
                                                                <?php if(@Auth::user()->role_id == 4): ?>
                                                                <div class="single_email_chose d-flex">
                                                                    <div class="check_mark_here">
                                                                        <div class="checkit">
                                                                            <span class="chebox-style-custom">
                                                                                <input class="styled-checkbox"
                                                                                    id="styled-checkbox-2"
                                                                                    type="checkbox" name="rating" value="1" <?php echo e(@$email_setting->rating ==1 ?'checked':""); ?> >
                                                                                <label
                                                                                    for="styled-checkbox-2"></label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email_text">
                                                                        <h5><?php echo app('translator')->get('lang.rating'); ?> <?php echo app('translator')->get('lang.reminders'); ?></h5>
                                                                        <p><?php echo app('translator')->get('lang.send_email_reminding'); ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                
                                                                <div class="single_email_chose d-flex">
                                                                    <div class="check_mark_here">
                                                                        <div class="checkit">
                                                                            <span class="chebox-style-custom">
                                                                                <input class="styled-checkbox"
                                                                                    id="styled-checkbox-29"
                                                                                    type="checkbox" name="item_update" value="1"
                                                                                    <?php echo e(@$email_setting->item_update ==1 ?'checked':""); ?>>
                                                                                <label
                                                                                    for="styled-checkbox-29"></label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email_text">
                                                                        <h5><?php echo app('translator')->get('lang.item'); ?> <?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.notifications'); ?></h5>
                                                                        <p>
                                                                            <?php echo app('translator')->get('lang.Send_an_email_when_an_item_purchased_updated'); ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="single_email_chose d-flex">
                                                                    <div class="check_mark_here">
                                                                        <div class="checkit">
                                                                            <span class="chebox-style-custom">
                                                                                <input class="styled-checkbox"
                                                                                    id="styled-checkbox-28"
                                                                                    type="checkbox" name="item_comment" value="1"
                                                                                    <?php echo e(@$email_setting->item_comment ==1 ?'checked':""); ?>>
                                                                                <label
                                                                                    for="styled-checkbox-28"></label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email_text">
                                                                        <h5><?php echo app('translator')->get('lang.item'); ?> <?php echo app('translator')->get('lang.comment'); ?> <?php echo app('translator')->get('lang.notifications'); ?></h5>
                                                                        <p><?php echo app('translator')->get('lang.comment_notification'); ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php if(@Auth::user()->role_id == 4): ?>
                                                                <div class="single_email_chose d-flex">
                                                                    <div class="check_mark_here">
                                                                        <div class="checkit">
                                                                            <span class="chebox-style-custom">
                                                                                <input class="styled-checkbox"
                                                                                    id="styled-checkbox-23"
                                                                                    type="checkbox" name="item_review" value="1"
                                                                                        <?php echo e(@$email_setting->item_review ==1 ?'checked':""); ?>>
                                                                                <label
                                                                                    for="styled-checkbox-23"></label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email_text">
                                                                        <h5><?php echo app('translator')->get('lang.item'); ?> <?php echo app('translator')->get('lang.review'); ?> <?php echo app('translator')->get('lang.notifications'); ?></h5>
                                                                        <p><?php echo app('translator')->get('lang.item_revirew_notification'); ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php if(@Auth::user()->role_id == 4): ?>
                                                                <div class="single_email_chose d-flex">
                                                                    <div class="check_mark_here">
                                                                        <div class="checkit">
                                                                            <span class="chebox-style-custom">
                                                                                <input class="styled-checkbox"
                                                                                    id="styled-checkbox-21"
                                                                                    type="checkbox" name="buyer_review" value="1"
                                                                                    <?php echo e(@$email_setting->buyer_review ==1 ?'checked':""); ?>>
                                                                                <label
                                                                                    for="styled-checkbox-21"></label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email_text">
                                                                        <h5><?php echo app('translator')->get('lang.buyer'); ?> <?php echo app('translator')->get('lang.review'); ?> <?php echo app('translator')->get('lang.notifications'); ?></h5>
                                                                        <p><?php echo app('translator')->get('lang.buyer_review_notifications'); ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>

                                                                <div class="single_email_chose d-flex">
                                                                    <div class="check_mark_here">
                                                                        <div class="checkit">
                                                                            <span class="chebox-style-custom">
                                                                                <input class="styled-checkbox"
                                                                                    id="styled-checkbox-20"
                                                                                    type="checkbox" name="expiring_support" value="1"
                                                                                    <?php echo e(@$email_setting->expiring_support ==1 ?'checked':""); ?>>
                                                                                <label
                                                                                    for="styled-checkbox-20"></label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email_text">
                                                                        <h5><?php echo app('translator')->get('lang.expiring'); ?> <?php echo app('translator')->get('lang.support'); ?> <?php echo app('translator')->get('lang.notifications'); ?></h5>
                                                                        <p><?php echo app('translator')->get('lang.send_me_a_daily_summary'); ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php if(@Auth::user()->role_id == 4): ?>
                                                                <div class="single_email_chose d-flex">
                                                                    <div class="check_mark_here">
                                                                        <div class="checkit">
                                                                            <span class="chebox-style-custom">
                                                                                <input class="styled-checkbox"
                                                                                    id="styled-checkbox-211"
                                                                                    type="checkbox" name="daily_summary" value="1"
                                                                                        <?php echo e(@$email_setting->daily_summary ==1 ?'checked':""); ?>>
                                                                                <label
                                                                                    for="styled-checkbox-211"></label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email_text">
                                                                        <h5><?php echo app('translator')->get('lang.daily'); ?> <?php echo app('translator')->get('lang.summary'); ?> <?php echo app('translator')->get('lang.emails'); ?></h5>
                                                                        <p><?php echo app('translator')->get('lang.daily_summary_emails'); ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                    <?php if(!empty($email_setting)): ?>
                                                                    <input type="submit" value="<?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.change'); ?>" class="boxed-btn border-0"> 
                                                                    <?php else: ?>
                                                                    <input type="submit" value="<?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.change'); ?>" class="boxed-btn border-0">          
                                                                    <?php endif; ?>
                                                                
                                                            </div>
                                                                </form>
                                                        </div>
                                                        <?php if(@Auth::user()->role_id == 5): ?>
                                                        <div class="tab-pane fade <?php echo e(str_contains(Request::fullUrl(),'card_updated')?'show active':''); ?>" id="v-pills-settings"
                                                            role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                            <div class="credit_card_visa gray-bg">
                                                                <h4 class="d-flex justify-content-between align-items-center"><?php echo app('translator')->get('lang.saved'); ?> <?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?>
                                                                    <div class="credit_button">
                                                                        <?php if(isset($data['user']->payment_method->card_number)): ?>
                                                                            <a href="<?php echo e(route('customer.payment_delete')); ?>" class="boxed-btn Red_Button_1"><?php echo app('translator')->get('lang.delete'); ?>
                                                                                    <?php echo app('translator')->get('lang.card'); ?></a>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </h4>
                                                                <div
                                                                    class="credit_haeading d-flex justify-content-between">
                                                                    <img src="<?php echo e(asset('public/frontend/img/')); ?>/payment/visa.png" alt="">
                                                                    
                                                                        <div class="col-lg-12">
                                                                            <div class="credit_number">
                                                                                <p><span class="card-name "><?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.number'); ?></span> <span>: 
                                                                                        <?php echo e(isset($data['user']->payment_method->card_number)? '•••• •••• •••• '. str_pad(substr(@$data['user']->payment_method->card_number, -4), strlen(@$data['user']->payment_method->card_number))  :''); ?></span> </p>
                                                                                <p><span class="card-name"><?php echo app('translator')->get('lang.card'); ?> <?php echo app('translator')->get('lang.holder'); ?> <?php echo app('translator')->get('lang.name'); ?>
                                                                                    </span><span>: <?php echo e(isset($data['user']->payment_method->name)? @$data['user']->payment_method->name : ''); ?></span> </p>
                                                                                <p><span class="card-name"><?php echo app('translator')->get('lang.expire'); ?> <?php echo app('translator')->get('lang.date'); ?>
                                                                                    </span><span>: <?php echo e(isset($data['user']->payment_method->exp_mm)? @$data['user']->payment_method->exp_mm:''); ?> <?php echo e(isset($data['user']->payment_method->exp_yy)? '/ '. @$data['user']->payment_method->exp_yy:''); ?></span> </p>
                                                                                <p><span class="card-name"><?php echo app('translator')->get('lang.card'); ?> CVV</span>
                                                                                    <span>: <?php echo e(isset($data['user']->payment_method->cvc)? @$data['user']->payment_method->cvc:''); ?></span> </p>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="credit_inner">
                                                                    <h4><?php echo app('translator')->get('lang.add'); ?>/<?php echo app('translator')->get('lang.edit'); ?> <?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></h4>
                                                                    <form action=" <?php echo e(route('customer.payment_add')); ?> " class="single_account-form" method="POST" id="customer_save_card">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="row">
                                                                            <div class="col-xl-6 col-md-6">
                                                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.card_umber'); ?> <span>*</span></label>
                                                                                <input type="text"  placeholder="Card number" name="card_number" value="<?php echo e(isset($data['user']->payment_method->card_number)? @$data['user']->payment_method->card_number:old('card_number')); ?>" >
                                                                                <?php if($errors->has('card_number')): ?>
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong><?php echo e($errors->first('card_number')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="col-xl-6 col-md-6">
                                                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.card_holder_name'); ?> <span>*</span></label>
                                                                                <input type="text"  name="name" placeholder="Card holder name" value="<?php echo e(isset($data['user']->payment_method->name)? @$data['user']->payment_method->name : old('name')); ?>">
                                                                                <?php if($errors->has('name')): ?>
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="col-xl-6 col-md-6">
                                                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.expire_date'); ?> <span>*</span></label>
                                                                                <div class="row" > 
                                                                                <div class="col-xl-6">
                                                                                        <input type="text" class="exp_mm" name="exp_mm" pattern="\d*" x-autocompletetype="cc-exp" placeholder="MM" required maxlength="2" size="2" value="<?php echo e(isset($data['user']->payment_method->exp_mm)? @$data['user']->payment_method->exp_mm:old('exp_mm')); ?>">
                                                                                        <?php if($errors->has('exp_mm')): ?>
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('exp_mm')); ?></strong>
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                        <input type="text" class="exp_yy" name="exp_yy" pattern="\d*" x-autocompletetype="cc-exp" placeholder="YYYY" required maxlength="4" size="4" value="<?php echo e(isset($data['user']->payment_method->exp_yy)? @$data['user']->payment_method->exp_yy:old('exp_yy')); ?>">
                                                                                        <?php if($errors->has('exp_yy')): ?>
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('exp_yy')); ?></strong>
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                                    
                                                                            </div>
                                                                            <div class="col-xl-6 col-md-6">
                                                                                <label for="name" class="mb-2"><?php echo app('translator')->get('lang.CVC_number'); ?> <span>*</span></label>
                                                                                <input type="text"  name="cvc" placeholder="Card CVC number" value="<?php echo e(isset($data['user']->payment_method->cvc)? @$data['user']->payment_method->cvc:old('cvc')); ?>">
                                                                                <?php if($errors->has('cvc')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('cvc')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="check-out-btn text-left mt-10">
                                                                            <?php if(isset($data['user']->payment_method->card_number)): ?>
                                                                            <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></button>
                                                                            <?php else: ?>
                                                                            <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></button>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                        
                                                        <div class="tab-pane fade <?php echo e(str_contains(Request::fullUrl(),'social_updated')?'show active':''); ?>" id="v-pills-Description"
                                                            role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                            <div class="social_networks gray-bg">
                                                                <h4><?php echo app('translator')->get('lang.social'); ?> <?php echo app('translator')->get('lang.networks'); ?></h4>
                                                                <?php if(!empty($data['socila_icons'])): ?>
                                                                    <form action="<?php echo e(route('user.socialUpdate')); ?>" method="post">
                                                                <?php else: ?>
                                                                    <form action="<?php echo e(route('user.socialStore')); ?>" method="post">
                                                                <?php endif; ?>
                                                                
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div class="social_input_icon">
                                                                                    <i class="fa fa-behance"></i>
                                                                                </div>
                                                                                <input type="text" name="behance" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->behance : ''); ?>"
                                                                                    placeholder="Behance URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-1">
                                                                                    <i class="fa fa-deviantart"></i>
                                                                                </div>
                                                                                <input type="text" name="deviantart" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->deviantart : ''); ?>"
                                                                                    placeholder="Deviantart URL">
                                                                            </div>
                                                                        </div>
                                                                            <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-2">
                                                                                    <i class="fa fa-digg"></i>
                                                                                </div>
                                                                                <input type="text" name="digg" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->digg : ''); ?>"
                                                                                    placeholder="Digg URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-3">
                                                                                    <i class="fa fa-dribbble"></i>
                                                                                </div>
                                                                                <input type="text" name="dribbble" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->dribbble : ''); ?>"
                                                                                    placeholder="Dribbble URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-4">
                                                                                    <i class="fa fa-facebook"></i>
                                                                                </div>
                                                                                <input type="text"  name="facebook" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->facebook : ''); ?>"
                                                                                    placeholder="facebook URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-5">
                                                                                    <i class="fa fa-flickr"></i>
                                                                                </div>
                                                                                <input type="text" name="flickr" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->flickr : ''); ?>"
                                                                                    placeholder="Flickr URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-6">
                                                                                    <i class="fa fa-github"></i>
                                                                                </div>
                                                                                <input type="text" name="github" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->github : ''); ?>"
                                                                                    placeholder="Github URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-7">
                                                                                    <i
                                                                                        class="fa fa-google-plus"></i>
                                                                                </div>
                                                                                <input type="text" name="google_plus" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->google_plus : ''); ?>"
                                                                                    placeholder="Google Plus URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-8">
                                                                                    <i class="fa fa-lastfm"></i>
                                                                                </div>
                                                                                <input type="text" name="lastfm" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->lastfm : ''); ?>"
                                                                                    placeholder="Lastfm URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-9">
                                                                                    <i class="fa fa-linkedin"></i>
                                                                                </div>
                                                                                <input type="text" name="linkedin" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->linkedin : ''); ?>"
                                                                                    placeholder="Linkedin URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-10">
                                                                                    <i class="fa fa-reddit"></i>
                                                                                </div>
                                                                                <input type="text" name="reddit" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->reddit : ''); ?>"
                                                                                    placeholder="Reddit URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-11">
                                                                                    <i class="fa fa-soundcloud"></i>
                                                                                </div>
                                                                                <input type="text" name="soundcloud" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->soundcloud : ''); ?>"
                                                                                    placeholder="Soundcloud URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-12">
                                                                                    <i class="fa fa-thumblr"></i>
                                                                                </div>
                                                                                <input type="text" name="thumblr" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->thumblr : ''); ?>"
                                                                                    placeholder="Thumblr URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-13">
                                                                                    <i class="fa fa-twitter"></i>
                                                                                </div>
                                                                                <input type="text" name="twitter" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->twitter : ''); ?>"
                                                                                    placeholder="Twitter URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-14">
                                                                                    <i class="fa fa-vimeo"></i>
                                                                                </div>
                                                                                <input type="text" name="vimeo" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->vimeo : ''); ?>"
                                                                                    placeholder="Vimeo URL">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="single_social_input d-flex">
                                                                                <div
                                                                                    class="social_input_icon color-15">
                                                                                    <i
                                                                                        class="fa fa-youtube-play"></i>
                                                                                </div>
                                                                                <input type="text" name="youtube" value="<?php echo e(isset($data['socila_icons'])? $data['socila_icons']->youtube : ''); ?>"
                                                                                    placeholder="Youtube URL">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                            <button type="submit" class="boxed-btn"> <?php echo app('translator')->get('lang.save'); ?>
                                                                            <?php echo app('translator')->get('lang.changes'); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        
                                                        <?php if(@Auth::user()->role_id == 4): ?>
                                                        <div class="tab-pane fade <?php echo e(str_contains(Request::fullUrl(),'api_key')?'show active':''); ?>" id="v-pills-Api-Key"
                                                            role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                            <div class="social_networks gray-bg">
                                                                <?php
                                                                    $user=App\ManageQuery::UserDetails();
                                                                    @$api_token=@$user->api_token;
                                                                ?>
                                                                <h4><?php echo app('translator')->get('lang.genarate_API_key'); ?></h4>
                                                                
                                                                    <form action="<?php echo e(route('user.ApiTokenUpdate')); ?>" method="post">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row justify-content-between">
                                                                        <div class="col-xl-12 ">
                                                                            <div class="single_social_input d-flex">
                                                                                <input readonly type="text" id="api_token" name="api_token" value="<?php echo e(isset($user)? @$user->api_token : ''); ?>"
                                                                                    placeholder="API KEY">
                                                                                    
                                                                            </div>
                                                                            <span class="tooltiptext" id="myTooltip"></span>
                                                                        </div>
                                                                        <?php if($api_token==null): ?>
                                                                            <div>
                                                                                <Input type="submit" class="boxed-btn border-0" value="Genarate">
                                                                                
                                                                            </div> 
                                                                    </form>  
                                                                        <?php else: ?>

                                                                        <button onclick="apiTextCopy('api_token','myTooltip')" type="button" class="boxed-btn" onmouseout="outFunc('myTooltip')">
                                                                            
                                                                            <?php echo app('translator')->get('lang.copy_text'); ?>
                                                                        </button>
                                                                            
                                                                        <?php endif; ?>
                                                                            
                                                                        
                                                                            
                                                                            
                                                                    </div>
                                                                    
                                                                
                                                            <?php if(!empty($api_token)): ?>
                                                                
                                                            

                                                                <div class="row mt-20">
                                                                    <div class="col-lg-12 d-flex">
                                                                        <div class="col-lg-2">
                                                                                <?php echo app('translator')->get('lang.API_path'); ?>: 
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                                <button onclick="apiTextCopy('api_path','api_path_message')" type="button"   onmouseout="outFunc('api_path_message')">
                                                                            <span class="tooltiptext" id="myTooltip"></span>
                                                                            <i class="fa fa-copy"></i>
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <input id="api_path" readonly type="text" class="form-control" value="<?php echo e(url('api/auth-user',$api_token)); ?>">
                                                                            <span id="api_path_message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 d-flex mt-20">
                                                                        <div class="col-lg-2">
                                                                                <?php echo app('translator')->get('lang.product_validation'); ?>: 
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                            <button onclick="apiTextCopy('product_validation_api','product_validation_api_message')" type="button"   onmouseout="outFunc('myTooltip')">
                                                                            <span class="tooltiptext" id="myTooltip"></span>
                                                                            <i class="fa fa-copy"></i>
                                                                        </button>
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <?php
                                                                            $base_path=url('/');
                                                                            $validation_api='/api/products/[API_TOKEN]/product-verify/[PURCHASE_CODE]';
                                                                        ?>
                                                                        <td  class="dm_width_75_per">
                                                                            <input id="product_validation_api" readonly type="text" class="form-control" value="<?php echo e($base_path.$validation_api); ?>">
                                                                            <span id="product_validation_api_message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 d-flex mt-20">
                                                                        <div class="col-lg-2">
                                                                                <?php echo app('translator')->get('lang.products'); ?>: 
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                            <button onclick="apiTextCopy('products_api','products_api_message')" type="button"   onmouseout="outFunc('myTooltip')">
                                                                            <span class="tooltiptext" id="myTooltip"></span>
                                                                            <i class="fa fa-copy"></i>
                                                                        </button>
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            
                                                                        <td  class="dm_width_75_per">
                                                                                <input id="products_api" readonly type="text" class="form-control" value="<?php echo e(url('api/auth-user-products',$api_token)); ?>">
                                                                            <span id="products_api_message"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                    <?php endif; ?>
                                                            </div>
                                                            
                                                        </div>
                                                        <?php endif; ?>
                                                        <div class="tab-pane fade" id="v-pills-fund"
                                                        role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                    <div class="social_networks gray-bg">
                                                        
                                                        <?php
                                                        $funds=App\Deposit::where('user_id','=',Auth::user()->id)->get();
                                                    ?>

                                                    <h3><?php echo app('translator')->get('lang.funding_history'); ?></h3>
                                                    <div class="table-responsive">

                                                    
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo app('translator')->get('lang.date'); ?></th>
                                                                <th><?php echo app('translator')->get('lang.amount'); ?>(<?php echo e(GeneralSetting()->currency_symbol); ?>)</th>
                                                                <th><?php echo app('translator')->get('lang.details'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e(DateFormat(@$fund->created_at)); ?></td>
                                                                <td><?php echo e(@$fund->amount); ?> </td>
                                                                <td><?php echo e(@$fund->details); ?> </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                        
                                                    </div>         
                                                                
                                                                    
                                                                    
                                                            </div>
                                                            
                                                        
                                                    
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <div class="tab-pane fade <?php echo e(@$data['hiddenItem'] == url()->current() ?'show active':''); ?> " id="Hidden" role="tabpanel"
                                        aria-labelledby="Hidden-tab">
                                        <div class="portfolio_list gray-bg">
                                            <?php if(count($data['hidden_item']) > 0): ?>
                                            <?php $__currentLoopData = $data['hidden_item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div
                                                class="single_portfolio_list  d-flex align-items-center justify-content-between">
                                                <div class="portflio_thumb d-flex align-items-center">
                                                    <img src="<?php echo e(asset( $item->icon )); ?>" alt="" width="100">
                                                    <div class="thumb_heading">
                                                    <h5><a href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->title),@$item->id])); ?>"><?php echo e(substr(@$item->title,0,30)); ?></a></h5>
                                                        <p><?php echo app('translator')->get('lang.item_by'); ?> <a href="<?php echo e(route('author.profile',@$item->user->id)); ?>"><?php echo e(@$item->user->username); ?></a> </p>
                                                    </div>
                                                </div>
                                                <div class="portfolio_details">
                                                        <p><?php echo app('translator')->get('lang.in'); ?>: <?php echo e(@$item->category->title); ?> / <?php echo e(@$item->subCategory->title); ?> <br>
                                                            <?php echo app('translator')->get('lang.high_resolution'); ?>: <?php echo e(@$item->resolution); ?>, <?php echo app('translator')->get('lang.compatible_browsers'); ?>: <?php echo e($item->compatible_browsers); ?>, <?php echo app('translator')->get('lang.compatible_with'); ?>: <br>
                                                            <?php echo e(@$item->compatible_with); ?>, <?php echo app('translator')->get('lang.Columns'); ?>: <?php echo e(@$item->columns); ?></p>
                                                </div>
                                                <div class="total-prise text-center">
                                                    <p><?php echo app('translator')->get('lang.item_price'); ?></p>
                                                    <h2><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e($item->Reg_total); ?></h2>
                                                </div>
                                                <div class="download_inner-btn">
                                                    <?php if($item->status == 2): ?>                                                           
                                                        <a href="<?php echo e(route('author.itemEdit',$item->id)); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.resubmit'); ?></a>
                                                    <?php endif; ?>
                                                    <?php if($item->status == 0): ?>                                                            
                                                        <button  class="boxed-btn"><?php echo app('translator')->get('lang.pending'); ?></button>
                                                    <?php endif; ?>
                                                <a  onclick="deleItem(<?php echo e($item->id); ?>)" class="boxed-btn-white"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                <a id="delete-form-<?php echo e($item->id); ?>" href="<?php echo e(route('author.itemDelete',$item->id)); ?>" class="dm_display_none"></a>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <div class="Pagination">
                                                
                                                <?php echo e(@$data['hidden_item']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                
                                            </div>
                                            <?php else: ?>
                                                <h1><?php echo app('translator')->get('lang.no_item'); ?></h1>   
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4 || @Auth::user()->role_id == 5): ?>
                                    <div class="tab-pane fade <?php echo e(@$data['download'] == url()->current() ?'show active':''); ?> " id="Downloads" role="tabpanel"
                                        aria-labelledby="Downloads-tab">
                                        <div class="download_iteams_common download_iteams_common2  gray-bg">
                                                <?php if(session()->has('success')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session()->get('success')); ?>

                                                </div>
                                            <?php endif; ?>
                                        <?php if(count(@$data['order'])>0): ?>
                                        <?php $__currentLoopData = @$data['order']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = @$value->itemOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                            
                                            <?php if(Auth::user()->role_id==5): ?>
                                                <?php
                                                    if (in_array($item->item_id, @$data['refunds']))
                                                        {
                                                        continue;
                                                        }
                                                ?>  
                                            <?php endif; ?>
                                            
                                            
                                            
                                            <?php
                                                $PickId =  $item->item_id;
                                            ?>                                                  
                                                <?php
                                                   $obj = json_decode($item->item, true);
                                                ?> 
                                                    <div
                                                        class="single_download_iteams d-flex justify-content-between align-items-center">
                                                        <div class="single_inner_one d-flex align-items-center">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(asset(@$obj['icon'])); ?>" alt="">
                                                            </div>
                                                            <div class="download_headr">
                                                                <h5><a href="<?php echo e(route('singleProduct',[str_replace(' ', '-',@$item->Item->title),@$item->Item->id])); ?>"><?php echo e($item->Item->title); ?></a></h5>
                                                                <p class="installation"><a href="#"><?php echo app('translator')->get('lang.regular_license_with'); ?></a></p>
                                                                        <?php
                                                                        if ($obj['support_time']==1) {
                                                                            $expire_date=\Carbon\Carbon::parse($item->created_at)->addMonths(6);
                                                                        } else {
                                                                            $expire_date=\Carbon\Carbon::parse($item->created_at)->addMonths(12);
                                                                        }

                                                                        $created = new \Carbon\Carbon($expire_date);
                                                                        $now = \Carbon\Carbon::now();
                                                                        // $difference = ($created->diff($now)->days < 1) ? 'today':  $created->diffForHumans($now);
                                                                        $difference = ($created->diff($now)->days < 1) ? 'today': DateFormat($created);
                                                                        
                                                                    ?>
                                                                <div class="checkit">
                                                                    <span class="chebox-style-custom">
                                                                        <input class="styled-checkbox item_update_notify" 
                                                                    id="styled-checkbox-2008<?php echo e($item->id); ?>" <?php echo e(isset($item->ItemNotify->notify)? $item->ItemNotify->notify == 1 ? 'checked' :'' : ''); ?> type="checkbox"
                                                                            value="1" onclick="NotifyUpdate(<?php echo e($item->Item->id); ?>)">
                                                                        <label for="styled-checkbox-2008<?php echo e($item->id); ?>"></label>
                                                                    </span>
                                                                    <span class="Notified"> <?php echo app('translator')->get('lang.get_notified'); ?></span>

                                                                            
                                                                        
                                                                    
                                                                    <p class="installation"> <span><?php echo e($difference); ?></span> <?php echo app('translator')->get('lang.support_will_expair'); ?> .</p>
                                                                    
                                                                        
                                                                        

                                                                </div>
                                                                
                                                                
                                                                <?php if(@Itemreviews($item->Item->id,$item->order_id)->rating): ?>
                                                                
                                                                <div class="review_rating">
                                                                    <?php if(@Itemreviews($item->Item->id,$item->order_id)->rating == .5): ?>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 1): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 1.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 2): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 2.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 3): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 3.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 4): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 4.5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <?php elseif(@Itemreviews($item->Item->id,$item->order_id)->rating == 5): ?>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php else: ?>
                                                                
                                                                <a  class="rating" >
                                                                        <input type="radio" <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 5.00 ? 'checked':''); ?>  id="star5" name="rating" value="5" href="#test-form2" class="rating lol"  /><label  class = "full" for="star5" id="star5" title="Awesome - 5 stars"  onclick="Rates(5, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 4.5 ? 'checked':''); ?>  id="star4half" name="rating" value="4.5" href="#test-form2" class="rating lol"  /><label  class="half" for="star4half" title="Pretty good - 4.5 stars"  onclick="Rates(4.5, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 4.00 ? 'checked':''); ?> id="star4" name="rating" value="4" href="#test-form2" class="rating lol" /><label  class = "full" for="star4" title="Pretty good - 4 stars"  onclick="Rates(4, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 3.5 ?'checked':''); ?> id="star3half" name="rating" value="3.5" href="#test-form2" class="rating lol" /><label  class="half" for="star3half" title="Meh - 3.5 stars"  onclick="Rates(3.5, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 3.00 ? 'checked':''); ?> id="star3" name="rating" value="3" href="#test-form2" class="rating lol" /><label  class = "full" for="star3" title="Meh - 3 stars"  onclick="Rates(3, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 2.5 ?'checked':''); ?> id="star2half" name="rating" value="2.5" href="#test-form2" class="rating lol" /><label  class="half" for="star2half" title="Kinda bad - 2.5 stars"  onclick="Rates(2.5, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 2.00 ? 'checked':''); ?> id="star2" name="rating" value="2" href="#test-form2" class="rating lol" /><label  class = "full" for="star2" title="Kinda bad - 2 stars"  onclick="Rates(2, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 1.5 ?'checked':''); ?> id="star1half" name="rating" value="1.5" href="#test-form2" class="rating lol" /><label  class="half" for="star1half" title="Meh - 1.5 stars"  onclick="Rates(1.5, <?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio"  <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == 1.00 ? 'checked':''); ?> id="star1" name="rating" value="1" href="#test-form2" class="rating lol" /><label  class = "full" for="star1" title="Bad  - 1 star"  onclick="Rates(1,<?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                        <input type="radio" <?php echo e(@Itemreviews($item->Item->id,$item->order_id)->rating == .5 ? 'checked':''); ?> id="starhalf" name="rating" value=".5" href="#test-form2" class="rating lol" /><label  class="half" for="starhalf" title="So bad  - 0.5 stars"  onclick="Rates(.5,<?php echo e($PickId); ?>,<?php echo e($item->order_id); ?>)" ></label>
                                                                    
                                                                </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="download_inner-btn d-flex"  >
                                                            <div class="download_2">
                                                                <a href="#" class="boxed-btn" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('lang.download'); ?> <i class="ti-angle-down"></i> </a>
                                                            
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item" href="<?php echo e(route('user.ItemDownloadAll',$item->id)); ?>"><?php echo app('translator')->get('lang.all_files_documentation'); ?></a>
                                                                    
                                                                    <a class="dropdown-item" href="<?php echo e(route('user.LicenceDownload',$item->id)); ?>"><?php echo app('translator')->get('lang.license_certificate_purchase_code'); ?></a>
                                                                </div>
                                                            </div>
                                                            <?php if(@$item->Item->category->productSetting->title): ?>
                                                            <a href="<?php echo e(@$item->Item->category->productSetting->title); ?>" target="_blank" class="boxed-btn-white"><?php echo e(isset($item->Item->category->productSetting) ?  $item->Item->category->productSetting->title .' '. GeneralSetting()->currency_symbol .''. $item->Item->category->productSetting->amount :''); ?></a>
                                                            <?php endif; ?>             

                                                                </div>

                                                            
                                                        
                                                    </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                               
                                            
                                            <div class="Pagination">
                                                    <?php echo e(@$data['order']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                            </div>
                                        <?php else: ?>
                                        <h1><?php echo app('translator')->get('lang.no'); ?> <?php echo app('translator')->get('lang.item'); ?></h1>
                                        <?php endif; ?> 
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <div class="tab-pane fade <?php echo e(@$data['reviews'] == url()->current() ?'show active':''); ?> " id="Reviews" role="tabpanel"
                                        aria-labelledby="Reviews-tab">
                                        <div class="review_main_area">
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <div class="review_area gray-bg">
                                                        <?php
                                                            $review_total=count(@$data['item_review']);
                                                            $total_star=0;
                                                        ?>
                                                        <?php if(@$review_total > 0): ?>
                                                        
                                                            <?php $__currentLoopData = @$data['item_review']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="single_review_wrap">
                                                                    <div
                                                                        class="review_header d-flex justify-content-between">
                                                                        <div
                                                                            class="review_author d-flex align-items-center">
                                                                            <div class="review_thumb">
                                                                                    <img src="<?php echo e(@$review->user->profile->image? asset($review->user->profile->image): asset('public/uploads/img/theme-details/comments/1.png')); ?>" alt="" width="80" height="auto">
                                                                                    
                                                                            </div>
                                                                            <div class="author_name">
                                                                                <h4><?php echo e(@$review->Item->title); ?></h4>
                                                                                <p><?php echo app('translator')->get('lang.reviewed_by'); ?>: <?php echo e(@$review->user->username); ?> on <?php echo e(DateFormat(@$review->created_at)); ?>

                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="review_rating">
                                                                                <?php
                                                                                    $total_star = $total_star+$review->rating;
                                                                                ?>
                                                                                
                                                                                <?php if($review->rating == .5): ?>
                                                                                <i class="fa fa-star-half-o"></i>
                                                                                <i class="fa fa-star-o"></i>
                                                                                <i class="fa fa-star-o"></i>
                                                                                <i class="fa fa-star-o"></i>
                                                                                <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 1): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 1.5): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-half-o-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 2): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 2.5): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 3): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 3.5): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 4): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                <?php elseif($review->rating == 4.5): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                <?php elseif($review->rating == 5): ?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="review-text">
                                                                            <p><?php echo e(@$review->body); ?></p>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="Pagination">
                                                                    <?php echo e(@$data['item_review']->onEachSide(1)->links('frontend.paginate.frontentPaginate')); ?>

                                                            </div>
                                                            <?php else: ?>
                                                            <h1><?php echo app('translator')->get('lang.no'); ?> <?php echo app('translator')->get('lang.review'); ?></h1>
                                                                
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="rating_side_bar">
                                                        <div
                                                            class="single_rating_bar d-flex justify-content-between align-items-center gray-bg">
                                                            <div class="rating_star d-flex align-items-center">
                                                                <i class="ti-star"></i>
                                                                <div class="rate_text">
                                                                    <span><?php echo app('translator')->get('lang.Ratings'); ?></span>
                                                                    
                                                                    <?php
                                                                        if ($review_total > 0) {
                                                                        
                                                                                
                                                                        $countable_star=$total_star / $review_total;
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
                                                                    } 
                                                                    ?>
                                                                    <?php if(@$review_total > 0): ?>
                                                                    <p><?php echo e($countable_star); ?> <?php echo app('translator')->get('lang.average_based_on'); ?> <?php echo e(@$review_total); ?> <?php echo app('translator')->get('lang.Ratings'); ?>.</p>
                                                                    <?php else: ?>
                                                                    <p>0</p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <?php if(@$review_total > 0): ?>
                                                                <h2><?php echo e($countable_star); ?></h2>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div
                                                            class="single_rating_bar d-flex justify-content-between align-items-center gray-bg">
                                                            <div class="rating_star d-flex align-items-center">
                                                                <i class="ti-shopping-cart-full"></i>
                                                                <div class="rate_text">
                                                                    <span><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.sales'); ?></span>
                                                                </div>
                                                            </div>
                                                            <h2><?php echo e($data['user']->item->sum("sell")); ?></h2>
                                                        </div>
                                                        <div
                                                            class="single_rating_bar d-flex justify-content-between align-items-center gray-bg">
                                                            <div class="rating_star d-flex align-items-center">
                                                                <i class="ti-user"></i>
                                                                <div class="rate_text">
                                                                    <span><?php echo app('translator')->get('lang.followers'); ?></span>
                                                                </div>
                                                            </div>
                                                            <h2><?php echo e($data['user']->followers()->count()); ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <div class="tab-pane fade <?php echo e(@$data['refunds'] == url()->current() ?'show active':''); ?> " id="refunds" role="tabpanel"
                                        aria-labelledby="refunds-tab">
                                        <div class="refunds_area">
                                            <?php if(isset($data['refund_order'])): ?>
                                            <?php if($data['refund_order']->count() > 0): ?>
                                            <?php $__currentLoopData = $data['refund_order']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div
                                                class="single_portfolio_list  d-flex align-items-center justify-content-between">
                                                <div class="portflio_thumb d-flex align-items-center">
                                                    <img src="<?php echo e(asset( @$item->Item->icon )); ?>" alt="" width="100" height="100">
                                                    <div class="thumb_heading">
                                                    <h5><a href="<?php echo e(url('/item/').'/'.$item->Item->title.'/'.$item->Item->id); ?>"><?php echo e($item->Item->title); ?></a></h5>
                                                        <p><?php echo app('translator')->get('lang.item_by'); ?> <a href="<?php echo e(route('author.profile',$item->author_id)); ?>"><?php echo e($item->Item->user->username); ?></a> </p>
                                                    </div>
                                                </div>
                                                <div class="portfolio_details">
                                                        <p><?php echo app('translator')->get('lang.in'); ?>: <?php echo e($item->Item->category->title); ?> / <?php echo e($item->Item->subCategory->title); ?> <br></p>
                                                </div>
                                                <div class="total-prise text-center">
                                                    <p><?php echo app('translator')->get('lang.item_price'); ?></p>
                                                    <h2><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e($item->Item->Reg_total); ?></h2>
                                                </div>
                                                <div class="download_inner-btn">
                                                <a href="<?php echo e(route('author.refundView',$item->id)); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.view'); ?> <?php echo app('translator')->get('lang.details'); ?></a>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="Pagination">                                                  
                                                <?php echo e(isset($data['refund_order']) ? $data['refund_order']->onEachSide(1)->links('frontend.paginate.frontentPaginate'):''); ?>                                                    
                                            </div>
                                            <?php else: ?>
                                                <h1 class="text-center"><?php echo app('translator')->get('lang.no_refund_request'); ?></h1>   
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <!-- payouts start -->
                                    
                                    <div class="tab-pane fade <?php echo e(@$data['payout'] == url()->current() ?'show active':''); ?> " id="payouts" role="tabpanel"
                                        aria-labelledby="payouts-tab">
                                            
                                        <div class="payment_wrap account_tabs_pin">
                                            <?php
                                                $bank_payment = @Auth::user()->payment_methods->where('name','Bank')->first();
                                                $stripe_payment = @Auth::user()->payment_methods->where('name','Stripe')->first();
                                                $paypal_payment = @Auth::user()->payment_methods->where('name','Paypal')->first();
                                                $razor_payment = @Auth::user()->payment_methods->where('name','Razor')->first();
                                                $default_payout=defaultPayout();
                                                // echo $default_payout->payment_method_name;
                                                $payout_setup=App\AuthorPayoutSetup::where('user_id',Auth::user()->id)->first();
                                                $bank_payout_setup=App\AuthorPayoutSetup::where('user_id',Auth::user()->id)->where('payment_method_name','Bank')->first();
                                                $stripe_payout_setup=App\AuthorPayoutSetup::where('user_id',Auth::user()->id)->where('payment_method_name','Stripe')->first();
                                                $paypal_payout_setup=App\AuthorPayoutSetup::where('user_id',Auth::user()->id)->where('payment_method_name','PayPal')->first();
                                                $razorpay_payout_setup=App\AuthorPayoutSetup::where('user_id',Auth::user()->id)->where('payment_method_name','Razorpay')->first();
                                            ?>
                                            <nav>
                                                <ul class="nav nav-tabs payout_tab_wrap" id="myTab" role="tablist">
                                                     <?php if(PaymentMethodStatus('Bank')=='true'): ?>
                                                         
                                                        <li class="nav-item">
                                                            <a class="p-0  nav-link <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'Bank'  ? 'active' :'' : ''); ?> " id="payoutsBank-tab"
                                                                data-toggle="tab" href="#payoutsBank" role="tab"
                                                                aria-controls="home" aria-selected="true">
                                                                
                                                                
                                                                <div class="single_payout_item w-100">
                                                                    <div class="deposite_header text-center">
                                                                        Bank
                                                                    </div>
                                                                    <div class="deposite_button text-center">
                                                                        <p><?php echo app('translator')->get('lang.minimum_amount'); ?> <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(env('BANK_MIN_PAYOUT')); ?> </p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li> 
                                                     <?php endif; ?>
                                                     <?php if(PaymentMethodStatus('Stripe')=='true'): ?>
                                                         
                                                        <li class="nav-item">
                                                            <a class="p-0  nav-link <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'Stripe'  ? 'active' :'' : ''); ?> " id="payouts1-tab"
                                                                data-toggle="tab" href="#payouts1" role="tab"
                                                                aria-controls="home" aria-selected="true">
                                                            
                                                                <div class="single_payout_item w-100">
                                                                    <div class="deposite_header text-center">
                                                                        Stripe
                                                                    </div>
                                                                    <div class="deposite_button text-center">
                                                                        <p><?php echo app('translator')->get('lang.minimum_amount'); ?> <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(env('STRIPE_MIN_PAYOUT')); ?> </p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                     <?php endif; ?>
                                                     
                                                     <?php if(PaymentMethodStatus('PayPal')=='true'): ?>
                                                         
                                                     <li class="nav-item">
                                                         <a class="p-0  nav-link <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'PayPal'  ? 'active' :'' : ''); ?>"  id="payouts2-tab" data-toggle="tab"
                                                             href="#payouts2" role="tab" aria-controls="profile"
                                                             aria-selected="false">
                                                             <!-- <div class="thumb_pak text-center">
                                                                 <img class="img-fluid"
                                                                     src="<?php echo e(asset('public/frontend/')); ?>/img/account_settings/1.png" alt="">
                                                                 <p><?php echo app('translator')->get('lang.minimum_amount'); ?> <?php echo e(@GeneralSetting()->currency_symbol); ?> 50.00</p>
                                                                 <?php if($payout_setup): ?>
                                                                     <?php if(@$paypal_payout_setup->is_default==0): ?>
                                                                     <button class="boxed-btn" onclick="location.href='<?php echo e(url('author/set-payout-default/PayPal')); ?>';"><?php echo app('translator')->get('lang.make_default'); ?></button>
                                                                     <?php else: ?>
                                                                     <p><?php echo app('translator')->get('lang.default'); ?></p>
                                                                     <?php endif; ?>
                                                                 <?php endif; ?>
                                                             </div> -->
                                                             <div class="single_payout_item w-100">
                                                                 <div class="deposite_header text-center">
                                                                     PayPal
                                                                 </div>
                                                                 <div class="deposite_button text-center">
                                                                     <p><?php echo app('translator')->get('lang.minimum_amount'); ?> <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(env('PAYPAL_MIN_PAYOUT')); ?> </p>
                                                                 </div>
                                                             </div>
                                                         </a>
                                                     </li>
                                                     <?php endif; ?>
                                                     <?php if(PaymentMethodStatus('Razorpay')=='true'): ?>
                                                         
                                                        <li class="nav-item">
                                                            <a class="p-0 nav-link <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'Razorpay'  ? 'active' :'' : ''); ?>"  id="payouts3-tab" data-toggle="tab"
                                                                href="#payouts3" role="tab" aria-controls="contact"
                                                                aria-selected="false">
                                                                <!-- <div class="thumb_pak text-center">
                                                                    <img class="img-fluid dashboard_razorpay" 
                                                                        src="<?php echo e(asset('public/frontend/')); ?>/img/account_settings/Razorpay.png" alt="">
                                                                    <p><?php echo app('translator')->get('lang.minimum_amount'); ?> <?php echo e(@GeneralSetting()->currency_symbol); ?> 50.00</p>
                                                                    <?php if($payout_setup): ?>
                                                                        <?php if(@$razorpay_payout_setup->is_default==0): ?>
                                                                        <button class="boxed-btn" onclick="location.href='<?php echo e(url('author/set-payout-default/Razorpay')); ?>';"><?php echo app('translator')->get('lang.make_default'); ?></button>
                                                                        <?php else: ?>
                                                                        <p><?php echo app('translator')->get('lang.default'); ?></p>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div> -->
                                                                <div class="single_payout_item w-100">
                                                                    <div class="deposite_header text-center">
                                                                        Razorpay
                                                                    </div>
                                                                    <div class="deposite_button text-center">
                                                                        <p><?php echo app('translator')->get('lang.minimum_amount'); ?> <?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(env('RAZORPAY_MIN_PAYOUT')); ?> </p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                     <?php endif; ?>
                                                </ul>
                                            </nav>
                                            
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'Bank'  ? 'show active' :'' : ''); ?> " id="payoutsBank" role="tabpanel"
                                                    aria-labelledby="payoutsBank-tab">
                                                    <div class="row">
                                                        <div class="col-xl-10">
                                                            <div class="account_swift_maintain pb-0">
                                                                <h2 class="comn-heading"><?php echo app('translator')->get('lang.your_bank_account'); ?></h2>
                                                              
                                                                        <div class='form-row'>
                                                                                <div class='col-md-12 error form-group d-none'>
                                                                                    <div class='alert-danger alert' ></div>
                                                                                </div>
                                                                            </div>
                                                                          
                                                                

                                                                <form action="<?php echo e(route('author.setup_payout')); ?>"  method="POST" class="checkout-form">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <div class="row">
                                                                                <input type="text" name="name" value="Bank" hidden>
                                                                                <div class="col-xl-12 col-md-12">
                                                                                   <textarea name="email" id="bank_account" > <?php echo @$stripe_payout_setup->payout_email; ?> </textarea>
                                                                                </div>
                                                                        
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="check-out-btn mt-20">
                                                                        <button type="submit" class="boxed-btn dpf-submit"><?php echo app('translator')->get('lang.setup_account'); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'Stripe'  ? 'show active' :'' : ''); ?> " id="payouts1" role="tabpanel"
                                                    aria-labelledby="payouts1-tab">
                                                    <div class="row">
                                                        <div class="col-xl-10">
                                                            <div class="account_swift_maintain pb-0">
                                                                <h2 class="comn-heading"><?php echo app('translator')->get('lang.your_stripe_account'); ?></h2>
                                                                <p class="comn-para"><?php echo app('translator')->get('lang.get_paid_by_credit_or'); ?> <a target="_blank" href="https://stripe.com/"><?php echo app('translator')->get('lang.more_about_stripe'); ?></a> | <a target="_blank" href="https://dashboard.stripe.com/register"><?php echo app('translator')->get('lang.create_an_account'); ?></a></p>
                                                                        <div class='form-row'>
                                                                                <div class='col-md-12 error form-group d-none'>
                                                                                    <div class='alert-danger alert' ></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="dm_display_none">
                                                                                <form action="<?php echo e(route('author.setup_payout')); ?>" method="POST" id="payout-setup" >
                                                                                    <?php echo e(csrf_field()); ?>

                                                                                    
                                                                                    <div class="check-out-btn mt-20">
                                                                                        <button type="submit" class="boxed-btn "><?php echo app('translator')->get('lang.setup_account'); ?></button>
                                                                                    </div>
                                                                                    
                                                                                </form>
                                                                            </div>
                                                                

                                                                <form action="<?php echo e(route('author.setup_payout')); ?>"  method="POST" class="checkout-form">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="row">
                                                                                <input type="text" name="name" value="Stripe" hidden>
                                                                                <div class="col-xl-12 col-md-12">
                                                                                    <label for="name"><?php echo app('translator')->get('lang.email'); ?> <span>*</span></label>
                                                                                    <input type="text" name="email" value="<?php echo e(@$stripe_payout_setup->payout_email); ?>" 
                                                                                        placeholder="<?php echo app('translator')->get('lang.enter_email_address'); ?>">
                                                                                </div>
                                                                        
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="check-out-btn mt-20">
                                                                        <button type="submit" class="boxed-btn dpf-submit"><?php echo app('translator')->get('lang.setup_account'); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'PayPal'  ? ' show active' :'' : ''); ?>" id="payouts2" role="tabpanel"
                                                    aria-labelledby="payouts2-tab">
                                                    <div class="row">
                                                        <div class="col-xl-8">
                                                            <div class="account_swift_maintain pb-0">
                                                                <h2 class="comn-heading"><?php echo app('translator')->get('lang.your_paypal_account'); ?></h2>
                                                                <p class="comn-para"><?php echo app('translator')->get('lang.get_paid_by_credit'); ?> <a href="https://www.paypal.com/"><?php echo app('translator')->get('lang.more_about_payPal'); ?></a> | <a href="https://www.paypal.com/us/webapps/mpp/account-selection"><?php echo app('translator')->get('lang.create_an_account'); ?></a></p>
                                                                <form action="<?php echo e(route('author.setup_payout')); ?>"  method="POST" class="checkout-form">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="row">
                                                                                <input type="text" name="name" value="PayPal" hidden>
                                                                                <div class="col-xl-12 col-md-12">
                                                                                    <label for="name"><?php echo app('translator')->get('lang.email'); ?> <span>*</span></label>
                                                                                    <input type="text" name="email" value="<?php echo e(@$paypal_payout_setup->payout_email); ?>" 
                                                                                        placeholder="<?php echo app('translator')->get('lang.enter_email_address'); ?>">
                                                                                </div>
                                                                        
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="check-out-btn mt-20">
                                                                        <button type="submit" class="boxed-btn dpf-submit"><?php echo app('translator')->get('lang.setup_account'); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade <?php echo e(isset($default_payout) ? $default_payout->payment_method_name == 'Razorpay'  ? ' show active' :'' : ''); ?>" id="payouts3" role="tabpanel"
                                                    aria-labelledby="payouts3-tab">
                                                    <div class="row">
                                                        <div class="col-xl-8">
                                                            <div class="account_swift_maintain pb-0">
                                                                <h2 class="comn-heading"><?php echo app('translator')->get('lang.your_razorPay_account'); ?></h2>
                                                                <p class="comn-para"><?php echo app('translator')->get('lang.razorPay_international_transfer'); ?>
                                                                    <a href="https://razorpay.com/"><?php echo app('translator')->get('lang.more_about_razorPay'); ?></a> </p>
                                                                <h2 class="comn-heading"><?php echo app('translator')->get('lang.add_a_new_razorPay_account'); ?>
                                                                </h2>
                                                                
                                                                <form action="<?php echo e(route('author.setup_payout')); ?>" method="POST" class="checkout-form">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="row">
                                                                                <input type="text" name="name" value="Razorpay" hidden>
                                                                                <div class="col-xl-12 col-md-12">
                                                                                    <label for="name"><?php echo app('translator')->get('lang.email'); ?> <span>*</span></label>
                                                                                    <input type="text" name="email" value="<?php echo e(@$razorpay_payout_setup->payout_email); ?>" 
                                                                                        placeholder="<?php echo app('translator')->get('lang.enter_email_address'); ?>">
                                                                                </div>
                                                                                
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                                <h2 class="validation"></h2>
                                                                            <div class="col-xl-12 col-md-12 p-0">
                                                                                <label for="name"><?php echo app('translator')->get('lang.phone'); ?> <span>*</span></label>
                                                                                <input type="text" placeholder="<?php echo app('translator')->get('lang.phone'); ?>" class="card_name"  name="phone" value="<?php echo e(isset($razorpay_payout_setup->payout_phone)? @$razorpay_payout_setup->payout_phone : old('payout_phone')); ?>">
                                                                                    <?php if($errors->has('phone')): ?>
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong><?php echo e($errors->first('phone')); ?></strong>
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                            </div>
                                                                            
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="check-out-btn mt-20">
                                                                        <button type="submit" class="boxed-btn dpf-submit"><?php echo app('translator')->get('lang.setup_account'); ?></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="payouts_show" role="tabpanel" aria-labelledby="payouts_show-tab">
                                            
                                        <div class="payment_wrap account_tabs_pin">
                                            <div class="row">
                                                <div class="col-lg-7 gray-bg ">
                                                    <h2><?php echo app('translator')->get('lang.Next_Payout'); ?></h2>
                                                    <p><?php echo app('translator')->get('lang.You_currently_have'); ?> <?php echo e(@$infix_general_settings->currency_symbol); ?> <?php echo e(Auth::user()->balance->amount); ?> <?php echo app('translator')->get('lang.next_month_payout'); ?>.</p>
                                                </div>
                                                <div class="col-lg-1">

                                                </div>
                                                <div class="col-lg-4 gray-bg">
                                                    <h2><?php echo app('translator')->get('lang.payout'); ?> <?php echo app('translator')->get('lang.account'); ?></h2>
                                                    <?php if(defaultPayout()): ?>
                                                        
                                                        <?php if(defaultPayout()->payment_method_name=='PayPal'): ?>
                                                            <img src="<?php echo e(asset('/'.PaymentMethodSetup('PayPal')->logo)); ?>" width="50" alt="">
                                                        <?php elseif(defaultPayout()->payment_method_name=='Stripe'): ?>
                                                            <img src="<?php echo e(asset('/'.PaymentMethodSetup('Stripe')->logo)); ?>" width="50" alt="">
                                                        <?php elseif(defaultPayout()->payment_method_name=='Razorpay'): ?>
                                                            <img src="<?php echo e(asset('/'.PaymentMethodSetup('Razorpay')->logo)); ?>" width="50" alt="">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('/'.PaymentMethodSetup('Bank')->logo)); ?>" width="50" alt="">
                                                        <?php endif; ?>
                                                            <br>
                                                        <?php echo defaultPayout()->payout_email; ?>

                                                    <?php endif; ?>

                                                    <div class="check-out-btn mt-10">
                                                        <a href="<?php echo e(route('author.payout',@Auth::user()->username)); ?>" id="deposit_" class="boxed-btn"><?php echo app('translator')->get('lang.set'); ?> <?php echo app('translator')->get('lang.account'); ?></a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <h2><?php echo app('translator')->get('lang.payout'); ?> <?php echo app('translator')->get('lang.history'); ?> </h2>
                                            <div class="earing_table gray-bg table-responsive">
                                                <table class="table">
                                                    <thead class="table_border">
                                                        <tr>
                                                            <th colspan=""><?php echo app('translator')->get('lang.amount'); ?></th>
                                                            <th colspan=""><?php echo app('translator')->get('lang.payout'); ?> <?php echo app('translator')->get('lang.method'); ?></th>
                                                            <th colspan=""><?php echo app('translator')->get('lang.date'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $data['payout_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e(@$infix_general_settings->currency_symbol); ?> <?php echo e($payout->amount); ?> </td>
                                                                <td><?php echo e(@$payout->payment_method_name); ?> -<?php echo e(@$payout->payout_email); ?> </td>
                                                                <td><?php echo e(DateFormat($payout->created_at)); ?> </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                              
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <!-- payouts start -->
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    
                                    <!-- earnings start here  -->
                                    <div class="tab-pane fade <?php echo e(@$data['earning'] == url()->current() ?'show active':''); ?> " id="Followings00" role="tabpanel"
                                        aria-labelledby="Followings-tab00">
                                        <div class="earnings_area ">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-4">
                                                    <div class="single_earning gray-bg padding_25px  mb-30">
                                                        <?php
                                                            $total = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $data['monthly_income']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <?php
                                                            $total =$total + $item->subtotal;
                                                        ?>                                                               
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        

                                                        <?php
                                                            $total_sale= $data['monthly_income']->sum('subtotal');
                                                            
                                                            $author_fee=$data['monthly_sale']->sum('price');
                                                            $this_month_sale= $total_sale-$author_fee;
                                                            // echo $this_month_sale;
                                                        ?>

                                                        
                                                        <h3><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$data['monthly_earn1']); ?></h3>
                                                        <h4><?php echo app('translator')->get('lang.sales'); ?> <?php echo app('translator')->get('lang.earnings'); ?> <?php echo app('translator')->get('lang.this'); ?> <?php echo app('translator')->get('lang.month'); ?> (<?php echo e(date('M Y')); ?>), </h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4">
                                                    <div class="single_earning gray-bg padding_25px  mb-30">
                                                        <h3><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$data['monthly_earn2']); ?></h3>
                                                        <h4><?php echo app('translator')->get('lang.your_total_balance_after_associated_author_fees'); ?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4">
                                                    <div class="single_earning gray-bg padding_25px  mb-30">
                                                        <?php
                                                            $total_income = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $data['total_income']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <?php
                                                            $total_income =$total_income + $item->subtotal;
                                                        ?>                                                               
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <h3><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e($total_income); ?></h3>
                                                        <h4><?php echo app('translator')->get('lang.total_value_of_your_sales'); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <div class="sales_graph ">
                                                        <div class="graph_area gray-bg padding_25px  mb-30">
                                                            <div class="row align-items-center">
                                                                <div class="col-xl-3 col-md-3">
                                                                    <div class="graph_title">
                                                                        <h3><?php echo app('translator')->get('lang.sales'); ?> <?php echo app('translator')->get('lang.graph'); ?></h3>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-9 col-md-9">
                                                                    <div class="date_sales d-flex"> 
                                                                        <span class="boxed-btn" id="dateEarn"><?php echo e(date('M Y')); ?>

                                                                        </span>
                                                                        <input type="hidden" id="get_month_year" name="get_month_year" value="<?php echo e(date('m-Y')); ?>">
                                                                        <span class="boxed-btn coursor_pointer"  id="back"><</span>
                                                                        <span class="boxed-btn coursor_pointer "  id="forwordEarn" >></span> 
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="graph_chrt">
                                                                <canvas id="myChart"></canvas>
                                                            </div>
                                                        </div>
                                                        <div class="earing_table gray-bg table-responsive">
                                                            <table class="table">
                                                                <thead class="table_border">
                                                                    <tr>
                                                                        <th colspan="3"><?php echo app('translator')->get('lang.date'); ?></th>
                                                                        <th colspan="3"><?php echo app('translator')->get('lang.itemsale'); ?></th>
                                                                        <th colspan="3"><?php echo app('translator')->get('lang.earnings'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="DateP">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="top_countries gray-bg padding_25px  mb-30">
                                                        <h3><?php echo app('translator')->get('lang.your'); ?> <?php echo app('translator')->get('lang.top'); ?> <?php echo app('translator')->get('lang.countries'); ?></h3>
                                                        <div class="country_list">
                                                            <ul id="_country">
                                                                
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@Auth::user()->role_id == 4): ?>
                                    <!-- earnings end  -->
                                    <div class="tab-pane fade <?php echo e(@$data['statement'] == url()->current() ?'show active':''); ?> " id="Statements" role="tabpanel"
                                        aria-labelledby="Statements-tab">
                                        <div class="satements_area">
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <div class="statement_details gray-bg">
                                                        <div class="statement_details_inner">
                                                            <div class="more_options d-flex">
                                                                
                                                                
                                                            </div>
                                                            <div class="more_options d-flex">
                                                                    <a class="hover-btn" id="Last30" href="#"><?php echo app('translator')->get('lang.last'); ?> 30 <?php echo app('translator')->get('lang.days'); ?></a>
                                                                            <div class="date_sales d-flex"> 
                                                                                <a class="hover-btn" id="dateShow"><?php echo e(date('M Y')); ?>

                                                                                    </a>
                                                                                    <input type="hidden" id="get_month_" name="get_month_" value="<?php echo e(date('m-Y')); ?>">
                                                                                    <input type="hidden" id="get_current_month_" value="<?php echo e(date('m-Y')); ?>">
                                                                                <a class="hover-btn" id="statementBack"><</a>
                                                                                <a class="hover-btn" id="StatementForword" >></a>  
                                                                            </div> 
                                                                <form action="#" class="form-list d-flex">
                                                                    <input   placeholder="<?php echo app('translator')->get('lang.from'); ?>" readonly id="from">
                                                                    <input  placeholder="<?php echo app('translator')->get('lang.to'); ?>" readonly id="to">
                                                                </form>
                                                                <a class="hover-btn search" id="SearhStat">
                                                                    <i class="ti-search"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="statement_table ">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="table-row">
                                                                        <th scope="col"><?php echo app('translator')->get('lang.date'); ?></th>
                                                                        <th scope="col"><?php echo app('translator')->get('lang.Order'); ?> <?php echo app('translator')->get('lang.id'); ?></th>
                                                                        <th scope="col"><?php echo app('translator')->get('lang.type'); ?></th>
                                                                        <th colspan="2" scope="col"><?php echo app('translator')->get('lang.details'); ?></th>
                                                                        <th scope="col"><?php echo app('translator')->get('lang.price'); ?></th>
                                                                        <th scope="col"><?php echo app('translator')->get('lang.amount'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="statement">
                                                                    <?php
                                                                        $statement =App\ManageQuery::UserPaymentStatement();
                                                                    ?>
                                                                    <?php $__currentLoopData = $statement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                          
                                                                        <tr>
                                                                        <td data-label="Account"><?php echo e(DateFormat(@$val->created_at)); ?></td>
                                                                        <td data-label="Due Date"><?php echo e($val->order_id); ?></td>
                                                                            <td data-label="Due Date"><a href="#"
                                                                                    class="free"><?php echo e($val->title); ?></a></td>
                                                                            <td colspan="2" data-label="Period2"><?php echo e($val->details); ?> </td>
                                                                            <td class="prise-counting"
                                                                            data-label="Period"><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e($val->price); ?></td>
                                                                            <td class="prise-counting red"
                                                                                data-label="Period red"> <?php echo e(@$val->type? $val->type =='e' ?'-':'+':''); ?>  <?php echo e(@$infix_general_settings->currency_symbol); ?> <?php echo e($val->price); ?></td>
                                                                        </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="author_setting_bar gray-bg">
                                                        <h3><?php echo app('translator')->get('lang.earnings'); ?></h3>
                                                        <p class="timing"><?php echo app('translator')->get('lang.ysreotl30d'); ?></p>
                                                        <?php
                                                            // $statement = DB::table('statements')->where('author_id',Auth::user()->id)->whereDate('created_at','>', \Carbon\Carbon::now()->subDays(30))->get();
                                                            $statement = App\ManageQuery::UserPaymentStatement();
                                                            $fees=0;
                                                            foreach ($statement as $key => $value) {
                                                                if ($value->type == 'e') {                                                                     
                                                                    $price = @$price - $value->price;  
                                                                    $fees = $fees + $value->price;  
                                                                }else {
                                                                    $price = @$price+$value->price; 
                                                                }
                                                            }
                                                            $AuthorTax = @$data['user']->profile->country->tax;
                                                        //    echo $price;
                                                        ?>

                                                        
                                                        <div class="earning_taks d-flex justify-content-between align-content-center">
                                                            <div class="single_task">
                                                                <p><?php echo app('translator')->get('lang.my_funds'); ?></p>
                                                                
                                                                <h2 id="funds"><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$data['monthly_earn2']); ?></h2>
                                                            </div>
                                                            <div class="single_task">
                                                                <p><?php echo app('translator')->get('lang.earnings'); ?></p>
                                                            <h4 class="green" id="earning">+<?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$data['monthly_earn1']); ?></h4>
                                                            
                                                            </div>
                                                            
                                                            <div class="single_task">
                                                                <p><?php echo app('translator')->get('lang.fees'); ?></p>
                                                            <h4 class="red" id="feeI">-<?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$data['monthly_earn3']); ?></h4>
                                                            </div>
                                                        </div>
                                                        <p class="link-overview"><a href="#" onClick="window.print()"><?php echo app('translator')->get('lang.print'); ?> <?php echo app('translator')->get('lang.this_overview'); ?></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- main-details-area-end -->

        
        <!-- form itself -->

        <!-- form itself -->

     <?php if(count(@$data['order'])>0): ?>
    <form id="test-form2" class="white-popup-block mfp-hide add_lisence_popup" action="<?php echo e(route('user.review')); ?>" method="POST">
       <?php echo csrf_field(); ?>
        <h1><?php echo app('translator')->get('lang.review'); ?> <?php echo app('translator')->get('lang.this'); ?> <?php echo app('translator')->get('lang.item'); ?></h1>
        <fieldset class="border-0">
        
        <div class="tag_ieam">
            <p><?php echo app('translator')->get('lang.message_for_rating'); ?></p>
        </div>
        <input type="text" hidden  name="order_id" id="order_id" />
        <input type="text" hidden name="item_id" id="RatVAl" />
        <div class="your_rated d-flex">
                <strong><?php echo app('translator')->get('lang.your'); ?> <?php echo app('translator')->get('lang.rating'); ?> :</strong><span  class="rating">
                        <input type="checkbox" class="starRate" id="starS5" /><label class = "full " for="5" title="Awesome - 5 stars"></label>
                        <input type="checkbox" class="starRate"  id="starS4.5" /><label class="half" for="4.5" title="Pretty good - 4.5 stars"></label>
                        <input type="checkbox" class="starRate" id="starS4"  /><label class = "full " for="4" title="Pretty good - 4 stars"></label>
                        <input type="checkbox" class="starRate"  id="starS3.5" /><label class="half star3.5" for="3.5" title="Meh - 3.5 stars"></label>
                        <input type="checkbox" class="starRate"  id="starS3"  /><label class = "full star3" for="3" title="Meh - 3 stars"></label>
                        <input type="checkbox" class="starRate"  id="starS2.5" /><label class="half star2.5" for="2.5" title="Kinda bad - 2.5 stars"></label>
                        <input type="checkbox" class="starRate"  id="starS2" /><label class = "full star2" for="2" title="Kinda bad - 2 stars"></label>
                        <input type="checkbox" class="starRate"  id="starS1.5" /><label class="half star1.5" for="1.5" title="Meh - 1.5 stars"></label>
                        <input type="checkbox" class="starRate"  id="starS1"  /><label class = "full star1" for="1" title="Sucks big time - 1 star"></label>
                        <input type="checkbox" class="starRate" id="starS.5" /><label class="half half5" for=".5" title="Sucks big time - 0.5 stars"></label>
                        <input type="hidden" id="final_rating" name="rating">
                    </span>
        </div>

        <div class="row">
            <div class="col-xl-12">
                    <div class="select_box">
                        <?php
                             $review_type = App\ManageQuery::ReviewType();

                        ?>
                        <p><?php echo app('translator')->get('lang.mryr'); ?></p>
                            <select class="wide" name="review_type" id="review_type">
                                <option data-display="Select Review Type *">Select Review Type *</option>
                                <?php $__currentLoopData = $review_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
                                 <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              </select>
                        </div>
                        <span class="text-danger" id="review_type_msg"></span>
            </div>
            <div class="col-xl-12">

                <div class="comments_field">
                    <div class="label d-flex justify-content-between">
                            <label for="textarea" ><?php echo app('translator')->get('lang.comments'); ?></label>
                            <span>1000</span>
                    </div>
                        <textarea id="textarea" placeholder="Your Comments" name="comment" ></textarea>
                </div>
                
                <div class="reviews_text_w">
                    <p><?php echo app('translator')->get('lang.review_publish_to_other'); ?></p>
                </div>
                <div class="button_info">
                    <a class="boxed-btn-white mfp-close"  type="button"><?php echo app('translator')->get('lang.cancle'); ?></a>
                    <button class="boxed-btn"><?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.review'); ?></button>
                </div>
                
            </div>
        </div>
        </fieldset>
    </form>
    <?php endif; ?>



        
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<!-- Croppie js -->
<script src="<?php echo e(asset('public/frontend/js/croppie.min.js')); ?>"></script>
<?php if(@Auth::user()->role_id == 4 ): ?>
<script src="<?php echo e(asset('public/frontend/js/item.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/js/dashboard.js')); ?>"></script>
<?php endif; ?>
<script src="<?php echo e(asset('public/frontend/js/alldashboard.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/delete.js"></script>
<script src="<?php echo e(url('resources/js/app.js')); ?>" ></script>


<script src="<?php echo e(asset('public/frontend/js/')); ?>/payment_gateway.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/checkout.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/frontend_editor.js"></script>

<script>
    CKEDITOR.replace('bank_account');
    CKEDITOR.replace('ticket_summernote');

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  toastr.error('<?php echo e($error); ?>','Error',{
                      closeButton:true,
                      progressBar:true,
                   });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>

 

    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/vendor/dashboard.blade.php ENDPATH**/ ?>