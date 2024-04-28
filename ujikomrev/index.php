<?php 
    include 'controller/conn.php';
    session_start();
    if(!isset($_GET['v']) == 'signin' || !isset($_GET['v']) == 'signin'){
        if(!isset($_SESSION['nama'])){
            header("Location: index.php?v=signin");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pemungutan Suara Replikas</title>
</head>
<body>
    <?php if (isset($_GET['v']) && ($_GET['v'] == 'signin' || $_GET['v'] == 'signup')): ?>
    <?php include 'none.php'; ?>
    <?php else: ?>
        <?php include 'utils/navbar.php'; ?>
    <?php endif; ?>

    <div class="content">
<?php
    if(isset($_GET['v'])){
        if ($_GET['v'] == 'hasil') {
            include 'hasil.php';
        }
        elseif ($_GET['v'] == 'laporan') {
            include 'laporan.php';
        }
        elseif ($_GET['v'] == 'akun') {
            include 'akun.php';
        }
        elseif ($_GET['v'] == 'tambahakun') {
            include 'tambahakun.php';
        }
        elseif ($_GET['v'] == 'editakun') {
            include 'editakun.php';
        }
        elseif ($_GET['v'] == 'signin') {
            include 'signin.php';
        }
        elseif ($_GET['v'] == 'signup') {
            include 'signup.php';
        }
        elseif ($_GET['v'] == 'pemungutan') {
            include 'pemungutan.php';
        }
        elseif ($_GET['v'] == 'detailkandidat') {
            include 'detailkandidat.php';
        }
        elseif ($_GET['v'] == 'upakun') {
            include 'upakun.php';
        }
    } else {
        include 'beranda.php';
    }
?>
    </div>
</body>
</html>