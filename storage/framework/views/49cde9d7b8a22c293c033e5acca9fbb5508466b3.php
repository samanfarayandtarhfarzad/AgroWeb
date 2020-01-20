<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-2"></div>
</div><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/partial/alert.blade.php ENDPATH**/ ?>