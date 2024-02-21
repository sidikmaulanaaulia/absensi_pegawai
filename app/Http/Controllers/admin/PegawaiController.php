<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Pengguna;
use App\Models\Absensi;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{

    public function show(){
        $data = Pegawai::with('jabatan')->get();
        return view('admin.pegawai.show',compact('data'));

    }

    public function detail($slug){
        $dataPegawai = Pegawai::where('slug',$slug)->first();
        $dataAbsensi = Absensi::where('no_induk_pegawai',$dataPegawai->no_induk_pegawai)->get();
        return view('admin.pegawai.detail',compact('dataAbsensi','dataPegawai'));

    }

    public function create(){

        $data = Jabatan::all();
        return view('admin.pegawai.create',compact('data'));

    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required'],
            'alamat' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required'],
            'no_hp' => ['required'],
        ]);

        $randomNumber = random_int(100000, 999999); // Menghasilkan nomor acak antara 100.000 dan 999.999
        $noIndukPegawai = strval($randomNumber); // Mengonversi nomor acak menjadi string


        $pegawai = Pegawai::create([
            'no_induk_pegawai' => $noIndukPegawai,
            'jabatan_id' => $request->jabatan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp
        ]);

        return Redirect::route('pegawai.create')->with('success', 'success');

    }

    public function edit($slug){
        $data = Pegawai::where('slug',$slug)->first();
        $jabatan = Jabatan::all();
        return view('admin.pegawai.edit', compact('data','jabatan'));

    }

    public function update(Request $request, $slug)
    {
        $data = Pegawai::where('slug',$slug)->first();
        $request->validate([
            'no_induk_pegawai' => ['required'],
            'jabatan' => ['required'],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required'],
            'no_hp' => ['required']
        ]);

        $slug_baru = Str::slug($request->nama); // pastikan Anda telah mengimpor namespace untuk Str
        $data->update(['slug' => $slug_baru]);
        $data->update($request->all());


        return Redirect::route('pegawai.edit', $slug)->with('success', 'success');
    }

    public function destroy($slug){

        $data = Pegawai::where('slug',$slug)->first();
        $data->delete();
        return Redirect::route('pegawai.show', $slug)->with('success', 'success');

    }

}
