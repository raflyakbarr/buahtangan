

<?php $__env->startSection('content'); ?>
<div class="container py-4 px-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <a href="<?php echo e(route('members.index')); ?>" class="mb-md-0 mb-3">
                    <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                </a>
                <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <h3 class="font-weight-bold mb-0">
                        Tambah Member
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('members.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" name="telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="points">Points</label>
                    <input type="number" name="points" class="form-control" value="0" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views\members\create.blade.php ENDPATH**/ ?>