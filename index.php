<?php
	session_start();

	$accio = $_GET['accio'] ?? NULL;

	switch($accio)
	{
		case 'register':
			include __DIR__.'/recurs_register.php';
			break;
		case 'shop-cart':
			include __DIR__.'/recurs_cart.php';
			break;
		case 'shop-cart':
			include __DIR__.'/recurs_cart.php';
			break;
		case 'account':
			include __DIR__.'/recurs_account.php';
			break;
		case 'orders':
			include __DIR__.'/recurs_orders.php';
			break;
		case 'confirm':
			include __DIR__.'/recurs_confirmacio.php';
			break;
		default:
			include __DIR__.'/recurs_home.php';
			break;
	}