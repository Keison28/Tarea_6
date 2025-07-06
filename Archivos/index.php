<?php include 'includes/db_config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary">🌊 Lista de Personajes - One Piece</h2>
    <a href="agregar.php" class="btn btn-success">+ Agregar Personaje</a>
  </div>

  <?php
  $stmt = $conn->query("SELECT * FROM personajes ORDER BY id DESC");
  $personajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Color</th>
          <th>Tipo</th>
          <th>Nivel</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($personajes as $personaje): ?>
          <tr>
            <td><?= $personaje['id']; ?></td>
            <td>
              <?php if (!empty($personaje['foto'])): ?>
                <img src="<?= htmlspecialchars($personaje['foto']); ?>" width="60" height="60" style="object-fit: cover; border-radius: 50%;">
              <?php else: ?>
                Sin foto
              <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($personaje['nombre']); ?></td>
            <td><span class="badge bg-secondary"> <?= htmlspecialchars($personaje['color']); ?> </span></td>
            <td><?= htmlspecialchars($personaje['tipo']); ?></td>
            <td><?= htmlspecialchars($personaje['nivel']); ?></td>
            <td>
              <a href="editar.php?id=<?= $personaje['id']; ?>" class="btn btn-warning btn-sm mb-1">Editar</a>
              <a href="ver.php?id=<?= $personaje['id']; ?>" class="btn btn-info btn-sm mb-1">Ver</a>
              <a href="descargar_pdf.php?id=<?= $personaje['id']; ?>" class="btn btn-secondary btn-sm mb-1">PDF</a>
              <a href="eliminar.php?id=<?= $personaje['id']; ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('¿Eliminar este personaje?');">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
