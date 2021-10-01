
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/item.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/single_item.css">
<?php $__env->stopPush(); ?>
<?php
$infix_general_settings = GeneralSetting();
?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.partials.itemHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- details-tablist-start -->
<?php
use Carbon\Carbon;
$dt     = Carbon::now();
$img = explode(",",@$data['item']->item_image->image);
if (Str::contains($_SERVER['REQUEST_URI'], 'mail-sent')) {
$overview='';
$overview_content='';
$support='active';
$support_content='active show';
$comment='';
$comment_content='';
} else if(Str::contains($_SERVER['REQUEST_URI'], 'comment')) {
$overview='';
$overview_content='';
$support='';
$support_content='';
$comment='active';
$comment_content='active show';
}else{
$overview='active';
$overview_content='active show';
$support='';
$support_content='';
$comment='';
$comment_content='';
}
?>
<div class="details-tablist-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-10 offset-xl-1">
            <div class="details-tablist">
               <nav>
                  <ul class="nav" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link <?php echo e($overview); ?>" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true"><?php echo app('translator')->get('lang.overview'); ?></a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link <?php echo e($comment); ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false"><?php echo app('translator')->get('lang.comments'); ?></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.reviews'); ?></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?php echo e($support); ?>" id="Support-tab" data-toggle="tab" href="#Support" role="tab"
                           aria-controls="contact" aria-selected="false"><?php echo app('translator')->get('lang.Support'); ?></a>
                     </li>
                     <?php if(Auth::user()): ?>
                     <?php if( @$data['item']->user->id == Auth::id() || @Auth::user()->role_id == 1 || @$item->feedback_user->id == Auth::id()): ?>                                           
                     
                     <?php endif; ?>
                     <?php endif; ?>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
   .over_view_thumb{
      background-image: url(<?php echo e(file_exists(@$data['item']->thumbnail) ? asset(@$data['item']->thumbnail) : asset('public/uploads/product/thumbnail/thumbnail-demo.png')); ?> );
   }
