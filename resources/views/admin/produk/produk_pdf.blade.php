<!DOCTYPE html>
<html>
<head>
    <title>Produk Katering</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb" style="justify-content: center; align-items: center; text-align: center;">
            <div class="pull-left mt-2">
                <h1>LAPORAN DATA PRODUK</h1>
                <h2 style="margin-top: 30px">FARHAN CATERING</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>ID User</th>
            <th>ID Kategori</th>
        </tr>
        @foreach ($produks as $p)
            <tr>
                <td>{{ $p->idProduk }}</td>
                <td>{{ $p->namaProduk }}</td>
                <td>{{ $p->deskripsi }}</td>
                <td>{{ $p->hargaProduk }}</td>
                <td style="text-align:center;">{{ $p->user_id }}</td>
                <td>{{ $p->kategori_id }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
