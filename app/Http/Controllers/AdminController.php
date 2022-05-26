<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{

    public function admin()
    {
        return view('admin.index');
    }

    public function index()
    {
        $admin = User::where('level', '!=', 'pelanggan')->get();

        return view('admin/admin/index', ['admin'=> $admin]);
    }

    public function tambah(){
        return view('admin/admin/tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'level' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => $request['level'],
        ]);
        if ($user->save()) {
            return redirect('/admin/admin')->with('message', 'Berhasil Menambah Data');
        }
    }

    public function ubah(Request $request){
        $user = User::find($request->id);
        return view('admin/admin/ubah', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        $user = User::find($request->id);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'level' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = $request->level;
        $user->save();

        return redirect('/admin/admin')->with('message', 'Berhasil Mengubah Data');
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);

        if ($user->delete()) {
            return redirect('/admin/admin')->with('message', 'Berhasil Menghapus Data');
        }
    }
}
