<?php
if (empty($_SESSION['NIS'])) {
	header("location: /");
	die();
}