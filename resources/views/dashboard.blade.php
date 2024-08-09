@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <div class="mb-md-0 mb-3">
                        <h3 class="font-weight-bold mb-0">
                            @auth
                                Hello, {{ Auth::user()->name }}
                            @endauth
                        </h3>
                        <p class="mb-0">
                            @if(Auth::user()->role === 'content_writer')
                            Content Writer
                            @elseif(Auth::user()->role === 'admin')
                            Admin
                            @else
                            Super Admin
                            @endif
                        </p>
                    </div>
                    @if(Auth::user()->role === 'super_admin')
                    <a href="{{ route('admins.index') }}" class="btn btn-sm btn-success btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                        <span class="btn-inner--icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </span>
                        <span class="btn-inner--text">Daftarkan Admin</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <hr class="my-0 mb-3">
        <div class="container mt-5">
            <div class="row g-3">
                @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'admin')
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-box-fill fs-3"></i> Jumlah Produk</h5>
                            <p class="card-text fs-2">{{ $totalProducts }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-people-fill fs-3"></i> Jumlah Member</h5>
                            <p class="card-text fs-2">{{ $totalMember }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'content_writer')
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-building-fill-gear fs-3"></i> Jumlah Artikel</h5>
                            <p class="card-text fs-2">{{ $totalArticle }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->role === 'super_admin')
                <div class="col-md-3">
                    <div class="card shadow" style="border-radius:10px; border-left:10px solid #055E2E;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-person-badge-fill fs-3"></i> Jumlah Admin</h5>
                            <p class="card-text fs-2">{{ $totalAdmin }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="container mx-auto px-4 py-8 mt-5">
            <div class="card bg-white rounded shadow-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mt-3 text-center text-gray-800 mb-6">Statistik Kunjungan Situs</h2>
                    <div class="w-full h-64">
                        <canvas id="visitsChart"></canvas>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <p class="text-sm font-medium text-gray-600">Jumlah Kunjungan Situs</p>
                            <p class="text-3xl font-bold text-indigo-600">{{ $totalVisits }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm font-medium text-gray-600">Jumlah Kunjungan Hari Ini</p>
                            <p class="text-3xl font-bold text-green-600">{{ $todayVisits }}</p>
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
                    borderColor: 'rgba(99, 102, 241, 1)',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
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