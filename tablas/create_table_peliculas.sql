-- \. /var/www/html/lanzarote.lan/tablas/create_table_peliculas.sql


-- Creación de la tabla peliculas
CREATE TABLE peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    director VARCHAR(100) NOT NULL,
    anio_estreno INT NOT NULL,
    genero VARCHAR(50) NOT NULL,
    duracion INT NOT NULL -- Duración en minutos
);

-- Inserción de 30 registros de películas emblemáticas
INSERT INTO peliculas (titulo, director, anio_estreno, genero, duracion) VALUES
('El Padrino', 'Francis Ford Coppola', 1972, 'Crimen', 175),
('El Señor de los Anillos: La Comunidad del Anillo', 'Peter Jackson', 2001, 'Fantasía', 178),
('Pulp Fiction', 'Quentin Tarantino', 1994, 'Crimen', 154),
('El Caballero de la Noche', 'Christopher Nolan', 2008, 'Acción', 152),
('Forrest Gump', 'Robert Zemeckis', 1994, 'Drama', 142),
('Origen', 'Christopher Nolan', 2010, 'Ciencia ficción', 148),
('Matrix', 'Lana Wachowski', 1999, 'Ciencia ficción', 136),
('Star Wars: Episodio IV - Una nueva esperanza', 'George Lucas', 1977, 'Ciencia ficción', 121),
('Interstellar', 'Christopher Nolan', 2014, 'Ciencia ficción', 169),
('El viaje de Chihiro', 'Hayao Miyazaki', 2001, 'Animación', 125),
('Parásitos', 'Bong Joon-ho', 2019, 'Thriller', 132),
('Gladiator', 'Ridley Scott', 2000, 'Acción', 155),
('Titanic', 'James Cameron', 1997, 'Romance', 195),
('Jurassic Park', 'Steven Spielberg', 1993, 'Aventura', 127),
('El Rey León', 'Roger Allers', 1994, 'Animación', 88),
('Volver al futuro', 'Robert Zemeckis', 1985, 'Aventura', 116),
('Cadena perpetua', 'Frank Darabont', 1994, 'Drama', 142),
('La lista de Schindler', 'Steven Spielberg', 1993, 'Drama', 195),
('Seven', 'David Fincher', 1995, 'Thriller', 127),
('El silencio de los inocentes', 'Jonathan Demme', 1991, 'Thriller', 118),
('Whiplash', 'Damien Chazelle', 2014, 'Drama', 106),
('La La Land', 'Damien Chazelle', 2016, 'Musical', 128),
('Spider-Man: Un nuevo universo', 'Bob Persichetti', 2018, 'Animación', 117),
('Coco', 'Lee Unkrich', 2017, 'Animación', 105),
('Toy Story', 'John Lasseter', 1995, 'Animación', 81),
('Avatar', 'James Cameron', 2009, 'Ciencia ficción', 162),
('Bastardos sin gloria', 'Quentin Tarantino', 2009, 'Bélica', 153),
('El club de la pelea', 'David Fincher', 1999, 'Drama', 139),
('Terminator 2: El juicio final', 'James Cameron', 1991, 'Acción', 137),
('Alien, el octavo pasajero', 'Ridley Scott', 1979, 'Terror', 117);