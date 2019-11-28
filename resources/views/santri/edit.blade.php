@extends('layout.user')

@section('title')
  Santri Update Profile   
@endsection
@section('conten')<br><br>
<center>
  <div class="container"> 
    @if(count($errors) > 0)
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          {{ $error }} <br/>
        @endforeach
    </div>
    @endif
 <div class="form">
  <h4>Ubah Data Profil Santri</h4><br>
  <form action="/user/update/{{$santri->id}}" method="post"  class="contactForm" enctype="multipart/form-data" style=" width: 90%;" >
  {{ csrf_field() }}
  {{ method_field('PUT') }}


  <div class="col-xl-10">  
    <div class="form-group text-left">

      <div id="upload-img" class="rounded-circle bg-secondary justify-content-center">
          <div class="form-group p-2 pt-5">
              <label class="btn btn-light btn-sm btn-block mt-4" for="input_gambar">Upload Foto</label>
              <input type="file" class="form-control " name="gambar" id="input_gambar" placeholder="gambar" value="{{$santri->gambar}}"/>
          </div>
        </div>

      <h4 class="mt-5">Ubah Informasi</h4>
      <div class="form-group">
        <input type="hidden" name="user_NIM" class="form-control" id="user_NIM" placeholder="user_NIM" required="on" value="{{Sentinel::getUser()->NIM}}">
      </div>
      
      <div class="form-group">
        <label for="no_hp">No HP :</label>
        <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="no_hp" required="on" value="{{$santri->no_hp}}">
      </div>
    <div class="form-row">
      <div class="form-group col-lg-6">
        <label for="tempat_lahir">Tempat Lahir :</label>
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="tempat_lahir" value="{{$santri->tempat_lahir}}" />
      </div>

      <div class="form-group col-lg-6">
        <label for="tgl_lahir">Tempat Lahir :</label>
        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="tgl_lahir" value="{{$santri->tgl_lahir}}" />
      </div>

      <div class="form-group col-lg-6">
        <label for="alamat">Alamat :</label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="{{$santri->alamat}}" />
      </div>

      <div class="form-group col-lg-6">
        <label for="anake_ke">Anak Ke :</label>
        <input type="text" name="anake_ke" class="form-control" id="anake_ke" placeholder="anake_ke" value="{{$santri->anake_ke}}">
      </div>
            
      <div class="form-group col-lg-6">
        <label for="awal_mondok">Awal Mondok :</label>
        <input type="text" name="awal_mondok" class="form-control" id="awal_mondok" placeholder="awal_mondok" value="{{$santri->awal_mondok}}">
      </div> 

      <div class="form-group col-lg-6">
        <label for="sosial_media">Sosial Media :</label>
        <input type="text" name="sosial_media" class="form-control" id="sosial_media" placeholder="sosial_media" value="{{$santri->sosial_media}}">
      </div>      

      <div class="form-group col-lg-6">
        <label for="asal_sekolah">Asal Sekolah :</label>
        <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="asal_sekolah" value="{{$santri->asal_sekolah}}"/>
      </div>

      <div class="form-group col-lg-6">
        <label for="jk">Jenis Kelamin :</label>
        <select class="custom-select" name="jk" id="jk">
        <option selected value="{{$santri->jk}}">Jenis Kelamin</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
      </div>
      

      <div class="form-group col-lg-6">
        <label for="status">Status :</label>
        <select class="custom-select" name="status" id="status">
        <option selected value="1">aktif</option>
        <option value="0">non aktif</option>
      </select>
      </div>

      <div class="form-group col-lg-6">
        <label for="kamar_id">Kamar :</label>
        <select class="custom-select" name="kamar_id" id="kamar_id">
        <option selected value="1">Kamar</option>
        <option value="1">barat</option>
      </select>
      </div>

      <div class="form-group col-lg-3">
      <label for="smester_id">Semester :</label>
      <select class="custom-select" name="smester_id" id="smester_id">
        <option selected value="1">Smester/Kelas</option>
        <option value=""></option>
      </select>
      </div>

      <div class="form-group col-lg-3">
      <label for="prodi_id">Prodi :</label>
      <select class="custom-select" name="prodi_id" id="prodi_id">
        <option selected value="1">Prodi/Jurusan</option>
        <option value=""></option>
        </select>
      </div>

    <div class="form-group col-lg-3">
      <label for="madrasah_id">Madrasah :</label>
      <select class="custom-select" name="madrasah_id" id="madrasah_id">
        <option selected value="1">Idad/Mi/Mts</option>
        <option value="1">Idad</option>
        <option value="2">Mi</option>
        <option value="3">Mts</option>
        </select>
      </div>

    <div class="form-group col-lg-3">
      <label for="kls_id">Kelas :</label>
      <select class="custom-select" name="kls_id" id="kls_id">
        <option selected value="1">Kls Madrasah :</option>
        <option value="1">Satu</option>
        <option value="2">Dua</option>
        <option value="3">Tiga</option>
        <option value="4">Empat</option>
        <option value="5">Lima</option>
        <option value="6">Enam</option>
        </select>
      </div>


      </div>
    </div>
  </div>                
   <div class="text-center col-lg-2">
        <button class="btn btn-success btn-block" type="submit" name="submit" title="Send Message">Save All</button>
    </div>
  </form>
</div>
</center><br>
@endsection
