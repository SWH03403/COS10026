<?php
class Database {
	public function __construct(
		private SQLite3 $conn = new SQLite3(DATABASE_URL),
	) {}
	public function __destruct() { $this->conn->close(); }

	public function query(string $stmt, array $args = []): array {
		$query = $this->conn->prepare($stmt);
		foreach ($args as $idx => $arg) {
			$type = match (gettype($arg)) {
				'NULL' => SQLITE3_NULL,
				'double' => SQLITE3_FLOAT,
				'integer' => SQLITE3_INTEGER,
				'string' => SQLITE3_TEXT,
				default => throw new Exception('Unhandled type: ' . gettype($arg)),
			};
			$query->bindValue($idx + 1, $arg, $type);
		}
		$result = $query->execute();
		if (!str_starts_with($stmt, 'SELECT')) { return []; }
		$rows = [];
		while ($row = $result->fetchArray(SQLITE3_ASSOC)) { array_push($rows, $row); }
		return $rows;
	}
}
