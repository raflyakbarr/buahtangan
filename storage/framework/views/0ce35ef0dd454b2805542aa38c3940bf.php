

<?php $__env->startSection('content'); ?>
<style>
    .category-icon {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
    .category-item {
        text-align: center;
        margin-bottom: 10px;
    }
    .category-name {
        font-size: 0.8rem;
        margin-top: 5px;
    }
    /* Smooth transition for carousel */
    .carousel-item {
        transition: transform 0.6s ease-in-out;
    }
    /* Custom styling for pagination */
    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    .carousel-image-container {
    width: 100%;
    padding-bottom: 56.25%; /* Untuk rasio aspek 16:9 */
    position: relative;
  }
  .carousel-image-container img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
  }
</style>
<div id="imageSlider" class="carousel slide" data-bs-ride="carousel" style="position: relative; z-index: 1;">
  <div class="carousel-indicators">
      <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="<?php echo e($index); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>" aria-current="<?php echo e($index === 0 ? 'true' : 'false'); ?>" aria-label="Slide <?php echo e($index + 1); ?>"></button>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="carousel-inner">
      <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
              <div class="carousel-image-container">
                  <img src="<?php echo e(asset($image->image_url)); ?>" class="d-block w-100" alt="Slide <?php echo e($index + 1); ?>">
              </div>
          </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
  </button>
</div>
  <!-- Tentang Kami -->
  <section class="p-2" style="background-color: #FFCC03">
    <div class="container text-center" >
      <div class="row">
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
    <section class="container text-center">
      <h2 class="text-center text-light mb-5">Produk Unggulan</h2>
      <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              <?php $__currentLoopData = $cards->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunkIndex => $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="carousel-item <?php echo e($chunkIndex === 0 ? 'active' : ''); ?>">
                  <div class="d-flex justify-content-center">
                      <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="card mx-2" style="width: 18rem;">
                          <img src="<?php echo e(asset($card->image)); ?>" class="card-img-top" alt="<?php echo e($card->name); ?>">
                          <div class="card-body">
                              <h5 class="card-title"><?php echo e($card->name); ?></h5>
                              <p class="card-text"><?php echo e($card->description); ?></p>
                              <p class="card-text">Rp <?php echo e(number_format($card->price, 0, ',', '.')); ?></p>
                              <a href="<?php echo e($card->button_link); ?>" class="btn btn-warning"><?php echo e($card->button_text); ?></a>
                          </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
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
  <div class="text-center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.967803107052!2d112.55472037585089!3d-7.898432592124472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62936b3c2da2b%3A0xe1a4fec500cfad69!2sPusat%20Oleh%20Oleh%20Khas%20Malang%20%26%20Batu%20-%20Buah%20Tangan!5e0!3m2!1sen!2sid!4v1722569676212!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views\welcome.blade.php ENDPATH**/ ?>