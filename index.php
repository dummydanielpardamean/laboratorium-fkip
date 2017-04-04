<?php
include_once "./Connection.php";

$errors = array();

if (isset($_SESSION['NIS'])) {
	header('location: /pengguna');
}


if ( ! empty($_POST)) {

	if (empty($_POST['NIS'])) {
		$errors[] = "NIS harus diisi";
	}

	if (empty($_POST['password'])) {
		$errors[] = "Password harus diisi";
	}

	$NIS      = trim($_POST['NIS']);
	$password = md5(trim($_POST['password']));
	$sql      = "SELECT * FROM pengguna WHERE NIS='{$NIS}' AND password='{$password}'";
	$result   = $conn->query($sql);


	if ($result->num_rows > 0) {
		$row             = $result->fetch_assoc();
		$_SESSION['NIS'] = $row['NIS'];
		if ($row['admin'] == 1) {
			$_SESSION['admin'] = true;
		}
		header('location: /jadwal');
	}else{
	    $errors[] = "NIS dan Password yang dimassukan tidak cocok";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page - Sistem Laboratorium</title>
    <link rel="stylesheet" href="/css/flatly.css">
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("./images/background_login.jpg");
            background-repeat: no-repeat;
            height: 100%;
            width: 100%;
            position: fixed;
        }

        div.login-form-container {
            margin-top: 200px;
        }

        form.login-form {
            background: #2196f3;
            padding: 15px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" style="padding-bottom: 400px">
        <div class="col-md-4 col-md-offset-4 login-form-container">
            <form class="login-form" method="POST"
                  action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <h2 class="text-center" style="color: #fff">Sistem Laboratorium</h2>
                <div class="form-group">
                    <label for="username-field">NIS:</label>
                    <input type="text" name="NIS" class="form-control input-sm"
                           id="username-field">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control input-sm"
                           id="pwd">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block btn-sm">LOGIN</button>
                </div>
            </form>
            <br>
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
</div>
</body>
</html>
