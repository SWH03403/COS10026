<?php
const MIGRATIONS_TABLE = '__migrations';

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

$get_migration = function(int $idx) {
	$base = str_pad("$idx", 4, "0", STR_PAD_LEFT);
	return MIGRATIONS_DIR . "/$base.sql";
};

$db = new Database();
$db->query('CREATE TABLE IF NOT EXISTS ' . MIGRATIONS_TABLE . '(
	idx INTEGER PRIMARY KEY
) WITHOUT ROWID;');
$migrations = $db->query('SELECT * FROM ' . MIGRATIONS_TABLE);
$indexed = [];
foreach ($migrations as $row) { $indexed[$row['idx']] = true; }

foreach (range(0, 9999) as $idx) {
	$file = $get_migration($idx);
	if (!is_readable($file)) { break; }
	if (isset($indexed[$idx])) { continue; }
	$data = file_get_contents($file);
	foreach (explode(';', $data) as $stmt) {
		$stmt = trim($stmt);
		if (empty($stmt)) { continue; }
		$db->query("$stmt;");
	}
	$db->query('INSERT INTO ' . MIGRATIONS_TABLE . ' VALUES (?)', [$idx]);
}

unset($data);
unset($db);
unset($file);
unset($get_migration);
unset($indexed);
unset($migrations);
