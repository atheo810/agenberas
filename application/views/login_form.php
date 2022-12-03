<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agen Beras</title>

    <!-- Custom fonts for this template-->
    <link href="bootstrap/asset/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>

	<div class="container">
		<h1>Login</h1>
		<p>Masuk ke Dashboard</p>

		<?php if($this->session->flashdata('message_login_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>

		<form action="" method="post" style="max-width: 600px;">
			<div>
				<label for="username">Email/Username*</label>
				<input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
					placeholder="Your username or email" value="<?= set_value('username') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('username') ?>
				</div>
			</div>
			<div>
				<label for="password">Password*</label>
				<input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
					placeholder="Enter your password" value="<?= set_value('password') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('password') ?>
				</div>
			</div>

			<div>
				<input type="submit" class="button button-primary" value="Login">
			</div>
		</form>
	</div>

    <!-- Bootstrap core JavaScript-->
    <script src="bootstrap/asset/jquery/jquery.min.js"></script>
    <script src="bootstrap/asset/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="bootstrap/asset/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="bootstrap/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="bootstrap/asset/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="bootstrap/js/demo/chart-area-demo.js"></script>
    <script src="bootstrap/js/demo/chart-pie-demo.js"></script>
</body>
</html>