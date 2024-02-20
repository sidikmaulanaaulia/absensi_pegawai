@extends('admin.include.header')

@section('container')
    <h3 class="card-title text-center mt-3">TAMBAH USER</h3>
    <form method="POST" action="{{ route('pengguna.store') }}">
        @csrf

        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('absensi.show') }}">Kembali</a>
            @if (session('success'))
                <div class="alert alert-success w-25 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-success w-25 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row p-4 border rounded-5">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput1" class="form-label">No induk pegawai</label>
                        <input type="text" class="form-control form-control-sm " name="no_induk_pegawai"
                            id="formGroupExampleInput1" placeholder="no induk pegawai" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-sm " name="name"
                            id="formGroupExampleInput2" placeholder="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm " name="email"
                            id="formGroupExampleInput3" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput4" class="form-label">Passowrd</label>
                        <input type="password" class="form-control form-control-sm " name="password"
                            id="formGroupExampleInput4" placeholder="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="level user"></label>
                        <select name="level" id="">
                            <option>Pilih Level</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>

                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
