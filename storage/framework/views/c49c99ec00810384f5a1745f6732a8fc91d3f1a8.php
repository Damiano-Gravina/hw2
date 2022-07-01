
<!--PER IL PROSSIMO HOMEWORK:
    --Migliorare la grafica della home, il resto mi piace.
    --Usare le api di spotify per i link youtube.
    --Aggiungere la possibilità di inserire i post che ti interessano su un'altra pagina aggiungendoli ai preferiti.
-->



<?php $__env->startSection('title','| Home'); ?>

<?php $__env->startSection('user'); ?>
<?php echo e($user = Session::get('userData')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
<script src="<?php echo e(asset('js/home.js')); ?>" defer></script>  
<link rel="stylesheet" href="<?php echo e(asset('css/homepage.css')); ?>"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<!--<script type="text/javascript">                              //definire il tipo dello script è necessario per dire che il contenuto sarà una variabile costante
    const REGISTER_ROUTE = "<?php echo e(route('register')); ?>";          //variabile costante che definisce il nome della route collegata a questa view
</script>-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top'); ?>
<div id="title_image">
            <div id="icon">🦊</div>
            <section>
                <div id="user_image">
                    <span><?php echo e($user['Nome'][0]); ?><?php echo e($user['Cognome'][0]); ?><span>
                </div>
                <div> <?php echo e($user['Nome']); ?> <?php echo e($user['Cognome']); ?></div>
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
    <!-- <a href="https://www.youtube.com/watch?v=UP2XoGfhJ1Y"><span class="material-symbols-outlined">play_circle</span>Blues</a>
    <a href="https://www.youtube.com/watch?v=tAGnKpE4NCI&list=PLZN_exA7d4RVmCQrG5VlWIjMOkMFZVVOc"><span class="material-symbols-outlined">play_circle</span>Rock</a>
    <a href="https://www.youtube.com/watch?v=WxnN05vOuSM&list=PLw6p6PA8M2miu0w4K1g6vQ1BHUBeyM4_-"><span class="material-symbols-outlined">play_circle</span>Hard Rock</a>
    <a href="https://www.youtube.com/watch?v=xnKhsTXoKCI&list=PLhQCJTkrHOwSX8LUnIMgaTq3chP1tiTut"><span class="material-symbols-outlined">play_circle</span>Metal</a>
    <a href="https://www.youtube.com/watch?v=BrRBWU-EfTA"><span class="material-symbols-outlined">play_circle</span>Indie</a>
    <a href="https://www.youtube.com/watch?v=OPf0YbXqDm0&list=PLMC9KNkIncKtPzgY-5rmhvj7fax8fdxoj"><span class="material-symbols-outlined">play_circle</span>Pop</a>
    <a href="https://www.youtube.com/watch?v=AZals4U6Z_I"><span class="material-symbols-outlined">play_circle</span>Lo-fi</a>
    <a href="https://www.youtube.com/playlist?list=PLGl0_ap7UnS8IL7XhVcJEkN5qWJeou65k"><span class="material-symbols-outlined">play_circle</span>Hit Italiane</a> -->
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel\resources\views/home.blade.php ENDPATH**/ ?>