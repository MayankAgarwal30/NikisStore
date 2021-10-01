<!DOCTYPE html>
<html>
<head>
	<title><?php echo e($item_details->title); ?> <?php echo app('translator')->get('lang.license'); ?></title>
</head>
<style>
    .ft{
        font-weight: bold;
    }
    .pl{
        padding-left:100px
    }
    .title_style{
        font-weight: bold; 
        font-size:3em;
    }
    .mw{
        max-width:123px;
    }
</style>
<body>
    <?php
        $logo_conditions = ['title'=>'Logo', 'active_status'=>1];
        $logo = dashboard_background($logo_conditions);
    ?>
 
    <img src="<?php echo e(@$logo ? asset(@$logo->image) : asset('public/frontend/img/Logo.png')); ?>" alt="">
    <h2 class="title_style"><?php echo app('translator')->get('lang.license_certificate'); ?></h2>
    <p></p>
    <table class="pl">
        <tr>
            <td class="ft"><?php echo app('translator')->get('lang.licensors_author_username'); ?>:</td>
            <td><?php echo e($author_details->username); ?></td>
        </tr>
        <tr>
            <td class="ft"><?php echo app('translator')->get('lang.license'); ?>:</td>
            <td><?php echo e($user_details->username); ?></td>
        </tr>
        <tr>
            <td class="ft"><?php echo app('translator')->get('lang.item_title'); ?>:</td>
            <td><?php echo e($item_details->title); ?></td>
        </tr>
        <tr>
            <td class="ft"><?php echo app('translator')->get('lang.item_URL'); ?>:</td>
            <td><?php echo e(route('singleProduct',[str_replace(' ','-',$item_details->title),$item_details->id])); ?></td>
        </tr>
         <tr>
            <td class="ft"><?php echo app('translator')->get('lang.item_ID'); ?>:</td>
            <td><?php echo e($item_details->id); ?></td>
        </tr>
         <tr>
            <td class="ft"><?php echo app('translator')->get('lang.item_purchase_code'); ?>:</td>
            <td><?php echo app('translator')->get('lang.free'); ?></td>
        </tr>
    </table>
</body>
</html><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/vendor/free_licence_pdf.blade.php ENDPATH**/ ?>