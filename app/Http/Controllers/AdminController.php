<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\admin;
use App\Models\User;
use Image;
use Str;

class AdminController extends Controller
{
    public function index()
    {
        $data = admin::where('roles_id', 2)->get();
        return view('home.admin.index', compact('data'));
    }

    public function add()
    {
        return view('home.admin.add');
    }

    public function post(Request $req)
    {
        $message =[
            'unique' => 'Email tersebut telah terdaftar',
        ];

        $this->validate($req, [
            'email' => 'required|unique:admins',
        ],$message);

        $data = new admin;

        $data->roles_id = 2;
        $data->nama = $req->nama;
        $data->kelamin = $req->kelamin;
        $data->alamat = $req->alamat;
        $data->no_telp = $req->telp;
        $data->email = $req->email;
        $data->status = 1;

        // $profil = time()."_".$req->file('foto')->getClientOriginalName();
        // $loc = public_path().'/storage/profil/'.$profil;
        // $resize = Image::make($req->file('foto'))->resize(300,300)->save($loc);

        // $data->foto = $profil;
        $data->save();

        $newUser = new User;
        $newUser->admin_id = $data->id;
        $newUser->email = $req->email;
        $newUser->password = Hash::make($req->password);

        $newUser->save();

        // $email = $req->email;
        // $verif = array(
        //     'nama' => $req->nama,
        //     'kode' => $req->akses,
        // );

        // return view('home.admin.verifikasi.email', compact('verif'));
        // dd($req->nama);
        // Mail::send('home.admin.verifikasi.email', $verif, function ($message) use($email) {
        //     $message->from('MailTo@gmail.com', 'MailTo');
        //     $message->to($email, 'Verification Your E-mail');
        //     $message->subject('Verifikasi E-mail');
        // });
        // if (Mail::failures()) {
        //     return redirect()->back()->with('notif', 'E-mail tidak ditemukan');
        // }
        return redirect()->route('admin')->with('pesan', 'Admin '.$req->nama.' sukses ditambahkan');
    }

    public function edit($id)
    {
        $cracked = Crypt::decrypt($id);
        $data = Admin::find($cracked);
        return view('home.admin.edit', compact('data'));
    }

    public function edited(Request $req, $id)
    {
        $stack = Crypt::decrypt($id);
        $selectAdmin = admin::where('id', $stack)->firstOrFail();
        if ($selectAdmin->email != $req->email) {
            $message =[
                'unique' => 'Email tersebut telah terdaftar',
            ];
    
            $this->validate($req, [
                'email' => 'required|unique:admins',
            ],$message);
        }

        $selectAdmin->nama = $req->nama;
        $selectAdmin->kelamin = $req->kelamin;
        $selectAdmin->alamat = $req->alamat;
        $selectAdmin->no_telp = $req->telp;
        $selectAdmin->email = $req->email;
        $selectAdmin->status = $req->status;

        $selectAdmin->save();

        $selectUser = User::where('admin_id', $stack)->firstOrFail();

        $selectUser->email = $req->email;
        $selectUser->save();
        return redirect()->route('admin')->with('pesan', 'Admin '.$req->nama.' sukses diedit');
    }

    public function delete($id)
    {
        $change = Crypt::decrypt($id);
        $dataUser = User::where('admin_id', $change)->delete();
        $dataAdmin = admin::where('id', $change)->delete();
        return redirect()->route('admin')->with('pesan', 'Berhasil menghapus admin');
    }
}
