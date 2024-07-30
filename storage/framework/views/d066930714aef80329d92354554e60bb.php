

<?php $__env->startSection('content'); ?>
<div class="container my-5 mx-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <a href="<?php echo e(route('admins.index')); ?>" class="mb-md-0 mb-3">
                    <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                </a>
                <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <h3 class="font-weight-bold mb-0">
                        Edit Admin
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <form action="<?php echo e(route('admins.update', $admin->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($admin->name); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($admin->email); ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin" <?php echo e($admin->role == 'admin' ? 'selected' : ''); ?>>Admin</option>
                <option value="content_writer" <?php echo e($admin->role == 'content_writer' ? 'selected' : ''); ?>>Content Writer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="form-text text-muted">Kosongkan field ini jika tidak merubah password</small>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/admins/edit.blade.php ENDPATH**/ ?>