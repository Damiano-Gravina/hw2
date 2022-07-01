

<?php $__env->startSection('title', '| My Profile'); ?>

<?php $__env->startSection('user'); ?>
<?php echo e($user = Session::get('userData')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/myProfile.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section>
    <div id="user_image">
        <span><?php echo e($user['Nome'][0]); ?><?php echo e($user['Cognome'][0]); ?></span>
    </div>

    <div id="username"><?php echo e($user['Username']); ?></div>

    <div id='userInfo'>
        <div>
            <span> Nome: <?php echo e($user['Nome']); ?></span>
            <span> Cognome: <?php echo e($user['Cognome']); ?></span>
        </div>
        <div>Numero di annunci pubblicati: <?php echo e($user['Nposts']); ?></div>
        <div>Email collegata all'account: <?php echo e($user['Email']); ?></div>
    </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profiles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel\resources\views/myProfile.blade.php ENDPATH**/ ?>