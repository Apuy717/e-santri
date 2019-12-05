@extends('layout.main')

@section('title')
	persensi santri
@endsection

@section('header')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
@endsection

@section('conten')
  <div class="container">
              @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif <br>
        </div>
 <div class="container-fluid">

    <button type="text" class="button">filter</button>
            <form  action="/dashboard/persensi/alfa" method="post">
            {{ csrf_field() }}
            <input type="text" name="" id="jam" onclick="return function waktu()">
                <select id="pilih" name="waktu_id">
                    <option value="1">magrib</option>
                    <option value="2">isya</option>
                    <option value="3">subuh</option>     
                </select>
            <button type="submit" name="submit">simpan auto alfa</button>
        </form><hr>
        <h3>absen manual</h3> <hr>
    <form method="post" action="/dashboard/absensi">
        {{ csrf_field() }}
        <input type="text" name="user_NIM" placeholder="NIM">
        <select id="ipilih" name="waktu_id" >
        <option value="1">magrib</option>
        <option value="2">isya</option>
        <option value="3">subuh</option>     
        </select>

        <button type="submit" name="submit">simpan</button>
        
    </form><br>
    <input type="time" name="">

<!-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" id="jam"></li>
  </ol>
</nav> -->


<video id="preview" class="img-fluid img-thumbnail mx-auto d-block" alt="..."></video>
<audio id="beep" src="{{url('audio/beep.mp3')}}"></audio>
<audio id="sdh_absen" src="{{url('audio/ori_sdh.mp3')}}"></audio>
<audio id="tolak" src="{{url('audio/no_access_ori.mp3')}}"></audio>
<audio id="telat" src="{{url('audio/telat_ori.mp3')}}"></audio>

</div>

@endsection

@section('footer')
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="{{url('admin/vendor/instascan.min.js')}}"></script>
<script type="text/javascript">

$(document).ready(function(){
        $(".button").focus(function(){
            var waktu_id = $('#pilih').val();
            //console.log(waktu_id);
        });
    });

    let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror:false});
      scanner.addListener('scan', function (content) {
        var data = content;
        console.log(data);
       // var tgl = new Date().getDate();
       // var bln = new Date().getMonth();
        var token = '{{ csrf_token() }}';
        var waktu_id = document.getElementById('pilih').value;
        console.log(waktu_id);

        $.ajax({
                type: 'POST',
                url: '{{ url("/dashboard/absensi/") }}',
                data: { '_token': token, 'user_NIM':data, 'waktu_id':waktu_id},
                success: function(data) { 
                      if (data.status==false) {
                          swal({
                                title: "Peringatan !!!",
                                text: data.first+' '+data.last +' '+ data.message,
                                type: "warning",
                                showConfirmButton: false,
                                showCancelButton: false,
                                timer: 1500
                              });
                                isBusy=false;
                                document.getElementById('sdh_absen').play();
                          }else if (data.status == true) {
                                swal({
                                title: "Selamat",
                                text: data.first+' '+data.last +' '+ data.message,
                                type: "success",
                                showConfirmButton: false,
                                showCancelButton: false,
                                timer: 1500
                              });
                            document.getElementById('beep').play();
                            isBusy=false;
                          }else if (data.status == "telat") {
                                swal({
                                title: "Peringatan !!!",
                                text: data.message,
                                type: "warning",
                                showConfirmButton: false,
                                showCancelButton: false,
                                timer: 1500
                              });
                                isBusy=false;
                                document.getElementById('telat').play();

                          } else if (data.status == "gagal" ) {
                                swal({
                                title: "Peringatan !!!",
                                text: data.request+' '+data.message,
                                type: "warning",
                                showConfirmButton: false,
                                showCancelButton: false,
                                timer: 1500
                              });
                                isBusy=false;
                                // document.getElementById('beep').play();
                                document.getElementById('tolak').play();
                     }
                }
            });
      });
      Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        if (cameras.length > 1) {
          scanner.start(cameras[1]);
        }else{
          scanner.start(cameras[0]);
        }
      } else {
          console.error('No cameras found.');
          swal("Woro-Woro", "Lapo Koe Block Camera E Broooo", "warning");
        }
      }).catch(function (e) {
        console.error(e);
        swal("Woro-Woro", "Ora Enek Kmera yo gak Knek", "warning");
      });


      window.setTimeout("waktu()", 1000);
 
  function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    document.getElementById("jam").innerHTML = waktu.getHours() +' : '+waktu.getMinutes()+' : '+waktu.getSeconds()+', Wib';;
  }

    </script>
@endsection