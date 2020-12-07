<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=site_url('admin')?>">
  <div class="sidebar-brand-text mx">Aplikasi Kas</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?=site_url('admin')?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Data Kas
</div>

<!--USER-->
<li class="nav-item">
  <a class="nav-link" href="<?=site_url('masuk')?>">
    <i class="fas fa-arrow-down pr-1"></i>
    <span>Kas Masuk</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?=site_url('keluar')?>">
    <i class="fas fa-arrow-up pr-1"></i>
    <span>Kas Keluar</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?=site_url('laporan')?>">
    <i class="fas fa-scroll pr-1"></i>
    <span>Laporan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('auth/logout');?>" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt pr-1"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->