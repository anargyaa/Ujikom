<div class="paslon">
    <?php  
    include 'controller/conn.php';
    $stmt = $conn->query("SELECT * FROM superuser WHERE role = 'kandidat'");
    $no = 1;

    // Query untuk menghitung total keseluruhan pemilih
    $sql_total = "SELECT COUNT(*) AS total_all FROM hasil";
    $result_total = $conn->query($sql_total);
    $total_row = $result_total->fetch_assoc();
    $total_all = $total_row['total_all'];

    while ($row = $stmt->fetch_assoc()) {
        // Query untuk menghitung jumlah pemilih untuk setiap suid dengan role kandidat
        $sql_count = "SELECT COUNT(*) AS total FROM hasil WHERE suid = '" . $row['suid'] . "'";
        $result_count = $conn->query($sql_count);
        $count_row = $result_count->fetch_assoc();
        $total_pemilih = $count_row['total'];

        // Menghitung persentase pemilih
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
