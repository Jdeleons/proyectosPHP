<?php  

session_start();
if (isset($_SESSION['usuario'])) {
  include "header.php";	
 
  ?>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">

     <h1 class="display-4">Categorias</h1>
     <div class="row">
      <div class="col-sm-4">
       <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
        <span class="fas fa-plus-circle"></span>Agregar Nueva Categoria
      </span>
    </div>
      
   
  </div>
 
  <hr>
  <div class="row">
    <div class="col-sm-12">

     <div id="tblCategorias"></div>
     
   </div>
 </div>



</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="fmrCategoria">
        	<label>Nombre de la Categoria</label>
        	<input type="text" name="txtNombreCategoria" id="txtNombreCategoria" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal para modificar categorias -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmActualizaCategoria">
        	<input type="text" name="txtIdU" id="txtIdU" hidden="">
        	<label>Categoria</label>
        	<input type="text" name="txtnombreU" id="txtnombreU" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerraActualizarCategoria">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php 

include "footer.php";
?>
<script src="../js/categorias.js"></script>
<script src="../js/tablaGestor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){		

		$('#btnGuardarCategoria').click(function(){
			agregarCategoria();	
   });
		$('#btnActualizaCategoria').click(function(){
			actualizaCategoria();
		});

  });
</script>

<?php

} else {
  header("location:../index.php");
}	

?>