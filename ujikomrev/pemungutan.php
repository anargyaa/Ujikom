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
<?php 
	include 'controller/conn.php';

	if (isset($_SESSION['id_pemilih'])) {
		$id = $_SESSION['id_pemilih'];
		$stmt = $conn->query("SELECT keterangan FROM pemilih WHERE id_pemilih = '$id'");
		$row = $stmt->fetch_assoc();
	}
	if (isset($_SESSION['suid'])) {
		$suid = $_SESSION['suid'];
		$stmt = $conn->query("SELECT * FROM superuser WHERE suid = '$suid'");
		$row1 = $stmt->fetch_assoc();
	}
	if (isset($row['keterangan']) == 'n' || isset($row1['keterangan']) == 'n') {
?>
	<div class="vote">
		<form action="controller/proc.php" method="POST">
			<div>
				<span>Pilih Calon Kandidat - </span>
				<select name="pilihan">
					<?php  
						$stmt = $conn->query("SELECT * FROM superuser WHERE role = 'kandidat'");
						while ($row = $stmt->fetch_assoc()) {
					?>
						<option value="<?= $row['suid']; ?>"><?= $row['nama']; ?></option>
					<?php } ?>
				</select>
			</div>
			<button type="submit" name="pilih" value="pilih" class="btn-vote">Simpan Suara</button>
		</form>
	</div>
<?php 

	} elseif ($row['keterangan'] == 'y') {
		echo "<script>alert('Anda sudah memberikan suara sebelumnya!');window.location='index.php';</script>";
	}
	else { 
		echo "<script>alert('Anda tidak bisa memberikan suara!');window.location='index.php';</script>";
	}

?>