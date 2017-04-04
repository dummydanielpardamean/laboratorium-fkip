<?php
include_once "./../Connection.php";
include_once "./../middleware/AdminOnly.php";
$nis = $_SESSION['NIS'];
$sql = "SELECT * FROM pengguna where NIS!='{$nis}'";

$result = $conn->query($sql);
include_once "./../template/header.php";
?>

    <div class="row">
        <div class="col-md-4">
            <h1 class="pull-left">Daftar Pengguna</h1>
        </div>
        <div class="col-md-8">
            <a href="/pengguna/buat.php">
                <button class="btn btn-primary btn-sm pull-right create-btn">Buat
                    Pengguna
                </button>
            </a>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama Lengkap</td>
            <td>Kelas</td>
            <td>Tindakan</td>
        </tr>
		<?php
		if ($result->num_rows > 0):
			$loop = 1;
			while ( $data = $result->fetch_assoc() ):
				?>
                <tr>
                    <td><?= $loop ?>.</td>
                    <td><?= $data['NIS'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['kelas'] ?></td>
                    <td>
                        <a href="/pengguna/ubah.php?NIS=<?= $data['NIS'] ?>">
                            <span class="edit-icon glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="/pengguna/hapus.php?NIS=<?= $data['NIS'] ?>">
                            <span class="delete-icon glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
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
            </tr>
		<?php endif; ?>
    </table>
<?php include_once "./../template/footer.php" ?>