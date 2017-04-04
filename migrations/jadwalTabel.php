<?php
include_once "./../Connection.php";

$sql = "CREATE TABLE jadwal (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    subjek varchar(255) NOT NULL ,
    ruang VARCHAR (255) NOT NULL,
    kelas_peserta VARCHAR (255) NOT NULL,
    waktu DATETIME NOT NULL 
)";

if ($conn->query($sql) === true) {
	echo "Table jadwal created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

$conn->close();