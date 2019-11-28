@extends('layout.main')

@section('title')
	Backand | Pendidikan
@endsection

@section('conten')
	<div class="container">
		@if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif <br>
		<p id="nama"></p>
		<div class="row">

            <div class="col-lg-6">
            	              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#asr" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="asr">
                  <h6 class="m-0 font-weight-bold text-primary">Data Fakultas</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="asr"><br>
                	<center><h4><a href="" class="badge badge-success" data-toggle="modal" data-target="#kamar">Add Fakultas</a></h4></center>
                  <div class="card-body">
					 <table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">ID</th>	
					      <th scope="col">Fakultas</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					   @foreach($fakultas as $f)
					   	  <td>{{$f->id}}</td>
					      <td>{{$f->fakultas}}</td>
					      <td><center>
					      	<a href="/dashboard/pendidikan/delete/fak/{{$f->id}}" class="badge badge-danger">Delete</a>
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
            <!-- Akhir grid 1 -->

            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Data Prodi</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample"><br>
                	<center><h4><a href="" class="badge badge-success" data-toggle="modal" data-target="#exampleModal">Add Prodi</a></h4></center>
                  <div class="card-body">
					 <table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Prodi/Jurusan</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					   @foreach($prodi as $p)
					      <td>{{$p->prodi}}</td>
					      <td><center>
					      	<a href="/dashboard/pendidikan/delete/pro/{{$p->id}}" class="badge badge-danger">Delete</a>
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

          </div>

        </div>
        <!-- /.container-fluid -->
@endsection
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Prodi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/dashboard/pendidikan/ad_prodi" method="post">
      		{{ csrf_field() }}
      	<label>Id Fakultas</label><br>
      	<input type="text" name="fakultas_id"><br>
      	<label>Prodi</label><br>
        <input type="text" name="prodi"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="kamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Fakultas / Sekolah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/dashboard/pendidikan/add_fakultas" method="post">
      		{{ csrf_field() }}
      	<label>Nama Fakultas / Jurusan</label><br>
      	<input type="text" name="fakultas"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>