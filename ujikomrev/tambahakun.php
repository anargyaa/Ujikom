<?php if ($_GET['role'] == 'kandidat'): ?>
	<div class="sign-content">
	<div class="sign">
		<h1>Tambah Akun Kandidat</h1>
		<form action="controller/auth.php" method="POST">
			<div class="div-input">
				<span>Email</span>
				<input required type="text" name="email">
			</div>
			<div class="div-input">
				<span>Password</span>
				<input required type="Password" name="password">
			</div>
			<div class="div-input">
				<span>Konfirmasi Password</span>
				<input required type="Password" name="cpassword">
			</div>
			<button type="submit" name="kandidatup" value="kandidatup" class="btn-vote">Daftar</button>
		</form>
	</div>
</div>
<?php endif ?>
<div class="sign-content">
	<div class="sign">
		<h1>Tambah Akun Panitia</h1>
		<form action="controller/auth.php" method="POST">
			<div class="div-input">
				<span>NIS</span>
				<input required type="text" name="nis">
			</div>
			<div class="div-input">
				<span>Nama</span>
				<input required type="text" name="nama">
			</div>
			<div class="div-input">
				<span>Kelas</span>
				<input required type="text" name="kelas">
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
			<div class="div-input">
				<span>Email</span>
				<input required type="text" name="email">
			</div>
			<div class="div-input">
				<span>Password</span>
				<input required type="Password" name="password">
			</div>
			<div class="div-input">
				<span>Konfirmasi Password</span>
				<input required type="Password" name="cpassword">
			</div>
			<button type="submit" name="panitiaup" value="panitiaup" class="btn-vote">Daftar</button>
		</form>
		
	</div>
</div>