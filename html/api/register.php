<?php
require_once '../db/dbManager.php';

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
    $pdo = getDatabaseConnection();

    $stmt = $pdo -> prepare ("INSERT INTO users (name, password) VALUES (:name, :password)");
    $stmt -> bindParam(':name', $username, PDO::param_str);
    $stmt -> bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt -> execute();

    echo "ユーザー登録が完了しました！";
} catch (PDOException $e) {
    echo "登録エラー: "
}
?>
