

<?php $__env->startSection('content'); ?>
<div class="container p-5">
    <h1 class="mb-4">Kelola Kategori Produk</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Kategori Produk Baru</div>
                <div class="card-body">
                    <form action="<?php echo e(route('categories.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark mt-3">Tambah Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Daftar Kategori</div>
                <div class="card-body">
                    <?php if($categories->isEmpty()): ?>
                        <p>Belum ada kategori.</p>
                    <?php else: ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><?php echo e($category->name); ?></span>
                                    <div>
                                        <span class="badge bg-primary rounded-pill me-2"><?php echo e($category->products->count()); ?></span>
                                        <button type="button" class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($category->id); ?>">
                                            Edit
                                        </button>
                                        <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </li>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?php echo e($category->id); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo e($category->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo e($category->id); ?>">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="edit_name<?php echo e($category->id); ?>">Nama Kategori</label>
                                                        <input type="text" class="form-control" id="edit_name<?php echo e($category->id); ?>" name="name" value="<?php echo e($category->name); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/categories/index.blade.php ENDPATH**/ ?>