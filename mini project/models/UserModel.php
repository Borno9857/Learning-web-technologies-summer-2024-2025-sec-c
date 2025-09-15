<?php
class UserModel {
    // Database connection parameters
    private static $host = 'localhost';
    private static $dbname = 'your_database_name';
    private static $username = 'your_database_username';
    private static $password = 'your_database_password';

    // Establish a database connection
    private static function getConnection() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
            $pdo = new PDO($dsn, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Register a new user
    public static function register($id, $password, $name, $user_type) {
        $conn = self::getConnection();
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
          $sql = "INSERT INTO users (user_id, password, name, user_type) VALUES (:id, :password, :name, :user_type)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':user_type', $user_type);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login user
    public static function login($id, $password) {
        $conn = self::getConnection();

        $sql = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
}
}
?>