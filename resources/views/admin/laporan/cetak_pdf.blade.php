<!-- View export_pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to PDF</title>

</head>

<body>
    <div class="row">
        <div class="col-lg-12 margin-tb" style="justify-content: center; align-items: center; text-align: center;">
            <div class="pull-left mt-2">
                <h1>LAPORAN PEMESANAN</h1>
                <h2 style="margin-top: 0px">FARHAN CATERING</h2>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <table border="1" style="color:black;">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID Pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Jumlah Pesanan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
            </thead>
            <tbody>
                @php
                $i = 1; // Inisialisasi variabel increment
                @endphp
                @foreach($laporan as $lap)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $lap->idPesanan }}</td>
                    <td>{{ $lap->user->name }}</td>
                    <td>{{ $lap->produk->namaProduk }}</td>
                    <td>{{ $lap->tglPemesanan }}</td>
                    <td>{{ $lap->tglPengambilan }}</td>
                    <td>{{ $lap->jumlahPesanan }}</td>
                    <td>Rp. {{ number_format($lap -> totalHarga, 0, ',', '.') }}</td>
                    <td id="status{{ $lap->idPesanan }}">{{ $lap->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>