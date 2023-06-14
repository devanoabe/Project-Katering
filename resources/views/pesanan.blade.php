@extends('layouts.indexCatering')

<head>
    <link rel="stylesheet" href="{{asset('css/pesanan.css')}}">
</head>

@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section style="padding-left: 50px; padding-right: 50px;" class="content">
    <h1 class="mb-0 judul" style="font-weight: bolder;">Pesanan <span>&</span> Status</h1>
    <h1 class="mb-0 judul" style="font-weight: bolder; margin-top: -20px">history dari semua pesanan</h1>

    <div class="d-flex justify-content-end">
        <div style="background-color: #1a1814; border-radius: 10px" class="card mt-5 p-4">
            <div class="input-group mb-1">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search pl-3" action="{{ route('home.status') }}" method="GET">
                    <div class="input-group">
                        <input style="border-radius: 10px 0px 0px 10px; background-color: black" type="text" name="keyword" id="search-input" class="form-control border-0 small" placeholder="Cari Produk..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button style="padding-top: 10px; padding-bottom: 10px; background-color: black; color: white; border: none; border-radius: 0px 10px 10px 0px;"class="btn" type="submit">
                                <i class="fas fa-search fa-sm"></i> Search
                            </button>
                        </div>
                        <span>
                            <div style="padding-left: 90px;" class="icon"> 
                                <i style="color: #1a1814; padding: 20px; border-radius: 10px; background-color: white"class="fas fa-hamburger fa-lg"></i> 
                            </div>
                        </span>
                    </div>
                </form>
            </div>
            
            <div style="color: white; border: 1px solid #f3b42d; border-radius: 10px" class="d-flex flex-row justify-content-between mb-3 mt-3">
                <div class="d-flex flex-column p-3"><p class="mb-1">Total Pemesanan yang pernah dipesan</p> <small style="color: #f3b42d">{{ $pesan }} pesanan</small>
                </div>
                <div style="background-color: #f3b42d; border-radius: 10px; padding-top: 26px;" class="price pl-3">
                    <a href="{{ route('home.catering') }}" style="padding-right: 10px; padding-left: 10px; color: black; font-weight: bolder">Pesan Lagi?</a>
                </div>
            </div>
            <div style="color: white; border: 1px solid #f3b42d; border-radius: 10px" class="d-flex flex-row justify-content-between mb-3 mt-1">
                <div class="d-flex flex-column p-3"><p class="mb-1">Total Pemesanan yang telah selesai !!</p> <small style="color: #f3b42d">{{ $riwayat }} pesanan</small>
                </div>
                <div style="background-color: #f3b42d; border-radius: 10px; padding-top: 26px;" class="price pl-3">
                    <a href="{{ route('home.riwayat') }}" style="padding-right: 23px; padding-left: 23px; color: black; font-weight: bolder">Riwayat</a>
                </div>
            </div>
        </div>	
    </div>

    <div style="margin-top: 80px" class="card-body">
        <table style="color: white" class="table">
            <thead>
                <tr>
                    <th style=" width: 250px">Tanggal <i class="fa fa-calendar-o" aria-hidden="true"></i></th>
                    <th>User</th>
                    <th style=" width: 340px">Produk</th>
                    <th style=" width: 190px" class="center">Jumlah</th>
                    <th>Status <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                    <th class="center">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan as $p)
                <tr>
                    <td>
                        <div class="d-flex flex-row align-items-center mb-2">
                            <div class="text-center tgl-p">
                                <span style="font-weight: bold;">{{ date('d', strtotime($p->tglPemesanan)) }}</span><br>
                                <span>{{ date('F', strtotime($p->tglPemesanan)) }}</span>
                            </div>
                            <p style="margin-left: 5px; margin-top: 12px">
                                <i style="font-size: 6px; color: red" class="fa fa-circle" aria-hidden="true"></i>
                                Pemesanan
                            </p>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-2">
                            <div class="text-center tgl-pp">
                                <span style="font-weight: bold;">{{ date('d', strtotime($p->tglPengambilan)) }}</span><br>
                                <span>{{ date('F', strtotime($p->tglPengambilan)) }}</span>
                            </div>
                            <p style="margin-left: 5px; margin-top: 12px">
                                <i style="font-size: 6px; color: green" class="fa fa-circle" aria-hidden="true"></i>
                                Pengambilan
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-row align-items-center pt-5">
                            <img style="width: 45px; height: auto; margin-right: 12px" class="img-profile rounded-circle" src="{{asset('assets/img/undraw_profile_3.svg')}}">
                            {{ $p->user->name }} <br>
                            {{ $p->user->email }}
                        </div>
                    </td>
                    <td>
                        <div class="pt-2">
                            <i style="margin-right: 10px; margin-bottom: 10px;" class="fa fa-cutlery" aria-hidden="true"></i>{{ $p->produk->namaProduk }} <br>
                            <p style="color: gray" class="mb-0">Isian : </p>
                            <p style="font-size: 12px">{{ $p->produk->deskripsi }}</p>
                        </div>
                    </td>
                    <td style="font-size: 28px" class="center pt-5">{{ $p->jumlahPesanan }}</td>
                    <td style="padding-top: 60px">
                        <span id="status{{ $p->idPesanan }}" class="{{ $p->status === 'selesai' ? 'text-suc' : 'text-dan' }}">
                            {{ $p->status }}
                        </span>
                    </td>
                    <td style="font-size: 28px" class="center pt-5">Rp. {{ $p->totalHarga }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var activateButtons = document.querySelectorAll('.activate-button');

        activateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var idPesanan = this.getAttribute('data-id');
                var statusCell = document.querySelector('#status' + idPesanan);

                // Kirim permintaan AJAX untuk memperbarui status
                $.ajax({
                    url: '/updateStatus/' + idPesanan,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    data: {
                        status: 'selesai'
                    },
                    success: function(response) {
                        // Perbarui status menjadi "selesai" di halaman
                        statusCell.textContent = 'selesai';
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal memperbarui status');
                    }
                });
            });
        });
    });

    $(document).ready(function() {

        $('#search-input').keyup(function(event) {
            event.preventDefault();

            var keyword = $('#search-input').val();

            $.ajax({
                url: "{{ route('home.status') }}",
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    keyword: keyword
                },
                success: function(response) {
                    // Proses dan tampilkan hasil pencarian di frontend
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Gagal melakukan pencarian');
                }
            });
        });
    });
</script>
@endsection
@endsection