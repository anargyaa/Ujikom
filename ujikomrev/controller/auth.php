<?php  

	include 'conn.php';
	session_start();
	if(isset($_POST['signin'])){
	    $email = $conn->real_escape_string($_POST['email']);
	    $password = md5($_POST['password']);

	    $stmt = $conn->query("SELECT * FROM superuser WHERE email = '$email' AND password = '$password'");
	    if ($stmt->num_rows > 0) {
	        $row = $stmt->fetch_assoc();

	        if (!empty($row=['nama'])) {
			    $stmt = $conn->query("SELECT * FROM superuser WHERE email = '$email' AND password = '$password'");
		        $row = $stmt->fetch_assoc();
		        $_SESSION['suid'] = $row['suid'];
		        $_SESSION['nama'] = $row['nama'];
		        $_SESSION['role'] = $row['role'];

		        header("Location: ../index.php");
		        exit;
	        } else {
		        echo "<script>alert('Anda harus melengkapi data diri anda terlebih dahulu!');window.location='../index.php?v=upakun';</script>";
	        }
	    } else {
	        $stmt = $conn->query("SELECT * FROM pemilih WHERE email = '$email' AND password = '$password'");
	        if ($stmt->num_rows > 0) {
	            $row = $stmt->fetch_assoc();

	            $_SESSION['id_pemilih'] = $row['id_pemilih'];
	            $_SESSION['nama'] = $row['nama'];
	            $_SESSION['keterangan'] = $row['keterangan'];
	            
	            header("Location: ../index.php");
	            exit;
	        } else {
	            header("Location: ../index.php?v=signin");
	            exit;
	        }
	    }
	}


	elseif (isset($_POST['signup'])) {
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$keahlian = $_POST['keahlian'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$stmt = $conn->query("SELECT * FROM pemilih WHERE email = '$email' AND password = '$password'");
		if ($stmt->num_rows > 0) {
			header("Location: ../index.php?v=signup&sudahterdaftar");
		} else {
			$stmt = $conn->query("INSERT INTO pemilih (id_pemilih, nis, nama, kelas, id_kk, keterangan, email, password) VALUES('', '$nis', '$nama', '$kelas', '$keahlian', 'n', '$email', '$password')");
			header("Location: ../index.php?v=signup&terdaftar");
		}
	}

	elseif (isset($_POST['upakun'])) {
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$keahlian = $_POST['keahlian'];
		$visi = $_POST['visi'];
		$misi = $_POST['misi'];

		$stmt = $conn->query("UPDATE superuser SET nis = '$nis', nama = '$nama', kelas = '$kelas', id_kk = '$keahlian', visi = '$visi', misi = '$misi', keterangan = 'n' WHERE suid = '$_SESSION[suid]'");

		if ($stmt) {
			header("Location: ../index.php");
		} else{
	        echo "<script>alert('Gagal melengkapi data diri!');window.location='../index.php?v=upakun';</script>";
		}
	}

	elseif (isset($_POST['kandidatup'])) {
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    $cpassword = $_POST['cpassword'];
	    $stmt = $conn->query("SELECT * FROM superuser WHERE email = '$email' AND password = '$password'");
	    if ($stmt->num_rows > 0) {
	        echo "<script>alert('Email atau Password sudah terdaftar!');window.location='../index.php?v=tambahakun&role=kandidat';</script>";
	    } else {
	    	if ($password == $cpassword) {
		        $pw = md5($password);
		        $stmt = $conn->query("INSERT INTO superuser (email, password, role, keterangan) VALUES ('$email', '$pw', 'kandidat', 'n')");
		        if ($stmt) {
		            echo "<script>alert('Akun berhasil terdaftar!');window.location='../index.php?v=tambahakun&role=kandidat';</script>";
		        }
	    	} else {
		            echo "<script>alert('Password konfirmasi anda berbeda!');window.location='../index.php?v=tambahakun&role=kandidat';</script>";
	    	}
	    }
	} elseif (isset($_POST['panitiaup'])) {
	    $nis = $_POST['nis'];
	    $nama = $_POST['nama'];
	    $kelas = $_POST['kelas'];
	    $keahlian = $_POST['keahlian'];
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    $cpassword = $_POST['cpassword'];
	    $stmt = $conn->query("SELECT * FROM superuser WHERE email = '$email' AND password = '$password'");
	    if ($stmt->num_rows > 0) {
	        echo "<script>alert('NIS sudah terdaftar!');window.location='../index.php?v=tambahakun&role=panitia';</script>";
	    } else {
	    	if ($password == $cpassword) {
		        $pw = md5($password);
		        $stmt = $conn->query("INSERT INTO superuser (nis, nama, kelas, id_kk, email, password, role, keterangan) VALUES ('$nis', '$nama', '$kelas', '$keahlian', '$email', '$pw', 'panitia', 'n')");
		        if ($stmt) {
		            echo "<script>alert('Akun berhasil terdaftar!');window.location='../index.php?v=tambahakun&role=panitia';</script>";
		        }
	    	} else {
		            echo "<script>alert('Password konfirmasi anda berbeda!');window.location='../index.php?v=tambahakun&role=panitia';</script>";
	    	}
	    }
	}


?>