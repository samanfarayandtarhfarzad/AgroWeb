<?php $__env->startSection('title', 'Agro Persian | Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="login-container">

    <div class="login-box animated fadeInDown">
        <div class="" style="text-align:center;">
            <img src="<?php echo e(URL::to('AgroPersianLogo.ico')); ?>" alt="AgroPersian" style="width:40%; 
            height:auto; 
            text-align:center;
            margin-top: 30px;
            margin-bottom: 40px;">
        </div>
        <div class="login-body">
            <div class="login-title"><strong>Welcome</strong>, Please <?php echo e(__('Login')); ?></div>
            <form action="<?php echo e(route('login')); ?>" class="form-horizontal" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <input id="email" type="email" style="font-size:15px;" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" required autocomplete="email" autofocus>

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input id="password" type="password" style="font-size:15px;"
                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required
                            autocomplete="current-password" placeholder="Password">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 class=" pull-left"">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                <?php echo e(old('remember') ? 'checked' : ''); ?>>

                            <label class="form-check-label" for="remember">
                                <p style="color:#fbfbfb;"><?php echo e(__('Remember Me')); ?></p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-lg" style="width:100%; 
                        border-radius: 5px; background-color:#8cc63f;">
                            <?php echo e(__('Login')); ?>

                        </button>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </form>
        </div>
        
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AgroPersian\resources\views/auth/login.blade.php ENDPATH**/ ?>