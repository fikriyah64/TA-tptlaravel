@extends('layout.main')
@section('content')

<!--SIDEBAR LIHAT DATA USER-->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid"></div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          {{-- <a href="{{route('user.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
          <a href="" class="btn btn-primary mb-3">Export Excel</a> --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data User</h3>
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
            <!--TABEL DATA USER-->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data as $d)
                  <tr>
                    <td>{{$loop->iteration}}</td>/.;
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                    <td>
                      <a href="{{route('user.edit',['id' => $d->id])}}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                      <a data-toggle="modal" data-target="#modal-hapus{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                    </td>
                  </tr>

                  <!--BUTTON HAPUS-->
                  <div class="modal fade" id="modal-hapus{{$d->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!--BUTTON KONFIRMASI HAPUS -->
                        <div class="modal-body">
                          <p>Apakah Kamu Yakin Ingin Menghapus Data User? <b>{{$d->name}}</b></p>
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
                    </div>
                  </div>
                  <!-- TUTUP BUTTON HAPUS-->
                @endforeach
                </tbody>
              </table>
            </div>
            <!--TUTUP TABEL DATA USER-->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection