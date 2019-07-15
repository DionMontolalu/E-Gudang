<style type="text/css">
  .navbar-inverse {
    background-color: #84B899;
  }
  .dropdown{
    color: white;
  }
</style>
<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">
      <a class="navbar-brand" href="<?php echo site_url('Beranda'); ?>">
      	<strong style="font-family: verdana;">E-Gudang</strong>
      </a>
    </div>
    <ul class="nav navbar-nav ">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-shopping-bag"></i> Transaksi <?php //echo $this->session->userdata("user"); ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('transaksi/Masuk'); ?>"><i class="fa fa-cart-plus"></i> Transaksi Masuk</a></li>
          <li><a href="<?php echo site_url('transaksi/Pemakaian'); ?>"><i class="fa fa-exchange"></i> Transaksi Pemakaian</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav ">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-plus-square"></i> Entry Data <?php //echo $this->session->userdata("user"); ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('entry/Gudang'); ?>"><i class="fa fa-industry"></i> Gudang</a></li>
          <li><a href="<?php echo site_url('entry/Pemakai'); ?>"><i class="fa fa-user"></i> Pemakai</a></li>
          <li><a href="<?php echo site_url('entry/Barang'); ?>"><i class="fa fa-cube"></i> Barang</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav ">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-print"></i> Laporan <?php //echo $this->session->userdata("user"); ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('laporan/Rmasuk'); ?>"><i class="fa fa-print"></i> Laporan Masuk</a></li>
          <li><a href="<?php echo site_url('laporan/Rpemakaian'); ?>"><i class="fa fa-print"></i> Laporan Pemakaian</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav ">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell-o"></i> Reminder <?php //echo $this->session->userdata("user"); ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href=""><i class="fa fa-filter"></i> Periksa Keadaan Barang</a></li>
          <li><a href=""><i class="fa fa-print"></i> Cetak Nota</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav ">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bookmark"></i>  Report Reminder <?php //echo $this->session->userdata("user"); ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href=""><i class="fa fa-cubes"></i> Stok Barang</a></li>
          <li><a href=""><i class="fa fa-hourglass-1"></i> Barang yang aman</a></li>
          <li><a href=""><i class="fa fa-hourglass-2"></i> Barang yang kurang</a></li>
          <li><a href=""><i class="fa fa-hourglass-3"></i> Barang yang habis</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav">
      <li><a href="<?php echo site_url('Admin'); ?>"><i class="fa fa-user-plus"></i> Tambah User</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> <?php echo $this->session->userdata("nama"); ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('Login/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
<br><br><br>
