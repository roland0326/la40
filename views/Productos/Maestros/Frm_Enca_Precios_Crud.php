<?php 
	require_once 'views/inc/main.php';//contiene las otras partes de los estructura 
	if (!empty($datos)) {
		foreach ($datos as $row) {
			$codigo=$row['encpre_codprecio'];
			$descrip=$row['encpre_descripcion'];			
		}
	}else{
		$codigo='';
	}
?>
    <!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->
	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=productos&a=LoadContenedorProductos">Modulo Productos</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Creacion de productos</li>
	</ol>
	<div class="Menu-add d-flex justify-content-start">		
		<a href="index.php?c=productos&a=loadEncPrecios" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
				<form action="index.php?c=productos&a=CrudEncPrecios&id=<?php if($codigo!=''){echo '2'; } else {echo '1';}?>" method="POST">	
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Ingreso Maestro de lista de precios</h4>
							<hr>
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Codigo lista precio:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCodigo" <?php if($codigo!=''){echo 'value="'.$codigo.'" readonly'; }?> maxlength="8" >
								</div>				
						</div>
												
						<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Descripcion:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDescrip" <?php if($codigo!=''){echo 'value="'.$descrip.'"'; }?> maxlength="30">
								</div>				
						</div>					
						<div class="col-xl-12 col-md-12 col-sm-12 text-center mt-4 mb-2">
								<input type="submit" class="btn btn-success" value="Guardar">
						</div>
					</div><!--Fin row-->
				</form>
		</div>
	</div>

<?php 	require_once 'views/inc/footer.php';?>