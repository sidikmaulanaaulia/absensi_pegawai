@extends('admin.include.header')
@section('container')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <h3 class="card-title text-center">Data Absensi</h3>
        <a class="btn btn-primary" href="{{ route('absensi.create') }}">Absensi Masuk</a>
        <a class="btn btn-success text-white" href="{{ route('absensi.exit') }}">Absensi Keluar</a>
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
                                        <th>Tanggal</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>
                                        <th>Status Kehadiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_induk_pegawai }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            @if ($item->status_kehadiran == 'HADIR')
                                            <td>{{ $item->waktu_masuk }}</td>
                                            <td>{{ $item->waktu_keluar }}</td>
                                            @else
                                            <td></td>
                                            <td></td>
                                            @endif
                                            <td>{{ $item->status_kehadiran }}</td>
                                            <td>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/absensi-delete/{{ $item->id }}">                                            <span class="material-icons">
                                                        <span class="material-icons">
                                                            delete
                                                          </span></a>
                                                <a class="btn btn-success btn-sm text-white mt-3"
                                                    href="/absensi-edit/{{ $item->id }}">                                            <span class="material-icons">
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
