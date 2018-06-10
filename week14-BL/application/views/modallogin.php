<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
		<?php echo form_open('home/login') ?>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Masukan Password</h4>
      </div>
      <div class="modal-body">
        <input type="password" class="form-control" name="pass" value="" placeholder="Password">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Login</button>
      </div>
    </div>
		<?php echo form_close() ?>
  </div>
</div>
<script type="text/javascript">
  $('#myModal').modal({
    backdrop: 'static',
    keyboard: 'false',
    show: true
  })
</script>
