<?php

namespace App\Http\Controllers;
use App\User;
use App\Footer;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function lihat(){
        $footer = Footer::first();
        return view('pelanggan/akun/lihat', ['footer' => $footer]);
    }

    public function ubah(Request $request){
        $footer = Footer::first();
        $user = User::find($request->id);
        return view('pelanggan/akun/ubah', ['user' => $user], ['footer' => $footer]);
    }

    public function update(Request $request, User $user){
        $user = User::find($request->id);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomorhp' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->nomorhp = $request->nomorhp;
        $user->password = $request->password;
        $user->save();

        return redirect('/pelanggan/akun');
    }
}
