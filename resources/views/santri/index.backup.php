@extends('layout.user')

@section('title')
  Admin-BackEnd Detile
@endsection

@section('conten')
	<div class="container">
              @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif <br>
  

<div class="row">
 <div class="col-lg-6">
    <div class="col-md-8 mx-auto mb-3 mt-3">
      <a href="/user/add_profile" class="btn btn-success btn-sm">Tambah Data Profile</a>
    @foreach($santri as $s)
      <a href="/user/update/{{$s->id}}" class="btn btn-info btn-sm">Ubah Data Profile</a>
    </div><hr class="mb-2">
    @endforeach
              <!-- Default Card Example -->
              <div class="card shadow mb-4 border-top-primary">
                <!-- Card Header - Accordion -->
                <a href="#satu" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="satu">
                  <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="satu">
                  <div class="card-body border-bottom-primary">
                    <div class="text-center">
                      @foreach($santri as $s)
                       <img width="400px;" src="{{ url('/santri/img/'.$s->gambar )}}" class="rounded" alt="...">
                    </div><br><br>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">List</th>
                        <th scope="col">Filed</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="col">NIM</th>
                        <td>{{Sentinel::getUser()->NIM}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Nama Lengkap</th>
                        <td>{{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}</td>
                      </tr>
                      <tr>
                        <th scope="col">JK</th>
                        <td>{{$s->jk}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Alamat</th>
                        <td>{{$s->alamat}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Tempat-Lahir</th>
                        <td>{{$s->tempat_lahir}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Tgl-Lahir</th>
                        <td>{{$s->tgl_lahir}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Anak Ke</th>
                        <td>{{$s->anake_ke}}</td>
                      </tr>
                      <tr>
                        <th scope="col">No-hp</th>
                        <td>{{$s->no_hp}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Sosial Media</th>
                        <td>{{$s->sosial_media}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Asal Sekolah</th>
                        <td>{{$s->asal_sekolah}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Awal Mondok</th>
                        <td>{{$s->awal_mondok}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Kelas </th>
                        <td>{{$s->kls_id}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Madrasah</th>
                        @if($s->madrasah_id ==1)
                        <td>Idad</td>
                        @elseif($s->madrasah_id ==2)
                          <td>Mi</td>
                        @elseif($s->madrasah_id ==3)
                        <td>Mts</td>
                        @endif
                      </tr>
                      <tr>
                        <th scope="col">Status</th>
                        @if($s->status < 1)
                            <td>Alumni</td>
                        @else
                            <td>Aktif</td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>

 <div class="col-lg-6">
  <div class="col-md-9 mx-auto mb-3 mt-3">
     <a href="/user/ad_ortu" class="btn btn-success btn-sm">Lengkapi Data Orang Tua</a>
    @foreach($ortu as $or)
        <a href="/user/edit/ortu{{$or->id}}" class="btn btn-info btn-sm">Ubah Data Orang Tua</a>
      </div><hr class="mb-2">
    @endforeach
   
              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4 ">
                <!-- Card Header - Accordion -->
                <a href="#dua" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="dua">
                  <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua</h6>
                </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="dua">
              <div class="card-body border-bottom-success">
                 @foreach($ortu as $o)
                 @if($o->gambar >0)
                  <div class="text-center">
                    <img width="400px;" src="{{ url('/santri/ortu/'.$o->gambar )}}" class="rounded" alt="...">
                  @else
                    <h4>Anda Belom upload foto orang tua </h4>
                  @endif
                      
                  </div><br><br>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">List</th>
                        <th scope="col">Filed</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <tr>
                        <th scope="col">Nama Ayah</th>
                        <td>{{$o->nama_ayah}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Nama ibu</th>
                        <td>{{$o->nama_ibu}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Tgl-lahir ayah</th>
                        <td>{{$o->tgl_lahir}}</td>
                      </tr>
                      <tr>
                        <th scope="col">No-Hp</th>
                        <td>{{$o->no_hp}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Alamat</th>
                        <td>{{$o->alamat}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Kewarganegaraan</th>
                        <td>{{$o->negara}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Agama</th>
                        <td>{{$o->agama}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Sudah Pengamal</th>
                        <td>{{$o->pengamal}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Pendidikan Akhir</th>
                        <td>{{$o->pendidikan_akhir}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Jurusan/Keahlian</th>
                        <td>{{$o->jurusan}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Pekerjaan</th>
                        <td>{{$o->pekerjaan}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Penghasilan</th>
                        <td>{{$o->penghasilan}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->
</div>
</script>
@endsection