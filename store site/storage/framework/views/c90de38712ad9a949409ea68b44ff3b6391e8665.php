
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/select2.min.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/')); ?>/page_loader.css">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/')); ?>/addContent2.css">

<?php $__env->stopPush(); ?>
<?php
   $infix_general_settings = app('infix_general_settings');
?>
<?php $__env->startSection('content'); ?>
<input type="text" hidden  class="id" value="<?php echo e(Auth::user()->id); ?>">
<input type="text" hidden  class="url" value="<?php echo e(url('/')); ?>">
    <!-- banner-area start -->
    <div class="banner-area4">
            <div class="banner-area-inner">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-6">
                            <div class="banner-info knowledge_title">
                                <h2><?php echo app('translator')->get('lang.upload'); ?> <?php echo app('translator')->get('lang.product'); ?></h2>
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
                            <div class="col-xl-4">
                                <div class="upload_side_bar gray-bg">
                                    <form action="<?php echo e(route('author.contentSelect')); ?>" method="POST" id="select_content">
                                        <?php echo csrf_field(); ?>
                                        <div class="upload_inner">
                                            <h3><?php echo app('translator')->get('lang.select_switch_ategories'); ?></h3>
                                            
                                            <select class="wide " id="select_category" name="category">
                                                <option data-display="<?php echo app('translator')->get('lang.select_category'); ?>"><?php echo app('translator')->get('lang.select_category'); ?></option>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$item->id); ?>" <?php echo e(@Session::get('categorySlect')->id == @$item->id ?'selected':''); ?>><?php echo e(@$item->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="invalid-feedback invalid-select error add_content_two_category_select"  role="alert">
                                                    <strong id="category_select"></strong>
                                            </span>
                                            <button class="boxed-btn" type="submit"><?php echo app('translator')->get('lang.select_category'); ?></button>
                                            <a href="<?php echo e(route('knowledgeBase')); ?>" class="help"><?php echo app('translator')->get('lang.help'); ?></a>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <?php if(Session::has('categorySlect')): ?>
                            <div class="col-xl-8">

                            <form action="<?php echo e(route('author.itemStore')); ?>" method="POST" id="file_up" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="single_upload_area">
                                    
                                        
                                    
                                    <input type="text" hidden name="category_id" value="<?php echo e(@Session::get('categorySlect')->id); ?>">
                                   
                                    <div class="upload_description gray-bg">
                                        
                                            <h3><?php echo app('translator')->get('lang.name_and_desription'); ?></h3>

                                            <select class="wide "  name="upload_or_link" onchange="checkIsLink(this)">
                                                <option data-display="<?php echo app('translator')->get('lang.product_upload_or_link'); ?>"><?php echo app('translator')->get('lang.product_upload_or_link'); ?></option>
                                                
                                                    <option value="" ><?php echo app('translator')->get('lang.select'); ?></option>
                                                    <option value="1" selected><?php echo app('translator')->get('lang.upload'); ?></option>
                                                    <option value="0" ><?php echo app('translator')->get('lang.link'); ?></option>
                                                
                                            </select>

                                            <?php if($errors->has('upload_or_link')): ?>
                                            <span class="invalid-feedback invalid-select error" role="alert">
                                                <strong><?php echo e($errors->first('upload_or_link')); ?></strong>
                                            </span>
                                         <?php endif; ?>
                                            
                                            <input type="text" name="title" id="title" placeholder="<?php echo app('translator')->get('lang.title'); ?>*" value="<?php echo e(old('title')); ?>">
                                            <?php if($errors->has('title')): ?>
                                                <span class="invalid-feedback invalid-select error"  role="alert">
                                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                            <p><?php echo app('translator')->get('lang.maximum_100_characters_no_HTML_r_emoji_allowed'); ?></p>
                                            



                                            
                                            <input type="text" name="feature1" id="" placeholder="<?php echo app('translator')->get('lang.key_features'); ?>" value="<?php echo e(old('feature1')); ?>">
                                            <?php if($errors->has('feature1')): ?>
                                                <span class="invalid-feedback invalid-select error" role="alert">
                                                    <strong><?php echo e($errors->first('feature1')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                            


                                            
                                                <input type="text" name="feature2" id="" placeholder="<?php echo app('translator')->get('lang.key_features'); ?>" value="<?php echo e(old('feature2')); ?>">
                                                <?php if($errors->has('feature2')): ?>
                                                    <span class="invalid-feedback invalid-select error" role="alert">
                                                        <strong><?php echo e($errors->first('feature2')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                                <p><?php echo app('translator')->get('lang.key_feature_messsage'); ?></p>
                                            
                                            

                                            
                                                <textarea name="description" id="messageArea" cols="30" rows="10" placeholder=""><?php echo e(old('description')); ?></textarea>
                                                <p><?php echo app('translator')->get('lang.key_feature_messsage_description'); ?></p>
                                            
                                        </div>



                                        <div class="upload_description gray-bg padding-bottom">
                                            <h3><?php echo app('translator')->get('lang.Files'); ?></h3>
                                            <div class="fileAdd d-none">                                                    
                                        </div>
                                                  
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="DM_uploader d-flex align-items-center justify-content-between mb_20px">
                                                    <h5 id="thumbneils_title" ><?php echo app('translator')->get('lang.thumbnails'); ?>*</h5>
                                                    <a href="javascript:void(0)" class="boxed-btn boxed_button"><?php echo app('translator')->get('lang.browse_file'); ?>
                                                        <input type="file" name="thumdnail" onchange="thembnailUpload()" id="thembnails_upload">
                                                    </a>
                                                </div>   
                                                <?php if($errors->has('thumdnail')): ?>
                                                    <span class="invalid-feedback invalid-select error" role="alert">
                                                        <strong><?php echo e($errors->first('thumdnail')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <p><?php echo app('translator')->get('lang.thumdnail_message'); ?></p>
                                        
                                                 
                                                    
                                                
                                                                                                        
                                        <!-- DM_uploader  -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="DM_uploader d-flex align-items-center justify-content-between mb_20px">
                                                    <h5 id="preview_file" ><?php echo app('translator')->get('lang.theme_preview'); ?> *</h5>
                                                    <a href="javascript:void(0)" class="boxed-btn boxed_button">
                                                        <?php echo app('translator')->get('lang.browse_file'); ?>
                                                        <input type="file" onchange="previewUpload()" id="preview_upload" name="theme_preview" >
                                                    </a>
                                                </div>
                                                <?php if($errors->has('theme_preview')): ?>
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                                        <strong><?php echo e($errors->first('theme_preview')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                              
                                                <p><?php echo app('translator')->get('lang.theme_preview_message'); ?>
                                                    <br>
                                                    <strong>[<?php echo app('translator')->get('lang.mark_all_images'); ?>]</strong> 
                                                </p>
                                            </div>
                                        </div> 
                                        <!-- DM_uploader  -->

                                        
                                        <div id="main_file_upload_section" style="display: block" >
                                             
                                        <!-- DM_uploader  -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="DM_uploader d-flex align-items-center justify-content-between mb_20px">
                                                    <h5 id="main_file_title" ><?php echo app('translator')->get('lang.main_files'); ?>*</h5>
                                                    <a href="javascript:void(0)" class="boxed-btn boxed_button"><?php echo app('translator')->get('lang.browse_file'); ?>
                                                        <input type="file" onchange="mainFileUpload()" name="main_file" id="mail_file_upload">
                                                    </a>
                                                </div>
                                                <?php if($errors->has('main_file')): ?>
                                                <span class="invalid-feedback invalid-select"
                                                    role="alert">
                                                    <strong><?php echo e($errors->first('main_file')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                                <p><?php echo app('translator')->get('lang.main_file_message'); ?></p>
                                            </div>
                                        </div>
                                        <!-- DM_uploader  -->

                                        
                                        <p><?php echo app('translator')->get('lang.maximum_file_size_allowed_500MB'); ?> </p> 
                                    </div>  
                                    <div id="product_purchase_link" style="display: none">
                                        <div class="col-12 p-0">
                                            <input type="text" name="purchase_link" placeholder="<?php echo app('translator')->get('lang.purchase_link'); ?>*" value="<?php echo e(old('purchase_link')); ?>">
                                        </div>
                                        <?php if($errors->has('purchase_link')): ?>
                                            <span class="invalid-feedback invalid-select error" role="alert">
                                                <strong><?php echo e($errors->first('purchase_link')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div> 
                                    </div>




                                    <div class="upload_description gray-bg padding-bottom">
                                        <h3><?php echo app('translator')->get('lang.categories_and_attributes'); ?></h3>

                                        
                                        <select class="wide"  name="sub_category_id" id="sub_category_id">
                                            <option data-display="<?php echo app('translator')->get('lang.category'); ?>*"><?php echo app('translator')->get('lang.category'); ?> *</option>
                                            <?php $__currentLoopData = $subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$value->id); ?>" class="dm_padding_left_40"> -<?php echo e(@$value->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('sub_category_id')): ?>
                                        <span class="invalid-feedback invalid-select"
                                            role="alert">
                                            <strong><?php echo e($errors->first('sub_category_id')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        

 

                                        <div class="disable_key">
                                                                                                    
                                            <?php $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                         
                                                
                                                <select class="js-example-basic-multiple dm_display_none" data-placeholder="<?php echo e(@$item->name); ?> *" name="optional_att[<?php echo e(@$item->field_name); ?>][]" multiple="multiple" aria-readonly="false"  title="Select ">
                                                    <?php $__currentLoopData = $item->subAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(@Session::get('categorySlect')->id == $value->category_id): ?>                                                                
                                                            <option  data-display="<?php echo e(@$value->name); ?>"  value="<?php echo e(@$value->id); ?>"><?php echo e(@$value->name); ?></option>
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
                                                          
                                        <div class="col-12 p-0">
                                            <input type="text" name="demo_url" placeholder="<?php echo app('translator')->get('lang.demo_url'); ?>*" value="<?php echo e(old('demo_url')); ?>">
                                        </div>
                                    </div>

                                    <div class="upload_description gray-bg padding-bottom">
                                        <h3><?php echo app('translator')->get('lang.Tags'); ?> *</h3>
                                            <textarea name="tags" id="" cols="30" rows="10" placeholder="<?php echo app('translator')->get('lang.Tags'); ?>" ><?php echo e(old('tags')); ?></textarea>
                                        <p><?php echo app('translator')->get('lang.tags_message'); ?></p>
                                    </div>
                                    <div class="upload_description gray-bg padding-bottom prise-item">
                                        <div class="upload_hding">
                                            <h3><?php echo app('translator')->get('lang.message_to_the_reviewer'); ?></h3>
                                            <p><?php echo app('translator')->get('lang.upload_heading'); ?></p>
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
                                                <div class="upload_inner d-flex align-items-center mb-10">
                                                    
                                                        <span class="lisence-name"><?php echo app('translator')->get('lang.regular_license'); ?></span>
                                                        <span><?php echo e(@$infix_general_settings->currency_symbol); ?></span>
                                                        <div class="input_field">
                                                            <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                                            <input type="text" step="any" id="Re_item" name="Re_item" onkeyup="regular(this.value)" value="<?php echo e(old('Re_item')); ?>">
                                                        </div>
                                                        <span>+</span>
                                                        <div class="input_field">
                                                            <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                                            <input  type="text" step="any"  id="Re_buyer" name="Re_buyer" hidden value="<?php echo e(@$item_fee->re_fee); ?>" value="<?php echo e(old('Re_buyer')); ?>">
                                                            <input type="text"  disabled placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$item_fee->re_fee); ?>" onkeyup="regular(this.value)">
                                                        </div>
                                                        <span>=</span>
                                                        <div class="input_field last-one">
                                                            <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                                            <input  type="text"   name="Reg_total_price" readonly  value="<?php echo e(old('Reg_total')); ?>" placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?>" id="Re_total" >
                                                            <input  type="text"   disabled hidden id="Reg_total"  value="<?php echo e(old('Reg_total')); ?>">
                                                        </div>
                                                        
                                                        <div class="recomander">
                                                            <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                                                    <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                                                    <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$regular_recommended_price[0][0]); ?> - <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$regular_recommended_price[0][1]); ?></p> 
                                                        </div>
                                                </div>
                                                <div class="upload_inner d-flex align-items-center mb-10">
                                                        <span class="lisence-name"><?php echo app('translator')->get('lang.extended_license'); ?></span>
                                                        <span><?php echo e(@$infix_general_settings->currency_symbol); ?></span>
                                                        <div class="input_field">
                                                            <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                                            <input  type="text" step="any"   id="E_item" name="E_item" onkeyup="Extended(this.value)" value="<?php echo e(old('E_item')); ?>">
                                                        </div>
                                                        <span>+</span>
                                                        <div class="input_field">
                                                            <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                                            <input  type="text" step="any"   id="E_buyer" name="E_buyer" hidden value="<?php echo e(@$item_fee->ex_fee); ?>" value="<?php echo e(old('E_buyer')); ?>">
                                                            <input  type="text"    disabled placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$item_fee->ex_fee); ?>" onkeyup="this.value)">
                                                        </div>
                                                        <span>=</span>
                                                        <div class="input_field last-one">
                                                            <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                                            <input  type="text"     disabled id="E_total"  placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?>">
                                                            <input  type="text"  disabled hidden id="Ex_total" placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?>"  value="<?php echo e(old('Ex_total')); ?>">
                                                            <input type="hidden" name="Ex_total_price" id="ex_price" value="<?php echo e(old('Ex_total')); ?>">
                                                        </div>
                                                        <div class="recomander">
                                                            <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                                                    <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                                                    <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$extended_recommended_price[0][0]); ?> - <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$extended_recommended_price[0][1]); ?></p> 
                                                        
                                                        </div>
                                                </div>
                                                <div class="upload_inner d-flex align-items-center mb-10">
                                                        <span class="lisence-name"> <?php echo app('translator')->get('lang.commercial'); ?> <?php echo app('translator')->get('lang.License'); ?></span>
                                                        <span><?php echo e(@$infix_general_settings->currency_symbol); ?></span>
                                                        <div class="input_field">
                                                            <label for=""><?php echo app('translator')->get('lang.ITEM_PRISE'); ?></label>
                                                            <input  type="text" step="any"   id="C_item" name="C_item" onkeyup="Commercial(this.value)" value="<?php echo e(old('C_item')); ?>">
                                                        </div>
                                                        <span>+</span>
                                                        <div class="input_field">
                                                            <label for=""><?php echo app('translator')->get('lang.BUYER_FEE'); ?></label>
                                                            <input  type="text" step="any"   id="C_buyer" name="C_buyer" hidden value="<?php echo e(@$item_fee->co_fee); ?>" value="<?php echo e(old('C_buyer')); ?>">
                                                            <input  type="text"    disabled placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$item_fee->co_fee); ?>" onkeyup="Commercial(this.value)">
                                                        </div>
                                                        <span>=</span>
                                                        <div class="input_field last-one">
                                                            <label for=""><?php echo app('translator')->get('lang.purchase_price'); ?></label>
                                                            <input  type="text"     disabled id="C_total"  placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?>">
                                                            <input  type="text"  disabled hidden id="Co_total" placeholder="<?php echo e(@$infix_general_settings->currency_symbol); ?>"  value="<?php echo e(old('C_total')); ?>">
                                                            <input type="hidden" name="C_total_price" id="c_price" value="<?php echo e(old('C_total')); ?>">
                                                        </div>
                                                        <div class="recomander">
                                                            <p><?php echo app('translator')->get('lang.recommended'); ?> <br>
                                                                    <?php echo app('translator')->get('lang.purchase_price'); ?> <br>
                                                                    <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$recommended_price_commercial[0][0]); ?> - <?php echo e(@$infix_general_settings->currency_symbol); ?><?php echo e(@$recommended_price_commercial[0][1]); ?></p> 
                                                        
                                                        </div>
                                                </div>
                                            <p><?php echo app('translator')->get('lang.price_message'); ?> </p>
                                        </div>
                                    <div class="upload_description gray-bg padding-bottom">
                                        <h3><?php echo app('translator')->get('lang.message_to_the_reviewer'); ?></h3>
                                            <textarea class="autherMsg" name="user_msg" id="autherMsg" cols="30" rows="10" placeholder="<?php echo app('translator')->get('lang.message'); ?>"><?php echo e(old('user_msg')); ?></textarea>
                                        
                                    <p><?php echo app('translator')->get('lang.submit_message'); ?> <?php echo e(@GeneralSetting()->system_name); ?></p>
                                    </div>
                                    <button  class="boxed-btn mt-20" onclick='upload_image();' id="itemSubmit" type="submit"><?php echo app('translator')->get('lang.submit'); ?> <?php echo app('translator')->get('lang.product'); ?></button>
                                
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

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/vendor/addContent2.blade.php ENDPATH**/ ?>