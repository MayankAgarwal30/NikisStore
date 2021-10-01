
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/public/css')); ?>/ticket_view.css">


<link rel="stylesheet" href="<?php echo e('public/bkacEnd/'); ?>/modules.css">
<?php
function showPicName($data){
    $name = explode('/', $data);
    return $name[3];
}
?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.ticket_system'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin/dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>                
                <a href="<?php echo e(route('infixTicket_list')); ?>"><?php echo app('translator')->get('lang.ticket_system'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.ticket_system'); ?> <?php echo app('translator')->get('lang.view'); ?></a>
            </div>
        </div>
    </div>
</section>



<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            
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
            <div class="row mt-0 p-3">
                <div class="col-lg-12 white-box">
                        
                      <div class="row">
                          <div class="col-lg-9">
                               <div class="row">
                                   <div class="col-lg-12">
                                        <h2><?php echo e($data->subject); ?></h2>
                                   </div>
                                   <div class="col-lg-12">
                                        <p><?php echo e(strip_tags($data->description)); ?></p>
                                   </div>
                               </div>
                               <?php if(file_exists(@$data->image)): ?>
                                <a href="<?php echo e(url('/').'/'.@$data->image); ?>" download>Download Attachment</a>
                               <?php endif; ?>
                              
                          </div>
                        
                          <div class="col-lg-3">
                                <p> <strong><?php echo app('translator')->get('lang.owner'); ?></strong>: <?php echo e(@$data->user->username); ?></p>
                                <p>
                                   <strong><?php echo app('translator')->get('lang.status'); ?></strong>: 
                                   <?php if($data->active_status == 0): ?>
                                   <span class="text-danger"><?php echo app('translator')->get('lang.pending'); ?></span>
                                   <?php endif; ?>
                                   <?php if($data->active_status == 1): ?>
                                   <span class="text-danger"><?php echo app('translator')->get('lang.close'); ?></span>
                                   <?php endif; ?>
                                   <?php if($data->active_status == 2): ?>
                                   <span class="text-warning"><?php echo app('translator')->get('lang.progress'); ?></span>
                                   <?php endif; ?>
                                    
                                </p>
                                <p>
                                    <strong><?php echo app('translator')->get('lang.priority'); ?></strong>: 
                                    <span class="ticket_priority"><?php echo e(@$data->ticket_priority->name); ?></span>
                                </p>
                                <p>
                                    <strong><?php echo app('translator')->get('lang.department'); ?></strong>: 
                                    <span class="ticket_priority"><?php echo e(@$data->ticket_department->name); ?></span>
                                </p>
                              
                                <p>
                                    <strong><?php echo app('translator')->get('lang.category'); ?></strong>: 
                                    <span class="ticket_category">
                                        <?php echo e(@$data->ticket_category->name); ?>

                                    </span>
                                </p>
                                <p> <strong><?php echo app('translator')->get('lang.created_at'); ?></strong>: <?php echo e(@$data->created_at ->diffForHumans()); ?></p>
                                <p> <strong><?php echo app('translator')->get('last'); ?> <?php echo app('translator')->get('lang.update'); ?></strong>: <?php echo e(@$data->updated_at->diffForHumans()); ?></p>
                          </div>
                      </div>

                      <div class="">
                             <div class="row">
                                    <input type="hidden" name="id"  value="<?php echo e(@$data->id); ?>">
                                    <div class="col-lg-8">

                                                <div class="infix_form_area">
                                                    <div class="container">
                                                            <?php if(Auth::user()->role_id == 7): ?>
                                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['user.comment_store'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                                                            <?php else: ?> 
                                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['admin.comment_store'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                                                           <?php endif; ?>
                                                            <input type="text" hidden value="<?php echo e(@$data->id); ?>" name="id" id="id">
                                                            <textarea class="common_text_area <?php echo e($errors->has('comment') ? ' is-invalid' : ''); ?>" name="comment" id="" cols="50" rows="10" placeholder="Messege.."></textarea>
                                                                <span class="focus-border"></span>
                                                                <?php if($errors->has('comment')): ?>
                                                                <span class="invalid-feedback pb-4 ticket_form" role="alert" >
                                                                    <strong><?php echo e($errors->first('comment')); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                            <div class="form_btn d-flex justify-content-between">
                                                                <div class="file_upload">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input <?php echo e($errors->has('file') ? ' is-invalid' : ''); ?> cursor_pointer" id="inputGroupFile04"
                                                                                aria-describedby="inputGroupFileAddon04" name="file">
                                                                            <label class="custom-file-label" for="inputGroupFile04">
                                                                                <svg class="upload_file svg-inline--fa fa-paperclip fa-w-14 icon  mr-10"
                                                                                    aria-hidden="true" data-prefix="fas" data-icon="paperclip" role="img"
                                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                                                    data-fa-i2svg="">
                                                                                    <path fill="currentColor"
                                                                                        d="M43.246 466.142c-58.43-60.289-57.341-157.511 1.386-217.581L254.392 34c44.316-45.332 116.351-45.336 160.671 0 43.89 44.894 43.943 117.329 0 162.276L232.214 383.128c-29.855 30.537-78.633 30.111-107.982-.998-28.275-29.97-27.368-77.473 1.452-106.953l143.743-146.835c6.182-6.314 16.312-6.422 22.626-.241l22.861 22.379c6.315 6.182 6.422 16.312.241 22.626L171.427 319.927c-4.932 5.045-5.236 13.428-.648 18.292 4.372 4.634 11.245 4.711 15.688.165l182.849-186.851c19.613-20.062 19.613-52.725-.011-72.798-19.189-19.627-49.957-19.637-69.154 0L90.39 293.295c-34.763 35.56-35.299 93.12-1.191 128.313 34.01 35.093 88.985 35.137 123.058.286l172.06-175.999c6.177-6.319 16.307-6.433 22.626-.256l22.877 22.364c6.319 6.177 6.434 16.307.256 22.626l-172.06 175.998c-59.576 60.938-155.943 60.216-214.77-.485z">
                                                                                    </path>
                                                                                </svg>
                                                                                <?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.Attachment'); ?></label>
                                                                                <span class="focus-border"></span>
                                                                                <?php if($errors->has('file')): ?>
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong><?php echo e($errors->first('file')); ?></strong>
                                                                                </span>
                                                                                <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="primary-btn small fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.comment'); ?></button>
                                                            </div>
                                                            
                                                            <?php echo e(Form::close()); ?>

                                                        <div class="comments_public pt-4">
                                                            
                                                            <?php if(count($comment) > 0): ?>
                                                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(!$item->comment_id): ?>
                                                                <?php 
                                                                    $path = $item->user->profile->image;
                                                                    if(empty($path)){
                                                                    $path = 'public/backEnd/img/admin/staff.png';
                                                                    }
                                                                ?>
                                                                    <div class="single_comment mb-3">
                                                                        <div class="comments-thumb d-flex">
                                                                        <img src="<?php echo e(asset($path)); ?>" alt="" class="img-fluid">
                                                                            <p class="comment-meta"><span><a href="#"> <?php echo e($item->user->username); ?></a></span> <br> <small><?php echo e($item->created_at->diffForHumans()); ?></small></p>
                                                                        </div>
                                                                        
                                                                        <div class="comments_public-info">
                                                                            <?php if(Auth::user()->role_id == 7): ?>
                                                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['user.comment_reply'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                                                                            <?php else: ?> 
                                                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['admin.comment_reply'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                                                                            <?php endif; ?>
                                                                               <p class="pl-4 ml-5 mb-4"><span class="text-justify text-capitalize"><?php echo e(strip_tags($item->comment)); ?></span>
                                                                                
                                                                                <?php if($item->file): ?>
                                                                                    <?php if(file_exists($item->file)): ?>
                                                                                       <br><img src="<?php echo e(asset($item->file)); ?>" class="pt-2 ticket_username_input">
                                                                                    <?php endif; ?>
                                                                                <br> <small><a target="_blank" href="<?php echo e(url('download-comment-document/'.showPicName($item->file))); ?>"> Download file</a></small>
                                                                                <?php endif; ?>
                                                                               </p>
                                                                               <div class="row">
                                                                                <div class="col-lg-6">
                                                                                </div> 

                                                                                <div class="col-lg-6">
                                                                                    <div id="<?php echo e($item->id); ?>"></div>
                                                                                </div>
                                                                               </div>
                                                                                
                                                                                <input value="" hidden class=" comment_id"  name="comment_id" id="comment_id">
                                                                                
                                                                            <?php echo e(Form::close()); ?>

                                                                             <button class="primary-btn small fix-gr-bg submit_comment<?php echo e($item->id); ?>" id="t" type="submit" onclick="submit_comment(<?php echo e($item->id); ?>)"><?php echo app('translator')->get('lang.reply'); ?></button>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>                                                            

                                                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($item->id == $value->comment_id): ?>
                                                            <?php 
                                                                $path = $value->user->profile->image;
                                                                if(empty($path)){
                                                                    $path = 'public/frontend/img/profile/1.png';
                                                            }
                                                            ?>
                                                              <div class="single_comment_replay mb-3">
                                                                    <div class="comments-thumb d-flex">
                                                                    <p class="comment-meta"><span><a href="#"> <?php echo e($value->user->username); ?></a></span> <br> <small><?php echo e($value->created_at->diffForHumans()); ?></small></p>
                                                                            <img src="<?php echo e(asset($path)); ?>" alt="" class="img-fluid">
                                                                    </div>
                                                                    <div class="comments_public-info" id="reply_comment">
                                                                        <p class="pr-4 mr-5 mb-3" class="text-right"><span class="text-left text-capitalize"><?php echo e(strip_tags($value->comment)); ?></span>
                                                                                <?php if($value->file): ?>
                                                                                <?php if(file_exists($value->file)): ?>
                                                                                       <br><img src="<?php echo e(asset($value->file)); ?>" class="pt-2 ticket_username_input" width="200" >
                                                                                    <?php endif; ?>
                                                                                   <br> <small><a target="_blank" href="<?php echo e(url('download-comment-document/'.showPicName($value->file))); ?>"> <?php echo app('translator')->get('lang.download_file'); ?></a></small>
                                                                             <?php endif; ?>
                                                                        </p>
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                           
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                          <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                </div>  
                                    </div>  
                                </div>
                        </div>
                </div> 
            </div>

    </div>
</section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/digital.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/Modules/Ticket/Resources/views/backend/ticket_view.blade.php ENDPATH**/ ?>