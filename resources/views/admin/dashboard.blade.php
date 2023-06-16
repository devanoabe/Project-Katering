@extends('layouts.index')

<head>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
@section('content')
<div style="padding-left: 50px; padding-right: 50px; padding-top: 24px" class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-4 col-md-6">
            <!-- Page Heading -->
            <h1 style="letter-spacing: -2px; font-size: 40px;color: black;" class="mb-3">Dashboard Farhan <br> Catering</h1>
            <p style="font-size: 13px;" class="mb-3">Fitur dashboard catering adalah sebuah antarmuka atau halaman yang dirancang khusus untuk memudahkan pengelolaan dan pengawasan layanan catering</p>
            <div class="card border-left-primary shadow mb-1">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('admin.user') }}" class="text-decoration-none">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-left-danger shadow mb-1">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('produk.index') }}" class="text-decoration-none">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Produk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produk }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hamburger fa-2x text-gray-300"></i>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-left-success shadow mb-1">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('pesanan.index') }}" class="text-decoration-none">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pemasukan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($income, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-left-warning shadow mb-1">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('pesanan.index') }}" class="text-decoration-none">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pesanan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesanans }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Pending Requests Card Example -->
        <div class="col-xl-8 col-md-6 mb-3">
            <div class="card border-left-warning h-100 shadow py-1 mt-2 fc">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-4">Selamat Datang</div>
                            <div class="h2">
                                <h5><i style="color: #ff7300" class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }}</h5>
                                <h5><i class="fa fa-envelope" aria-hidden="true"></i>{{ Auth::user()->email }}</h5>
                                <h5><i class="fa fa-phone" aria-hidden="true"></i>{{ Auth::user()->telepon }}</h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="btn center-block ps d-flex align-items-end mb-4 ml-5">
                    <button type="button" id="animatebutton" class="btn btn-icon-text animatebutton">
                        <!-- <a href="{{ route('pesanan.index') }}"> -->
                        <i class="fa fa-check btn-icon-prepend"></i> CEK PESANAN </button>
                    <!-- </a> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div style="padding-top: 20px"class="row">

        <!-- Area Chart -->
        <div class="col-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-line">
                        <canvas id="myLineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-5">
            <div class="ag-format-container">
                <div class="ag-courses_box">
                    <div class="ag-courses_item">
                    <a href="{{ route('laporan') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title">
                            Laporan
                            <br>
                            <br>
                            <p style="font-size: 18px; padding-top; 10px">
                                Fitur laporan pada sistem catering adalah komponen penting yang membantu menghasilkan informasi terperinci 
                                tentang kegiatan catering dan memungkinkan pemantauan, analisis, dan pengambilan keputusan yang efektif. 
                            </p>
                        </div>

                        <div class="ag-courses-item_date-box">
                        Jumlah:
                        <span class="ag-courses-item_date">
                            {{$laporan}}
                        </span>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->

    </div>

    <!-- Content Row -->
    
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dataPemasukan = {!!json_encode($dataPemasukan) !!};

    // Mengubah format data ke dalam bentuk yang dapat digunakan oleh Chart.js
    var labels = [];
    var values = [];

    dataPemasukan.forEach(function(data) {
        labels.push('Bulan ' + data.Bulan);
        values.push(data.TotalPemasukan);
    });

    // Menggambar chart menggunakan Chart.js
    var ctx = document.getElementById('myLineChart').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pemasukan',
                data: values,
                backgroundColor: 'rgba(108, 99, 255, 0.8)',
                borderColor: 'rgba(108, 99, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            // plugins:{
            //   title: {
            //     display: true,
            //     text: 'Pengurangan Profit',
            //     font: {
            //       family: 'sans-serif',
            //       size: 16
            //     }
            //   }
            // },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: {
                            family: 'sans-serif',
                            size: 12,
                            weight: 'bold'
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            family: 'sans-serif',
                            size: 12,
                            weight: 'bold'
                        }
                    }
                }
            },
            onClick: function(e) {
                // Lakukan routing ke laman penggantian
                window.location.href = "{{ route('pesanan.index') }}";
            }
        }
    });
</script>
@endsection