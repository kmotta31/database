<?php
require_once 'db.php';

class Habitacion {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear($numero, $tipo, $precio) {
        $stmt = $this->conn->prepare("INSERT INTO habitaciones (numero, tipo, precio) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $numero, $tipo, $precio);
        return $stmt->execute();
    }

    public function obtenerTodas() {
        $result = $this->conn->query("SELECT * FROM habitaciones");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function actualizar($id, $numero, $tipo, $precio) {
        $stmt = $this->conn->prepare("UPDATE habitaciones SET numero=?, tipo=?, precio=? WHERE id=?");
        $stmt->bind_param("ssdi", $numero, $tipo, $precio, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM habitaciones WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
