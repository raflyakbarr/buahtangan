
@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <a href="{{ route('products.index') }}" class="mb-md-0 mb-3">
                            <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                        </a>
                        <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            <h3 class="font-weight-bold mb-0">
                                Produk {{ $product->name }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <a class="card-link">
                            <div class="card h-100 shadow">
                                <img class="img-fluid"src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $product->name }}</h5>
                                    <p class="card-text">Deskripsi Produk: {{ $product->description }}</p>
                                    <p class="card-text">Harga: {{ $product->price }}</p>
                                    <p class="card-text">Kategori: {{ $product->kategori }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        </div>
    </main>
@endsection

