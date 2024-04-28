<h1 align="center" style="margin-bottom: 1rem;">Calon Kandidat Ketua Replikas Tahun 2024</h1>
<div class="paslon">
	<?php  
		include 'controller/conn.php';
		$stmt = $conn->query("SELECT * FROM superuser WHERE role = 'kandidat'");
		$no = 1;
		while ($row = $stmt->fetch_assoc()) {
	?>
	<div class="card">
		<img src="https://picsum.photos/300/300" >
		<div>
			<h1>No. <?= $no ?></h1>
			<h2><?= $row['nama'] ?></h2>
			<a href="index.php?v=detailkandidat&id=<?= $row['suid'] ?>" class="lihat-profile" style="font-size: 14px; color: #9e9e9e;">Lihat profile</a>
		</div>
	</div>
	<?php
		$no++;
		}
	?>
</div>
<div class="konten-pemilih">
	<p align="center" >Jangan sia-siakan kesempatan ini untuk menjadi bagian dari proses demokrasi organisasi kita. Mari kita bersama-sama memilih pemimpin yang akan membawa kita menuju masa depan yang lebih baik!</p>
	<a href="index.php?v=pemungutan" class="btn-vote">Berikan Suara Sekarang !</a>
</div>