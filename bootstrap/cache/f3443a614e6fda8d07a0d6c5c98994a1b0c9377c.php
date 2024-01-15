<?php $__env->startSection('title','Category Create'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container my-4">
        <div class="container">
            <div class="col-md-6 offset-3">
                <h1 class="text-primary text-center">Create Category</h1>
                <?php if(\App\Classes\Session::has('error')): ?>
                    <?php echo e(\App\Classes\Session::flash('error')); ?>

                <?php endif; ?>
                <form action="/admin/category/create" method="post" enctype="multipart/form-data">
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="file" class="form-label">File Name</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <input type="hidden" name="token" id="token" value="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>