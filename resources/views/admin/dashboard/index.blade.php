@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Barang</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('barangs')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang Masuk</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('barang_masuks')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang Keluar</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('barang_keluars')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Users</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('users')->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="totalBarangChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="barangMasukKeluarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mengambil data dari backend
            $.ajax({
                url: "{{ route('dashboard.data') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Chart Total Barang
                    var ctxTotalBarang = document.getElementById('totalBarangChart').getContext('2d');
                    var totalBarangChart = new Chart(ctxTotalBarang, {
                        type: 'pie',
                        data: {
                            labels: ['Total Barang', 'Total Users'],
                            datasets: [{
                                label: 'Total',
                                data: [data.total_barang, data.total_users],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.7)',
                                    'rgba(54, 162, 235, 0.7)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return tooltipItem.label + ': ' + tooltipItem
                                                .raw.toFixed(0);
                                        }
                                    }
                                }
                            }
                        }
                    });

                    // Chart Barang Masuk vs Keluar
                    var ctxBarangMasukKeluar = document.getElementById('barangMasukKeluarChart')
                        .getContext('2d');
                    var barangMasukKeluarChart = new Chart(ctxBarangMasukKeluar, {
                        type: 'bar',
                        data: {
                            labels: ['Barang Masuk', 'Barang Keluar'],
                            datasets: [{
                                label: 'Jumlah',
                                data: [data.barang_masuk, data.barang_keluar],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.7)',
                                    'rgba(54, 162, 235, 0.7)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return tooltipItem.label + ': ' + tooltipItem
                                                .raw.toFixed(0);
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
