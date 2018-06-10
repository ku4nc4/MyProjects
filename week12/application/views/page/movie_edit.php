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
					<font size="7" color="black"> Edit Movie </font>
					<font size="5" color="rgb(127,127,127)"> WebDB Cinemaks </font> 
				</p>
			</div>
	</div>
	<div class="container" style="margin-top: 35px;">
		<?php if(isset($update_error))
				echo "<h4 style='color: red;'>".$update_error."</h4>";
		?>
		
		<?php 
			
			if(isset($detail_movie)){ 
				foreach($detail_movie as $row){

					echo form_open_multipart('MoviePage/EditMovie/'.$row['MovieID']);
		?>

			<div class="form-group">
				<div class="row">
					<div class="col-md-1">
						<?php echo form_label('Movie ID : ','idMovie'); ?>
					</div>
					<div class="col-md-6">
						<?php
							$id = array(
								'type' => 'text',
								'class' => 'form-control',
								'value' => $row['MovieID'],
								'readonly' => 'true'
							);
							echo form_input($id);
						?>
						<input type="hidden" name="txtMovieID" value="<?php echo $row['MovieID']; ?>">
					</div>
				</div>
			</div>
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
								'name' => 'txtTitleMovie',
								'value' => $row['Title']
							);
							echo form_input($data).' <font size="2" color="red">' .form_error('txtTitleMovie') .'</font>';
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
								'name' => 'txtYearMovie',
								'value' => $row['Year']
							);
							echo form_input($data).' <font size="2" color="red">' .form_error('txtYearMovie') .'</font>';
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
								'name' => 'txtDirectorMovie',
								'value' => $row['Director']
							);
							echo form_input($data).' <font size="2" color="red">' .form_error('txtDirectorMovie') .'</font>';
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
						<label class="btn btn-primary">
							<img src="<?php echo base_url($row['PosterLink']); ?>" width="400" height="250">
							<span class="glyphicon glyphicon-edit"></span>
							<input type="file" name="uploadPoster" style="display: none;">
						</label>
					</div>
					<?php echo '<font size="2" color="red">' .form_error('uploadPoster') .'</font>'; 
						if(isset($error))
								echo '<font size="2" color="red">' .$error .'</font>';
					?>
				</div>
			</div>	
			<div class="form-group" style="margin-left: 97px;">
				<div class="row">
					<div class="col-md-12">
						<?php 
							$data = array(
								'name' => 'btnEditMovie',
								'class' => 'btn btn-primary'
							);
							echo form_submit($data,'Edit Movie');
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

		<?php }} ?>
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>