<html>
    <head>
        <title>String <?php echo $__env->yieldContent('title'); ?></title>

        <link rel="stylesheet" href="<?php echo e(asset('css/login_register.css')); ?>">


        <meta name="viewport" content="width=device width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> 
        <?php echo $__env->yieldContent('script'); ?>
    </head>


    <body>
        <?php echo $__env->yieldContent('error'); ?>

        <article>
            <section id="register">
            <div>
                <div id="icon">🦊String</div>
                <div id="description">Buy and sell music tools</div>
            </div>

            <?php echo $__env->yieldContent('form'); ?>

            </section>
        </article>

    </body>
</html><?php /**PATH C:\xampp\htdocs\string-Laravel(Esame_v2)\resources\views/layouts/access.blade.php ENDPATH**/ ?>