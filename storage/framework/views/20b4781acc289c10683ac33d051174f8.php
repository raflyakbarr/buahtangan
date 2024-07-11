<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="text-center mb-4">Tampilkan Artikel</h1>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/articles/show.blade.php ENDPATH**/ ?>