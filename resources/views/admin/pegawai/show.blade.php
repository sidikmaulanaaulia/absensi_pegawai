@extends('admin.include.header')
@section('container')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <h3 class="card-title text-center">Data Pegawai</h3>
        <a class="btn btn-primary" href="{{ route('pegawai.create') }}"><span class="material-icons">
            playlist_add
          </span></a>
        @if (session('success'))
            <div class="alert alert-success w-25 mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Basic Datatable</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Induk Pegawai</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Telepone</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_induk_pegawai }}</td>
                                            <td><a href="/pegawai-detail/{{ $item->slug }}">{{ $item->nama }}</a></td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->jabatan->nama }}</td>
                                            <td>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/pegawai-delete/{{ $item->slug }}">                                            <span class="material-icons">
                                                        <span class="material-icons">
                                                            delete
                                                          </span></a>
                                                <a class="btn btn-success btn-sm text-white mt-3"
                                                    href="/pegawai-edit/{{ $item->slug }}">                                            <span class="material-icons">
                                                        <span class="material-icons">
                                                            update
                                                          </span></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    </div>
@endsection
