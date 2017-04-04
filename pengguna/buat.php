<?php
require_once "./../Connection.php";
include_once "./../middleware/AdminOnly.php";


if ( ! empty($_POST)) {
	$NIS          = trim($_POST['NIS']);
	$nama_lengkap = ucwords(trim($_POST['nama_lengkap']));
	$password     = md5(trim($_POST['password']));
	$kelas        = trim(strtoupper($_POST['kelas']));
	$sql          = "INSERT INTO pengguna (NIS, nama, password, kelas) VALUES ('{$NIS}', '{$nama_lengkap}', '{$password}', '{$kelas}')";
	if ($conn->query($sql)) {
		header("location: /pengguna");
	} else {
		echo "Pengguna tidak berhasil di buat";
	}
}
include_once "./../template/header.php";
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 form-create">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="NIS">NIS:</label>
                <input type="text" name="NIS" class="form-control input-sm"
                       id="NIS">
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" class="form-control input-sm"
                       id="nama_lengkap">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control input-sm"
                       id="password">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <select class="form-control input-sm" name="kelas" id="kelas">
                    <option value="X-A">X-A</option>
                    <option value="X-B">X-B</option>
                    <option value="X-C">X-C</option>
                    <option value="XI-A">XI-A</option>
                    <option value="XI-B">XI-B</option>
                    <option value="XI-C">XI-C</option>
                    <option value="XII-A">XII-A</option>
                    <option value="XII-B">XII-B</option>
                    <option value="XII-C">XII-C</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block btn-sm">BUAT</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "./../template/footer.php" ?>
