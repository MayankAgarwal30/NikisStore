<?php 
$homepage = Modules\Pages\Entities\InfixHomePage::where('active_status', 1)->first();
?> 

<div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="banner-info text-center">
                        <h2><?php echo e(@$homepage->homepage_title); ?></h2>
                        
                        <h4><?php echo e(@$homepage->homepage_description); ?></h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                            <div class="search-field">
                                <div class="search-field-inner">
                                    <form class="search-relative" action="<?php echo e(route('_by_search')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" placeholder="<?php echo app('translator')->get('lang.search_your_product'); ?>" onkeyup="SearchItem(this.value)" name="key">  
                                        <button type="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="list-group" id="livesearch"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/partials/banner.blade.php ENDPATH**/ ?>