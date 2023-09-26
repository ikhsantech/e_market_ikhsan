<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasok extends Model
{
    use HasFactory;
    protected $table = 'pemasoks';
    protected $fillable = ['nama_pemasok'];
}
