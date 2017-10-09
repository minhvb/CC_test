<?php
include('product.php');
class ProductFactory {
	public static function init ($product_id) {
		return new Product($product_id);
	}
}

?>