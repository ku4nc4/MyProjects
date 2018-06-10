<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<?php echo $css ?>
	<?php echo $js ?>
</head>

<body>
	<?php echo $navbar ?>
	<div class="container">
		<div class="row text-right" style="height:7vh;">

		</div>
		<div class="row text-right container">
			<a href="<?php echo base_url('index.php/home/add') ?>"><button type="button" name="button" class="btn btn-primary">Add Buku</button></a>
		</div>
		<table class="table" id="tablebuku">
			<thead>
				<tr>
					<th></th>
					<th>Title</th>
					<th>Year</th>
					<th>Author</th>
					<th>Publisher</th>
					<th>Poster</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($bukus as $rowid=>$buku): ?>
					<tr>
						<td><?php echo $buku['BookID'] ?></td>
						<td><?php echo $buku['Title'] ?></td>
						<td><?php echo $buku['Year'] ?></td>
						<td><?php echo $buku['Author'] ?></td>
						<td><?php echo $buku['Publisher'] ?></td>
						<td><img src="<?php echo base_url($buku['PosterLink']) ?>" alt="" style="width:150px"> </td>
						<td>
							<a href="<?php echo base_url('index.php/home/view/'.$buku['BookID']) ?>"><button type="button" name="button" class="btn btn-primary">View</button></a>
							<a href="<?php echo base_url('index.php/home/edit/'.$buku['BookID']) ?>"><button type="button" name="button" class="btn btn-warning">Edit</button></a>
							<a href="<?php echo base_url('index.php/home/delete/'.$buku['BookID']) ?>"><button type="button" name="button" class="btn btn-danger">Delete</button></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $footer ?>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablebuku').DataTable();
	});
</script>
</html>
