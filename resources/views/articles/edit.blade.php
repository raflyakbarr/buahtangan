@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Article</h1>
            <form action="{{ route('articles.update', $article->id) }}" method="POST" id="articleForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Thumbnail</label>
                    <input type="file" name="image" class="form-control">
                    @if($article->image)
                        <img src="{{ asset($article->image) }}" alt="Thumbnail" class="img-thumbnail mt-2" style="max-height: 150px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="hidden" name="content" id="content">
                    <div id="editor-container" style="height: 300px;">{!! $article->content !!}</div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                [{ 'size': [] }],
                ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                [{'list': 'ordered'}, {'list': 'bullet'},
                 {'indent': '-1'}, {'indent': '+1'}],
                ['link', 'image', 'video'],
                ['clean']
            ]
        },
        placeholder: 'Tulis sesuatu di sini...'
    });

    // Set existing content in Quill editor
    quill.root.innerHTML = `{!! addslashes($article->content) !!}`;

    // On form submission, populate the hidden input with Quill's HTML content
    document.getElementById('articleForm').onsubmit = function() {
        const htmlContent = quill.root.innerHTML.trim();
        document.getElementById('content').value = htmlContent.length > 0 ? htmlContent : null;
    };
</script>
@endpush
@endsection


