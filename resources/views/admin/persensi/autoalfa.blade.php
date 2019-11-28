@extends('layout.main')

@section('title')
	Backand | auto alfa
@endsection

@section('conten')
	<div class="container-fluid">
		<h1>auto alfa</h1>

		<form  action="/dashboard/persensi/alfa" method="post">
			{{ csrf_field() }}
			<button type="submit" name="submit">simpan auto alfa</button>
		</form>
	</div>
@endsection