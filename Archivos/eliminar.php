<?php
include 'includes/db_config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('ID inválido'); window.location.href='index.php';</script>";
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM personajes WHERE id = ?");
$stmt->execute([$id]);

echo "<script>alert('Personaje eliminado correctamente'); window.location.href='index.php';</script>";
