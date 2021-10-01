<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.admin'); ?> <?php echo app('translator')->get('lang.revenue'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.reports'); ?></a>
                <a href="<?php echo e(route('admin.revenue')); ?>"><?php echo app('translator')->get('lang.admin'); ?> <?php echo app('translator')->get('lang.revenue'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?> </h3>
                </div>
            </div>
          
        </div>
        <div class="row">
            <div class="col-lg-12"> 
              <?php if(session()->has('message-success')): ?>
                  <div class="alert alert-success">
                  <?php echo e(session()->get('message-success')); ?>

                  </div>
                  <?php elseif(session()->has('message-danger')): ?>
                  <div class="alert alert-danger">
                      <?php echo e(session()->get('message-danger')); ?>

                  </div>
              <?php endif; ?>
              </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin.revenue', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <div class="col-lg-3">
                              <select class="niceSelect w-100 bb form-control date_type" onchange="setDate(this)" name="date_type" id="date_type">
                                <option data-display="<?php echo app('translator')->get('lang.set_date'); ?>" value=""><?php echo app('translator')->get('lang.set_date'); ?></option>
                                    <option data-display="Today" value="1"> Today </option>
                                    <option data-display="Yesterday" value="2"> Yesterday </option>
                                    <option data-display="Last 7 days" value="3"> Last 7 days </option>
                                    <option data-display="Last 30 days" value="4"> Last 30 days </option>
                                    <option data-display="This Month" value="5"> This Month </option>
                                    <option data-display="Last Month" value="6"> Last Month </option>
                                    <option data-display="Custom Range" value="7"> Custom Range </option>
                                    
                                </select>
                            </div>

                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input date form-control <?php echo e($errors->has('start_date') ? ' is-invalid' : ''); ?>" type="text" readonly placeholder="<?php echo app('translator')->get('lang.start_date'); ?>" id="startDate"  name="start_date">
                                    <span class="focus-border"></span>
                                            <?php if($errors->has('start_date')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('start_date')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                </div>
                            </div>
                           </div>
                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input date form-control <?php echo e($errors->has('end_date') ? ' is-invalid' : ''); ?>" type="text" readonly placeholder="<?php echo app('translator')->get('lang.end_date'); ?>" id="endDate"  name="end_date">
                                    <span class="focus-border"></span>
                                            <?php if($errors->has('end_date')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('end_date')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                </div>
                            </div>
                           </div>
                          
                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search pr-2"></span>
                                <?php echo app('translator')->get('lang.search'); ?>
                            </button>
                        </div>
                    </div>

            <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <?php if(isset($revenue_list )): ?>
        
    
 <div class="row mt-40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"> <?php echo app('translator')->get('lang.revenue'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                    </div>
                </div>
            </div>

         <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('lang.product'); ?></th>
                                <th><?php echo app('translator')->get('lang.price'); ?></th>
                                
                                <th><?php echo app('translator')->get('lang.revenue'); ?></th>
                                <th><?php echo app('translator')->get('lang.date'); ?></th>
                            </tr>
                        </thead>
                        <?php
                            $total_revenue=0;
                        ?>
                        <tbody>
                            <?php $__currentLoopData = $revenue_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $total_revenue+=$item['revenue'];
                            ?>
                            <tr>
                                <td> <?php echo e(@$item['title']); ?> </td>
                                <td> <?php echo e(@$item['price']); ?> </td>
                                <td> <?php echo e(@$item['revenue']); ?> </td>
                                <td> <?php echo e(DateFormat(@$item['date'])); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td colspan="1"><?php echo app('translator')->get('lang.total'); ?>: </td>
                                
                                <td colspan="2"><?php echo e($total_revenue); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/report/revenue.blade.php ENDPATH**/ ?>