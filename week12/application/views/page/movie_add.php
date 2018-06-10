<!DOCTYPE html>
<html>
<head>
	<title> Code Igniter MVC </title>
	<?php echo $style; ?>
</head>
<body>
	<?php echo $navbar; ?>
	<br/>
	<br/>
	<br/>
	<div class="container-fluid">
			<div style="border-bottom: 1px solid black;">
				<p style="text-align: center;"> 
					<font size="7" color="black"> Add Movie </font>
					<font size="5" color="rgb(127,127,127)"> WebDB Cinemaks </font> 
				</p>
			</div>
	</div>
	<div class="container" style="margin-top: 35px;">
		<?php if(isset($insert_error))
				echo "<h4 style='color: red;'>".$insert_error."</h4>";
		?>
		<?php echo form_open_multipart('MoviePage/AddMovie'); ?>
			<div class="form-group">
				<div class="row">
					<div class="col-md-1">
						<?php echo form_label('Title : ','titleMovie'); ?>
					</div>
					<div class="col-md-6">
						<?php
							$data = array(
								'type' => 'text',
								'class' => 'form-control',
								'name' => 'txtTitleMovie'
							);
							echo form_input($data);
							echo '<font size="2" color="red">' .form_error('txtTitleMovie') .'</font>';
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-1">
						<?php echo form_label('Year : ','yearMovie'); ?>
					</div>
					<div class="col-md-1">
						<?php
							$data = array(
								'type' => 'text',
								'class' => 'form-control',
								'name' => 'txtYearMovie'
							);
							echo form_input($data);
							echo '<font size="2" color="red">' .form_error('txtYearMovie') .'</font>';
						?>
					</div>
				</div>
			</div>	
			<div class="form-group">
				<div class="row">
					<div class="col-md-1">
						<?php echo form_label('Director : ','directorMovie'); ?>
					</div>
					<div class="col-md-6">
						<?php
							$data = array(
								'type' => 'text',
								'class' => 'form-control',
								'name' => 'txtDirectorMovie'
							);
							echo form_input($data);
							echo '<font size="2" color="red">' .form_error('txtDirectorMovie') .'</font>';
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-1">
						<?php echo form_label('Poster : ','posterMovie'); ?>
					</div>
					<div class="col-md-6">
						<?php
							$data = array(
								'type' => 'file',
								'class' => 'form-control',
								'name' => 'uploadPoster'
							);
							echo form_upload($data);
							echo '<font size="2" color="red">' .form_error('uploadPoster') .'</font>';
							if(isset($error))
								echo '<font size="2" color="red">' .$error .'</font>';
						?>
					</div>
				</div>
			</div>	
			<div class="form-group" style="margin-left: 97px;">
				<div class="row">
					<div class="col-md-12">
						<?php 
							$data = array(
								'name' => 'btnAddMovie',
								'class' => 'btn btn-primary'
							);
							echo form_submit($data,'Add Movie');
						?>
						<?php
							$data = array(
								'class' => 'btn btn-danger',
								'name' => 'btnCancel'
							);
							echo form_submit($data,'Cancel');
						?>
					</div>
				</div>
			</div>	
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>