<?php
require_once '../src/Cliente.php';
require_once '../src/db.php';

$cliente = new Cliente($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        $cliente->crear($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono']);
    } elseif (isset($_POST['actualizar'])) {
        $cliente->actualizar($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono']);
    } elseif (isset($_POST['eliminar'])) {
        $cliente->eliminar($_POST['id']);
    }
}

$clientes = $cliente->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Clientes</h1>
    <nav>
        <a href="index.php">Volver al Index</a>
    </nav>
    <form method="POST" action="clientes.php">
        <input type="hidden" name="id" id="cliente-id">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['nombre']; ?></td>
                        <td><?php echo $cliente['apellido']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td><?php echo $cliente['telefono']; ?></td>
                        <td>
                            <form method="POST" action="clientes.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
                                <button type="submit" name="eliminar">Eliminar</button>
                            </form>
                            <button onclick="editarCliente(<?php echo $cliente['id']; ?>, '<?php echo $cliente['nombre']; ?>', '<?php echo $cliente['apellido']; ?>', '<?php echo $cliente['email']; ?>', '<?php echo $cliente['telefono']; ?>')">Editar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="js/scripts.js"></script>
</body>
</html>
