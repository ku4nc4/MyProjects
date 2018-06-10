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
		<div class="row" style="height:10vh;">

		</div>
		<div class="row">
			<?php echo form_open_multipart('home/editprocess/'.$bukudata[0]['BookID']) ?>
      <div class="form-group">
				<label for="exampleInputEmail1">Book ID</label>
				<?php
				$data = array(
					'name' => 'bookid',
					'size' => '50',
					'class' => 'form-control',
          'value' => $bukudata[0]['BookID'],
          'disabled' => true
				);

				echo form_input($data);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Title</label>
				<?php
				$data = array(
					'name' => 'title',
					'size' => '50',
					'class' => 'form-control',
          'value' => $bukudata[0]['Title']
				);

				echo form_input($data);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Year</label>
				<?php
				$data = array(
					'name' => 'year',
					'size' => '4',
					'class' => 'form-control',
          'value' => $bukudata[0]['Year']
				);

				echo form_input($data);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Author</label>
				<?php
				$data = array(
					'name' => 'author',
					'size' => '50',
					'class' => 'form-control',
          'value' => $bukudata[0]['Author']
				);

				echo form_input($data);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Publisher</label>
				<?php
				$data = array(
					'name' => 'publisher',
					'size' => '50',
					'class' => 'form-control',
          'value' => $bukudata[0]['Publisher']
				);

				echo form_input($data);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputFile">File input</label>
				<?php
				$data = array(
					'name'=>'userfile',
					'class'=>'form-control-file'
				);
				echo form_upload($data);
				?>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			<?php echo form_close() ?>
		</div>
	</div>


	<?php echo $footer ?>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$('#tablebuku').DataTable();
});
</script>
</html>
