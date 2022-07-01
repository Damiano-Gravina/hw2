

<?php $__env->startSection('title', '| My Profile'); ?>

<?php $__env->startSection('user'); ?>
<?php echo e($user = Session::get('userData')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/myProfile.css')); ?>">
<script src="<?php echo e(asset('js/userProfile.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="hide" id="compiler">
    <form action="changeShopDetails">
    <span>Compilazione dati shop</span>
        <span>
            Indirizzo dello shop: 
        <input type="text" name = "shop_address">
        </span>

        <span>
            Orari di apertura: 
        <input type="text" name = "shop_open">
        </span>

        <a id = "cancel_modification_button" href="">Annulla</a>
        <input id = "modify_details" type="submit" value="Applica Modifiche">
    </form>
</div> 

<section id="shop_section">
    <div id="user_image">
        <span><?php echo e($user['Nome'][0]); ?><?php echo e($user['Cognome'][0]); ?></span>
    </div>

    <div id="username"><?php echo e($user['Username']); ?></div>

    <div id='userInfo'>
        <div>Numero di annunci pubblicati: <?php echo e($user['Nposts']); ?></div>
        <div>Email collegata all'account: <?php echo e($user['Email']); ?></div>
        <div>Sede del negozio: <?php echo e($user['SedeNegozio']); ?></div>
        <div>Orari di apertura: <?php echo e($user['OrariApertura']); ?></div>
        <div id = "visualizeEmail" class = "hide"><?php echo e($user['VisualizeEmail']); ?></div>
        <a id = "email_button" href="changeEmailVisualization"></a>
        <a id = "shop_details_button" href="">Modifica Indirizzo e Orari</a>
    </div>


</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profiles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel(Esame)\resources\views/myProfileShop.blade.php ENDPATH**/ ?>