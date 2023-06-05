@extends('layouts.index')

<head>
    <link rel="stylesheet" href="{{asset('css/produk.css')}}">
</head>

@section('content')
<section style="padding-left: 50px; padding-right: 50px; padding-top: 20px;" class="content">
<!-- Default box -->
<h2 style="color:black; font-weight: bolder;" class="mb-0">Produk dan Foto</h2>
<p>Managemen produk dan details </p>

<div class="row">
        <div class="col-md-6">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i style="color: #f3b42d;"class="fas fa-hamburger fa-xs"></i> </div>
                        <div class="ms-2 c-details pl-2">
                            <h6 style="color: black; font-weight: bolder" class="mb-0">Produk</h6>
                        </div>
                    </div>
                    <div class="badge"> <span>Product</span> </div>
                </div>
                <div class="mt-4 d-flex justify-content-between">
                    <h5 class="heading">Product dari<br>Farhan Catering :</h5>
                    <h1 style="color: black; font-weight: bolder; font-size: 50px">{{ $produk }}</h1>
                </div>
                <hr>
                <div class="d-flex flex-row-reverse">
                    <div class="p-2">Flex item 1</div>
                </div>
            </div>
        </div>
</div>

            <div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50" style="margin-right: 5px;"></i>Input
                </a>
            </div>
            <table style="background-color: white;" class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Foto Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>ID User</th>
                        <th>ID Kategori</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produks as $p)
                    <tr>
                        <td>{{ $p -> idProduk}}</td>
                        <td>{{ $p -> namaProduk}}</td>
                        <td><img src="{{ asset('storage/'.$p->foto) }}" alt="Foto Produk" width="100"></td>
                        <td>{{ $p -> deskripsi}}</td>
                        <td><span>Rp. </span>{{ $p -> hargaProduk}}</td>
                        <td>{{ $p -> user_id}}</td>
                        <td>{{ $p -> kategori_id}}</td>
                        <td>
                            <form action="{{ route('produk.destroy',$p->idProduk) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('produk.show',$p->idProduk) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('produk.edit',$p->idProduk) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-5">
                <a href="{{ route('exportPDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50" style="margin-right: 5px;"></i>Cetak ke PDF</a>
            </div>

            <div class="col-md-12">
                {{ $produks->links() }}
            </div>


</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Produk Catering</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('produk.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idProduk">ID Produk</label>
                        <input type="text" name="idProduk" class="form-control" id="idProduk" aria-describedby="idProduk">
                    </div>
                    <div class="form-group">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" name="namaProduk" class="form-control" id="namaProduk" aria-describedby="namaProduk">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Produk: </label>
                        <input type="file" class="form-control" required="required" id="foto" name="foto"></br>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="hargaProduk">Harga Produk</label>
                        <input type="text" name="hargaProduk" class="form-control" id="hargaProduk" aria-describedby="hargaProdukhargaProduk">
                    </div>
                    <div class="form-group">
                        <label for="user_id">ID User</label>
                        <select name="user_id" class="form-control">
                            @foreach($user as $u)
                            <option value="{{ $u -> id }}">{{ $u -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">ID Kategori</label>
                        <select name="kategori_id" class="form-control">
                            @foreach($kategori as $k)
                            <option value="{{ $k -> idKategori }}">{{ $k -> namaKategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@endsection