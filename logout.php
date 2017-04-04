<?php
include_once "./Connection.php";

session_destroy();
header("location: /");