@extends('layout')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>DataTable Sopir
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <a class="btn btn-success" href="{{ route('sopir.create') }}"><i class="fa-solid fa-plus"></i> Tambah Data Sopir</a>
            <p></p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Sopir</th>
                        <th>Gambar</th>
                        <th>Nama Sopir</th>
                        <th>No HP</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Sopir</th>
                        <th>Gambar</th>
                        <th>Nama Sopir</th>
                        <th>No HP</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th width="200px">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($sopirs as $sopir)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{ $sopir->kd_sopir }}</td>
                        <td><img width="150px" allign="center" src="{{ url('/sopirdata_file/'.$sopir->gambar) }}"></td>
                        <td>{{ $sopir->nm_sopir }}</td>
                        <td>{{ $sopir->nohp }}</td>
                        <td>{{ $sopir->gender }}</td>
                        <td>{{ $sopir->alamat }}</td>
                        <td>{{ $sopir->ket }}</td>
                        <td>
                            <form action="{{ route('sopir.destroy',$sopir->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{ route('sopir.edit',$sopir->id) }}"><i class="fa-solid fa-pen-to-square fa-xs"> </i> Ubah</a>
                                <p></p>
                                <button type="submit" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-circle-minus fa-xs"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>









@endsection