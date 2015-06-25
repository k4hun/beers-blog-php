<?php

	class Database {
		private $connection;
		private $hostname;
		private $username;
		private $password;
		private $database;

		public function __construct() {
		    $this->hostname = 'localhost';
		    $this->username = 'root';
		    $this->password = '';
		    $this->database = 'beer_blog';     
		}

		public function openConnection() {
			$this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);
			// Check connection
			if ($this->connection->connect_error) {
			    die("Connection failed: " . $this->connection->connect_error);
			} 
			return $this->connection;
		}

		public function closeConnection() {
		    if (isset($this->connection)) {
		        // Close database connection
		        $this->connection->close() or die(mysql_error());
		    }
		}

		public function executeSql($sql) {
			$db = $this->openConnection();
			if(!$result = $db->query($sql)) {
				return $db->error;
			} else if($result->num_rows > 1) {
				$dataset = array();
				while($row = $result->fetch_object()) {
					array_push($dataset, $row);
				}
			} else {
				$dataset = $result->fetch_object();
			}
			$this->closeConnection();
			return $dataset;
		}

		public function executeDml($dml) {
			$db = $this->openConnection();
			if(!$db->query($dml)) {
				return $db->error;
			} else {
				return $db->affected_rows;
			}
		}

		public function sanitizeInput($value) {
			return htmlspecialchars($value);

		}
	}

?>