

<?php $__env->startSection('title', '| Favourite'); ?>

<?php $__env->startSection('nFavourites'); ?>
<?php echo e($nFavourites = Session::get('numFavourite')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<script src="<?php echo e(asset('js/favourite.js')); ?>" defer></script>
<link rel="stylesheet" href="<?php echo e(asset('css/favourite.css')); ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div id ="numFavourites">
    <span>Numero di Preferiti:</span>
    <div id="number"><?php echo e($nFavourites); ?></div>
</div>

<main>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profiles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel(Esame_v2)\resources\views/favourite.blade.php ENDPATH**/ ?>