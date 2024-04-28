<?php  

	include 'conn.php';
	session_start();
	if (isset($_POST['pilih'])) {
		$pilihan = $_POST['pilihan'];
		if (isset($_SESSION['suid'])) {
			$stmt = $conn->query("SELECT * FROM superuser WHERE suid = '$_SESSION[suid]' AND keterangan = 'y'");
			if ($stmt->num_rows > 0) {
				header('Location: ../index.php?sudahmemberisuara');
			} else {
				$stmt = $conn->query("INSERT INTO hasil VALUES('', '$_SESSION[suid]', '$pilihan', current_timestamp())");
				if ($stmt) {
					$stmt = $conn->query("UPDATE superuser SET keterangan='y' WHERE suid='$_SESSION[suid]'");
					if ($stmt) {
						header('Location: ../index.php?suaratersimpan');
					}
				}
			}
		} elseif (isset($_SESSION['id_pemilih'])) {
			$stmt = $conn->query("SELECT * FROM pemilih WHERE id_pemilih = '$_SESSION[id_pemilih]' AND keterangan = 'y'");
			if ($stmt->num_rows > 0) {
				header('Location: ../index.php?sudahmemberisuara');
			} else {
				$stmt = $conn->query("INSERT INTO hasil VALUES('', '', '$_SESSION[id_pemilih]', '$pilihan', current_timestamp())");
				if ($stmt) {
					$stmt = $conn->query("UPDATE pemilih SET keterangan='y' WHERE id_pemilih='$_SESSION[id_pemilih]'");
					if ($stmt) {
						header('Location: ../index.php?suaratersimpan');
					}
				}
			}
		}
	}

	elseif(isset($_GET['announce'])){
		$stmt = $conn->query("UPDATE superuser SET keterangan='y' WHERE role = 'admin'");		
		header("Location: ../index.php?v=hasil");
	}

	elseif (isset($_POST['edit'])) {
		$suid = $_POST['suid'];
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$keahlian = $_POST['keahlian'];
		$email = $_POST['email'];

		$stmt = $conn->query("SELECT * FROM superuser WHERE suid = '$suid'");
		$row = $stmt->fetch_assoc();
		if ($row['role'] == 'kandidat') {
			$visi = $_POST['visi'];
			$misi = $_POST['misi'];

			$stmt = $conn->query("UPDATE superuser SET nis='$nis', nama='$nama', kelas='$kelas', id_kk='$keahlian', visi='$visi', misi='$misi', email='$email' WHERE suid = '$suid'");		
			if ($stmt) {
				header('Location: ../index.php?v=akun&berhasil');
			}
		} elseif ($row['role'] == 'panitia') {
			$stmt = $conn->query("UPDATE superuser SET nis='$nis', nama='$nama', kelas='$kelas', id_kk='$keahlian', email='$email' WHERE suid = '$suid'");		
			if ($stmt) {
				header('Location: ../index.php?v=akun&berhasil');
			}
		} else {
				header('Location: ../index.php?v=akun&datatidakditemukan');
		}
	}

	elseif (isset($_GET['v'])){
		$suid = $_GET['suid'];
		$stmt = $conn->query("DELETE FROM superuser WHERE suid = '$suid'");		
		if ($stmt) {
			header('Location: ../index.php?v=akun&terhapus');
		} else {
			header('Location: ../index.php?v=akun&gagalterhapus');
		}
	}

?>