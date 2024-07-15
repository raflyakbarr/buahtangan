@extends('layouts.app')

@section('content')
<div class="container py-4 px-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <a href="{{ route('articles.index') }}" class="mb-md-0 mb-3">
                    <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                </a>
                <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <h3 class="font-weight-bold mb-0">
                        Edit Artikel
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Article</h1>
            <form action="{{ route('articles.update', $article->id) }}" method="POST" id="articleForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group py-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
                </div>
                <div class="form-group py-2">
                    <label for="image">Thumbnail</label>
                    <input type="file" name="image" class="form-control">
                    @if($article->image)
                        <img src="{{ asset($article->image) }}" alt="Thumbnail" class="img-thumbnail mt-2" style="max-height: 150px;">
                    @endif
                </div>
                <div class="form-group py-2">
                    <label for="content">Content</label>
                    <input type="hidden" name="content" id="content">
                    <div id="editor-container" style="height: 800px;">{!! $article->content !!}</div>
                </div>
                <div class="form-group text-center py-2">
                    <button type="submit" class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'size': [] }],
                    ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                    [{'list': 'ordered'}, {'list': 'bullet'},
                    {'indent': '-1'}, {'indent': '+1'}, { 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
        });

        // On form submission, populate the hidden input with Quill's HTML content
        document.getElementById('articleForm').onsubmit = function() {
            const htmlContent = quill.root.innerHTML.trim();
            document.getElementById('content').value = htmlContent.length > 0 ? htmlContent : null;
        };
    });
</script>
@endpush
@endsection


