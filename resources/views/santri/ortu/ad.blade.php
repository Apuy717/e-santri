@extends('layout.user')

@section('title')
Santri | Add Profile Orang Tua
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
      <h3>Isi Data Orang Tua Anda</h3><br>
      <form action="/user/ad_ortu/store" method="post" class="contactForm" enctype="multipart/form-data" style=" width: 90%;">
        {{ csrf_field() }}

        <div class="col-xl-10">
          <!-- <div class="form-group">
            <div id="upload-img" class="rounded-circle bg-secondary justify-content-center">
              <div class="form-group p-2 pt-5">
                <label class="btn btn-light btn-sm mt-4 btn-block" for="input_gambar">Upload Foto</label>
                <input type="file" class="form-control" name="gambar" id="input_gambar" placeholder="gambar" data-rule="gambar" data-msg="Please enter a valid gambar" />
              </div>
            </div> -->

          <div class="form-group mt-3">
            <h4>Upload Foto Keluarga / Ayah / Ibu / Wali</h4>
            <input id="input-b1" name="gambar" type="file" class="file" data-show-upload="false" data-show-remove="true" data-show-cancel="false" data-browse-on-zone-click="true">
            <div class="form-group">
              <input type="hidden" name="users_NIM" class="form-control" id="users_NIM" placeholder="user_NIM" required="on" value="{{Sentinel::getUser()->NIM}}">
            </div>
            <div class="form-row text-left">

              <div class="form-group col-lg-6 mt-2">
                <label for="nama_ayah">Nama Ayah : </label>
                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required="on" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="nama_ibu">Nama Ibu :</label>
                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="nama_ibu" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="tgl_lahir">Tanggal Lahir Ayah:</label>
                <input type="text" autocomplete="of" class="form-control input-tanggal" name="tgl_lahir" id="tanggal" required="on" readonly />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="text">No HP :</label>
                <input type="number" name="no_hp" class="form-control" id="no_hp" required="on">
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="alamat">Alamat :</label>
                <input type="text" class="form-control" name="alamat" id="alamat" required="on" />
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
                  <option value="sudah">Sudah</option>
                  <option value="belum">Belum</option>
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
                <label for="pendidikan_akhir">Pendidikan :</label>
                <input type="text" class="form-control" name="pendidikan_akhir" id="pendidikan_akhir" placeholder="pendidikan_akhir" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="jurusan">Keahlian Khusus :</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="keahlian khusus" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="pekerjaan">Pekerjaan :</label>
                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" />
              </div>

              <div class="form-group col-lg-6 mt-2">
                <label for="penghasilan">Penghasilan Perbulan :</label>
                <input type="text" class="form-control" name="penghasilan" id="penghasilan" placeholder="penghasilan" />
              </div>

            </div>
          </div>
          <div class="text-center col-lg-2">
            <button class="btn btn-success btn-block" type="submit" name="submit" title="Send Message">Save All</button>
          </div>
        </div>
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