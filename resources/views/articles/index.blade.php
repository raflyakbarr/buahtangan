<!-- resources/views/articles/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Articles</h1>
                <a href="{{ route('articles.create') }}" class="btn btn-success mb-2">Create Article</a>
                <table class="table table-bordered text-center" id="articlesTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Halaman Artikel</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td><a href="{{ route('article', ['slug' => $article->slug]) }}" class="btn btn-dark">Pergi ke halaman</a></td>
                                <td>
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-dark"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
