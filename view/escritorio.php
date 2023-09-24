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
                  <label for="appt" class="form-label">Seleccione la hora</label>
                  <input type="time" class="form-control"  id="appt" name="appt">


               </div>
               
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

