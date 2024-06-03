<?php
require_once('database.php');

class User extends Database {
    private $db;
    
    public function __construct()
    {
        $this->db = $this->connection();
    }

    public function register($name, $password) {
        try {
            $query = $this->db->prepare("SELECT * FROM user WHERE name = ?");
            $query->execute([$name]);
            $rows = $query->rowCount();
            
            if ($rows > 0) {
                return false;
            };

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = $this->db->prepare("INSERT INTO user(name, password) VALUES (?, ?)");
            if ($query->execute([$name, $hashed_password])) {
                return true;
            };
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($name, $password) {
        try {
            $query = $this->db->prepare("SELECT * FROM user WHERE name = ?");
            $query->execute([$name]);
            $rows = $query->rowCount();
            
            $fetch = $query->fetch(PDO::FETCH_ASSOC);
            if ($rows > 0) {
                if (password_verify($password, $fetch['password'])) {
                    return true;
                };
            };

            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUserIdByName($name) {
        try {
            $stmt = $this->db->prepare("SELECT userid FROM user WHERE name = :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function isAdmin($name) {
        try {
            // Предполагая, что у вас есть поле is_admin в таблице user
            $stmt = $this->db->prepare("SELECT is_admin FROM user WHERE name = :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return $stmt->fetchColumn() == 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllUsers() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM user");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
