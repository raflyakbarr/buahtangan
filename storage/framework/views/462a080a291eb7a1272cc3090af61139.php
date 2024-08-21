

<?php $__env->startSection('content'); ?>
<style>
    .bg-image-container {
    width: 100%;
    padding-bottom: 56.25%; /* Untuk rasio aspek 16:9 */
    position: relative;
    }
    .bg-image-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    body {
      font-family: 'Source Sans Pro', sans-serif;
    }

    /* _wrapper.css */
    .wrapper {
      z-index: 2;
      padding-left: 18px;
      padding-right: 18px;
      max-width: 1236px;
      margin-left: auto;
      margin-right: auto;
    }


    /* _timeline.css */
    .timeline {
      position: relative;
      height: auto;
      padding: 160px 0;
      margin-left: -12px;

    }
    .timeline::before {
      content: "";
      position: absolute;
      top: 0;
      left: 10%;
      width: 4px;
      height: 100%;
      background-color: #FFCC03;
    }
    @media (min-width: 767px){
      .timeline::before{
        left: 50%;
        margin-left: -2px;
      }
    }
    .timeline__item {
      margin-bottom: 100px;
      position: relative;
    }
    .timeline__item::after{
      content: "";
      clear: both;
      display: table;
    }
    .timeline__item:nth-child(2n) .timeline__item__content {
      float: right;
    }
    .timeline__item:nth-child(2n) .timeline__item__content::before {
      content: '';
      right: 40%;
    }
    @media (min-width: 767px){
      .timeline__item:nth-child(2n) .timeline__item__content::before{
        left: inherit;
      }
    }
    .timeline__item:nth-child(2n) .timeline__item__content__date {
      background-color: #055E2E;
    }
    .timeline__item:nth-child(2n) .timeline__item__content__description {
      color: rgb(77, 77, 77);
    }
    .timeline__item:last-child {
      margin-bottom: 0;
    }
    .timeline__item-bg {
      -webkit-transition: all 1s ease-out;
      transition: all 1s ease-out;
      color: rgb(77, 77, 77);
    }
    .timeline__item-bg:nth-child(2n) .timeline__item__station {
      background-color: #FFCC03;
    }
    .timeline__item-bg:nth-child(2n) .timeline__item__content {
      background-color: #FFCC03;
    }
    .timeline__item-bg:nth-child(2n) .timeline__item__content::before {
      background-color: rgb(77, 77, 77);
    }
    .timeline__item-bg:nth-child(2n) .timeline__item__content__description {
      color: #055E2E;
    }
    .timeline__item-bg .timeline__item__station {
      background-color:  #FFCC03;
    }
    .timeline__item-bg .timeline__item__content {
      background-color: #FFCC03;
    }
    .timeline__item-bg .timeline__item__content::before {
      background-color: rgb(77, 77, 77);
    }
    .timeline__item-bg .timeline__item__content__description {
      color: #055E2E;
    }
    .timeline__item__station {
      background-color: #055E2E;
      width: 40px;
      height: 40px;
      position: absolute;
      border-radius: 50%;
      padding: 10px;
      top: 0;
      left: 10%;
      margin-left: -33px;
      border: 4px solid white;
      -webkit-transition: all .3s ease-out;
      transition: all .3s ease-out;
    }
    @media (min-width: 767px){
      .timeline__item__station{
        left: 50%;
        margin-left: -30px;
        width: 60px;
        height: 60px;
        padding: 15px;
        border-width: 6px;
      }
    }
    .timeline__item__content {
      width: 80%;
      background: #fff;
      border: 4px solid #FFCC03;
      padding: 20px 30px;
      border-radius: 6px;
      float: right;
      -webkit-transition: all .3s ease-out;
      transition: all .3s ease-out;
    }
    @media (min-width: 767px){
      .timeline__item__content{
        width: 40%;
        float: inherit;
        padding: 30px 40px;
      }
    }
    .timeline__item__content::before {
      content: '';
      position: absolute;
      left: 10%;
      background: rgb(77, 77, 77);
      top: 20px;
      width: 10%;
      height: 4px;
      z-index: -1;
      -webkit-transition: all .3s ease-out;
      transition: all .3s ease-out;
    }
    @media (min-width: 767px){
      .timeline__item__content::before{
        left: 40%;
        top: 30px;
        height: 4px;
        margin-top: -2px;
      }
    }
    .timeline__item__content__date {
      margin: 0;
      padding: 8px 12px;
      font-size: 18px;
      margin-bottom: 10px;
      background-color: #055E2E;
      color: rgb(242, 242, 242);
      display: inline-block;
      border-radius: 4px;
    }
    .timeline__item__content__description {
      margin: 0;
      padding: 0;
      font-size: 18px;
      line-height: 24px;
      font-weight: 300;
      color: rgb(77, 77, 77);
    }
    @media (min-width: 767px){
      .timeline__item__content__description{
        font-size: 19px;
        line-height: 28px;
      }
    }
