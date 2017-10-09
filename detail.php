<?php
require 'factory/productFactory.php';

if (isset($_GET['product_id'])) {
	$product = ProductFactory::init($_GET['product_id']);
}
if ($_POST) {
	$_SESSION['order'] = (isset($_SESSION['order']) ? $_SESSION['order'] : 0) + $_POST['price'];
	echo $_SESSION['order'];die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		tr, td {
			border: solid 1px;
		}
	</style>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>
<body>
	<table>
		<tr>
			<td>Name</td>
			<td><?php echo $product->get_name(); ?></td>
		</tr>
		<tr>
			<td>Amazon Price</td>
			<td><?php echo $product->get_amazon_price(); ?> $</td>
		</tr>
		<tr>
			<td>Weight</td>
			<td><?php echo $product->get_weight(); ?> m</td>
		</tr>
		<tr>
			<td>Width</td>
			<td><?php echo $product->get_width(); ?> m</td>
		</tr>
		<tr>
			<td>Height</td>
			<td><?php echo $product->get_height(); ?> m</td>
		</tr>
		<tr>
			<td>Depth</td>
			<td><?php echo $product->get_depth(); ?> m</td>
		</tr>
		<tr>
			<td>Fee by Weight</td>
			<td><?php echo $product->get_fee(); ?> $</td>
		</tr>
		<tr>
			<td>Fee by Dimension</td>
			<td><?php echo $product->get_fee('dimension'); ?> $</td>
		</tr>
		<tr>
			<td>Total price</td>
			<td><?php echo $product->getGrossPrice(); ?> $</td>
		</tr>
	</table>
	<input type="hidden" name="total_price" value="<?php echo $product->getGrossPrice(); ?>">
	<button>Add Product</button>
	<h3 id="total">Total Order: <?php echo isset($_SESSION['order']) ? $_SESSION['order'] : 0; ?>$</h3>
	<h3><a href="index.php">Return Home</a></h3>
</body>
<script>
	$('button').click(function () {
		$.ajax({
	        url:  'index.php?route=detail&product_id=0',
	        type: 'POST',
	        datatype: 'json',
	        data: {price: $('input[name="total_price"]').val()},
	        success: function (data) {
	            $('#total').html('Total Order: ' + data + '$')
	        }
	    })
	})
</script>
</html>