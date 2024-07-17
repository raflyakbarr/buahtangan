

<?php $__env->startSection('content'); ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <div class="mb-md-0 mb-3">
                        <h3 class="font-weight-bold mb-0">
                            <?php if(auth()->guard()->check()): ?>
                                Hello, <?php echo e(Auth::user()->name); ?>

                            <?php endif; ?>
                        </h3>
                        <p class="mb-0">Apps you might like!</p>
                    </div>
                    <?php if(Auth::user()->role === 'super_admin'): ?>
                        <a href="<?php echo e(route('admins.index')); ?>" class="btn btn-sm btn-success btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <span class="btn-inner--icon">
                                <i class="bi bi-person-plus-fill"></i>
                            </span>
                            <span class="btn-inner--text">Daftarkan Admin</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr class="my-0 mb-3">
        <div class="container mt-5">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-box-fill fs-3"></i> Jumlah Produk</h5>
                            <p class="card-text fs-2"><?php echo e($totalProducts); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-people-fill fs-3"></i> Jumlah Member</h5>
                            <p class="card-text fs-2"><?php echo e($totalMember); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-building-fill-gear fs-3"></i> Jumlah Artikel</h5>
                            <p class="card-text fs-2"><?php echo e($totalArticle); ?></p>
                        </div>
                    </div>
                </div>
                <?php if(Auth::user()->role === 'super_admin'): ?>
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-person-badge-fill fs-3"></i> Jumlah Admin</h5>
                            <p class="card-text fs-2"><?php echo e($totalAdmin); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/dashboard.blade.php ENDPATH**/ ?>