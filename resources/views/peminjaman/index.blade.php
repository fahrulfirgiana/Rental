@extends('layout')
@section('content')

<div class="card mb-4">
<div class="card-header"><i class="fas fa-table mr-1"></i>Data Peminjaman Kendaraan</div>
<div class="card-body">
<div class="table-responsive">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="/cari" method="GET">
        @csrf
        <div class="form-row">
            <div class="col-md-3"><div class="form-group">
                <input type="date" name="dari" class="form-control">
            </div></div>
            <div class="col-md-3"><div class="form-group">
                <input type="date" name="sampai" class="form-control">
            </div></div>
            <div class=""><div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cari Data">
            </div></div>
            <div class="col-md-2"><div class="form-group">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-success">Tambah Data Peminjaman</a>
            </div></div>
        </div>
        </form>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr align="center">
        <th>No</th>
            <th>No. Ref</th>
            <th>Nama Customer</th>
            <th>Kendaraan</th>
            <th>Sopir</th>
            <th>Lama Pinjam</th>
            <th>Jumlah</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Total</th>
            <th width="14%">Action</th>
    </tr>
</thead>
        <tbody>
            @foreach ($peminjamans as $peminjaman)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $peminjaman->no_ref }}</td>
            <td>{{ $peminjaman->nm_cus }}</td>
            <td>{{ $peminjaman->nm_produk }}</td>
            <td>{{ $peminjaman->nm_sopir }}</td>
            <td>{{ $peminjaman->lama_pinjam }} Hari</td>
            <td>{{ $peminjaman->jumlah }} Produk</td>
            <td>{{ $peminjaman->tgl_pinjam }}</td>
            <td>{{ $peminjaman->tgl_kembali }}</td>
            <td> @currency($peminjaman->total) </td>
            <td>
            <form action="{{ route('peminjaman.destroy',$peminjaman->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
            <a class="btn btn-warning" href="{{ route('peminjaman.edit',$peminjaman->id) }}">Ubah</a>
            <button type="submit" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
            </td>
            </tr>
            @endforeach
        </tbody>
<tfoot>
    @foreach ($sums as $sum)
    <tr align="center">
        <th colspan="9">Total Transaksi</th>
        <th> @currency($sum->total_all)</th>
        <th width="14%">Action</th>
    </tr>
    @endforeach
    @foreach ($avgs as $avg)
    <tr align="center">
        <th colspan="9">Rata-Rata Transaksi</th>
        <th> @currency($avg->total_all)</th>
        <th width="14%">Action</th>
    </tr>
    @endforeach
    @foreach ($counts as $count)
    <tr align="center">
        <th colspan="9">Jumlah Data Transaksi</th>
        <th>{{$count->id_all}} Data</th>
        <th width="14%">Action</th>
    </tr>
    @endforeach
    @foreach ($maxs as $max)
    <tr align="center">
        <th colspan="9">Data Transaksi Tertinggi</th>
        <th> @currency($max->total_all)</th>
        <th width="14%">Action</th>
    </tr>
    @endforeach
    @foreach ($mins as $min)
    <tr align="center">
        <th colspan="9">Data Transaksi Terkecil</th>
        <th> @currency($min->total_all)</th>
        <th width="14%">Action</th>
    </tr>
    @endforeach
</tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
@endsection

