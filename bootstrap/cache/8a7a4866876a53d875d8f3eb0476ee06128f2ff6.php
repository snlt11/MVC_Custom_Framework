<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="Shortcut Icon" href="<?php echo e(asset("images/logo.jpg")); ?>" >
    <link rel="stylesheet" href="<?php echo e(asset("css/app.css")); ?>" >
</head>
<body>

<?php echo $__env->make('layout/nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(asset("js/bootstrap.bundle.min.js")); ?>"></script>

</body>
</html>