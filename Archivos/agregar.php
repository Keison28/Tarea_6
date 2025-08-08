<?php include 'includes/db_config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container mt-5">
  <div class="card shadow-lg p-4 border-primary border-2">
    <h2 class="text-center text-primary mb-4">✨ Agregar Nuevo Personaje - One Piece ✨</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $color = $_POST['color'] ?? '';
        $tipo = $_POST['tipo'] ?? '';
        $nivel = $_POST['nivel'] ?? '';
        $foto = '';

        // Guardar imagen
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
            $nombreFoto = time() . '_' . basename($_FILES['foto']['name']);
            $rutaDestino = 'assets/img/' . $nombreFoto;
            move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);
            $foto = $rutaDestino;
        }

        // Insertar en la base de datos
        $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $color, $tipo, $nivel, $foto]);

        echo '<div class="alert alert-success text-center">Personaje agregado exitosamente!</div>';
    }
    ?>

    <form method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del personaje</label>
        <input type="text" class="form-control" name="nombre" unique required>
      </div>
      <div class="mb-3">
        <label for="color" class="form-label">Color representativo</label>
        <input type="text" class="form-control" name="color">
      </div>
      <div class="mb-3">
        <label for="tipo" class="form-label">Tipo / Raza / Rol</label>
        <input type="text" class="form-control" name="tipo">
      </div>
      <div class="mb-3">
        <label for="nivel" class="form-label">Nivel / Jerarquía</label>
        <input type="number" class="form-control" name="nivel" min="1">
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label">Foto del personaje</label>
        <input type="file" class="form-control" name="foto" accept="image/*">
      </div>
      <button type="submit" name="create" class="btn btn-primary w-100">Agregar Personaje ➕</button>
    </form>

    <div class="text-center mt-3">
      <a href="index.php" name="index" class="btn btn-secondary">Volver al inicio</a>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
