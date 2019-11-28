@extends('layout.main')

@section('title')
	Data Kamar Dan Asrama
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Asrama</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="asr"><br>
                	<center><h4><a href="" class="badge badge-success" data-toggle="modal" data-target="#kamar">Add Asrama</a></h4></center>
                  <div class="card-body">
					 <table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">ID</th>	
					      <th scope="col">Asrama</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					   @foreach($asrama as $a)
					   	<td>{{$a->id}}</td>
					      <td>{{$a->asrama}}</td>
					      <td><center>
					      	<a href="/dashboard/gedung/delete/asrama/{{$a->id}}" class="badge badge-danger">Delete</a>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample"><br>
                	<center><h4><a href="" class="badge badge-success" data-toggle="modal" data-target="#exampleModal">Add kamar</a></h4></center>
                  <div class="card-body">
					 <table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Kamar</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					   @foreach($kamar as $k)
					      <td>{{$k->kamar}}</td>
					      <td><center>
					      	<a href="/dashboard/gedung/delete/{{$k->id}}" class="badge badge-danger">Delete</a>
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

      </div>
  <!-- End of Page Wrapper -->

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/dashboard/ad_kamar" method="post">
      		{{ csrf_field() }}
      	<label>Id Asrama</label><br>
      	<input type="text" name="asrama_id" value="{{$a->id}}"><br>
      	<label>Kamar</label><br>
        <input type="text" name="kamar"><br>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/dashboard/ad_asrama" method="post">
      		{{ csrf_field() }}
      	<label>Nama Asrama</label><br>
      	<input type="text" name="asrama"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection