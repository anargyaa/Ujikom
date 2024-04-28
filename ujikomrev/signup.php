<div class="sign-content">
	<div class="sign">
		<h1>SIGN UP</h1>
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
			<div>
				<a>Sudah punya akun ?</a><a href="index.php?v=signin"> Signin</a>
			</div>
			<button type="submit" name="signup" value="signup" class="btn-vote">Daftar</button>
		</form>
		
	</div>
</div>