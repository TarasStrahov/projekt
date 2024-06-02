<?php
	require_once('database.php');

	class User extends Database {
		private $db;
		
		public function __construct()
		{
			$this->db = $this->connection();
		}

		public function register($name, $password){
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

		public function login($name, $password){
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
	}
?>