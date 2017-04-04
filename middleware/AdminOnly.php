<?php
$NIS    = $_SESSION['NIS'];
$sql    = "SELECT * FROM pengguna WHERE NIS='{$NIS}' AND admin='1'";
$result = $conn->query($sql);
if (!($result->num_rows > 0)) {
	header('location: /jadwal');
	die();
}