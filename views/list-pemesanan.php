<?php
require_once __DIR__ . '/../models/pesanan.php';

use models\Pesanan;

$pesananList = Pesanan::get();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Data Pemesanan - project01</title>
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
                    <h1 class="mt-4">Pemesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pemesanan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Data Pemesanan
                        </div>
                        <div class="card-body">
                            <div class="mb-3 text-end">
                                <a href="create-pemesanan.php" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah Pemesanan
                                </a>
                            </div>
                            <table id="datatableSimple" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Diskon</th>
                                        <th>Status Bayar</th>
                                        <th>Anggota ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesananList as $index => $pesanan): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $pesanan['id'] ?></td>
                                            <td><?= $pesanan['tanggal'] ?></td>
                                            <td><?= $pesanan['diskon'] ?>%</td>
                                            <td><?= $pesanan['status_bayar'] ?></td>
                                            <td><?= $pesanan['anggota_id'] ?></td>
                                            <td>
                                                <a href="detail-pemesanan.php?id=<?= $pesanan['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                <a href="edit-pemesanan.php?id=<?= $pesanan['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="delete-pemesanan.php?id=<?= $pesanan['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pemesanan ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>
</html>
