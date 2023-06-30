@extends('layout')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Peminjaman</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-edit mr-1"></i>Data Peminjaman</div>
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

            <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nomor Referensi:</strong>
                            <input type="text" class="form-control" name="no_ref" placeholder="Masukan No Referensi">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nomor Customer:</strong>
                            <input type="text" class="form-control" name="no_cus" placeholder="Masukan No Customer">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nama Costumer:</strong>
                            <input type="text" class="form-control" name="nm_cus" placeholder="Masukan Nama Costumer">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Produk:</strong>
                            <select class="form-control" name="produk" id="produk" onchange="changeValue(this.value)">
                                <option value="0">Pilih Produk</option>
                                <?php //pengenalan jsarray
                                $jsArray = "var prdName = new Array();\n"; 
                                ?>
                                @foreach ($produks as $produk)
                                <option value="{{ $produk->id}}">{{ $produk->nm_produk}}</option>
                                <?php // isi js array
                                $jsArray .= "prdName['".$produk->id."'] = {
                                harga:'".addslashes($produk->harga)."',
                                stok:'".addslashes($produk->stok)."'};\n";
                                ?>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Harga Sewa Kendaraan:</strong>
                            <input type="text" class="form-control" name="harga" id="harga" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Stok Kendaraan:</strong>
                            <input type="text" class="form-control" name="stok" id="stok" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nama Sopir:</strong>
                            <select class="form-control" name="sopir" id="sopir" onchange="changeValuee(this.value)">
                                <option>Pilih Sopir</option>
                                <?php //pengenalan jsarray
                                $jspArray = "var sprName = new Array();\n"; 
                                ?>
                                @foreach ($sopirs as $sopir)
                                <option value="{{ $sopir->id }}">{{ $sopir->nm_sopir }}</option>
                                <?php // isi js array
                                $jspArray .= "sprName['".$sopir->id."'] = {
                                alamat:'".addslashes($sopir->alamat)."'};\n";
                                ?>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Alamat:</strong>
                            <input type="text" class="form-control" name="alamat" id="alamat" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Jumlah Pinjam:</strong>
                            <input type="text" class="form-control" name="jumlah" placeholder="Masukan Nama Costumer">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Lama Pinjam:</strong>
                            <input type="text" class="form-control" name="lama_pinjam" placeholder="Masukan Nama Costumer">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tanggal Pinjam:</strong>
                            <input type="date" class="form-control" name="tgl_pinjam" placeholder="Masukan Nama Costumer">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tanggal Kembali:</strong>
                            <input type="date" class="form-control" name="tgl_kembali" placeholder="Masukan Nama Costumer">
                        </div>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                <?php echo $jsArray;?>
                function changeValue(x){
                    document.getElementById('harga').value = prdName[x].harga;
                    document.getElementById('stok').value = prdName[x].stok;
                }
                <?php echo $jspArray;?>
                function changeValuee(x){
                    document.getElementById('alamat').value = sprName[x].alamat;
                }
            </script>
            @endsection