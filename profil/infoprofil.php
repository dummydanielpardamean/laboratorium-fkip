<?php
include_once "./../Connection.php";
include_once "./../middleware/AuthOnly.php";

if (!empty($_POST)){
    $nis = $_SESSION['NIS'];
    $nama = ucwords(trim($_POST['nama']));
    $kelas = trim($_POST['kelas']);

    $sql = "UPDATE pengguna SET nama='{$nama}', kelas='{$kelas}' WHERE NIS='{$nis}'";
    if ($conn->query($sql)){
        header("location: /profil");
    }else{
        header("location: /profil/infoprofil.php");
    }
}

$nis    = $_SESSION['NIS'];
$sql    = "select * from pengguna where NIS='{$nis}'";
$result = $conn->query($sql);
if ($result) {
	$data = $result->fetch_assoc();
}
include_once "./../template/header.php";
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 form-create">
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" name="nama" class="form-control input-sm"
                       id="nama"
                       value="<?php echo ( ! empty($data['nama']) ) ? $data['nama'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <select class="form-control input-sm" name="kelas" id="kelas">
                    <option value="X-A" <?php echo ( $data['kelas'] == "X-A" ) ? "selected" : ""; ?>>
                        X-A
                    </option>
                    <option value="X-B" <?php echo ( $data['kelas'] == "X-B" ) ? "selected" : ""; ?>>
                        X-B
                    </option>
                    <option value="X-C" <?php echo ( $data['kelas'] == "X-C" ) ? "selected" : ""; ?>>
                        X-C
                    </option>
                    <option value="XI-A" <?php echo ( $data['kelas'] == "XI-A" ) ? "selected" : ""; ?>>
                        XI-A
                    </option>
                    <option value="XI-B" <?php echo ( $data['kelas'] == "XI-B" ) ? "selected" : ""; ?>>
                        XI-B
                    </option>
                    <option value="XI-C" <?php echo ( $data['kelas'] == "XI-C" ) ? "selected" : ""; ?>>
                        XI-C
                    </option>
                    <option value="XII-A" <?php echo ( $data['kelas'] == "XII-A" ) ? "selected" : ""; ?>>
                        XII-A
                    </option>
                    <option value="XII-B" <?php echo ( $data['kelas'] == "XII-B" ) ? "selected" : ""; ?>>
                        XII-B
                    </option>
                    <option value="XII-C" <?php echo ( $data['kelas'] == "XII-C" ) ? "selected" : ""; ?>>
                        XII-C
                    </option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-sm">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "./../template/footer.php";
?>
