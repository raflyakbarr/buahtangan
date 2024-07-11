@extends('layouts.guestnav')

@section('content')
<div class="container py-5">
    <div class="container py-4 px-4">
        <!-- Heading Row-->
        <h1 class="text-center mb-5">Member</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-5">
                <a class="card-link">
                    <div class="card h-100 shadow">
                        @if($member->qr_code)
                            <img src="{{ asset($member->qr_code) }}" class="card-img-top" alt="QR Code">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $member->name }}</h5>
                            <p class="card-text">Member Number: {{ $member->member_number }}</p>
                            <p class="card-text">Points: {{ $member->points }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
