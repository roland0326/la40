<?php 
	require_once 'views/inc/main.php';//contiene las otras partes de los estructura 
	if (!empty($datos)) {
		foreach ($datos as $row) {
			$Ident=$row['encpre_codprecio'];
			$Nombre=$row['encpre_descripcion'];			
		}
	}else{
		$Ident='';
	}
?>
    <!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->
	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=compras&a=LoadContenedor">Modulo Compras</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Compras</li>
	</ol>
	<div class="Menu-add d-flex justify-content-start">		
		<a href="index.php?c=compras&a=LoadDocCompras" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
				<form action="#" method="POST">	
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Creacion orden de compra</h4>
							<hr>
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Identificacion:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtIdent" <?php if($Ident!=''){echo 'value="'.$Ident.'"'; }?> readonly>
								</div>				
						</div>
												
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Nombre:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtNom" <?php if($Ident!=''){echo 'value="'.$Nombre.'"'; }?> readonly>
								</div>				
						</div>	
						<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Direccion:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDir" <?php if($Ident!=''){echo 'value="'.$Nombre.'"'; }?> readonly maxlength="30">
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