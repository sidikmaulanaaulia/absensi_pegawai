@extends('admin.include.header')

@section('container')
    <h3 class="card-title text-center mt-3">EDIT PENGGUNA</h3>
    <form action="{{ route('pegawai.edit', $data->slug) }}" method="post">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('pengguna.show') }}">Kembali</a>
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
                        <label for="formGroupExampleInput2" class="form-label">No Induk Pegawai</label>
                        <input type="text" class="form-control form-control-sm " name="no_induk_pegawai"
                            id="formGroupExampleInput2" value="{{ $data->no_induk_pegawai }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-sm " name="name"
                            id="formGroupExampleInput2" value="{{ $data->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">email</label>
                        <input type="text" class="form-control form-control-sm" name="email"
                            id="formGroupExampleInput3" value="{{ $data->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput5" class="form-label">level</label>
                       <Select name="level">
                        <option value="{{ $data->level }}">{{ $data->level }}</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                       </Select>
                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
