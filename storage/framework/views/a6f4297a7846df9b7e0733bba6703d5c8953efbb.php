

<?php $__env->startSection('title', '| Registrazione'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/regist.js')); ?>" defer></script>   
<!--<script type="text/javascript">                              //definire il tipo dello script è necessario per dire che il contenuto sarà una variabile costante
    const REGISTER_ROUTE = "<?php echo e(route('register')); ?>";          //variabile costante che definisce il nome della route collegata a questa view
</script>-->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('error'); ?>

<div>
<?php if(Session::get('error')): ?>
<section>
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Login non valido⚠️</div>
        <?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>
            <?php echo e($err); ?>

        </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </article>
</section>
<?php endif; ?>
</div>

<section class="hide">
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Registrazione non corretta⚠️</div>
        <p>Modulo non compilato correttamente</p>
    </article>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('form'); ?>
<form name='regist' method='post' autocomplete="off">
    <?php echo csrf_field(); ?>                      <!--METTILO OGNI VOLTA CHE FAI UN INVIO DI DATI POST-->
    <div class="name">
        <label id="label_name"><strong>Name</strong> <input type='text' name='name' class='label_class' value="<?php echo e(old('name')); ?>"></label>
        <span class = "hide"></span>
    </div>
    <div class="surname">
        <label><strong>Surname </strong><input type='text' name='surname' class='label_class' value="<?php echo e(old('surname')); ?>"></label>
        <span class = "hide"></span>
    </div>
    <div class="username">
        <label><strong>Username </strong><input type='text' name='username' class='label_class' value="<?php echo e(old('username')); ?>"></label>
        <span class = "hide"></span>
    </div>
    <div class="email">
        <label><strong>E-mail </strong><input type='text' name='email' class='label_class' value="<?php echo e(old('email')); ?>"></label>
        <span class = "hide"></span>
    </div>
    <div class="password">
        <label><strong>Password </strong><input type='text' name='password' class='label_class' value="<?php echo e(old('password')); ?>"></label>
        <span class = "hide"></span>
    </div> 
    <div class="confirm_password">  
        <label><strong>Confirm PW </strong><input type='text' name='confirm_password' class='label_class' value="<?php echo e(old('confirm_password')); ?>"></label>
        <span class = "hide"></span>
    </div>
    <label>&nbsp;<input type='submit' id="regist" value='Regist'></label>
    <a href="<?php echo e(route('login')); ?>">(Already have an account?)</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.access', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\string-Laravel\resources\views/register.blade.php ENDPATH**/ ?>