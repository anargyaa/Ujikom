<div class="sign-content">
	<div class="sign">
		<h1>Edit Akun</h1>
		<?php  
			$stmt = $conn->query("SELECT * FROM superuser WHERE suid = '$_GET[suid]'");
			$row = $stmt->fetch_assoc();
		?>
		<form action="controller/proc.php" method="POST">
			<div class="div-input">
				<span>NIS</span>
				<input required type="text" value="<?= $row['nis'] ?>" name="nis">
				<input type="hidden" value="<?= $_GET['suid'] ?>" name="suid">
			</div>
			<div class="div-input">
				<span>Nama</span>
				<input required type="text" value="<?= $row['nama'] ?>" name="nama">
			</div>
			<div class="div-input">
				<span>Kelas</span>
				<input required type="text" value="<?= $row['kelas'] ?>" name="kelas">
			</div>
			<div class="div-input">
				<span>Konsentrasi Keahlian</span>
				<select required name="keahlian">
					<?php  
						include 'controller/conn.php';
						$stmt = $conn->query("SELECT * FROM keahlian");
						while ($row = $stmt->fetch_assoc()) {
					?>
					<option value="<?= $row['id_kk']; ?>"><?= $row['nama_kk']; ?></option>
					<?php } ?>
				</select>
			</div>
			<?php $stmt = $conn->query("SELECT * FROM superuser WHERE suid = '$_GET[suid]'"); 
				$row = $stmt->fetch_assoc();
			 if ($row['role'] == 'kandidat'): ?>
				<div class="div-input">
					<span>Visi</span>
					<textarea style="resize: none; height: 4rem;" name="visi"><?= $row['visi'] ?></textarea>
				</div>
				<div class="div-input">
					<span>Misi</span>
					<textarea style="resize: none; height: 4rem;" name="misi"><?= $row['misi'] ?></textarea>
				</div>
			<?php endif ?>
			<div class="div-input">
				<span>Email</span>
				<input required type="text" value="<?= $row['email'] ?>" name="email">
			</div>
			<button type="submit" name="edit" value="edit" class="btn-vote">Ubah</button>
		</form>
		
	</div>
</div>