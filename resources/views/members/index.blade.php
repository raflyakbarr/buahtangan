@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <h3 class="font-weight-bold mb-0">
                        List Member
                    </h3>
                    <div class="d-flex align-items-center gap-2 mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                        <button onclick="refreshPage()" class="btn btn-dark bi bi-arrow-clockwise"> Refresh</button>
                        <a class="btn btn-success" href="{{route('members.create')}}">Buat Member</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-3">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-striped table-hover table-bordered" id="membersTable" datatable>
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Telp</th>
                                <th>Nomor Member</th>
                                <th>Points</th>
                                <th>QR Code</th>
                                <th>Tambah Points</th>
                                <th>Aksi</th>
                                @if(Auth::user()->role === 'super_admin')
                                    <th>Reset Point</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->telp }}</td>
                                    <td>{{ $member->member_number }}</td>
                                    <td>{{ $member->points }}</td>
                                    <td>
                                        @if($member->qr_code)
                                            <img src="{{ asset($member->qr_code) }}" alt="QR Code" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" class="form-control point-input" min="0" placeholder="Points">
                                            <button class="btn btn-success btn-add-points" data-member="{{ $member->member_number }}">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-dark" href="{{ route('members.show', $member->member_number) }}"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('members.edit', ['member' => $member->member_number]) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('members.destroy', ['member' => $member->member_number]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-delete" data-name="{{ $member->name }}"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>
                                    @if(Auth::user()->role === 'super_admin')
                                        <td>
                                            <form action="{{ route('members.resetPoints', ['member' => $member->member_number]) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <button type="submit" class="btn btn-danger btn-reset" data-name="{{ $member->name }}">Reset Point</button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@push('scripts')
<script type="module">
    $(document).ready(function() {
        $('#membersTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari member...",
                lengthMenu: "Tampilkan _MENU_ data",
            },
        });

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var name = $(this).data("name");

            Swal.fire({
                title: 'Anda yakin ingin menghapus\n' + name + '?' ,
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
        $(document).ready(function() {
            $('.btn-add-points').on('click', function() {
                var memberNumber = $(this).data('member');
                var pointsToAdd = $(this).closest('td').find('.point-input').val();

                if (pointsToAdd && !isNaN(pointsToAdd) && pointsToAdd > 0) {
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: `Tambahkan ${pointsToAdd} poin?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, tambahkan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route("members.addPoints") }}',
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    member_number: memberNumber,
                                    points: pointsToAdd
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Berhasil!',
                                        'Poin berhasil ditambahkan.',
                                        'success'
                                    ).then(() => {
                                        location.reload();
                                    });
                                },
                                error: function() {
                                    Swal.fire(
                                        'Error!',
                                        'Gagal menambahkan poin.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        'Masukkan jumlah poin yang valid.',
                        'error'
                    );
                }
            });
        });
        $('#membersTable').DataTable();
        $('.btn-reset').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var name = $(this).data("name");

            Swal.fire({
                title: 'Reset Point',
                text: "Point akan menjadi 0 \n dan Riwayat point " + name + " juga akan di reset",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
<script>
    function refreshPage() {
        window.location.reload();
    }
</script>
@endsection
