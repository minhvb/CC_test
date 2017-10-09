<?php
if ($_POST) {
	if ($_POST['weight_coefficient']) {
		$coefficient->set_weight_coefficient($_POST['weight_coefficient']);
	}

	if ($_POST['dimension_coefficient']) {
		$coefficient->set_dimension_coefficient($_POST['dimension_coefficient']);
	}
}
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
	<h3>Set Coefficient</h3>
	<br>
	<table>
	  <tr>
	    <th>Coefficient</th>
	    <th>Value</th>
	    <th></th>
	  </tr>
	  <tr>
	    <td>Weight efficient</td>
	    <td><input type="text" name="weight_coefficient" value="<?php echo $coefficient->get_weight_coefficient(); ?>"></td>
	  </tr>
	  <tr>
	    <td>Dimension efficient</td>
	    <td><input type="text" name="dimension_coefficient" value="<?php echo $coefficient->get_dimension_coefficient(); ?>"></td>
	  </tr>
	  <tr>
	    <td><input type="button" value="SAVE"></td>
	    <td></td>
	  </tr>
	</table>
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