<?php
class ContactT {
    private $conn;
    private $table_name = 'contact';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function save($name, $surname, $email, $phone, $message) {
        $query = "INSERT INTO {$this->table_name} (name, surname, email, phone, message) 
                  VALUES (:name, :surname, :email, :phone, :message)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);

        return $stmt->execute();
    }
}
?>
