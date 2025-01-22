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
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    public function login($email, $password) {
        $query = "SELECT id, username, email, phone, password FROM {$this->table_name} WHERE email = :email";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                return true;
            } else {
                echo "Password mismatch!";
            }
        } else {
            echo "No user found with that email!";
        }
        return false;
    }
}
?>
