 <!-- footer-start -->
 <footer>
    <?php
        $logo_conditions = ['title'=>'Logo', 'active_status'=>1];
        $logopic = dashboard_background($logo_conditions);
    ?>
    <div class="footer-area footer-bg">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="row">
                            <div class="col-xl-4 col-md-3">
                                <div class="footer-widget">
                                    <div class="footer-logo"> 
                                       <a href="<?php echo e(url('/')); ?>">
                                            <img src="<?php echo e(@$logopic ? asset($logopic->image) : asset('public/frontend/img/Logo.png')); ?>" alt="" class="mw">
                                        </a>
                                    </div>
                                    <div class="community-area">
                                            <?php
                                            $getData=App\ManageQuery::FooterSellCount();
                                                @$ItemEarning=$getData['ItemEarning'];
                                            ?>
                                        <div class="total-community">
                                            <?php
                                                $system_settings=app('infix_general_settings');
                                            ?>
                                            <h3> <?php echo e(@$system_settings->currency_symbol); ?> <?php echo e(isset($ItemEarning) ? round($ItemEarning) : 0); ?></h3>
                                            <p><?php echo app('translator')->get('lang.total_community_earnings'); ?></p>
                                        </div>
                                        <div class="total-community second">
                                            <?php
                                                @$ItemSale=$getData['ItemSale'];

                                            ?>
                                            <h3><?php echo e(@$ItemSale); ?></h3>
                                            <p><?php echo app('translator')->get('lang.total_items_sold'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $custom_link=InfixFooterMenu();
                            ?>
                            <?php if($custom_link!=''): ?>
                                
                            
                            <div class="col-xl-2 col-md-3">
                                <div class="footer-widget">
                                    <div class="footer-title">
                                    <h3><?php echo e($custom_link->title1); ?></h3>
                                    </div>
                                    <div class="footer-list">
                                        <nav>
                                            <ul>
                                                <?php if($custom_link->link_href1!=''): ?>
                                                  <li><a href="<?php echo e(url($custom_link->link_href1)); ?>"><?php echo e($custom_link->link_label1); ?> </a></li>
                                                  
                                                <?php endif; ?>
                                                <?php if($custom_link->link_href5!=''): ?>
                                                <li><a href="<?php echo e(url($custom_link->link_href5)); ?>"><?php echo e($custom_link->link_label5); ?></a></li>
                                                <?php endif; ?>
                                                <?php if($custom_link->link_href9!=''): ?>
                                                    <li><a href="<?php echo e(url($custom_link->link_href9)); ?>"><?php echo e($custom_link->link_label9); ?></a></li>
                                                
                                                <?php endif; ?>
                                                <?php if($custom_link->link_href13!=''): ?>
                                                      <li><a href="<?php echo e(url($custom_link->link_href13)); ?>"><?php echo e($custom_link->link_label13); ?> </a></li>
                                                    <?php endif; ?>
                                                
                                                <?php if(!@Auth::check()): ?>                                                    
                                                  <li><a href="<?php echo e(url('register')); ?>"><?php echo app('translator')->get('lang.start_selling'); ?></a></li>
                                                <?php endif; ?>
                                                
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 offset-xl-1 col-md-3">
                                <div class="footer-widget">
                                    <div class="footer-title">
                                        <h3><?php echo e($custom_link->title2); ?></h3>
                                    </div>
                                    <div class="footer-list">
                                        <nav>
                                            <ul>
                                                    <?php if($custom_link->link_href2!=''): ?>
                                                    <li><a href="<?php echo e($custom_link->link_href2); ?>"><?php echo e($custom_link->link_label2); ?></a></li>
                                                
                                                <?php endif; ?>
                                                <?php if($custom_link->link_href6!=''): ?>
                                                <li><a href="<?php echo e(url($custom_link->link_href6)); ?>"><?php echo e($custom_link->link_label6); ?></a></li>
                                      
                                                <?php endif; ?>
                                                <?php if($custom_link->link_href10!=''): ?>
                                                <li><a href="<?php echo e($custom_link->link_href10); ?>"><?php echo e($custom_link->link_label10); ?></a></li>
                                      
                                                <?php endif; ?>
                                                <?php if($custom_link->link_href14!=''): ?>
                                                <li><a href="<?php echo e($custom_link->link_href14); ?>"><?php echo e($custom_link->link_label14); ?></a></li>
                                           
                                               <?php endif; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 offset-xl-1 col-md-3">
                                <div class="footer-widget">
                                    <div class="footer-title">
                                        <h3><?php echo e($custom_link->title3); ?></h3>
                                    </div>
                                    <div class="footer-list">
                                        <nav>
                                            <ul>
                                             <?php if($custom_link->link_href3!=''): ?>
                                                    <li><a href="<?php echo e($custom_link->link_href3); ?>"><?php echo e($custom_link->link_label3); ?></a></li>
                                               <?php endif; ?>
                                                    <?php if($custom_link->link_href7!=''): ?>
                                                        <li><a href="<?php echo e($custom_link->link_href7); ?>"><?php echo e($custom_link->link_label7); ?></a></li>
                                                    <?php endif; ?>
                                                    <?php if($custom_link->link_href11!=''): ?>
                                                        <li><a href="<?php echo e($custom_link->link_href11); ?>"><?php echo e($custom_link->link_label11); ?></a></li>
                                                    <?php endif; ?>
                                                    <?php if($custom_link->link_href15!=''): ?>
                                                        <li><a href="<?php echo e($custom_link->link_href15); ?>"><?php echo e($custom_link->link_label15); ?></a></li>
                                                    <?php endif; ?>
                                                
                                                <?php if(@Auth::user()->role_id == 4 || @Auth::user()->role_id == 5): ?>   
                                                   <li><a href="<?php echo e(route('user.refundRequest')); ?>"><?php echo app('translator')->get('lang.Refund'); ?></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="line-border mb-50"></div>
                        <div class="row ">
                            <div class="col-xl-7 col-md-12 col-lg-7">
                                <div class="footer-bottom">
                                    <div class="footer-link">
                                        <nav>
                                            <ul>
                                                <?php
                                                    $menus = FooterMenu();
                                                ?>
                                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                <a href="<?php echo e($menu->menu_url); ?>"><?php echo e($menu->menu_title); ?></a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </nav>
                                    </div>
                                     <?php
                                         $footer_link=InfixFooterSetting();
                                    ?>
                                    <p class="copy-right-text"><?php echo e(@$footer_link->copyright_text); ?>. </p>
                                   
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-12 col-lg-5">
                                <div class="social-links">
                                    <nav>
                                        <ul>
                                            <?php echo getSocialIconsDynamic(); ?> 
                                        </ul> 
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end --><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>