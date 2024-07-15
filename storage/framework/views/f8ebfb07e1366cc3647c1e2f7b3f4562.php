<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gugu Gaga Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper.bundle.min.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg shadow" style="background-color: #FFCC03; border-bottom: 15px solid #055E2E; padding:22px;" >
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
    <footer class="text-center shadow"  style="background-color: #FFCC03; border-top: 15px solid #055E2E;" >
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Buah-Tangan-Logo-Compress.png" alt="">
              <p>
                Alamat: Jl. Ir. Soekarno No.374, Mojorejo, Kec. Junrejo, Kota Batu, Jawa Timur
              </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Contact Us</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-body">Customer Care</a>
                </li>
                <li>
                    <i class="bi bi-whatsapp"></i>
                    <a href="#!" class="text-body">Whatsapp</a>
                </li>
                <li>
                    <i class="bi bi-instagram"></i>
                  <a href="#!" class="text-body">Instagram</a>
                </li>
                <li>
                    <i class="bi bi-envelope"></i>
                  <a href="#!" class="text-body">Email</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-0">About Us</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="#!" class="text-body">FAQ</a>
                </li>
                <li>
                  <a href="#!" class="text-body">Brosur</a>
                </li>
                <li>
                  <a href="#!" class="text-body">Artikel</a>
                </li>
                <li>
                  <a href="#" class="text-body">Return Policy</a>
                </li>
                <li>
                  <a href="#" class="text-body">Deliver Policy</a>
                </li>
                <li>
                  <a href="/login" class="text-body">Admin</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->

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
      <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
</body>
</html>
<?php /**PATH D:\laragon\www\buahtangan\resources\views/layouts/guestnav.blade.php ENDPATH**/ ?>