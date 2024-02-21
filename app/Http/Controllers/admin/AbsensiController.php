<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;

class AbsensiController extends Controller
{

    public function show(){
        $data = Absensi::all();
        return view('admin.absensi.show',compact('data'));

    }

    public function create(){
        return view('admin.absensi.create');

    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'no_induk_pegawai' => ['required'],
            'status_kehadiran' => ['required'],
        ]);

        $waktu_sekarang = Carbon::now();
        $mulai_absensi = Carbon::createFromTime(07, 0, 0); // Waktu mulai absensi pukul 07:00:00
        $berakhir_absensi = Carbon::createFromTime(18, 0, 0); // Waktu berakhir absensi pukul 08:00:00

        if ($waktu_sekarang->between($mulai_absensi, $berakhir_absensi)) {
            $tanggal = $waktu_sekarang->toDateString();
            $waktu = $waktu_sekarang->toTimeString();

            $absensi = Absensi::create([
                'no_induk_pegawai' => $request->no_induk_pegawai,
                'tanggal' => $tanggal,
                'waktu_masuk' => $waktu,
                'status_kehadiran' => $request->status_kehadiran
            ]);

            return Redirect::route('absensi.create')->with('success', 'Absensi berhasil disimpan');
        } else {
            return Redirect::route('absensi.create')->with('error', 'Waktu absensi sudah habis');
        }
    }


    public function edit($id){
        $data = Absensi::find($id);
        return view('admin.absensi.edit', compact('data'));

    }

    public function keluar(){
        return view('admin.absensi.exit');
    }

    public function exit(Request $request){

        $data = Absensi::where('no_induk_pegawai',$request->no_induk_pegawai)->first();

        $request->validate([
            'no_induk_pegawai' => ['required']
        ]);

        $waktu_sekarang = Carbon::now();
        $mulai_absensi = Carbon::createFromTime(14, 0, 0); // Waktu mulai absensi pukul 07:00:00
        $berakhir_absensi = Carbon::createFromTime(18, 0, 0); // Waktu berakhir absensi pukul 08:00:00
        if ($waktu_sekarang->between($mulai_absensi, $berakhir_absensi)){
        $waktu = Carbon::now()->toTimeString();

        $data->update([
            'waktu_keluar' => $waktu
        ]);

        return Redirect::route('absensi.exit')->with('success','success');
    }else{
        return Redirect::route('absensi.exit')->with('error','Waktu Sudah Habis');

    }



    }

    public function update(Request $request, $id)
    {
        $data = Absensi::find($id);
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

        $data = Absensi::find($id);
        $data->delete();
        return Redirect::route('absensi.show', $id)->with('success', 'success');

    }

}
