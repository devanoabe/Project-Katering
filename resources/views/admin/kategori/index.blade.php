@extends('layouts.index')

<head>
    <link rel="stylesheet" href="{{asset('css/kategori.css')}}">
</head>

@section('content')

<section style="padding-left: 50px; padding-right: 50px;" class="content">
<h2 style="color:black; font-weight: bolder;">Live Update</h2>
    <div class="row">
        <div class="col-4">
            <div class="card shadow mb-1">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div style="background-color: #f5e9bd; padding: 20px; border-radius: 50%;" class="col-auto">
                                <i style="color: #f3b42d;"class="fas fa-hamburger fa-2x"></i>
                            </div>
                            <div style="padding-left: 20px" class="col mr-2">
                                <a href="{{ route('produk.index') }}" class="text-decoration-none">
                                <div style="color: black" class="h2 mb-0 font-weight-bold">{{ $produk }}</div>
                                    <div style="color: #9898ab" class="text-xs font-weight-bold text-uppercase mb-1">
                                        Produk</div>
                            </div>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-1">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div style="background-color: #c0ddf5; padding: 20px; border-radius: 50%;" class="col-auto">
                                <i style="color: #0c6df5;"class="fa fa-shopping-cart fa-2x"></i>
                            </div>
                            <div style="padding-left: 20px" class="col mr-2">
                                <a href="{{ route('pesanan.index') }}" class="text-decoration-none">
                                <div style="color: black" class="h2 mb-0 font-weight-bold">{{ $pesanan }}</div>
                                    <div style="color: #9898ab" class="text-xs font-weight-bold text-uppercase mb-1">
                                        Pesanan</div>
                            </div>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-1">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div style="background-color: #cbe5e6; padding: 20px; border-radius: 50%;" class="col-auto">
                                <i style="color: #0bb3a4;"class="fas fa-hamburger fa-2x"></i>
                            </div>
                            <div style="padding-left: 20px" class="col mr-2">
                                <a href="{{ route('kategori.index') }}" class="text-decoration-none">
                                <div style="color: black" class="h2 mb-0 font-weight-bold">{{ $kategori }}</div>
                                    <div style="color: #9898ab" class="text-xs font-weight-bold text-uppercase mb-1">
                                        Kategori</div>
                            </div>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<section style="padding: 50;" class="content">

    <div class="row mb-4">
        <div class="col-md-12 d-flex flex-row justify-content-between" data-toggle="modal" data-target="#myModal">
            <h3 style="color:black; font-weight: bolder; text-align:">Kategori</h3>
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm pt-2">
                <i class="fas fa-plus fa-sm text-white-50" style="padding: 5px"></i>
                Input
            </a>
        </div>
    </div>

    <!-- Default box -->
    <div class="card">
    @php $qcount = 1; @endphp
            <table class="table table-borderless">
                <thead style="background-color: #f3f4fb;">
                    <tr>
                        <th>No</th>
                        <th>ID Kategori</th>
                        <th>Kategori</th>
                        <th width="320px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $k)
                    <tr>
                        <td>{{ $qcount++ }}</td>
                        <td>
                            <h4 style="font-weight: bolder">{{ $k -> idKategori}}</h4>
                        </td>
                        <td>
                            <p style="font-size: 13px; color: #8c95b4" class="mb-0">Nama :</p>
                            <h6>{{ $k -> namaKategori}}</h6>
                        </td>
                        <td>
                            <form action="{{ route('kategori.destroy',$k->idKategori) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('kategori.show',$k->idKategori) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('kategori.edit',$k->idKategori) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
</section>
<div class="modal fade " id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 style="font-weight: bolder; color: black;">Tambah Kategori Catering</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('kategori.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idKategori">ID Kategori</label>
                        <input type="text" name="idKategori" class="form-control" id="idKategori" aria-describedby="idKategori">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" class="form-control" id="namaKategori" aria-describedby="namaKategori">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection