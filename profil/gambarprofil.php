<?php
include_once "./../Connection.php";
include_once "./../middleware/AuthOnly.php";
if (isset($_FILES['gambar_profil'])) {
	$errors    = array();
	$nis       = $_SESSION['NIS'];
	$image     = $_FILES['gambar_profil'];
	$file_name = md5($nis);
	$file_size = $image['size'];
	$file_tmp  = $image['tmp_name'];
	$file_type = $image['type'];
//	var_dump($image);


	$explode  = explode('/', $file_type);
	$file_ext = strtolower(end($explode));

	$extensions = array( "jpeg", "jpg", "png" );

	if ( ! in_array($file_ext, $extensions)) {
		$errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
	}

	if ($file_size > 2097152) {
		$errors[] = 'File size must be exactly 2 MB';
	}

	$fileFullName = $file_name . "." . $file_ext;

	if (empty($errors)) {
		move_uploaded_file($file_tmp, "./../images/" . $fileFullName);

		$sql = "UPDATE pengguna SET gambar_profil='{$fileFullName}' WHERE NIS='{$nis}'";
		if ($conn->query($sql)) {
			header('location: /profil');
		}
	}
}
include_once "./../template/header.php";
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 form-create">
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>"
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="gambar_profil">Gambar profil:</label>
                <input type="file" name="gambar_profil" class="form-control input-sm"
                       id="gambar_profil">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-sm">SIMPAN
                </button>
            </div>
        </form>
		<?php if ( ! empty($errors)): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <ul>
					<?php foreach ( $errors as $error ): ?>
                        <li><?= $error ?></li>
					<?php endforeach; ?>
                </ul>
            </div>
		<?php endif; ?>
    </div>

</div>
<?php
include_once "./../template/footer.php";
?>
