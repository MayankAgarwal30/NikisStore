
<?php $__env->startPush('css'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/index_modal.css">
<?php $__env->stopPush(); ?>
<?php 
    $homepage = Modules\Pages\Entities\InfixHomePage::where('active_status', 1)->first();
?> 
<?php $__env->startSection('content'); ?>

<input type="text" id="_categor_id" hidden value="<?php echo e($data['category']->id); ?>">
<input type="text" id="_subcategor_id" hidden value="<?php echo e(@$data['subcategory']); ?>">
<input type="text" id="_tag" hidden value="<?php echo e(@$data['tag']); ?>">
<input type="text" id="_attribute" hidden value="<?php echo e(@$data['attribute']); ?>">
<input type="text" id="_key" hidden value="<?php echo e(@$data['key']); ?>">
<input type="text" id="searCat" hidden value="<?php echo e(@$data['searCat']); ?>">
  <!-- banner-area start -->
    <div class="banner-area2" >
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="banner-info text-center mb-30">
                        <h2><?php echo e(@$data['sub_cat']? @$data['sub_cat']->title :@$data['category']->title); ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                            <div class="search-field">
                                <div class="search-field-inner">
                                    
                                        <form class="search-relative" action="<?php echo e(route('_by_search')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                        <input type="text" placeholder="<?php echo app('translator')->get('lang.search_your_product'); ?>" name="key" onkeyup="showResult(this.value)" class="lolz">
                                        <button type="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
    <!-- categori-menu-area-start -->
    <div class="categori-menu-area d-lg-block Common_cat_menu">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="catagori-menu ">
                            <nav>
                                <ul class="Common_cat_menu_list" >
                                    <?php if(!@$data['sub_cat']): ?>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.Sub'); ?> <?php echo app('translator')->get('lang.Category'); ?></a>
                                        <div class="catagori-submenu-area mb-40">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                        <?php $__currentLoopData = $data['sub_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                            
                                                        <li><a href="<?php echo e(route('categoryItem',[@$data['category']->slug,@$item->slug])); ?>"><?php echo e(@$item->title); ?> <span> (<?php echo e(@$item->CountItem( @$data['category']->id,@$item->id)); ?>)</span></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>                                        
                                    <?php endif; ?>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.Tags'); ?></a>
                                        <?php
                                         $uniqueTags =[];
                                         $uniquesoftware =[];
                                             foreach ($data['item'] as $key => $item) {
                                                foreach (array_unique(explode(",",$item->tags)) as $key => $value) {
                                                $uniqueTags[$value]=$value;
                                                    } 
                                            }
                                        ?>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>                                  
                                                         <?php $__currentLoopData = $uniqueTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                         
                                                           
                                                         <?php
                                                         if (@$data['sub_cat']) {
                                                             @$number =App\ManageQuery::ItemWithSubCategoryTag($data['sub_cat']->id,$val); 
                                                         }else {
                                                             @$number = App\ManageQuery::ItemWithCategoryTag($data['category']->id,$val); 
                                                         }
                                                         ?>                                                       
                                                             <?php if(@$val): ?> 
                                                               <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'tag',strtolower(str_replace(' ', '_',@$val))]) : route('tagCatItem',[@$data['category']->slug,'tags',strtolower(str_replace(' ', '_',@$val))])); ?>"><?php echo e(@$val); ?><span> (<?php echo e(@$number); ?>)</span></a></li>                                                        
                                                             <?php endif; ?>
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.Price'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content text-xl-center text-lg-center">
                                                    <div class="prise-form">
                                                        <form action="#">
                                                            <input type="text" placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> 10" id="min_price">
                                                            <input type="text" placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> 60" id="max_price">
                                                            <button type="submit" id="price_submit"><?php echo app('translator')->get('lang.filter'); ?></button>
                                                        </form>
                                                    </div>
                                                    <span id="price_filter_msg" class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.sales'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                   
                                                        <li><a value="NoSell" id="NoSell"><?php echo app('translator')->get('lang.no_sales'); ?> <span> (<?php echo e(@$data['no']); ?>)</span></a></li>
                                                        <li><a value="LowSell" id="LowSell"><?php echo app('translator')->get('lang.low'); ?> <span> (<?php echo e(@$data['low']); ?>)</span></a></li>
                                                        <li><a value="MediumSell" id="MediumSell"><?php echo app('translator')->get('lang.mudium'); ?> <span> (<?php echo e(@$data['medium']); ?>)</span></a></li>
                                                        <li><a value="HighSell" id="HighSell"><?php echo app('translator')->get('lang.high'); ?> <span> (<?php echo e(@$data['high']); ?>)</span></a></li>
                                                        <li><a value="TopSell" id="TopSell"><?php echo app('translator')->get('lang.top_seller'); ?> <span> ( <?php echo e(@$data['top']); ?> )</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.rating'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                    
                                                        <li><a onclick="Star(1)"><?php echo app('translator')->get('lang.1_star_and_higher'); ?> <span> (<?php echo e(@$data['oneStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(2)"><?php echo app('translator')->get('lang.2_star_and_higher'); ?> <span> (<?php echo e(@$data['TwoStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(3)"><?php echo app('translator')->get('lang.3_star_and_higher'); ?> <span> (<?php echo e(@$data['ThreStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(4)"><?php echo app('translator')->get('lang.4_star_and_higher'); ?> <span> (<?php echo e(@$data['FourStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(5)"><?php echo app('translator')->get('lang.5_star_and_higher'); ?> <span> (<?php echo e(@$data['FivStar']); ?>)</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.date'); ?> <?php echo app('translator')->get('lang.added'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                      
                                                    <ul>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','anydate']) : route('tagCatItem',[@$data['category']->slug,'date','anydate'])); ?>"><?php echo app('translator')->get('lang.any'); ?> <?php echo app('translator')->get('lang.date'); ?><span> ( <?php echo e(@$data['Any_Date']); ?> )</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_year']) : route('tagCatItem',[@$data['category']->slug,'date','last_year'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.year'); ?> <span> (<?php echo e(@$data['LastYear']); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_month']) : route('tagCatItem',[@$data['category']->slug,'date','last_month'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.month'); ?><span> (<?php echo e(@$data['Last_month']); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_week']) : route('tagCatItem',[@$data['category']->slug,'date','last_week'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.week'); ?> <span> (<?php echo e(@$data['Last_week']); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_day']) : route('tagCatItem',[@$data['category']->slug,'date','last_day'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.days'); ?> <span> (<?php echo e(@$data['Last_day']); ?>)</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                   
                                    

                                    

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- categori-menu-area-end -->
    <!-- latest-goods-start -->
    <div class="latest-goods-area gray-bg section-padding1 mt-40">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-12  portfolio-menu">                   

                     <?php if(@$data['category']): ?>
                     <font><button class="active"><?php echo e(@$data['category']->title); ?></button></font>
                     <?php endif; ?>
                     <?php if(@$data['sub_cat']): ?>
                     <font><button class="active"><?php echo e(@$data['sub_cat']->title); ?></button></font>
                     <?php endif; ?>

                     <?php if(@$data['tag']): ?>
                     <font><button class="active"><?php echo e(@$data['tag']); ?></button></font>
                     <?php endif; ?>
                     <?php if(@$data['attribute']): ?>
                     <font><button class="active"><?php echo e(@$data['attribute']); ?></button></font>
                     <?php endif; ?>
                     <?php if(@$data['key']): ?>
                     <font><button class="active"><?php echo e(@$data['key']); ?></button></font>
                     <?php endif; ?>
                     <?php if(@$data['category']): ?>
                     <font><button onclick="window.location.href = '<?php echo e(URL('/')); ?>';" class="active"><?php echo app('translator')->get('lang.clear_filter'); ?></button></font>
                 <?php endif; ?>
                     <font class="filter_cat_sale"></font>
                     <font class="filter_cat_rate"></font>
                     <font class="filter_cat_price"></font>
                </div>

                <div class="col-xl-6">
                    <div class="section-title mb-40">
                        <h3><?php echo e(@$homepage->product_title); ?></h3>
                        <h4><?php echo e(@$homepage->product_title_description); ?></h4>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="portfolio-menu portfolio-menu2 text-xl-right text-lg-left text-sm-center">
                            <button class="active" value="all" id="all" data-filter="*"><?php echo app('translator')->get('lang.all_items'); ?></button>
                            <button data-filter=".cat1" value="bestsell" id="bestsell"><?php echo app('translator')->get('lang.Best'); ?> <?php echo app('translator')->get('lang.Sellers'); ?></button>
                            <button data-filter=".cat2" value="newest" id="newest"><?php echo app('translator')->get('Newest'); ?></button>
                            <button data-filter=".cat3" value="bestrated" id="bestrated"><?php echo app('translator')->get('lang.Best'); ?> <?php echo app('translator')->get('lang.Rated'); ?></button>
                            <button data-filter=".cat4" value="trending" id="trending"><?php echo app('translator')->get('lang.Trending'); ?></button>
                            <button data-filter=".cat5" value="high" id="high"><?php echo app('translator')->get('lang.price_high_to_low'); ?></button>
                            <button data-filter=".cat6" value="low" id="low"><?php echo app('translator')->get('lang.price_low_to_high'); ?> </button>
                    </div>
                </div>
            </div>
            <div class="row grid databox" id="databox">

            </div>
            <div class="row bt">
            </div>
        </div>
    </div>
    <!-- latest-goods-end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/category.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/category.blade.php ENDPATH**/ ?>