<div class="row">
	<div class="col-sm-9">
		<form method="post">
			<div class="form-group">
				<label for="">Judul Kisah</label>
				<input type="text" class="form-control" name="judul_kisah" required="">
			</div>
			<!-- gambar kisah -->
			<div class="form-group">
				<input type="submit" class="btn btn-success" value="Buat">
			</div>
		</form>
	</div>
	<div class="col-sm-3">
		<?php $this->load->view('include/sidebar.php') ?>
	</div>
</div>