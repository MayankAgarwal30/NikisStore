
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.custom'); ?> <?php echo app('translator')->get('lang.links'); ?> <?php echo app('translator')->get('lang.page'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.custom'); ?> <?php echo app('translator')->get('lang.links'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">  <?php echo app('translator')->get('lang.custom'); ?> <?php echo app('translator')->get('lang.links'); ?> <?php echo app('translator')->get('lang.list'); ?> </h3>
                            </div> 
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'systemsetting/footer-custom-link/update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                            <div class="white-box">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                            <div class="alert alert-success">
                                                <?php echo app('translator')->get('lang.operation_success_message'); ?>
                                            </div> 
                                        <?php endif; ?>
                                    </div>
                                </div> 
                                 <div class="row">  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="title1" autocomplete="off" value="<?php echo e(isset($links)?@$links->title1:''); ?>">
                                                        <label><?php echo app('translator')->get('lang.title'); ?> 01 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div> 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="title2" autocomplete="off"  value="<?php echo e(isset($links)?@$links->title2:''); ?>" >
                                                        <label><?php echo app('translator')->get('lang.title'); ?> 02 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div> 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="title3" autocomplete="off"  value="<?php echo e(isset($links)?@$links->title3:''); ?>" >
                                                        <label><?php echo app('translator')->get('lang.title'); ?> 03 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div> 
                                 </div>

                                <div class="row">
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label1" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_label1:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?> 01 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label2" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_label2:''); ?>" >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?>  02 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label3" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_label3:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?>  03 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                            </div>

                                                

                                            <div class="row">
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href1" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href1:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 01 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href2" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href2:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 02 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href3" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href3:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 03 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                               
                                            </div>

                                                <!-- ****************** ****************** ****************** ****************** -->


                                            <div class="row">
 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label5" autocomplete="off"    value="<?php echo e(isset($links)?@$links->link_label5:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?>  05 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label6" autocomplete="off"    value="<?php echo e(isset($links)?@$links->link_label6:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?>  06 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label7" autocomplete="off"    value="<?php echo e(isset($links)?@$links->link_label7:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?>  07 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  

                                        </div>
                                        <div class="row">
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href5" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href5:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 05 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href6" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href6:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 06 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href7" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href7:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 07 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                               
                                        </div>  

                                                <!-- ****************** ****************** ****************** ****************** -->


                                    <div class="row">
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label9" autocomplete="off"  value="<?php echo e(isset($links)?@$links->link_label9:''); ?>" >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?> 09 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label10" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_label10:''); ?>">
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?> 10 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label11" autocomplete="off"  value="<?php echo e(isset($links)?@$links->link_label11:''); ?>">
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?> 11 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                    </div>

                                    <div class="row">
 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href9" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href9:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 09 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href10" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href10:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 10 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href11" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href11:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 11 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                    </div>


                                                <!-- ****************** ****************** ****************** ****************** -->

                                    <div class="row">
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label13" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_label13:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?> 13 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label14" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_label14:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?> 14 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_label15" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_label15:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.label'); ?> 15 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                    </div>
                                    <div class="row">
 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href13" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href13:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 13 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
 
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href14" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href14:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 14 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                                <div class="col-lg-4 mt-40"> 
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control" type="text" name="link_href15" autocomplete="off"   value="<?php echo e(isset($links)?@$links->link_href15:''); ?>"  >
                                                        <label><?php echo app('translator')->get('lang.link'); ?> <?php echo app('translator')->get('lang.url'); ?> 15 </label>
                                                        <span class="focus-border"></span>
                                                    </div> 
                                                </div>  
                                            </div>
                                                
                                                <div class="mt-20">
                                                    <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"><?php echo app('translator')->get('lang.font_awesome_icon_list'); ?> </a>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 mt-40">
                                                        <div class="input-effect">
                                                            <input class="primary-input form-control<?php echo e($errors->has('icon1') ? ' is-invalid' : ''); ?>"
                                                                type="text" name="icon1" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->icon1:''); ?>">
                
                                                            <label><?php echo app('translator')->get('lang.font_awesome_icon'); ?> <span>*</span></label>
                                                            <span class="focus-border"></span>
                                                            <?php if($errors->has('icon1')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('icon1')); ?></strong>
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mt-40">
                                                        <div class="input-effect">
                                                            <input class="primary-input form-control<?php echo e($errors->has('url1') ? ' is-invalid' : ''); ?>"
                                                                type="text" name="url1" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->url1:''); ?>">
                
                                                            <label><?php echo app('translator')->get('lang.social_url'); ?> <span>*</span></label>
                                                            <span class="focus-border"></span>
                                                            <?php if($errors->has('url1')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('url1')); ?></strong>
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 mt-40">
                                                        <div class="input-effect">
                                                            <input class="primary-input form-control<?php echo e($errors->has('icon2') ? ' is-invalid' : ''); ?>"
                                                                type="text" name="icon2" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->icon2:''); ?>">
                                                            <label><?php echo app('translator')->get('lang.font_awesome_icon'); ?> <span>*</span></label>
                                                            <span class="focus-border"></span>
                                                            <?php if($errors->has('icon2')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('icon2')); ?></strong>
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mt-40">
                                                        <div class="input-effect">
                                                            <input class="primary-input form-control<?php echo e($errors->has('url2') ? ' is-invalid' : ''); ?>"
                                                                type="text" name="url2" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->url2:''); ?>">
                                                            <label><?php echo app('translator')->get('lang.social_url'); ?> <span>*</span></label>
                                                            <span class="focus-border"></span>
                                                            <?php if($errors->has('url2')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('url2')); ?></strong>
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-lg-4 mt-40">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('icon3') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="icon3" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->icon3:''); ?>">
            
                                                        <label><?php echo app('translator')->get('lang.font_awesome_icon'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('icon3')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('icon3')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mt-40">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('url3') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="url3" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->url3:''); ?>">
            
                                                        <label><?php echo app('translator')->get('lang.social_url'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('url3')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('url3')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mt-40">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('icon4') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="icon4" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->icon4:''); ?>">
            
                                                        <label><?php echo app('translator')->get('lang.font_awesome_icon'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('icon4')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('icon4')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mt-40">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('url4') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="url4" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->url4:''); ?>">
            
                                                        <label><?php echo app('translator')->get('lang.social_url'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('url4')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('url4')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mt-40">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('icon5') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="icon5" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->icon5:''); ?>">
            
                                                        <label><?php echo app('translator')->get('lang.font_awesome_icon'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('icon5')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('icon5')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mt-40">
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control<?php echo e($errors->has('url5') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="url5" autocomplete="off" value="<?php echo e(isset($footer_setting)? $footer_setting->url5:''); ?>">
            
                                                        <label><?php echo app('translator')->get('lang.social_url'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('url5')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('url5')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 mt-40">
                                                    <div class="input-effect">
                                                            <textarea name="copyright_text" rows="3" class="primary-input form-control<?php echo e($errors->has('copyright_text') ? ' is-invalid' : ''); ?>"><?php echo e(isset($footer_setting)? $footer_setting->copyright_text:''); ?></textarea>
                                                        <label><?php echo app('translator')->get('lang.copyright_text'); ?> <span>*</span></label>
                                                        <span class="focus-border"></span>
                                                        <?php if($errors->has('copyright_text')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('copyright_text')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>


                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg">
                                                <span class="ti-check"></span>
                                                <?php if(isset($edit)): ?>
                                                    <?php echo app('translator')->get('lang.update'); ?>
                                                <?php endif; ?>
                                            </button>
                                        </div>
                                    </div>


                            </div>
                            <?php echo e(Form::close()); ?>

                        </div> 
                </div>
 
            </div>
        </div>
    </section>

 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Systemsetting/Resources/views/custom_link.blade.php ENDPATH**/ ?>