@extends('layouts.guestnav')

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <h2 class="fw-bolder mb-4">Kategori: {{ $category->name }}</h2>
        <div class="row">
            <div class="col-lg-8">
                <!-- Articles list -->
                @forelse($articles as $article)
                <div class="row gx-4 gx-lg-5 py-4">
                    @foreach ($articles as $article)
                        <div class="col-md-4 mb-5">
                            <a href="{{ route('article', ['slug' => $article->slug]) }}" class="card-link">
                                <div class="card h-100 shadow" >
                                    @if ($article->image)
                                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text" style="text-align: justify;" >{{ Str::limit(html_entity_decode(strip_tags($article->content)), 151) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                @empty
                
                    <p class="text-muted">Tidak ada artikel yang ditemukan pada kategori ini.</p>
                @endforelse
            </div>          
        </div>
    </div>
@endsection
