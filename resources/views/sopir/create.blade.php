@extends('layout')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Sopir</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"> Silahkan Isi Data Berikut Ini!</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-edit mr-1"></i>Data Sopir</div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('sopir.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Kode Sopir:</strong>
                            <input type="input" class="form-control" name="kd_sopir" placeholder="Kode Sopir">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nama Sopir:</strong>
                            <input type="input" class="form-control" name="nm_sopir" placeholder="Nama Sopir">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>No HP:</strong>
                            <input type="input" class="form-control" name="nohp" placeholder="Nomor HP">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Gender</strong>
                            <select class="form-control" name="gender">
                                <option value="0">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Alamat:</strong>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Keterangan:</strong>
                            <textarea class="form-control" style="height:70px" name="ket" placeholder="Keterangan"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Foto Produk:</strong>
                            <input type="file" name="gambar"></input>
                        </div>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="{{ route('sopir.index') }}"> Back</a>
                    </div>
                </div>
            </form>
            @endsection