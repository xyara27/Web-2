<?php
require_once __DIR__ .'/../models/produk.php';
use models\Produk;

if(!isset($_GET['id'])) {
    header("Location: list-produk.php");
    exit;
}

$user = produk::find($_GET['id']);

if(!$user) {
    header("Location: list_produk.php");
    exit;

}

produk::delete($user['id']);
header("Location: list-produk.php");

?>