<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // use HasFactory;
    protected $table = "book";
    protected $primarykey = "id_book";
    protected $fillable = [
        'judul', 'noisbn', 'penulis', 'penerbit', 'tahun', 'stok', 'harga_pokok', 'harga_jual', 'ppn', 'diskon', 'created_at', 'updated_at'
    ];
}
