<?php 
	require_once 'database.php';

	class Brewery {
		public $id;
		public $name;

		public static function getBySql($sql) {
			$db = new Database();
			return $db->executeSql($sql);
		}

		public static function getAll() {			
			$sql = "SELECT * FROM breweries";			
			return self::getBySql($sql);
    	}
 
    	public static function getById($id) {
    		$id = (int)$id;
			$sql = sprintf("SELECT * FROM breweries WHERE id = %d", $id);
			return self::getBySql($sql);
    	}

        public static function getBeers($id) {
            $id = (int)$id;
            $sql = sprintf("SELECT * FROM beers WHERE brewery_id = %d", $id);
            return self::getBySql($sql);
        }

    	public function insert($name) {
    		$db = new Database();
    		$dml = sprintf("INSERT INTO breweries (name) VALUES ('%s')", $name);
    		return $db->executeDml($dml);

    	}

    	public function update($id, $name) {
    		$db = new Database();
    		$id = (int)$id;
    		$dml = sprintf("UPDATE breweries SET name ='%s' WHERE id = %d", $name, $id);
    		return $db->executeDml($dml);
    	}

    	public function delete($id) {
    		$db = new Database();
    		$id = (int)$id;
    		$dml = sprintf("DELETE FROM breweries WHERE id = %d", $id);
    		return $db->executeDml($dml);
    	}
	}

?>