<?php $__env->startSection('title','Category Create'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <?php echo $__env->make("layout/admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="col-md-7">
                    <h1 class="text-primary text-center">Create Category</h1>
                    <form action="/admin/category/create" method="post" enctype="multipart/form-data">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <input type="hidden" name="token" id="token" value="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                    <ul class="list-group mt-5">
                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <a href="/admin/category/all" class="text-decoration-none"><?php echo e($cat->name); ?></a>
                                <span class="float-right">
                                    <i class="fa-solid fa-pen-to-square text-warning"></i>
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>