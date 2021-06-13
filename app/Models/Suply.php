<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Distributor;

class Suply extends Model
{
    // use HasFactory;
    protected $table = "supply";
    protected $primarykey = "id_pasok";
    protected $fillable = [
        'id_distributor', 'id_buku', 'jumlah', 'tanggal'
    ];

    public function book ()
    {
        return $this->hasOne(Book::class, 'id_buku', 'id_buku');
    }

    public function distributor ()
    {
        return $this->hasOne(Distributor::class, 'id_distributor', 'id_distributor');
    }
}
