<?php  
    if(!isset($_SESSION['role']) || $_SESSION['role'] == 'kandidat'){
        header("Location: index.php?");
    }
?>

<?php  

    include 'controller/conn.php';
    $stmt = $conn->query("SELECT * FROM superuser JOIN keahlian ON keahlian.id_kk = superuser.id_kk WHERE role = 'kandidat'");
    if ($stmt->num_rows > 0) {
?>
<table border="1" style="margin: 1.5rem 0; background-color: #f5f5f5; padding: 0.5rem; border-radius: 0.5rem;">
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Keahlian</th>
        <th>Menu</th>
    </tr>
    <?php 
        while ($row = $stmt->fetch_assoc()) {
    ?>
    <tr>
        <td><?= $row['nis']?></td>
        <td><?= $row['nama']?></td>
        <td><?= $row['kelas']?></td>
        <td><?= $row['nama_kk']?></td>
        <td>
            <a href="index.php?v=editakun&suid=<?= $row['suid'] ?>">Edit</a>
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <a href="controller/proc.php?v=hapusakun&suid=<?= $row['suid'] ?>">Hapus</a>
            <?php endif ?>
        </td>
    </tr>
<?php
        } ?>
        <a class="btn-vote" href="index.php?v=tambahakun&role=panitia">Tambah akun panitia</a>
<?php
    } else {
        echo "<span>Belum ada akun panitia !</span>";
    }
?>
</table>
<?php  

    $stmt = $conn->query("SELECT * FROM superuser JOIN keahlian ON keahlian.id_kk = superuser.id_kk WHERE role = 'kandidat'");
    if ($stmt->num_rows > 0) {
?>
<table border="1" style="margin: 1.5rem 0; background-color: #f5f5f5; padding: 0.5rem; border-radius: 0.5rem;">
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Keahlian</th>
        <th>Menu</th>
    </tr>
<?php
        while ($row = $stmt->fetch_assoc()) {
?>
    <tr>
        <td><?= $row['nis']?></td>
        <td><?= $row['nama']?></td>
        <td><?= $row['kelas']?></td>
        <td><?= $row['nama_kk']?></td>
        <td>
            <a href="index.php?v=editakun&suid=<?= $row['suid'] ?>">Edit</a>
            <a href="index.php?v=detailkandidat&suid=<?= $row['suid'] ?>">Detail</a>
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <a href="controller/proc.php?v=hapusakun&suid=<?= $row['suid'] ?>">Hapus</a>
            <?php endif ?>
        </td>
    </tr>
<?php
        } ?>
<a class="btn-vote" href="index.php?v=tambahakun&role=kandidat">Tambah akun kandidat</a>
<?php
    } else {
        echo "<span>Belum ada akun kandidat !</span>";
    }
?>
</table>