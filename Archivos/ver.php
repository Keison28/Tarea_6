<?php
include 'includes/db_config.php';
include 'includes/header.php';

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
?>

<div class="card mb-4 shadow-sm">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= htmlspecialchars($personaje['foto']); ?>" alt="Foto" class="img-fluid rounded-start" style="object-fit: cover; height: 100%">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title text-primary">Nombre: <?= htmlspecialchars($personaje['nombre']); ?></h3>
        <p class="card-text"><strong>Color Representativo:</strong> <?= htmlspecialchars($personaje['color']); ?></p>
        <p class="card-text"><strong>Tipo:</strong> <?= htmlspecialchars($personaje['tipo']); ?></p>
        <p class="card-text"><strong>Nivel:</strong> <?= htmlspecialchars($personaje['nivel']); ?></p>
        <a href="index.php" class="btn btn-secondary">Volver</a>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
