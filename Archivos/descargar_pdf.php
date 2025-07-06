<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

include 'includes/db_config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID inválido');
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM personajes WHERE id = ?");
$stmt->execute([$id]);
$personaje = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$personaje) {
    die('Personaje no encontrado');
}

$html = "
<html>
<head>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px; }
    .tarjeta {
      border: 5px solid #003366;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      color: #003366;
    }
    .tarjeta h1 { font-size: 26px; color: #ffcc00; }
    .tarjeta img { width: 200px; height: auto; border-radius: 8px; margin: 10px auto; }
    .dato { font-size: 18px; margin: 5px 0; }
  </style>
</head>
<body>
  <div class='tarjeta'>
    <h1>Perfil de {$personaje['nombre']}</h1>
    <img src='{$personaje['foto']}' alt='Foto'>
    <p class='dato'><strong>Color:</strong> {$personaje['color']}</p>
    <p class='dato'><strong>Tipo:</strong> {$personaje['tipo']}</p>
    <p class='dato'><strong>Nivel:</strong> {$personaje['nivel']}</p>
  </div>
</body>
</html>
";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("personaje_{$id}.pdf", ["Attachment" => false]);
exit;
