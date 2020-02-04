@include('layout.header')

@section('title')
Kedonglo e-santri | Registrasi
@endsection

<body class="bg-success">
  <div class="container-fluid">
    <div class="container">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br />
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

                    <form class="user" action="{{url('/register')}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <!-- <center>
                        <label class="small" for="input_gambar">Upload Foto Bukti Pembayaran Pondok</label><br>
                        <input id="input-b2" name="gambar" type="file" class="file" data-show-preview="false">
                        <!-- <input id="input-b1" name="gambar" type="file" class="file" data-browse-on-zone-click="true"><br>
                      </center>-->
                      <div class="form-group">
                        <input type="number" class="form-control" name="NIM" id="NIM" placeholder="Nomor Induk Santri">
                      </div>

                      <div class="form-row mb-3">

                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan">
                        </div><br><br>
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
                      <div>
                        <label class="small" for="input_gambar">Upload Foto Bukti Pembayaran Pondok</label><br>
                        <input id="input-b2" name="gambar" type="file" class="file" data-show-upload="false" data-show-remove="true" data-show-cancel="false" data-show-preview="false">
                      </div><br>

                      <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>

                    </form>
                    <hr>
                    <div>
                      <p class="small">Sudah Punya Akun?<a href="{{url('/')}}"> Login Disini!</a></p>
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
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/LANG.js"></script>

</body>

</html>