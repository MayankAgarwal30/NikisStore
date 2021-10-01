
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.ticket_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="<?php echo e(route('infixTicket_list')); ?>"><?php echo app('translator')->get('lang.ticket_system'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.ticket_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="mb-40 up_dashboard">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3><?php echo app('translator')->get('lang.ticket'); ?> <?php echo app('translator')->get('lang.status'); ?></h3> 
                        
     
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
    <?php
    $getData=App\ManageQuery::InfixTicket();
        $progress=$getData['progress'];
        $pending=$getData['pending'];
        $close=$getData['close'];
    ?>
      
      <div class="row">
      
        <div class="col-lg-4 col-md-4 mt-30-md">
            <a href="#" class="d-block">
              <div class="white-box single-summery">
                <div class="d-flex justify-content-between">
                  <div>
                    <h3><?php echo app('translator')->get('lang.pending'); ?> <?php echo app('translator')->get('lang.ticket'); ?></h3>
                    <p class="mb-0"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.pending'); ?> <?php echo app('translator')->get('lang.ticket'); ?></p>
                  </div>
                  <h1 class="gradient-color2"><?php echo e(@$pending); ?></h1>
                </div>
              </div>
            </a>
          </div> 
        <div class="col-lg-4 col-md-4 mt-30-md">
          <a href="#" class="d-block">
            <div class="white-box single-summery">
              <div class="d-flex justify-content-between">
                <div>
                  <h3><?php echo app('translator')->get('lang.progress'); ?> <?php echo app('translator')->get('lang.ticket'); ?></h3>
                  <p class="mb-0"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.progress'); ?> <?php echo app('translator')->get('lang.ticket'); ?></p>
                </div>
                <h1 class="gradient-color2"><?php echo e(@$progress); ?></h1>
              </div>
            </div>
          </a>
        </div> 
        <div class="col-lg-4 col-md-4 mt-30-md">
          <a href="#" class="d-block">
            <div class="white-box single-summery">
              <div class="d-flex justify-content-between">
                <div>
                  <h3><?php echo app('translator')->get('lang.close'); ?> <?php echo app('translator')->get('lang.ticket'); ?></h3>
                  <p class="mb-0"><?php echo app('translator')->get('lang.total'); ?> <?php echo app('translator')->get('lang.close'); ?> <?php echo app('translator')->get('lang.ticket'); ?></p>
                </div>
                <h1 class="gradient-color2"><?php echo e(@$close); ?></h1>
              </div>
            </div>
          </a>
        </div> 
       
    </div>
        </div>
</section>
            
<div class="row mt-40">
  <div class="col-lg-12">
      <div class="row">
          <div class="col-lg-12 col-md-12 no-gutters">
              <div class="main-title lm_mb_35 sm_mb_20">
                  <h3 class="mb-0"><?php echo app('translator')->get('lang.ticket'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
              </div>
          </div>
      </div>
      

          
      <!-- </div> -->
      <div class="row DM_table_info">
          <div class="col-lg-12">
              <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                  <thead>
                       <?php if(session()->has('message-success') != "" ||
                      session()->get('message-danger') != ""): ?>
                      <tr>
                          <td colspan="7">
                              <?php if(session()->has('message-success')): ?>
                              <div class="alert alert-success">
                                  <?php echo e(session()->get('message-success')); ?>

                              </div>
                              <?php elseif(session()->has('message-danger')): ?>
                              <div class="alert alert-danger">
                                  <?php echo e(session()->get('message-danger')); ?>

                              </div>
                              <?php endif; ?>
                          </td>
                      </tr>
                      <?php endif; ?>
                      <tr>
                          <th width="25%"><?php echo app('translator')->get('lang.subject'); ?></th>
                          <th width="15%"><?php echo app('translator')->get('lang.category'); ?></th>
                          <th width="10%"><?php echo app('translator')->get('lang.user'); ?> <?php echo app('translator')->get('lang.name'); ?></th>
                          <th width="15%"><?php echo app('translator')->get('lang.ticket_priority'); ?></th>
                          
                          <th width="10%"><?php echo app('translator')->get('lang.status'); ?></th>
                          
                      </tr>
                  </thead>

                  <tbody>
                      <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(Auth::user()->role_id == 1): ?>
                      <tr>
                              <td><a href="<?php echo e(route('infixTicket_view',$ticket->id)); ?>" ><?php echo e(Str::limit($ticket->subject,35)); ?></a> </td>
                              <td><?php echo e($ticket->category_name); ?></td>
                              <td><?php echo e($ticket->user); ?></td>
                              <td><?php echo e($ticket->priority_name); ?></td>
                              
                              <?php if($ticket->active_status == 0): ?>
                              <td>
                                  <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('lang.pending'); ?></button>
                              </td>
                              <?php endif; ?>
                              <?php if($ticket->active_status == 1): ?>
                              <td><button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('lang.close'); ?></button></td>
                              <?php endif; ?>
                              <?php if($ticket->active_status == 2): ?>
                             <td>
                                <button class="primary-btn small bg-warning  text-white border-0"><?php echo app('translator')->get('lang.progress'); ?></button>
                             </td>
                              <?php endif; ?>
                             
                      </tr>  
                      <?php else: ?>
                      <?php if(isset($ticket->author_id) && @Auth::user()->id == $ticket->author_id): ?>
                       
                      <tr>
                            
                              <td><?php echo e(Str::limit($ticket->subject,35)); ?></td>
                              <td><?php echo e($ticket->category_name); ?></td>
                              <td><?php echo e($ticket->user); ?></td>
                              <td><?php echo e($ticket->priority_name); ?></td>
                              <td><?php echo e(@$ticket->author?$ticket->author:'Not assign yet !'); ?></td>
                              <?php if($ticket->active_status == 0): ?>
                              <td><?php echo app('translator')->get('lang.pending'); ?></td>
                              <?php endif; ?>
                              <?php if($ticket->active_status == 1): ?>
                              <td><?php echo app('translator')->get('lang.close'); ?></td>
                              <?php endif; ?>

                              <td>
                                      <div class="row">
                                      <div class="col-sm-6">
      
                                      <div class="dropdown">
                                          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                              <?php echo app('translator')->get('lang.select'); ?>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
       
                                      
      
                                              
                                              <a class="dropdown-item" href=""> <?php echo app('translator')->get('lang.view'); ?></a>
                                              <a class="dropdown-item" href="<?php echo e(route('infixTicket_edit',$ticket->id)); ?>"> <?php echo app('translator')->get('lang.edit'); ?></a>
                                              <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="Delete Ticket" href="<?php echo e(route('admin.ticket_delete_view',$ticket->id)); ?>"> <?php echo app('translator')->get('lang.delete'); ?></a>
      
                                              
      
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                  </td>
                      </tr>   
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>
          </div>
      </div>
    
  </div>
</div>    


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Ticket/Resources/views/backend/ticket_status.blade.php ENDPATH**/ ?>