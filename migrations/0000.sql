-- FIX: use a hashed password :3
CREATE TABLE IF NOT EXISTS user(
	name TEXT PRIMARY KEY CHECK(LENGTH(name) <= 50),
	password TEXT NOT NULL CHECK(LENGTH(email) <= 100),
	email TEXT NOT NULL CHECK(LENGTH(email) <= 100)
) WITHOUT ROWID;

INSERT INTO user(name, password, email) VALUES
	('bnqh', 'SWH03403', 'i_love_web_development@swinburne.com');
