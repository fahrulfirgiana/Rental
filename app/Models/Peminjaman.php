<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
  use HasFactory;

  public $table = "peminjaman";

  protected $fillable = [
    'no_ref', 'no_cus', 'nm_cus', 'produk', 'sopir', 'jumlah', 'lama_pinjam', 'tgl_pinjam', 'tgl_kembali', 'tot_bayar', 'total'
  ];
}
