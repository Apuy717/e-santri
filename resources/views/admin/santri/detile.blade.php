@extends('layout.main')

@section('title')
	Backand | Master Data Santri
@endsection

@section('conten')

<div class="container">
	<h3>QrCode e-Santri</h3>
	<hr>
<div class="row" >
  <div class="col-sm-6" id="capture">
    <div class="card">
      <div class="card-body">
        <center><h4 class="card-title ">e-Santri</h4></center>
        <center><h5 class="card-title ">pondok pesantren kedunglo al-munadhoroh</h5></center><hr>
        @foreach($santri as $s)
        <div class="row">
	        <p class="card-text col-2">NIM</p>
	        <p class="card-text col-1">:</p>
	        <p class="col-4">{{$s->user_NIM	}}</p>
    	</div>
    	@endforeach
    	@foreach($user as $u)
    	 <div class="row">
	        <p class="card-text col-2">Nama:</p>
	        <p class="card-text col-1">:</p>
	        <p class="col-4">{{$u->first_name}} {{$u->last_name}}</p>
    	</div>
    	@endforeach
    	<div class="row">
	        <p class="card-text col-2">Kamar</p>
	        <p class="card-text col-1">:</p>
	        <p class="col-4">{{$s->kamar->kamar}}</p>
    	</div>
    	<div class="row">
	        <p class="card-text col-2">Klz:</p>
	        <p class="card-text col-1">:</p>
	        <p class="col-4">-</p>
    	</div>
    	<div class="row">
	        <p class="card-text col-2">Kel:</p>
	        <p class="card-text col-1">:</p>
	        <p class="col-4">-</p>
	        <div class="col-2" id="qrcode" style="margin-left: -18px; margin-top: -150px;"></div>
    	</div>
        <button class="toCanvas btn btn-sm"><span class="fas fa-download"></span></button>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Generete QrCode</h5>
        <p class="card-text">Tester</p>
        <input type="hidden" name="" id="sa" value="{{$s->user_NIM}}">
        <a href="#" class="btn btn-primary" onclick="generate_qrcode()">Tester</a>
      </div>
    </div>
  </div>
</div>
</div><br><br>
		
@endsection

@section('footer')
 <script src="{{url('admin/vendor/jquery-qrcode-0.17.0.js')}}"></script>
<script src="{{url('admin/vendor/html2canvas.min.js')}}"></script>
<script src="{{url('admin/vendor/canvas2image2.js')}}"></script>

  <script type="text/javascript">
  function generate_qrcode(){
   var teks = document.getElementById('sa');

   $('#qrcode canvas').remove();
   $('#qrcode').qrcode({width: 120,height: 120,text: teks.value});
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