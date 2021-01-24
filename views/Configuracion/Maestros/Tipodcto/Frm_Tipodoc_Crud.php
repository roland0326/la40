<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
    
 <?php
//Validaciones para el manejo del insert y update en la misma vista
	if (!empty($datos)) {
		foreach ($datos as $row) {
			$tipdoc=trim($row['tipdoc_id']);
			$descripcion=trim($row['tipdoc_descripcion']);
		}
	}else{
		$tipdoc='';
	}
?> 
    <!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->
	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				 <a href="index.php?c=configuracion&a=loadconfiguracion">Configuracion</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Creación Tipo de documento</li>
	</ol>
	<div class="Menu-add d-flex justify-content-start" >		
		<a href="index.php?c=configuracion&a=loadTipodoc" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
				<form action="index.php?c=configuracion&a=CrudTipodoc&id=<?php if($tipdoc!='') {echo '2';} else {echo '1';} ?>" method="POST">	
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Ingresando tipo de documento</h4>
							<hr>
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12" <?php if($tipdoc==''){ echo 'hidden';}?> >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>ID:</strong></label>
									</div>
									<input type="text" class="form-control" name="ID" id="ID" <?php if($tipdoc!=''){ echo 'value="'.$tipdoc.'" readonly ';}?> >
								</div>				
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Descripción:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDescrip" id="TxtDescrip" <?php if($tipdoc!=''){ echo 'value="'.$descripcion.'"';}?> style="text-transform:uppercase;" >
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