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
        $admin = User::where('level', '=', 'admin')->get();

        return view('admin/admin/index', ['admin'=> $admin]);
    }

    public function tambah(){
        return view('admin/admin/tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomorhp' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'level' => ['required', 'string', 'max:255'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nomorhp = $request->nomorhp;
        $user->password = $request->password;
        $user->level = $request->level;
        if ($user->save()) {
            return redirect('/admin/admin');
        }
    }
}
