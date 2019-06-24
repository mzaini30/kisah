<div class="panel panel-default">
	<div class="panel-heading">Akun</div>
	<div class="list-group">
		<?php if ($this->session->userdata('status') != 'login'): ?>
			<a href="<?= base_url() ?>daftar" class="list-group-item">Daftar</a>
			<a href="<?= base_url() ?>login" class="list-group-item">Masuk</a>
		<?php else: ?>
			<a href="<?= base_url() ?>keluar" class="list-group-item">Keluar</a>
		<?php endif ?>
	</div>
</div>
<?php if ($this->session->userdata('status') == 'login'): ?>
	<div class="panel panel-default">
		<div class="panel-heading">Kisah</div>
		<div class="list-group">
			<a href="#!" class="list-group-item">Buat Kisah</a>
			<a href="<?= base_url() ?>kisah/<?= $this->session->userdata('username') ?>" class="list-group-item">Kisah-ku</a>
		</div>
	</div>
<?php endif ?>