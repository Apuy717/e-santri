@extends('layout.main')

@section('title')
  Admin-BackEnd Detile
@endsection

@section('conten')
<div class="container-fluid">
  <div class="row">

            <div class="col-lg-6">

              <!-- Default Card Example -->
              <div class="card shadow mb-4 border-top-primary">
                <!-- Card Header - Accordion -->
                <a href="#satu" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="satu">
                  <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="satu">
                  <div class="card-body border-bottom-primary">
                    @foreach($santri as $s)
                    <div class="text-center">
                      <img width="400px;" src="{{ url('/santri/img/'.$s->gambar )}}" class="rounded" alt="...">
                    </div><br><br>
                    <ul class="list-group">
                      <li class="list-group-item x-right"><b>NIM &emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;{{$s->NIM}}</b></li>
                      <li class="list-group-item"><b>NAMA &emsp;&emsp;&emsp;&emsp;:&emsp;{{$s->nama}}</b></li>
                      <li class="list-group-item"><b>JK &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;{{$s->jk}}</b></li>
                      <li class="list-group-item"><b>ALAMAT &emsp;&emsp;&emsp;:&emsp;{{$s->alamat}}</b></li>
                      <li class="list-group-item"><b>TGL_LAHIR &emsp;&emsp;:&emsp;{{$s->tgl_lahir}}</b></li>
                      <li class="list-group-item"><b>STATUS &emsp;&emsp;&emsp;&ensp;:&emsp;{{$s->status}}</b></li>
                      <li class="list-group-item"><b>CREATED AT &emsp;:&emsp;{{$s->created_at}}</b></li>
                      <li class="list-group-item"><b>UPDATED AT &emsp;:&emsp;{{$s->updated_at}}</b></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
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
                    <ul class="list-group">
                      <li class="list-group-item"><b>NAMA &ensp;&ensp;&emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->nama}}</b></li>
                      <li class="list-group-item"><b>TEMPAT,TGL_LHR :&emsp;{{$o->tmp_tgl_lhr}}</b></li>
                      <li class="list-group-item"><b>AGAMA &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->agama}}</b></li>
                      <li class="list-group-item"><b>PENGAMAL &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->pengamal}}</b></li>
                      <li class="list-group-item"><b>KEWARGANEGARAAN :&emsp;{{$o->kewarganegaraan}}</b></li>
                      <li class="list-group-item"><b>PENDIDIKAN TERAKHIR &emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->pendidikan_terakhir}}</b></li>
                      <li class="list-group-item"><b>JURUSAN/KEAHLIAN &emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->jurusan}}</b></li>
                      <li class="list-group-item"><b>ALAMAT &emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->alamat}}</b></li>
                      <li class="list-group-item"><b>TEMPAT TINGGAL &emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->tempat_tinggal}}</b></li>
                      <li class="list-group-item"><b>NO-HP &emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->no_hp}}</b></li>
                      <li class="list-group-item"><b>PEKERJAAN &emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->pekerjaan}}</b></li>
                      <li class="list-group-item"><b>PENGHASILAN &emsp;&emsp;&emsp;&emsp;:&emsp;{{$o->penghasilan}}</b></li>
                    </ul>
                    @endforeach
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->
</div>
@endsection