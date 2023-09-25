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
            <form id="formulario" action="">
                <div class="modal-body">
                  <div class="form-floating mb-3">
                     <label for="start" class="form-label">fecha</label>
                     <input type="text" class="form-control" id="start" >
                  </div>

                  <div class="form-floating mb-3">
                    <label for="appt" class="form-label">Seleccione la hora</label>
                    <input type="time" class="form-control"  id="appt" name="appt">
                  </div>
                  
                  <div class="form-floating mb-3">
                    <label class="form-label">Seleccione el tipo de corte</label>
                    <select id="selectCorte" name="selectCorte" class="form-select">
                      <option id="0">Corte normal</option>
                      <option id="1">Corte con diseño personalizado</option>
                    </select>
                  </div>
                

                  <div class="form-floating mb-3">
                    <label for="appt" class="form-label">Sube una foto de referencia</label>
                    <input type="file">
                  </div>

                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
               
            </form>
            
             
          </div>
        </div>
      </div>
      
      <!-- end content section -->    
        
<?php
    require 'footer.php';
?>  
<!-- añadimos su js -->
<script src="script/escritorio.js"></script>

