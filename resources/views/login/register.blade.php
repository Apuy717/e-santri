@extends('layout.header')

@section('title')
  Kedonglo e-santri | Registrasi
@endsection

<body class="bg-success">
  <div class="container-fluid">
        <div class="container"> 
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
          {{ $error }} <br/>
          @endforeach
        </div>
        @endif
  <div class="row">
     <div class="col-lg-5">    
      <div class="card o-hidden border-0 shadow-lg my-4">
        <div class="card-body p-0">
          <div class=""></div>
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 mb-4">Daftar Akun E-Santri</h1>
                </div>

                <form class="user" action="/register" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}


                   <div class="form-group">
                    <input type="number" class="form-control" name="NIM" id="NIM" placeholder="Nomor Induk Santri">
                  </div>

                  <div class="form-row mb-3">

                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan">
                    </div>
                     <div class="col-sm-6">
                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="Email" placeholder="Email">
                  </div>

                  <div class="form-group">
                      <input type="password" class="form-control" name="permissions" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" name="password" id="exampleRepeatPassword" placeholder="Ketik Ulang Password">
                  </div>
                  <label class="small" for="input_gambar">Upload Foto Bukti Pembayaran Pondok</label><br>
                  <div class="form-row">
                    <div class="col-sm-5">
                      <label class="btn btn-secondary btn-block" for="input_gambar">Choose File</label><br>
                    </div>
                  </div>
                  <input type="file" name="gambar" id="input_gambar">
                  
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                  
                </form>
                <hr>
                <div>
                  <p class="small">Sudah Punya Akun?<a href="/login"> Login Disini!</a></p>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="width col-lg-7">
      <div class="card-body p-5 my-5">
        <div class="row">
          <div class="col-md-1 mb-2">
            <img src="{{url('/santri/img/layout/row.png')}}">
          </div>  
          <div class="col-md-10 text-white">
            <h1 class="display-1 font-weight-bold">SANTRI</h1>
            <h1 class="display-1 font-weight-bold">PONDASI</h1>
            <h1 class="kedunglo">NEGERI</h1>
          </div>
        </div>
      </div>
    </div>    
  </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
