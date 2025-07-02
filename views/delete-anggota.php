<?php
require_once __DIR__ .'/../models/anggotaphp';
use models\Anggota;

if(!isset($_GET['id'])) {
    header("Location: list-anggota.php");
    exit;
}

$user = anggota::find($_GET['id']);

if(!$user) {
    header("Location: list_anggota.php");
    exit;

}

anggota::delete($user['id']);
header("Location: list-anggota.php");

?>