<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Inicio de Sesión</title>
  <style>
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      background-image: url('../file/cortes/logo.jpg'); /* Reemplaza con la URL de tu imagen */
      background-size: cover;
    }

    .login-card {
      max-width: 1000px; /* Ajusta el valor según tus necesidades */
      width: 100%;
      background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente */
      padding: 50px; /* Ajusta el valor según tus necesidades */
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="login-card">
      <h2 class="text-center mb-4">Inicio de Sesión</h2>
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Recordarme</label>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

