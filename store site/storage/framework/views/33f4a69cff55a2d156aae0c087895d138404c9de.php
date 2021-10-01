
<?php $__env->startSection('mainContent'); ?>
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
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
<section class="admin-visitor-area DM_table_info">
    <div class="container-fluid p-0">
        <div class="row justify-content-between p-3">
            <div class="bc-pages">
             
            </div>
          
            <div class="bc-pages">
                    <a href="<?php echo e(route('infixTicket_ticket')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('lang.add'); ?>
                        </a>
            </div>
          

    </div>


           
            <div class="row">
                <div class="col-lg-12">
                        
                    <div class="">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['infixTicket_search'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                            <div class="row white-box">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-4 mt-30-md">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('category') ? ' is-invalid' : ''); ?>" id="select_class" name="category">
                                        <option data-display="<?php echo app('translator')->get('lang.ticket_category'); ?> *" value=""><?php echo app('translator')->get('lang.ticket_category'); ?> <?php echo app('translator')->get('lang.select'); ?> *</option>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('category')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('category')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('priority') ? ' is-invalid' : ''); ?>" id="select_class" name="priority">
                                        <option data-display="<?php echo app('translator')->get('lang.ticket_priority'); ?> *" value=""><?php echo app('translator')->get('lang.ticket_priority'); ?> <?php echo app('translator')->get('lang.select'); ?> *</option>
                                        <?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('priority')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('priority')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md">
                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('active_status') ? ' is-invalid' : ''); ?>" id="select_class" name="active_status">
                                        <option data-display="<?php echo app('translator')->get('lang.status'); ?> *" value=""><?php echo app('translator')->get('lang.status'); ?> *</option>
                                        <option value="0"><?php echo app('translator')->get('lang.pending'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('lang.complete'); ?></option>
                                    </select>
                                     <?php if($errors->has('active_status')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('active_status')); ?></strong>
                                    </span>
                                    <?php endif; ?>
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
           

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 ">
                            <div class="main-title lm_mb_35 sm_mb_20 ">
                                <h3 class="mb-0"><?php echo app('translator')->get('lang.ticket_list'); ?></h3>
                            </div>
                        </div>
                    </div>
                    

                        
                    <!-- </div> -->
                    <div class="row">
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
                                        <th width="10%"><?php echo app('translator')->get('lang.assignee'); ?></th>
                                        <th width="10%"><?php echo app('translator')->get('lang.status'); ?></th>
                                        <th width="15%"><?php echo app('translator')->get('lang.action'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php if(Auth::user()->role_id == 1): ?>
                                    <tr>
                                            <td><?php echo e(Illuminate\Support\Str::limit($ticket->subject,35)); ?></td>
                                            <td><?php echo e(@$ticket->ticket_category->name); ?></td>
                                            <td><?php echo e(@$ticket->user->username); ?></td>
                                            <td><?php echo e(@$ticket->ticket_priority->name); ?></td>
                                            <td><?php echo e(isset($ticket->assignee->username) ? $ticket->assignee->username : 'Not assign yet !'); ?></td>
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
                                            <td>
                                                    <div class="row">
                                                    <div class="col-sm-6">
                    
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo app('translator')->get('lang.select'); ?>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                
                                                                <a class="dropdown-item" href="<?php echo e(route('infixTicket_view',$ticket->id)); ?>"> <?php echo app('translator')->get('lang.view'); ?></a>
                                                                <a class="dropdown-item" href="<?php echo e(route('infixTicket_edit',$ticket->id)); ?>"> <?php echo app('translator')->get('lang.edit'); ?></a>
                                                                

                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteTicketModal<?php echo e($ticket->id); ?>"  href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                </td>
                                    </tr>  
                                    <?php else: ?>                                     
                                    <tr>
                                          
                                            <td><?php echo e(Str::limit($ticket->subject,35)); ?></td>
                                            <td><?php echo e($ticket->ticket_category->name); ?></td>
                                            <td><?php echo e($ticket->user->username); ?></td>
                                            <td><?php echo e($ticket->ticket_priority->name); ?></td>
                                            <td><?php echo e(isset($ticket->assignee->username) ? $ticket->assignee->username : 'Not assign yet !'); ?></td>
                                            <?php if(@$ticket->active_status == 0): ?>
                                            <td><?php echo app('translator')->get('lang.pending'); ?></td>
                                            <?php endif; ?>
                                            <?php if(@$ticket->active_status == 1): ?>
                                            <td><?php echo app('translator')->get('lang.close'); ?></td>
                                            <?php endif; ?>
                                            <?php if(@$ticket->active_status == 2): ?>
                                            <td><?php echo app('translator')->get('lang.progress'); ?></td>
                                            <?php endif; ?>

                                            <td>
                                                    <div class="row">
                                                    <div class="col-sm-6">
                    
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo app('translator')->get('lang.select'); ?>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">   
                                                            <a class="dropdown-item" href="<?php echo e(route('infixTicket_view',$ticket->id)); ?>"> <?php echo app('translator')->get('lang.view'); ?></a>
                                                            <a class="dropdown-item" href="<?php echo e(route('infixTicket_edit',$ticket->id)); ?>"> <?php echo app('translator')->get('lang.edit'); ?></a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                </td>
                                    </tr>   
                                    <?php endif; ?>
                                        <div class="modal fade admin-query" id="deleteTicketModal<?php echo e($ticket->id); ?>" >
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.ticket'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            
                                                            <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                            <a href="<?php echo e(route('admin.ticket_delete_view',$ticket->id)); ?>" class="text-light">
                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  
                </div>
            </div>

    </div>
</section>
<script src="<?php echo e(asset('/')); ?>public/backEnd/js/jquery.min.js"></script>
<script src="<?php echo e(asset('/')); ?>public/backEnd/backend_modules.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Ticket/Resources/views/backend/ticket.blade.php ENDPATH**/ ?>