

<?php $__env->startSection('content'); ?>
<main class="main-content position-relative max-height-vh-100 h-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            
                            <a href="<?php echo e(route('members.index')); ?>" class="btn btn-outline-dark">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <h2 class="font-weight-bold mb-0">Tambah Member</h2>

                        </div>
                        <hr>
                        <form action="<?php echo e(route('members.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input type="number" name="telp" class="form-control" required>
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
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/members/create.blade.php ENDPATH**/ ?>