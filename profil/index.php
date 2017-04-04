<?php
include_once "./../Connection.php";
include_once "./../middleware/AuthOnly.php";

$NIS = $_SESSION['NIS'];
$sql = "SELECT * FROM pengguna WHERE NIS='{$NIS}'";
$result = $conn->query($sql)->fetch_assoc();

include_once "./../template/header.php";
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="row profil-container">
            <div class="col-md-12">
                <h3 class="text-center">INFO PROFIL</h3>
                <p class="text-center">
                    <img class="avatar avatar-100" src="/images/<?= $result['gambar_profil'] ?>">
                </p>
                <p class="text-center"><?= $result['nama'] ?></p>
                <p class="text-center"><?= $result['kelas'] ?></p>
                <hr>
                <div class="row">
                    <h5 class="text-center">
                        Edit :
                    </h5>
                    <p class="text-center">
                        <a href="/profil/infoprofil.php">
                            <button class="btn btn-warning btn-xs">Info Profil
                            </button>
                        </a>
                        <a href="/profil/password.php">
                            <button class="btn btn-warning btn-xs">Password</button>
                        </a>
                        <a href="/profil/gambarprofil.php">
                            <button class="btn btn-warning btn-xs">Gambar Profil</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "./../template/footer.php";
?>
