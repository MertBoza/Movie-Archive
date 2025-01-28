<?php
class Movie {
    private $conn;
    private $table_name = "movies";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($title, $director, $categories, $image_path) {
        $query = "INSERT INTO " . $this->table_name . " (title, director, categories, image_path) 
                  VALUES (:title, :director, :categories, :image_path)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':director', $director);
        $stmt->bindParam(':categories', $categories);
        $stmt->bindParam(':image_path', $image_path);
        return $stmt->execute();
    }

    public function getAllMovies() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
