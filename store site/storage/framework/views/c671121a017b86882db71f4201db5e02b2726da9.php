<?php 
    $success_message = __('lang.success_message');
    $success_alert = __('lang.success_alert');
    $failed_message = __('lang.failed_message');
    $failed_alert = __('lang.failed_alert');
?>

<?php if(session()->has('message-success')): ?>
    <script>  toastr.success("<?php echo e($success_message); ?>","<?php echo e($success_alert); ?>", {  timeOut: 5000 }); </script>
<?php elseif(session()->has('message-danger')): ?>
    <script> toastr.error("<?php echo e($failed_message); ?>","<?php echo e($failed_alert); ?>", { timeOut: 5000 }); </script>
<?php endif; ?> 
<?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/backend/partials/alertMessage.blade.php ENDPATH**/ ?>