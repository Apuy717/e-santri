@extends('layout.main')
@section('title')
	Monitoring|kehadiran
@endsection

@section('conten')
	<div class="container-fluid">
		<h3>kehadiran anak santri</h3>
		<hr>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Persensi All</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Kamar</th>
                      <th>Tgl</th>
                      <th>Waktu</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th>Ket</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Kamar</th>
                      <th>Tgl</th>
                      <th>Waktu</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th>Ket</th>
                    </tr>
                  </tfoot>
                  <tbody>
                @foreach($user as $u)
                  	@foreach($u->persensi as $p)
                  <tr>
                  	<td>{{$u->NIM}}</td>
                  	<td>{{$u->first_name}} {{$u->last_name}}</td>
                  	<td>As-Syafaah</td>
                  	<td>{{$p->tgl}}</td>
                  	<td>{{$p->waktu}}</td>
                  	<td>{{$p->Waktu->waktu}}</td>
                  	@if($p->H == 0)
                  	<td>Alfa</td>
                  	@elseif($p->H == 1)
                  	<td>Hadir</td>
                  	@elseif($p->H == 2)
                  	<td>Izin</td>
                  	@elseif($p->H == 3)
                  	<td>Sakit</td>
                  	@endif
                  	<td>{{$p->keterangan}}</td>
                  </tr>
                  	@endforeach
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection