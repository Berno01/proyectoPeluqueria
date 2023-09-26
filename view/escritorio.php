<?php
    require 'header.php';
?>  
      <!-- content section -->
      <div class="container">
         <div id='calendar'></div>
      </div>
      
      <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titulo">Agendar corte</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form name="formulario" id="formulario" method="POST">
                <div class="modal-body">

                  <div class="form-floating mb-3">
                     <label for="id" class="form-label">Identificador</label>
                     <input type="text" class="form-control" id="id" name="id">
                  </div>
                  
                  <div class="form-floating mb-3">
                     <label for="title" class="form-label">titulo</label>
                     <input type="text" class="form-control" id="title" name="title">
                  </div>


                  <div class="form-floating mb-3">
                     <label for="start" class="form-label">fecha start</label>
                     <input type="text" class="form-control" id="start" name="start">
                  </div>

                  <div class="form-floating mb-3">
                    <label for="hora" class="form-label">Seleccione la hora</label>
                    <input type="time" class="form-control"  id="hora" name="hora">
                  </div>
                  
                  <div class="form-floating mb-3">
                    <label class="form-label">Seleccione el tipo de corte</label>
                    <select id="descripcion1" name="descripcion1" class="form-select">
                      <option value="0">Corte normal</option>
                      <option value="1">Corte con diseño personalizado</option>
                    </select>
                  </div>
                

                  <div class="form-floating mb-3">
                  <label for="">Selecciona una foto de referencia:</label>
                    <input type="file" id="imagen" name="imagen" required>
                    <input type="text" id="descripcion2" name="descripcion2" hidden name="descripcion2">
                  </div>

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelarform()">Cerrar</button>
                  <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
                  </form>
                </div>
               
            
            
             
          </div>
        </div>
      </div>
      
      <!-- end content section -->    
        
<?php
    require 'footer.php';
?>  
<!-- añadimos su js -->
<script src="script/escritorio.js"></script>

