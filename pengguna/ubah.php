<?php
require_once "./../Connection.php";
include_once "./../middleware/AdminOnly.php";

if ( ! empty($_POST)) {
	$NIS     = trim($_POST['NIS']);
	$NIS_OLD = trim($_POST['NIS_OLD']);
	$nama    = ucwords(trim($_POST['nama']));
	$kelas   = trim($_POST['kelas']);
	$sql     = "UPDATE pengguna SET NIS='{$NIS}', nama='{$nama}', kelas='{$kelas}' WHERE NIS='{$NIS_OLD}'";
	if ($conn->query($sql)) {
		header('location: /pengguna');
	} else {
		header('location:' . $_SESSION['redirectBackUrl']);
	}
}

if ( ! empty($_GET['NIS'])) {
	$NIS                         = trim($_GET['NIS']);
	$_SESSION['redirectBackUrl'] = $_SERVER['REQUEST_URI'];

	$sql = "SELECT * FROM pengguna WHERE NIS='{$NIS}' LIMIT 1";
	if ($result = $conn->query($sql)) {
		$data = $result->fetch_assoc();
	}
}
include_once "./../template/header.php"
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 form-create">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" name="NIS_OLD"
                   value="<?php echo ( ! empty($data['NIS']) ) ? $data['NIS'] : ""; ?>">
            <div class="form-group">
                <label for="NIS">NIS:</label>
                <input type="text" name="NIS" class="form-control input-sm"
                       id="NIS"
                       value="<?php echo ( ! empty($data['NIS']) ) ? $data['NIS'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" name="nama" class="form-control input-sm"
                       id="nama"
                       value="<?php echo ( ! empty($data['nama']) ) ? $data['nama'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" class="form-control input-sm"
                       id="kelas"
                       value="<?php echo ( ! empty($data['kelas']) ) ? $data['kelas'] : ""; ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block btn-sm">UBAH</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "./../template/footer.php" ?>
