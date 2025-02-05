<?php


class Role {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAllRoles() {
        $query = "SELECT * FROM roles";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRoleById($id) {
        $query = "SELECT * FROM roles WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addRole($name) {
        $query = "INSERT INTO roles (name) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    public function updateRole($id, $name) {
        $query = "UPDATE roles SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    public function deleteRole($id) {
        $query = "DELETE FROM roles WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
