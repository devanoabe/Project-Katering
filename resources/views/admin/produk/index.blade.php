@extends('layouts.index')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produk Catering</h3><br>
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
            <div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50" style="margin-right: 5px;"></i>Input</a>
            </div>
            <table class="table">
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
                        <td>{{ $p -> namaProduk}}</td>x
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
        </div>
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