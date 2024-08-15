<!-- resources/views/articles/show.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo e($article->title); ?></h1>
                <p><?php echo e($article->content); ?></p>
                <p>Author: <?php echo e($article->user->name); ?></p>
                <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-primary">Back to Articles</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views\addarticle\index.blade.php ENDPATH**/ ?>