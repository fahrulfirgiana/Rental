<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $table = "produk";

    protected $fillable = [
        'nm_produk', 'harga', 'stok', 'ket', 'gambar'
    ];
}