</style>
<!-- details-tablist-end -->
<!-- main-details-area-start -->
<div class="main-details-area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-xl-10 offset-xl-1 col-lg-12">
            <div class="row">
               <div class="col-xl-8 col-lg-7">
                  <div class="main-tab-content">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade <?php echo e($overview_content); ?>" id="home" role="tabpanel"
                           aria-labelledby="home-tab">
                           <div class="overview">
                              <div class="over_view_thumb">
                                 
                                 <div class="overlay_with_btn">
                                    <div class="overlay_inner">
                                       <a class="boxed-btn" target="_blank" href="<?php echo e(@$data['item']->demo_url); ?>"><?php echo app('translator')->get('lang.live_review'); ?></a>
                                       <button class="boxed-btn-white"  onclick="ImgShow()"><?php echo app('translator')->get('lang.screenshoot'); ?></button>
                                       <?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($key != 0): ?>
                                       <a class="popup-image hit" href="<?php echo e(asset(@$item)); ?>"></a>
                                       <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </div>
                                 </div>
                              </div>
                              <div class="over_view_info">
                                 
                                 <p><?php echo @$data['item']->description; ?></p>
                              </div>
                              
                              
                           </div>
                        </div>
                        <div class="tab-pane fade <?php echo e($comment_content); ?>" id="profile" role="tabpanel"
                           aria-labelledby="profile-tab">
                           <div class="comments_wrap">
                              <?php if(session()->has('success')): ?>
                              <div class="alert alert-success">
                                 <?php echo e(session()->get('success')); ?>

                              </div>
                              <?php endif; ?>
                              
                              <?php if(isset($data['item']->comments)): ?>
                                <?php if( $data['item']->comments->count()==0): ?>
                                    <h3><?php echo app('translator')->get('lang.there_are_no_comments_for_this_item_yet'); ?>.</h3>
                                <?php else: ?>
                                    <?php $__currentLoopData = $data['item']->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single_comment  d-flex justify-content-between gray-bg">
                                            <div
                                                class="comment_author d-flex align-items-center justify-content-center">
                                                <div class="comments_thumb">
                                                <img src="<?php echo e(@$item->user->profile->image? asset(@$item->user->profile->image): asset('public/uploads/img/theme-details/comments/1.png')); ?>" alt="" width="80" height="auto">
                                                </div>
                                                <div class="author_name">
                                                <h4> <?php echo e(@$item->user->username); ?> <?php echo GetPurchaseStatus(@$item->user->id,$data['item']->id ); ?>

                                                 </h4>
                                                <p><?php echo e(@$item->body); ?></p>
                                                </div>
                                            </div>
                                            <div class="date_ago">
                                                <?php echo e(DateFormat(@$item->created_at)); ?>

                                            </div>
                                        </div>
                                        <?php if(@$item->replies): ?>
                                                <?php $__currentLoopData = $item->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="single_comment  d-flex justify-content-between gray-bg ml-40">
                                                    <div
                                                        class="comment_author d-flex align-items-center justify-content-center">
                                                        <div class="comments_thumb">
                                                        <img src="<?php echo e(@$val->user->profile->image? asset(@$val->user->profile->image): asset('public/uploads/img/theme-details/comments/1.png')); ?>" alt=""  width="80" height="auto">
                                                        </div>
                                                        <div class="author_name">
                                                        <h4><a href="<?php echo e(route('user.portfolio',@$val->user->username)); ?>"><?php echo e(@$val->user->username); ?></a> <span class="author-tag"><?php echo app('translator')->get('lang.author'); ?></span></h4> 
                                                        <p><?php echo e(@$val->body); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="date_ago">
                                                        <?php echo e(DateFormat(@$val->created_at)); ?>

                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if(@Auth::user()->role_id  == 4 && @$data['item']->user_id == @Auth::user()->id): ?>
                                        <div class="single_comment  gray-bg ml-40">
                                            <div class="comment_author d-flex">
                                                <div class="comments_thumb">
                                                <img src="<?php echo e(@Auth::user()->profile->image? asset(Auth::user()->profile->image): asset('public/uploads/img/theme-details/comments/1.png')); ?>" alt="" width="80" height="auto">
                                                </div>
                                                <div class="replay_boxs">
                                                <form action="<?php echo e(route('user.reply')); ?>" method="POST" id="ReplyID">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" hidden name="item_id" value="<?php echo e(@$data['item']->id); ?>">
                                                    <input type="text" hidden name="user_id" value="<?php echo e(@$data['item']->user_id); ?>">
                                                    <input type="text" hidden name="parent_id" value="<?php echo e(@$item->id); ?>">
                                                    <textarea name="body" id="body" cols="30" rows="10"></textarea>
                                                    <button class="boxed-btn mt-10" type="submit"><?php echo app('translator')->get('lang.Replay'); ?></button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                              <?php endif; ?>
                              <div class="comments_form">
                                 <p><?php echo app('translator')->get('lang.Leave_a_comment'); ?></p>
                                 <form action="<?php echo e(route('user.comment')); ?>" method="POST" id="commentID">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" hidden name="item_id" value="<?php echo e(@$data['item']->id); ?>">
                                    <textarea name="body" id="body" cols="30" rows="10"></textarea>
                                    <button class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.Post'); ?> <?php echo app('translator')->get('lang.comment'); ?></button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        
                        <div class="tab-pane fade" id="contact" role="tabpanel"
                           aria-labelledby="contact-tab">

                           <?php if(@$data['item']->reviews): ?>   
                           
                        <?php if(@$data['item']->reviews->count() != 0): ?>
                            <?php $__currentLoopData = $data['review']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                              
                           <div class="review_area">
                              <div class="review_header d-flex justify-content-between">
                                 <div class="review_author d-flex align-items-center">
                                    <div class="review_thumb">
                                       <img src="<?php echo e(@$review->user->profile->image? asset(@$review->user->profile->image): asset('public/uploads/img/theme-details/comments/1.png')); ?>" alt="" width="80" height="auto">
                                    </div>
                                    <div class="author_name">
                                       <h4><?php echo e(@$review->user->username); ?></h4>
                                       <p><?php echo e(DateFormat(@$review->created_at)); ?></p>
                                    </div>
                                 </div>
                                 <div class="review_rating">
                                    <h4><?php echo e(@$review->reviewType->name); ?> (<?php echo e(@$review->rating); ?>)</h4>
                                    <?php if(@$review->rating == .5): ?>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 1): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 1.5): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 2): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 2.5): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 3): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 3.5): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 4): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php elseif(@$review->rating == 4.5): ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <?php elseif(@$review->rating == 5): ?>
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
                        <?php else: ?>
                            <h3><?php echo app('translator')->get('lang.no_review_available'); ?></h3>
                        <?php endif; ?>

                           <?php endif; ?>
                        </div>
                        
                        <div class="tab-pane fade <?php echo e($support_content); ?>" id="Support" role="tabpanel"
                           aria-labelledby="Support-tab">
                           <?php if(session()->has('success')): ?>
                           <div class="alert alert-success">
                              <?php echo e(session()->get('success')); ?>

                           </div>
                           <?php endif; ?>
                           <div class="support_info_area">
                              <div
                                 class="support_info d-flex justify-content-between align-items-center gray-bg">
                                 <div class="support_info_inner d-flex align-items-center">
                                    <div class="logo-img">
                                       <img src="<?php echo e(@$data['item']->user->profile->image? asset(@$data['item']->user->profile->image): asset('public/uploads/img/theme-details/comments/1.png')); ?>" alt="" width="80" height="auto">
                                    </div>
                                    <div class="support_text">
                                       <h4><?php echo e(@$data['item']->user->username); ?> <?php echo app('translator')->get('lang.Supports_this_item'); ?> </h4>
                                       <p><?php echo app('translator')->get('lang.author_response_time_message'); ?> </p>
                                    </div>
                                 </div>
                                 <?php if(@Auth::check()): ?>                                                                                                                                         
                                    <a href="<?php echo e(url('user.UserSupport')); ?>" class="boxed-btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><?php echo app('translator')->get('lang.go_to_item_Support'); ?></a>
                                 <?php else: ?>
                                    <a href="<?php echo e(url('customer/login')); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.go_to_item_Support'); ?></a>
                                 <?php endif; ?>
                              </div>
                              
                              <div class="support_contact gray-bg">
                                 <div class="support_contact-heading">
                                    <h4><?php echo app('translator')->get('lang.Contact_the_author'); ?></h4>
                                    <p><?php echo app('translator')->get('lang.this_author_will_respond'); ?></p>
                                 </div>
                                 <div class="support_single_contact boder-top-bottom">
                                    <?php
                                    // $item_support=DB::table('item_supports')->first();
                                    ?>
                                    <?php echo $item_support->description; ?>

                                 </div>
                                 <div class="support_single_contact">
                                    <?php echo $item_support->sort_description; ?>

                                 </div>
                                 <div
                                    class="support_view d-flex justify-content-between align-items-center mt-10 d-sm-block">
                                    
                                    <?php if(@Auth::check()): ?>                                                                                                                                         
                                    <a href="<?php echo e(route('user.UserSupport')); ?>" class="boxed-btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><?php echo app('translator')->get('lang.go_to_item_Support'); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(url('customer/login')); ?>" class="boxed-btn"><?php echo app('translator')->get('lang.go_to_item_Support'); ?></a>
                                    <?php endif; ?>
                                 </div>
                                 <?php if(@Auth::check()): ?>    
                                 <div  class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.send_an_email_to_the_author'); ?> </h5>
                                          </div>
                                          <form action="<?php echo e(route('user.UserSupport')); ?>" method="POST" id="Text_support">
                                             <div class="modal-body">
                                                <?php echo csrf_field(); ?>
                                                <div class="_form">
                                                   <span for="recipient-name" class="col-form-label"><?php echo app('translator')->get('lang.from'); ?>:</span>
                                                   <p  class="from_mail" id="recipient-name"><?php echo e(Auth::user()->email); ?></p>
                                                   <p class="email_alert"><?php echo app('translator')->get('lang.your_email address_recipeint'); ?></p>
                                                </div>
                                                <div class="_form text_area" >
                                                   <span for="message-text" class="col-form-label"><?php echo app('translator')->get('lang.message'); ?>:</span>
                                                   <input type="text" hidden value="<?php echo e(@$data['item']->id); ?>" name="item_id">
                                                   <textarea class="" id="message-text" name="message"></textarea>
                                                </div>
                                                <p class="messsege_ward_lemit">
                                                   <?php echo app('translator')->get('lang.all_messege_are_recorded'); ?> <strong>5000</strong>
                                                </p>
                                             </div>
                                             <div class="modal-footer d-flex justify-content-between">
                                                <button type="button" class="boxed-btn-white " data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                <button type="submit" class="boxed-btn"><?php echo app('translator')->get('lang.send'); ?> <?php echo app('translator')->get('lang.message'); ?></button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                        <?php if( @$data['item']->user->id == Auth::id() || @Auth::user()->role_id == 1 || @$item->feedback_user->id == Auth::id()): ?>   
                        <div class="tab-pane fade" id="History" role="tabpanel"
                           aria-labelledby="profile-tab">
                           <div class="comments_wrap">
                              <?php if(@$data['item']->feedback): ?>
                              <?php $__currentLoopData = @$data['item']->feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                              <div class="single_comment  d-flex justify-content-between gray-bg">
                                 <div class="comment_author d-flex align-items-center justify-content-center">
                                    <div class="comments_thumb">
                                       <img src="<?php echo e(@$item->feedback_user->profile->image? asset(@$item->feedback_user->profile->image): asset('public/uploads/img/theme-details/comments/1.png')); ?>" alt="" width="80" height="auto">
                                    </div>
                                    <div class="author_name">
                                       <h4><?php echo e(@$item->subject); ?></h4>
                                       <p><?php echo @$item->feedback; ?></p>
                                       <div class="date_ago"><?php echo e(DateFormat(@$item->created_at)); ?></div>
                                    </div>
                                 </div>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                           </div>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               
               <div class="col-xl-4 col-lg-5">
                  <div class="theme-side-bar-wrap">
                     <?php if(@$data['item']->free == 1): ?>
                     <div class="theme-side-bar gray-bg mb-5">
                        <div class="single-side-bar">
                           <?php if(Auth::check()): ?>
                           <div >
                              <a class="boxed-btn w-100" href="<?php echo e(route('user.FreeItemDownloadAll',@$data['item']->id)); ?>" ><?php echo app('translator')->get('lang.download'); ?> </a>
                              
                           </div>
                           <?php else: ?>                                                        
                           <a href="<?php echo e(url('customer/login')); ?>"  class="boxed-btn w-100" id="BuyCart"><?php echo app('translator')->get('lang.sign_in_to_download_it_for_free'); ?></a>
                           <?php endif; ?>                                                    
                           <div class="light-lisence-wrap pt-3">
                              <div class="light-pakage-list">
                                 <ul>
                                    <li>
                                       <p><?php echo app('translator')->get('lang.this_is_free_item_file_of_the_month'); ?> <?php echo e(date('M')); ?> !
                                          <?php echo app('translator')->get('lang.by_downloading_this_item'); ?>
                                       </p>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php endif; ?>
                     <div class="theme-side-bar gray-bg">
                        <div class="single-side-bar">
                           <div
                              class="side-bar-heading d-flex justify-content-between align-items-center mt-2">
                              
                              <h4> <?php echo app('translator')->get('lang.License'); ?> <?php echo app('translator')->get('lang.type'); ?> <small><a href="<?php echo e(url('/license')); ?>">What are these?</a></small> </h4> 
                           </div>
                           <form action="<?php echo e(route('AddBuy')); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <div class="light-lisence-wrap">
                                 <div class="light-pakage-list">
                                    
                                    <input type="hidden" id="support_fees" value="<?php echo e($data['fees']->support_fee); ?>">
                                    <ul id="license_list">
                                       <li>
                                          <div class="row">
                                             <div class="col-lg-2">
                                                <input type="hidden" id="normal_regular_price" value="<?php echo e(@$data['item']->Reg_total); ?>">
                                                <input type="radio" data-type="regular_license_price" data-normal="normal_regular_price" checked name="list_item_price" value="<?php echo e(@$data['item']->Reg_total); ?>">
                                             </div>
                                             <div class="col-lg-6"> <strong><?php echo app('translator')->get('lang.Regular'); ?></strong> </div>
                                             <div class="col-lg-4"> <strong class="float-right"><?php echo e(@$infix_general_settings->currency_symbol); ?> <span id="regular_license_price"><?php echo e(@$data['item']->Reg_total); ?></span></strong> </div>
                                          </div>
                                       </li>
                                       <li>
                                          <div class="row">
                                             <div class="col-lg-2">
                                                <input type="hidden" id="normal_commercial_price" value="<?php echo e(@$data['item']->C_total); ?>">
                                                <input type="radio" data-type="commercial_license_price" data-normal="normal_commercial_price"  name="list_item_price" value="<?php echo e(@$data['item']->C_total); ?>">
                                             </div>
                                             <div class="col-lg-6"> <strong><?php echo app('translator')->get('lang.commercial'); ?></strong></div>
                                             <div class="col-lg-4" > <strong class="float-right"> <?php echo e(@$infix_general_settings->currency_symbol); ?><span id="commercial_license_price"><?php echo e(@$data['item']->C_total); ?></span></strong></div>
                                          </div>
                                       </li>
                                       <li>
                                          <div class="row">
                                             <div class="col-lg-2">
                                                <input type="hidden" id="normal_extended_price" value="<?php echo e(@$data['item']->Ex_total); ?>">
                                                <input type="radio" data-type="extended_license_price" data-normal="normal_extended_price"  name="list_item_price" value="<?php echo e(@$data['item']->Ex_total); ?>">
                                             </div>
                                             <div class="col-lg-6"> <strong><?php echo app('translator')->get('lang.extended'); ?></strong> </div>
                                             <div class="col-lg-4" ><strong class="float-right"><?php echo e(@$infix_general_settings->currency_symbol); ?> <span id="extended_license_price"><?php echo e(@$data['item']->Ex_total); ?></span></strong> </div>
                                          </div>
                                       </li>
                                    </ul>
                                  
                                 </div>
                               <?php
                                                            // $support_fee=floor($data['item']->Reg_total/100*$data['fees']->support_fee);
                                    $support_fee=$data['fees']->support_fee;
                                 ?>
                                 <input type="text" hidden  name="_item_id" value="<?php echo e(@$data['item']->id); ?>">
                                 <input type="text" hidden  name="_item_percent" value="<?php echo e(@$data['BuyerFee']->fee/100); ?>">
                                 <input type="text" hidden  id="totalVal" name="totalVal" value="<?php echo e(@$data['item']->Reg_total); ?>">
                                 <input type="text" hidden id="extra_price"  value="0">
                                 <div class="lisence-extend d-flex justify-content-between align-items-center">
                                    <div class="lisence-extend-prise d-flex">
                                       <input type="checkbox" id="SupportAdd" name="support_Fee" value="<?php echo e(@$support_fee); ?>">
                                       <label for="Remember1"><?php echo app('translator')->get('lang.Extend_support_to'); ?> 12 <?php echo app('translator')->get('lang.months'); ?> <br> <span><?php echo app('translator')->get('lang.get_it_now'); ?> <?php echo e(@$infix_general_settings->currency_symbol); ?>8</span> </label>
                                    </div>
                                    <div class="prise">
                                       <strong><?php echo e(@$infix_general_settings->currency_symbol); ?><span id="show_support_price"><?php echo e(@$data['fees']->support_fee/100*@$data['item']->Reg_total); ?></span></strong> 
                                       
                                    </div>
                                 </div>
                                 <div class="add-cart">
                                    <?php if(@$data['item']->is_upload==1): ?>
                                       <a  href="#test-form" class="boxed-btn add-cart-active popup-with-form" id="AddToCart"><?php echo app('translator')->get('lang.Add_To_Cart'); ?></a>
                                       <button  type="submit" class="boxed-btn-white" ><?php echo app('translator')->get('lang.Buy'); ?> <?php echo app('translator')->get('lang.Now'); ?> </button>
                                    <?php else: ?>
                                    <a  href="<?php echo e(@$data['item']->purchase_link); ?>" target="_blank" class="boxed-btn add-cart-active"><?php echo app('translator')->get('lang.Buy'); ?> <?php echo app('translator')->get('lang.Now'); ?></a>
                                   
                                    <?php endif; ?>
                                 
                                 </div>
                              </div>
                           </form>
                           
                           <div class="lisence-wrap" id="isence-wrap">
                              <a href="javascript:void(0)"  id="regularLi" onclick="regularLicence();">
                                 <div class="lisence-inner">
                                    <div
                                       class="lisence-heading d-flex justify-content-between align-items-center">
                                       <h5><?php echo app('translator')->get('lang.Regular'); ?> <?php echo app('translator')->get('lang.License'); ?></h5>
                                       <span id="reguler_price"><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$data['item']->Reg_total); ?></span>
                                    </div>
                                    <p><?php echo app('translator')->get('lang.regular_license_description'); ?>.</p>
                                 </div>
                              </a>
                              <div class="separator-1"></div>
                              <a href="javascript:void(0)"  id="extendedLi" onclick="extendedLicence();">
                                 <div class="lisence-inner">
                                    <div
                                       class="lisence-heading d-flex justify-content-between align-items-center">
                                       <h5><?php echo app('translator')->get('lang.extended'); ?> <?php echo app('translator')->get('lang.License'); ?></h5>
                                       <span id="extended_price"><?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$data['item']->Ex_total); ?></span>
                                    </div>
                                    <p><?php echo app('translator')->get('lang.extended_license_description'); ?>.</p>
                                 </div>
                              </a>
                              <a href="<?php echo e(url('license')); ?>">  <button class="boxed-btn d-block w-100 mt-3"><?php echo app('translator')->get('lang.view_license_details'); ?></button></a>
                           </div>
                        </div>
                     </div>
                     <?php if(@$data['item']->user->balance->amount): ?>                                           
                     <div class="theme-side-bar gray-bg mt-20">
                        <div class="profile-linking">
                           <div class="profile-name">
                              <div class="theme-logo">
                                 <img src="<?php echo e(@$data['item']->user->profile->image? asset(@$data['item']->user->profile->image):asset('public/frontend/img/profile/1.png')); ?>" alt="">
                              </div>
                              <div class="theme-info">
                                 <h4><?php echo e(@$data['item']->user->username); ?></h4>
                               
                                 <div class="icons">
                                    <img height="auto" width="40"  src="<?php echo e(asset(@$level->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="Author level  <?php echo e(@$level->id); ?> : sold <?php echo e(@GeneralSetting()->currency_symbol); ?>  <?php echo e(round(@$data['item']->user->balance->amount > 50 ? @$data['item']->user->balance->amount: 0)); ?>+ on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                    <img height="auto" width="40" src="<?php echo e(asset(@$badge->icon)); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(@$level->id-1); ?> <?php echo e(@$badge->id == 1? 'Year' :'Years'); ?> of membarship on <?php echo e(@GeneralSetting()->system_name); ?> " alt="">
                                 </div>
                              </div>
                           </div>
                           <a href="<?php echo e(route('user.portfolio',@$data['item']->user->username)); ?>" class="boxed-btn d-block"><?php echo app('translator')->get('lang.view'); ?> <?php echo app('translator')->get('lang.portfolio'); ?></a>
                        </div>
                     </div>
                     <?php endif; ?>
                     <div class="theme-side-bar1 gray-bg mt-20">
                        <div class="download-comments d-flex justify-content-between align-items-center">
                           <h3 class="d-flex align-items-center"> <i class="ti-shopping-cart"></i> <?php echo app('translator')->get('lang.sales'); ?></h3>
                           <span><?php echo e(@$data['item']->sell); ?></span>
                        </div>
                     </div>
                     <div class="theme-side-bar1 gray-bg mt-20">
                      
                        <div class="download-comments d-flex justify-content-between align-items-center">
                         
                           <nav>
                              <ul class="nav" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <h3 class="d-flex align-items-center"> <i class="ti-comments"></i>
                                       <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                          aria-controls="profile" aria-selected="false"><?php echo app('translator')->get('lang.comments'); ?></a>
                                    </h3>
                                 </li>
                              </ul>
                           </nav>
                           <span><?php echo e(@$comment); ?></span>
                        </div>
                     </div>
                     
                     <?php
                     // @$totalRate =DB::table('reviews')->where('item_id', @$data['item']->id)->get();
                     // @$rate5 =DB::table('reviews')->where('item_id', @$data['item']->id)->whereBetween('rating',[4.5,5])->get();
                     if (@$rate5->count() > 0 ) {
                     @$rateparcent5= number_format((float)count(@$rate5)/count(@$totalRate)*100, 2, '.', '');
                     } else {
                     @$rateparcent5=0;
                     }                                                
                     ?>
                    
                     <div class="theme-side-bar1 theme-side-bar2 gray-bg mt-20">
                        <div class="download-comments d-flex justify-content-between align-items-center">
                           <div class="rating">
                              <h3 class="d-flex align-items-center"> <i class="ti-star"></i> <?php echo app('translator')->get('lang.Total'); ?>
                                 <?php echo app('translator')->get('lang.Ratings'); ?>
                              </h3>
                              <p><?php echo e(@$data['item']->rate); ?> <?php echo app('translator')->get('lang.average_based_on'); ?> 5 <?php echo app('translator')->get('lang.Ratings'); ?>.</p>
                           </div>
                           <span><?php echo e(count(@$totalRate)); ?></span>
                        </div>
                     </div>
                     <div class="theme-side-bar1 gray-bg mt-1px">
                        <div class="progressBar-area">
                           <div class="single-progress-bar">
                              <span class="star-count">
                              5 <?php echo app('translator')->get('lang.star'); ?>
                              </span>
                              <div class="ProgressWrap">
                                 <span class="progress">
                                    <div class="progress-bar wow slideInLeft singleitem_progress_bar"
                                       style="width: <?php echo e(@$rateparcent5); ?>%;"
                                       data-wow-duration="2s" data-wow-delay=".1s">
                                    </div>
                                 </span>
                              </div>
                              <span class="number-value">
                              <?php echo e(@$rateparcent5); ?>%
                              </span>
                           </div>
                           <?php
                           // @$rate4 =DB::table('reviews')->where('item_id', $data['item']->id)->whereBetween('rating',[3.5,4])->get();
                           if (@$rate4->count() > 0 ) {
                             @$rateparcent4=  number_format((float)count(@$rate4)/count(@$totalRate)*100, 2, '.', '');
                           // @$rateparcent4= count(@$rate4)/count(@$totalRate)*100;
                           } else {
                           @$rateparcent4=0;
                           } 
                           ?>
                           <div class="single-progress-bar">
                              <span class="star-count">
                              4 <?php echo app('translator')->get('lang.star'); ?>
                              </span>
                              <div class="ProgressWrap">
                                 <span class="progress">
                                    <div class="progress-bar wow slideInLeft singleitem_progress_bar"
                                       style="width: <?php echo e(@$rateparcent4); ?>%;"
                                       data-wow-duration="2s" data-wow-delay=".2s">
                                    </div>
                                 </span>
                              </div>
                              <span class="number-value">
                              <?php echo e(@$rateparcent4); ?>%
                              </span>
                           </div>
                           <?php
                           // @$rate3 =DB::table('reviews')->where('item_id', $data['item']->id)->whereBetween('rating',[2.5,3])->get();
                           if (@$rate3->count() > 0 ) {
                           @$rateparcent3= number_format((float)count(@$rate3)/count(@$totalRate)*100, 2, '.', '');
                           } else {
                           @$rateparcent3=0;
                           } 
                           ?>
                           <div class="single-progress-bar">
                              <span class="star-count">
                              3 star
                              </span>
                              <div class="ProgressWrap">
                                 <span class="progress">
                                    <div class="progress-bar wow slideInLeft singleitem_progress_bar"
                                       style="width: <?php echo e($rateparcent3); ?>%; "
                                       data-wow-duration="2s" data-wow-delay=".3s">
                                    </div>
                                 </span>
                              </div>
                              <span class="number-value">
                              <?php echo e(@$rateparcent3); ?>%
                              </span>
                           </div>
                           <?php
                           // @$rate2 =DB::table('reviews')->where('item_id', @$data['item']->id)->whereBetween('rating',[1.5,2])->get();
                           if (@$rate2->count() > 0 ) {
                           @$rateparcent2= number_format((float)count(@$rate2)/count(@$totalRate)*100, 2, '.', '');
                           } else {
                           @$rateparcent2=0;
                           } 
                           ?>
                           <div class="single-progress-bar">
                              <span class="star-count">
                              2 <?php echo app('translator')->get('lang.star'); ?>
                              </span>
                              <div class="ProgressWrap">
                                 <span class="progress">
                                    <div class="progress-bar wow slideInLeft singleitem_progress_bar"
                                       style="width:<?php echo e(@$rateparcent2); ?>%; "
                                       data-wow-duration="2s" data-wow-delay=".4s">
                                    </div>
                                 </span>
                              </div>
                              <span class="number-value">
                              <?php echo e(@$rateparcent2); ?>%
                              </span>
                           </div>
                           <?php
                           // @$rate1 =DB::table('reviews')->where('item_id', $data['item']->id)->whereBetween('rating',[.5,1])->get();
                           if (@$rate1->count() > 0 ) {
                           @$rateparcent1= number_format((float)count(@$rate1)/count(@$totalRate)*100, 2, '.', '');
                           } else {
                           $rateparcent1=0;
                           } 
                           ?>
                           <div class="single-progress-bar">
                              <span class="star-count">
                              1 <?php echo app('translator')->get('lang.star'); ?>
                              </span>
                              <div class="ProgressWrap">
                                 <span class="progress">
                                    <div class="progress-bar wow slideInLeft singleitem_progress_bar"
                                       style="width: <?php echo e(@$rateparcent1); ?>%; "
                                       data-wow-duration="2s" data-wow-delay=".5s">
                                    </div>
                                 </span>
                              </div>
                              <span class="number-value">
                              <?php echo e(@$rateparcent1); ?>%
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="theme-side-bar1 theme-side-bar3 gray-bg mt-20">
                        <div class="theme-detils-info">
                           <div class="single-info">
                              <h4 class="mb-3"> <span><?php echo app('translator')->get('lang.product_features'); ?></span></h4>
                              <div class="single-info-inner">
                                 <div class="single-info-title  single-info-column">
                                    <p><?php echo app('translator')->get('lang.Last'); ?> <?php echo app('translator')->get('lang.update'); ?></p>
                                 </div>
                                 <div class="single-info-content single-info-column">
                                    <p> <?php echo e(DateFormat(@$data['item']->updated_at)); ?></p>
                                 </div>
                              </div>
                              <div class="single-info-inner">
                                 <div class="single-info-title  single-info-column">
                                    <p><?php echo app('translator')->get('lang.Created'); ?></p>
                                 </div>
                                 <div class="single-info-content single-info-column">
                                    <p> <?php echo e(DateFormat(@$data['item']->created_at)); ?></p>
                                 </div>
                              </div>
                             
                              
                              <?php if(@$data['attributes']): ?>
                                 <?php $__currentLoopData = $data['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-info-inner ">
                                       <div class="single-info-title single-info-column">
                                          <p><?php echo e(getAttributeName($value->field_name)); ?></p>
                                       </div>
                                       <div class="single-info-content single-info-column">
                                          <p><?php echo e(getAttributeValues($value->values)); ?></p> 
                                       </div>
                                    </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                              
 
                              

                              <div class="single-info-inner ">
                                 <div class="single-info-title single-info-column">
                                    <p><?php echo app('translator')->get('lang.Tags'); ?></p>
                                 </div>
                                 <div class="single-info-content single-info-column">
                                    <p><?php echo e(@$data['item']->tags); ?></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<form id="test-form" class="white-popup-block mfp-hide add_lisence_popup" action="<?php echo e(route('AddCartItem')); ?>" method="POST">
   <?php echo csrf_field(); ?>
   <div class="form_header">
      <?php $__currentLoopData = Cart::content()->unique('item_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(@$data['item']->id == @$item->options['item_id']): ?>
      <div class="alert alert-info" role="alert"> 
         <i class="ti-check"></i> <?php echo app('translator')->get('lang.Already_Added_This_Item'); ?>
      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <h1><?php echo app('translator')->get('lang.Customize_your_selection'); ?></h1>
      <input type="number" hidden id="item_id" name="id" value="<?php echo e($data['item']->id); ?>">
      <input type="text" hidden  id="item_price" name="item_price" value="<?php echo e($data['item']->Reg_total); ?>">
      <input type="text" hidden  name="item_name" value="<?php echo e($data['item']->title); ?>">
      <input type="text" hidden  name="description" value="<?php echo e($data['item']->description); ?>">
      <input type="text" hidden  name="user_id" value="<?php echo e($data['item']->user_id); ?>">
      <input type="text" hidden  name="username" value="<?php echo e($data['item']->user->username); ?>">
      <input type="text" hidden  name="image" value="<?php echo e($data['item']->thumbnail); ?>">
      <input type="text" hidden  name="icon" value="<?php echo e($data['item']->icon); ?>">
      <input type="text" hidden id="BuyerFee" name="BuyerFee" value="0">
      
      <input type="text" hidden id="Extd_total" value="<?php echo e($data['item']->Ex_total); ?>">
      <input type="text" hidden id="Extd_percent" name="Extd_percent"  value="<?php echo e($data['item']->support_fee/100); ?>">
   </div>
   <input type="text" hidden  id="pop_license_type" value="1" name="license_type">
   <input type="text" hidden  id="pop_support_time" value="1" name="support_time">
   <div class="row d-none">
      <div class="col-xl-6">
         <div class="single_select">
            <h4><?php echo app('translator')->get('lang.Select_a_License'); ?></h4>
            <div class="select_box">
               <select class="wide SelectLicense" id="SelectLicense" >
                  <option id="reg_val" value="1" data-display="Regular"><?php echo app('translator')->get('lang.Regular'); ?></option>
                  <option id="Ex_val" value="2"><?php echo app('translator')->get('lang.Extended'); ?></option>
               </select>
            </div>
         </div>
      </div>
      <div class="col-xl-6">
         <div class="single_select">
            <h4><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.Support'); ?> <?php echo app('translator')->get('lang.duration'); ?></h4>
            <div class="select_box">
               <select class="wide Selectsupport" id="Selectsupport" >
                  <option value="1" id="six" data-display="6 months support">6 <?php echo app('translator')->get('lang.months'); ?> <?php echo app('translator')->get('lang.support'); ?></option>
                  <option value="2" id="twelve">12 <?php echo app('translator')->get('lang.months'); ?> <?php echo app('translator')->get('lang.support'); ?></option>
               </select>
            </div>
         </div>
      </div>
   </div>
   <div class="main_content">
      <div class="row gray-bg-2 no-gutters">
         <div class="col-xl-6 col-md-6">
            <div class="content_left">
               <a  class="profile_mini_thumb">
               <img src="<?php echo e(@$data['item']->thumbnail? asset(@$data['item']->thumbnail):''); ?>" alt="">
               </a>
               <div class="content_title">
                  <p><?php echo e(@$data['item']->title); ?>

                     <br>
                     <span class="user_author">by <?php echo e(@$data['item']->user->username); ?></span>
                     <input type="number" id="totalCartItem" value="0" hidden>
                  </p>
               </div>
            </div>
         </div>
         <div class="col-xl-6 col-md-6">
            <div class="content_left">
               <h3> <?php echo e(@$infix_general_settings->currency_symbol); ?><span class="_mod_total"><?php echo e(@$data['item']->Reg_total); ?></span> </h3>
               <div class="content_title">
                  <p class="support_text">
                     <span><?php echo app('translator')->get('lang.License'); ?> :</span>
                     <a href="#" id="support_text"><?php echo app('translator')->get('lang.Regular'); ?></a>
                  </p>
                  <p class="support_text">
                     <span><?php echo app('translator')->get('lang.Support'); ?> :</span> 
                     <small id="support_tym">6 <?php echo app('translator')->get('lang.months'); ?> <?php echo app('translator')->get('lang.support'); ?></small>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-12">
            <div class="currency_text">
               <p><?php echo app('translator')->get('lang.All_prices_are'); ?></p>
            </div>
         </div>
         <div class="col-xl-12">
            <div class="cancel_add_btn d-flex justify-content-between">
               <a class="boxed-btn-white mfp-close"  type="button" ><?php echo app('translator')->get('lang.cancel'); ?></a>
               <button id="AddCart" class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.Add_To_Cart'); ?></button>
            </div>
         </div>
      </div>
   </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/item_preview.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/dm_price_cal.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/pages/singleitem.blade.php ENDPATH**/ ?>