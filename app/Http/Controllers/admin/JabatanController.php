<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Str;

class JabatanController extends Controller
{
    public function show(){
        $data = Jabatan::all();
        return view('admin.jabatan.show',compact('data'));

    }
    public function create(){
        return view('admin.jabatan.create');

    }

    public function store(Request $request){
        $request->validate([
            'nama' => ['required'],
        ]);


       $jabatan = Jabatan::create([
          'nama' => $request->nama,
        ]);

        return Redirect::route('jabatan.create')->with('success', 'success');
    }

    public function edit($slug){
        $data = Jabatan::where('slug',$slug)->first();

        return view('admin.jabatan.edit',compact('data'));
    }

    public function update(Request $request, $slug)
{
    $data = Jabatan::where('slug', $slug)->first();

    if ($data) {
        $request->validate([
            'nama' => ['required']
        ]);

        $data->update($request->all());

        // Perbarui slug dengan yang baru setelah pembaruan
        $slug_baru = Str::slug($request->nama); // pastikan Anda telah mengimpor namespace untuk Str
        $data->update(['slug' => $slug_baru]);

        return Redirect::route('jabatan.edit', $slug_baru)->with('success', 'success');
    } else {
        return Redirect::route('jabatan.index')->with('error', 'Data not found');
    }

}

   public function destroy($slug){

    $data = Jabatan::where('slug',$slug)->first();
    $data->delete();

    return Redirect::route('jabatan.show')->with('success','success');
   }


}
