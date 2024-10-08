@extends('layouts.app')

@section('content')
<style>
  .card__container {
    padding-block: 5rem;
    margin-left: 50px;
  }

  .card__content {
    border-radius: 1.25rem;
    overflow: hidden;
  }

  .card__article {
    width: 300px; /* Remove after adding swiper js */
    border-radius: 1.25rem;
    overflow: hidden;
  }

  .card__image {
    position: relative;
    background-color: var(--first-color-light);
    padding-top: 1.5rem;
    margin-bottom: -.75rem;
  }

  .card__data {
    background-color: var(--container-color);
    padding: 1.5rem 2rem;
    border-radius: 1rem;
    text-align: center;
    position: relative;
    z-index: 10;
  }

  .card__img {
    width: 180px;
    margin: 0 auto;
    position: relative;
    z-index: 5;
  }

  .card__shadow {
    width: 200px;
    height: 200px;
    background-color: var(--first-color-alt);
    border-radius: 50%;
    position: absolute;
    top: 3.75rem;
    left: 0;
    right: 0;
    margin-inline: auto;
    filter: blur(45px);
  }

  .card__name {
    font-size: var(--h2-font-size);
    color: var(--second-color);
    margin-bottom: .75rem;
  }

  .card__description {
    font-weight: 500;
    margin-bottom: 1.75rem;
  }

  .card__button {
    display: inline-block;
    background-color: var(--first-color);
    padding: .75rem 1.5rem;
    border-radius: .25rem;
    color: var(--dark-color);
    font-weight: 600;
  }

  /* Swiper class */
  .swiper-button-prev:after,
  .swiper-button-next:after {
    content: "";
  }

  .swiper-button-prev,
  .swiper-button-next {
    width: initial;
    height: initial;
    font-size: 3rem;
    color: var(--second-color);
    display: none;
  }

  .swiper-button-prev {
    left: 0;
  }

  .swiper-button-next {
    right: 0;
  }

  .swiper-pagination-bullet {
    background-color: hsl(212, 32%, 40%);
    opacity: 1;
  }

  .swiper-pagination-bullet-active {
    background-color: var(--second-color);
  }

  /*=============== BREAKPOINTS ===============*/
  /* For small devices */
  @media screen and (max-width: 320px) {
    .card__data {
      padding: 1rem;
    }
  }

  /* For medium devices */
  @media screen and (min-width: 768px) {
    .card__content {
      margin-inline: 3rem;
    }

    .swiper-button-next,
    .swiper-button-prev {
      display: block;
    }
  }

  /* For large devices */
  @media screen and (min-width: 1120px) {
    .card__container {
      max-width: 1120px;
    }

    .swiper-button-prev {
      left: -1rem;
    }
    .swiper-button-next {
      right: -1rem;
    }
  }
  @media (max-width: 992px) {
    .navbar-nav {
        text-align: center;
    }
}
.swiper {
width: 100%;
height: 100%;
}

.swiper-slide {
text-align: center;
font-size: 18px;
background: #fff;
display: flex;
justify-content: center;
align-items: center;
}

.swiper-slide img {
display: block;
width: 100%;
height: 100%;
object-fit: cover;
}
a{
text-decoration: none;
}
.navbar a{
    color: #055E2E;
    font-size: 22px;
    font-weight: bold;
}
.navbar-nav .nav-item {
    margin-left: 25px; /* Ganti dengan jarak yang diinginkan */
    margin-right: 25px; /* Ganti dengan jarak yang diinginkan */
}
footer {
    flex-shrink: 0;
    width: 100%;
    left: 0;
    bottom: 0;
}
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Set tinggi minimum body sesuai tinggi layar */
    margin: 0;
}
.main{
    flex: 1;
}
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
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: all 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
        /* ... (style yang sudah ada) ... */
        .bi-question-circle-fill {
        cursor: pointer;
    }
</style>
<nav class="navbar navbar-expand-lg shadow" style="background-color: #FFCC03; border-bottom: 15px solid #055E2E; padding:22px; position: relative; z-index:100;" >
    <div class="container position-relative" >
        <div class="logo-container" style="
        position: absolute;
        top: 100%;
        left: 0;
        transform: translateY(-43%);
        "><a>
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
                    <a class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Produk Buah Tangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
