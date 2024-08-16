@extends('layouts.guestnav')

@section('content')
<!-- SweetAlert -->
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'Gagal!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

<header class="py-5" style="background-color: #055E2E;">
    <div class="container px-4 px-lg-5">
        <div class="text-center text-light">
            <h1 class="display-4 fw-bolder">Semua Artikel</h1>
            <p class="lead fw-normal text-white-50 mb-3">Baca artikel yang anda suka</p>
            <form action="{{ route('article-list.search') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari artikel..." aria-label="Cari artikel..." aria-describedby="button-search">
                    <button class="btn btn-outline-light" type="submit" id="button-search">Cari</button>
                </div>
            </form>
        </div>
        <nav class="nav justify-content-center">
            @foreach ($categories as $category)
                <a href="{{ route('category.articles', $category->slug) }}" class="nav-item nav-link" style="color: #fcc510; text-decoration: none; font-size:20px">
                    <strong>{{ $category->name }}</strong>
                </a>
            @endforeach
        </nav>
    </div>
</header>
<!-- Page content-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Articles list -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center py-4">
                @if ($articles->isEmpty())
                    <div class="col">
                        <h1 class="text-center">Artikel tidak ditemukan</h1>
                    </div>
                @else
                    @foreach ($articles as $article)
                        <div class="col mb-4" style="max-width: 300px;">
                            <a href="{{ route('article', ['slug' => $article->slug]) }}" class="card-link">
                                <div class="card h-100 shadow">
                                    @if ($article->image)
                                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text" style="text-align: justify;">{{ Str::limit(html_entity_decode(strip_tags($article->content)), 151) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
