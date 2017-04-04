<?php
include_once "./../Connection.php";
$NIS   = $_SESSION['NIS'];
$sql   = "SELECT * FROM pengguna WHERE NIS='{$NIS}'";
$hasil = $conn->query($sql);
if ($hasil) {
	$hasil         = $hasil->fetch_assoc();
	$nama_lengkap  = $hasil['nama'];
	$gambar_profil = $hasil['gambar_profil'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Laboratorium</title>
    <link rel="stylesheet" href="/css/flatly.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.css">
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>
    <script>
		$(document).ready(function () {
			$('dropdown-toggle').dropdown()
		});
    </script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Sistem Laboratorium</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav hidden-md hidden-lg hidden-sm">
                <li class="avatar">
                    <img class="avatar"
                         src="/images/<?= $gambar_profil ?>"/>
                    <span class="avatar-name">Hello, <?= $nama_lengkap ?></span>
                </li>
	            <?php if (isset($_SESSION['admin'])): ?>
                    <li><a href="/pengguna">Pengguna</a></li>
	            <?php endif; ?>
                <li><a class="sidebar-link" href="/jadwal">Jadwal</a></li>
                <li><a class="sidebar-link" href="/profil">Profil</a></li>
                <li><a class="sidebar-link" href="/logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>

</nav>
<div class="container-fluid dashboard">
    <div class="row dashboard-row">
        <div class="col-md-2 col-sm-2 col-xs-2 hidden-xs dashboard-menu">
            <ul class="nav nav-pills nav-stacked sidebar-nav">
                <li class="avatar">
                    <img class="avatar"
                         src="/images/<?= $gambar_profil ?>"/>
                    <span class="avatar-name">Hello, <?= $nama_lengkap ?></span>
                </li>
				<?php if (isset($_SESSION['admin'])): ?>
                    <li><a href="/pengguna">Pengguna</a></li>
				<?php endif; ?>
                <li><a class="sidebar-link" href="/jadwal">Jadwal</a></li>
                <li><a class="sidebar-link" href="/profil">Profil</a></li>
                <li><a class="sidebar-link" href="/logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="col-md-10 col-sm-10 col-xs-12 dashboard-main">