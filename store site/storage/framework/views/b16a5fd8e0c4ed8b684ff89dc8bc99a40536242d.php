<?php 
    $data['category'] =  app('item_categories');
    $data['cart_item']=Cart::content();
    $logo_conditions = ['title'=>'Logo', 'active_status'=>1];
    $logo = dashboard_background($logo_conditions);
?>
<header>
   
        <div id="sticky-header" class="header-area">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <!-- <div class=" col-md-3 col-lg-2 col-xl-3 col-md-12"> -->
                        <div class="logo-img" >
                          <a href="<?php echo e(url('/')); ?>">
                               <img src="<?php echo e(@$logo ? asset(@$logo->image) : asset('public/frontend/img/Logo.png')); ?>" alt="" class="mw">
                            </a>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="col-xl-6 d-none d-lg-block col-lg-6"> -->
                        <div class="main-menu">
                            <nav>
                                <ul id="navigation">
                                    <?php $__currentLoopData = app('item_categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <li><a href="<?php echo e(route('categoryItem',@$item->slug)); ?>"><?php echo e(@$item->title); ?></a>
                                            <ul class="submenu">
                                                
                                                <?php $__currentLoopData = @$item->subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e(url('category/sub/'.@$item->slug.'/'.@$sub_cat->slug)); ?>"><?php echo e(@$sub_cat->title); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </ul>
                                       </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </nav>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="col-xl-3 col-md-6 col-lg-4 d-none d-lg-block"> -->
               

                     
                        <?php if(Auth::check()): ?>
                        <div class="main_user-pro_wrap d-flex align-items-center justify-content-end">
                            <a class="" href="<?php echo e(route('Cart')); ?>"><span class="cart"><i class="ti-shopping-cart" id="ti_Shop">
                                <?php if(@count($data['cart_item']) >0 ): ?>
                                    <span class="badge_icon" id="cartItem"><?php echo e(count(@$data['cart_item'])); ?></span>  
                                <?php endif; ?>
                            </i></span></a>

                            
                      
                            <select class="niceSelect languageChange" name="languageChange" id="languageChangeMenu">
                                <option data-display="<?php echo app('translator')->get('lang.language'); ?>" value="0"><?php echo app('translator')->get('lang.language'); ?></option>
                                <?php
                                    $languages=app('infix_languages');
                                ?>
                                
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                                <?php if(Auth::check()): ?>
                                    <option data-display="<?php echo e($lang->native); ?>" value="<?php echo e($lang->language_universal); ?>" <?php echo e($lang->language_universal == userActiveLanguage()? 'selected':''); ?>><?php echo e($lang->native); ?></option>
                                
                                <?php else: ?>
                                    <option data-display="<?php echo e($lang->native); ?>" value="<?php echo e($lang->language_universal); ?>" <?php echo e($lang->language_universal == activeLanguage()? 'selected':''); ?>><?php echo e($lang->native); ?></option>
                                
                                <?php endif; ?>
                                  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                                <div class="profile-area">
                                    <a class="user_author_pro" > <span class="name"> <?php echo e(Str::limit(@Auth::user()->username, 8)); ?></span> 
                                    <?php if(Auth::user()->role_id != 1): ?>
                                        
                                    <span class="simple_line">|</span> 
                                    <?php endif; ?>
                                         <span class="prise">
                                            <?php if(Auth::user()->role_id == 4): ?>
                                                <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@Auth::user()->balance->amount); ?>

                                            <?php endif; ?>
                                            <?php if(Auth::user()->role_id == 5): ?>
                                                <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@Auth::user()->balance->amount); ?>

                                            <?php endif; ?>
                                        
                                        </span> </a>
                                    <div class="profile_dropdwon">
                                        <div class="profile_hover_links">
                                            <h3> <?php echo e(@Auth::user()->username); ?></h3>
                                                <?php if(@Auth::user()->role_id==1 || @Auth::user()->role_id==2): ?>
                                                    <ul>
                                                        <li> <a href="<?php echo e(route('admin.dashboard')); ?> "><?php echo app('translator')->get('lang.dashboard'); ?></a> </li>   
                                                    </ul> 
                                                <?php endif; ?>
                                            <ul>
                                                <?php if(Auth::user()->role_id == 4): ?>
                                                    <li><a href="<?php echo e(route('author.profile',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.profile'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.setting',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.settings'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.download',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.Downloads'); ?></a></li>
                                                    <li><a href="<?php echo e(route('user.deposit',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.fund_deposit'); ?></a></li>
                                                <?php endif; ?>
                                                <?php if(Auth::user()->role_id == 5): ?>
                                                    <li><a href="<?php echo e(route('customer.profile',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.profile'); ?></a></li>
                                                    <li><a href="<?php echo e(route('customer.downloads',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.Downloads'); ?></a></li>
                                                    <li><a href="<?php echo e(route('user.deposit',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.fund_deposit'); ?></a></li>
                                                    <?php if(GeneralSetting()->public_vendor==1): ?>
                                                        
                                                    <li><a href="<?php echo e(route('user.BecomeAuthor')); ?>"><?php echo app('translator')->get('lang.become_a_author'); ?></a></li>
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                                
                                            </ul>
                                        </div>
                                        <?php if(Auth::user()->role_id == 5 || Auth::user()->role_id == 4): ?>
                                            <div class="profile_hover_links">
                                                <?php if(Auth::user()->role_id == 4): ?>
                                                <h3><?php echo app('translator')->get('lang.author_settings'); ?></h3>
                                                <?php endif; ?>
                                                <?php if(Auth::user()->role_id == 5): ?>
                                                <h3><?php echo app('translator')->get('lang.user_settings'); ?></h3>
                                                <?php endif; ?>
                                                <ul>
                                                    <?php if(Auth::user()->role_id == 5): ?>
                                                    <li><a href="<?php echo e(route('customer.setting',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.settings'); ?></a></li>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->role_id == 4): ?>
                                                    <li><a href="<?php echo e(route('author.dashboard',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.portfolio',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.portfolio'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.coupon_list',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.coupon'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.content')); ?>"><?php echo app('translator')->get('lang.upload'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.earning',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.earnings'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.statement',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.statement'); ?></a></li>
                                                    <li><a href="<?php echo e(route('author.payout',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.payouts'); ?></a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <div class="sign_out">
                                                <a href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><?php echo app('translator')->get('lang.sign_out'); ?></a>
            
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="dn">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                        </div>
                                    </div>
                                </div> 
                        </div>                       
                        <?php endif; ?>
                        <?php if(!Auth::check()): ?>

                        <div class="main_user-pro_wrap d-flex align-items-center justify-content-end">
                            <a class="" href="<?php echo e(route('Cart')); ?>"><span class="cart"><i class="ti-shopping-cart" id="ti_Shop">
                                <?php if(@count($data['cart_item']) >0 ): ?>
                                    <span class="badge_icon" id="cartItem"><?php echo e(count(@$data['cart_item'])); ?></span>  
                                <?php endif; ?>
                            </i></span></a>

                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync') && Auth::check()==false): ?>
                            <?php
                                if( App::getLocale()!=null){
                                    $local= App::getLocale();
                                }else{
                                    $local= activeLanguage();
                                }
                            ?>
                                <select class="niceSelect languageChange" name="languageChange" id="languageChangeMenuOut">
                                    <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.language'); ?>" value="0"><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.language'); ?></option>
                                    <?php
                                        $languages=app('infix_languages');
                                    ?>
                                    
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                                        <option data-display="<?php echo e($lang->native); ?>" value="<?php echo e($lang->language_universal); ?>" <?php echo e($lang->language_universal == $local? 'selected':''); ?>><?php echo e($lang->native); ?></option>
                                    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>
                                <div class="profile-area m-0">

                                    
                                    <a class="login_icon" href="<?php echo e(url('customer/login')); ?>"> <span class="signin_text" ><?php echo app('translator')->get('lang.sign_in'); ?></span> <i class="fa fa-sign-in m-0 p-0 signin_btn" aria-hidden="true"></i></a>
                                </div>
                        </div>
                            
                        <?php endif; ?>
                    <!-- </div> -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                    <div class="col-12 d-lg-none">
                         <?php if(Auth::check()): ?>
                        <div class="profile-area">
                            <a class="user_author_pro" ><i class="ti-user"></i> <span
                                    class="name"><?php echo e(@Auth::user()->username); ?></span> <span class="simple_line">|</span> <span
                                    class="prise"></span> 
                                    <?php if(Auth::user()->role_id == 4): ?>
                                    <?php echo app('translator')->get('lang.earnings'); ?>: <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@Auth::user()->balance->amount); ?>

                                    <?php endif; ?>
                                    <?php if(Auth::user()->role_id == 5): ?>
                                    <?php echo app('translator')->get('lang.balances'); ?>: <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@Auth::user()->balance->amount); ?>

                                    <?php endif; ?>
                                </a>
                            <div class="profile_dropdwon">
                                <div class="profile_hover_links">
                                    <h3><?php echo e(@Auth::user()->username); ?></h3>
                                    <ul>
                                            <?php if(Auth::user()->role_id == 5): ?>
                                            <li><a href="<?php echo e(route('customer.profile',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.profile'); ?></a></li>
                                            <li><a href="<?php echo e(route('customer.downloads',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.Downloads'); ?></a></li>
                                            <?php if(GeneralSetting()->public_vendor==1): ?>
                                                
                                                <li><a href="<?php echo e(route('user.BecomeAuthor')); ?>"><?php echo app('translator')->get('lang.become_a_author'); ?></a></li>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->role_id == 4): ?>
                                            <li><a href="<?php echo e(route('author.profile',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.profile'); ?></a></li>
                                            <li><a href="<?php echo e(route('author.download',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.Downloads'); ?></a></li>                                            
                                            <?php endif; ?>
                                            <?php if(Auth::check() && @Auth::user()->role_id==1 || @Auth::user()->role_id==2): ?>
                                                <li> <a href="<?php echo e(route('admin.dashboard')); ?> "><?php echo app('translator')->get('lang.dashboard'); ?></a> </li>   
                                            <?php else: ?>
                                                <li><a href="<?php echo e(route('user.deposit',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.fund_deposit'); ?></a></li>
                                            <?php endif; ?>
                                           
                                    </ul>
                                </div>
                                    
                                <div class="profile_hover_links">
                                    <?php if(Auth::user()->role_id == 4): ?>
                                    <h3><?php echo app('translator')->get('lang.author_settings'); ?></h3>
                                    <?php endif; ?>
                                    <?php if(Auth::user()->role_id == 5): ?>
                                    <h3><?php echo app('translator')->get('lang.user_settings'); ?></h3>
                                    <?php endif; ?>
                                    <ul> 
                                            <?php if(Auth::user()->role_id == 5): ?>
                                            <li><a href="<?php echo e(route('customer.setting',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.settings'); ?></a></li>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->role_id == 4): ?>
                                            <li><a href="<?php echo e(route('author.setting',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.settings'); ?></a></li>
                                            <li><a href="<?php echo e(route('author.dashboard',@Auth::user()->username)); ?>/"><?php echo app('translator')->get('lang.dashboard'); ?></a></li>
                                            <li><a href="<?php echo e(route('author.coupon_list',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.coupon'); ?></a></li>
                                            <li><a href="<?php echo e(route('author.content')); ?>"><?php echo app('translator')->get('lang.upload'); ?></a></li>
                                            <li><a href="<?php echo e(route('author.earning',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.earnings'); ?></a></li>
                                            <li><a href="<?php echo e(route('author.statement',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.statement'); ?></a></li>
                                            <li><a href="<?php echo e(route('author.payout',@Auth::user()->username)); ?>"><?php echo app('translator')->get('lang.payouts'); ?></a></li>
                                            <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="sign_out">
                                    <a href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><?php echo app('translator')->get('lang.sign_out'); ?></a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="dn">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                       <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</header>
<?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>