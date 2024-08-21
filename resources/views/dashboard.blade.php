@extends('layouts.app')

@section('content')
<style>
    .zoom-card {
        transition: transform 0.3s ease;
    }
    .zoom-card:hover {
        transform: scale(1.05);
    }
</style>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4 px-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-gradient-primary shadow-lg">
                    <div class="card-body p-4" style="border-left: 10px solid #055E2E; border-radius:5px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold mb-0">
                                    @auth
                                        Halo, {{ Auth::user()->name }}
                                    @endauth
                                </h2>
                                <p class="mb-0 opacity-8">
                                    @if(Auth::user()->role === 'content_writer')
                                        Content Writer
                                    @elseif(Auth::user()->role === 'admin')
                                        Admin
                                    @else
                                        Super Admin
                                    @endif
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="mb-0 text-sm opacity-8">Tanggal Hari ini</p>
                                <h4 class="font-weight-bold mb-0">{{ date('F d, Y') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm" style="border-left: 10px solid #055E2E; border-radius:5px;">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-3 text-center">Shortcut</h5>
                        <div class="d-flex flex-wrap justify-content-center gap-2">
                            @if(Auth::user()->role === 'super_admin')
                            <a href="{{ route('admins.index') }}" class="btn btn-sm btn-success d-flex align-items-center">
                                <i class="bi bi-person-badge me-2"></i>
                                Daftar Admin
                            </a>
                            @endif
                            @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin')
                            <a href="{{ route('members.index') }}" class="btn btn-sm btn-success d-flex align-items-center">
                                <i class="bi bi-people me-2"></i>
                                Daftar Member
                            </a>
                            @endif
                            @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'content_writer')
                            <a href="{{ route('articles.index') }}" class="btn btn-sm btn-success d-flex align-items-center">
                                <i class="bi bi-file-earmark-plus me-2"></i></i>
                                Daftar Artikel
                            </a>
                            @endif
                            @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin')
                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-success d-flex align-items-center">
                                <i class="bi bi-boxes me-2"></i>
                                 Daftar Produk
                            </a>
                            @endif
                            @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'content_writer')
                            <a href="{{ route('edithome.index') }}" class="btn btn-sm btn-success d-flex align-items-center">
                                <i class="bi bi-house-gear-fill me-2"></i>
                                Edit Halaman Home
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin')
            <div class="col-md-3 col-sm-6">
                <div class="card bg-gradient-info shadow-sm zoom-card">
                    <div class="card-body" style="border-left: 10px solid #055E2E; border-radius:5px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-0 text-sm opacity-8">Jumlah Produk</p>
                                <h3 class="font-weight-bolder mb-0">{{ $totalProducts }}</h3>
                            </div>
                            <div class="icon icon-shape bg-white text-center rounded-circle shadow-sm">
                                <i class="bi bi-box-fill text-info opacity-5" style="font-size: 30px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card bg-gradient-success zoom-card shadow-sm">
                    <div class="card-body" style="border-left: 10px solid #055E2E; border-radius:5px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-0 text-sm opacity-8">Jumlah Member</p>
                                <h3 class="font-weight-bolder mb-0">{{ $totalMember }}</h3>
                            </div>
                            <div class="icon icon-shape bg-white text-center rounded-circle shadow-sm">
                                <i class="bi bi-people-fill text-success opacity-10" style="font-size: 30px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'content_writer')
            <div class="col-md-3 col-sm-6">
                <div class="card bg-gradient-warning zoom-card shadow-sm">
                    <div class="card-body" style="border-left: 10px solid #055E2E; border-radius:5px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-0 text-sm opacity-8">Jumlah Artikel</p>
                                <h3 class="font-weight-bolder mb-0">{{ $totalArticle }}</h3>
                            </div>
                            <div class="icon icon-shape bg-white text-center rounded-circle shadow-sm">
                                <i class="bi bi-file-text-fill text-warning opacity-10" style="font-size: 30px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(Auth::user()->role === 'super_admin')
            <div class="col-md-3 col-sm-6">
                <div class="card bg-gradient-danger zoom-card shadow-sm">
                    <div class="card-body" style="border-left: 10px solid #055E2E; border-radius:5px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-0 text-sm opacity-8">Jumlah Admin</p>
                                <h3 class="font-weight-bolder mb-0">{{ $totalAdmin }}</h3>
                            </div>
                            <div class="icon icon-shape bg-white text-center rounded-circle shadow-sm">
                                <i class="bi bi-person-badge-fill text-danger opacity-10" style="font-size: 30px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body" style="border-left: 10px solid #055E2E; border-radius:5px;">
                        <h5 class="card-title mb-4 text-center">Statistik Kunjungan Website</h5>
                        <div style="height: 300px;">
                            <canvas id="visitsChart"></canvas>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6 text-center">
                                <p class="text-sm text-muted mb-0">Total:</p>
                                <h3 class="font-weight-bold text-primary">{{ $totalVisits }}</h3>
                            </div>
                            <div class="col-md-6 text-center">
                                <p class="text-sm text-muted mb-0">Hari ini:</p>
                                <h3 class="font-weight-bold text-success">{{ $todayVisits }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const ctx = document.getElementById('visitsChart').getContext('2d');
    const visitsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: @json($visits),
                borderColor: 'rgba(66, 135, 245, 1)',
                backgroundColor: 'rgba(66, 135, 245, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    bodyColor: '#fff',
                    titleColor: '#fff',
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 14
                    },
                    padding: 10,
                    displayColors: false
                }
            }
        }
    });
</script>
@endsection