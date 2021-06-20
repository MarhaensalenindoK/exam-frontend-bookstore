<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suply;
use App\Models\Distributor;
use Illuminate\Support\Facades\Auth;

class AdminLaporanController extends Controller
{

    public function indexPasokBuku ()
    {
        $user = Auth::user();

        return view('admin.pasok_buku.index', compact('user'));
    }

    public function getPasok ()
    {
        $suplys = Suply::orderBy('tanggal', 'desc')->get();
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

    public function indexFilterPasokBuku ()
    {
        $user = Auth::user();
        $distributors = Distributor::all();

        return view('admin.filter_pasok_buku.index', compact('user','distributors'));
    }
    
    public function filterByDistributor (Request $req)
    {
        $suplys = Suply::all()->where('id_distributor', $req->distributor);
        $distributor = Distributor::where('id_distributor', $req->distributor)->first();
        $mytime = date("d/m/Y");
        $dataSuply = [];
        foreach($suplys as $suply){
            $suply['distributor'] = $suply->distributor;
            $suply['book'] = $suply->book;
            array_push($dataSuply , $suply);
        }
        $countBook = 0;
        foreach($dataSuply as $book){
            $countBook += $book['book']['stok'];
        }

        return view('admin.filter_pasok_buku.form',compact('dataSuply','distributor','mytime','countBook'));
    }
}