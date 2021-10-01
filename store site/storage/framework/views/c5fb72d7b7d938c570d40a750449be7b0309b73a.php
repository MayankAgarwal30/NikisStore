
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/select2.min.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/page_loader.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/editContent.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<input type="text" hidden  class="id" value="<?php echo e(Auth::user()->id); ?>">
    <!-- banner-area start -->
    <div class="banner-area4">
            <div class="banner-area-inner">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-6">
                            <div class="banner-info knowledge_title">
                                <h2><?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.product'); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-area end -->
       
       



        <!-- upload_area _start -->
        <div class="upload_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="row"> 
                                                    
                            <?php if(@$data['edit']->id): ?>
                            <div class="col-xl-10 offset-xl-1">
                                <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2): ?>
                                    <form action="<?php echo e(route('admin.itemUpdate')); ?>" id="file_update" method="POST" enctype="multipart/form-data">
                                <?php else: ?>
                                    <?php if(@$item_preview != null): ?>
                                    <form action="<?php echo e(route('author.portfolio',Auth::user()->username)); ?>" method="get" >
                                    <?php else: ?>
                                    <form action="<?php echo e(route('author.itemUpdate')); ?>" id="file_update" method="POST" enctype="multipart/form-data">
                                    <?php endif; ?>
                                  
                                <?php endif; ?>
                                    <?php echo csrf_field(); ?>
                                <div class="single_upload_area">
                                        <input type="text" hidden name="category_id" value="<?php echo e(@$data['edit']->category_id); ?>">
                                        <input type="text" hidden name="id" value="<?php echo e(@$data['edit']->id); ?>">
                                        <div class="d-flex justify-content-center" id="page_loader" style="display: none">
                                            <div class="loader" style="display: none">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>  
                                        </div>
                                        <div class="upload_description gray-bg">

                                            <select class="wide " id="select_category" name="upload_or_link" onchange="checkIsLink(this)">
                                                <option data-display="<?php echo app('translator')->get('lang.product_upload_or_link'); ?>"><?php echo app('translator')->get('lang.product_upload_or_link'); ?></option>
                                                
                                                    <option value="" ><?php echo app('translator')->get('lang.select'); ?></option>
                                                    <option value="1" <?php echo e($data['edit']->is_upload == 1 ?'selected':''); ?>><?php echo app('translator')->get('lang.upload'); ?></option>
                                                    <option value="0" <?php echo e($data['edit']->is_upload == 0 ?'selected':''); ?>><?php echo app('translator')->get('lang.link'); ?></option>
                                                
                                            </select>

                                            <?php if($errors->has('upload_or_link')): ?>
                                            <span class="invalid-feedback invalid-select error" role="alert">
                                                <strong><?php echo e($errors->first('upload_or_link')); ?></strong>
                                            </span>
                                         <?php endif; ?>
                                       

                                                <h3><?php echo app('translator')->get('lang.name_and_desription'); ?></h3>
                                                


                                                    <input type="text" name="title" id="" placeholder="<?php echo app('translator')->get('lang.name'); ?>*" value="<?php echo e(isset($data['edit'])? $data['edit']->title:old('title')); ?>">
                                                    <?php if($errors->has('title')): ?>
                                                    <span class="invalid-feedback invalid-select error"
                                                          role="alert">
                                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                                    </span>
                                                  <?php endif; ?>
                                                  <p><?php echo app('translator')->get('lang.maximum_100_characters_no_HTML_r_emoji_allowed'); ?></p>
                                                    <input type="text" name="feature1" id="" placeholder="<?php echo app('translator')->get('lang.key_features'); ?>" value="<?php echo e(isset($data['edit'])? $data['edit']->feature1:old('feature1')); ?>">
                                                    <?php if($errors->has('feature1')): ?>
                                                    <span class="invalid-feedback invalid-select error"
                                                          role="alert">
                                                        <strong><?php echo e($errors->first('feature1')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    <input type="text" name="feature2" id="" placeholder="<?php echo app('translator')->get('lang.key_features'); ?>" value="<?php echo e(isset($data['edit'])? $data['edit']->feature2:old('feature2')); ?>">
                                                    <?php if($errors->has('feature2')): ?>
                                                    <span class="invalid-feedback invalid-select error"
                                                          role="alert">
                                                        <strong><?php echo e($errors->first('feature2')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    <p>
                                                        <?php echo app('translator')->get('lang.key_feature_messsage'); ?>
                                                       
                                                    </p>
                                                    <textarea  name="description" id="messageArea" cols="30" rows="10"
                                                        placeholder=""><?php echo e(isset($data['edit'])? $data['edit']->description:old('description')); ?></textarea>
                                                        <p><?php echo app('translator')->get('lang.key_feature_messsage_description'); ?>
                                                        </p>
                                                
                                            </div>
                                            <div class="upload_description gray-bg padding-bottom">
                                                <h3><?php echo app('translator')->get('lang.Files'); ?></h3>
                                                <div class="fileAdd d-none">
                                                    
                                            </div>
                                            
                                            
                                            
                                                
                                                        <!-- DM_uploader  -->
                                                        <div class="row">
                                                            <div class="col-12">
                                                            <div class="DM_uploader d-flex align-items-center justify-content-between mb_20px">
                                                                <h5 id="thumbneils_title" ><?php echo e(Illuminate\Support\Str::replaceFirst('public/uploads/SessionFile/', '',@$data['edit']->icon)); ?></h5>
                                                                <a href="javascript:void(0)"  class="boxed-btn boxed_button"><?php echo app('translator')->get('lang.browse_file'); ?>
                                                                            <input type="file" name="thumdnail" value="<?php echo e(@$data['edit']->icon); ?>" onchange="thembnailUpload()" id="thembnails_upload">
                                                                </a>
                                                                </div>
                                                            </div>
                                                        </div>
             
                                                        <?php if($errors->has('thumdnail')): ?>
                                                        <span class="invalid-feedback invalid-select error"
                                                            role="alert">
                                                            <strong><?php echo e($errors->first('thumdnail')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                        <p>
                                                            <?php echo app('translator')->get('lang.thumdnail_message'); ?>
                                                        </p>
                                                        <!-- DM_uploader  -->
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="DM_uploader d-flex align-items-center justify-content-between mb_20px">
                                                                    <?php
                                                                       $theme_preview_array=explode(",", $data['edit']->theme_preview); 
                                                                    ?>
                                                                    <h5 id="preview_file" ><?php echo e(@count($theme_preview_array)); ?> <?php echo app('translator')->get('lang.images_found'); ?></h5>
                                                                    <a href="javascript:void(0)" class="boxed-btn boxed_button"><?php echo app('translator')->get('lang.browse_file'); ?>
                                                                                    <input type="file" onchange="previewUpload()" value="<?php echo e(@$data['edit']->theme_preview); ?>" id="preview_upload" name="theme_preview" >
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                               
                                                    <?php if($errors->has('theme_preview')): ?>
                                                        <span class="invalid-feedback invalid-select"
                                                            role="alert">
                                                            <strong><?php echo e($errors->first('theme_preview')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                    <p><?php echo app('translator')->get('lang.theme_preview_message'); ?>
                                                        <br>
                                                        <strong>[<?php echo app('translator')->get('lang.mark_all_images'); ?>]</strong> 
                                                    </p>
                                                    <!-- DM_uploader  -->
                                                <div id="main_file_upload_section" style="display: <?php echo e(@$data['edit']->is_upload == 1 ?'block':'none'); ?>" >
                                                    <div class="row d-none">
                                                            <div class="col-12">
                                                                <div class="DM_uploader d-flex align-items-center justify-content-between mb_20px">
                                                                    <h5 id="main_file_title" ><?php echo e(Illuminate\Support\Str::replaceFirst('public/uploads/product/main_file/zip/', '',@$data['edit']->main_file)); ?></h5>
                                                                    <a href="javascript:void(0)" class="boxed-btn boxed_button"><?php echo app('translator')->get('lang.browse_file'); ?>
                                                                                    <input type="file" value="<?php echo e(@$data['edit']->main_file); ?>" onchange="mainFileUpload()" name="main_file" id="mail_file_upload">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- DM_uploader  -->
                                                    
                                                    <?php if($errors->has('main_file')): ?>
                                                    <span class="invalid-feedback invalid-select"
                                                        role="alert">
                                                        <strong><?php echo e($errors->first('main_file')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    <p><?php echo app('translator')->get('lang.main_file_message'); ?></p>
                                                    <div class="row">
                                                        <div class="col-12">
                                                         <div class="DM_uploader d-flex align-items-center justify-content-between mb_20px">
                                                             <h5 id="file_title"><?php echo e(Illuminate\Support\Str::replaceFirst('public/uploads/product/main_file/zip/', '',@$data['edit']->main_file)); ?>*</h5>
                                                             <a href="javascript:void(0)" class="boxed-btn boxed_button"><?php echo app('translator')->get('lang.browse_file'); ?>
                                                                             <input type="file" onchange="fileUpload()" value="<?php echo e(@$data['edit']->main_file); ?>" name="file" id="file_upload">
                                                             </a>
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <?php if($errors->has('file')): ?>
                                                    <span class="invalid-feedback invalid-select"
                                                        role="alert">
                                                        <strong><?php echo e($errors->first('file')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                    </div>
                                                    
                                                    <div id="product_purchase_link" style="display: <?php echo e(@$data['edit']->is_upload == 1 ?'none':'block'); ?>">
                                                        <div class="col-12 p-0">
                                                            <input type="text" name="purchase_link" placeholder="<?php echo app('translator')->get('lang.purchase_link'); ?>*" value="<?php echo e(@$data['edit']->purchase_link); ?>">
                                                        </div>
                                                        <?php if($errors->has('purchase_link')): ?>
                                                            <span class="invalid-feedback invalid-select error" role="alert">
                                                                <strong><?php echo e($errors->first('purchase_link')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div> 
                                                    <p><?php echo app('translator')->get('lang.ZIP_containing_an_installable'); ?> <?php echo e(@Session::get('categorySlect')->title); ?> <?php echo app('translator')->get('lang.theme'); ?></p>
                                                    
                                                    
                                            </div>
                                            <div class="upload_description gray-bg padding-bottom">
                                                    <h3><?php echo app('translator')->get('lang.categories_and_attributes'); ?></h3>
                                                            <select class="wide"  name="sub_category_id" id="sub_category_id">

                                                                <?php if(!@$data['edit']->sub_category_id): ?>
                                                                <option data-display="<?php echo app('translator')->get('lang.category'); ?>*"><?php echo app('translator')->get('lang.category'); ?>*</option>
                                                                <?php endif; ?>

                                                                <?php $__currentLoopData = $data['edit']->category->subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                     <option value="<?php echo e($value->id); ?>" <?php echo e(@$data['edit']->sub_category_id == $value->id ? 'selected':''); ?> class="pl"> -<?php echo e($value->title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
  
                                                            <div class="disable_key">
                                                                                                                        
                                                                <?php $__currentLoopData = $data['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                         
                                                                    
                                                                    <select class="js-example-basic-multiple dm_display_none" data-placeholder="<?php echo e(@$item->name); ?> *" name="optional_att[<?php echo e(@$item->field_name); ?>][]" multiple="multiple" aria-readonly="false"  title="Select ">
                                                                        <?php $__currentLoopData = $item->subAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($data['edit']->category_id == $value->category_id): ?>                                                                
                                                                                <option  data-display="<?php echo e(@$value->name); ?>"  value="<?php echo e(@$value->id); ?>" 
                                                                                <?php echo e(getAttributeSelecedStatus($data['edit']->id, $item->field_name, $value->id )); ?>><?php echo e(@$value->name); ?> </option>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>  
                                                                    <?php if(@$errors->has(@$item->field_name)): ?>
                                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                                            <strong><?php echo e(@$errors->first(@$item->field_name)); ?></strong>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        <input type="text" name="demo_url" placeholder="<?php echo app('translator')->get('lang.demo_url'); ?>*"  value="<?php echo e(isset($data['edit'])? $data['edit']->demo_url:old('demo_url')); ?>">
                                                </div>
                                                

                                                

                                            <div class="upload_description gray-bg padding-bottom">
                                                <h3><?php echo app('translator')->get('lang.Tags'); ?></h3>
                                                    <textarea  name="tags" id="" cols="30" rows="10" 
                                                    placeholder="<?php echo app('translator')->get('lang.Tags'); ?>" ><?php echo e(isset($data['edit'])? $data['edit']->tags:old('tags')); ?></textarea>
                                                    <p><?php echo app('translator')->get('lang.tags_message'); ?></p>
                                            </div>
                                            <div class="upload_description gray-bg padding-bottom prise-item">
                                                <div class="upload_hding">
                                                    <h3><?php echo app('translator')->get('lang.message_to_the_reviewer'); ?></h3>
                                                    <p><?php echo app('translator')->get('lang.upload_heading'); ?></p>
                                                </div>
                                                         <?php
                                                            $regular = App\ManageQuery::BuyerFees(1);
                                                            // DB::table('buyer_fees')->where('type', 1)->first();
                                                         $category_details=$category_details=App\ManageQuery::SelectedCategoryDetails($data['edit']->category_id);
                                                        //  DB::table('item_categories')->where('id',$data['edit']->category_id)->first();
                                                        //  $category_details=DB::table('item_categories')->where('id',Session::get('categorySlect')->id)->first();
                                                        $regular_recommended_price[]=explode("-",$category_details->recommended_price);
                                                         $extended_recommended_price[]=explode("-",$category_details->recommended_price_extended);
                                                         $recommended_price_commercial[]=explode("-",$category_details->recommended_price_commercial);
    
                                                         $item_fee=App\ManageQuery::FreeItemOfCategory($data['edit']->category_id);
                                                        //  DB::table('item_fees')->where('category_id',$data['edit']->category_id)->first();
                                                       
                                                    ?> 
                                                        <div class="upload_inner d-flex align-items-center mb-10">
                                                                <span class="lisence-name"><?php echo app('translator')->get('lang.regular_license'); ?></span>
                                                                <span><?php echo e(@GeneralSetting()->currency_symbol); ?></span>
                                                                <div class="input_field">
                                                                    <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                                                    <input type="text" id="Re_item" name="Re_item" onkeyup="regular(this.value)" value="<?php echo e(isset($data['edit'])? $data['edit']->Re_item:old('Re_item')); ?>">
                                                                </div>
                                                                <span>+</span>
                                                                <div class="input_field">
                                                                    <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                                                    <input type="text" id="Re_buyer" name="Re_buyer" hidden value="<?php echo e(@$data['edit']->Re_buyer); ?>" value="<?php echo e(isset($data['edit'])? $data['edit']->Re_buyer:old('Re_buyer')); ?>">
                                                                    <input type="text"  disabled placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(@$data['edit']->Re_buyer); ?>" onkeyup="regular(this.value)">
                                                                </div>
                                                                <span>=</span>
                                                                
                                                                <div class="input_field last-one">
                                                                    <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                                                    <input type="text" name="Reg_total_price" readonly  value="<?php echo e(isset($data['edit'])? $data['edit']->Reg_total:old('Reg_total')); ?>" placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(isset($data['edit'])? $data['edit']->Reg_total:old('Reg_total')); ?>" id="Re_total" >
                                                                    <input type="text" disabled hidden id="Reg_total"  value="<?php echo e(isset($data['edit'])? $data['edit']->Reg_total:old('Reg_total')); ?>">
                                                                </div>
                                                                <div class="recomander">
                                                                    <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                                                        <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                                                       <?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$regular_recommended_price[0][0]); ?> - <?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$regular_recommended_price[0][1]); ?></p> 
                                                           </div>
                                                        </div>
                                                        <?php
                                                            $extended = App\ManageQuery::BuyerFees(2);
                                                        ?>
                                                        <div class="upload_inner d-flex align-items-center mb-10">
                                                                <span class="lisence-name"><?php echo app('translator')->get('lang.extended_license'); ?></span>
                                                                <span><?php echo e(@GeneralSetting()->currency_symbol); ?></span>
                                                                <div class="input_field">
                                                                    <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                                                    <input type="text" id="E_item" name="E_item" onkeyup="Extended(this.value)" value="<?php echo e(isset($data['edit'])? $data['edit']->E_item:old('E_item')); ?>">
                                                                </div>
                                                                <span>+</span>
                                                                <div class="input_field">
                                                                    <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                                                   <input type="text" id="E_buyer" name="E_buyer" hidden value="<?php echo e(@$data['edit']->E_buyer); ?>" value="<?php echo e(isset($data['edit'])? $data['edit']->E_buyer:old('E_buyer')); ?>">
                                                                   <input type="text"   disabled placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(@$data['edit']->E_buyer); ?>" onkeyup="Extended(this.value)">
                                                                </div>
                                                                <span>=</span>
                                                                <div class="input_field last-one">
                                                                    <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                                                    <input type="text" id="E_total" value="<?php echo e(isset($data['edit'])? $data['edit']->Ex_total:old('Ex_total')); ?>" disabled placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(isset($data['edit'])? $data['edit']->Ex_total:old('Ex_total')); ?>">
                                                                    <input type="text" hidden id="Ex_total" disabled placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> 100" name="Ex_total" value="<?php echo e(isset($data['edit'])? $data['edit']->Ex_total:old('Ex_total')); ?>">
                                                                    <input type="hidden" name="Ex_total_price" id="ex_price" value="<?php echo e(isset($data['edit'])? $data['edit']->Ex_total:old('Ex_total')); ?>">
                                                                </div>
                                                                <div class="recomander">
                                                                    <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                                                        <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                                                        <?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$extended_recommended_price[0][0]); ?> - <?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$extended_recommended_price[0][1]); ?></p> 
                                                          
                                                            </div>
                                                        </div>
                                                        <div class="upload_inner d-flex align-items-center mb-10">
                                                            <span class="lisence-name"> <?php echo app('translator')->get('lang.commercial'); ?> <?php echo app('translator')->get('lang.License'); ?></span>
                                                            <span><?php echo e(@GeneralSetting()->currency_symbol); ?></span>
                                                            <div class="input_field">
                                                                <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                                                <input  type="text" step="any"   id="C_item" name="C_item" onkeyup="Commercial(this.value)" value="<?php echo e(isset($data['edit'])? $data['edit']->C_item:old('C_item')); ?>">
                                                            </div>
                                                            <span>+</span>
                                                            <div class="input_field">
                                                                <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                                                <input  type="text" step="any"   id="C_buyer" name="C_buyer" hidden value="<?php echo e(@$item_fee->co_fee); ?>" value="<?php echo e(isset($data['edit'])? $data['edit']->C_buyer:old('C_buyer')); ?>">
                                                                <input  type="text"    disabled placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$item_fee->co_fee); ?>" onkeyup="Commercial(this.value)">
                                                            </div>
                                                            <span>=</span>
                                                            <div class="input_field last-one">
                                                                <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                                                <input  type="text"     disabled id="C_total"  placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?> <?php echo e(isset($data['edit'])? $data['edit']->C_total:old('C_total')); ?>">
                                                                <input  type="text"  disabled hidden id="Co_total" placeholder="<?php echo e(@GeneralSetting()->currency_symbol); ?>"  value=" <?php echo e(isset($data['edit'])? $data['edit']->C_total:old('C_total')); ?>">
                                                                <input type="hidden" name="C_total_price" id="c_price" value="<?php echo e(isset($data['edit'])? $data['edit']->C_total:old('C_total')); ?>">
                                                            </div>
                                                            <div class="recomander">
                                                                <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                                                        <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                                                        <?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$recommended_price_commercial[0][0]); ?> - <?php echo e(@GeneralSetting()->currency_symbol); ?><?php echo e(@$recommended_price_commercial[0][1]); ?></p> 
                                                            
                                                            </div>
                                                    </div>
                                                        <p><?php echo app('translator')->get('lang.price_message'); ?> </p>
                                                </div>
                                            <div class="upload_description gray-bg padding-bottom">
                                                <h3><?php echo app('translator')->get('lang.message_to_the_reviewer'); ?></h3>
                                                    <textarea class="autherMsg" name="user_msg" id="autherMsg" cols="30" rows="10" 
                                                    placeholder="Messages"><?php echo e(@$data['edit']->user_msg); ?></textarea>
                                              
                                                    <p><?php echo app('translator')->get('lang.submit_message'); ?> <?php echo e(@GeneralSetting()->system_name); ?></p>
                                                </div>
                                            </div>
                                            <?php if(@$item_preview!=null): ?>
                                            <p class="text-danger text-center"><?php echo app('translator')->get('lang.your_previous_update_is_pending'); ?></p>
                                            <p  class="boxed-btn mt-20"><?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.product'); ?></p>
                                            <?php else: ?>
                                            <button  class="boxed-btn mt-20" id="itemSubmit" type="submit"><?php echo app('translator')->get('lang.update'); ?> <?php echo app('translator')->get('lang.product'); ?></button>
                                            <?php endif; ?>
                                            
                                
                                </div>
                            </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php echo $__env->make('error.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/select2.min.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/file_upload.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/item_files.js"></script>
<script src="<?php echo e(asset('public/frontend/js/')); ?>/page_loader.js"></script>
<script>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  toastr.error('<?php echo e($error); ?>','Error',{
                      closeButton:true,
                      progressBar:true,
                   });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>

<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
 
<script type="text/javascript">
    CKEDITOR.replace('messageArea', {
        filebrowserUploadUrl: "<?php echo e(route('ckeditor_upload', ['_token' => csrf_token() ])); ?>",
        filebrowserUploadMethod: 'form',
            on: {
                instanceReady: function() {
                    this.dataProcessor.htmlFilter.addRules( {
                        elements: {
                            img: function( el ) {
                                // Add an attribute.
                                if ( !el.attributes.alt )
                                    el.attributes.alt = 'Feature image';

                                // Add some class.
                                el.addClass( 'feature_image_ck' );
                            }
                        }
                    } );            
                }
            }
    });
</script>

<script>
    function checkIsLink(selectedObj) {
        var selected_value=selectedObj.value;
        var upload_section=document.getElementById('main_file_upload_section');
        var purchase_link=document.getElementById('product_purchase_link');

        if (selected_value==0) {
            upload_section.style.display = "none";
            purchase_link.style.display = "block";
        } else {
            upload_section.style.display = "block";
            purchase_link.style.display = "none";
        }

    }
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/vendor/editContent.blade.php ENDPATH**/ ?>