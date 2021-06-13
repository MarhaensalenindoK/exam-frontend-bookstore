<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suply;
use Illuminate\Support\Facades\Auth;

class AdminPasokBukuController extends Controller
{

    public function index ()
    {
        $user = Auth::user();

        return view('admin.pasok_buku.index', compact('user'));
    }

    public function getPasok ()
    {
        $suplys = Suply::all();
        $dataSuply = [];
        foreach($suplys as $suply){
            $suply['distributor'] = $suply->distributor;
            $suply['book'] = $suply->book;
            array_push($dataSuply , $suply);
        }

        return $dataSuply;
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