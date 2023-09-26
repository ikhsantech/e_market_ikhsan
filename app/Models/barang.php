<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'kode_barang',
        'produks_id',
        'nama_barang',
        'satuan',
        'harga_jual',
        'stok',
        'ditarik',
        'user_id'
    ];

}
