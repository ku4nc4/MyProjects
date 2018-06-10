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
		<div class="row text-center">
		  <h1><?php echo $bukudata[0]['Title'] ?> <span style="font-size:15px;color:green">book detail</span></h1>
		</div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <p>Published Year : <?php echo $bukudata[0]['Year'] ?></p>
        <p>Publisher : <?php echo $bukudata[0]['Publisher'] ?></p>
        <p>Author : <?php echo $bukudata[0]['Author'] ?></p>
      </div>
      <div class="col-md-6">
        <img src="<?php echo base_url($bukudata[0]['PosterLink']) ?>" alt="" style="height:40vh">
      </div>
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
