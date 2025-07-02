<?php
require_once __DIR__ .'/../models/kartu-diskon.php';
use models\KartuDiskon;

if(!isset($_GET['id'])) {
    header("Location: list-kartu-diskon.php");
    exit;
}

$user = kartuDiskon::find($_GET['id']);

if(!$user) {
    header("Location: list-kartu-diskon.php");
    exit;

}

kartuDiskon::delete($user['id']);
header("Location: list-kartu-diskon.php");

?>