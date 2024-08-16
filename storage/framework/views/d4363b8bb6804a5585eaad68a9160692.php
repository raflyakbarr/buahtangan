

<?php $__env->startSection('content'); ?>
<!-- SweetAlert -->
<?php if(session('success')): ?>
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?php echo e(session('success')); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>

<?php if(session('error')): ?>
    <script>
        Swal.fire({
            title: 'Gagal!',
            text: '<?php echo e(session('error')); ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>

<header class="py-5" style="background-color: #055E2E;">
    <div class="container px-4 px-lg-5">
        <div class="text-center text-light">
            <h1 class="display-4 fw-bolder">Semua Artikel</h1>
            <p class="lead fw-normal text-white-50 mb-3">Baca artikel yang anda suka</p>
            <form action="<?php echo e(route('article-list.search')); ?>" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari artikel..." aria-label="Cari artikel..." aria-describedby="button-search">
                    <button class="btn btn-outline-light" type="submit" id="button-search">Cari</button>
                </div>
            </form>
        </div>
        <nav class="nav justify-content-center">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('category.articles', $category->slug)); ?>" class="nav-item nav-link" style="color: #fcc510; text-decoration: none; font-size:20px">
                    <strong><?php echo e($category->name); ?></strong>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
    </div>
</header>
<!-- Page content-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Articles list -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center py-4">
                <?php if($articles->isEmpty()): ?>
                    <div class="col">
                        <h1 class="text-center">Artikel tidak ditemukan</h1>
                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col mb-4" style="max-width: 300px;">
                            <a href="<?php echo e(route('article', ['slug' => $article->slug])); ?>" class="card-link">
                                <div class="card h-100 shadow">
                                    <?php if($article->image): ?>
                                        <img src="<?php echo e(asset($article->image)); ?>" alt="<?php echo e($article->title); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($article->title); ?></h5>
                                        <p class="card-text" style="text-align: justify;"><?php echo e(Str::limit(html_entity_decode(strip_tags($article->content)), 151)); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/category/articles.blade.php ENDPATH**/ ?>