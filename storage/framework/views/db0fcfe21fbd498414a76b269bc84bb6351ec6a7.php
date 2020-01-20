<?php $__env->startSection('title', 'Admin | Media Files'); ?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
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

        <form class="form-horizontal" method="POST" action="<?php echo e(route('updatefileinfo', ['id' => $files->id ])); ?>">
            <?php echo csrf_field(); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit File Information<strong>
                            (<?php echo e($files->file_name); ?>.<?php echo e($files->file_format); ?>)</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="profile-image">
                                <?php switch($files->file_type):
                                case (1): ?>

                                <video class="video" width="100%" height="auto" controls
                                    poster="<?php echo e(URL::to('img/Files_icon/video-icon-preview.png')); ?>">
                                    <source src="<?php echo e(Storage::url($files->file_address)); ?>" type="video/mp4">
                                    
                                    Your browser does not support the video tag.
                                </video>

                                <?php break; ?>
                                <?php case (2): ?>


                                <audio controls style="margin:20%;">
                                    
                                    <source src="<?php echo e(Storage::url($files->file_address)); ?>" type="audio/mpeg">
                                  Your browser does not support the audio element.
                                  </audio> 

                                

                                <?php break; ?>
                                <?php case (3): ?>


                                <embed src="<?php echo e(Storage::url($files->file_address)); ?>" width="100%" height="375">

                                

                                <?php break; ?>
                                <?php case (4): ?>

                                <img src="<?php echo e(Storage::url($files->file_address)); ?>" alt="<?php echo e($files->file_name); ?>"
                                    style="height: auto; width: 100%;" />

                                <?php break; ?>
                                <?php default: ?>

                                <img src="<?php echo e(URL::to('AgroPersianLogo.ico')); ?>" alt="<?php echo e($files->file_name); ?>"
                                    style="height: auto; width: 100%;" />

                                <?php endswitch; ?>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-3 control-label">FileName</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="filename" type="text"
                                            class="form-control <?php $__errorArgs = ['filename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filename"
                                            value="<?php echo e($files->file_name); ?>" required autocomplete="filename" autofocus>
                                    </div>
                                    <?php $__errorArgs = ['filename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="help-block" style="color:red;" role="alert"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="description" type="text"
                                            class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="description" value="<?php echo e($files->file_description); ?>" required
                                            autocomplete="description" autofocus>
                                    </div>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="help-block" style="color:red;" role="alert"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="panel-footer">
                    
                    <a href="<?php echo e(route('viewfile')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/file/edit-file.blade.php ENDPATH**/ ?>