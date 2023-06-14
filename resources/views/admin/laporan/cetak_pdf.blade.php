<!-- View export_pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export PDF</title>
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border-top: 1px solid #dcdfe2;
            border-bottom: 1px solid #dcdfe2;
            border-left: none;
            border-right: none;
            padding: 7px;
        }
    </style>
</head>


<body>
    <table>
        <tbody>
            <tr>
                <td style="border: none">
                    <h2 style="font-family: 'Roboto Flex', sans-serif; font-weight: bolder">LAPORAN PEMESANAN</h2>
                    <h3 style="margin-top: -20px; font-family: 'Roboto Flex', sans-serif; color: #858796">FARHAN CATERING</h3>
                    <div style="padding-left: 50px; margin-top: -20px; font-family: 'Roboto Flex'">
                        <h5>{{ Auth::user()->name }}</h5>
                        <h5 style="margin-top: -20px;">{{ Auth::user()->email }}</h5>
                        <h5 style="margin-top: -20px;">{{ Auth::user()->telepon }}</h5>
                    </div>
                    <div style="font-family: 'Roboto Flex', sans-serif;">
                        <?php
                            if ($mulai != null && $selesai != null) {
                            ?>
                                <h3>Periode Tanggal {{ $mulai }} s/d {{ $selesai }}</h3>
                            <?php
                            } else {
                            ?>
                                <h3>Periode Tanggal {{ $tanggalPertama }} s/d {{ $tanggalTerakhir }}</h3>
                            <?php
                            }
                        ?>
                    </div>
                </td>
                <td style="border: none">
                    <div style="align-item: right; text-align: right; font-family: 'Roboto Flex'" class="total">
                        <h3>
                            <strong style="color: red">Total :</strong>
                            @if($mulai != null && $selesai != null)
                            <span>Rp. {{ number_format($totalHargaFilter, 0, ',', '.') }}</span>
                            @else
                            <span>Rp. {{ number_format($totalHargaLaporan, 0, ',', '.') }}</span>
                            @endif
                        </h3>
                        <?php
                            if ($mulai != null && $selesai != null) {
                            ?>
                                <h3 style="color: red; margin-top">Total Pesanan : <span style="color: black">{{ $jumlahFilter }}</span></h3>
                            <?php
                            } else {
                            ?>
                                <h3 style="color: red; margin-top">Total Pesanan : <span style="color: black">{{ $jumlahLaporan }}</span></h3>
                            <?php
                            }
                        ?>
                        <section class="content">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

        <table style="color:black;">
            <thead style="font-family: 'Roboto Flex', sans-serif; color: #858796;">
                <tr>
                    <th>No. </th>
                    <th style = "width: 210px">Tanggal</th>
                    <th style = "text-align: left; padding-left: 20px">Pesanan</th>
                    <th style = "width: 120px">Total & Status</th>
                </tr>
            </thead>
            <tbody style="font-family: 'Roboto Flex'">
                @php
                $i = 1; // Inisialisasi variabel increment
                @endphp
                <?php
                if ($mulai != null || $selesai != null) {
                ?>
                    @foreach($filter as $lap)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="padding-left: 10px">
                            <p style="color: #858796">Pemesanan : <span style="color: black"> {{ $lap->tglPemesanan }} </span></p>
                            <p style="color: #858796; margin-top: -14px">Pengambilan :  <span style="color: black"> {{ $lap->tglPengambilan }} </span></p>    
                        </td>
                        <td style="padding-left: 20px;">
                            <h3 style="font-weight: bolder">{{ $lap->user->name }}</h3>
                            <p style="color: #858796; margin-top: -14px">Produk : <span style="color: black"> {{ $lap->produk->namaProduk }} </span></p>
                            <p style="color: #858796; margin-top: -14px">Jumlah : <span style="color: black"> {{ $lap->jumlahPesanan }} </span></p>
                        </td>
                        <td style="text-align: center" id="status{{ $lap->idPesanan }}">
                            <p>Rp. {{ number_format($lap -> totalHarga, 0, ',', '.') }}</p>
                            <p style="color: green; margin-top: -14px">{{ $lap->status }}</p>
                        </td>
                    </tr>
                    @endforeach
                <?php
                } else {
                ?>
                    @foreach($laporan as $lap)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="padding-left: 10px">
                            <p style="color: #858796">Pemesanan : <span style="color: black"> {{ $lap->tglPemesanan }} </span></p>
                            <p style="color: #858796; margin-top: -14px">Pengambilan :  <span style="color: black"> {{ $lap->tglPengambilan }} </span></p>    
                        </td>
                        <td style="padding-left: 20px;">
                            <h3 style="font-weight: bolder">{{ $lap->user->name }}</h3>
                            <p style="color: #858796; margin-top: -14px">Produk : <span style="color: black"> {{ $lap->produk->namaProduk }} </span></p>
                            <p style="color: #858796; margin-top: -14px">Jumlah : <span style="color: black"> {{ $lap->jumlahPesanan }} </span></p>
                        </td>
                        <td style="text-align: center" id="status{{ $lap->idPesanan }}">
                            <p>Rp. {{ number_format($lap -> totalHarga, 0, ',', '.') }}</p>
                            <p style="color: green; margin-top: -14px">{{ $lap->status }}</p>
                        </td>
                    </tr>
                    @endforeach
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</body>