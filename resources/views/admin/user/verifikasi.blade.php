@extends('layout.main')

@section('title')
Admin-BackEnd Detile
@endsection

@section('conten')
<div class="container-fluid">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  `<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Verifikasi Santri / User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Daftar</th>
              <th>Bukti Pembayaran</th>
              <th>Status</th>
              <th>Verifikasi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Daftar</th>
              <th>Bukti Pembayaran</th>
              <th>Status</th>
              <th>Verifikasi</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($user as $u)
            <tr>
              <td>{{$u->NIM}}</td>
              <td>{{$u->first_name}} {{$u->last_name}}</td>
              <td>{{$u->email}}</td>
              <td>{{$u->created_at}}</td>
              <td>
                <center><img width="150px;" src="{{ url('/santri/verif/'.$u->gambar )}}" alt="..."></center>
              </td>
              @foreach($u->activation as $a)
              @if($a->completed > 0)
              <td>Aktif</td>
              @else
              <td>NonAktif</td>
              @endif
              <td>
                @if ($a->completed < 1) <a href="/active/{{$u->email}}/{{$a->code}}" class="badge badge-warning container">verifikasi</a>
                  @else
                  <span class="badge badge-success container">Success</span>
                  @endif
              </td>
            </tr>
            @endforeach
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- End of Main Content -->
@endsection