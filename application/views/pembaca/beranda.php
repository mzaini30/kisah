<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
<?php endif ?>
<div class="row">
	<div class="col-sm-9"></div>
	<div class="col-sm-3">
		<?php $this->load->view('include/sidebar.php') ?>
	</div>
</div>