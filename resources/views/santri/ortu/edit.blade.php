@extends('layout.user')

@section('title')
  Admin-BackEnd Detile
@endsection

@section('conten')<br><br>

    <div class="container"> 
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
          {{ $error }} <br/>
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
  <form action="/user/edit/ortu/{{$ortu->id}}" method="post"  class="contactForm" enctype="multipart/form-data" style=" width: 90%;" >
	{{ csrf_field() }}
  {{ method_field('PUT') }}
    
  <div class="col-xl-10">
    <div class="form-group">

      <div id="upload-img" class="rounded-circle bg-secondary justify-content-center">
          <div class="form-group p-2 pt-5">
              <label class="btn btn-light btn-sm btn-block mt-4" for="input_gambar">Upload Foto</label>
              <input type="file" class="form-control " name="gambar" id="input_gambar" placeholder="gambar" data-rule="gambar" data-msg="Please enter a valid gambar"/>
          </div>
        </div>

        <input type="hidden" name="users_NIM" class="form-control" id="users_NIM" placeholder="user_NIM" required="on" value="{{Sentinel::getUser()->NIM}}">

    <div class="form-row mt-5 text-left">
      <div class="form-group col-lg-12 text-center">
        <h4>Ubah Informasi</h4>
      </div>
      <div class="form-group col-lg-6 mt-2">
        <label for="nama_ayah">Nama Ayah :</label>
        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="{{$ortu->nama_ayah}}" />
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="nama_ibu">Nama Ibu :</label>
        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="{{$ortu->nama_ibu}}"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="tgl_lahir">Tanggal Lahir :</label>
        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{$ortu->tgl_lahir}}"/>
      </div>
      
      <div class="form-group col-lg-6 mt-2">
        <label for="no_hp">Nomer HP :</label>
        <input type="number" name="no_hp" class="form-control" id="no_hp" value="{{$ortu->no_hp}}">
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="alamat">Alamat :</label>
        <input type="text" class="form-control" name="alamat" id="alamat" value="{{$ortu->alamat}}"/>
      </div>
      
      <div class="form-group col-lg-6 mt-2">
        <label for="agama">Agama :</label>
        <input type="text" class="form-control" name="agama" id="agama" value="{{$ortu->agama}}" />
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="pengamal">Pengamal :</label>
        <input type="text" class="form-control" name="pengamal" id="pengamal" value="{{$ortu->pengamal}}"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="negara">Negara :</label>
        <input type="text" class="form-control" name="negara" id="negara" value="{{$ortu->negara}}"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="pendidikan_akhir">Pendidikan :</label>
        <input type="text" class="form-control" name="pendidikan_akhir" id="pendidikan_akhir" value="{{$ortu->pendidikan_akhir}}"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="jurusan">Keahlian :</label>
        <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{$ortu->jurusan}}"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="pekerjaan">Pekerjaan :</label>
        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{$ortu->pekerjaan}}"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="penghasilan">Penghasilan :</label>
        <input type="text" class="form-control" name="penghasilan" id="penghasilan" value="{{$ortu->penghasilan}}"/>
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
