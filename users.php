<?php
class Users {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $email, $phone, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "INSERT INTO {$this->table_name} (username, email, phone, password) 
                  VALUES (:username, :email, :phone, :password)";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $hashed_password);
    
        return $stmt->execute();
    }
    
    public function login($email, $password) {
        $user = $this->getUserByEmail($email);
    
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['is_admin'] = $user['is_admin'];
            return true;
        }
    
        return false;
    }
    
    // New method to fetch user data by email
    public function getUserByEmail($email) {
        $query = "SELECT id, password, is_admin FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return the user data (id, password, is_admin)
    }
}
?>
