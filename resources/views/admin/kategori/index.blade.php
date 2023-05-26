@extends('layouts.index')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <<div class="card">
        <div class="card-header">
            <h3 class="card-title">Kategori Catering</h3><br>
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
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50" style="margin-right: 5px;"></i>Input</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $k)
                    <tr>
                        <td>{{ $k -> idKategori}}</td>
                        <td>{{ $k -> namaKategori}}</td>
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
        </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Catering</h4>
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