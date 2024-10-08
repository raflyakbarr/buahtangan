@extends('layouts.app')

@section('content')
<style>
    .custom-file-upload {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
        border-radius: 5px;
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
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        text-align: center;
        transition: all 0.3s;
        font-weight: 500;
    }
    .file-name {
        margin-top: 5px;
        display: block;
        font-size: 0.9em;
        color: #6c757d;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .img-thumbnail {
        transition: transform 0.3s ease;
    }

    .img-thumbnail:hover {
        transform: scale(1.05);
    }
</style>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            
                            <a href="{{ route('products.index') }}" class="btn btn-outline-dark">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <h2 class="font-weight-bold mb-0">Edit Produk</h2>

                        </div>
                        <hr class="my-4" >
                        <form id="product-form" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label"><strong>Nama</strong></label>
                                <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" placeholder="Tulis nama produk...">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label"><strong>Deskripsi</strong></label>
                                <textarea class="form-control" id="description" style="height:150px" name="description" placeholder="Tulis deskripsi produk...">{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label"><strong>Harga</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control" placeholder="Masukkan harga produk...">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label"><strong>Kategori</strong></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('category_id'))
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Kategori tidak dapat kosong',
                                        text: '{{ $errors->first('category_id') }}'
                                    });
                                </script>
                            @endif
                            <div class="mb-3">
                                <label for="product_url" class="form-label"><strong>Url Produk</strong></label>
                                <input type="text" name="product_url" id="product_url" value="{{ $product->product_url }}" class="form-control" placeholder="Tulis url produk">
                            </div>
                            <div class="mb-3">
                                <div id="image-preview" class="row">
                                    @php
                                        // Decode the images JSON string into an array
                                        $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                                    @endphp
                                    @if (is_array($images) && !empty($images))
                                        @foreach($images as $image)
                                            <div class="col-md-3">
                                                <img src="{{ asset($image) }}" alt="{{ $product->name }}" class="img-thumbnail mb-2" width="150">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="custom-file-upload mt-3">
                                        <input type="file" name="images[]" id="images" multiple onchange="previewImages()" hidden>
                                        <label for="images" class="file-label btn btn-outline-dark">
                                            <i class="bi bi-cloud-upload"></i> Pilih Gambar
                                        </label>
                                        <span class="file-name">Tidak ada gambar dipilih.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-dark"><i class="bi bi-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function previewImages() {
        var preview = document.getElementById('image-preview');
        var fileNameDisplay = document.querySelector('.file-name');
        var files = document.getElementById('images').files;
        preview.innerHTML = '';
        fileNameDisplay.textContent = '';

        if (files.length === 0) {
            fileNameDisplay.textContent = 'Tidak ada gambar dipilih.';
        } else {
            Array.from(files).forEach(function(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail mb-2';
                    img.style.width = '150px';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);

                // Display file names
                fileNameDisplay.textContent += file.name + ', ';
            });
            fileNameDisplay.textContent = fileNameDisplay.textContent.slice(0, -2); // Remove trailing comma
        }
    }
</script>
@endsection
