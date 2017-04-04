<?php
include_once "./../Connection.php";

$sql = "SELECT * FROM jadwal ORDER BY waktu DESC";

$result = $conn->query($sql);
include_once "./../template/header.php";
?>

    <div class="row">
        <div class="col-md-4">
            <h1 class="pull-left">Daftar Jadwal</h1>
        </div>
	    <?php if (isset($_SESSION['admin'])): ?>
            <div class="col-md-8">
                <a href="/jadwal/buat.php">
                    <button class="btn btn-primary btn-sm pull-right create-btn">Buat Jadwal
                    </button>
                </a>
            </div>
	    <?php endif; ?>
    </div>
    <table class="table table-bordered table-responsive">
        <tr>
            <td>No</td>
            <td>Subjek</td>
            <td>Ruang</td>
            <td>Kelas Peserta</td>
            <td>Tanggal dan Waktu</td>
			<?php
			if (isset($_SESSION['admin'])):
				if ($_SESSION['admin']):
					?>
                    <td>Tindakan</td>
					<?php
				endif;
			endif;
			?>
        </tr>
		<?php
		if ($result->num_rows > 0):
			$loop = 1;
			while ( $data = $result->fetch_assoc() ):
				?>
                <tr>
                    <td><?= $loop ?>.</td>
                    <td><?= $data['subjek'] ?></td>
                    <td><?= $data['ruang'] ?></td>
                    <td><?= $data['kelas_peserta'] ?></td>
                    <td><?= date("d/m/Y h:i", strtotime($data['waktu'])) ?></td>
					<?php
					if (isset($_SESSION['admin'])):
						if ($_SESSION['admin']):
							?>
                            <td>
                                <a href="/jadwal/ubah.php?id=<?= $data['id'] ?>">
                                    <span class="edit-icon glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="/jadwal/hapus.php?id=<?= $data['id'] ?>">
                                    <span class="delete-icon glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
							<?php
						endif;
					endif;
					?>
                </tr>
				<?php
				$loop ++;
			endwhile;
		else: ?>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
				<?php
				if (isset($_SESSION['admin'])):
					if ($_SESSION['admin']):
						?>
                        <td>-</td>
						<?php
					endif;
				endif;
				?>
            </tr>
		<?php endif; ?>
    </table>
<?php include_once "./../template/footer.php" ?>