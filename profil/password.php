<?php
include_once "./../Connection.php";

if ( ! empty($_POST)) {
	if ($_POST['password_baru'] == "" || $_POST['password_lama'] == ""){
		header("location: /profil/password.php");
		die();
	}
	$nis = $_SESSION['NIS'];
	$password_lama = md5(trim($_POST['password_lama']));
	$password_baru = md5(trim($_POST['password_baru']));

	$sql = "SELECT * FROM pengguna WHERE NIS='{$nis}' AND password='{$password_lama}'";

	if ($conn->query($sql)->num_rows > 0) {
		$sql = "UPDATE pengguna set password='{$password_baru}' WHERE NIS='{$nis}'";
		if ($conn->query($sql)) {
			header('location: /profil');
		} else {
			header('location: /profil/password.php');
		}
	} else {
		header('location: /profil/password.php');
	}
}

include_once "./../template/header.php";
include_once "./../middleware/AuthOnly.php";
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 form-create">
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="password_lama">Password lama:</label>
                <input type="password" name="password_lama" class="form-control input-sm"
                       id="password_lama">
            </div>
            <div class="form-group">
                <label for="password_baru">Password baru:</label>
                <input type="password" name="password_baru" class="form-control input-sm"
                       id="password_baru">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-sm">SIMPAN
                </button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "./../template/footer.php";
?>
