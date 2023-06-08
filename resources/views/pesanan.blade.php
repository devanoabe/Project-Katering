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
            <p class="mb-0"><i class="fa fa-credit-card mr-2" aria-hidden="true"></i>Dashboard</p>
            <h2 class="mb-5" style="color:white; font-weight: bolder;">Pesanan</h2>
        @foreach($pesanan as $p)
        <div class="col-md-12">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="ms-2 c-details">
                            <h4 style="color: #978c9a; font-weight: bolder" class="mb-0">
                                <span style="color: black; margin-right: 5px">{{ $p->user->name }}</span>
                                <span id="status{{ $p->idPesanan }}" class="{{ $p->status === 'selesai' ? 'text-suc' : 'text-dan' }}">
                                    @if ($p->status === 'selesai')
                                        <i class="fas fa-check-circle fa-xs"></i> <!-- Font Awesome check-circle icon -->
                                    @else
                                        <i class="fas fa-exclamation-circle fa-xs"></i> <!-- Font Awesome exclamation-circle icon -->
                                    @endif
                                    {{ $p->status }}
                                </span>
                                @if ($p->status === 'selesai')
                                    <span>{{ $p->updated_at->format('Y-m-d') }}</span>
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
                <div style="color: black;" class="mt-4 d-flex flex-row mr-4">
                    <h6 class="heading mr-4"><i class="fa fa-bookmark mr-2" aria-hidden="true"></i>{{ $p->idProduk }}</h6>
                    <h6 class="heading mr-4"><i class="fa fa-calendar mr-2" aria-hidden="true"></i>Pemesanan : {{ $p->tglPemesanan }}</h6>
                    <h6 class="heading mr-4"><i class="fa fa-calendar mr-2" aria-hidden="true"></i>Pengambilan : {{ $p->tglPengambilan }}</h6>
                    <h6 class="heading mr-4"><i class="fa fa-inbox mr-2" aria-hidden="true"></i>Jumlah : {{ $p->jumlahPesanan }}</h6>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h4 style="color: black; font-weight: bold">Total Rp. {{ $p->totalHarga }}</h4>
                </div>
            </div>
        </div>
        @endforeach
        <!-- <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>ID User</th>
                        <th>ID Produk</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanan as $p)
                    <tr>
                        <td>{{ $p->idPesanan }}</td>
                        <td>{{ $p->user->id }}</td>
                        <td>{{ $p->idProduk }}</td>
                        <td>{{ $p->tglPemesanan }}</td>
                        <td>{{ $p->tglPengambilan }}</td>
                        <td>{{ $p->jumlahPesanan }}</td>
                        <td>{{ $p->totalHarga }}</td>
                        <td id="status{{ $p->idPesanan }}">{{ $p->status }}</td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <form action="{{ route('pesanan.destroy', $p->idPesanan) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <form action="{{ route('pesanan.updateStatus', $p->idPesanan) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success activate-button" data-id="{{ $p->idPesanan }}">Activate</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> -->

</section>
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
</script>
@endsection
@endsection