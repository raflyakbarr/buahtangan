@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <a href="{{ route('members.index') }}" class="mb-md-0 mb-3">
                    <button type="button" class="btn btn-dark bi bi-arrow-left">Kembali</button>
                </a>
                <div class="d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <h3 class="font-weight-bold mb-0">
                        Member, {{ $member->name}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Detail Member</h5>
                    <img src="{{ asset($member->qr_code) }}" class="card-img-top w-50 mb-3" alt="QR Code">
                    <p class="card-text"><strong>Nama Member: </strong>{{ $member->name}}</p>
                    <p class="card-text"><strong>No. Telepon Member: </strong>{{ $member->telp }}</p>
                    <p class="card-text"><strong>No. Member: </strong>{{ $member->member_number }}</p>
                    <p class="card-text"><strong>Member Points: </strong>{{ $member->points }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Poin</h5>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Admin</th>
                                <th>Points</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatPoints as $index => $riwayatPoint)
                            <tr>
                                <td>{{ $index + $riwayatPoints->firstItem() }}</td>
                                <td>{{ $riwayatPoint->admin->name }}</td>
                                <td>{{ $riwayatPoint->points }}</td>
                                <td>{{ $riwayatPoint->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <form action="{{ route('members.deleteRiwayatPoint', $member->member_number) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat point ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $riwayatPoint->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $riwayatPoints->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection