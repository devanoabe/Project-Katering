@extends('layouts.index')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pesanan</h3><br>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
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
        </div>
    </div>
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