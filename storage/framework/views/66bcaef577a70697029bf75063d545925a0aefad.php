<?php $__env->startSection('title', 'Admin | Media Files'); ?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<img src="storage/<?php echo e(Session::get('file')); ?>">
<?php endif; ?>

<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">

        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Media Files</h3>
                    <span>Media Files activity</span>
                </div>
            </div>
            
            <div class="panel-body panel-body-table">

                <form action="<?php echo e(route('store')); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input name="image" type="file" />
                    <br>
                    <input type="submit" value="Upload" class="btn btn-info" />
                </form>

            </div>

            <div class="panel-body panel-body-table">

                <img src="<?php echo e(asset('storage/upload/287632.jpg')); ?>" alt="" style="width:50%; 
                                        height:auto; 
                                        text-align:center;
                                        margin-top: 10px;
                                        margin-bottom: 10px;" />

            </div>
        </div>
        <!-- END PROJECTS BLOCK -->

    </div>
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/upload/upload.blade.php ENDPATH**/ ?>