<?php
require_once('Database.php');

class Portfolio extends Database {
    private $db;

    public function __construct() {
        $this->db = $this->connection();
    }

    public function addProject($name, $img, $text) {
        $sql = "INSERT INTO portfolio (name, img, text) VALUES (:name, :img, :text)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':text', $text);
        return $stmt->execute();
    }

    public function getProjects() {
        $sql = "SELECT * FROM portfolio";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function getProject($id) {
        $sql = "SELECT * FROM portfolio WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateProject($id, $name, $img, $text) {
        $sql = "UPDATE portfolio SET name = :name, img = :img, text = :text WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteProject($id) {
        $sql = "DELETE FROM portfolio WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
