@extends('admin.include.header')

@section('container')
    <h3 class="card-title text-center mt-3">EDIT PEGAWAI</h3>
    <form action="{{ route('pegawai.edit', $data->slug) }}" method="post">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('pegawai.show') }}">Kembali</a>
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
                        <label for="formGroupExampleInput2" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-sm " name="nama"
                            id="formGroupExampleInput2" value="{{ $data->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">alamat</label>
                        <input type="text" class="form-control form-control-sm" name="alamat"
                            id="formGroupExampleInput3" value="{{ $data->alamat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput5" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-sm " name="tanggal_lahir"
                            id="formGroupExampleInput5" value="{{ $data->tanggal_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput5" class="form-label">No Telepone</label>
                        <input type="number" class="form-control form-control-sm " name="no_hp"
                            id="formGroupExampleInput5" value="{{ $data->no_hp }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput5" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan">
                            <option >Pilih Jabatan</option>
                            @foreach ($jabatan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>

                            @endforeach
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
