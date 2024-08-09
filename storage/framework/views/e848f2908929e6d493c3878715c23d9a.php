
<?php $__env->startSection('content'); ?>
<style>
    .custom-file-upload {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }
    .file-input {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    .file-label {
        display: inline-block;
        padding: 10px 15px;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        text-align: center;
        transition: all 0.3s;
    }
    .file-label:hover {
        background-color: #e9ecef;
    }
    .file-name {
        margin-top: 5px;
        display: block;
        font-size: 0.9em;
        color: #6c757d;
    }
</style>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <a href="<?php echo e(route('products.index')); ?>" class="mb-md-0 mb-3">
                            <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                        </a>
                        <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <h3 class="font-weight-bold mb-0">
                                Edit Produk
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="row">
                <div class="container">
                    <form id="product-form" action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description"><?php echo e($product->description); ?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input type="text" name="price" value="<?php echo e($product->price); ?>" class="form-control" placeholder="Price">
                                </div>
                            </div>
                            <div class="form-group">
                                <strong>Kategori:</strong>
                                <select name="category_id" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>>
                                            <?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php if($errors->has('category_id')): ?>
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Kategori tidak dapat kosong',
                                        text: '<?php echo e($errors->first('category_id')); ?>'
                                    });
                                </script>
                            <?php endif; ?>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Url Produk:</strong>
                                    <input type="text" name="kategori" value="<?php echo e($product->product_url); ?>" class="form-control" placeholder="Url Produk">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                <div id="image-preview" class="row">
                                    <?php if($product->images): ?>
                                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3">
                                                <img src="/<?php echo e($image); ?>" alt="<?php echo e($product->name); ?>" class="img-thumbnail mb-2" width="150">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file-upload mt-3">
                                        <input type="file" name="images[]" id="images" multiple onchange="previewImages()" hidden>
                                        <label for="images" class="file-label">
                                            <i class="bi bi-cloud-upload"></i> Pilih Gambar
                                        </label>
                                        <span class="file-name">Tidak ada gambar dipilih.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        function previewImages() {
            var preview = document.getElementById('image-preview');
            var fileNameDisplay = document.querySelector('.file-name');
            var files = document.getElementById('images').files;
            preview.innerHTML = '';
            fileNameDisplay.textContent = '';

            if (files.length === 0) {
                fileNameDisplay.textContent = 'Tidak ada gambar dipilih.';
            } else {
                Array.from(files).forEach(function(file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail mb-2';
                        img.style.width = '150px';
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(file);

                    // Display file names
                    fileNameDisplay.textContent += file.name + ', ';
                });
                fileNameDisplay.textContent = fileNameDisplay.textContent.slice(0, -2); // Remove trailing comma
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/products/edit.blade.php ENDPATH**/ ?>