<div class="col-lg-12 p-3 text-center" style="background-color: #FFCC03;" >
    <div class="mt-3">
        @foreach($images as $image)
            <div class="d-inline-block m-2">
                <img class="img-fluid rounded" src="{{ asset($image->image_url) }}" alt="Image" style="width: 150px;">
                <form action="{{ route('edithome.deleteImage', $image->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mt-2 btn-delete-hero" data-id="{{ $image->id }}">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
    <form action="{{ route('edithome.addImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="custom-file-upload mt-3">
                        <input type="file" name="image_url" id="image_url" class="file-input" accept="image/*">
                        <label for="image_url" class="file-label">
                            <i class="bi bi-cloud-upload"></i> Pilih Gambar
                        </label>
                        <span class="file-name">Tidak ada gambar dipilih.</span>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-dark">
                        Tambah gambar
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col">
            <a class="text-light btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-question-circle"></i></a>
        </div>
    </div>
    <div class="gap mt-5">
        <img class="img-fluid" src="{{ asset('images/Buah-Tangan-Batu-1024x163.png') }}" alt="Text Kisah" style="width: 500px;" >
    </div>
  <!-- Image or Icon here -->
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Informasi Gambar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="{{asset('images/Aspect-Ratio-Blog-Image-Updated-1170x725.jpg')}}" width="465px" alt="">
          <p class="fst-italic text-center">Sumber: https://www.eyecatchmedia.com/</p>
          <p>Pastikan gambar memiliki aspect ratio 16:9 (landscape) dengan resolusi 1920x1080 (1080p), agar gambar tidak pecah dan terlalu banyak crop.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
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
  <img class="img-fluid" src="{{ asset('images/gap.png')}}" alt="">
  <div class="py-5" style="background-color: #0C6633;">
    <section class="container text-center">
        <h2 class="text-center text-light mb-5">Produk Unggulan</h2>
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($cards->chunk(4) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center">
                        @foreach($chunk as $card)
                        <div class="card mx-2" style="width: 18rem;">
                            <img src="{{ asset($card->image) }}" class="card-img-top" alt="{{ $card->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->name }}</h5>
                                <p class="card-text">{{ $card->description }}</p>
                                <p class="card-text">Rp {{ number_format($card->price, 0, ',', '.') }}</p>
                                <a href="{{ $card->button_link }}" class="btn btn-warning">{{ $card->button_text }}</a>
                            </div>
                            <!-- Delete Button Below Card -->
                            <div class="card-footer d-flex justify-content-between">
                                <form action="{{ route('edithome.destroy', $card->id) }}" method="POST" class="delete-form" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $card->id }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                                <button type="button" class="btn btn-primary btn-delete" data-bs-toggle="modal" data-bs-target="#editModal"
                                data-bs-id="{{ $card->id }}"
                                data-bs-name="{{ $card->name }}"
                                data-bs-price="{{ $card->price }}"
                                data-bs-button_text="{{ $card->button_text }}"
                                data-bs-button_link="{{ $card->button_link }}"
                                data-bs-description="{{ $card->description }}"
                                data-bs-image="{{ asset($card->image) }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>                            
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
        <button class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#addCardModal">Tambah Card</button>
    </section>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Card</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              @if(isset($card))
              <form id="editForm" action="{{ route('edithome.update', $card->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                      <input type="hidden" id="edit_id" name="id" value="{{ $card->id }}">
                      <div class="mb-3">
                          <label for="edit_name" class="form-label">Judul/Nama</label>
                          <input type="text" class="form-control" id="edit_name" name="name" value="{{ $card->name }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="edit_price" class="form-label">Harga</label>
                          <input type="text" class="form-control" id="edit_price" name="price" value="{{ $card->price }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="edit_button_text" class="form-label">Teks Tombol</label>
                          <input type="text" class="form-control" id="edit_button_text" name="button_text" value="{{ $card->button_text }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="edit_button_link" class="form-label">Teks Link</label>
                          <input type="text" class="form-control" id="edit_button_link" name="button_link" value="{{ $card->button_link }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="edit_description" class="form-label">Deskripsi</label>
                          <textarea class="form-control" id="edit_description" name="description" required>{{ $card->description }}</textarea>
                      </div>
                      <div class="mb-3">
                          <label for="edit_image" class="form-label">Gambar</label>
                          <input type="file" class="form-control" id="edit_image" name="image">
                      </div>
                      <img id="edit_preview" src="" alt="Current Image" style="max-width: 200px; display: {{ $card->image ? 'block' : 'none' }};">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
              </form>
              @else
              <div class="modal-body">
                  <p>No card available.</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
              @endif
          </div>
      </div>
  </div>
  
 <div class="modal fade" id="addCardModal" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCardModalLabel">Tambah Card Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('edithome.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="image" class="form-label">Gambar</label>
                  <input type="file" class="form-control" name="image" required>
              </div>
              <div class="mb-3">
                  <label for="name" class="form-label">Judul/Nama</label>
                  <input type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-3">
                  <label for="price" class="form-label">Harga</label>
                  <input type="number" class="form-control" name="price" required>
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea class="form-control" name="description" required></textarea>
              </div>
              <div class="mb-3">
                  <label for="button_text" class="form-label">Teks Tombol</label>
                  <p class="text-muted fst-italic">Contoh: Beli Sekarang</p>
                  <input type="text" class="form-control" name="button_text">
              </div>
              <div class="mb-3">
                  <label for="button_link" class="form-label">Teks Link</label>
                  <p class="text-muted fst-italic">Contoh: https://shopee.co.id/Keripik-Pisang-Coklat-Buah-Tangan-i.1089950066.23957724149</p>
                  <input type="text" class="form-control" name="button_link">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Tambah Card</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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
                <img class="img-fluid" src="{{ asset('images/traveling2.png') }}" alt="" width="550px">
            </div>
            <div class="col d-flex justify-content-end">
                <img class="img-fluid" src="{{ asset('images/keranjang.png') }}" alt="" width="500px">
            </div>
        </div>
    </div>
  </section>
  </div>
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
              <a class="text-body">Customer Care</a>
            </li>
            <li>
                <i class="bi bi-whatsapp"></i>
                <a class="text-body">Whatsapp</a>
            </li>
            <li>
                <i class="bi bi-instagram"></i>
              <a class="text-body">Instagram</a>
            </li>
            <li>
                <i class="bi bi-envelope"></i>
              <a class="text-body">Email</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0">About Us</h5>
          <ul class="list-unstyled">
            <li>
              <a class="text-body">FAQ</a>
            </li>
            <li>
              <a class="text-body">Brosur</a>
            </li>
            <li>
              <a class="text-body">Artikel</a>
            </li>
            <li>
              <a class="text-body">Return Policy</a>
            </li>
            <li>
              <a class="text-body">Deliver Policy</a>
            </li>
            <li>
              <a class="text-body">Admin</a>
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
      <a class="text-body">PT. Buah Tangan Group</a>
    </div>
    <!-- Copyright -->
  </footer>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const editModal = document.getElementById('editModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-bs-id');
                const name = button.getAttribute('data-bs-name');
                const price = button.getAttribute('data-bs-price');
                const buttonText = button.getAttribute('data-bs-button_text');
                const buttonLink = button.getAttribute('data-bs-button_link');
                const description = button.getAttribute('data-bs-description');
                const image = button.getAttribute('data-bs-image');
                
                const modalTitle = editModal.querySelector('.modal-title');
                const modalBodyInputId = editModal.querySelector('#edit_id');
                const modalBodyInputName = editModal.querySelector('#edit_name');
                const modalBodyInputPrice = editModal.querySelector('#edit_price');
                const modalBodyInputButtonText = editModal.querySelector('#edit_button_text');
                const modalBodyInputButtonLink = editModal.querySelector('#edit_button_link');
                const modalBodyInputDescription = editModal.querySelector('#edit_description');
                const modalBodyInputImage = editModal.querySelector('#edit_image');
                const modalImagePreview = editModal.querySelector('#edit_preview');
                
                modalTitle.textContent = `Edit Card`;
                modalBodyInputId.value = id;
                modalBodyInputName.value = name;
                modalBodyInputPrice.value = price;
                modalBodyInputButtonText.value = buttonText; // Menambahkan Button Text
                modalBodyInputButtonLink.value = buttonLink; // Menambahkan Button Link
                modalBodyInputDescription.value = description;

                if (image) {
                    modalImagePreview.src = image;
                    modalImagePreview.style.display = 'block';
                } else {
                    modalImagePreview.style.display = 'none';
                }
                        // Event listener for image input change
                modalBodyInputImage.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            modalImagePreview.src = e.target.result;
                            modalImagePreview.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        modalImagePreview.style.display = 'none';
                    }
                });
            });
        }
        const deleteHeroButtons = document.querySelectorAll('.btn-delete-hero');
        deleteHeroButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission

                const form = this.closest('form'); // Get the form closest to the button

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: 'Anda tidak dapat mengembalikan item yang terhapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('form');
                const cardId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: 'Anda tidak dapat mengembalikan item yang terhapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
        document.getElementById('image_url').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.querySelector('.file-name').textContent = fileName;
        });
    });
  </script>
@endsection