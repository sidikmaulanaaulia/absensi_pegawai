@extends('admin.include.header')

@section('container')
    <h3 class="card-title text-center mt-3">TAMBAH PEGAWAI</h3>
    <form action="{{ route('absensi.exit') }}" method="post">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('absensi.show') }}">Kembali</a>
            @if (session('success'))
                <div class="alert alert-success w-25 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger w-25 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row p-4 border rounded-5">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">No Induk Pegawai</label>
                        <input type="text" class="form-control form-control-sm " name="no_induk_pegawai"
                            id="formGroupExampleInput2" placeholder="No Induk Pegawai" required>
                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
