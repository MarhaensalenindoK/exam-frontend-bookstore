<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suply;

class SuplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suplys = [
            [
                'id_distributor' => '1', 
                'id_buku' => 'BK01', 
                'jumlah' => 12, 
                'tanggal' => '2021-06-13',
            ],
        ];

        foreach ($suplys as $suply){
            Suply::create($suply);
        }
    }
}
