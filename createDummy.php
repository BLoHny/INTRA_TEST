<?php
$host = 'localhost';
$db = 'php_docker';
$user = 'php_docker';
$password = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully!";

    function createDummy($pdo) {
        // users 테이블 생성
        $createTableSQL = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL
        )";

        $pdo->exec($createTableSQL);
        echo "Table `users` created successfully!\n";

        // 데이터 삽입
        $insertSQL = "INSERT INTO users (name) VALUES (:name)";
        $stmt = $pdo->prepare($insertSQL);

        // 첫 번째 사용자 데이터 삽입
        $stmt->execute([':name' => 'John Doe']);
        echo "Inserted user: John Doe\n";

        // 두 번째 사용자 데이터 삽입
        $stmt->execute([':name' => 'Jane Smith']);
        echo "Inserted user: Jane Smith\n";
    }

    createDummy($pdo);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}