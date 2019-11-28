@extends('layout.main')

@section('title')
	Backand | Master Data Santri
@endsection

@section('conten')
	<div class="container-fluid">
		<h1>Data master santri</h1>
		<hr>
		 @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Awal Mondok</th>
                      <th>Smester/Kelas</th>
                      <th>Prodi/Jurusan</th>
                      <th>Fakultas/Sekolah</th>
                      <th>Kamar & Asrama</th>
                      <th>Kls & Madrasah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Awal MOndok</th>
                      <th>Smester/Kelas</th>
                      <th>Prodi/Jurusan</th>
                      <th>Fakultas/Sekolah</th>
                      <th>Kamar & Asrama</th>
                      <th>Kls & Madrasah</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($santri as $u) @foreach($user as $a)
                  		@if($u->user_NIM == $a->NIM)
                  			<tr>
                          <!-- <input type="hidden" name="tes" id="sa" value="{{$u->user_NIM}}"> -->
		                  		<td><input type="text" name="tes" id="sa" value="{{$u->user_NIM}}"></td>
                  				<td>{{$a->first_name}} {{$a->last_name}}</td>
                  				<td>{{$u->alamat}}</td>
                  				<td>{{$u->awal_mondok}}</td>
		                  		<td>{{$u->smester->smester}}</td>
		                  		<td>{{$u->prodi->prodi}}</td>
		                  		<td>{{$u->prodi->fakultas->fakultas}}</td>
		                  		<td>{{$u->kamar->kamar}}</td>
		                  		<td>
		                  			{{$u->kls_id}} 
		                  				@if($u->kls_id > 0)
		                  				| 
		                  				@endif
		                  			@if($u->madrasah_id ==1)
		                  				Idad
		                  			@elseif($u->madrasah_id ==2)
		                  				Mi
		                  			@elseif($u->madrasah_id == 3)
		                  				Mts
		                  			@endif
		                  		</td>
		                  		<td>
                            <a class="btn btn-info btn-sm det-mhs" data-target="#exampleModal" data-toggle="modal" onclick="generate_qrcode()"><span class="fas fa-list"></span></a>
		                  			<a href="/dashboard/master/detile/{{$u->user_NIM}}" class="badge badge-primary">Detile</a>
		                  		</td>
                  			</tr>
                  		@endif
                  	@endforeach @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div?>	
	</div>

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-width:2px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="exampleModal">


        <div class="container" id="capture" style="padding:10px;
            border: solid #777;
            border-width: 2px;
            border-radius:10px;
            background-color: #eeeeee0f;">
            <div class="col" style="text-align:center;font-weight:bold">
              <p>
                E-Santri
              </p>
              <p>
                Pondok pesantren kedunglo Al-munadhoroh
              </p>
            </div>
            <div class="col-3">
              <div id="qrcode" style="margin-right: :0px;"></div>
            </div>
        <button class="toCanvas btn btn-sm"><span class="fas fa-download"></span></button>
      </div>
    </div>
  </div>
</div>   
</div>
</div>
@endsection
@section('footer')
  <script src="{{url('admin/vendor/jquery-qrcode-0.17.0.js')}}"></script>
<script src="{{url('admin/vendor/html2canvas.min.js')}}"></script>
<script src="{{url('admin/vendor/canvas2image2.js')}}"></script>

  <script type="text/javascript">
  function generate_qrcode(){
   var teks = document.getElementById('sa');

   $('#qrcode canvas').remove();
   $('#qrcode').qrcode({
    render: 'canvas',
    text: teks.value
   });
  }
      
      var test = $("#capture").get(0);
      $('.toCanvas').click(function(e) {
      html2canvas(test).then(function(canvas) {
        var canvasWidth = canvas.width;
        var canvasHeight = canvas.height;
        var img = Canvas2Image.convertToImage(canvas, canvasWidth, canvasHeight);
        // Export the canvas to its data URI representation
        var base64image = img;

          // Open the image in a new window
          // window.open(base64image , "_blank");
          let type = 'png'; // image type
          let w = $('#imgW').val(); // image width
          let h = $('#imgH').val(); // image height
          let f = $('#nama_mhs').text(); // file name
          w = (w === '') ? canvasWidth : w;
          h = (h === '') ? canvasHeight : h;
          // save as image
          Canvas2Image.saveAsImage(canvas, w, h, type, f);
      })
    });
 </script>
@endsection