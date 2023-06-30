<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sopir;
use App\Models\Produk;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PeminjamanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $peminjamans = DB::table('peminjaman')->join('produk', 'produk.id', '=', 'peminjaman.produk')
      ->join('sopir', 'sopir.id', '=', 'peminjaman.sopir')
      ->get();

    $sums = DB::table('peminjaman')
      ->select(DB::raw("SUM(total) AS total_all"))
      ->get();

    $avgs = DB::table('peminjaman')
      ->select(DB::raw("AVG(total) AS total_all"))
      ->get();

    $counts = DB::table('peminjaman')
      ->select(DB::raw("COUNT(id) AS id_all"))
      ->get();

    $maxs = DB::table('peminjaman')
      ->select(DB::raw("MAX(total) AS total_all"))
      ->get();

    $mins = DB::table('peminjaman')
      ->select(DB::raw("MIN(total) AS total_all"))
      ->get();

    return view('peminjaman.index', compact('peminjamans', 'sums', 'avgs', 'counts', 'maxs', 'mins'))->with('i', (request()->input('page', 1) - 1) * 20);
  }

  public function cari(Request $request)
  {
    // $cari = $request->input('cari');
    $dari = $request->input('dari');
    $sampai = $request->input('sampai');
    $query = "tgl_pinjam BETWEEN '" . $dari . "' AND '" . $sampai . "'";
    $peminjamans = DB::table('peminjaman')->join('produk', 'produk.id', '=', 'peminjaman.produk')
      ->join('sopir', 'sopir.id', '=', 'peminjaman.sopir')
      // ->where('sopir.nm_sopir', 'LIKE', "%" . $cari . "%")
      ->whereRaw($query)
      ->get();

    $sums = DB::table('peminjaman')->whereRaw($query)
      ->select(DB::raw("SUM(total) AS total_all"))
      ->get();

    $avgs = DB::table('peminjaman')->whereRaw($query)
      ->select(DB::raw("AVG(total) AS total_all"))
      ->get();

    $counts = DB::table('peminjaman')->whereRaw($query)
      ->select(DB::raw("COUNT(id) AS id_all"))
      ->get();

    $maxs = DB::table('peminjaman')->whereRaw($query)
      ->select(DB::raw("MAX(total) AS total_all"))
      ->get();

    $mins = DB::table('peminjaman')->whereRaw($query)
      ->select(DB::raw("MIN(total) AS total_all"))
      ->get();

    return view('peminjaman.index', compact('peminjamans', 'sums', 'avgs', 'counts', 'maxs', 'mins'))->with('i', (request()->input('page', 1) - 1) * 20);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $produks = Produk::all();
    $sopirs = Sopir::all();
    return view('peminjaman.create', compact('produks', 'sopirs'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'no_ref' => 'required',
      'no_cus' => 'required',
      'nm_cus' => 'required',
      'produk' => 'required',
      'sopir' => 'required',
      'jumlah' => 'required',
      'lama_pinjam' => 'required',
      'tgl_pinjam' => 'required',
      'tgl_kembali' => 'required',
    ]);

    $harga_kendaraan = $request->input('harga');
    $jml = $request->input('jumlah');
    $lama = $request->input('lama_pinjam');
    $harga_sopir = 50000;
    $total = (($harga_kendaraan * $jml) * $lama) + $harga_sopir;
    $stok = $request->input('stok');
    $sisa = $stok - $jml;

    Peminjaman::create([
      'no_ref' => $request->no_ref,
      'no_cus' => $request->no_cus,
      'nm_cus' => $request->nm_cus,
      'produk' => $request->produk,
      'sopir' => $request->sopir,
      'jumlah' => $request->jumlah,
      'lama_pinjam' => $request->lama_pinjam,
      'tgl_pinjam' => $request->tgl_pinjam,
      'tgl_kembali' => $request->tgl_kembali,
      'total' => $total,
    ]);

    DB::table('produk')->where('id', $request->produk)->update([
      'stok' => $sisa
    ]);

    return redirect()->route('peminjaman.index')
      ->with('success', 'Data created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Peminjaman $peminjaman)
  {
    $produks = Produk::all();
    $sopirs = Sopir::all();
    return view('peminjaman.edit', compact('peminjaman', 'produks', 'sopirs'));
  }

  public function update(Request $request, Peminjaman $peminjaman)
  {
    $request->validate([
      'no_ref' => 'required',
      'no_cus' => 'required',
      'nm_cus' => 'required',
      'produk' => 'required',
      'sopir' => 'required',
      'jumlah' => 'required',
      'lama_pinjam' => 'required',
      'tgl_pinjam' => 'required',
      'tgl_kembali' => 'required',
    ]);

    $peminjaman->update($request->all());
    return redirect()->route('peminjaman.index')
      ->with('success', 'Data berhasil dirubah');
  }

  public function destroy(Peminjaman $peminjaman)
  {
    $peminjaman->delete();
    return redirect()->route('peminjaman.index')
      ->with('success', 'Data berhasil dihapus');
  }
}
