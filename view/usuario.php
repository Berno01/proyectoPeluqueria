<?php
//Activamos el almacenamiento en el buffer
require 'header.php';
ob_start();

if (!isset($_SESSION["nombre_usuario"]))
{
  header("Location: login.php");
}
else
{

if ($_SESSION['rol_usuario']==0)
{
?> 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content" id="miniaresult">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Clientes &nbsp; 
                                        
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body" id="listadoregistros">
                                    <h4 class="card-title">Listado de Registros</h4>
                                    <table id="data-table" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>Nombre</th>
                                            <th>Celular</th>
                                            <th>Login</th>
                                            <th>Fallos</th>
                                            <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                <div class="modal fade" id="edit_usuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit_usuario" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Editar usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="card-body" id="formularioregistros">
                                            <form name="formulario" id="formulario" method="POST">

                                                <div class="form-outline mb-4">
                                                    <div class="form-outline">
                                                        <label for="nombre_usuario">Nombre: </label>
                                                        <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Nombre"/>  
                                                        <input type="text" id="id_usuario" hidden>
                                                    </div>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <div class="form-outline">
                                                        <label for="apellidop_usuario">Apellido: </label>
                                                        <input type="text" id="apellidop_usuario" name="apellidop_usuario" class="form-control" placeholder="Apellido"/>
                                                    </div>
                                                </div>
                                            
                            <!-- usuario input -->
                                            <div class="form-outline mb-4">
                                                <label for="telef_usuario">Número de celular: </label>
                                                <input type="text" id="telef_usuario" name="telef_usuario" class="form-control" placeholder="Número de celular"/>
                                            </div>
                                            <!-- usuario input -->
                                            <div class="form-outline mb-4">
                                                <label for="login_usuario">Login: </label>
                                                <input type="text" id="login_usuario" name="login_usuario" class="form-control" placeholder="Usuario"/>
                                            </div>
                       
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="bx bx-save"></i> Guardar</button>
                                                <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    
                                        </div> <!--aqui acaba el modal-->
                                      </div>
                                       
                                    </div>
                                  </div>
                                </div>
                                
                                



                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->   
                    </div>         
                </div>
            </div>    
            <?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="../public/js/validacion.js"></script>   
<script type="text/javascript" src="script/usuario.js"></script>   
<?php 
}
ob_end_flush();
?> 