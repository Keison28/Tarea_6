<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One Piece - Gestión de Personajes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #eaf6ff;
      font-family: Arial, sans-serif;
    }
    h1, h2, h3, .navbar-brand {
      font-family: 'Pirata One', cursive;
    }
    .navbar {
      background-color: #003366;
    }
    .navbar .nav-link, .navbar .navbar-brand {
      color: white;
    }
    .navbar .nav-link:hover {
      color: #ffcc00;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.php">☠️ One Piece</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" name="index1" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agregar.php">Agregar Personaje</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="acerca.php">Acerca de</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container mt-4">
