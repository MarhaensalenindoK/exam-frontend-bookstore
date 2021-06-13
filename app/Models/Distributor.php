<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    // use HasFactory;
    protected $table = "distributor";
    protected $primarykey = "id_distributor";
    protected $fillable = [
        'id_buku', 'jumlah', 'tanggal'
    ];
}
