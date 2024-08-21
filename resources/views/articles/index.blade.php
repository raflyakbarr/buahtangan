<!-- resources/views/articles/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <h3 class="font-weight-bold mb-0">
                        List Artikel
                    </h3>
                    <div class="d-flex align-items-center gap-2 mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                        <button onclick="refreshPage()" class="btn btn-dark bi bi-arrow-clockwise"> Refresh</button>
                        <a class="btn btn-success" href="{{ route('articles.create') }}">Buat Artikel</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-3" >
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered text-center" id="articlesTable">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>Title</th>
                            <th>Author</th>
                            <th>Kategori Artikel</th>
                            <th>Halaman Artikel</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->kategori->name ?? 'Tidak ada kategori' }}</td>
                                <td><a href="{{ route('article', ['slug' => $article->slug]) }}" class="btn btn-dark">Pergi ke halaman</a></td>
                                <td>
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-delete" data-slug="{{ $article->slug }}"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#articlesTable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari artikel...",
                    lengthMenu: "Tampilkan _MENU_ data",
                },
            });
        });    
        $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var title = $(this).closest('tr').find('td:first').text(); 
    
                Swal.fire({
                    title: 'Anda yakin ingin menghapus artikel\n"' + title + '"?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        function refreshPage() {
            window.location.reload();
        }
    </script>
    @endpush
@endsection
