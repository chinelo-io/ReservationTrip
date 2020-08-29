<?php
	session_start();
	if (!isset($_SESSION['user_id']) && !isset($_SESSION['value_role'])) {
		if($_SESSION['user_id'] == 'ROLE_ADMIN'){
			header("Location: ./admin/index.php");
		}else{
			header("Location: ./user/index.php");
		}
		exit();
	}
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title>Admetro | Login</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="assets/css/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>

<body>
	<!-- BEGIN #app -->
	<div id="app" class="app app-full-height app-without-header">
		<!-- BEGIN login -->
		<div class="login">
			<!-- BEGIN login-cover -->
			<div class="login-cover"></div>
			<!-- END login-cover -->
			<!-- BEGIN login-content -->
			<div class="login-content">
				<!-- BEGIN login-brand -->
				<div class="login-brand">
					<a href="#"><b>Reservación de Viajes</b></a>
				</div>
				<!-- END login-brand -->
				<h3 class="m-b-20"><span>Iniciar Sesión</span></h3>
				<!-- BEGIN login-desc -->
				<div class="login-desc m-b-30">
					Para utilizar el sistema es necesario inciar sesión.
				</div>
				<!-- END login-desc -->
				<!-- BEGIN login-form -->
				<form id="login_form" name="login_form">
					<input type="hidden" value="1" name="opt" id="id" />
					<div class="form-group">
						<label>Email <span class="text-danger">*</span></label>
						<input type="text" class="form-control" value="" name="email" id="email" />
					</div>
					<div class="form-group">
						<label>Contraseña <span class="text-danger">*</span></label>
						<input type="password" class="form-control" value="" name="password" id="password" />
					</div>
					<div class="d-flex align-items-center">
						<button id="btnLogin" type="button" class="btn btn-primary width-150 btn-rounded">Entrar</button>
						<a href="#" class="m-l-10">Restablecer Contraseña</a>
					</div>
				</form>
				<!-- END login-form -->
				<div class="login-desc m-t-30">
					Para registrarte, contacta al administrador. <a href="https://www.chinelo.io">¡Contactar!</a>
				</div>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login -->

		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #app -->


	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"> </script>
	<script src="assets/js/validate/login.js"></script>
	<script src="assets/js/app/login.js"></script>
	<script src="assets/js/notify/notify.js"></script>
</body>

</html>