<?php
session_start();
require 'factory/coefficient.php';
require './dummy_data.php';
$coefficient = coefficientSingleton::getInstance();

if (isset($_GET['route'])) {
	if (file_exists($_GET['route'] . '.php')) {
		require $_GET['route'] . '.php';
	}
} else {
	require 'list.php';
}
?>
