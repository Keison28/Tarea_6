<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - One Piece</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #007bff, #00b4d8);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
            width: 350px;
        }
        .login-card h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        .btn-login {
            background-color: #ff9800;
            color: white;
            border: none;
        }
        .btn-login:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>

<div class="login-card text-center">
    <h2>Iniciar Sesión</h2>
    <form>
        <div class="mb-3 text-start">
            <label class="form-label">Usuario</label>
            <input type="text" name="user" class="form-control" placeholder="Ingresa tu usuario" required>
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Contraseña</label>
            <input type="password" name="pass" class="form-control" placeholder="Ingresa tu contraseña" required>
        </div>
        <a name="login" href="index.php" class="btn btn-login w-100">Confirmar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
