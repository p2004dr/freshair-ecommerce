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
	<link rel="stylesheet" href="./css/header.css">
	<link rel="stylesheet" href="./css/form-user.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<?php include_once(__DIR__ . '/controladors/show_navigation.php'); ?>

	<div id="layout">
	
	<header>
		<div class="welcome-header">
			<img src="/images/general/icon-user2.png" alt="User Icon" class="welcome-logo">
			<div class="welcome-header-text">
				<h1>El meu compte</h1>
			</div>
		</div>
		<div class="separator"></div>
	</header>
	<div class="user-info">
		<?php include_once(__DIR__ . '/controladors/account.php'); ?>
	</div>

	</div>
	<footer>
		<p>&copy; 2024 FreshAir</p>
		<a href="/others/index_backup.html" class="footer-link">Index Backup</a>
	</footer>
</body>

<script src="./js/cart.js"></script>
<script src="./js/account.js"></script>
</html>