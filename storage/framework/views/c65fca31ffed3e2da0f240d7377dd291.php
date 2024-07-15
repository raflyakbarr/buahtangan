
<style>
.list-group-item a {
    color: inherit;
    text-decoration: none;
}
</style>
<?php $__env->startSection('content'); ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- Category list -->
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header">Kategori Produk</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush rounded">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item list-group-item-light <?php echo e(request('category') == $category ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('product.list', ['category' => $category])); ?>" class="text-decoration-none <?php echo e(request('category') == $category ? 'text-white' : ''); ?>">
                                        <?php echo e($category); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <section>
                    <header class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="<?php echo e(route('product-list.search')); ?>" method="GET" class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Cari produk" value="<?php echo e(request('keyword')); ?>">
                                <button type="submit" class="btn btn-dark">Cari</button>
                            </form>
                        </div>
                    </header>
                    <?php if(request()->has('keyword')): ?>
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Hasil pencarian untuk: <?php echo e(request('keyword')); ?></h5>
                            <a href="<?php echo e(route('product.list')); ?>" class="text-dark btn-secondary ms-3 mb-3 bi bi-chevron-double-left">Kembali</a>
                        </div>
                    <?php endif; ?>
                    <?php if($isCategoryView): ?>
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Kategori : <?php echo e($selectedCategory); ?></h5>
                            <a href="<?php echo e(route('product.list')); ?>" class="text-dark btn-secondary ms-3 mb-3 bi bi-chevron-double-left">Kembali</a>
                        </div>
                    <?php endif; ?>
                        
                    <?php if($products->isEmpty()): ?>
                        <div class="alert alert-light mt-3">
                            Tidak ada produk yang ditemukan.
                        </div>
                    <?php else: ?>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col">
                                    <div class="card h-100 shadow">
                                        <?php if($product->image): ?>
                                            <img src="<?php echo e(asset($product->image)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                            <p class="card-text"><?php echo e($product->description); ?></p>
                                            <p class="card-text">Harga: Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/product-list.blade.php ENDPATH**/ ?>