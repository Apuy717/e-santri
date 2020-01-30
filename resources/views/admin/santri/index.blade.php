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
              <th>Smester/Kelas</th>
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
              <th>Smester/Kelas</th>
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
              <td>{{$u->user_NIM}}</td>
              <td>{{$a->first_name}} {{$a->last_name}}</td>
              <td>{{$u->alamat}}</td>
              <td>{{$u->smester->smester}}</td>
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
                <a href="/dashboard/master/qrcode/{{$u->user_NIM}}" class="GetData" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-id-card fa-2x"></i></a>
                <a href="/dashboard/master/detapi/{{$u->user_NIM}}" data-toggle="modal" data-target=".bd-example-modal-xl" class="GetDataDetile"><i class="fas fa-eye fa-2x"></i></a>
              </td>
            </tr>
            @endif
            @endforeach @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Download Kartu Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="nim" id="qrCoode" value="">

      <div class="modal-body ">
        <div class="container" id="capture" style="
            padding:10px;
            color: black;
            border: solid #777;
            border-width: 2px;
            border-radius:10px;
            background-color: #eeeeee0f;">
          <div class="col" style="text-align:center;font-weight:bold">
            <p>
              KARTU PRESENSI SANTRI
            </p>
            <p>
              PONDOK PESANTREAN KEDUNGLO
            </p>
          </div>
          <hr>
          <div class="row">
            <div class="col" style="margin-right:35px;">
              <div class="row">
                <div class="col-4">NIM</div>
                <div class="col-1">:</div>
                <div class="col-4" id="NIM"></div>
              </div><br>
              <div class="row">
                <div class="col-4">NAMA</div>
                <div class="col-1">:</div>
                <div class="col" id="nama"></div>
              </div><br>
              <div class="row">
                <div class="col-4">MONDOK</div>
                <div class="col-1">:</div>
                <div class="col" id="mondok"></div>
              </div><br>
              <div class="row">
                <div class="col-4">NO HP</div>
                <div class="col-1">:</div>
                <div class="col" id="email"></div>
              </div>
            </div>
            <div class="col-5" style="">
              <div id="qrcode" style="margin-left:-35px;">
              </div>
            </div>
          </div>
          <button class="toCanvas btn btn-sm"><span class="fas fa-download"></span></button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detail -->
