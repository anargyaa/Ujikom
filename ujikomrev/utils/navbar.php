<div class="navbar">
    <div class="left">
        <a href="index.php?" style="font-weight: 600; font-size: 24px;">Pemungutan Suara Calon Ketua Replikas 2024</a>
        <!-- <?= $_SESSION['role'] ?> -->
    </div>
<?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'panitia')): ?>
    <ul class="right">
        <a href="index.php?"><li>Beranda</li></a>
        <a href="index.php?v=hasil"><li>Hasil</li></a>
        <a href="index.php?v=laporan"><li>Laporan</li></a>
        <a href="index.php?v=akun"><li>Akun</li></a>
        <a href="controller/logout.php"><li>Logout</li></a>
    </ul>
<?php else: ?>
    <ul class="right">
        <a href="index.php?"><li>Beranda</li></a>
        <a href="index.php?v=pemungutan"><li>Pemungutan Suara</li></a>
        <a href="controller/logout.php"><li>Logout</li></a>
    </ul>
<?php endif; ?>
</div>
