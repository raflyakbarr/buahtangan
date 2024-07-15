

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
                    <button type="button"
                        class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                        <span class="btn-inner--icon">
                            <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                                <span class="visually-hidden">New</span>
                            </span>
                        </span>
                        <span class="btn-inner--text">Messages</span>
                    </button>
                    <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                        <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="d-block me-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </span>
                        <span class="btn-inner--text">Sync</span>
                    </button>
                </div>
            </div>
        </div>
        <hr class="my-0 mb-3">
        <div class="container mt-5">
            <div class="row g-3">
                <div class="col-md-3"> <!-- Atur ukuran kolom menjadi 3 untuk empat card -->
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
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/dashboard.blade.php ENDPATH**/ ?>