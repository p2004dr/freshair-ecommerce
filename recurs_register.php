<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> FreshAir </title>
	<link rel="icon" href="./images/general/logo.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="./css/navigation.css">
	<link rel="stylesheet" href="./css/category.css">
	<link rel="stylesheet" href="./css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<?php include_once(__DIR__ . '/controladors/show_navigation.php'); ?>

	<section class="form">
		<div class="form-container">
			<h1>Registrar-se</h1>
			<form id="register-form">
				<div class="form-columns">
					<div class="form-left">
						<input type="text" name="user" id="user" placeholder="Nom d'usuari">
						<input type="text" name="email" id="email" placeholder="Correu electrònic">
						<input type="password" name="password" id="password" placeholder="Contrasenya">
						<input type="password" name="confirmPassword" id="confirm-password" placeholder="Confirmar Contrasenya">
						<p class="error-reg hidden">Error a l'iniciar sessió.</p>
					</div>
					<div class="form-right">
						<input type="text" name="population" id="population" placeholder="Població">
						<input type="text" name="zipCode" id="zipCode" placeholder="Codi Postal">
						<input type="text" name="adress" id="adress" placeholder="Adreça">
					</div>
				</div>
				<button type="submit" class="form-button">Registra't</button>
			</form>
			<p>Ja tens un compte? - <a class="link" onclick="toggleLoginModal()">Inicia Sessió</a></p>
		</div>
	</section>

	<footer>
		<p>&copy; 2024 FreshAir</p>
		<a href="/others/index_backup.html" class="footer-link">Index Backup</a>
	</footer>

	<script src="./js/register.js"></script>
</body>

</html>