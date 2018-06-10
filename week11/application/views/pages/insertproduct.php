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
			<h1>Add Products</h1>
		</div>
		<div class="row text-right">
			<a href="<?php echo base_url('index.php/insert') ?>"><button class="btn btn-primary" type="button" name="button">Add Product</button></a>
		</div>
		<br>
	</div>
	<div class="container">
    <?php echo form_open('insert/insert_action'); ?>
  		<div class="form-group">
  			<label for="email">Product Name:</label>
  			<input type="text" class="form-control" id="pname" name="pname">
  		</div>
      <div class="form-group">
  			<label for="email">Supplier:</label>
  			<select class="form-control" name="psup">
          <?php foreach ($supplier as $row): ?>
            <option value="<?php echo $row['id_supplier'] ?>"><?php echo $row['supplier_name'] ?></option>
          <?php endforeach; ?>
  			</select>
  		</div>
      <div class="form-group">
  			<label for="email">Category:</label>
        <select class="form-control" name="pcat">
          <?php foreach ($category as $row): ?>
            <option value="<?php echo $row['id_category'] ?>"><?php echo $row['category_name'] ?></option>
          <?php endforeach; ?>
  			</select>
  		</div>
      <div class="form-group">
  			<label for="email">Quantity Per Unit:</label>
  			<input type="text" class="form-control" id="qtypu" name="qtypu">
  		</div>
      <div class="form-group">
  			<label for="email">Price:</label>
  			<input type="text" class="form-control" id="pprice" name="pprice">
  		</div>
  		<button type="submit" class="btn btn-default">Submit</button>
  	<?php echo form_close() ?>
	</div>

	<?php echo $footer ?>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
	});
</script>

</html>
