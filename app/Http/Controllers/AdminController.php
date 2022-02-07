<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.index');
    }

    public function index(){
        $admin = User::where('level', '=', 'admin')->get();

        return view('admin/admin/index', ['admin'=> $admin]);
    }
}
