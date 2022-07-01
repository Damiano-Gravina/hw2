

<?php $__env->startSection('title', '| Registrazione'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/login.js')); ?>" defer></script>   
<!--<script type="text/javascript">                              //definire il tipo dello script è necessario per dire che il contenuto sarà una variabile costante
    const REGISTER_ROUTE = "<?php echo e(route('register')); ?>";          //variabile costante che definisce il nome della route collegata a questa view
</script>-->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('error'); ?>
<section class="hide">
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Registrazione non corretta⚠️</div>
        <p>Modulo non compilato correttamente</p>
    </article>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('form'); ?>
<form name='regist' method='post' autocomplete="off">
    <div class="name">
        <label id="label_name"><strong>Name</strong> <input type='text' name='name' class='label_class'></label>
        <span class = "hide"></span>
    </div>
    <div class="surname">
        <label><strong>Surname </strong><input type='text' name='surname' class='label_class'></label>
        <span class = "hide"></span>
    </div>
    <div class="username">
        <label><strong>Username </strong><input type='text' name='username' class='label_class'></label>
        <span class = "hide"></span>
    </div>
    <div class="email">
        <label><strong>E-mail </strong><input type='text' name='email' class='label_class'></label>
        <span class = "hide"></span>
    </div>
    <div class="password">
        <label><strong>Password </strong><input type='text' name='password' class='label_class'></label>
        <span class = "hide"></span>
    </div> 
    <div class="confirm_password">  
        <label><strong>Confirm PW </strong><input type='text' name='confirm_password' class='label_class'></label>
        <span class = "hide"></span>
    </div>
    <label>&nbsp;<input type='submit' id="regist" value='Regist'></label>
    <a href="login.php">(Already have an account?)</a>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.access', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel\resources\views/Register.blade.php ENDPATH**/ ?>