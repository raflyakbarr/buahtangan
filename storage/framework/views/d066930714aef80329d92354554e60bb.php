

<?php $__env->startSection('content'); ?>
<main class="main-content position-relative max-height-vh-100 h-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            
                            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-dark">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <h2 class="font-weight-bold mb-0">Edit Admin</h2>

                        </div>
                        <hr>
                        <form action="<?php echo e(route('admins.update', $admin->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control " id="name" name="name" value="<?php echo e($admin->name); ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control " id="email" name="email" value="<?php echo e($admin->email); ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select " id="role" name="role" required>
                                    <option value="admin" <?php echo e($admin->role == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                    <option value="content_writer" <?php echo e($admin->role == 'content_writer' ? 'selected' : ''); ?>>Content Writer</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control " id="password" name="password">
                                <small class="form-text text-muted">Kosongkan field ini jika tidak merubah password</small>
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control " id="password_confirmation" name="password_confirmation">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">
                                    <i class="bi bi-save"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/admins/edit.blade.php ENDPATH**/ ?>