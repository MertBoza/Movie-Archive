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

    public function delete($movieId) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $movieId);
        return $stmt->execute();
    }

    public function getMovieById($movieId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $movieId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update($movieId, $title, $director, $categories, $image_path) {
        $query = "UPDATE " . $this->table_name . " SET title = :title, director = :director, categories = :categories, image_path = :image_path WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':director', $director);
        $stmt->bindParam(':categories', $categories);
        $stmt->bindParam(':image_path', $image_path);
        $stmt->bindParam(':id', $movieId);
    
        return $stmt->execute();
    }
    
    
}
?>
