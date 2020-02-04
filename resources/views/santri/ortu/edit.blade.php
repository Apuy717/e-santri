@extends('layout.user')

@section('title')
Santri | Update Profile Orang Tua
@endsection

@section('header')
<link href="{{url('admin/jquery_ui/jquery-ui.css')}}" rel="stylesheet">
@endsection

@section('conten')<br><br>

<div class="container">
  @if(count($errors) > 0)
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br />
    @endforeach
  </div>
  @endif

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  <center>

    <div class="form">
      <h4>Ubah Data Orang Tua</h4><br>
      <form action="/user/edit/ortu/{{$ortu->id}}" method="post" class="contactForm" enctype="multipart/form-data" style=" width: 90%;">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="col-xl-10">
          <div class="form-group">
            <h5>Ubah Foto Keluarga / Ayah / Ibu / Wali</h5>
            <input id="input-b1" name="gambar" type="file" class="file" data-show-upload="false" data-show-remove="true" data-show-cancel="false" data-browse-on-zone-click="true" value="{{$ortu->gambar}}">

            <input type="hidden" name="users_NIM" class="form-control" id="users_NIM" placeholder="user_NIM" required="on" value="{{Sentinel::getUser()->NIM}}">

            <div class="form-row mt-5 text-left">
              <div class="form-group col-lg-6 mt-2">
                <label for="nama_ayah">Nama Ayah :</label>
                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="{{$ortu->nama_ayah}}" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="nama_ibu">Nama Ibu :</label>
                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="{{$ortu->nama_ibu}}" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="tgl_lahir">Tanggal Lahir :</label>
                <input type="datepicker" autocomplete="of" class="form-control input-tanggal" name="tgl_lahir" id="tgl_lahir" value="{{$ortu->tgl_lahir}}" readonly />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="no_hp">Nomer HP :</label>
                <input type="number" name="no_hp" class="form-control" id="no_hp" value="{{$ortu->no_hp}}">
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="alamat">Alamat :</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{$ortu->alamat}}" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="agama">Agama :</label>
                <select name="agama" id="agama" class="form-control">
                  <option value="islam">islam</option>
                  <option value="budha">budha</option>
                  <option value="hindu">hindu</option>
                  <option value="kong hu'cu">kong hu cu</option>
                  <option value="kristen">kristen</option>
                  <option value="katolik">katolik</option>
                  <option value="lain-lain">Lain-lain</option>
                </select>
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="pengamal">Pengamal :</label>
                <select class="custom-select" id="pengamal" name="pengamal">
                  <option value="{{$ortu->pengamal}}">{{$ortu->pengamal}}</option>
                  <option value="Ya">Sudah</option>
                  <option value="Tidak">Belum</option>
                </select>
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="negara">Kewarganegaraan :</label>
                <select id="negara" name="negara" class="custom-select">
                  <option value="indonesia">Indonesia</option>
                  <option value="luar-negri">Luar Negri</option>
                </select>
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="pendidikan_akhir">Pendidikan Akhir :</label>
                <input type="text" class="form-control" name="pendidikan_akhir" id="pendidikan_akhir" value="{{$ortu->pendidikan_akhir}}" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="jurusan">Keahlian :</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{$ortu->jurusan}}" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="pekerjaan">Pekerjaan :</label>
                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{$ortu->pekerjaan}}" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="penghasilan">Penghasilan :</label>
                <input type="text" class="form-control" name="penghasilan" id="penghasilan" value="{{$ortu->penghasilan}}" />
              </div>

            </div>
          </div>
        </div>
        <div class="text-center col-lg-2">
          <button class="btn btn-success btn-block" type="submit" name="submit" title="Send Message">Save All</button>
        </div>
      </form>
    </div>
</div>
</center><br>
@endsection
@section('footer')
<script src="{{url('admin/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{url('admin/jquery_ui/jquery-ui.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/LANG.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.input-tanggal').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true,
      yearRange: "1960:2020"
    });

  });
</script>
@endsection