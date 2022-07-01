

<?php $__env->startSection('title', '| New Post'); ?>

<?php $__env->startSection('header'); ?>
<script src="<?php echo e(asset('js/post.js')); ?>" defer></script>
<link rel="stylesheet" href="<?php echo e(asset('css/post.css')); ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class= "hide">
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Errore compilazione⚠️</div>
        <p class = "hide" id="title_error">Il titolo deve essere compreso tra 0 e 75 caratteri</p>
        <p class = "hide" id="text_error">Il testo deve essere compreso tra 0 e 255 caratteri</p>
    </article>
</section>


<form id="post" method = "post">
    <?php echo csrf_field(); ?>
    <label><input type=text name="title" id="postTitle" value = "Titolo annuncio"></label>
    <textarea name="text" id="postText"></textarea>
    <input type='submit' id="publish" value='Pubblica annuncio'>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profiles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel\resources\views/createPost.blade.php ENDPATH**/ ?>