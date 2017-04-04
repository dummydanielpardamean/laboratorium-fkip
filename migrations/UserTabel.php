<?php
include_once "./../Connection.php";

$sql = "CREATE TABLE pengguna (
    NIS VARCHAR (255) PRIMARY KEY NOT NULL ,
    password varchar(255) NOT NULL ,
    nama VARCHAR (255) NOT NULL,
    kelas VARCHAR (255) NOT NULL,
    gambar_profil VARCHAR (255) NOT NULL,
    admin boolean DEFAULT 0
)";

if ($conn->query($sql) === true) {
	echo "Table pengguna created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

$conn->close();