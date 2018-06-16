<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="card">
	<div class="card-header">

	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-10">
				<h2>BATAVIA INDO GLOBAL</h1>
			</div>
			<div class="col-md-2">
				<?= img($navbarlogo) ?>
			</div>

		</div>
	</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
	aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?= ($page == 0)?'active':''  ?>">
				<a class="nav-link" href="<?= base_url('index.php/welcome/index/') ?>">Our Company</a>
				<span class="sr-only">(current)</span>
			</li>
			<li class="nav-item <?= ($page == 1)?'active':''  ?>">
				<a class="nav-link" href="<?= base_url('index.php/welcome/index/capabilities') ?>">Capabilities</a>
				<span class="sr-only">(current)</span>
			</li>
			<li class="nav-item <?= ($page == 2)?'active':''  ?>">
				<a class="nav-link" href="<?= base_url('index.php/welcome/index/privatelabels') ?>">Private Labels</a>
				<span class="sr-only">(current)</span>
			</li>
			<li class="nav-item <?= ($page == 3)?'active':''  ?>">
				<a class="nav-link" href="<?= base_url('index.php/welcome/index/products') ?>">Products</a>
				<span class="sr-only">(current)</span>
			</li>
			<li class="nav-item <?= ($page == 4)?'active':''  ?>">
				<a class="nav-link" href="">Strategic Partners</a>
				<span class="sr-only">(current)</span>
			</li>
			<li class="nav-item <?= ($page == 5)?'active':''  ?>">
				<a class="nav-link" href="">Contact Us</a>
				<span class="sr-only">(current)</span>
			</li>
		</ul>
	</div>
</nav>
