<?php $__env->startSection('title', 'Agro Persian'); ?>

<?php $__env->startSection('styles'); ?>
<!-- Styles -->
<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="flex-center position-ref full-height">
    <?php if(Route::has('login')): ?>
    <div class="top-right links">
        <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(url('/')); ?>">Home</a>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">Login</a>

        <?php if(Route::has('register')): ?>
        <a href="<?php echo e(route('register')); ?>">Register</a>
        <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="content">
        <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>
        <div class="title m-b-md">
            Agro Persian
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/index.blade.php ENDPATH**/ ?>