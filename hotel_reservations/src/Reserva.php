<?php
require_once 'db.php';

class Reserva {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear($cliente_id, $habitacion_id, $fecha_inicio, $fecha_fin, $estado) {
        $stmt = $this->conn->prepare("INSERT INTO reservas (cliente_id, habitacion_id, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $cliente_id, $habitacion_id, $fecha_inicio, $fecha_fin, $estado);
        return $stmt->execute();
    }

    public function obtenerTodas() {
        $result = $this->conn->query("SELECT * FROM reservas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function actualizar($id, $cliente_id, $habitacion_id, $fecha_inicio, $fecha_fin, $estado) {
        $stmt = $this->conn->prepare("UPDATE reservas SET cliente_id=?, habitacion_id=?, fecha_inicio=?, fecha_fin=?, estado=? WHERE id=?");
        $stmt->bind_param("iisssi", $cliente_id, $habitacion_id, $fecha_inicio, $fecha_fin, $estado, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM reservas WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
