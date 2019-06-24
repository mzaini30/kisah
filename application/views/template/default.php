<!-- 

	Website ini dibuat oleh Zen - 081545143654

 -->
<!DOCTYPE html>
<html>
<head>
	<title><?= $judul ?> - Kisah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>aset/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="<?= base_url() ?>" class="navbar-brand">Kisah</a>
			</div>
		</div>
	</div>
	<div class="container">
		<?php $this->load->view($isi, $data = null) ?>
	</div>
</body>
</html>