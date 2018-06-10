<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <?php echo $css ?>
  <?php echo $js ?>
</head>
<body>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <?php echo form_open('home/logincheck') ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign In</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pwd" id="pwd">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
  $("#myModal").modal('show');
});
</script>
</html>
