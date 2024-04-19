@extends('layout.main')
@section('title', 'Data Penduduk')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@yield('title')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="text-right">
                <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-excell"><i class="fas fa-file-import"></i> Import</a>
                <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-excell"><i class="fas fa-download"></i> Unduh</a>
              </div>
          </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kecamatan</th>
                    <th>TPT 01</th>
                    <th>TPT 02</th>
                    <th>TPT 03</th>
                    <th>TPT 04</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nik}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->jenis_kelamin}}</td>
                    <td>{{$d->kecamatan}}</td>
                    <td>{{$d->tpt01}}</td>
                    <td>{{$d->tpt02}}</td>
                    <td>{{$d->tpt03}}</td>
                    <td>{{$d->tpt04}}</td>
                    <td>{{$d->status}}</td>
                    <td>
                      <a data-toggle="modal" data-target="#modal-hapus{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                    </td>
                  </tr>

                  <div class="modal fade" id="modal-excell">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Upload File Excell</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <form action="/import/excel" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="excel_file" accept=".xls, .xlsx">
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="modal fade" id="modal-hapus{{$d->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Kamu Yakin Ingin Menghapus Data Penduduk? <b>{{$d->name}}</b></p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <form action="/delete_klasifikasi/{{$d->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                  @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection