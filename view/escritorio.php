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
                     
                     <input type="text" class="form-control" id="id" name="id" hidden>
                  </div>
                  
                  


                  <div class="form-floating mb-3">
                     
                     <input type="text" class="form-control" id="start" name="start" hidden>
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
                    <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                     <input type="hidden" name="imagenactual" id="imagenactual">
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
      

      <!-- modal para mostrar el corte -->   


      <div class="modal fade" id="modalCorte" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modelCorte" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titleLabel">hola</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form action="">
                <div class="mb-3 mt-3">
                 
                  <input type="text" hidden class="form-control" id="id_corte" name="id_corte">
                </div>
                <div class="mb-3 mt-3">
                  <label for="fecha_corte" class="form-label">Fecha:</label>
                  <input type="text" class="form-control" id="fecha_corte" name="fecha_corte" readonly>
                </div>
                <div class="mb-3">
                  <label for="tipo_corte" class="form-label">Tipo de corte:</label>
                  <input type="text" class="form-control" id="tipo_corte" name="tipo_corte" readonly>
                </div>

                <div class="mb-3">
                  
                    <label for="">Referencia del corte</label>
                      <div class="col-sm-10">
                        
                        <input type="hidden" name="imagenactual1" id="imagenactual1">
                        <img src="" width="350px" height="290px" id="imagenmuestra1">
                      </div>
                </div>
                
              

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelarform()">Cerrar</button>
             
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

