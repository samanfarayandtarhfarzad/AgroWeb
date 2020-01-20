<?php $__env->startSection('title', 'Admin | Media Files'); ?>

<?php $__env->startSection('styles'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('dropzone-5.5.0/dist/min/dropzone.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4><span class="fa fa-download modal-title" id="largeModalHead"></span> Files Upload</h4>
            </div>
            <form action="<?php echo e(route('uploadfile')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-body">

                <input name="file[]" type="file" multiple accept=".jpg, .png, .mp4, .mp3, .pdf" />

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Upload</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>


            

        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <?php if(session('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo e(session('success')); ?></strong>
        </div>
        <?php endif; ?>

        <?php if(session('danger')): ?>
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo e(session('danger')); ?></strong>
        </div>
        <?php endif; ?>

        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="col-md-12">

        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Media Files</h3>
                    <span>Media Files activity</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_large">Upload File</button>
                    
                </ul>
            </div>
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Format</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>User Name</th>
                                <th>Modify</th>
                                <th>Used</th>
                                <th>Download</th>
                                <th>Edit</th>
                                <th>Replase File</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align:center;">
                                    <?php switch($file->file_type):
                                    case (1): ?>

                                    <img src="<?php echo e(URL::to('img/Files_icon/video-icon.png')); ?>"
                                        alt="<?php echo e($file->file_name); ?>" style="height: auto; width: 100px;" />

                                    <?php break; ?>
                                    <?php case (2): ?>

                                    <img src="<?php echo e(URL::to('img/Files_icon/audio-icon.png')); ?>"
                                        alt="<?php echo e($file->file_name); ?>" style="height: auto; width: 100px;" />

                                    <?php break; ?>
                                    <?php case (3): ?>

                                    <img src="<?php echo e(URL::to('img/Files_icon/ebook-icon.png')); ?>"
                                        alt="<?php echo e($file->file_name); ?>" style="height: auto; width: 100px;" />

                                    <?php break; ?>
                                    <?php case (4): ?>

                                    <img src="<?php echo e(Storage::url($file->file_address)); ?>" alt="<?php echo e($file->file_name); ?>"
                                        style="height: auto; width: 100px;" />

                                    <?php break; ?>
                                    <?php default: ?>

                                    <img src="<?php echo e(URL::to('AgroPersianLogo.ico')); ?>" alt="<?php echo e($file->file_name); ?>"
                                        style="height: auto; width: 100px;" />

                                    <?php endswitch; ?>
                                </td>
                                <td><strong><?php echo e($file->file_name); ?></strong></td>
                                <td><?php echo e($file->file_size); ?></td>
                                <td><?php echo e($file->file_format); ?></td>
                                <td>
                                    <?php $__currentLoopData = $media_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($row1->id) == ($file->file_type) ): ?>
                                    <?php echo e($row1->type); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($file->file_description); ?></td>
                                <td>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($row2->id) == ($file->user_id) ): ?>
                                    <?php echo e($row2->username); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($file->updated_at->diffForHumans()); ?></td>
                                <td>
                                    <?php if($file->used == 1): ?>
                                    <span class="label label-success label-form">used</span>
                                    <?php else: ?>
                                    <span class="label label-danger label-form">Not used</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('downloadfile', ['id' => $file->id ])); ?>"
                                        class="btn btn-info">Download</a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('editfile', ['id' => $file->id ])); ?>"
                                        class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal_<?php echo e($file->id); ?>">Replace</button>
                                </td>
                                <td>
                                    <a href="#" class="mb-control btn btn-danger"
                                        data-box="#mb-filedelete<?php echo e($file->id); ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- END PROJECTS BLOCK -->

    </div>
</div>

<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal" id="modal_<?php echo e($file->id); ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4><span class="fa fa-download modal-title" id="largeModalHead"></span> Replace File
                    <strong><?php echo e($file->file_name); ?></strong></h4>
            </div>
            <form action="<?php echo e(route('updatefile', ['id' => $file->id ])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">

                    <input name="file" type="file" accept=".jpg, .png, .mp4, .mp3, .pdf" />

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

            
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- danger with sound -->
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-filedelete<?php echo e($file->id); ?>">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Warning!</div>
            <div class="mb-content">
                <p style="font-size: 20px;">Are you sure you want to remove this File
                    (<?php echo e($file->file_name); ?>.<?php echo e($file->file_format); ?>) ?</p>
                
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <form action="<?php echo e(route('deletefile', ['id' => $file->id] )); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-success btn-lg">Yes</button>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end danger with sound -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>


<script type="text/javascript" src="<?php echo e(URL::to('dropzone-5.5.0/dist/dropzone.js')); ?>"></script>
<script type="text/javascript" >
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone",{
        autoProcessQueue: false,
        parallelUploads:100,
        chunking: true,
        forceChunking: true,
        chunkSize: 2000000,
        maxFilesize: 1000,
        //maxFiles: (limit) ? limit : 25,
        maxFiles : 100,
        addRemoveLinks: true,
        acceptedFiles: ".png, .jpeg, .jpg, .mp3, .mpeg, .mp4, .mkv, .mpeg4, .pdf, .txt"
    });

    $('#submit-files').click(function(){
        myDropzone.processQueue();
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/file/index.blade.php ENDPATH**/ ?>