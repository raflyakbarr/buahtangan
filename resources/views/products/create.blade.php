@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            
                            <a href="{{ route('products.index') }}" class="btn btn-outline-dark">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <h2 class="font-weight-bold mb-0">Tambah Produk Baru</h2>

                        </div>
                        <hr>
                        <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Tulis nama produk..." required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea id="description" class="form-control" name="description" rows="4" placeholder="Tulis deskripsi produk..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" id="price" name="price" class="form-control" placeholder="0.00" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select id="category_id" name="category_id" class="form-select">
                                    <option value="">Pilih kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="product_url" class="form-label">URL Produk</label>
                                <p class="text-muted text-sm fst-italic" style="font-size: 12px; margin-top: -5px;" >Contoh: https://shopee.co.id/Keripik-Pisang-Coklat-Buah-Tangan-i.1089950066.23957724149</p>
                                <input type="text" id="product_url" name="product_url" class="form-control" placeholder="Tulis URL produk...">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Gambar Produk</label>
                                <div class="custom-file-upload">
                                    <input type="file" name="images[]" id="images" multiple onchange="previewImages()" hidden>
                                    <label for="images" class="file-label btn btn-outline-dark w-100">
                                        <i class="bi bi-cloud-upload me-2"></i> Pilih Gambar
                                    </label>
                                    <span class="file-name text-muted mt-2 d-block">Belum ada gambar yang dipilih.</span>
                                </div>
                                <div id="image-preview" class="row mt-3 g-2"></div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-dark px-4 py-2">
                                    <i class="bi bi-plus-circle me-2"></i> Buat Produk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .custom-file-upload {
        position: relative;
        overflow: hidden;
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
        cursor: pointer;
        transition: all 0.3s;
    }
    .file-name {
        font-size: 0.875em;
    }
    .img-thumbnail {
        object-fit: cover;
        height: 150px;
    }
</style>

@push('scripts')
<script>
    document.getElementById('product-form').addEventListener('submit', function(event) {
        event.preventDefault();

        let form = this;
        let formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Added Successfully',
                    text: data.message,
                }).then(() => {
                    window.location.href = '{{ route('products.index') }}';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message,
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'An Error Occurred',
                text: 'Something went wrong with the request.',
            });
        });
    });
    function previewImages() {
        var preview = document.getElementById('image-preview');
        preview.innerHTML = "";
        var files = document.getElementById('images').files;

        if (files) {
            Array.from(files).forEach(file => {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var colDiv = document.createElement('div');
                    colDiv.className = 'col-4 col-md-3';
                    var img = document.createElement('img');
                    img.src = event.target.result;
                    img.className = 'img-thumbnail w-100';
                    colDiv.appendChild(img);
                    preview.appendChild(colDiv);
                };
                reader.readAsDataURL(file);
            });
        }
    }
</script>
@endpush

@endsection