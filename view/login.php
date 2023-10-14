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
      <form id="frmAcceso">
        <div class="mb-3">
          <input type="text" class="form-control form-control-lg" id="logina" aria-describedby="emailHelp" placeholder="Ingresa tu usuario">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control form-control-lg" id="clavea" placeholder="Contraseña">
          
        </div>
        
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
      </form>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/lib/jquery/jquery.min.js"></script>
    <script src="../public/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="script/login.js"></script>
</body>
</html>

