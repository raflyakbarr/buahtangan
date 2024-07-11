@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Tampilkan Artikel</h1>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
