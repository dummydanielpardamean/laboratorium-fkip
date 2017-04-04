<?php
include_once "./../Connection.php";
include_once "./../middleware/AdminOnly.php";

if ( ! empty($_GET['id'])) {
	$id  = $_GET['id'];
	$sql = "DELETE FROM jadwal WHERE id='{$id}'";
	if ($conn->query($sql)) {
		header("location:/jadwal");
	}
} else {
	header("location:/jadwal");
}