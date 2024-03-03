<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{

    public function show(){
        $data = User::all();
        return view('admin.pengguna.show',compact('data'));

    }

    public function create(){

        return view('admin.pengguna.create');

    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'no_induk_pegawai' => ['required','integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string'],
            'password' => ['required','min:6','max:225'],
            'level' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'no_induk_pegawai' => $request->no_induk_pegawai,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect::route('pengguna.create')->with('success','berhasil');



    }

    public function edit($slug){
        $data = User::findBySlug($slug);
        return view('admin.pengguna.edit', compact('data'));

    }

    public function update(Request $request, $slug)
    {
        $data = Absensi::where('slug',$slug)->first();
        $request->validate([
            'no_induk_pegawai' => ['required'],
            'status_kehadiran' => ['required'],
        ]);

        $data->update([
            'no_induk_pegawai' => $request->no_induk_pegawai,
            'status_kehadiran' => $request->status_kehadiran,
        ]);
        return Redirect::route('absensi.edit', $id)->with('success', 'success');
    }

    public function destroy($id){

        $data = User::find($id);
        $data->delete();
        return response()->json(['message' => 'Data berhasil di hapus',200]);

    }

}
