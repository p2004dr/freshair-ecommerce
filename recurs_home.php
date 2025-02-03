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
	<link rel="stylesheet" href="./css/product.css">
	<link rel="stylesheet" href="./css/header.css">
	<link rel="stylesheet" href="./css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<?php include_once(__DIR__ . '/controladors/show_navigation.php'); ?>

	<div id="layout">
		
		<header>
			<div class="welcome-header">
				<img src="/images/general/logo.png" alt="FreshAir Logo" class="welcome-logo">
				<div class="welcome-header-text">
					<h1>FreshAir</h1>
					<p>Refresca't amb estil i confort!</p>
				</div>
			</div>
			<div class="separator"></div>
		</header>
		

		<section id="category-section">
			
			<?php include_once(__DIR__ . '/controladors/list_categories.php'); ?>

		</section>

        <section id="products-section" class="hidden">
			
		</section>
		
        <section id="product-section" class="hidden">
			
		</section>

	</div>
	<footer>
		<p>&copy; 2024 FreshAir</p>
		<a href="./others/index_backup.html" class="footer-link">Index Backup</a>
	</footer>

	<script src="./js/home.js"></script>
    <script src="./js/cart.js"></script>
</body>

</html>
