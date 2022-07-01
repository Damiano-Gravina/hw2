

<?php $__env->startSection('title', '| Login'); ?>

<?php $__env->startSection('script'); ?>   
<script src="<?php echo e(asset('js/login.js')); ?>" defer></script>   
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('error'); ?>
<div>
<?php if(Session::get('error')): ?>
<section>
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Login non valido⚠️</div>
        <p><?php echo e(Session::get('error')); ?></p>
    </article>
</section>
<?php endif; ?>
</div>


<section class="hide">
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Login non valido⚠️</div>
        <p>Inserisci nome utente e password</p>
    </article>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<form name='login' method='post'>
    <?php echo csrf_field(); ?>
    <label id="label_username"><strong>Username </strong> <input type='text' name='username' class='label_class'></label>
    <label><strong> Password </strong><input type='password' name='password' class='label_class' id="label_password"></label> 
    <span class="material-symbols-outlined">visibility_off</span>
    <label>&nbsp;<input type='submit' id="regist" value='Login'></label>
    <a href="<?php echo e(route('register')); ?>">(Don't have an account?)</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.access', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel(Esame_v2)\resources\views/login.blade.php ENDPATH**/ ?>