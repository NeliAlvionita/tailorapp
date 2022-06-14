<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::all();

        return view('admin/faq/index', ['faq'=> $faq]);
    }

    public function tambah(){
        return view('admin/faq/tambah');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'pertanyaan' => ['required', 'string', 'max:255'],
            'jawaban' => ['required', 'string', 'max:255'],
        ]);
        $input = $request->all();
        Faq::create($input);
   
        return redirect('/admin/faq')->with('message','Berhasil Menambahkan Data');
    }

    public function ubah(Request $request){
        $faq = Faq::find($request->id_faq);
        return view('admin/faq/ubah', ['faq' => $faq]);
    }

    public function update(Request $request)
    {
        
        $faq = Faq::find($request->id_faq);
        $this->validate($request, [
            'pertanyaan' => ['required', 'string', 'max:255'],
            'jawaban' => ['required', 'string', 'max:255'],
        ]);
        
        $faq->pertanyaan=$request->pertanyaan;
        $faq->jawaban=$request->jawaban;
        $faq->save(); 
 

        return redirect('/admin/faq')->with('message','Berhasil Mengubah Data');
    }

    
    public function delete(Request $request)
    {
        $faq = Faq::findorFail($request->id_faq);
        if ($faq->delete()) {
            return redirect('/admin/faq')->with('message', 'Berhasil Menghapus Data');
        }
        
    }
        
    
}
