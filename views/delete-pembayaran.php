<?php
require_once __DIR__ .'/../models/pembayaran.php';
use models\Pesanan;

if(!isset($_GET['id'])) {
    header("Location: list-pembayaran.php");
    exit;
}

$user = pesanan::find($_GET['id']);

if(!$user) {
    header("Location: list_pembayaran.php");
    exit;

}

Pesanan::delete($user['id']);
header("Location: list-pembayaran.php");

?>