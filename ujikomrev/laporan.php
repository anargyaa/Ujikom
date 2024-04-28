<?php  
	if(!isset($_SESSION['role']) || $_SESSION['role'] == 'kandidat'){
        header("Location: index.php?");
    }
?>
<div style="display: flex; justify-content: space-between; align-items: center;">
	<h1>Laporan Pemungutan Suara</h1>
	<a href="controller/proc.php?announce=y" class="btn-vote">Umumkan!</a>
</div>
<div class="paslon" style="margin: 1rem 0;">
<?php  
include 'controller/conn.php';
$stmt = $conn->query("SELECT * FROM superuser WHERE role = 'kandidat'");
$no = 1;

$sql_total = "SELECT COUNT(*) AS total_all FROM hasil";
$result_total = $conn->query($sql_total);
$total_row = $result_total->fetch_assoc();
$total_all = $total_row['total_all'];

while ($row = $stmt->fetch_assoc()) {
    $sql_count = "SELECT COUNT(*) AS total FROM hasil WHERE suid = '" . $row['suid'] . "'";
    $result_count = $conn->query($sql_count);
    $count_row = $result_count->fetch_assoc();
    $total_pemilih = $count_row['total'];

    if ($total_all > 0) {
        $percentage = ($total_pemilih / $total_all) * 100;
    } else {
        $percentage = 0;
    }
?>
    <div class="card">
        <img src="https://picsum.photos/300/300" >
        <div>
            <h1>No. <?= $no ?></h1>
            <h2><?= $row['nama'] ?></h2>
            <p>Persentase pemilih: <?= number_format($percentage, 2) ?>%</p>
            <a href="index.php?v=detailkandidat&id=<?= $row['suid'] ?>" class="lihat-profile" style="font-size: 14px; color: #9e9e9e;">Lihat profile</a>
        </div>
    </div>
<?php
    $no++;
}
?>
</div>
<?php 
    // Query untuk menghitung total pemberi suara
    $stmt = $conn->query("SELECT * FROM pemilih");
    $row = $stmt->fetch_assoc(); // Mengambil hasil dari query
    $total_pemilihs = $stmt->num_rows + 3;     
 
    $stmt = $conn->query("SELECT * FROM pemilih WHERE keterangan = 'y'");
    $row = $stmt->fetch_assoc(); // Mengambil hasil dari query
    $total_memberi1 = $stmt->num_rows;

    $stmt = $conn->query("SELECT * FROM superuser WHERE keterangan = 'y'");
    $row = $stmt->fetch_assoc();
    $total_memberi2 = $stmt->num_rows;     

    $total_memberi = $total_memberi1 + $total_memberi2;

    $stmt = $conn->query("SELECT * FROM pemilih WHERE keterangan = 'n'");
    $row = $stmt->fetch_assoc(); // Mengambil hasil dari query
    $total_tmemberi1 = $stmt->num_rows;

    $stmt = $conn->query("SELECT * FROM superuser WHERE keterangan = 'n'");
    $row = $stmt->fetch_assoc(); // Mengambil hasil dari query
    $total_tmemberi2 = $stmt->num_rows; 

    $total_tmemberi = $total_tmemberi1 + $total_tmemberi2;
?>

<div class="suara">
    <div class="card-suara">
        <h1>Total Pemberi Suara</h1>
        <span><?= $total_pemilihs ?> Orang</span> <!-- Menggunakan variabel $total_pemilihs -->
    </div>
    <div class="card-suara">
        <h1>Total Yang Memberi Suara</h1>
        <span><?= $total_memberi ?> Orang</span>
    </div>
    <div class="card-suara">
        <h1>Total Yang Tidak Memberi Suara</h1>
        <span><?= $total_tmemberi ?> Orang</span>
    </div>
</div>
