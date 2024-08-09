@extends('layouts.guestnav')
<style>
.list-group-item a {
    color: inherit;
    text-decoration: none;
}
</style>
@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- Category list -->
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header">Kategori Produk</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush rounded">
                            @foreach ($categories as $category)
                                <li class="list-group-item list-group-item-light {{ request('category') == $category ? 'active' : '' }}">
                                    <a href="{{ route('product.list', ['category' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <section>
                    <header class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('product-list.search') }}" method="GET" class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Cari produk" value="{{ request('keyword') }}">
                                <button type="submit" class="btn btn-dark">Cari</button>
                            </form>
                        </div>
                    </header>
                    @if(request()->has('keyword'))
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Hasil pencarian untuk: {{ request('keyword') }}</h5>
                            <a href="{{ route('product.list') }}" class="text-dark btn-secondary ms-3 mb-3 bi bi-chevron-double-left">Kembali</a>
                        </div>
                    @endif
                    @if($isCategoryView)
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Kategori : {{ $selectedCategory->name }}</h5>
                            <a href="{{ route('product.list') }}" class="text-dark btn-secondary ms-3 mb-3 bi bi-chevron-double-left">Kembali</a>
                        </div>
                    @endif
                        
                    @if($products->isEmpty())
                        <div class="alert alert-light mt-3">
                            Tidak ada produk yang ditemukan.
                        </div>
                    @else
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
                            @foreach ($products as $product)
                                <div class="col">
                                    <div class="card h-100 shadow">
                                        <img src="{{ asset($product->images[0]) }}" class="card-img-top" alt="{{ $product->name }}">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">{{ $product->description }}</p>
                                            <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                            <div class="mt-auto text-center">
                                                <a href="{{ route('product.detail', $product->slug) }}" class="btn">Detail Produk</a>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ $product->product_url }}" class="btn btn-dark px-5">Beli</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection
