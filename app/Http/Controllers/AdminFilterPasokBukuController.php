<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;
use App\Models\Suply;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminFilterPasokBukuController extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $distributors = Distributor::all();

        return view('admin.filter_pasok_buku.index', compact('user','distributors'));
    }
    
    public function filterByDistributor (Request $req)
    {
        $suplys = Suply::all()->where('id_distributor', $req->distributor);
        $distributor = Distributor::where('id_distributor', $req->distributor)->first();
        $mytime = Carbon::now()->format('d-m-Y');
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
