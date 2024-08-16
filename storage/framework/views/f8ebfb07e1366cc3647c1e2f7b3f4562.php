<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Buah Tangan'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper.bundle.min.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg shadow" style="background-color: #FFCC03; border-bottom: 15px solid #055E2E; padding:22px; z-index:100;" >
        <div class="container position-relative" >
            <div class="logo-container" style="
            position: absolute;
            top: 100%;
            left: 0;
            transform: translateY(-43%);
            "><a href="/">
                <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Buah-Tangan-Logo-Compress.png" alt="Logo" class="img-fluid" style="height: 10rem;">
              </a>
            </div>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" style="
                    margin-left: auto;
                    margin-right: auto;
                    ">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('article-list')); ?>">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('product.list')); ?>">Produk Buah Tangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('faq')); ?>">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
<!-- Footer -->
<footer class=""  style="background-color: #FFCC03; border-top: 15px solid #055E2E; " >
  <!-- Grid container -->
  <div class="container p-4 mt-5" style="margin:0; height:100%; max-width:100%; color:#055E2E;">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col d-flex justify-content-center pb-3" ><a href="/">
          <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Buah-Tangan-Logo-Compress.png" alt="Logo" class="img-fluid" style="width:100%; height: 200px;">
        </a>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <ul class="list-unstyled mb-0">
          <li>
            <h5 class="text-uppercase">About</h5>
          </li>
          <li>
            <a href="<?php echo e(route('product.list')); ?>" class="text-body"  style="color: #055E2E !important;">Our Product</a>
          </li>
          <li>
              <a href="<?php echo e(route('article-list')); ?>" class="text-body"  style="color: #055E2E !important;">Artikel</a>
          </li>
          <li>
              <a href="<?php echo e(route('faq')); ?>" class="text-body"  style="color: #055E2E !important;">FAQ</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <ul class="list-unstyled">
          <li>
            <h5 class="text-uppercase mb-0">Social Media</h5>
          </li>
          <li>
            <a href="https://www.instagram.com/buahtangangrup/"  style="color: #055E2E !important;">Instagram</a>
          </li>
          <li>
            <a href="https://www.tiktok.com/@buahtangangrup_"  style="color: #055E2E !important;">Tiktok</a>
          </li>
          <li>
            <a href="#!"  style="color: #055E2E !important;">Youtube</a>
          </li>
          <li>
            <a href="/login"  style="color: #055E2E !important;">Admin</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->
  <div class="container-lg">
    <div class="row ">
        <div class="col d-flex justify-content-start ps-4 pe-5  ">
            <i class="bi bi-geo-alt h3 pe-3 ps-5 pt-2 me-3"  style="color: #055E2E !important;" ></i>
            <span class="h6 pt-2"  style="color: #055E2E !important;">Alamat: Jl. Ir. Soekarno No.374, Mojorejo, Kec. Junrejo, Kota Batu, Jawa Timur </span>
        </div>
        <div class="col d-flex justify-content-start ps-5 pe-5 ">
            <i class="bi bi-telephone h3 ps-5 pe-3 "  style="color: #055E2E !important;"></i>
            <span class="h6  pt-2"  style="color: #055E2E !important;">0821 - 3249 - 2659</span>
            </i>
        </div>
        <div class="col d-flex justify-content-start ps-5 pe-1 ">
            <i class="bi bi-envelope h3 pe-3 ps-5"  style="color: #055E2E !important;">
            <span class="h6 ps-2 pe-1 "  style="color: #055E2E !important;">Buahtangan@email.com</span>
            </i>
        </div>
    </div>
</div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright
    <a class="text-body" href="#">PT. Buah Tangan Group</a>
  </div>
  <!-- Copyright -->
</footer>
    <script src="<?php echo e(asset('js/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/swiper.js')); ?>"></script>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\buahtangan\resources\views/layouts/guestnav.blade.php ENDPATH**/ ?>