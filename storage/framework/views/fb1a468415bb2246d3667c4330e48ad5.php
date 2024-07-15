

<?php $__env->startSection('content'); ?>
<style>
    .swiper {
      width: 350px;
      height: 350px;
      position: absolute;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
    }
</style>
<img class="img-fluid" src="<?php echo e(asset('images/Banner-Buah-Tangan-Toko-Oleh-Oleh.jpg')); ?>" alt="">
  <!-- Tentang Kami -->
  <section class="p-2" style="background-color: #FFCC03">
    <div class="container text-center" >
      <div class="row">
        <div class="col-lg-12 p-3 my-4">
            <img class="img-fluid" src="<?php echo e(asset('images/Buah-Tangan-Logo-Compress.png')); ?>" alt="Logo Buah Tangan" style="width: 120px;">
            <div class="swiper swiperCube" id="swiper2">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="<?php echo e(asset('images/keripik-apel.jpg')); ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo e(asset('images/keripik-pisang-coklat.jpg')); ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo e(asset('images/keripik-nangka.jpg')); ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo e(asset('images/keripik-tempe.jpg')); ?>" />
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
        </div>
        <div class="col-lg-12 p-3" style="margin-top:100px;" >
            <img class="img-fluid" src="<?php echo e(asset('images/Buah-Tangan-Batu-1024x163.png')); ?>" alt="Text Kisah" style="width: 500px;" >
          <!-- Image or Icon here -->
        </div>
      </div>
    </div>
  </section>
  <section class="py-5" style="background-color: #FFCC03;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <p class="lead"><strong>Pusat oleh-oleh Buah tangan adalah tempat belanja aneka oleh-oleh terbesar dan terlengkap khas Kota Wisata Batu dan Malang. Berdiri sejak 2022 Buah Tangan berkomitmen selalu menghadirkan Pemberian Terbaik bagi orang tersayang. Memiliki bangunan 4 lantai dengan suasana menarik untuk memberikan pengalaman belanja tak terlupakan.</strong></p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid" src="<?php echo e(asset('images/Toko-Oleh-Oleh-Buah-Tangan-Batu.jpg')); ?>" alt="Toko Buah Tangan">
        </div>
      </div>
    </div>
  </section>
  <img class="img-fluid" src="<?php echo e(asset('images/gap.png')); ?>" alt="">
  <!-- Produk Unggulan -->
  <div class="py-5" style="background-color: #0C6633;">
  <section class="container">
    <h2 class="text-center text-light mb-5">Produk Unggulan</h2>
    <div class="card__container swiper2">
       <div class="card__content">
          <div class="swiper-wrapper">
             <article class="card__article swiper-slide">
                <div class="card__image">
                   <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Keripik-Apel-Buah-Tangan.jpeg" alt="image" class="card__img">
                   <div class="card__shadow"></div>
                </div>

                <div class="card__data">
                   <h3 class="card__name">Kell Dawx</h3>
                   <p class="card__description">
                      Passionate about development and design,
                      I carry out projects at the request of users.
                   </p>

                   <a href="#" class="card__button">View More</a>
                </div>
             </article>

             <article class="card__article swiper-slide">
                <div class="card__image">
                   <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Keripik-Nangka-Buah-Tangan.jpeg" alt="image" class="card__img">
                   <div class="card__shadow"></div>
                </div>

                <div class="card__data">
                   <h3 class="card__name">Lotw Fox</h3>
                   <p class="card__description">
                      Passionate about development and design,
                      I carry out projects at the request of users.
                   </p>

                   <a href="#" class="card__button">View More</a>
                </div>
             </article>

             <article class="card__article swiper-slide">
                <div class="card__image">
                   <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Keripik-Tempe-Buah-Tangan.jpeg" alt="image" class="card__img">
                   <div class="card__shadow"></div>
                </div>

                <div class="card__data">
                   <h3 class="card__name">Sara Mit</h3>
                   <p class="card__description">
                      Passionate about development and design,
                      I carry out projects at the request of users.
                   </p>

                   <a href="#" class="card__button">View More</a>
                </div>
             </article>

             <article class="card__article swiper-slide">
                <div class="card__image">
                   <img src="https://s3-id-jkt-1.kilatstorage.id/cdn-buahtanganid/2024/07/Keripik-Pisang-Coklat-Buah-Tangan.jpeg" alt="image" class="card__img">
                   <div class="card__shadow"></div>
                </div>

                <div class="card__data">
                   <h3 class="card__name">Jenny Wert</h3>
                   <p class="card__description">
                      Passionate about development and design,
                      I carry out projects at the request of users.
                   </p>

                   <a href="#" class="card__button">View More</a>
                </div>
             </article>
          </div>
       </div>
    </div>
 </section>
 <section class="py-5" style="background-color:#0C6633; margin-bottom:23rem;">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 p-5">
            <img class="img-fluid" src="<?php echo e(asset('images/Saatnya-Memberi-buah-tangan-terbaik-untuk-orang-tersayang-1.png')); ?>" alt="Logo Buah Tangan" style="width: 650px;">
        </div>
        <div class="col-lg-12">
            <h1 class="text-light">
                FIND US AT
            </h1>
          <!-- Image or Icon here -->
        </div>
        <div class="row mt-4 text-light"> <!-- Menambahkan baris baru (row) untuk kolom vertikal -->
            <div class="col-lg-4">
               <i class="bi bi-tiktok" style="font-size: 4rem;"></i>
                <!-- Image or Icon here -->
            </div>
            <div class="col-lg-4">
               <i class="bi bi-instagram" style="font-size: 4rem;"></i>
                <!-- Image or Icon here -->
            </div>
            <div class="col-lg-4">
               <i class="bi bi-youtube"  style="font-size: 4rem;"></i>
                <!-- Image or Icon here -->
            </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="position-relative" >
        <!-- Konten lain di dalam container -->
        <div class="row position-absolute w-100" style="bottom: 0;">
            <div class="col d-flex justify-content-start">
                <img class="img-fluid" src="<?php echo e(asset('images/traveling2.png')); ?>" alt="" width="550px">
            </div>
            <div class="col d-flex justify-content-end">
                <img class="img-fluid" src="<?php echo e(asset('images/keranjang.png')); ?>" alt="" width="500px">
            </div>
        </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/welcome.blade.php ENDPATH**/ ?>