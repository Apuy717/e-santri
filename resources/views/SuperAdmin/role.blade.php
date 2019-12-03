@extends('layout.main')

@section('title')
	Backand | Roles
@endsection

@section('conten')
	<div class="container-fluid">
		@if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
           	<strong>{{ $message }}</strong>
          </div>
        @endif<br>
		<h3>ini halaman ubah role santri</h3><hr>
		 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Update Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama User & Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama User & Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($role as $r)
	                    <tr>
                      <td>{{$r->user['first_name']}} {{$r->user['last_name']}} |
                          @if($r->role_id == 1)
    	                      		<p class="badge badge-success">Admin</p>
    	                      	@elseif($r->role_id == 2)
    	                      		<p class="badge badge-danger">User</p>
    	                      	@elseif($r->role_id == 3)
    	                      		<p class="badge badge-primary">Super Admin</p>
    	                      </td>
    	                     @endif
    	                     <td>
	                      	<form action="/dashboard/role/update/{{$r->user_id}}" method="post">
	                      		  {{ csrf_field() }}
  								  {{ method_field('PUT') }}
	                      		<input type="hidden" name="role_id" value="1">
	                      		<button type="submit" name="submit" class="badge badge-success">Admin</button>
	                      	</form>
	                      	<form action="/dashboard/role/update/{{$r->user_id}}" method="post">
	                      		  {{ csrf_field() }}
  								  {{ method_field('PUT') }}
	                      		<input type="hidden" name="role_id" value="3">
	                      		<button type="submit" name="submit" class="badge badge-primary">Super admin</button>
	                      	</form>
	                      	<form action="/dashboard/role/update/{{$r->user_id}}" method="post">
	                      		  {{ csrf_field() }}
  								  {{ method_field('PUT') }}
	                      		<input type="hidden" name="role_id" value="2">
	                      		<button type="submit" name="submit" class="badge badge-danger">User/Santri</button>
	                      	</form>
                          </td>
	                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
	</div>
@endsection