<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suply;

class AdminPasokBukuController extends Controller
{

    public function index ()
    {
        // $suplys = Suply::where('tanggal', '2021-06-13')->orderBy('tanggal', 'asc');
        $suplys = Suply::all();
        // dd($suplys->where('tanggal', '2021-06-13'));
        $dataSuply = [];
        foreach($suplys as $suply){
            $suply['distributor'] = $suply->distributor;
            $suply['book'] = $suply->book;
            array_push($dataSuply , $suply);
        }

        return view('admin/pasok_buku', compact('dataSuply'));
    }

    public function pasokByYear (Request $req)
    {
        $suplys = Suply::all();
        $suplysByDate = $suplys->where('tanggal', $req->tanggal);
        $dataSuply = [];

        foreach($suplysByDate as $suply){
            $suply['distributor'] = $suply->distributor;
            $suply['book'] = $suply->book;
            array_push($dataSuply , $suply);
        }

        return $dataSuply;
    }

}