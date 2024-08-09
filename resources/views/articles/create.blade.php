@extends('layouts.app')

@section('content')
<style>
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
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <form action="{{ route('articles.store') }}" method="POST" id="articleForm" enctype="multipart/form-data">
                @csrf
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                            </h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Di post pada {{ date('M d Y') }}, oleh {{ Auth::user()->name }}</div>
                        </header>
                        <!-- Preview image figure-->
                        <div class="form-group">
                            <figure class="mb-3">
                                <img id="previewImage" class="img-fluid rounded" src="{{asset('images/1721139452.png')}}" alt="Image Preview"/>
                            </figure>
                            <label for="image">Thumbnail</label>
                            <input type="file" name="image" id="imageInput" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="kategori_artikel">Kategori Artikel</label>
                            <select class="form-control" id="kategori_artikel" name="kategori_artikel">
                                <option value="">Pilih Kategori</option>
                                <option value="produk">Produk</option>
                                <option value="berita">Berita</option>
                                <option value="event">Event</option>
                            </select>
                        </div>
                        
                        <!-- Post content-->
                                <div class="form-group mt-4">
                                    <label for="content">Content</label>
                                    <input type="hidden" name="content" id="content">
                                    <div id="editor-container" style="height: 800px;"></div>
                                </div>
                            <div class="text-center mt-5 mb-5">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                    </article>
                </form>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4 border-0">
                    <div class="card-header">Share</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 d-flex justify-content-center align-items-center">
                            <li class="mx-2">
                                <a
                                    rel="nofollow" 
                                    data-action="share/whatsapp/share"
                                    class="d-flex justify-content-center align-items-center rounded-circle"
                                    style="width: 40px; height: 40px; background-color: #25D366; color: white;">
                                    <i class="bi bi-whatsapp fs-5"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a
                                    rel="nofollow" 
                                    target="_blank"
                                    class="d-flex justify-content-center align-items-center rounded-circle"
                                    style="width: 40px; height: 40px; background-color: #1877F2; color: white;">
                                    <i class="bi bi-facebook fs-5"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a
                                    rel="nofollow" 
                                    target="_blank"
                                    class="d-flex justify-content-center align-items-center rounded-circle"
                                    style="width: 40px; height: 40px; background-color: #1DA1F2; color: white;">
                                    <i class="bi bi-twitter fs-5"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4 border-0">
                    <div class="card-header">Instagram</div>
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.instagram.com/reel/Cmbg5oRJ306/embed/captioned/?cr=1&amp;v=14&amp;wp=326&amp" allowtransparency="true" scrolling="no" style="max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; padding: 0px;"></iframe> 
                            <script src="//www.instagram.com/embed.js"></script>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0">
                    <div class="card-header">Baca Juga</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-0 mb-3">
                                <a class="text-decoration-none">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('images/1721139452.png')}}" 
                                                alt="#" 
                                                class="img-fluid rounded" 
                                                style="width: 100px; height: 70px; object-fit: cover; margin-bottom:10px;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 text-dark">Artikel Dummy #1</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item p-0 mb-3">
                                <a class="text-decoration-none">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('images/1721139452.png')}}" 
                                                alt="#" 
                                                class="img-fluid rounded" 
                                                style="width: 100px; height: 70px; object-fit: cover; margin-bottom:10px;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 text-dark">Artikel Dummy #2</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item p-0 mb-3">
                                <a class="text-decoration-none">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('images/1721139452.png')}}" 
                                                alt="#" 
                                                class="img-fluid rounded" 
                                                style="width: 100px; height: 70px; object-fit: cover; margin-bottom:10px;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 text-dark">Artikel Dummy #3</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item p-0 mb-3">
                                <a class="text-decoration-none">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('images/1721139452.png')}}" 
                                                alt="#" 
                                                class="img-fluid rounded" 
                                                style="width: 100px; height: 70px; object-fit: cover; margin-bottom:10px;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 text-dark">Artikel Dummy #4</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'size': [] }],
                    ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                    [{'list': 'ordered'}, {'list': 'bullet'},
                    {'indent': '-1'}, {'indent': '+1'}, { 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Tulis sesuatu di sini...'
        });

        // Handle form submission to populate hidden input with Quill's HTML content
        document.getElementById('articleForm').addEventListener('submit', function(event) {
            const htmlContent = quill.root.innerHTML.trim();
            document.getElementById('content').value = htmlContent.length > 0 ? htmlContent : null;
        });
        document.getElementById('imageInput').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('previewImage').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
</script>
@endpush
@endsection
