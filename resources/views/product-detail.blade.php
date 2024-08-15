@extends('layouts.guestnav')

@section('content')
<style>
    .product-image-container {
        text-align: center;
    }

    .thumbnail-container {
        cursor: pointer;
    }

    .thumbnail-image {
        width: 60px;
        height: 60px;
        border: 2px solid #ddd;
        padding: 2px;
        transition: border-color 0.3s ease;
    }

    .thumbnail-image:hover {
        border-color: #333;
    }

    .main-image {
        max-width: 100%;
        height: auto;
        padding: 10px;
        background-color: #fff;
    }
</style>
<div class="container mt-5">
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('product.list') }}" class="text-dark btn-secondary ms-3 mb-3 bi bi-chevron-double-left">Kembali</a>
    </div>
    <div class="row">
        <!-- Kolom Gambar Produk -->
        <div class="col-md-6 mb-4">
            <div class="product-image-container">
                <!-- Gambar utama -->
                @php
                    // Decode the images JSON string into an array
                    $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                @endphp
                @if (is_array($images) && !empty($images))
                    <img id="mainImage" src="{{ asset($images[0]) }}" alt="{{ $product->name }}" class="img-fluid main-image">
                @endif
            </div>

            <!-- Thumbnail Gambar -->
            <div class="product-thumbnails d-flex mt-3">
                @foreach($images as $index => $image)
                    <div class="thumbnail-container me-2">
                        <img src="{{ asset($image) }}" alt="Thumbnail {{ $index + 1 }}" class="img-thumbnail thumbnail-image" onclick="changeMainImage('{{ asset($image) }}')">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Kolom Informasi Produk -->
        <div class="col-md-6">
            <h1 class="product-title">{{ $product->name }}</h1>
            <p class="product-description">{{ $product->description }}</p>
            <div class="product-price mb-3">
                <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            </div>
            <div class="product-variants mb-3">
                <!-- Tambahkan varian produk jika ada -->
            </div>
            <div class="product-meta">
                <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
            </div>
            <a class="btn btn-dark" href="{{ $product->product_url }}">Beli Sekarang</a>
        </div>
    </div>
</div>

<script>
    function changeMainImage(imageUrl) {
        document.getElementById('mainImage').src = imageUrl;
    }
</script>

@endsection
