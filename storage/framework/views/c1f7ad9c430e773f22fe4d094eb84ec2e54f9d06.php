<html>
    <head>
        <title>String <?php echo $__env->yieldContent('title'); ?></title>
        <?php echo $__env->yieldContent('header'); ?>
        
        <meta name="viewport" content="width=device width, initial-scale=1">
    </head>

    <body>
        <div id = "header">
            <div id="icon">🦊</div>
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <a href="<?php echo e(route('newPost')); ?>">Nuovo annuncio</a>
        </div>

        <?php echo $__env->yieldContent('content'); ?>
    </body>
</html><?php /**PATH C:\xampp\htdocs\string-Laravel\resources\views/layouts/profiles.blade.php ENDPATH**/ ?>