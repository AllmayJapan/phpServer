<?php
function getDatabaseConnection() {
    $host = getenv("DB_HOST");
    $dbname = getenv("DB_NAME");
    $user = getenv("DB_USER");
    $password = getenv("DB_PASSWORD");

    try {
        $pdo = new PDO("mysql:host = $host; dbname = $dbname; charset = utf8mb4", $user, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("データベース接続ができませんでした。" . $e -> getMessage());
    }
}
?>
