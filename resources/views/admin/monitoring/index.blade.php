@extends('layout.main')
@section('title')
	Monitoring|kehadiran
@endsection

@section('header')
<link href="{{url('admin/jquery_ui/jquery-ui.css')}}" rel="stylesheet">
@endsection

@section('conten')
	<div class="container-fluid">
		<form action="{{url('/dashboard/monitoring')}}" method="get">
			<label for="date1">Start Date</label>
			<input type="text" name="date1" id="date1" class="input-tanggal">
			<label for="date2">End Date</label>
			<input type="text" name="date2" id="date2" class="input-tanggal">
			<button type="submit" name="submit">filter</button>
		</form><hr>
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
                  	@foreach($persensi as $p)
                  	@foreach($p->user->santri as $s)
                  	<tr>
                  		<td>{{$p->user_NIM}}</td>
                  		<td>{{$p->user->first_name}} {{$p->user->last_name}}</td>
                  		<td>{{$s->kamar->kamar}}</td>
                  		<td>{{$p->tgl}}</td>
                  		<td>{{$p->waktu}}</td>
                  		<td>{{$p->Waktu->waktu}}</td>
                  			<td>
                  				@if($p->H == 0)
                  					Alfa
                  			@elseif($p->H == 1)
                  					Hadir
                  			@elseif($p->H == 2)
                  					Ijin
                  			@elseif($p->H == 3)
                  					Sakit
                  			@endif
                  		</td>
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