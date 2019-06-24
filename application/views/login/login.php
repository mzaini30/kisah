<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
<?php endif ?>
<form method="post">
	<div class="form-group">
		<label for="">Username</label>
		<input type="text" class="form-control" name="username" required="">
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" required="">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Masuk">
	</div>
</form>