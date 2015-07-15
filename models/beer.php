<?php 
	require_once 'database.php';

	class Beer {
		public $id;
		public $name;
		public $style;
		public $description;
		public $rating;
		public $brewery;

		public static function getBySql($sql) {
			$db = new Database();
			return $db->executeSql($sql);
		}

		public static function getAll() {			
			$sql = "SELECT * FROM beers";			
			return self::getBySql($sql);
    	}
 
    	public static function getById($id) {
    		$id = (int)$id;
			$sql = sprintf("SELECT * FROM beers WHERE id = %d", $id);
			return self::getBySql($sql);
    	}

        public static function getLimited($limit) {
            $sql = sprintf("SELECT * FROM beers ORDER BY created_at DESC LIMIT %d", $limit);
            return self::getBySql($sql);
        }

    	public static function getBrewery($id) {
    		$id = (int)$id;
			$sql = sprintf("SELECT name FROM breweries WHERE id = %d", $id);
			return self::getBySql($sql);
    	}

    	public static function getStyle($id) {
    		$id = (int)$id;
			$sql = sprintf("SELECT name FROM styles WHERE id = %d", $id);
			return self::getBySql($sql);
    	}

    	public function insert($name, $style, $description, $rating, $brewery, $photo_url) {
    		$db = new Database();
    		$dml = sprintf("INSERT INTO beers (name, style_id, description, rating, brewery_id, photo_url) VALUES ('%s', '%d', '%s', '%d', '%d', '%s')", $name, $style, $description, $rating, $brewery, $photo_url);
    		return $db->executeDml($dml);
    	}

    	public function update($id, $name, $style, $description, $rating, $brewery) {
    		$db = new Database();
    		$id = (int)$id;
    		$dml = sprintf("UPDATE beers SET name = '%s', style_id = '%d', description = '%s', rating = '%d', brewery_id = '%d' WHERE id = %d", $name, $style, $description, $rating, $brewery, $id);
    		return $db->executeDml($dml);
    	}

    	public function delete($id) {
    		$db = new Database();
    		$id = (int)$id;
    		$dml = sprintf("DELETE FROM beers WHERE id = %d", $id);
    		return $db->executeDml($dml);
    	}
	}

?>