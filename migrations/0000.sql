CREATE TABLE IF NOT EXISTS user(
	id INTEGER PRIMARY KEY,
	name TEXT NOT NULL CHECK(LENGTH(name) <= 50),
	email TEXT NOT NULL CHECK(LENGTH(email) <= 100),
	active BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS post(
	id INTEGER PRIMARY KEY,
	user_id INTEGER NOT NULL REFERENCES user(id),
	title TEXT NOT NULL CHECK(LENGTH(title) <= 100),
	content TEXT NOT NULL
);

INSERT INTO user(name, email, active) VALUES
	('alex', 'alex@email.com', TRUE),
	('mia', 'mia@email.com', FALSE);

INSERT INTO post(user_id, title, content) VALUES
	(1, 'First Post', 'This is my first blog post.'),
	(2, 'Hello World', 'Mia is testing her first post.');
