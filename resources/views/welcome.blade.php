@extends('layouts.guestnav')

@section('content')
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
      @foreach($images as $index => $image)
          <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
      @endforeach
  </div>
  <div class="carousel-inner">
      @foreach($images as $index => $image)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
              <div class="carousel-image-container">
                  <img src="{{ asset($image->image_url) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
              </div>
          </div>
      @endforeach
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
            <img class="img-fluid" src="{{ asset('images/Buah-Tangan-Batu-1024x163.png') }}" alt="Text Kisah" style="width: 500px;" >
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
          <img class="img-fluid" src="{{ asset('images/Toko-Oleh-Oleh-Buah-Tangan-Batu.jpg')}}" alt="Toko Buah Tangan">
        </div>
      </div>
    </div>
  </section>
  <section class="img-fluid" style="width: 100%; overflow: hidden;">
    <img class="img-fluid" src="{{ asset('images/gap.png') }}" alt="" style="width: 100%; height: 100%; object-fit: contain; position: relative;">
  </section>
  <!-- Produk Unggulan -->
  <div class="py-5" style="background-color: #0C6633;">
    <section class="container text-center">
      <h2 class="text-center text-light mb-5">Produk Unggulan</h2>
      <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              @foreach($cards->chunk(4) as $chunkIndex => $chunk)
              <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                  <div class="row justify-content-center">
                      @foreach($chunk as $card)
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                          <div class="card h-100">
                              <img src="{{ asset($card->image) }}" class="card-img-top" alt="{{ $card->name }}">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $card->name }}</h5>
                                  <p class="card-text">{{ $card->description }}</p>
                                  <p class="card-text">Rp {{ number_format($card->price, 0, ',', '.') }}</p>                                 
                              </div>
                            <div class="card-footer border-0 bg-white">
                              <a href="{{ $card->button_link }}" class="btn btn-warning">{{ $card->button_text }}</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                  </div>
              </div>
              @endforeach
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
            <img class="img-fluid" src="{{ asset('images/Saatnya-Memberi-buah-tangan-terbaik-untuk-orang-tersayang-1.png') }}" alt="Logo Buah Tangan" style="width: 650px;">
        </div>
        <div class="col-lg-12">
            <h1 class="text-light">
                FIND US AT
            </h1>
          <!-- Image or Icon here -->
        </div>
        <div class="row mt-4 text-light"> <!-- Menambahkan baris baru (row) untuk kolom vertikal -->
            <div class="col-lg-4">
              <a class="btn btn-block" href="https://www.tiktok.com/@buahtangangrup_" style="display: inline-block; text-decoration: none;">
                  <i class="bi bi-tiktok" style="font-size: 4rem; color:white"></i>
              </a>
            </div>
            <div class="col-lg-4">
              <a class="btn btn-block" href="https://www.instagram.com/buahtangangrup/" style="display: inline-block; text-decoration: none;">
               <i class="btn bi bi-instagram" style="font-size: 4rem; color:white"></i>
              </a>
            </div>
            <div class="col-lg-4">
              <a class="btn btn-block" href="https://www.tiktok.com/@buahtangangrup_" style="display: inline-block; text-decoration: none;">
               <i class="bi bi-youtube"  style="font-size: 4rem; color:white "></i>
              </a>
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
                <img class="img-fluid" src="{{ asset('images/traveling2.png') }}" alt="" width="550px">
            </div>
            <div class="col d-flex justify-content-end">
                <img class="img-fluid" src="{{ asset('images/keranjang.png') }}" alt="" width="500px">
            </div>
        </div>
    </div>
  </section>
  <section>
   <div class="container-fluid text-center" style="background-color: white;">
      <div class="container-lg pt-5 pb-5" >
        <i class="bi bi-geo-alt-fill h2 mt-5 mb-5"></i>
          <span class="text-center h2"> Our Location </span>
          <div class="container text-center mt-5 mb-5">
            <div class="ratio ratio-16x9">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.967803107052!2d112.55472037585089!3d-7.898432592124472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62936b3c2da2b%3A0xe1a4fec500cfad69!2sPusat%20Oleh%20Oleh%20Khas%20Malang%20%26%20Batu%20-%20Buah%20Tangan!5e0!3m2!1sen!2sid!4v1722569676212!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
      </div>
    </div>
  </section>
  <section id="testimonials" class="testimonials section-bg" style="background-color: white;">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="section-title aos-init aos-animate text-dark text-center" data-aos="fade-right">
            <h2>
              Our Google Reviews
            </h2>
            <div>
              <span style="font-size: 24px; font-weight: bold;">4.6</span>
              <span style="font-size: 18px;"> Stars</span>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star text-warning"></i>
              <i class="fa-solid fa-star-half-stroke text-warning"></i>
            </div>
            <p>761 reviews</p>
          </div>
        </div>
        <div class="col aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

          <div class="testimonials-slider swiper swiper-initialized swiper-horizontal swiper-backface-hidden aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper" id="swiper-wrapper-105f2c795a5fc36f1" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-1314px, 0px, 0px); transition-delay: 0ms;">

              <!-- End testimonial item -->

              <!-- End testimonial item -->

              <!-- End testimonial item -->

              <!-- End testimonial item -->

              <!-- End testimonial item -->

            <div class="swiper-slide" role="group" aria-label="2 / 5" style="width: 418px; margin-right: 20px;" data-swiper-slide-index="1">
                <div class="testimonial-item ">
                  <p>
                    <i class="fa-solid fa-quote-left"></i>
                    Pusat oleh2 lengkap yg dekat dengan jatim park 3. Mulai dari keripik buah, pie mangkok, seblak hingga jus.
                    Harganya juga tidak terlalu mahal.
                    Cocok banget buat onestop oleh2.
                    <i class="fa-solid fa-quote-right"></i>
                  </p>
                  <img src="https://lh3.googleusercontent.com/a-/ALV-UjV36n_4GCEuuJalW0FcjSTtmNEMap6sqKwBUL0CTyGWWDP1BaJEqA=w60-h60-p-rp-mo-ba5-br100" class="testimonial-img" alt="">
                  <h3>triceratops</h3>
                </div>
              </div><div class="swiper-slide" role="group" aria-label="3 / 5" style="width: 418px; margin-right: 20px;" data-swiper-slide-index="2">
                <div class="testimonial-item">
                  <p>
                    <i class="fa-solid fa-quote-left"></i>
                    Tempatnya cozzy banget. Produknya lengkap. mulai oleh-oleh khas Malang sampai luar kota Malang. Ada barang2 kerajinan utk souvenir, pernak pernik dan kaos khas Malang. Oiya ada Jersey Arema juga lhoo.... View nya bagus. Tempat makan luas. Pelayanan ramah.. Dekat dengan obyek wisata karena letaknya yang strategis...
                    Pokoknya Keren abizz....
                    <i class="fa-solid fa-quote-right"></i>
                  </p>
                  <img src="https://lh3.googleusercontent.com/a-/ALV-UjU12C4_wKoW4GrezPpnRP47Fjl64dmLiod-INO7qCY9YIqx01190g=w60-h60-p-rp-mo-br100" class="testimonial-img" alt="">
                  <h3>Agdea Lee Brilliant</h3>
                </div>
              </div><div class="swiper-slide swiper-slide-prev" role="group" aria-label="4 / 5" style="width: 418px; margin-right: 20px;" data-swiper-slide-index="3">
                <div class="testimonial-item">
                  <p>
                    <i class="fa-solid fa-quote-left"></i>
                    Tempatnya luas, bersih. Pelayanannya cepat dan ramah. Masakan y disajikan juga enak & harga lumayan. Disini juga tersedia oleh2 & souvenir asli mlg.
                    <i class="fa-solid fa-quote-right"></i>
                  </p>
                  <img src="https://lh3.googleusercontent.com/a-/ALV-UjVQ5fOE02gE2fpZyB14ObCUP4qxVssoDLWUtIucETdJ2HtsDnpf=w60-h60-p-rp-mo-ba5-br100" class="testimonial-img" alt="">
                  <h3>Aditya Marten</h3>
                </div>
              </div><div class="swiper-slide swiper-slide-active" role="group" aria-label="5 / 5" style="width: 418px; margin-right: 20px;" data-swiper-slide-index="4">
                <div class="testimonial-item">
                  <p>
                    <i class="fa-solid fa-quote-left"></i>
                    Nggak Afdhol Main ke malang , ke batu kalau nggak Singgah Ke Buah Tangan buat beli oleh-oleh buat keluarga dan karyawan di Depok.
                    <i class="fa-solid fa-quote-right"></i>
                  </p>
                  <img src="https://lh3.googleusercontent.com/a-/ALV-UjXEXDcyqWm9nnWvLZs9TU4Ng-Dd6hbhla7C1Q4QgCr23pxPjms=w60-h60-p-rp-mo-br100" class="testimonial-img" alt="">
                  <h3>Murodih Monanov</h3>
                </div>
              </div><div class="swiper-slide swiper-slide-next" role="group" aria-label="1 / 5" style="width: 418px; margin-right: 20px;" data-swiper-slide-index="0">
                <div class="testimonial-item">
                  <p>
                    <i class="fa-solid fa-quote-left"></i>
                    pusat oleh oleh yang lengkap, harga lumayan terjangkau, ada jajan jadul juga, toiletnya banyak, masjid yang dibawah memadai, terus juga ada roti yang enak, namanya roti manis kalo enggak salah,  gak sengaja beli dikasir, ternyata rasanya enak, view lantai 3 nya juga bagus,  karyawannya juga ramah.
                    Harus banget kalo liburan mampir kesini🤙🏻
                    <i class="fa-solid fa-quote-right"></i>
                  </p>
                  <img src="https://lh3.googleusercontent.com/a/ACg8ocJxq6KiqP0xjpIT_w2JDhAJYBTnx_Hpzk_0D8z18CvNgDPRDw=w60-h60-p-rp-mo-br100" class="testimonial-img" alt="">
                  <h3>yogi pratama</h3>
                </div>
              </div></div>
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 5" aria-current="true"></span></div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
      </div>
    </div>
  </section>
@endsection
