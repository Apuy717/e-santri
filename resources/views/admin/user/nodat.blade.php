@extends('layout.main')

@section('title')
Santri | Undifined
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
            <h6 class="m-0 font-weight-bold text-primary">Santri Yang Tidak Melengkapi Data</h6>
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
                            <th>Terakhir Login</th>
                            <th>Bukti Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Daftar</th>
                            <th>Terakhir Login</th>
                            <th>Bukti Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($query as $san)
                        <tr>
                            <td>{{$san->NIM}}</td>
                            <td>{{$san->first_name}} {{$san->last_name}}</td>
                            <td>{{$san->email}}</td>
                            <td>{{$san->created_at}}</td>
                            <td>
                                @if($san->last_login > 0)
                                {{$san->last_login}}
                                @else
                                Belum Pernah Login
                                @endif
                            </td>
                            <td>
                                <center><img width="150px;" src="{{ url('/santri/verif/'.$san->gambar)}}" alt="..."></center>
                            </td>
                            <td>
                                <center>
                                    <a href="{{url('/dashboard/santri/undifined/delete/'.$san->id)}}" onclick="return confirm('apakah anda yakin mau hapus data ini ?');" class="badge badge-danger"><i class="fas fa-trash-alt fa-2x" style="color: white"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->
@endsection