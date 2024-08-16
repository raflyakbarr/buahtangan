@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <a href="{{ route('products.index') }}" class="mb-md-0 mb-3">
                        <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                    </a>
                    <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                        <h3 class="font-weight-bold mb-0">Produk {{ $product->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="my-3">
        
        <div class="row">
            <div class="col-12">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <div class="row mb-4">
                            @php
                                $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                            @endphp
                            @if (is_array($images) && !empty($images))
                                @foreach($images as $image)
                                    <div class="col-md-3 mb-3">
                                        <img src="{{ asset($image) }}" alt="{{ $product->name }}" class="img-fluid img-thumbnail">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <h5 class="card-title text-center mb-4">{{ $product->name }}</h5>
                        <p class="card-text"><strong>Deskripsi Produk:</strong> {{ $product->description }}</p>
                        <p class="card-text"><strong>Harga:</strong> {{ $product->price }}</p>
                        <p class="card-text"><strong>Kategori:</strong> {{ $product->category->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection