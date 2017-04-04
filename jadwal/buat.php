<?php
require_once "./../Connection.php";
include_once "./../middleware/AdminOnly.php";


if ( ! empty($_POST)) {
	$subjek = trim($_POST['subjek']);
	$ruang  = trim($_POST['ruang']);
	$kelas  = trim(strtoupper($_POST['kelas']));
	$waktu  = date("Y-m-d G:i:s", strtotime($_POST['waktu']));
	$sql    = "INSERT INTO jadwal (subjek, ruang, kelas_peserta, waktu) VALUES ('{$subjek}', '{$ruang}', '{$kelas}', '{$waktu}')";
	if ($conn->query($sql)) {
		header('location: /jadwal');
	} else {
		echo "Jadwal tidak berhasil di buat";
	}
}
include_once "./../template/header.php";
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 form-create">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="subjek">Subjek:</label>
                <input type="text" name="subjek" class="form-control input-sm"
                       id="subjek">
            </div>
            <div class="form-group">
                <label for="ruang">Ruang:</label>
                <select class="form-control input-sm" name="ruang" id="ruang">
                    <option value="Lab Komputer">Lab Komputer</option>
                    <option value="Lab IPA Fisika">Lab IPA Fisika</option>
                    <option value="Lab IPA Kimia">Lab IPA Kimia</option>
                </select>
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
                <div class="row">
                    <div class='col-sm-12'>
                        <label for="datetimepicker">Waktu:</label>
                        <input type='text' name="waktu" class="form-control input-sm"
                               id='datetimepicker'/>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
				$(function () {
					$('#datetimepicker').datetimepicker();
				});
            </script>
            <div class="form-group">
                <button class="btn btn-primary btn-block btn-sm">BUAT</button>
            </div>
        </form>
    </div>
</div>

<?php include_once "./../template/footer.php" ?>
