<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $article->title }}</h1>
                <p>{{ $article->content }}</p>
                <p>Author: {{ $article->user->name }}</p>
                <a href="{{ route('articles.index') }}" class="btn btn-primary">Back to Articles</a>
            </div>
        </div>
    </div>
@endsection
