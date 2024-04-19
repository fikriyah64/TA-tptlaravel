@extends('layout.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Penduduk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Tambah Penduduk</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Penduduk</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#logins-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Identitas</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#information-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Variabel</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <form id="myForm" action="{{ route('proses_klasifikasi')}}" method="POST" >
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="tel" name="nik" id="nik" placeholder="NIK" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror" pattern="\d{1,16}" title="NIK harus angka dan maksimal 16 digit" required>
                      @error('nik')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                      @error('nama')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jenis Kelamin</label>
                      <select class="form-control select2" name="jk" id="jk" style="width: 100%;" value="{{ old('jk') }}" class="form-control @error('jk') is-invalid @enderror">
                        <option selected="selected">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      @error('jk')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kecamatan</label>
                      <select class="form-control select2" name="kecamatan" id="kecamatan" style="width: 100%;" value="{{ old('kecamatan') }}" class="form-control @error('kecamatan') is-invalid @enderror">
                        <option selected="selected">--Pilih Kecamatan--</option>
                        <option value="Adiwerna">Adiwerna</option>
                        <option value="Balapulang">Balapung</option>
                        <option value="Bojong">Bojong</option>
                        <option value="Bumijawa">Bumijawa</option>
                        <option value="Dukuhturi">Dukuhturi</option>
                        <option value="Dukuhwaru">Dukuhwaru</option>
                        <option value="Jatinegara">Jatinegara</option>
                        <option value="Kedungbanteng">Kedungbanteng</option>
                        <option value="Kramat">Kramat</option>
                        <option value="Lebaksiu">Lebaksiu</option>
                        <option value="Margasari">Margasari</option>
                        <option value="Pagerbarang">Pagerbarang</option>
                        <option value="Pangkah">Pangkah</option>
                        <option value="Slawi">Slawi</option>
                        <option value="Suradadi">Suradadi</option>
                        <option value="Talang">Talang</option>
                        <option value="Tarub">Tarub</option>
                        <option value="Warureja">Warureja</option>
                      </select>
                      @error('kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <button id="nextBtn" class="btn btn-primary" onclick="event.preventDefault(); ">Next</button>
                  </div>
                  <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputPassword1">TPT 01 (Mereka yang tak punya pekerjaan dan mencari pekerjaan)</label>
                      <select class="form-control select2" name="tpt01" id="tpt01" autocomplete="off" style="width: 100%;" value="{{ old('tpt01') }}" class="form-control @error('tpt01') is-invalid @enderror">
                        <option selected="selected">--Pilih--</option>
                        <option value="1">Ya (1)</option>
                        <option value="0">Tidak (0)</option>
                      </select>
                      @error('tpt01')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">TPT 02 (Meraka yang tak punya pekerjaan dan mempersiapkan usaha)</label>
                      <select class="form-control select2" name="tpt02" id="tpt02" autocomplete="off" style="width: 100%;" value="{{ old('tpt02') }}" class="form-control @error('tpt02') is-invalid @enderror">
                        <option selected="selected">--Pilih--</option>
                        <option value="1">Ya (1)</option>
                        <option value="0">Tidak (0)</option>
                      </select>
                      @error('tpt02')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">TPT 03 (Mereka yang tak punya pekerjaan, karena merasa tidak mungkin mendapatkan pekerjaan.)</label>
                      <select class="form-control select2" name="tpt03" id="tpt03" autocomplete="off" style="width: 100%;" value="{{ old('tpt03') }}" class="form-control @error('tpt03') is-invalid @enderror">
                        <option selected="selected">--Pilih--</option>
                        <option value="1">Ya (1)</option>
                        <option value="0">Tidak (0)</option>
                      </select>
                      @error('tpt03')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">TPT 04 (Mereka yang sudah punya pekerjaan, tetapi belum mulai bekerja)</label>
                      <select class="form-control select2" name="tpt04" id="tpt04" autocomplete="off" style="width: 100%;" value="{{ old('tpt04') }}" class="form-control @error('tpt04') is-invalid @enderror">
                        <option selected="selected">--Pilih--</option>
                        <option value="1">Ya (1)</option>
                        <option value="0">Tidak (0)</option>
                      </select>
                      @error('tpt04')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <button id="prevBtn" class="btn btn-primary" onclick=" event.preventDefault(); stepper.previous()">Previous</button>
                    <button type="submit" class="btn btn-primary" id="kirimform">Submit</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      var stepper = new Stepper(document.querySelector('.bs-stepper'));

      document.getElementById('nextBtn').addEventListener('click', function () {
          // Validasi input sebelum melanjutkan ke langkah berikutnya
          if (validateForm()) {
              stepper.next();
          }
      });

      document.getElementById('prevBtn').addEventListener('click', function () {
          stepper.previous();
      });

      function validateForm() {
          var nik = document.getElementById('nik').value;
          var nama = document.getElementById('nama').value;
          var jk = document.getElementById('jk').value;
          var kecamatan = document.getElementById('kecamatan').value;

          // Periksa apakah input kosong
          if (nik.trim() === '' || nama.trim() === '' || jk.trim() === '' || kecamatan.trim() === '') {
              alert('Harap isi semua kolom sebelum melanjutkan.');
              return false;
          }

          // Periksa apakah NIK memiliki tepat 16 digit
          if (nik.length !== 16 || !/^\d{16}$/.test(nik)) {
              alert('NIK harus terdiri dari 16 digit angka.');
              return false;
          }

          return true;
      }
  });
</script>

@endsection