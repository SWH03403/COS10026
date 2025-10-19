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

		public function query(string $stmt, array $args): array {
			$query = $this->conn->prepare($stmt);
			foreach ($args as $idx => $arg) {
				$type = match (gettype($arg)) {
					'NULL' => SQLITE3_NULL,
					'double' => SQLITE3_FLOAT,
					'integer' => SQLITE3_INTEGER,
					'string' => SQLITE3_TEXT,
					default => exit, // FIX: Be descriptive.
				};
				if (is_string($arg)) { $arg = SQLite3::escapeString($arg); }
				$query->bindValue($idx + 1, $arg, $type);
			}
			$result = $query->execute();
			$result->finalize();
			$rows = [];
			while ($row = $result->fetchArray(SQLITE3_ASSOC)) { array_push($rows, $row); }
			return $rows;
		}
	}

	Database::init();
?>
