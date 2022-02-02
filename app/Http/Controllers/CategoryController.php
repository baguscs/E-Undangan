<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\kategori;

class CategoryController extends Controller
{
    public function index()
    {
        $data = kategori::all();
        return view('home.category.index', compact('data'));
    }

    public function add()
    {
        return view('home.category.add');
    }

    public function post(Request $req)
    {
        $newData = new kategori;

        $newData->kategori = $req->kategori;
        $harga = preg_replace("/[^a-zA-Z0-9]/", "", $req->harga);
        $newData->harga = $harga;

        $newData->save();
        return redirect()->route('category')->with('pesan', 'Kategori '.$req->kategori.' berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cracked = Crypt::decrypt($id);
        $data = kategori::find($cracked);

        return view('home.category.edit', compact('data'));
    }

    public function edited(Request $req, $id)
    {
        $stack = Crypt::decrypt($id);
        $selectCategory = kategori::where('id', $stack)->firstOrFail();

        $selectCategory->kategori = $req->kategori;
        $harga = preg_replace("/[^a-zA-Z0-9]/", "", $req->harga);
        $selectCategory->harga = $harga;

        $selectCategory->save();
        return redirect()->route('category')->with('pesan', 'Kategori '.$req->kategori.' berhasil diedit');
    }
}
