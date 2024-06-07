<?php
require_once 'db.php';

class Cliente {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear($nombre, $apellido, $email, $telefono) {
        $stmt = $this->conn->prepare("INSERT INTO clientes (nombre, apellido, email, telefono) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $apellido, $email, $telefono);
        return $stmt->execute();
    }

    public function obtenerTodos() {
        $result = $this->conn->query("SELECT * FROM clientes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function actualizar($id, $nombre, $apellido, $email, $telefono) {
        $stmt = $this->conn->prepare("UPDATE clientes SET nombre=?, apellido=?, email=?, telefono=? WHERE id=?");
        $stmt->bind_param("ssssi", $nombre, $apellido, $email, $telefono, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM clientes WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
