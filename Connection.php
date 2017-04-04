<?php
session_start();
$_ServerName   = "localhost";
$_Username     = "root";
$_Password     = "root";
$_DatabaseName = "labor";

// Create connection
$conn = new mysqli($_ServerName, $_Username, $_Password, $_DatabaseName);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}