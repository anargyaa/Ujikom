<?php  

	include 'controller/conn.php';
	$stmt = $conn->query("SELECT * FROM superuser WHERE suid = '$_GET[id]'");
	$no = 1;
	while ($row = $stmt->fetch_assoc()) {
?>
	<div class="kandidat-profile">
		<div>
			<img src="https://picsum.photos/300/400" >
		</div>
		<div class="profile">
			<h1>No. <?= $no ?></h1>
			<div>
				<span>Nama : </span>
				<span style="font-size: 24px; font-weight: 600;"><?= $row['nama'] ?></span>
			</div>
			<div>
				<span>Kelas : </span>
				<span style="font-size: 24px; font-weight: 600;"><?= $row['kelas'] ?></span>
			</div>
			<a href="index.php?v=pemungutan" class="btn-vote" style="margin: 1rem 0;">Berikan Suara Sekarang !</a>
		</div>
	</div>
	<div class="kandidat-vimi" style="display: flex; flex-direction: column; gap: 2rem;">
		<div>
			<h1>Visi</h1>
			<p><?= $row['visi']; ?></p>
		</div>
		<div>
			<h1>Misi</h1>
			<p><?= $row['misi']; ?></p>
		</div>
	</div>
<?php
	$no++;
	}
?>
