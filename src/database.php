<?php
	class Database {
		private static bool $has_init = false;
		private static string $url;
		private SQLite3 $conn;

		public static function init() {
			if (self::$has_init) { return; }
			self::$has_init = true;
			self::$url = dirname(__DIR__) . "/db.sqlite";
		}

		public function __construct() { $this->conn = new SQLite3(self::$url); }
		public function __destruct() { $this->conn->close(); }

		public function q(string $s): SQLite3Result|false { return $this->conn->query($s); }
		public function q1(string $s): int { return (int)$this->conn->querySingle($s); }
	}

	Database::init();
?>
