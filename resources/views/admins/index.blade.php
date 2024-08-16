@extends('layouts.app')

@section('content')
    <div class="container py-4 px-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h3 class="font-weight-bold">List Admin</h3>
            </div>
            <div class="col-md-6 text-md-end">
                <button onclick="refreshPage()" class="btn btn-dark">
                    <i class="bi bi-arrow-clockwise"></i> Refresh
                </button>
                <a class="btn btn-success ms-2" href="{{ route('admins.create') }}"><i class="fa-solid fa-user-plus"></i> Daftarkan Admin</a>
            </div>
        </div>
        <hr>
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <table id="adminsTable" class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr class="text-center align-middle">
                            <td>{{ $admin->name }}</td>
                            <td>
                                @if($admin->role == 'content_writer')
                                    Content Writer
                                @elseif($admin->role == 'admin')
                                    Admin
                                @else
                                    {{ ucfirst($admin->role) }}
                                @endif
                            </td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete" data-name="{{ $admin->name }}">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
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
        $('#adminsTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari admin...",
                lengthMenu: "Tampilkan _MENU_ data",
            },
        });

        $('.btn-delete').on('click', function(e) {
            e.preventDefault(); // Stop default form submission

            const name = $(this).data('name'); // Get the admin's name

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Anda yakin?',
                text: `Menghapus admin ${name}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with form submission if confirmed
                    $(this).closest('form').submit();
                }
            });
        });
    });
</script>
<script>
    function refreshPage() {
        window.location.reload();
    }
</script>
@endpush
@endsection
