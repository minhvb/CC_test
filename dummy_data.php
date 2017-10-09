<?php
$products = [
	array(
		'name' => 'Product 1',
		'amazon_price' => 1000,
		'weight' => 10,
		'width' => 50,
		'height' => 70,
		'depth' => 20
	),
	array(
		'name' => 'Product 2',
		'amazon_price' => 1000,
		'weight' => 15,
		'width' => 50,
		'height' => 70,
		'depth' => 20
	),
	array(
		'name' => 'Product 3',
		'amazon_price' => 1000,
		'weight' => 5,
		'width' => 50,
		'height' => 70,
		'depth' => 20
	),
];

function getProduct ($product_id) {
	global $products;
	return isset($products[$product_id]) ? $products[$product_id] : array() ;
}

function getProducts () {
	global $products;
	return $products;
}

?>