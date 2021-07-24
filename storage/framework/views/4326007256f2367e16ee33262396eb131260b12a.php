<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <body>   
        
        <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        

        <?php echo $__env->yieldContent('content'); ?>

        
        <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    

    </div>
    </body>
</html>
