@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Penduduk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{route('user.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
                <a href="" class="btn btn-primary mb-3">Export Excel</a>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Responsive Hover Table</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
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
                                <a href="{{route('user.edit',['id' => $d->id])}}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                            </td>
                          </tr>
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
                                  <form action="{{route('user.delete',['id'=>$d->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                  </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                          </div>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection