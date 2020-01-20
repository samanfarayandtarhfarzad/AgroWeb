<?php $__env->startSection('title', 'Agro Persian'); ?>

<?php $__env->startSection('styles'); ?>
<!-- Styles -->
<link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- START PAGE CONTAINER -->
<div class="page-container page-navigation-top">
    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal">
            <li class="xn-logo">
                <a href="index.html">Agro Persian</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <?php if(auth()->guard()->guest()): ?>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-user"></span> My Account</a>
                <ul>
                    <li class="xn-openable">
                        <a href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                    <?php if(Route::has('register')): ?>
                    <li class="xn-openable">
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php else: ?>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-user"></span><?php echo e(Auth::user()->username); ?></a>
                <ul>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-user"></span>Profile</a>
                    </li>
                </ul>
            </li>
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->
            <?php endif; ?>
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">




































        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/site/index.blade.php ENDPATH**/ ?>