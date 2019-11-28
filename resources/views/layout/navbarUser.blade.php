
 <body id="page-top">
 <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="mt-2 pl-3">
         <a class="sidebar-brand p-0 text-left" href="{{url('/user')}}">
          <div class="small">E-SANTRI<br></div>
          <div class="sidebar-brand-text">
            <span>Pondok Pesantren</span>
            <h3>Kedunglo</h3>
          </div>
        </a>
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/user')}}">
          <i class="fa fa-home"></i>
          <span>Home</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-user"></i>
          <span>Profil</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Profil :</h6>
            <a class="collapse-item" href="{{url('/user/add_profile')}}">Tambah Data Profil</a> 
            <a class="collapse-item" href="{{url('/user/ad_ortu')}}">Tambah Data Orang Tua</a>
          </div>
          <a href=""></a>
        </div>
      </li>
      <!-- Divider -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/user')}}">
          <i class="fas fa-fw fa-history"></i>
          <span>History Izin Pergi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/user')}}">
          <i class="fas fa-fw fa-money-bill-alt"></i>
          <span>Status Pembayaran</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/user')}}">
          <i class="fas fa-fw fa-award"></i>
          <span>Prestasi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/user')}}">
          <i class="fas fa-fw fa-exclamation-triangle"></i>
          <span>Pelanggaran</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    