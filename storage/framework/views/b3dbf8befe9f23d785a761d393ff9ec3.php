

<?php $__env->startSection('content'); ?>
    <!-- Page content-->
    <div class="container mt-5">
        <h2 class="fw-bolder mb-4">Kategori: <?php echo e($category->name); ?></h2>
        <div class="row">
            <div class="col-lg-8">
                <!-- Articles list -->
                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="row gx-4 gx-lg-5 py-4">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 mb-5">
                            <a href="<?php echo e(route('article', ['slug' => $article->slug])); ?>" class="card-link">
                                <div class="card h-100 shadow" >
                                    <?php if($article->image): ?>
                                        <img src="<?php echo e(asset($article->image)); ?>" alt="<?php echo e($article->title); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($article->title); ?></h5>
                                        <p class="card-text" style="text-align: justify;" ><?php echo e(Str::limit(html_entity_decode(strip_tags($article->content)), 151)); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                
                    <p class="text-muted">Tidak ada artikel yang ditemukan pada kategori ini.</p>
                <?php endif; ?>
            </div>          
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/kategori/articles.blade.php ENDPATH**/ ?>