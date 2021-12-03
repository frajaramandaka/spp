<!-- MENU SIDEBAR-->
<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<aside class="menu-sidebar d-none d-lg-block">
<div class="logo">

<a class="navbar-brand mr-1" href="<?php echo site_url('admin') ?>"><?php echo SITE_NAME ?></a>

</div>
<div class="menu-sidebar__content js-scrollbar1">
<nav class="navbar-sidebar">
<ul class="list-unstyled navbar__list">
<!--Akses Menu Untuk Admin-->
<?php if($this->session->userdata('akses')=='admin'):?>
<li>
<a class="js-arrow" href="<?php echo site_url('admin/overview')?>">
<i class="fas fa-home"></i>Beranda</a>

</li>
<li>
<a href="<?php echo site_url('admin/spp')?>">
<i class="fas fa-credit-card"></i>SPP</a>

</li>
<li>
<a href="<?php echo site_url('admin/kelas')?>">
<i class="fas fa-table"></i>Kelas</a>

</li>
<li>
<a href="<?php echo site_url('admin/siswa')?>">
<i class="fas fa-users"></i>Siswa</a>

</li>
<li>
<a href="<?php echo site_url('admin/petugas')?>">
<i class="fas fa-user"></i>Petugas</a>

</li>
<li>
<a href="<?php echo site_url('admin/pembayaran')?>">
<i class="fa fa-credit-card"></i>Transaksi Pembayaran</a>

</li>
<!--Akses Menu Untuk Petugas-->
<?php elseif($this->session->userdata('akses')=='petugas'):?>
<li class="active has-sub">
<a class="js-arrow" href="<?php echo site_url('admin/overview')?>">
<i class="far fa-home-lg"></i>Beranda</a>

</li>
<li>
<a href="<?php echo site_url('admin/spp')?>">
<i class="fas fa-address-card"></i>SPP</a>

</li>
<li>
<a href="<?php echo site_url('admin/siswa')?>">
<i class="far fa-user"></i>Siswa</a>

</li>
<li>
<a href="<?php echo site_url('admin/pembayaran')?>">
<i class="fas fa-calendar-alt"></i>Transaksi Pembayaran</a>

</li>
<!--Akses Menu Untuk Siswa-->
<?php else:?>
<li class="active has-sub">
<a class="js-arrow" href="<?php echo site_url('admin/overview')?>">
<i class="fas fa-tachometer-alt"></i>Beranda</a>

</li>
<?php endif;?>
</ul>
</nav>
</div>
</aside>
<!-- END MENU SIDEBAR-->