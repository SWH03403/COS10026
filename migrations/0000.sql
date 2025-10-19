CREATE TABLE IF NOT EXISTS car(
	id INTEGER PRIMARY KEY,
	make TEXT NOT NULL
		CHECK(LENGTH(make) <= 25),
	model TEXT NOT NULL
		CHECK(LENGTH(model) <= 40),
	price INTEGER NOT NULL, -- Fixed-point (e=2)
	year INTEGER NOT NULL -- Manufacture year
);

-- Lab-provided data
INSERT INTO car(make, model, price, year) VALUES
	('BMW', 'X3', 35e5, 2010),
	('Ford', 'Falcon', 39e5, 2013),
	('Holden', 'Astra', 14e5, 2009),
	('Holden', 'Commodore', 28e5, 2009),
	('Toyota', 'Corolla', 20e5, 2012);

-- AI-generated data
INSERT INTO car(make, model, price, year) VALUES
	('Audi', 'A4', 40e5, 2023),
	('BMW', '3 Series', 42e5, 2023),
	('Chevrolet', 'Equinox', 28e5, 2023),
	('Chevrolet', 'Silverado', 42.5e5, 2022),
	('Ford', 'Escape', 29e5, 2023),
	('Ford', 'Mustang', 45e5, 2022),
	('Honda', 'Accord', 30e5, 2023),
	('Hyundai', 'Elantra', 25e5, 2023),
	('Infiniti', 'QX50', 43e5, 2023),
	('Jaguar', 'F-Pace', 60e5, 2022),
	('Kia', 'Sorento', 35.5e5, 2023),
	('Land', 'Rover Discovery', 60.5e5, 2022),
	('Lexus', 'RX', 50e5, 2022),
	('Mazda', 'CX-5', 33.5e5, 2023),
	('Mercedes-Benz', 'C-Class', 45e5, 2022),
	('Nissan', 'Altima', 28.5e5, 2023),
	('Nissan', 'Rogue', 28e5, 2023),
	('Porsche', 'Macan', 60e5, 2022),
	('Subaru', 'Forester', 30e5, 2023),
	('Subaru', 'Outback', 38e5, 2023),
	('Tesla', 'Model 3', 35e5, 2023),
	('Toyota', 'Camry', 27e5, 2023),
	('Toyota', 'RAV4', 30.5e5, 2023),
	('Volkswagen', 'Jetta', 24e5, 2022),
	('Volvo', 'XC60', 43e5, 2023);
