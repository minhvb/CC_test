<?php
$products = getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}
	</style>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post">
	<h3>Products</h3>
	<br>
	<table>
	  <tr>
	    <th>Name</th>
	    <th>Price</th>
	    <th>Weight</th>
	    <th>Width</th>
	    <th>Height</th>
	    <th>Depth</th>
	    <th></th>
	  </tr>
	  <?php foreach ($products as $key => $product): ?>
	  	<tr>
		    <td><?php echo $product['name']; ?></td>
		    <td><?php echo $product['amazon_price']; ?> $</td>
		    <td><?php echo $product['weight']; ?> kg</td>
		    <td><?php echo $product['width']; ?> m</td>
		    <td><?php echo $product['height']; ?> m</td>
		    <td><?php echo $product['depth']; ?> m</td>
		    <td><a href="index.php?route=detail&product_id=<?php echo $key; ?>">View Detail</a></td>
		</tr>
	  <?php endforeach ?>
	</table>
	<h3>Total Order: <?php echo isset($_SESSION['order']) ? $_SESSION['order'] : 0; ?>$</h3>
</form>
</body>
<script>
	$('input[type="button"]').click(function () {
		if(confirm('Do you really want to save ?')) {
			$('form').submit();
		} else {
			location.reload()
		}
	})
</script>
</html>