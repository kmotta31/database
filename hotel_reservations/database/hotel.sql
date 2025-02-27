CREATE DATABASE IF NOT EXISTS hotel_reservations;
USE hotel_reservations;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL
);


CREATE TABLE habitaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(50) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    habitacion_id INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    estado ENUM('confirmada', 'pendiente', 'cancelada') NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (habitacion_id) REFERENCES habitaciones(id)
);
