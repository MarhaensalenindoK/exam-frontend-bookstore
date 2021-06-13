<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'id_buku' => 'BK01',
                'judul' => 'Kisah Cinta',
                'noisbn' => '66666666',
                'penulis' => 'Anton',
                'penerbit' => 'Wikipedia',
                'tahun' => 2020,
                'stok' => 60,
                'harga_pokok' => 20.000,
                'harga_jual' => 30.000,
                'ppn' => 10,
                'diskon' => 12,
            ],
        ];

        foreach ($books as $book){
            Book::create($book);
        }
    }
}
