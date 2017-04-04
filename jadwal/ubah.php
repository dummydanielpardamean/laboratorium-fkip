<?php
require_once "./../Connection.php";
include_once "./../middleware/AdminOnly.php";

if ( ! empty($_POST)) {
	$id     = $_POST['id'];
	$subjek = $_POST['subjek'];
	$ruang  = $_POST['ruang'];
	$kelas  = $_POST['kelas'];
	$waktu  = date("Y-m-d G:i:s", strtotime($_POST['waktu']));
	$sql    = "UPDATE jadwal SET subjek='{$subjek}', ruang='{$ruang}', kelas_peserta='{$kelas}', waktu='{$waktu}' WHERE id='{$id}'";
	if ($conn->query($sql)) {
		header('location:/jadwal');
	} else {
		header('location:' . $_SESSION['redirectBackUrl']);
	}
}

if ( ! empty($_GET['id'])) {
	$_SESSION['redirectBackUrl'] = $_SERVER['REQUEST_URI'];
	$id                          = $_GET['id'];

	$sql = "SELECT * FROM jadwal WHERE id='{$id}' LIMIT 1";
	if ($result = $conn->query($sql)) {
		$data = $result->fetch_assoc();
	}
}


include_once "./../template/header.php"
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 form-create">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" name="id"
                   value="<?php echo ( ! empty($data['id']) ) ? $data['id'] : ""; ?>">
            <div class="form-group">
                <label for="subjek">Subjek:</label>
                <input type="text" name="subjek" class="form-control input-sm"
                       id="subjek"
                       value="<?php echo ( ! empty($data['subjek']) ) ? $data['subjek'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="ruang">Ruang:</label>
                <select class="form-control input-sm" name="ruang" id="ruang">
                    <option value="Lab Komputer"
                        <?php echo ( $data['ruang'] == "Lab Komputer" ) ? "selected" : ""; ?>>Lab Komputer</option>
                    <option value="Lab IPA Fisika"
                        <?php echo ( $data['ruang'] == "Lab IPA Fisika" ) ? "selected" : ""; ?>>Lab IPA Fisika</option>
                    <option value="Lab IPA Kimia"
                        <?php echo ( $data['ruang'] == "Lab IPA Kimia" ) ? "selected" : ""; ?>>Lab IPA Kimia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <select class="form-control input-sm" name="kelas" id="kelas">
                    <option value="X-A" <?php echo ( $data['kelas_peserta'] == "X-A" ) ? "selected" : ""; ?>>X-A</option>
                    <option value="X-B" <?php echo ( $data['kelas_peserta'] == "X-B" ) ? "selected" : ""; ?>>X-B</option>
                    <option value="X-C" <?php echo ( $data['kelas_peserta'] == "X-C" ) ? "selected" : ""; ?>>X-C</option>
                    <option value="XI-A" <?php echo ( $data['kelas_peserta'] == "XI-A" ) ? "selected" : ""; ?>>XI-A</option>
                    <option value="XI-B" <?php echo ( $data['kelas_peserta'] == "XI-B" ) ? "selected" : ""; ?>>XI-B</option>
                    <option value="XI-C" <?php echo ( $data['kelas_peserta'] == "XI-C" ) ? "selected" : ""; ?>>XI-C</option>
                    <option value="XII-A" <?php echo ( $data['kelas_peserta'] == "XII-A" ) ? "selected" : ""; ?>>XII-A</option>
                    <option value="XII-B" <?php echo ( $data['kelas_peserta'] == "XII-B" ) ? "selected" : ""; ?>>XII-B</option>
                    <option value="XII-C" <?php echo ( $data['kelas_peserta'] == "XII-C" ) ? "selected" : ""; ?>>XII-C</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class='col-sm-12'>
                        <label for="datetimepicker">Waktu:</label>
                        <input type='text' name="waktu" class="form-control input-sm"
                               id='datetimepicker'
                               value="<?php echo ( ! empty($data['waktu']) ) ? date("m/d/Y g:i A", strtotime($data['waktu'])) : ""; ?>"/>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
				$(function () {
					$('#datetimepicker').datetimepicker();
				});
            </script>
            <div class="form-group">
                <button class="btn btn-primary btn-block btn-sm">UBAH</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "./../template/footer.php" ?>
