@extends('user.include.header')
@section('container')
    <div class="container-fluid">
        <div class="card mt-3">
            <!-- Nav tabs -->
            <h3 class="text-center">Data Absensi {{ Auth()->user()->name }}</h3>
            <div class="nav nav-tabs dropdown-menu" id="nav-tab" role="tablist">

            </div>
            <!-- Tab panes -->
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="table-responsive">
                  <table

                  id="zero_config"
                  class="table table-striped table-bordered"
                  >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Induk Pegawai </th>
                      <th>Tanggal Absensi</th>
                      <th>Waktu Masuk</th>
                      <th>Waktu Keluar</th>
                      <th>Status Kehadiran</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_induk_pegawai }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->waktu_masuk }}</td>
                        <td>{{ $item->waktu_keluar }}</td>
                        <td>{{ $item->status_kehadiran }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
        </div>

@endsection
