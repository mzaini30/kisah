<div class="row">
	<div class="col-sm-9">
		<div class="isi-kisah">
			<?php foreach($data as $d): ?>
				<div class="panel panel-default list-kisah">
					<div class="panel-heading"><?= $d->judul_kisah ?></div>
					<div class="panel-body">
						<img src="<?= base_url() ?>index.php/img/<?= $d->gambar_kisah ?>?w=300&h=400">
					</div>
					<div class="panel-footer">
						<div class="waktu waktu-<?= $d->id ?>"></div>
						<script type="text/javascript">
							$('.waktu-<?= $d->id ?>').html(moment('<?= $d->waktu_dibuat ?>').fromNow())
							setInterval(function(){
								$('.waktu-<?= $d->id ?>').html(moment('<?= $d->waktu_dibuat ?>').fromNow())
							}, 60000)
						</script>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<br>
	</div>
	<div class="col-sm-3">
		<?php $this->load->view('include/sidebar.php') ?>
	</div>
</div>