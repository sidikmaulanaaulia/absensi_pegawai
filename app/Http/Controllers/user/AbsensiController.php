<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function show()
{
    $user = Auth::user(); // Mengambil informasi pengguna yang telah login
    $dataPegawai = $user->no_induk_pegawai; // Mengambil nomor induk pegawai dari pengguna

    $data = Absensi::where('no_induk_pegawai', $dataPegawai)->get();

    return view('user.absensi', compact('data'));
}
}
