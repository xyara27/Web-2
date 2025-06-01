<?php
require_once __DIR__ . '/../models/pesanan.php';
require_once __DIR__ . '/../models/anggota.php';

use models\Pesanan;
use models\Anggota;

$anggotaList = Anggota::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'tanggal' => $_POST['tanggal'],
        'diskon' => $_POST['diskon'],
        'status_bayar' => $_POST['status_bayar'],
        'anggota_id' => $_POST['anggota_id']
    ];

    Pesanan::insert($data);
    header('Location: list-pemesanan.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Create Pemesanan - project01</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="dashboard.php">project01</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link" href="list-anggota.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>Anggota</a>
                        <a class="nav-link" href="list-pegawai.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>Pegawai</a>
                        <a class="nav-link" href="list-produk.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>Produk</a>
                        <a class="nav-link" href="list-pemesanan.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>Pemesanan</a>
                        <a class="nav-link" href="list-transaksi.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill"></i></div>Transaksi</a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Anggia Dwi Hikmah
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Pemesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-pemesanan.php">Pemesanan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-plus me-1"></i> Form Tambah Pemesanan
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="form-label">Diskon (%)</label>
                                    <input type="number" class="form-control" id="diskon" name="diskon" min="0" value="0" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status_bayar" class="form-label">Status Bayar</label>
                                    <select class="form-control" id="status_bayar" name="status_bayar" required>
                                        <option value="Belum Bayar">Belum Bayar</option>
                                        <option value="Sudah Bayar">Sudah Bayar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="anggota_id" class="form-label">Anggota</label>
                                    <select class="form-control" id="anggota_id" name="anggota_id" required>
                                        <option value="">-- Pilih Anggota --</option>
                                        <?php foreach ($anggotaList as $anggota): ?>
                                            <option value="<?= $anggota['id'] ?>">
                                                <?= $anggota['id'] ?> - <?= $anggota['nama'] ?? 'Tanpa Nama' ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                                <a href="list-pemesanan.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; PW2 <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
</body>
</html>
