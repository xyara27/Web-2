<?php
require_once __DIR__ . '/../models/anggota.php';
require_once __DIR__ . '/../models/pegawai.php';
require_once __DIR__ . '/../models/produk.php';
require_once __DIR__ . '/../models/pemesanan.php';
require_once __DIR__ . '/../models/transaksi.php';

use models\Anggota;
use models\Pegawai;
use models\Produk;
use models\pesanan;
use models\pembayaran;

// Ambil total jumlah data dari masing-masing tabel
$totalAnggota = count(Anggota::get());
$totalPegawai = count(Pegawai::get());
$totalProduk = count(Produk::get());
$totalPemesanan = count(Pesanan::get());
$totalTransaksi = count(pembayaran::get());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard - project01</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <link href="../public/css/dashboard.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
</style>



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
                    <a class="nav-link" href="list-anggota.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Anggota
                    </a>
                    <a class="nav-link" href="list-pegawai.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>
                        Pegawai
                    </a>
                    <a class="nav-link" href="list-produk.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Produk
                    </a>
                    <a class="nav-link" href="list-pemesanan.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                        Pemesanan
                    </a>
                    <a class="nav-link" href="list-transaksi.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill"></i></div>
                        Transaksi
                    </a>
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
                <h1 class="mt-4">Dashboard</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                        <a href="list-anggota.php" class="text-white text-decoration-none">
                            <div class="card-body">Total Anggota: <?= $totalAnggota ?></div>
                        </a>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                        <a href="list-pegawai.php" class="text-white text-decoration-none">
                            <div class="card-body">Total Pegawai: <?= $totalPegawai ?></div>
                        </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                        <a href="list-produk.php" class="text-white text-decoration-none">
                            <div class="card-body">Total Produk: <?= $totalProduk ?></div>
                        </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                        <a href="list-pemesanan.php" class="text-white text-decoration-none">
                            <div class="card-body">Total Pemesanan: <?= $totalPemesanan ?></div>
                        </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                        <a href="list-transaksi.php" class="text-white text-decoration-none">
                            <div class="card-body">Total Transaksi: <?= $totalTransaksi ?></div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; PW2 <?= date('Y') ?></div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../public/js/scripts.js"></script>
</body>
</html>
