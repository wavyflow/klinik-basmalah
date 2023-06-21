<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color : #44B34C;" id="accordionSidebar">

<!-- Sidebar - Brand -->
<div class="pading d-inline mt-3">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('data_pasien')?>">
        <img src="<?=base_url('assets/logo/logo2.png');?>" width="100" height="50">
    <div class="sidebar-brand-text mx-3">Klinik Basmalah</div>
    </a>
</div>
<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
    
</div>
<!-- Nav Item - Dashboard -->
<!-- <li class="nav-item">
    <a class="nav-link" href="<?=base_url('dashboard')?>">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span>
    </a>
</li> -->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('pendaftaran')?>">
        <i class="fas fa-fw fa-user-plus"></i>
        <span>Pendaftaran</span>
    </a>
</li>
<!-- <li class="nav-item">
    <a class="nav-link" href="<?=base_url('pendaftaran_online/daftar')?>">
        <i class="fas fa-fw fa-user-plus"></i>
        <span>Pendaftaran Online</span>
    </a>
</li> -->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('pendaftaran_online')?>">
        <i class="fas fa-fw fa-th-list"></i>
        <span>Data Pendaftaran</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Kelola Pasien
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('data_pasien')?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Data Pasien Baru</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('Data_pasienLama')?>">
        <i class="fas fa-fw fa-user-friends"></i>
        <span>Data Pasien Lama</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
    Kelola Dokter
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('data_dokter')?>">
        <i class="fas fa-fw fa-user-md"></i>
        <span>Data Dokter</span>
    </a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
    Kelola Poliklinik
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('data_poli')?>">
        <i class="fas fa-fw fa-id-card-alt"></i>
        <span>Poliklinik</span>
    </a>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
    Cetak Laporan
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-file-export"></i>
        <span>per-Poliklinik</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih Poliklinik:</h6>\
            <?php 
            $no = 1;
            foreach($poli as $p){ 
            ?>
            <a class="collapse-item" href="kunjungan/export_pdf/<?=$p->id_poli?>"><?=$p->nama_poli?></a>
            <?php } ?>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('laporan')?>">
        <i class="fas fa-fw fa-file-archive"></i>
        <span>Laporan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('auth/logout')?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
