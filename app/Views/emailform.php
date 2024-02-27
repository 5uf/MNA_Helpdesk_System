<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php if (! empty($data) && is_array($data)) : ?>
<?php foreach ($data as $data): ?>
	No Rujukan : <?= $data['no_rujukan'] ?>
    Nama : <?= $data['nama'] ?>
	Jawatan : <?= $data['jawatan']?>
	Telefon/IP : <?= $data['tel_ext']?>
	Bahagian : <?= $data['bahagian']?>
	Tingkat : <?= $data['tingkat']?>
	Masalah : <?= $data['kerosakan']?>
	Peralatan : <?= $data['peralatan']?>
	Perisian : <?= $data['perisian']?>
	Keterangan :<?= $data['keterangan']?>
<?php endforeach; ?>
<?php endif ?>
</body>
</html>