</style>
<div class="bg-image-container">
<img src="<?php echo e(asset('images/bg-buahtangan.jpeg')); ?>" alt="">
</div>
<div class="image"></div>
<main>
    <div class="container-fluid py-5" style="background-color: #055E2E;">
        <div class="card mx-5 border-0 shadow-lg" style="margin-top: -100px; border-radius:0px; background-color:#FFCC03; color:#055E2E;">
            <div class="card-body text-center">
                <h1>About Us</h1>
            </div>
        </div>
        <section class="py-5">
          <div class="container text-light">
              <div class="row">
                  <div class="col-md-6">
                      <p style="text-align: justify;">Buah tangan pertama kali beroperasi pada 28 Mei 2022. 
                        Sebelum ada pusat oleh-oleh buah tangan sudah hadir lebih dulu keripik buah tangan dengan beberapa varian antara lain keripik apel buah tangan keripik nangka buah tangan keripik pisang coklat buah tangan dan keripik tempe buah tangan. 
                        Pusat oleh-oleh Buah Tangan dibangun pada sebidang tanah yang berlokasi di Jalan Ir Soekarno 374 yang berlokasi di pinggir jalan provinsi. 
                        Posisi lokasi yang strategis ini memberikan keuntungan tersendiri sehingga memudahkan pengunjung baik rombongan maupun keluarga yang baru saja keluar dari objek wisata untuk singgah berbelanja oleh-oleh di pusat oleh-oleh buah tangan.</p>
                  </div>
                  <div class="col-md-6">
                      <img src="<?php echo e(asset('images/aboutus-5.jpg')); ?>" class="img-fluid rounded" alt="Who We Are">
                  </div>
              </div>
              <div class="row mt-4">
                  <div class="col-md-4">
                      <img src="<?php echo e(asset('images/aboutus-1.jpg')); ?>" class="img-fluid rounded" alt="Strength 1">
                  </div>
                  <div class="col-md-4">
                      <img src="<?php echo e(asset('images/aboutus-2.jpg')); ?>" class="img-fluid rounded" alt="Strength 2">
                  </div>
                  <div class="col-md-4">
                      <img src="<?php echo e(asset('images/aboutus-3.jpg')); ?>" class="img-fluid rounded" alt="Strength 3">
                  </div>
              </div>
          </div>
      </section>
      <section class="py-5">
          <div class="container text-light">
              <p style="text-align: justify;">Pusat oleh-oleh buah tangan berkomitmen untuk menjalin kerjasama dengan UMKM yang ada di Kota Batu, Malang maupun Jawa Timur. Oleh karena itu pusat oleh-oleh buah tangan menampung semua produk baik makanan minuman maupun kerajinan yang dibuat oleh UMKM. 
                Kerjasama yang dibangun adalah konsinyasi atau titip jual dari UMKM untuk dipajang di rak-rak yang ada di pusat oleh-oleh buah tangan.
                 Seiring semakin ramainya kunjungan ke pusat oleh-oleh buah tangan semakin banyak UMKM yang berdatangan bahkan dari luar kota yang ingin menitipkan barangnya untuk dijual di pusat ololeh-oleh buah tangan.</p>
              <img src="<?php echo e(asset('images/aboutus-4.jpg')); ?>" class="img-fluid mt-3 rounded" alt="Our Strength">
          </div>
      </section>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script>
    function customWayPoint(className, addClassName, customOffset) {
      var waypoints = $(className).waypoint({
        handler: function(direction) {
          if (direction == "down") {
            $(className).addClass(addClassName);
          } else {
            $(className).removeClass(addClassName);
          }
        },
        offset: customOffset
      });
    }

    var defaultOffset = '50%';

    for (i=0; i<17; i++) {
      customWayPoint('.timeline__item--'+i, 'timeline__item-bg', defaultOffset);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guestnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/about-us.blade.php ENDPATH**/ ?>