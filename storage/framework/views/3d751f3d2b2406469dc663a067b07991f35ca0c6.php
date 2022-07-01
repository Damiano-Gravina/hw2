

<?php $__env->startSection('title', '| My Profile'); ?>

<?php $__env->startSection('user'); ?>
<?php echo e($user = Session::get('userData')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/userPage.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section>
    <div id="user_image">
        <span><?php echo e($user['Nome'][0]); ?><?php echo e($user['Cognome'][0]); ?></span>
    </div>

    <div id="username"><?php echo e($user['Username']); ?></div>
    <div id="num_posts">Numero di annunci pubblicati: <?php echo e($user['Nposts']); ?></div>
    <div id="email">Contatta il venditore per il suo annuncio: <?php echo e($user['Email']); ?></div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profiles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel\resources\views/UserProfile.blade.php ENDPATH**/ ?>