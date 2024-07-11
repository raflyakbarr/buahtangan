@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Detail Member</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Nama: {{ $member->name }}</h5>
            <p class="card-text">No. Telfon: {{ $member->telp }}</p>
            <p class="card-text"><strong>Member Number: </strong>{{ $member->member_number }}</p>
            <img src="{{ asset($member->qr_code) }}" class="card-img-top w-50" alt="QR Code">
        </div>
    </div>
</div>
@endsection
