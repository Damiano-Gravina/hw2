

<?php $__env->startSection('title', '| Post Published'); ?>

<?php $__env->startSection('header'); ?>
<script src="<?php echo e(asset('js/post.js')); ?>" defer></script>
<link rel="stylesheet" href="<?php echo e(asset('css/post.css')); ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id = 'published_header'>
    <div id = 'published'>Il post è stato eliminato</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profiles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel(Esame)\resources\views/deletedPost.blade.php ENDPATH**/ ?>