<?php $__env->startSection('title', 'Admin | Users'); ?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Users</h3>
                    <span>Users activity</span>
                </div>
                
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a>
                            </li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class=" text-primary">
                            <th> ID </th>
                            <th> Username </th>
                            <th> Firstname </th>
                            <th> Lastname </th>
                            <th> Role </th>
                            <th> Email </th>
                            <th> Status </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row->id); ?></td>
                                <td><?php echo e($row->username); ?></td>
                                <td><?php echo e($row->firstname); ?></td>
                                <td><?php echo e($row->lastname); ?></td>
                                <td>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($row1->role_id) == ($row->roleid) ): ?>
                                    <?php echo e($row1->role_name); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($row->email); ?></td>
                                <td>
                                    <?php if($row->status == 1): ?>
                                    <span class="label label-success label-form">active</span>
                                    <?php else: ?>
                                    <span class="label label-danger label-form">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.user-edit', ['id' => $row->id ])); ?>"
                                        class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="#" class="mb-control btn btn-danger" data-box="#mb-userdelete<?php echo e($row->id); ?>">Delete</a>
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



<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- danger with sound -->
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-userdelete<?php echo e($row->id); ?>">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Warning!</div>
            <div class="mb-content">
                <p style="font-size: 20px;">Are you sure you want to remove this user (<?php echo e($row->username); ?>) ?</p>
                
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.user-delete', ['id' => $row->id ])); ?>"
                        class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end danger with sound -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/admin/user.blade.php ENDPATH**/ ?>