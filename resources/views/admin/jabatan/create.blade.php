@extends('admin.include.header')

@section('container')
    <h3 class="card-title text-center mt-3">TAMBAH PEGAWAI</h3>
    <form action="{{ route('jabatan.store') }}" method="post">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('jabatan.show') }}">Kembali</a>
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
                        <label for="formGroupExampleInput2" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-sm " name="nama"
                            id="formGroupExampleInput2" placeholder="nama" required>
                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
