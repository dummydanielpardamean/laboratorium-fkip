<?php
include_once "./../Connection.php";
include_once "./../middleware/AdminOnly.php";

if ( ! empty($_GET['NIS'])) {
	$NIS = $_GET['NIS'];
	$sql = "DELETE FROM pengguna WHERE NIS='{$NIS}'";
	if ($conn->query($sql)) {
		header("location:/pengguna");
	}else{
		echo "Terjadi kesalahan pada penghapusan data";
	}
} else {
	header("location:/pengguna");
}