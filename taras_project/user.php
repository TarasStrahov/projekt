<?php
require_once('database.php');

class User extends Database {
    private $db;
    
    public function __construct() {
        $this->db = $this->connection();
    }

    public function register($name, $password) {
        try {
            $query = $this->db->prepare("SELECT * FROM user WHERE name = ?");
            $query->execute([$name]);
            $rows = $query->rowCount();
            
            if ($rows > 0) {
                return false;
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = $this->db->prepare("INSERT INTO user(name, password) VALUES (?, ?)");
            if ($query->execute([$name, $hashed_password])) {
                return true;
            }
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
                }
            }

            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllUsers() {
        try {
            $query = $this->db->prepare("SELECT * FROM user");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function edit($userid, $name, $password) {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = $this->db->prepare("UPDATE user SET name = ?, password = ? WHERE userid = ?");
            return $query->execute([$name, $hashed_password, $userid]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function delete($userid) {
        try {
            $query = $this->db->prepare("DELETE FROM user WHERE userid = ?");
            return $query->execute([$userid]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}
?>

