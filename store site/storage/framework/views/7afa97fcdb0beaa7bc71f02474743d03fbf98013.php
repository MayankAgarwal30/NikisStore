
<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<input type="text" id="_categor_id" hidden value="<?php echo e(@$data['category']->id); ?>">
<input type="text" id="_subcategor_id" hidden value="<?php echo e(@$data['subcategory']); ?>">
<input type="text" id="_tag" hidden value="<?php echo e(@$data['tag']); ?>">
<input type="text" id="_attribute" hidden value="<?php echo e(@$data['attribute']); ?>">
<input type="text" id="_key" hidden value="<?php echo e(@$data['key']); ?>">
<input type="text" id="_feature_item" hidden value="<?php echo e(@$data['_feature_item']); ?>">


  <!-- banner-area start -->
    <div class="banner-area2">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                            <div class="search-field">
                                <div class="search-field-inner">
                                    <form class="search-relative" action="javascript:;">
                                        <input type="text" placeholder="Search your product" onkeyup="showResult(this.value)" class="lolz">
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
    <div class="categori-menu-area d-none d-lg-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="catagori-menu">
                            <nav>
                                <ul>
                                    <?php if(!@$data['sub_cat'] && @$data['category']): ?>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.category'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                        <?php $__currentLoopData = @$data['sub_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                           
                                                        <li><a href="<?php echo e(route('searchCategoryItem',[@$data['category']->slug,@$item->slug])); ?>"><?php echo e(@$item->title); ?> <span> (<?php echo e(@$item->CountItem( @$data['category']->id,@$item->id)); ?>)</span></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>                                        
                                    <?php endif; ?>
                                    <?php if(!@$data['category']): ?>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.category'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                            <?php
                                                            $uniqueCat =[];
                                                            $countCategory =0;
                                                                foreach ($data['item'] as $key => $item) {
                                                                          @$uniqueCat[$key]['id']=$item->category_id;
                                                                          @$uniqueCat[$key]['name']=$item->category;
                                                                          @$cid[$countCategory++]=@$item->category_id;
                                                                       }
                                                           ?>
                                                           <?php 
                                                           $countCategory =0;
                                                          
                                                           ?> 
                                                        <?php $__currentLoopData = @$uniqueCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <?php if(@$cat_count[$val['id']] > 0): ?>                                                            
                                                           <li><a href="<?php echo e(route('searchCategoryItem',strtolower(str_replace(' ', '_',@$val['name'])))); ?>"><?php echo e(@$val['name']); ?> <span> (<?php echo e(@$cat_count[$val['id']]); ?>) </span></a></li>
                                                        <?php endif; ?>                                                       
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
                                         $uniqueCat =[];
                                             foreach ($data['item'] as $key => $item) {
                                                foreach (array_unique(explode(",",$item->tags)) as $key => $value) {
                                                $uniqueTags[@$value]=@$value;
                                                $uniqueCat[@$item->category]=@$item->category;
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
                                                         if (@$data['category']) {
                                                               $number=App\ItemCounter::countByCategoryTag($data['category']->id,$val);
                                                         }else {
                                                               $number=App\ItemCounter::countByTag($val); 
                                                                $_cat_slug=App\ItemCounter::getCatSlag($val);
                                                         }
                                                         ?> 
                                                             <?php if(@$val && @$number > 0): ?> 
                                                               <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'tag',strtolower(str_replace(' ', '_',@$val))]) : route('tagCatItem',[@$_cat_slug->slug,'tags',strtolower(str_replace(' ', '_',@$val))])); ?>"><?php echo e(@$val); ?><span> (<?php echo e(@$number); ?>)</span></a></li>                                                        
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
                                                        <form action="javascript:;">
                                                            <input type="text" placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> 10" id="min_price">
                                                            <input type="text" placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> 60" id="max_price">
                                                            <button type="submit" id="price_submit"><?php echo app('translator')->get('lang.filter'); ?></button>
                                                        </form>
                                                    </div>
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
                                                     
                                                        <li><a onclick="Star(1)"><?php echo app('translator')->get('lang.1_star_and_higher'); ?> <span> (<?php echo e($data['oneStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(2)"><?php echo app('translator')->get('lang.2_star_and_higher'); ?> <span> (<?php echo e($data['TwoStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(3)"><?php echo app('translator')->get('lang.3_star_and_higher'); ?> <span> (<?php echo e($data['ThreStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(4)"><?php echo app('translator')->get('lang.4_star_and_higher'); ?> <span> (<?php echo e($data['FourStar']); ?>)</span></a></li>
                                                        <li><a onclick="Star(5)"><?php echo app('translator')->get('lang.5_star_and_higher'); ?> <span> (<?php echo e($data['FivStar']); ?>)</span></a></li>
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
                                                        <li><a href="<?php echo e(@$data['category']? route('tagCatItem',[@$data['category']->slug,'date','anydate']) : route('dateItem',['date','anydate'])); ?>"><?php echo app('translator')->get('lang.any'); ?> <?php echo app('translator')->get('lang.date'); ?><span> ( <?php echo e($data['Any_Date']); ?> )</span></a></li>
                                                        <li><a href="<?php echo e(@$data['category']? route('tagCatItem',[@$data['category']->slug,'date','last_year']) : route('dateItem',['date','last_year'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.year'); ?> <span> (<?php echo e($data['LastYear']); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['category']? route('tagCatItem',[@$data['category']->slug,'date','last_month']) : route('dateItem',['date','last_month'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.month'); ?> <span> (<?php echo e($data['Last_month']); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['category']? route('tagCatItem',[@$data['category']->slug,'date','last_week']) : route('dateItem',['date','last_week'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.week'); ?><span> (<?php echo e($data['Last_week']); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['category']? route('tagCatItem',[@$data['category']->slug,'date','last_day']) : route('dateItem',['date','last_day'])); ?>"><?php echo app('translator')->get('lang.in_the_last'); ?> <?php echo app('translator')->get('lang.day'); ?><span> (<?php echo e($data['Last_day']); ?>)</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                   
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.software'); ?> <?php echo app('translator')->get('lang.version'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                        
                                                        <?php $__currentLoopData = @$data['item']->unique('software_version'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <?php
                                                          if (@$data['category']) {
                                                              $software_version=App\ItemCounter::ItemCount('category_id',$data['category']->id,'software_version',$item->software_version);
                                                            //  $software_version = DB::table('items')->where('category_id',@$data['category']->id)->where('software_version',@$item->software_version)->get()->count(); 
                                                            }else {
                                                                $da=App\ManageQuery::FindSubAttributes($item->software_version);
                                                                $software_version =App\ManageQuery::ItemWithTitelVersion($data['key'],$item->software_version);
                                                            }
                                                          ?>
                                                           <?php if($item): ?> 
                                                           <li><a href="<?php echo e(@$data['category']? route('dateItem',[@$data['category']->slug,'software_version',strtolower(str_replace(' ', '_',@$da->name))]) : route('dateItem',['software_version',strtolower(str_replace(' ', '_',@$da->name))])); ?>"><?php echo e(@$da->name); ?><span> (<?php echo e(@$software_version); ?>)</span></a></li>
                                                         <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.compatiability'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul> 
                                                            <?php $__currentLoopData = $data['item']->unique('compatible_with'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <?php
                                                              if (@$data['category']) {
                                                                $compatible_with =App\ManageQuery::ItemCatWithCompatibleWith($data['category']->id,$item->compatible_with);
                                                                //  DB::table('items')->where('category_id',@$data['category']->id)->where('compatible_with',@$item->compatible_with)->get()->count(); 
                                                                }else {
                                                                    $compatible_with =App\ManageQuery::ItemCatWithCompatibleWith($data['category']->id,$item->compatible_with);
                                                                    //  DB::table('items')->where('category_id',@$data['category']->id)->where('compatible_with',@$item->compatible_with)->get()->count(); 
                                                                    $da=App\ManageQuery::FindSubAttributes($item->compatible_with);
                                                                    //  DB::table('sub_attributes')->find(@$item->compatible_with);
                                                                    $compatible_with =App\ManageQuery::ItemWithTitelCompatible($data['key'],$item->compatible_with);
                                                                    //  DB::table('items')->where('title','LIKE', '%'.@$data['key'].'%')->where('compatible_with',@$item->compatible_with)->get()->count(); 
                                                                }
                                                              ?>
                                                                <li><a href="<?php echo e(@$data['category']? route('dateItem',[@$data['category']->slug,'compatible_with',strtolower(str_replace(' ', '_',@$da->name))]) : route('dateItem',['compatible_with',strtolower(str_replace(' ', '_',@$da->name))])); ?>"><?php echo e(@$da->name); ?><span> (<?php echo e(@$compatible_with); ?>)</span></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <div class="latest-goods-area gray-bg section-padding mt-40">
        <div class="container">
            <div class="row align-items-end">
                  <div class="col-xl-12 portfolio-menu">                   

                     <?php if(@$data['category']): ?>
                     <font><button class="active"><?php echo e(@$data['category']->title); ?></button></font>
                     <?php endif; ?>
                     <?php if(@$data['sub_cat']): ?>
                     <font><button class="active"><?php echo e(@$data['sub_cat']->title); ?></button></font>
                     <?php endif; ?>

                     <?php if(@$data['tag']): ?>
                    <font> <button class="active"><?php echo e(@$data['tag']); ?></button></font>
                     <?php endif; ?>
                     <?php if(@$data['attribute']): ?>
                    <font> <button class="active"><?php echo e(@$data['attribute']); ?></button></font>
                     <?php endif; ?>
                     <?php if(@$data['key']): ?>
                     <font><button class="active"><?php echo e(@$data['key']); ?></button></font>
                     <?php endif; ?>
                     <font class="filter_cat_sale"></font>
                     <font class="filter_cat_rate"></font>
                     <font class="filter_cat_price"></font>
                </div>
                <div class="col-xl-6">
                    <div class="section-title mb-40">
                        <h3><?php echo app('translator')->get('lang.DiscoverOLDG'); ?></h3>
                        <p><?php echo app('translator')->get('lang.product_header_sub_title'); ?></p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="portfolio-menu portfolio-menu2 text-xl-right text-lg-left text-sm-center">
                            <button class="active" value="all" id="all" data-filter="*"><?php echo app('translator')->get('lang.all_items'); ?></button>
                            <button data-filter=".cat1" value="bestsell" id="bestsell"><?php echo app('translator')->get('lang.Best'); ?> <?php echo app('translator')->get('lang.Sellers'); ?></button>
                            <button data-filter=".cat2" value="newest" id="newest"><?php echo app('translator')->get('lang.Newest'); ?></button>
                            <button data-filter=".cat3" value="bestrated" id="bestrated"><?php echo app('translator')->get('lang.Best'); ?> <?php echo app('translator')->get('lang.Rated'); ?></button>
                            <button data-filter=".cat4" value="trending" id="trending"><?php echo app('translator')->get('lang.Trending'); ?></button>
                            <button data-filter=".cat5" value="high" id="high"><?php echo app('translator')->get('price'); ?> <?php echo app('translator')->get('lang.High_to_Low'); ?></button>
                            <button data-filter=".cat6" value="low" id="low"><?php echo app('translator')->get('price'); ?> <?php echo app('translator')->get('lang.Low_to_High'); ?></button>
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
<script src="<?php echo e(asset('public/frontend/js/')); ?>/free_item.js"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/free_item.blade.php ENDPATH**/ ?>