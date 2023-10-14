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
      <h2 class="text-center mb-4">Registrar usuario</h2>
      <form name="formulario" id="formulario" method="POST">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Nombre"/>  
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="apellidop_usuario" name="apellidop_usuario" class="form-control" placeholder="Apellido"/>
                    </div>
                  </div>
                </div>
<!-- usuario input -->
                <div class="form-outline mb-4">
                  <input type="text" id="telef_usuario" name="telef_usuario" class="form-control" placeholder="Número de celular"/>
                </div>
                <!-- usuario input -->
                <div class="form-outline mb-4">
                  <input type="text" id="login_usuario" name="login_usuario" class="form-control" placeholder="Usuario"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="clave_usuario" name="clave_usuario" class="form-control" placeholder="Contraseña"/>
                </div>

                <div class="row">
                  
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="bx bx-save"></i> Guardar</button>
                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                    </div>
                  </div>
                </div>
        
      </form>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/lib/jquery/jquery.min.js"></script>
    <script src="../public/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="script/singin.js"></script>
</body>
</html>

