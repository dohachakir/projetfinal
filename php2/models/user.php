<?php
class User {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            return $user;
        }
        return false;
    }

    public function register($username, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, 'user')");
        return $stmt->execute(['username' => $username, 'password' => $password]);
    }

    public function isAdmin($userId) {
        $stmt = $this->db->prepare("SELECT role FROM users WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && $user['role'] === 'admin';
    }
}
?>
