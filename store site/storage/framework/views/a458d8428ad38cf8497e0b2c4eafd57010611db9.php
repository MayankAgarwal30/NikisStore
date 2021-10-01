<!DOCTYPE html>
<html>
<head>
	<title><?php echo e($item_details->title); ?> <?php echo app('translator')->get('lang.license'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/common_style.css')); ?>">
    <style>
        body{
            font-family: "Open Sans", sans-serif;
        }
    </style>
</head>

<body>
    <?php
        $logo_conditions = ['title'=>'Logo', 'active_status'=>1];
        $logo = dashboard_background($logo_conditions);
    ?>
    <img src="<?php echo e(@$logo ? asset(@$logo->image) : asset('public/frontend/img/Logo.png')); ?>" alt="" class="dm_max_width_123">
    <h2 class="dm_title_style"><?php echo app('translator')->get('lang.license_certificate'); ?></h2>
    <p></p>
    <table class="sm_padding_left">
        <tr>
            <td class="dm_font_weight"><?php echo app('translator')->get('lang.licensors_author_username'); ?>:</td>
            <td><?php echo e($author_details->username); ?></td>
        </tr>
        <tr>
            <td class="dm_font_weight"><?php echo app('translator')->get('lang.license'); ?>:</td>
            <td><?php echo e($user_details->username); ?></td>
        </tr>
        <tr>
            <td class="dm_font_weight"><?php echo app('translator')->get('lang.item_title'); ?>:</td>
            <td><?php echo e($item_details->title); ?></td>
        </tr>
        <tr>
            <td class="dm_font_weight"><?php echo app('translator')->get('lang.item_URL'); ?>:</td>
            <td><?php echo e(route('singleProduct',[str_replace(' ','-',$item_details->title),$item_details->id])); ?></td>
        </tr>
         <tr>
            <td class="dm_font_weight"><?php echo app('translator')->get('lang.item_ID'); ?>:</td>
            <td><?php echo e($item_details->id); ?></td>
        </tr>
         <tr>
            <td class="ft"><?php echo app('translator')->get('lang.item_purchase_code'); ?>:</td>
            <td><?php echo e(@$purchase_code->purchase_code); ?></td>
        </tr>
         <tr>
            <td class="ft"><?php echo app('translator')->get('lang.item_purchase_date'); ?>:</td>
            <td><?php echo e(@$purchase_code->created_at); ?></td>
        </tr>
    </table>
</body>
</html><?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/frontend/vendor/licence_pdf.blade.php ENDPATH**/ ?>