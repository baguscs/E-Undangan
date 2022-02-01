<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\customer;

class CustomerController extends Controller
{
    public function index()
    {
        $data = customer::all();
        return view('home.customer.index', compact('data'));
    }

    public function add()
    {
        return view('home.customer.add');
    }

    public function post(Request $req)
    {
        $message =[
            'unique' => 'Email tersebut telah terdaftar',
        ];

        $this->validate($req, [
            'email' => 'required|unique:customers',
        ],$message);

        $newCustomer = new customer;

        $newCustomer->nama = $req->nama;
        $newCustomer->alamat = $req->alamat;
        $newCustomer->no_telp = $req->telp;
        $newCustomer->email = $req->email;

        $newCustomer->save();

        return redirect()->route('customer')->with('pesan', 'Customer '.$req->nama.' berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cracked = Crypt::decrypt($id);
        $data = customer::find($cracked);

        return view('home.customer.edit', compact('data'));
    }

    public function edited(Request $req, $id)
    {
        $stack = Crypt::decrypt($id);
        $selectCustomer = customer::where('id', $stack)->firstOrFail();
        if ($selectCustomer->email != $req->email) {
            $message =[
                'unique' => 'Email tersebut telah terdaftar',
            ];
    
            $this->validate($req, [
                'email' => 'required|unique:customers',
            ],$message);
        }

        $selectCustomer->nama = $req->nama;
        $selectCustomer->alamat = $req->alamat;
        $selectCustomer->no_telp = $req->telp;
        $selectCustomer->email = $req->email;

        $selectCustomer->save();
        return redirect()->route('customer')->with('pesan', 'Berhasil mengedit customer '.$req->nama);
    }

    public function delete($id)
    {
        $change = Crypt::decrypt($id);
        $dataCustomer = customer::where('id', $change)->delete();
        return redirect()->back()->with('pesan', 'Customer berhasil dihapus');
    }
}
