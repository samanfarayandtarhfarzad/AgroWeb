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
                <ul class="panel-controls" style="margin-top: 2px;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_large">Add</button>
                    
                </ul>
            </div>
            
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Row</th>
                                <th>File</th>
                                <th>File Name</th>
                                <th>Media Type</th>
                                <th>Description</th>
                                <th>Username</th>
                                <th>File Address</th>
                                <th>Status</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mediafiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row->medialibrary_id); ?></td>
                                <td>
                                    
                                    
                                    <img src="<?php echo e($row->file_name); ?>" alt="<?php echo e($row->file_name); ?>" style="width:50%; 
                                        height:auto; 
                                        text-align:center;
                                        margin-top: 10px;
                                        margin-bottom: 10px;" />
                                </td>
                                <td><?php echo e($row->file_name); ?></td>
                                <td>
                                    <?php $__currentLoopData = $media_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($row1->id) == ($row->media_type) ): ?>
                                    <?php echo e($row1->type); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($row->description); ?></td>
                                <td>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($row2->id) == ($row->user_id) ): ?>
                                    <?php echo e($row2->username); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($row->file_address); ?></td>
                                <td>
                                    <?php if($row->used_in_content_group == 1): ?>
                                    <span class="label label-success label-form">Used</span>
                                    <?php else: ?>
                                    <span class="label label-danger label-form">Not Used</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($row->updated_at); ?></td>
                                
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


<div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4><span class="fa fa-download modal-title" id="largeModalHead"></span> Dropzone</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo e(route('admin.media.mediafile')); ?>" method="POST" class="dropzone"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/admin/media/mediafile.blade.php ENDPATH**/ ?>