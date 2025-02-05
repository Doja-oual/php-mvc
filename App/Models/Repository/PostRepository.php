<?php


class PostRepository {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Rcupre tous les articles
    public function getAllPosts() {
        $query = "SELECT * FROM posts";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Recupere un article par ID
    public function getPostById($id) {
        $query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Ajoute un nouvel article
    public function addPost($title, $content, $authorId) {
        $query = "INSERT INTO posts (title, content, author_id) VALUES (:title, :content, :author_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':author_id', $authorId);
        return $stmt->execute();
    }

    // Met  jour un article
    public function updatePost($id, $title, $content) {
        $query = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    // Supprime un article
    public function deletePost($id) {
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
