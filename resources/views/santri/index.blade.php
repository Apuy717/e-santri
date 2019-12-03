@extends('layout.user')

@section('title')
  E-Sanrti-profile
@endsection

@section('conten')
	<div class="container pl-4">
              @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif <br>
    
  <div class="text-center mb-4">
    @foreach($santri as $s)
    <img id="upload-img" src="{{ url('/santri/img/'.$s->gambar )}}" class="rounded-circle" alt="...">
  </div>
  <h4 class=" mt-5 ml-2">Informasi Pribadi :</h4>

<div class="row text-left">
  
<div class="col-md-4" id="content-40">
  <div class="card-body mb-5">
    <div class="mb-2">NIM</div>
    <div class="mb-2">Nama Lengkap</div>
    <div class="mb-2">Jenis Kelamin</div>
    <div class="mb-2">Alamat</div>
    <div class="mb-2">Tempat-Lahir</div>
    <div class="mb-2">Tgl-Lahir</div>
    <div class="mb-2">Anak Ke</div>
    <div class="mb-2">No-hp</div>
    <div class="mb-2">Asal Sekolah</div>
    <div class="mb-2">Awal Mondok</div>
    <div class="mb-2">Kelas </div>
    <div class="mb-2">Madrasah</div>
    <div class="mb-2">Status</div>
  </div>
</div>


<div class="col-md-5" id="content-40">
  <div class="card-body mb-5">
    <div class="mb-2">: {{Sentinel::getUser()->NIM}}</div>
    <div class="mb-2">: {{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}</div>
    <div class="mb-2">: {{$s->jk}}</div>
    <div class="mb-2">: {{$s->alamat}}</div>
    <div class="mb-2">: {{$s->tempat_lahir}}</div>
    <div class="mb-2">: {{$s->tgl_lahir}}</div>
    <div class="mb-2">: {{$s->anake_ke}}</div>
    <div class="mb-2">: {{$s->no_hp}}</div>
    <div class="mb-2">: {{$s->asal_sekolah}}</div>
    <div class="mb-2">: {{$s->awal_mondok}}</div>
    <div class="mb-2">: {{$s->kls_id}}</div>
    @if($s->madrasah_id ==1)
      <div class="mb-2">: Idad</div>
    @elseif($s->madrasah_id ==2)
      <div class="mb-2">: Mi</div>
    @elseif($s->madrasah_id ==3)
      <div class="mb-2">: Mts</div>
    @endif
    @if($s->status < 1)
      <div class="mb-2">: Alumni</div>
    @else
      <div class="mb-2">: Aktif</div>
    @endif
    
  </div>

</div>
<div class="col-lg-3" id="content-20">
  <div class="card-body">
    <i class="fab fa-facebook-square"></i>
     <span>{{$s->sosial_media}}</span>
     @endforeach
     
</div>  
</div>
</div>
<div class="text-right mr-5">
    @foreach($santri as $s)
      <a href="/user/update/{{$s->id}}" class="btn btn-info p-2">Ubah Data Profile</a>
    @endforeach
</div>
<hr class="sidebar-divider">
@foreach($ortu as $o)
  <h4>Informasi Wali :</h4>
<div class="row text-left">

  <div class="col-lg-4 col-sm-4" id="content-40">
    <div class="card-body">
      <div class="mb-2">Nama Ayah</div>
      <div class="mb-2">Nama ibu</div>
      <div class="mb-2">Tgl-lahir ayah</div>
      <div class="mb-2">No-Hp</div>
      <div class="mb-2">Alamat</div>
      <div class="mb-2">Kewarganegaraan</div>
      <div class="mb-2">Agama</div>
      <div class="mb-2">Sudah Pengamal</div>
      <div class="mb-2">Pendidikan Akhir</div>
      <div class="mb-2">Jurusan/Keahlian</div>
      <div class="mb-2">Pekerjaan</div>
      <div class="mb-2">Penghasilan</div>
    </div>
  </div>

  <div class="col-lg-5 col-sm-5" id="content-40">
    <div class="card-body">
      <div class="mb-2">: {{$o->nama_ayah}}</div>
      <div class="mb-2">: {{$o->nama_ibu}}</div>
      <div class="mb-2">: {{$o->tgl_lahir}}</div>
      <div class="mb-2">: {{$o->no_hp}}</div>
      <div class="mb-2">: {{$o->alamat}}</div>
      <div class="mb-2">: {{$o->negara}}</div>
      <div class="mb-2">: {{$o->agama}}</div>
      <div class="mb-2">: {{$o->pengamal}}</div>
      <div class="mb-2">: {{$o->pendidikan_akhir}}</div>
      <div class="mb-2">: {{$o->jurusan}}</div>
      <div class="mb-2">: {{$o->pekerjaan}}</div>
      <div class="mb-2">: {{$o->penghasilan}}</div>
    @endforeach
    </div>
  </div>
  
</div>
  <div class="text-right mr-5 mb-5">
    @foreach($ortu as $or)
      <a href="/user/edit/ortu/c/{{$or->id}}" class="btn btn-info p-2">Ubah Data Orang Tua</a>
    @endforeach
  </div>
</div>
@endsection