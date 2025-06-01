<?php

namespace models;

require_once __DIR__ . '/../config/connection.php';

use config\Connection;
use PDO;

class Pembayaran
{
    private static function connect()
    {
        return Connection::make();
    }

    public static function get()
    {
        $pdo = self::connect();
        $sql = "
            SELECT pembayaran.*, pemesanan.tanggal AS tanggal_pemesanan
            FROM pembayaran
            JOIN pemesanan ON pembayaran.pemesanan_id = pemesanan.id
        ";
        $statement = $pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = self::connect();
        $sql = "INSERT INTO pembayaran (jumlah_bayar, tanggal, pemesanan_id) 
                VALUES (:jumlah_bayar, :tanggal, :pemesanan_id)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':pemesanan_id', $data['pemesanan_id']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = self::connect();
        $sql = 'SELECT * FROM pembayaran WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($data)
    {
        $pdo = self::connect();
        $sql = "UPDATE pembayaran 
                SET jumlah_bayar = :jumlah_bayar, tanggal = :tanggal, pemesanan_id = :pemesanan_id 
                WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':pemesanan_id', $data['pemesanan_id']);
        $statement->bindParam(':id', $data['id']);

        return $statement->execute();
    }

    public static function delete($id)
    {
        $pdo = self::connect();
        $sql = 'DELETE FROM pembayaran WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
