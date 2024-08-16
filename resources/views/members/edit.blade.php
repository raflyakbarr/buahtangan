@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            
                            <a href="{{ route('members.index') }}" class="btn btn-outline-dark">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <h2 class="font-weight-bold mb-0">Edit Member</h2>

                        </div>
                        <hr>
                        <form action="{{ route('members.update', ['member' => $member->member_number]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $member->name }}">
                            </div>
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input type="number" name="telp" class="form-control" value="{{ $member->telp }}">
                            </div>
                            <div class="form-group">
                                <label for="points">Points</label>
                                <input type="text" placeholder="{{ $member->points }}" class="form-control" disabled>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
