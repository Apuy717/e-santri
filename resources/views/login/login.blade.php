@extends('layout.header')

@section('title')
  Login My Account 
@endsection

<div class="container-fluid">
  @if (Session('error'))
    div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{ Session('error')}}</strong>
  @endif

<div class="container-fluid">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
   @endif
<body class="login">

  <div class="container-fluid pt-5">

    <!-- Outer Row -->
    <div class="row">
      <div class="col-md-8">
        <div class="card-body">
          <di class="row">
            <div class="col-md-12 text-white width">
              <h1 class="display-4">E-SANTRI</h1>
              <h1 class="display-4">Pondok Pesantren</h1>
              <h1 class="kedunglo">Kedunglo</h1>
              <h2 class="h1">Al Munadhdhoroh</h2>
              <h3 class="h1 mb-5">Kota Kediri</h3>
              <h4 class="display-6">Mencetak Wali Yang Intelek</h4>
              <h4 class="display-6">& Intelektual yang Wali</h4>
            </div>
          </di>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col">
                <div class="p-4 pt-5 pb-5">
                  <div class="text-center">
                    <h1 class="h1 mb-4">E-SANTRI</h1>
                  </div>

                  <form class="mb-4" action="{{url('/login')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                      <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email " autofocus="on">
                    </div>
                    <div class="form-group mb-3">
                      <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label success" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-sm-6">
                          <button type="submit" name="submit" value="login" class="middle btn btn-primary btn-block">login
                          </button>
                      </div>
                      <div class="col-sm-6">
                          <button type="submit" name="#" value="#" class="middle btn btn-link btn-block text-primary">Lupa Password?
                          </button>
                      </div>
                    </div>               
                      <hr>  
                  </form>

                  <div>
                    <p class="small">Belum Punya Akun? <a href="/register"> daftar disini</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

