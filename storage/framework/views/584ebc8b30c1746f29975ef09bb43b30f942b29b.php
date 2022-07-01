

<?php $__env->startSection('title','| Home'); ?>

<?php $__env->startSection('user'); ?>
<?php echo e($user = Session::get('userData')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
<script src="<?php echo e(asset('js/home.js')); ?>" defer></script>  
<link rel="stylesheet" href="<?php echo e(asset('css/homepage.css')); ?>"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top'); ?>
<div id="title_image">
            <div id="icon">🦊</div>
            <section>
                <div id="user_image">
                    <span><?php echo e($user['Nome'][0]); ?><?php echo e($user['Cognome'][0]); ?><span>
                </div>
                    <?php if($user['Negozio'] == 0): ?>
                    <div><?php echo e($user['Nome']); ?> <?php echo e($user['Cognome']); ?></div>
                    <?php endif; ?>
                <div class='hide' id='UserId'><?php echo e($user['Id']); ?></div>
            </section>

            <div id="option_bar">
                <a href="<?php echo e(route('userProfile')); ?>"><strong>My profile</strong></a>
                <a href="<?php echo e(route('favourite')); ?>"><strong>Favourite</strong></a>
                <a href="<?php echo e(route('logout')); ?>"><strong>Logout</strong></a>
            </div>
            <div id="shade"></div>
            <strong>Buy and sell music tools</strong>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('playlist'); ?>
<section id="musicPlaylists">
    <span>Ascolta qualcosa mentre sei qui:</span>
    
    <section id="spotifyMusic">
        <span>Oppure ascolta qualcosa da spotify:</span>
        <form>
            <input type="submit" value="Artista Randomico" class = "noButtonEsthetic" id="spotifyButton">
        </form>
    
    </section>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel(Esame)\resources\views/home.blade.php ENDPATH**/ ?>