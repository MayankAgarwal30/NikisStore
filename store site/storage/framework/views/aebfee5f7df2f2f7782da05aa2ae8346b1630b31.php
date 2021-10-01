
<input type="hidden" name="url" id="url" value="<?php echo e(url('/')); ?>">

<nav id="sidebar">
    <div class="sidebar-header update_sidebar">
        <a href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset(@BackgroundSetting()[0]->image)); ?>" alt="">
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>

     <?php
                $check_permission=  App\AssignModulePermission::where('permission',1)->where('role_id',Auth::user()->role_id)->get();
                $permitted_modules=[];
                foreach ($check_permission as $key => $value) {
                   $permitted_modules[]=$value->module_id;
                }
               
    ?>


    <ul class="list-unstyled components">

            <?php if(Auth::user()->role_id == 1 || in_array(1, $permitted_modules)): ?>
                <li>
                    <a href="<?php echo e(url('/admin/dashboard')); ?>" id="admin-dashboard">

                        <span class="flaticon-speedometer"></span>
                        <?php echo app('translator')->get('lang.dashboard'); ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
            <li>
                <a href="#subMenuUser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.management'); ?>
                </a>
                <ul class="collapse list-unstyled" id="subMenuUser">
                    <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.department')); ?>" class="action-url"><?php echo app('translator')->get('lang.department'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.user_list')); ?>" class="action-url"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>

                    <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.vendor')); ?>" class="action-url"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.customer')); ?>" class="action-url"><?php echo app('translator')->get('lang.customer'); ?> <?php echo app('translator')->get('lang.list'); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.agent')); ?>" class="action-url"><?php echo app('translator')->get('lang.agent'); ?> <?php echo app('translator')->get('lang.list'); ?> </a>
                    </li>
                    <?php endif; ?>

                    <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.userLog')); ?>" class="action-url"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.log'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(2, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.registrationBonus')); ?>" class="action-url"><?php echo app('translator')->get('lang.registration'); ?> <?php echo app('translator')->get('lang.bonus'); ?></a>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>

            <?php endif; ?>

            <?php if(Auth::user()->role_id == 1 || in_array(3, $permitted_modules)): ?>
            <li>
                <a href="#subMenuFund" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.offline_payment'); ?>
                </a>
                <ul class="collapse list-unstyled" id="subMenuFund">
                    <?php if(Auth::user()->role_id == 1 || in_array(3, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.addFund')); ?>"><?php echo app('translator')->get('lang.add_fund'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(3, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.fundList')); ?>"><?php echo app('translator')->get('lang.fund_list'); ?> </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>

            <?php endif; ?>

            <?php if(Auth::user()->role_id == 1 || in_array(4, $permitted_modules)): ?>
            <li>
                <a href="#bankPayment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.bank_payment'); ?>
                </a>
                <ul class="collapse list-unstyled" id="bankPayment">
                    <?php if(Auth::user()->role_id == 1 || in_array(4, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.depositRequest')); ?>"><?php echo app('translator')->get('lang.bank_deposit_request'); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(4, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.depositApproved')); ?>"><?php echo app('translator')->get('lang.approved_request'); ?> </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>

            <?php endif; ?>
            
            
            <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
            <li>
                <a href="#subMenuItem" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.product'); ?>
                </a>
                <ul class="collapse list-unstyled" id="subMenuItem">
                    <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.adCategory')); ?>"><?php echo app('translator')->get('lang.category'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.subCategory')); ?>"> <?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.category'); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.attributes')); ?>"><?php echo app('translator')->get('lang.attributes'); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.subattributes')); ?>"><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.attributes'); ?> </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(Auth::user()->role_id == 1 || in_array(6, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.item_preview')); ?>"><?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>

                    <?php endif; ?>
                    
                    <?php if(Auth::user()->role_id == 1 || in_array(7, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.content_pending')); ?>"><?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.pending'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.content')); ?>"><?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.deactive_product')); ?>"><?php echo app('translator')->get('lang.deactive'); ?> <?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(5, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.free_product')); ?>"><?php echo app('translator')->get('lang.free'); ?> <?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>


                    

                    
                </ul>
            </li>

            <?php endif; ?>
            
            <?php if(Auth::user()->role_id == 1 || in_array(8, $permitted_modules)): ?>
            <li>
                <a href="#ItemOrder" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.product'); ?> <?php echo app('translator')->get('lang.order'); ?>
                </a>
                <ul class="collapse list-unstyled" id="ItemOrder">
                    <?php if(Auth::user()->role_id == 1 || in_array(8, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.item_order')); ?>"><?php echo app('translator')->get('lang.order'); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>

            <?php endif; ?>
            
            <?php if(Auth::user()->role_id == 1 || in_array(9, $permitted_modules)): ?>
            <li>
                <a href="#RefundItem" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.refund'); ?> <?php echo app('translator')->get('lang.order'); ?>
                </a>
                <ul class="collapse list-unstyled" id="RefundItem">
                    <?php if(Module::has('Refund')): ?>
                        <li> <a href="<?php echo e(route('admin.refund_list')); ?>"><?php echo app('translator')->get('lang.refund'); ?> <?php echo app('translator')->get('lang.type'); ?></a> </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(9, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.refund_order')); ?>"><?php echo app('translator')->get('lang.request'); ?> <?php echo app('translator')->get('lang.refund'); ?> <?php echo app('translator')->get('lang.order'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(9, $permitted_modules)): ?>
                    <li>
                      <a href="<?php echo e(route('admin.approved_refund_order')); ?>"><?php echo app('translator')->get('lang.refund'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            
            <?php endif; ?>
             
            
            <?php if(Auth::user()->role_id == 1 || in_array(10, $permitted_modules)): ?>
            <li>
                <a href="#ItemFee" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.buyer'); ?> <?php echo app('translator')->get('lang.fee'); ?>
                </a>
                <ul class="collapse list-unstyled" id="ItemFee">
                    <?php if(Auth::user()->role_id == 1 || in_array(10, $permitted_modules)): ?>
                    <li>
                       <a href="<?php echo e(route('admin.item_fee')); ?>"><?php echo app('translator')->get('lang.buyer'); ?> <?php echo app('translator')->get('lang.fee'); ?></a>
                    </li>
                    <?php endif; ?>
                    
                    
                   
                   
                </ul>
            </li>

            <?php endif; ?>
            
            <?php if(Auth::user()->role_id == 1 || in_array(11, $permitted_modules)): ?>
            <li>
                <a href="#package" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-slumber"></span>
                    <?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.level'); ?>
                </a>
                <ul class="collapse list-unstyled" id="package">
                    <?php if(Auth::user()->role_id == 1 || in_array(11, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.label')); ?>"><?php echo app('translator')->get('lang.level'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->role_id == 1 || in_array(11, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.badge')); ?>"><?php echo app('translator')->get('lang.badge'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                    </li>
                    <?php endif; ?>
                    
                   
                    <?php if(Auth::user()->role_id == 1 || in_array(11, $permitted_modules)): ?>
                    <li>
                        <a href="<?php echo e(route('admin.review_type')); ?>"><?php echo app('translator')->get('lang.review'); ?> <?php echo app('translator')->get('lang.type'); ?></a>
                    </li>
                    <?php endif; ?>
                    
                    
                </ul>
            </li>

            <?php endif; ?>
            
            
            <?php if(Auth::user()->role_id == 1 || in_array(12, $permitted_modules)): ?>
            <li>
                <a href="#coupon" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-slumber"></span>
                    <?php echo app('translator')->get('lang.coupon'); ?>
                </a>
                <ul class="collapse list-unstyled" id="coupon">
                    <?php if(Auth::user()->role_id == 1 || in_array(12, $permitted_modules)): ?>
                        <li>
                            <a href="<?php echo e(route('admin.coupon-list')); ?>"><?php echo app('translator')->get('lang.admin'); ?> <?php echo app('translator')->get('lang.coupon'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.coupon')); ?>"><?php echo app('translator')->get('lang.coupon'); ?>  <?php echo app('translator')->get('lang.plan'); ?></a>
                        </li>
                       
                    <?php endif; ?>
                    
                </ul>
            </li>

            <?php endif; ?>
            

            
            
            
            <?php if(Auth::user()->role_id == 1 || in_array(13, $permitted_modules)): ?>
            <?php if(Module::has('KnowledgeBase')): ?>
                <li>
                <a href="#k" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.KnowledgeBase'); ?>
                </a>
                <ul class="collapse list-unstyled" id="k">
                    <li>
                      <a href="<?php echo e(route('KnowledgeBaseCategoryList')); ?>"><?php echo app('translator')->get('lang.category'); ?></a>
                    </li>                 
                    <li>
                        <a href="<?php echo e(route('categoryQuestion')); ?>"><?php echo app('translator')->get('lang.question'); ?></a>
                    </li>                   
                    <li>
                        <a href="<?php echo e(route('questionList')); ?>"><?php echo app('translator')->get('lang.sub'); ?> <?php echo app('translator')->get('lang.question'); ?> <?php echo app('translator')->get('lang.&'); ?> <?php echo app('translator')->get('lang.answer'); ?></a>
                    </li>                   
                </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            
            
            <?php if(Auth::user()->role_id == 1 ||in_array(14, $permitted_modules)): ?>
            <?php if(Module::has('Tax')): ?>
                <li>
                    <a href="#Tax" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-analytics"></span>
                        
                        <?php echo app('translator')->get('lang.tax'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="Tax">
                        <li> <a href="<?php echo e(route('admin.tax_list')); ?>"><?php echo app('translator')->get('lang.tax'); ?> <?php echo app('translator')->get('lang.list'); ?></a> </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php endif; ?>

            
            
            <?php if(Auth::user()->role_id == 1 || in_array(15, $permitted_modules)): ?>
                <li>
                    <a href="#payment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-analytics"></span>
                        <?php echo app('translator')->get('lang.payment'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="payment">
                        <li> <a href="<?php echo e(route('admin.CreditCard')); ?>"><?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.credit'); ?> <?php echo app('translator')->get('lang.card'); ?></a> </li>
                        <li> <a href="<?php echo e(route('admin.paymentMethod')); ?>"><?php echo app('translator')->get('lang.author_balance'); ?></a> </li>
                        <li> <a href="<?php echo e(route('admin.payableUser')); ?>"><?php echo app('translator')->get('lang.payment'); ?> <?php echo app('translator')->get('lang.author'); ?></a> </li>

                    </ul>
                </li> 
            <?php endif; ?>
            
            <?php if(Auth::user()->role_id == 1 ||in_array(16, $permitted_modules)): ?>
                <li>
                    <a href="#Promotional" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-analytics"></span>
                        <?php echo app('translator')->get('lang.promotional'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="Promotional">
                        <li>
                            <a href="<?php echo e(route('admin.sendEmailSmsView')); ?>"><?php echo app('translator')->get('lang.send_email'); ?></a>
                        </li>
                    </ul>
                </li> 
            <?php endif; ?>

         
            
            <?php if(Auth::user()->role_id == 1 || in_array(17, $permitted_modules)): ?>
                <li>
                    <a href="#recaptcha" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-analytics"></span>
                        <?php echo app('translator')->get('lang.re_captcha'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="recaptcha">
                        <li> <a href="<?php echo e(route('admin.reCaptcha')); ?>"><?php echo app('translator')->get('lang.re_captcha'); ?> <?php echo app('translator')->get('lang.setting'); ?></a> </li>
                    </ul>
                </li>
            <?php endif; ?>
            
            <?php if(Auth::user()->role_id == 1 ||in_array(18, $permitted_modules)): ?>
        <?php if(Module::has('Ticket')): ?>
                <li>
                <a href="#t" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.ticket'); ?>
                </a>
                <ul class="collapse list-unstyled" id="t">
                    <li>
                      <a href="<?php echo e(route('titcketStatus')); ?>"><?php echo app('translator')->get('lang.ticket'); ?> <?php echo app('translator')->get('lang.status'); ?></a>
                    </li>                 
                    <li>
                      <a href="<?php echo e(route('infixTicketcategory')); ?>"><?php echo app('translator')->get('lang.category'); ?></a>
                    </li>                 
                    <li>
                        <a href="<?php echo e(route('infixTicketPriority')); ?>"><?php echo app('translator')->get('lang.priority'); ?></a>
                    </li>                   
                    <li>
                        <a href="<?php echo e(route('infixTicket_list')); ?>"><?php echo app('translator')->get('lang.ticket'); ?></a>
                    </li>                   
                </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>

            
            <?php if(Auth::user()->role_id == 1 || in_array(19, $permitted_modules)): ?>
            <li>
                <a href="#revenue" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.reports'); ?>
                </a>
                <ul class="collapse list-unstyled" id="revenue">
                    <li> <a href="<?php echo e(route('admin.revenue')); ?>"><?php echo app('translator')->get('lang.admin'); ?> <?php echo app('translator')->get('lang.revenue'); ?></a> </li>
                    <li> <a href="<?php echo e(route('admin.authorRevenue')); ?>"><?php echo app('translator')->get('lang.author'); ?> <?php echo app('translator')->get('lang.revenue'); ?></a> </li>
                </ul>
            </li>
            <?php endif; ?>
            
            <?php if(Auth::user()->role_id == 1 || in_array(20, $permitted_modules)): ?>
            <?php if(Module::has('Systemsetting')): ?>
            <li>
                <a href="#SystemSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.system_settings'); ?>
                    
                </a>
                <ul class="collapse list-unstyled" id="SystemSettings">
                    <li> <a href="<?php echo e(route('general_setting')); ?>"><?php echo app('translator')->get('lang.general_settings'); ?> </a> </li>
                    <li> <a href="<?php echo e(route('manage-adons')); ?>"><?php echo app('translator')->get('lang.module_manage'); ?> </a> </li>
                    

                    <li> <a href="<?php echo e(route('email-setting')); ?>"><?php echo app('translator')->get('lang.email_settings'); ?> </a> </li>
                    <li> <a href="<?php echo e(route('role-permission')); ?>"><?php echo app('translator')->get('lang.role_permission'); ?> </a> </li>
                    
                    <li> <a href="<?php echo e(route('payment-method-setting')); ?>"><?php echo app('translator')->get('lang.payment_method_settings'); ?></a> </li>
                    <li> <a href="<?php echo e(route('language-setting')); ?>"><?php echo app('translator')->get('lang.language_settings'); ?> </a> </li>
                    <li> <a href="<?php echo e(route('seo-setting')); ?>"><?php echo app('translator')->get('lang.SEO_settings'); ?> </a> </li>
                    
                    
                    
                    <li> <a href="<?php echo e(route('theme-setting')); ?>"><?php echo app('translator')->get('lang.dashboard_themes'); ?></a> </li>
                    <li> <a href="<?php echo e(route('backup-settings')); ?>"><?php echo app('translator')->get('lang.backup'); ?></a> </li>
                    <li> <a href="<?php echo e(route('googleAnalytics')); ?>"><?php echo app('translator')->get('lang.third_party_API'); ?></a> </li>
                    <li> <a href="<?php echo e(route('aboutSystem')); ?>"><?php echo app('translator')->get('lang.about'); ?> & <?php echo app('translator')->get('lang.update'); ?></a> </li>

                </ul>
            </li>
        <?php endif; ?>
        <?php endif; ?>
        
            <?php if(Auth::user()->role_id == 1 || in_array(21, $permitted_modules)): ?>
           <?php if(Module::has('Pages')): ?>
                <li>
                    <a href="#Pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-analytics"></span>
                        
                        <?php echo app('translator')->get('lang.frontend_CMS'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="Pages">
                        <li> <a href="<?php echo e(route('HomePage')); ?>"><?php echo app('translator')->get('lang.home_page'); ?></a> </li>
                        <li> <a href="<?php echo e(route('ProfileSetting')); ?>"><?php echo app('translator')->get('lang.profile_setting'); ?></a> </li>
                        <li> <a href="<?php echo e(route('couponText')); ?>"><?php echo app('translator')->get('lang.coupon'); ?></a> </li>
                        <li> <a href="<?php echo e(route('LicensePage')); ?>"><?php echo app('translator')->get('lang.License'); ?></a> </li>
                        <li> <a href="<?php echo e(route('TicketPage')); ?>"><?php echo app('translator')->get('lang.ticket'); ?></a> </li>
                        <li> <a href="<?php echo e(route('privacy-policy')); ?>"><?php echo app('translator')->get('lang.privacy_policy'); ?></a> </li>
                        <li> <a href="<?php echo e(route('terms-conditions')); ?>"><?php echo app('translator')->get('lang.terms_conditions'); ?> </a> </li>
                        <li> <a href="<?php echo e(route('market-apis')); ?>"><?php echo app('translator')->get('lang.market_apis'); ?> </a> </li>
                        <li> <a href="<?php echo e(route('item-support')); ?>"><?php echo app('translator')->get('lang.item_support'); ?></a> </li>
                        <li> <a href="<?php echo e(route('become-author')); ?>"><?php echo app('translator')->get('lang.become_author'); ?></a> </li>
                        <li> <a href="<?php echo e(route('about-company')); ?>"><?php echo app('translator')->get('lang.about_company'); ?></a> </li>
                        <li> <a href="<?php echo e(route('faqs')); ?>"><?php echo app('translator')->get('lang.faq'); ?></a> </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php endif; ?>
            
        <?php if(Auth::user()->role_id == 1 || in_array(22, $permitted_modules)): ?>
            <li>
                <a href="#frontSetting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analytics"></span>
                    <?php echo app('translator')->get('lang.front_settings'); ?>
                </a>
                <ul class="collapse list-unstyled" id="frontSetting">
                    <li> <a href="<?php echo e(route('site-image-setting')); ?>"><?php echo app('translator')->get('lang.site_image_settings'); ?> </a> </li>
                    
                    
                    <li> <a href="<?php echo e(url('footer-menu')); ?>"><?php echo app('translator')->get('lang.footer_menu'); ?></a> </li>
                    
                    <li> <a href="<?php echo e(route('FooterCustomLink')); ?>"><?php echo app('translator')->get('lang.footer_custom_link'); ?></a> </li>
                </ul>
            </li>

        <?php endif; ?>

                
                        






    </ul>
</nav>
<?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/partials/sidebar.blade.php ENDPATH**/ ?>