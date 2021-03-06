
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.change'); ?> <?php echo app('translator')->get('lang.password'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.change'); ?> <?php echo app('translator')->get('lang.password'); ?> </a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area mb-40">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('lang.change'); ?> <?php echo app('translator')->get('lang.password'); ?>  </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                
                <div class="white-box">
                	<?php if(session()->has('message-success') != ""): ?>
	                    <?php if(session()->has('message-success')): ?>
	                    <div class="alert alert-success">
	                        <?php echo e(session()->get('message-success')); ?>

	                    </div>
	                    <?php endif; ?>
	                <?php endif; ?>
	                 <?php if(session()->has('message-danger') != ""): ?>
	                    <?php if(session()->has('message-danger')): ?>
	                    <div class="alert alert-danger">
	                        <?php echo e(session()->get('message-danger')); ?>

	                    </div>
	                    <?php endif; ?>
					<?php endif; ?>
					<?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
						<?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

					<?php else: ?>
						<?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin.password_update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                 	 <?php endif; ?>  
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                            <div class="row mb-25">
								<div class="cal-lg-4">
										<div class="img-thumb text-center"> 
											<img   class="rounded-circle password_update_profile_img" src="<?php echo e(file_exists(@$user->profile->image) ? asset(@$user->profile->image) : asset('public/backEnd/img/admin/staff.png')); ?>" alt="">
										</div>
										<div class="title text-center mt-25">
											<h3><?php echo e(@$user->full_name); ?></h3>
											<h4><?php echo e(@$user->email); ?></h4>
										</div>
									</div>
									<div class="col-lg-6 ">
										<div class="row mb-25">
								
											<div class="col-lg-6  offset-lg-3">
												<div class="input-effect">
													<input class="primary-input form-control<?php echo e($errors->has('current_password') || session()->has('password-error') ? ' is-invalid' : ''); ?>" type="password" name="current_password">
													<label><?php echo app('translator')->get('lang.current'); ?> <?php echo app('translator')->get('lang.password'); ?> </label>
													<span class="focus-border"></span>
													<?php if($errors->has('current_password')): ?>
													<span class="invalid-feedback" role="alert">
														<strong><?php echo e($errors->first('current_password')); ?></strong>
													</span>
													<?php endif; ?>
													<?php if(session()->has('password-error')): ?>
													<span class="invalid-feedback" role="alert">
														<strong><?php echo e(session()->get('password-error')); ?></strong>
													</span>
													<?php endif; ?>
												</div>
											</div>
										</div>
									
											<div class="row mb-25">
												<div class="col-lg-6 offset-lg-3">
													<div class="input-effect">
														<input class="primary-input form-control<?php echo e($errors->has('new_password') ? ' is-invalid' : ''); ?>" type="password" name="new_password">
														<label><?php echo app('translator')->get('lang.new'); ?> <?php echo app('translator')->get('lang.password'); ?> </label>
														<span class="focus-border"></span>
														<?php if($errors->has('new_password')): ?>
														<span class="invalid-feedback" role="alert">
															<strong><?php echo e($errors->first('new_password')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div> 
											<div class="row mb-25">
												<div class="col-lg-6 offset-lg-3">
													<div class="input-effect">
														<input class="primary-input form-control<?php echo e($errors->has('confirm_password') ? ' is-invalid' : ''); ?>" type="password" name="confirm_password">
														<label><?php echo app('translator')->get('lang.confirm'); ?> <?php echo app('translator')->get('lang.password'); ?> </label>
														<span class="focus-border"></span>
														<?php if($errors->has('confirm_password')): ?>
														<span class="invalid-feedback" role="alert">
															<strong><?php echo e($errors->first('confirm_password')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div> 
											<div class="row">
												<div class="col-lg-12 mt-20 text-center">  
														<?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
														<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> 
														<button   class="primary-btn small fix-gr-bg  demo_view password_update_btn" type="button" > <?php echo app('translator')->get('lang.change'); ?> <?php echo app('translator')->get('lang.password'); ?></button>
														</span>
													<?php else: ?>
													<button type="submit" class="primary-btn fix-gr-bg">
															<span class="ti-check"></span>
															<?php echo app('translator')->get('lang.change'); ?> <?php echo app('translator')->get('lang.password'); ?> 
														</button>
													<?php endif; ?> 
												
												</div>
											</div> 
										</div>
									</div>
                            </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/admin/password_update.blade.php ENDPATH**/ ?>