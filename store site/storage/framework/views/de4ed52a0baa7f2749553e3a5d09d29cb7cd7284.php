
<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php 
    $homepage = Modules\Pages\Entities\InfixHomePage::where('active_status', 1)->first();
?> 
<?php $__env->startSection('content'); ?>

<input type="text" id="_categor_id" hidden value="<?php echo e(@$data['category']->id); ?>">
<input type="text" id="_subcategor_id" hidden value="<?php echo e(@$data['subcategory']); ?>">
<input type="text" id="_tag" hidden value="<?php echo e(@$data['tag']); ?>">
<input type="text" id="_attribute" hidden value="<?php echo e(@$data['attribute']); ?>">
<input type="text" id="_key" hidden value="<?php echo e(@$data['key']); ?>">
  <!-- banner-area start -->
    <div class="banner-area2">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="banner-info text-center mb-30">
                        
                    </div>
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
                                        <?php
                                        $uniqueTags =[];
                                            foreach ($data['item'] as $key => $item) {
                                               foreach (array_unique(explode(",",$item->tags)) as $key => $value) {
                                               $uniqueTags[$value]=$value;
                                                   }
                                               
                                           }
                                          
                                       ?>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.Tags'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                        <?php $__currentLoopData = $uniqueTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                                        
                                                            <?php
                                                                if (@$data['sub_cat']) {
                                                                   $number = @App\ManageQuery::ItemWithSubCategoryTag($data['sub_cat']->id,$val); 
                                                                }else {
                                                                    $number = App\ManageQuery::ItemWithCategoryTag($data['category']->id,$val);  
                                                                }
                                                            ?> 
                                                                                                                
                                                                <?php if($val): ?> 
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
                                                            <?php
                                                              if (@$data['sub_cat']) {
                                                                    $getData=App\ManageQuery::ItemWithSubCategoryTag($data['sub_cat']->id,null);
                                                                    $no = @$getData['no'];
                                                                    $low = @$getData['low'];
                                                                    $medium = @$getData['medium'];
                                                                    $high =@$getData['high'];
                                                                    $top =@$getData['top'];
                                                            }
                                                            else {
                                                                $getData=App\ManageQuery::ItemSaleCountWithCat($data['category']->id);
                                                                    $no = @$getData['no'];
                                                                    $low = @$getData['low'];
                                                                    $medium = @$getData['medium'];
                                                                    $high =@$getData['high'];
                                                                    $top =@$getData['top'];
                                                            }
                                                        ?>
                                                        
                                                        <li><a value="NoSell" id="NoSell"><?php echo app('translator')->get('lang.no_sales'); ?> <span> (<?php echo e(@$no); ?>)</span></a></li>
                                                        <li><a value="LowSell" id="LowSell"><?php echo app('translator')->get('lang.low'); ?> <span> (<?php echo e(@$low); ?>)</span></a></li>
                                                        <li><a value="MediumSell" id="MediumSell"><?php echo app('translator')->get('lang.mudium'); ?> <span> (<?php echo e(@$medium); ?>)</span></a></li>
                                                        <li><a value="HighSell" id="HighSell"><?php echo app('translator')->get('lang.high'); ?> <span> (<?php echo e(@$high); ?>)</span></a></li>
                                                        <li><a value="TopSell" id="TopSell"><?php echo app('translator')->get('lang.top_seller'); ?> <span> ( <?php echo e(@$top); ?> )</span></a></li>
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
                                                            <?php
                                                            if (@$data['sub_cat']) {
                                                               $getData=App\ManageQuery::ItemStarCountWithSubCat($data['sub_cat']->id);
                                                                    $oneStar = $getData['oneStar'];
                                                                    $TwoStar = $getData['TwoStar'];
                                                                    $ThreStar = $getData['ThreStar'];
                                                                    $FourStar =$getData['FourStar'];
                                                                    $FivStar =$getData['FivStar'];
                                                            }
                                                            else {
                                                                $getData=App\ManageQuery::ItemStarCountWithCat($data['category']->id);
                                                                    $oneStar = $getData['oneStar'];
                                                                    $TwoStar = $getData['TwoStar'];
                                                                    $ThreStar = $getData['ThreStar'];
                                                                    $FourStar =$getData['FourStar'];
                                                                    $FivStar =$getData['FivStar'];
                                                            }
                                                        ?>
                                                        <li><a onclick="Star(1)"><?php echo app('translator')->get('lang.1_star_and_higher'); ?> <span> (<?php echo e(@$oneStar); ?>)</span></a></li>
                                                        <li><a onclick="Star(2)"><?php echo app('translator')->get('lang.2_star_and_higher'); ?> <span> (<?php echo e(@$TwoStar); ?>)</span></a></li>
                                                        <li><a onclick="Star(3)"><?php echo app('translator')->get('lang.3_star_and_higher'); ?> <span> (<?php echo e(@$ThreStar); ?>)</span></a></li>
                                                        <li><a onclick="Star(4)"><?php echo app('translator')->get('lang.4_star_and_higher'); ?> <span> (<?php echo e(@$FourStar); ?>)</span></a></li>
                                                        <li><a onclick="Star(5)"><?php echo app('translator')->get('lang.5_star_and_higher'); ?> <span> (<?php echo e(@$FivStar); ?>)</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.date_added'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                        <?php 
                                                        if (@$data['sub_cat']) {

                                                             $getData=App\ManageQuery::ItemDateWiseWithSubCat($data['category']->id,$data['sub_cat']->id);
                                                                    $Any_Date = $getData['Any_Date'];
                                                                    $LastYear = $getData['LastYear'];
                                                                    $Last_month = $getData['Last_month'];
                                                                    $Last_week =$getData['Last_week'];
                                                                    $Last_day =$getData['Last_day'];


                                                            // $Any_Date=DB::table('items')->where('category_id',@$data['category']->id)->where('sub_category_id',@$data['sub_cat']->id)->where('active_status', 1)->where('status', 1)->count();
                                                            // $LastYear=DB::table('items')->where('category_id',@$data['category']->id)->where('sub_category_id',@$data['sub_cat']->id)->where('active_status', 1)->where('status', 1)->whereDate('created_at', '<=', date('Y-m-d',strtotime('-1 years')))->count();
                                                            // $Last_month=DB::table('items')->where('category_id',@$data['category']->id)->where('sub_category_id',@$data['sub_cat']->id)->where('active_status', 1)->where('status', 1)->whereBetween('created_at',[date('Y-m-d',strtotime('-1 months')),date('Y-m-d')])->count();
                                                            // $Last_week=DB::table('items')->where('category_id',@$data['category']->id)->where('sub_category_id',@$data['sub_cat']->id)->where('active_status', 1)->where('status', 1)->whereBetween('created_at',[date('Y-m-d',strtotime('-1 weeks')),date('Y-m-d')])->count();
                                                            // $Last_day=DB::table('items')->where('category_id',@$data['category']->id)->where('sub_category_id',@$data['sub_cat']->id)->where('active_status', 1)->where('status', 1)->whereBetween('created_at',[date('Y-m-d',strtotime('-1 days')),date('Y-m-d')])->count();
                                                        }else {

                                                             $getData=App\ManageQuery::ItemDateWiseWithCat($data['category']->id);
                                                                    $Any_Date = $getData['Any_Date'];
                                                                    $LastYear = $getData['LastYear'];
                                                                    $Last_month = $getData['Last_month'];
                                                                    $Last_week =$getData['Last_week'];
                                                                    $Last_day =$getData['Last_day'];

                                                            // $Any_Date=DB::table('items')->where('category_id',@$data['category']->id)->where('active_status', 1)->where('status', 1)->count();
                                                            // $LastYear=DB::table('items')->where('category_id',@$data['category']->id)->where('active_status', 1)->where('status', 1)->whereDate('created_at', '<=', date('Y-m-d',strtotime('-1 years')))->count();
                                                            // $Last_month=DB::table('items')->where('category_id',@$data['category']->id)->where('active_status', 1)->where('status', 1)->whereBetween('created_at',[date('Y-m-d',strtotime('-1 months')),date('Y-m-d')])->count();
                                                            // $Last_week=DB::table('items')->where('category_id',@$data['category']->id)->where('active_status', 1)->where('status', 1)->whereBetween('created_at',[date('Y-m-d',strtotime('-1 weeks')),date('Y-m-d')])->count();
                                                            // $Last_day=DB::table('items')->where('category_id',@$data['category']->id)->where('active_status', 1)->where('status', 1)->whereBetween('created_at',[date('Y-m-d',strtotime('-1 days')),date('Y-m-d')])->count();
                                                       
                                                        }
                                                        ?>
                                                    <ul>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','anydate']) : route('tagCatItem',[@$data['category']->slug,'date','anydate'])); ?>">Any Date<span> ( <?php echo e(@$Any_Date); ?> )</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_year']) : route('tagCatItem',[@$data['category']->slug,'date','last_year'])); ?>">In the Last Year <span> (<?php echo e(@$LastYear); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_month']) : route('tagCatItem',[@$data['category']->slug,'date','last_month'])); ?>">In the Last month <span> (<?php echo e(@$Last_month); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_week']) : route('tagCatItem',[@$data['category']->slug,'date','last_week'])); ?>">In the Last week <span> (<?php echo e(@$Last_week); ?>)</span></a></li>
                                                        <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'date','last_day']) : route('tagCatItem',[@$data['category']->slug,'date','last_day'])); ?>">In the Last day <span> (<?php echo e(@$Last_day); ?>)</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:;"><?php echo app('translator')->get('lang.software_version'); ?></a>
                                        <div class="catagori-submenu-area">
                                            <div class="catagori-submenu-inner">
                                                <span href="javascript:;" class="submenu-close"> <i class="ti-close"></i> </span>
                                                <div class="catagori-content">
                                                    <ul>
                                                        <?php $__currentLoopData = $data['item']->unique('software_version'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        if (@$data['sub_cat']) {
                                                           $software_version =App\ManageQuery::ItemSubCatWithSoftwareVersion($data['sub_cat']->id,$item->software_version);
                                                            // DB::table('items')->where('sub_category_id',@$data['sub_cat']->id)->where('software_version',@$item->software_version)->get()->count(); 
                                                          }else {
                                                              $software_version =App\ManageQuery::ItemCatWithSoftwareVersion($data['category']->id,$item->software_version);
                                                            //    DB::table('items')->where('category_id',@$data['category']->id)->where('software_version',@$item->software_version)->get()->count(); 
                                                          }
                                                        ?>
                                                         <?php if(@$item): ?> 
                                                         <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'software_version',strtolower(str_replace(' ', '_',@$item->_software_version->name))]) : route('tagCatItem',[@$data['category']->slug,'software_version',strtolower(str_replace(' ', '_',@$item->_software_version->name))])); ?>"><?php echo e(@$item->_software_version->name); ?><span> (<?php echo e(@$software_version); ?>)</span></a></li>
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
                                                        if (@$data['sub_cat']) {
                                                           $compatible_with = App\ManageQuery::ItemSubCatWithCompatibleWith($data['sub_cat']->id,$item->compatible_with);
                                                        //    DB::table('items')->where('sub_category_id',@$data['sub_cat']->id)->where('compatible_with',@$item->compatible_with)->get()->count(); 
                                                          }else {
                                                              $compatible_with =App\ManageQuery::ItemCatWithCompatibleWith($data['category']->id,$item->compatible_with);
                                                            //    DB::table('items')->where('category_id',@$data['category']->id)->where('compatible_with',@$item->compatible_with)->get()->count(); 
                                                          }
                                                        ?>
                                                          <li><a href="<?php echo e(@$data['sub_cat']? route('tagSubItem',[@$data['category']->slug,@$data['sub_cat']->slug,'compatible_with',strtolower(str_replace(' ', '_',@$item->_compatible_with->name))]) : route('tagCatItem',[@$data['category']->slug,'compatible_with',strtolower(str_replace(' ', '_',@$item->_compatible_with->name))])); ?>"><?php echo e(@$item->_compatible_with->name); ?><span> (<?php echo e(@$compatible_with); ?>)</span></a></li>
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
    <div class="latest-goods-area gray-bg section-padding1 mt-40">
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
                    <font> <button class="active"><?php echo e(str_replace('_',' ',@ucfirst(trans($data['tag'])))); ?></button></font>
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
                        <h3><?php echo e($homepage->product_title); ?></h3>
                        <p><?php echo e($homepage->product_title_description); ?></p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="portfolio-menu portfolio-menu2 text-xl-right text-lg-left text-sm-center">
                            <button class="active" value="all" id="all" data-filter="*"><?php echo app('translator')->get('lang.all_items'); ?></button>
                            <button data-filter=".cat1" value="bestsell" id="bestsell"><?php echo app('translator')->get('lang.best_sellers'); ?></button>
                            <button data-filter=".cat2" value="newest" id="newest"><?php echo app('translator')->get('lang.Newest'); ?></button>
                            <button data-filter=".cat3" value="bestrated" id="bestrated"><?php echo app('translator')->get('lang.best_rated'); ?></button>
                            <button data-filter=".cat4" value="trending" id="trending"><?php echo app('translator')->get('lang.Trending'); ?></button>
                            <button data-filter=".cat5" value="high" id="high"><?php echo app('translator')->get('lang.price_high_to_low'); ?></button>
                            <button data-filter=".cat6" value="low" id="low"><?php echo app('translator')->get('lang.price_low_to_high'); ?></button>
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
<script src="<?php echo e(asset('public/frontend/js/')); ?>/tag.js"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/tag.blade.php ENDPATH**/ ?>