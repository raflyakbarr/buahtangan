

<?php $__env->startSection('content'); ?>
<div class="container py-4 px-5">
    <div class="row">
        <div class="col-md-12 ">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <a href="<?php echo e(route('articles.index')); ?>" class="mb-md-0 mb-3">
                    <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                </a>
                <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <h3 class="font-weight-bold mb-0">
                        Detail Artikel
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?php echo e(asset($article->image)); ?>" class="card-img-top" alt="<?php echo e($article->title); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($article->title); ?></h5>
                    <p class="card-text"><?php echo e(Str::limit(strip_tags($article->content), 150)); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views\articles\show.blade.php ENDPATH**/ ?>