<?php 
	require_once 'database.php';

	class Style {
		public $id;
		public $name;
		public $description;

		public static function getBySql($sql) {
			$db = new Database();
			return $db->executeSql($sql);
		}

		public static function getAll() {			
			$sql = "SELECT * FROM styles";			
			return self::getBySql($sql);
    	}
 
    	public static function getById($id) {
    		$id = (int)$id;
			$sql = sprintf("SELECT * FROM styles WHERE id = %d", $id);
			return self::getBySql($sql);
    	}

    	public static function getBeers($id) {
            $id = (int)$id;
            $sql = sprintf("SELECT * FROM beers WHERE style_id = %d", $id);
            return self::getBySql($sql);
        }

    	public function insert($name, $description) {
    		$db = new Database();
    		$dml = sprintf("INSERT INTO styles (name, description) VALUES ('%s', '%s')", $name, $description);
    		return $db->executeDml($dml);
    	}

    	public function update($id, $name, $description) {
    		$db = new Database();
    		$id = (int)$id;
    		$dml = sprintf("UPDATE styles SET name = '%s', description = '%s' WHERE id = %d", $name, $description, $id);
    		return $db->executeDml($dml);
    	}

    	public function delete($id) {
    		$db = new Database();
    		$id = (int)$id;
    		$dml = sprintf("DELETE FROM styles WHERE id = %d", $id);
    		return $db->executeDml($dml);
    	}
	}

?>