<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <?php echo $css ?>
  <?php echo $js ?>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Univesitas Programming</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Dosen</a></li>
        <li><a href="#">Mahasiswa</a></li>
        <?php if ($this->session->has_userdata('login')): ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome, <?php echo $admin_name ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('home/logout') ?>">Logout</a></li>
            </ul>
          </li>
          <?php endif; ?>

        </ul>
      </div>
    </nav>
    <h1>Maaf Halaman tidak ditemukan</h1>
  </body>
  </html>
