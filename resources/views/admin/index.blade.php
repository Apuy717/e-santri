@extends('layout.main')

@section('title')
Admin-BackEnd
@endsection

@section('conten')
<!-- DataTales Example -->

<div class="container-fluid">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  <a href="/dashboard/new_data" class="btn btn-success">Tambah Data</a><br><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Jk</th>
              <th>Tgl_Lahir</th>
              <th>Asrama</th>
              <th>Kamar</th>
              <th>Fakultas</th>
              <th>Prodi/jurusan</th>
              <th>kls/smtr</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Jk</th>
              <th>Tgl_Lahir</th>
              <th>Asrama</th>
              <th>Kamar</th>
              <th>Fakultas</th>
              <th>Prodi/jurusan</th>
              <th>kls/smtr</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($santri as $a)
            <tr>
              <td>{{$a->NIM}}</td>
              <td>{{$a->nama}}</td>
              <td>{{$a->alamat}}</td>
              <td>{{$a->jk}}</td>
              <td>{{$a->tgl_lahir}}</td>
              <td>{{$a->kamar->asrama->asrama}}</td>
              <td>{{$a->kamar->kamar}}</td>
              <td>{{$a->prodi->fakultas->nama_fakultas}}</td>
              <td>{{$a->prodi->nama_pordi}}</td>
              <td>{{$a->smester->smstr}}</td>
              <td>
                <a href="/dashboard/hapus/{{ $a->id }}" class=" btn btn-danger btn-circle btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
                <a href="/dashboard/edit/{{ $a->id }}" class=" btn btn-warning btn-circle btn-sm">
                  <i class="fas fa-exclamation-triangle"></i>
                </a>
                <a href="/dashboard/detile/{{ $a->NIM }}" class=" btn btn-info btn-circle btn-sm">
                  <i class="fas fa-info-circle"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection