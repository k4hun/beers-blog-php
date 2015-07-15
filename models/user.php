<?php 
	require_once 'database.php';

	class User {
		public $id;
		public $first_name;
		public $last_name;
        public $email;
        public $password;

		public static function logIn($email, $password) {
			$db = new Database();
            $sql = sprintf("SELECT * FROM users where email = '%s' AND password = '%s'", $email, $password);
			return $db->executeSql($sql);
        }
		
		public static function logOut() {			
			session_destroy();
    	}
	}

?>