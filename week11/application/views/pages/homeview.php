<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<?php echo $css ?>
	<?php echo $js ?>
</head>

<body>
	<?php echo $header ?>
	<div class="container">
		<div class="row">
			<h1>List Products</h1>
		</div>
		<div class="row text-right">
			<a href="<?php echo base_url('index.php/insert') ?>"><button class="btn btn-primary" type="button" name="button">Add Product</button></a>
		</div>
		<br>
		<table class="table" id="table">
			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Qty per Unit</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($product as $row): ?>
				<tr>
					<td>
						<?php echo $row['id_product'] ?>
					</td>
					<td>
						<?php echo $row['product_name'] ?>
					</td>
					<td>
						<?php echo $row['qty_per_unit'] ?>
					</td>
					<td>
						<?php echo $row['price'] ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $footer ?>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
	});
</script>

</html>
