<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Buah Tangan'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(auth()->guard()->check()): ?>
    <nav class="navbar navbar-main navbar-expand-md shadow-none" id="navbarBlur" style="background-color: #0e2238;" navbar-scroll="true">
        <div class="container-fluid py-1 px-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mx-5 mb-1 pb-0 px-0 me-5 d-flex align-items-center justify-content-center">
                    <li class="breadcrumb-item text-center">
                        <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Buah-Tangan-Logo-Compress.png" style="width: 60px;" class="img-fluid" alt="Logo">
                    </li>
                    <li class="breadcrumb-item text-center text-sm text-light active" aria-current="page">
                        Buah Tangan
                    </li>
                    <?php
                        $segments = Request::segments();
                    ?>
                    <?php $__currentLoopData = $segments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="breadcrumb-item text-center text-sm text-light <?php echo e($loop->last ? 'active' : ''); ?>" aria-current="page">
                            <?php echo e(ucfirst($segment)); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body bg-white border-end-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder=" Cari">
                    </div>
                </div>
                <div class="mb-0 font-weight-bold breadcrumb-text text-white">
                    <button class="btn toggle-btn btn-outline-light me-3">
                        <span class="bi bi-list"></span>
                    </button>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item ps-2 d-flex align-items-center">
                        <div class="dropdown ms-md-auto my-2">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi-person-circle"></i>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e(Auth::user()->name); ?>

                                <?php endif; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex justify-content-center">
                <div class="sidebar-logo">
                    <a href="#">Buah Tangan</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-link">
                        <i class="bi bi-window-sidebar"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            
                <?php if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin'): ?>
                <li class="sidebar-item">
                    <a href="<?php echo e(route('products.index')); ?>" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#produk" aria-expanded="false" aria-controls="produk">
                        <i class="bi bi-boxes"></i>
                        <span>Produk</span>
                    </a>
                    <ul id="produk" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('products.index')); ?>" class="sidebar-link">Daftar Produk</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('products.create')); ?>" class="sidebar-link">Tambah Produk</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('categories.index')); ?>" class="sidebar-link">Tambah Kategori Produk</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('product.list')); ?>" class="sidebar-link">Halaman List Produk</a>
                        </li>
                    </ul>
                </li>
            
                <li class="sidebar-item">
                    <a href="<?php echo e(route('members.index')); ?>" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#member" aria-expanded="false" aria-controls="member">
                        <i class="bi bi-people"></i>
                        <span>Member</span>
                    </a>
                    <ul id="member" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('members.index')); ?>" class="sidebar-link">Daftar Member</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('members.create')); ?>" class="sidebar-link">Tambah Member</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            
                <?php if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'content_writer'): ?>
                <li class="sidebar-item">
                    <a href="<?php echo e(route('articles.index')); ?>" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#article" aria-expanded="false" aria-controls="article">
                        <i class="bi bi-file-earmark-plus"></i>
                        <span>Article</span>
                    </a>
                    <ul id="article" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('articles.create')); ?>" class="sidebar-link">Tambah Artikel</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('articles.index')); ?>" class="sidebar-link">Daftar Artikel</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('article-list')); ?>" class="sidebar-link">Halaman Artikel</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo e(route('edithome.index')); ?>" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#edithome" aria-expanded="false" aria-controls="edithome">
                        <i class="bi bi-house-gear-fill"></i>
                        <span>Edit Halaman Home</span>
                    </a>
                    <ul id="edithome" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('edithome.index')); ?>" class="sidebar-link">Edit Halaman Home</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            
                <?php if(Auth::user()->role === 'super_admin'): ?>
                <li class="sidebar-item">
                    <a href="<?php echo e(route('admins.index')); ?>" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#admin" aria-expanded="false" aria-controls="admin">
                        <i class="bi bi-person-badge"></i>
                        <span>Admin</span>
                    </a>
                    <ul id="admin" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admins.index')); ?>" class="sidebar-link">Daftar Admin</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admins.create')); ?>" class="sidebar-link">Tambah Admin</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-house"></i>
                    <span>Ke halaman Home</span>
                </a>
            </div>
        </aside>
        <?php endif; ?>
        <div class="main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <?php if(session('error')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "<?php echo e(session('error')); ?>",
                });
            });
        </script>
    <?php endif; ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\buahtangan\resources\views/layouts/app.blade.php ENDPATH**/ ?>