<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class AdminInputBukuController extends Controller
{
    public function index ()
    {
        $faker = Faker::create('id_ID');
        $books = Book::all();
        $bookId = $faker->unique()->numerify('BK#######');
        $user = Auth::user();

        return view('admin.input_buku.index', compact('books', 'bookId', 'user'));
    }

    public function addBook (Request $req)
    {
        Book::create([
            'id_buku' => $req->id_buku,
            'judul' => $req->judul,
            'noisbn' => $req->noisbn,
            'penulis' => $req->penulis,
            'penerbit' => $req->penerbit,
            'tahun' => $req->tahun,
            'stok' => Book::DEFAULT_STOCK,
            'harga_pokok' => $req->harga_pokok,
            'harga_jual' => $req->harga_jual,
            'ppn' => Book::TAX,
            'diskon' => $req->diskon,
        ]);

        return back()->with('success', 'Data Berhasil Disimpan');
    }

    public function editBook(Request $req)
    {
        $book = Book::where('id_buku', $req->id_buku);
        $book->update([
            'id_buku' => $req->id_buku,
            'judul' => $req->judul,
            'noisbn' => $req->noisbn,
            'penulis' => $req->penulis,
            'penerbit' => $req->penerbit,
            'tahun' => $req->tahun,
            'stok' => 0,
            'harga_pokok' => $req->harga_pokok,
            'harga_jual' => $req->harga_jual,
            'ppn' => 10,
            'diskon' => $req->diskon,
        ]);

        return back()->with('success', 'Data Berhasil Diubah');
    }

    public function deleteBook($id_buku){
        $book = Book::where('id_buku', $id_buku);
        $book->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
