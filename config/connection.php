<?php
namespace config;

require_once __DIR__ . '/../vendor/autoload.php';

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Connection
{
    public static function make()
    {
        // Load .env
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load(); // gunakan load() agar pasti masuk ke $_ENV

        // Ambil dari $_ENV (bukan getenv)
        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        // DSN
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            return new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
