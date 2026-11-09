-- \. /var/www/html/lanzarote.lan/tablas/create_table_usuarios.sql


DROP TABLE usuarios;
CREATE TABLE usuarios(

    id int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255) not null,
    apellido1 varchar(255) not null,
    apellido2 varchar(255) not null,

    fecha_nacimiento date not null,
    email char(255),

    -- DATOS AUDITORIA  --

    usuario_alta  varchar(255),
    fecha_alta    DATETIME,
    ip_alta       CHAR(15),
    usuario_modi  varchar(255),
    fecha_modi    DATETIME,
    ip_modi       CHAR(15)
);


INSERT INTO usuarios(nombre, apellido1, apellido2, fecha_nacimiento, email) VALUES
('Juanra', 'Curbelo', 'Arrocha', '1995-04-12', 'juan.curbelo@cifpzonzamas.es'),
('Carlos', 'García', 'López', '1995-04-12', 'carlos.garcia@gmail.com'),
('María', 'Fernández', 'Martín', '1998-07-23', 'maria.fernandez@gmail.com'),
('Javier', 'Rodríguez', 'Sánchez', '1992-11-05', 'javier.rodriguez@gmail.com'),
('Lucía', 'Pérez', 'Gómez', '2000-02-18', 'lucia.perez@gmail.com'),
('Daniel', 'Martínez', 'Ruiz', '1997-09-30', 'daniel.martinez@gmail.com'),
('Sofía', 'López', 'Díaz', '2001-06-14', 'sofia.lopez@gmail.com'),
('Alejandro', 'Sánchez', 'Moreno', '1994-12-03', 'alejandro.sanchez@gmail.com'),
('Paula', 'Gómez', 'Jiménez', '1999-03-27', 'paula.gomez@gmail.com'),
('David', 'Díaz', 'Romero', '1996-08-09', 'david.diaz@gmail.com'),
('Elena', 'Moreno', 'Alonso', '2002-01-16', 'elena.moreno@gmail.com'),
('Pablo', 'Muñoz', 'Gutiérrez', '1993-05-21', 'pablo.munoz@gmail.com'),
('Laura', 'Romero', 'Navarro', '1998-10-11', 'laura.romero@gmail.com'),
('Adrián', 'Alonso', 'Torres', '1991-07-08', 'adrian.alonso@gmail.com'),
('Carmen', 'Gutiérrez', 'Vázquez', '2000-04-25', 'carmen.gutierrez@gmail.com'),
('Sergio', 'Navarro', 'Castro', '1995-02-13', 'sergio.navarro@gmail.com'),
('Andrea', 'Torres', 'Ortega', '1997-11-19', 'andrea.torres@gmail.com'),
('Miguel', 'Vázquez', 'Ramos', '1990-06-06', 'miguel.vazquez@gmail.com'),
('Claudia', 'Castro', 'Gil', '2001-09-22', 'claudia.castro@gmail.com'),
('Álvaro', 'Ortega', 'Serrano', '1996-12-15', 'alvaro.ortega@gmail.com'),
('Isabel', 'Ramos', 'Molina', '1999-08-31', 'isabel.ramos@gmail.com');