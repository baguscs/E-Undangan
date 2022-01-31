<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('home.profil.index');
    }

    public function password()
    {
        return view('home.profil.password');
    }

    public function changes(Request $req)
    {
        $this->validate($req, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $find = User::find(Auth::user()->id);
        $checker = Hash::check($req->input('old_password'), $find->password);

        if ($checker) {
            $find->update([
                'password' => Hash::make($req->input('password')),
            ]);
            return redirect()->route('dashboard')->with('pesan', 'Password anda telah dirubah');
        }
        else{
            return redirect()->back()->with('pesan', 'Maaf Password Lama yang anda masukkan salah');
        }
    }
}
