 <?php $__env->startSection('mainContent'); ?>
<style>
    .input_field {
    width: 150px;
    max-width: 150px !important;
    flex: 150px 0 0;
}
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.product_upload'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.product'); ?></a>
                <a href="#"> <?php echo app('translator')->get('lang.product_upload'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
            </div>
            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                <a href="<?php echo e(route('admin.content')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span><?php echo app('translator')->get('lang.Product'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
            </div>
        </div>
        
            <div class="row">
                <div class="col-lg-3 mb-30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">

                                    <?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.category'); ?> 
                                </h3>
                            </div>
                                <form action="<?php echo e(route('admin.selectCategory')); ?>" method="POST"
                                      class="form-horizontal" enctype="multipart/form-data">
                                 
                                            <?php echo csrf_field(); ?>

                                            <div class="white-box">
                                                <div class="add-visitor">
                                                    <div class="row mb-25">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>"
                                                                        name="category">
                                                                    <option data-display="<?php echo app('translator')->get('lang.category'); ?> *"
                                                                            value=""><?php echo app('translator')->get('lang.category'); ?> *
                                                                    </option>
                                                                    <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value=<?php echo e(@$item->id); ?> <?php echo e(@$item->id == @Session::get('categorySlect')->id ?'selected':old('category') ==( @$item->id ? 'selected':'')); ?>><?php echo e(@$item->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="focus-border"></span>
                                                                <?php if($errors->has('category_id')): ?>
                                                                    <span class="invalid-feedback invalid-select"
                                                                          role="alert">
                                                                        <strong><?php echo e($errors->first('category_id')); ?></strong>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-40">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="primary-btn fix-gr-bg">
                                                                <span class="ti-check"></span>
                                                                <?php if(isset($data['edit'])): ?>
                                                                    <?php echo app('translator')->get('lang.update'); ?>
                                                                <?php else: ?>
                                                                    <?php echo app('translator')->get('lang.save'); ?>
                                                                <?php endif; ?>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                        </div>
                    </div>
                </div>
                <?php if(@Session::get('categorySlect')->id): ?>
                    
                
                <div class="col-lg-9 ">
                    <div class="white-box">
                        <div class="add-visitor">
                            <form action="<?php echo e(url('admin/product-upload')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e(@Session::get('categorySlect')->id); ?>" name="category_id">
                                <div class="row mt-20">
                                    <div class="col-lg-12 mb-30">
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('upload_or_link') ? ' is-invalid' : ''); ?>"
                                                    name="upload_or_link" onchange="checkIsLink(this)">
                                                <option value="" ><?php echo app('translator')->get('lang.select'); ?></option>
                                                <option value="1"  selected><?php echo app('translator')->get('lang.upload'); ?></option>
                                                <option value="0" ><?php echo app('translator')->get('lang.link'); ?></option>
                                            </select>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('upload_or_link')): ?>
                                                <span class="invalid-feedback invalid-select"
                                                    role="alert">
                                                    <strong><?php echo e($errors->first('upload_or_link')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="input-effect">
                                        <input class="primary-input form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title"
                                               autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->title :old('title')); ?>">

                                        <label><?php echo app('translator')->get('lang.title'); ?> <span>*</span></label>
                                        <span class="focus-border"></span>
                                        <?php if($errors->has('title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('title')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-10">
                                <div class="col-lg-12">
                                    <div class="input-effect">
                                        <input class="primary-input form-control<?php echo e($errors->has('feature1') ? ' is-invalid' : ''); ?>" type="text" name="feature1"
                                               autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->feature1 :old('feature1')); ?>">

                                        <input type="hidden" name="id" value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
                                        <label><?php echo app('translator')->get('lang.feature'); ?> <span></span></label>
                                        <span class="focus-border"></span>
                                        <?php if($errors->has('feature1')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('feature1')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20 mb-20">
                                <div class="col-lg-12">
                                    <div class="input-effect">
                                        <input class="primary-input form-control<?php echo e($errors->has('feature2') ? ' is-invalid' : ''); ?>" type="text" name="feature2"
                                               autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->feature2 :old('feature2')); ?>">

                                        <input type="hidden" name="id" value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
                                        <label><?php echo app('translator')->get('lang.feature'); ?> <span></span></label>
                                        <span class="focus-border"></span>
                                        <?php if($errors->has('feature2')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('feature2')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-effect mb-20">
                                    <label><?php echo app('translator')->get('lang.description'); ?> <span>*</span> </label>
                                    <textarea id="summernote" class="primary-input form-control <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="description" id="details"><?php echo e(old('description')); ?></textarea>
                                   
                                    <span class="focus-border textarea"></span> 
                                    <?php if($errors->has('description')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-lg-12">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input <?php echo e($errors->has('thumdnail') ? ' is-invalid' : ''); ?>" type="text"
                                                      id="placeholder_thembnails"
                                                       placeholder="<?php echo app('translator')->get('lang.thumbnails'); ?> "
                                                       readonly="">
                                                <span class="focus-border"></span>
                                            </div>
                                            <small><?php echo app('translator')->get('lang.please_input'); ?></small>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input"
                                                    type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                       for="thembnails_upload"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                <input type="file" class="d-none" onchange="thembnailUpload()" id="thembnails_upload" name="thumdnail">
                                            </button>
                                            
                                        </div>
                                    </div>
                                    <?php if($errors->has('thumdnail')): ?>
                                    <span class="invalid-feedback dm_display_block" role="alert" >
                                        <strong><?php echo e($errors->first('thumdnail')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <p id="thumbneils_title"></p>
                                </div>
                            </div>      
                            
                           
                            
                            <div class="row mt-25">
                                <div class="col-lg-12">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input <?php echo e($errors->has('theme_preview') ? ' is-invalid' : ''); ?>" type="text"
                                                      id="placeholderPhoto"
                                                       placeholder="<?php echo app('translator')->get('lang.theme_preview'); ?> "
                                                       readonly="">
                                                <span class="focus-border"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input"
                                                    type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                       for="preview_upload"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                <input type="file" class="d-none" name="theme_preview"
                                                onchange="previewUpload()" id="preview_upload">
                                            </button>
                                            
                                        </div>
                                    </div>
                                    <?php if($errors->has('theme_preview')): ?>
                                        <span class="invalid-feedback dm_display_block" role="alert" >
                                            <strong><?php echo e($errors->first('theme_preview')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <p id="preview_file"></p>
                                </div>
                            </div>  
                            <p><?php echo app('translator')->get('lang.theme_preview_message'); ?>
                                <br>
                                <strong>[<?php echo app('translator')->get('lang.mark_all_images'); ?>]</strong> 
                            </p>     

                            
                            <div class="row mt-25" id="main_file_upload_section" style="display:block" >
                            
                                <div class="col-lg-12">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input <?php echo e($errors->has('main_file') ? ' is-invalid' : ''); ?>" type="text"
                                                      id="placeholderPhoto"
                                                       placeholder="<?php echo app('translator')->get('lang.main_files'); ?> "
                                                       readonly="">
                                                <span class="focus-border"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input"
                                                    type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                       for="mail_file_upload"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                <input type="file" class="d-none" onchange="mainFileUpload()" name="main_file" id="mail_file_upload">
                                            </button>
                                            
                                        </div>
                                    </div>
                                    <?php if($errors->has('main_file')): ?>
                                        <span class="invalid-feedback dm_display_block" role="alert" >
                                            <strong><?php echo e($errors->first('main_file')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <p id="main_file_title"></p>
                                </div>
                            </div> 
                            <div id="product_purchase_link" style="display: none">
                                
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('purchase_link') ? ' is-invalid' : ''); ?>" type="text" name="purchase_link"
                                           autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->purchase_link :old('purchase_link')); ?>">
    
                                    <input type="hidden" name="id" value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
                                    <label><?php echo app('translator')->get('lang.purchase_link'); ?> <span>*</span></label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('purchase_link')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('purchase_link')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                              
                            </div> 
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
                            <p><?php echo app('translator')->get('lang.main_file_message'); ?></p>
                              <div class="col-lg-12 mb-30">
                                <div class="input-effect">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('sub_category_id') ? ' is-invalid' : ''); ?>"
                                            name="sub_category_id">
                                        <option data-display="<?php echo app('translator')->get('lang.category'); ?> *"
                                                value=""><?php echo app('translator')->get('lang.category'); ?> *
                                        </option>
                                        <?php $__currentLoopData = $data['subCategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e(@$item->id); ?> <?php echo e(@$item->id == @Session::get('categorySlect')->id ?'selected':old('category') ==( @$item->id ? 'selected':'')); ?>><?php echo e(@$item->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('sub_category_id')): ?>
                                        <span class="invalid-feedback invalid-select"
                                              role="alert">
                                            <strong><?php echo e($errors->first('sub_category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                                <style>
                                    .select_Staff_width{
                                        width: 100%;
                                        height: 35px;
                                        border-color: #D9DCE8;
                                        /* overflow-x: hidden; */

                                    }
                                    /* Hide scrollbar for Chrome, Safari and Opera */
                                    .select_Staff_width::-webkit-scrollbar {
                                        display: none;
                                    }

                                    /* Hide scrollbar for IE and Edge */
                                    .select_Staff_width {
                                        -ms-overflow-style: none;
                                    }
                                </style>
                    <?php $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <div class="col-lg-12 mt-30" id="">
                            <label for="checkbox" class="mb-2"><?php echo e(@$item->name); ?> *</label>
                            
                            <select multiple id="selectField<?php echo e(@$item->id); ?>" name="optional_att[<?php echo e(@$item->field_name); ?>][]" onclick="attributeSelect(<?php echo e(@$item->id); ?>)"  class="select_Staff_width text-white multiple_attribute_select">
                                <?php $__currentLoopData = $item->subAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@Session::get('categorySlect')->id == $value->category_id): ?>                                                                
                                        <option  data-display="<?php echo e(@$value->name); ?>"  value="<?php echo e(@$value->id); ?>"><?php echo e(@$value->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           
                            <?php if($errors->has('staff_id')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('staff_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="input-effect">
                                <input class="primary-input form-control<?php echo e($errors->has('demo_url') ? ' is-invalid' : ''); ?>" type="text" name="demo_url"
                                       autocomplete="off" value="<?php echo e(isset($data['edit'])? $data['edit']->demo_url :old('demo_url')); ?>">

                                <input type="hidden" name="id" value="<?php echo e(isset($data['edit'])? $data['edit']->id: ''); ?>">
                                <label><?php echo app('translator')->get('lang.demo_url'); ?> <span>*</span></label>
                                <span class="focus-border"></span>
                                <?php if($errors->has('demo_url')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('demo_url')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-25">
                        <div class="col-lg-12">
                            <div class="input-effect">
                                <textarea class="primary-input form-control<?php echo e($errors->has('tags') ? ' is-invalid' : ''); ?>" type="text" name="tags" autocomplete="off" ><?php echo e(isset($data['edit'])? $data['edit']->tags:old('tags')); ?> </textarea>
                                <label><?php echo app('translator')->get('lang.Tags'); ?> *</label>
                                <span class="focus-border"></span>
                                <?php if($errors->has('tags')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('tags')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $category_details=App\ManageQuery::SelectedCategoryDetails(Session::get('categorySlect')->id);
                    // DB::table('item_categories')->where('id',Session::get('categorySlect')->id)->first();
                    $regular_recommended_price[]=explode("-",$category_details->recommended_price);
                    $extended_recommended_price[]=explode("-",$category_details->recommended_price_extended);
                    $recommended_price_commercial[]=explode("-",$category_details->recommended_price_commercial);

                    $item_fee=App\ManageQuery::FreeItemOfCategory(Session::get('categorySlect')->id);
                    // DB::table('item_fees')->where('category_id',Session::get('categorySlect')->id)->first();
                
            ?> 
            <style>
                span.dm_middle_span {
                    margin-top: 38px;
                    margin-right: 15px;
                }
            </style>
            
            <div class="table-responsive">

            
                    <div class="upload_inner d-flex align-items-center mb-10 mt-20">
                            <span class="lisence-name "><?php echo app('translator')->get('lang.regular_license'); ?></span>
                            <span class="dm_middle_span"><?php echo e(GeneralSetting()->currency_symbol); ?></span>
                            <div class="input_field">
                                <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                <input type="text" class="primary-input form-control w-50 decimal" step="any" id="Re_item" name="Re_item" onkeyup="regular(this.value)" value="<?php echo e(old('Re_item')); ?>">
                            </div>
                            <span class="dm_middle_span">+</span>
                            <div class="input_field">
                                <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                <input  type="text" class="primary-input form-control w-50" step="any"  id="Re_buyer" name="Re_buyer" hidden value="<?php echo e(@$item_fee->re_fee); ?>" value="<?php echo e(old('Re_buyer')); ?>">
                                <input type="text" class="primary-input form-control w-50"  disabled placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$item_fee->re_fee); ?>" onkeyup="regular(this.value)">
                            </div>
                            <span class="dm_middle_span">=</span>
                            <div class="input_field last-one">
                                <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                <input  type="text" class="primary-input form-control w-50"  name="Reg_total_price" readonly  value="<?php echo e(old('Reg_total')); ?>" placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?>" id="Re_total" >
                                <input  type="text" class="primary-input form-control w-50"  disabled hidden id="Reg_total"  value="<?php echo e(old('Reg_total')); ?>">
                            </div>
                            <div class="recomander">
                                <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                        <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                        <?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$regular_recommended_price[0][0]); ?> - <?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$regular_recommended_price[0][1]); ?></p> 
                            </div>
                    </div>
                    <div class="upload_inner d-flex align-items-center mb-10">
                            <span class="lisence-name"><?php echo app('translator')->get('lang.extended_license'); ?></span>
                            <span class="dm_middle_span"><?php echo e(GeneralSetting()->currency_symbol); ?></span>
                            <div class="input_field">
                                <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                <input  type="text" class="primary-input form-control w-50 decimal" step="any"   id="E_item" name="E_item" onkeyup="Extended(this.value)" value="<?php echo e(old('E_item')); ?>">
                            </div>
                            <span class="dm_middle_span">+</span>
                            <div class="input_field">
                                <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                <input  type="text" class="primary-input form-control w-50" step="any"   id="E_buyer" name="E_buyer" hidden value="<?php echo e(@$item_fee->ex_fee); ?>" value="<?php echo e(old('E_buyer')); ?>">
                                <input  type="text" class="primary-input form-control w-50"    disabled placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$item_fee->ex_fee); ?>" onkeyup="Extended(this.value)">
                            </div>
                            <span class="dm_middle_span">=</span>
                            <div class="input_field last-one">
                                <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                <input  type="text" class="primary-input form-control w-50"     disabled id="E_total"  placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?>100">
                                <input  type="text" class="primary-input form-control w-50"  disabled hidden id="Ex_total" placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?>100"  value="<?php echo e(old('Ex_total')); ?>">
                                <input type="hidden" name="Ex_total_price" id="ex_price" value="<?php echo e(old('Ex_total')); ?>">
                            </div>
                            <div class="recomander">
                                <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                        <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                        <?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$extended_recommended_price[0][0]); ?> - <?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$extended_recommended_price[0][1]); ?></p> 
                            
                            </div>
                    </div>
                    <div class="upload_inner d-flex align-items-center mb-10">
                            <span class="lisence-name"><?php echo app('translator')->get('lang.commercial'); ?> <?php echo app('translator')->get('lang.License'); ?></span>
                            <span class="dm_middle_span"><?php echo e(GeneralSetting()->currency_symbol); ?></span>
                            <div class="input_field">
                                <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                <input  type="text" class="primary-input form-control w-50 decimal" step="any"   id="C_item" name="C_item" onkeyup="Commercial(this.value)" value="<?php echo e(old('C_item')); ?>">
                            </div>
                            <span class="dm_middle_span">+</span>
                            <div class="input_field">
                                <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                <input  type="text" class="primary-input form-control w-50" step="any"   id="C_buyer" name="C_buyer" hidden value="<?php echo e(@$item_fee->ex_fee); ?>" value="<?php echo e(old('C_buyer')); ?>">
                                <input  type="text" class="primary-input form-control w-50"    disabled placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$item_fee->ex_fee); ?>" onkeyup="Commercial(this.value)">
                            </div>
                            <span class="dm_middle_span">=</span>
                            <div class="input_field last-one">
                                <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                <input  type="text" class="primary-input form-control w-50"     disabled id="C_total"  placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?>100">
                                <input  type="text" class="primary-input form-control w-50"  disabled hidden id="Co_total" placeholder="<?php echo e(GeneralSetting()->currency_symbol); ?>100"  value="<?php echo e(old('Co_total')); ?>">
                                <input type="hidden" name="Co_total_price" id="co_price" value="<?php echo e(old('Co_total')); ?>">
                            </div>
                            <div class="recomander">
                                <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                        <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                        <?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$recommended_price_commercial[0][0]); ?> - <?php echo e(GeneralSetting()->currency_symbol); ?><?php echo e(@$recommended_price_commercial[0][1]); ?></p> 
                            
                            </div>
                    </div>
                </div>
                <p><?php echo app('translator')->get('lang.price_message'); ?> </p>
            </div>

            <div class="row mt-50">
                <div class="col-lg-12 text-center">
                    <button class="primary-btn fix-gr-bg">
                        <span class="ti-check"></span>
                        <?php if(isset($data['edit'])): ?>
                            <?php echo app('translator')->get('lang.update'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('lang.save'); ?>
                        <?php endif; ?>

                    </button>
                </div>
            </div>

        </form>


                </div>
                </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
     
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  
<script>
    function regular(item) {
    var Re_item = $("#Re_item").val();
    var Re_buyer = $("#Re_buyer").val();

    if (Re_item.length != 0) {
        var item = Re_item;
    } else {
        var item = 0;
    }
    var total = parseInt(item) + parseInt(Re_buyer);
    $("#Reg_total").val(total);
    $("#Re_total").attr("placeholder", "$" + total);
    $("#Re_total").attr("value", total);
}

function Extended(item) {
    var E_item = $("#E_item").val();
    var buyer = $("#E_buyer").val();

    if (E_item.length > 0) {
        var item = E_item;
    } else {
        var item = 0;
    }
    var total = parseInt(item) + parseInt(buyer);
    $("#E_total").attr("placeholder", "$" + total);
    $("#E_total").attr("value", total);
    //    $('#ex_price').attr("value",total);
    $("#ex_price").val(total);
    $("#Ex_total").val(total);
}
function Commercial(item) {
    var E_item = $("#C_item").val();
    var buyer = $("#C_buyer").val();

    if (E_item.length > 0) {
        var item = E_item;
    } else {
        var item = 0;
    }
    var total = parseInt(item) + parseInt(buyer);
    $("#C_total").attr("placeholder", "$" + total);
    $("#C_total").attr("value", total);
    //    $('#ex_price').attr("value",total);
    $("#co_price").val(total);
    $("#Co_total").val(total);
}

$('.decimal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});

</script>
<script src="<?php echo e(asset('public/backEnd/send_email.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/backend.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/admin_upload.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/product/product_upload.blade.php ENDPATH**/ ?>