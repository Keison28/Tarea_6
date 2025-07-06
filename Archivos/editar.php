<?php
include 'includes/db_config.php';
include 'includes/header.php';

// Verificar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID inválido.</div>";
    include 'includes/footer.php';
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM personajes WHERE id = ?");
$stmt->execute([$id]);
$personaje = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$personaje) {
    echo "<div class='alert alert-danger'>Personaje no encontrado.</div>";
    include 'includes/footer.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];
    $foto = $personaje['foto'];

    // Subida de imagen
    if (!empty($_FILES['foto']['name'])) {
        $archivo = $_FILES['foto']['tmp_name'];
        $nombreArchivo = 'fotos/' . basename($_FILES['foto']['name']);
        move_uploaded_file($archivo, $nombreArchivo);
        $foto = $nombreArchivo;
    }

    $stmt = $conn->prepare("UPDATE personajes SET nombre=?, color=?, tipo=?, nivel=?, foto=? WHERE id=?");
    $stmt->execute([$nombre, $color, $tipo, $nivel, $foto, $id]);

    echo "<div class='alert alert-success'>Personaje actualizado correctamente.</div>";
    echo "<a href='index.php' class='btn btn-primary mt-3'>Volver a la lista</a>";
    include 'includes/footer.php';
    exit;
}
?>

<h2 class="text-warning">Editar Personaje</h2>
<form action="" method="POST" enctype="multipart/form-data" class="row g-3" autocomplete="off">
  <div class="col-md-6">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($personaje['nombre']); ?>" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Color</label>
    <input type="text" name="color" value="<?= htmlspecialchars($personaje['color']); ?>" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Tipo</label>
    <input type="text" name="tipo" value="<?= htmlspecialchars($personaje['tipo']); ?>" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Nivel</label>
    <input type="number" name="nivel" value="<?= htmlspecialchars($personaje['nivel']); ?>" class="form-control" required>
  </div>
  <div class="col-md-12">
    <label class="form-label">Foto (dejar en blanco para no cambiar)</label>
    <input type="file" name="foto" class="form-control">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </div>
</form>

<?php include 'includes/footer.php'; ?>
