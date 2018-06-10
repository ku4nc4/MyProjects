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
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome, <?php echo $admin_name ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('home/logout') ?>">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <table class="table" id="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Nomor Induk Dosen</th>
          <th>Email</th>
          <th>Foto</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dosendetailrow as $rowdosen): ?>
          <tr>
            <td><?php echo $rowdosen['fname_dosen']." ".$rowdosen['lname_dosen'] ?></td>
            <td><?php echo $rowdosen['nomorinduk_dosen'] ?></td>
            <td><?php echo $rowdosen['email_dosen'] ?></td>
            <td><img src="<?php echo base_url($rowdosen['foto_dosen']) ?>" alt="Foto Dosen <?php echo $rowdosen['fname_dosen']." ".$rowdosen['lname_dosen'] ?>"></td>
            <?php echo form_open('home/deleterowdosen') ?>
            <input type="hidden" name="dosenid" value="<?php echo $rowdosen['id_dosen'] ?>">
            <td><button type="submit" name="button" class="btn btn-primary">X</button></td>
            <?php echo form_close() ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
  </html>
