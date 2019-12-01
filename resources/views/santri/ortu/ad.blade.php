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
  <h3>Data Orang Tua Santri</h3><br>
  <form action="/user/ad_ortu/store" method="post"  class="contactForm" enctype="multipart/form-data" style=" width: 90%;" >
	{{ csrf_field() }}
  
    <div class="col-xl-10">
      <div class="form-group">
        <div id="upload-img" class="rounded-circle bg-secondary justify-content-center">
          <div class="form-group p-2 pt-5">
              <label class="btn btn-light btn-sm mt-4 btn-block" for="input_gambar">Upload Foto</label>
              <input type="file" class="form-control" name="gambar" id="input_gambar" placeholder="gambar" data-rule="gambar" data-msg="Please enter a valid gambar"/>
          </div>
        </div>
    
    <div class="form-group mt-3">
    <h4>Isi Informasi Orang Tua Santri</h4>
      <div class="form-group">
        <input type="hidden" name="users_NIM" class="form-control" id="users_NIM" placeholder="user_NIM" required="on" value="{{Sentinel::getUser()->NIM}}">
      </div>
    <div class="form-row text-left">

      <div class="form-group col-lg-6 mt-2">
        <label for="nama_ayah">Nama Ayah : </label>
        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required="on"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="nama_ibu">Nama Ibu :</label>
        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="nama_ibu" />
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="tgl_lahir">Tanggal Lahir Ayah:</label>
        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" required="on"/>
      </div>
      
      <div class="form-group col-lg-6 mt-2">
        <label for="no_hp">No HP :</label>
        <input type="number" name="no_hp" class="form-control" id="no_hp" required="on">
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="alamat">Alamat :</label>
        <input type="text" class="form-control" name="alamat" id="alamat" required="on"/>
      </div>
      
      <div class="form-group col-lg-6 mt-2">
        <label for="agama">Agama :</label>
        <input type="text" class="form-control" name="agama" id="agama" required="on"/>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="pengamal">Pengamal :</label>
        <select class="custom-select" id="pengamal" name="pengamal">
          <option value="sudah">Sudah</option>
          <option value="belum">Belum</option>
        </select>
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="negara">Negara :</label>
        <input type="text" class="form-control" name="negara" id="negara" placeholder="negara" />
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="pendidikan_akhir">Pendidikan :</label>
        <input type="text" class="form-control" name="pendidikan_akhir" id="pendidikan_akhir" placeholder="pendidikan_akhir" />
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="jurusan">Jurusan :</label>
        <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="jurusan" />
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="pekerjaan">Pekerjaan :</label>
        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" />
      </div>

      <div class="form-group col-lg-6 mt-2">
        <label for="penghasilan">Penghasilan :</label>
        <input type="text" class="form-control" name="penghasilan" id="penghasilan" placeholder="penghasilan"/>
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

<script type="text/javascript">
    $(document).ready(function(){
   $('.input-tanggal').datepicker({
            dateFormat:'yy-mm-dd',
        });

  });
</script>
@endsection