<div class="modal fade bd-example-modal-xl show" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success">Detail Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="text-center mb-4">
          <img id="upload-img" src="" class="rounded-circle" alt="..." style="width: 300px; height:300px">
        </div>
        <h4 class=" mt-5 ml-2 text-success">Informasi Santri :</h4>
        <div class="container" style="color: black">
          <div class="col-md-12">
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>NIM</label>
              </div>
              <div class="col-md-6">
                <p id="nim"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>NAMA</label>
              </div>
              <div class="col-md-6">
                <p id="nama2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>ALAMAT</label>
              </div>
              <div class="col-md-6">
                <p id="alamat"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>TEMMPAT TGL_LAHIR</label>
              </div>
              <div class="col-md-6">
                <p id="tgl2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>JK</label>
              </div>
              <div class="col-md-6">
                <p id="jk2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>ANAK-KE</label>
              </div>
              <div class="col-md-6">
                <p id="anak2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>NO HP</label>
              </div>
              <div class="col-md-6">
                <p id="no2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>Facebook</label>
              </div>
              <div class="col-md-6">
                <p id="fb"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>ASAL SEKOLAH</label>
              </div>
              <div class="col-md-6">
                <p id="asal2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>AWAL MONDOK</label>
              </div>
              <div class="col-md-6">
                <p id="awalmdk2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>SMESTER</label>
              </div>
              <div class="col-md-6">
                <p id="smstr2"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>STATUS</label>
              </div>
              <div class="col-md-6">
                <p id="st"></p>
              </div>
            </div>
            <br>
            <div>
              <h4 class="text-success">Informasi Wali :</h4>
            </div>

            <div class="row border-bottom">
              <div class="col-md-6">
                <label>NAMA AYAH</label>
              </div>
              <div class="col-md-6">
                <p id="namaO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>NAMA IBU</label>
              </div>
              <div class="col-md-6">
                <p id="namaOi"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>TGL LAHIR</label>
              </div>
              <div class="col-md-6">
                <p id="tglO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>AGAMA</label>
              </div>
              <div class="col-md-6">
                <p id="agamaO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>PENGAMAL</label>
              </div>
              <div class="col-md-6">
                <p id="pengamal"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>KEWARGANEGARAAN</label>
              </div>
              <div class="col-md-6">
                <p id="negaraO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>PENDIDIKAN</label>
              </div>
              <div class="col-md-6">
                <p id="pendidikanO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>KEAHLIAN KHUSUS</label>
              </div>
              <div class="col-md-6">
                <p id="jurusanO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>ALAMAT</label>
              </div>
              <div class="col-md-6">
                <p id="alamatO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>NO HP</label>
              </div>
              <div class="col-md-6">
                <p id="noO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>PEKERJAAN</label>
              </div>
              <div class="col-md-6">
                <p id="pekerjaanO"></p>
              </div>
            </div>
            <div class="row border-bottom">
              <div class="col-md-6">
                <label>PENGHASILAN</label>
              </div>
              <div class="col-md-6">
                <p id="penghasilanO"></p>
              </div>
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
  $(document).ready(function() {
    geting()
  });

  function geting() {
    $('.GetData').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'get',
        url: $(this).attr('href'),
        success: function(response) {
          // console.log(response);
          $('#NIM').html(response[0].NIM);
          $('#nama').html(response[0].first_name + ' ' + response[0].last_name);
          $('#mondok').html(response[0].santri[0].awal_mondok);
          $('#email').html(response[0].santri[0].no_hp);
          $('[name=nim]').val(response[0].NIM);
          generate_qrcode();
        }
      });
    })
    $('.GetDataDetile').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'get',
        url: $(this).attr('href'),
        success: function(data) {
          var getDa = data[0];
          var getDaa = data[0].santri[0];
          var getDaaa = data[0].santri[0].ortu[0];
          var uri = 'https://kedunglo.telulast.com/santri/img/';
          var getImg = uri + getDaa.gambar;
          // console.log(uri + getDaa.gambar);
          // informasi santri
          $('#upload-img').attr('src', getImg)
          $('#nim').html(': ' + getDa.NIM)
          $('#nama2').html(': ' + getDa.first_name + ' ' + getDa.last_name)
          $('#alamat').html(': ' + getDaa.alamat)
          $('#tgl2').html(': ' + getDaa.tempat_lahir + ', ' + getDaa.tgl_lahir)
          $('#jk2').html(': ' + data[0].santri[0].jk)
          $('#anak2').html(': ' + getDaa.anake_ke)
          $('#no2').html(': ' + getDaa.no_hp)
          $('#fb').html(': ' + getDaa.sosial_media)
          $('#asal2').html(': ' + getDaa.asal_sekolah)
          $('#awalmdk2').html(': ' + getDaa.awal_mondok)
          $('#smstr2').html(': ' + getDaa.kls.kelas)
          $('#st').html(': ' + getDaa.status)
          // informasi orang tua
          $('#namaO').html(': ' + getDaaa.nama_ayah)
          $('#namaOi').html(': ' + getDaaa.nama_ibu)
          $('#tglO').html(': ' + getDaaa.tgl_lahir)
          $('#agamaO').html(': ' + getDaaa.agama)
          $('#pengamal').html(': ' + getDaaa.pengamal)
          $('#negaraO').html(': ' + getDaaa.negara)
          $('#pendidikanO').html(': ' + getDaaa.pendidikan_akhir)
          $('#jurusanO').html(': ' + getDaaa.jurusan)
          $('#alamatO').html(': ' + getDaaa.alamat)
          $('#noO').html(': ' + getDaaa.no_hp)
          $('#pekerjaanO').html(': ' + getDaaa.pekerjaan)
          $('#penghasilanO').html(': ' + getDaaa.penghasilan)
        }
      });
    })
  }

  function generate_qrcode() {
    var teks = document.getElementById('qrCoode');

    $('#qrcode canvas').remove();
    $('#qrcode').qrcode({
      text: teks.value,
      width: 120,
      height: 120,
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
      let f = $('#nama').text(); // file name
      w = (w === '') ? canvasWidth : w;
      h = (h === '') ? canvasHeight : h;
      // save as image
      Canvas2Image.saveAsImage(canvas, w, h, type, f);
    })
  });
</script>
@endsection