<?php 
	require_once 'views/inc/main.php';//contiene las otras partes de los estructura 
	require_once 'Funciones_globales/Funciones_globales.php';
	if (!empty($datos)) {
		foreach ($datos as $row) {
			$codigo=$row['pro_codigo'];
			$estado=$row['pro_estado'];
			$descrip=$row['pro_descripcion'];
			$descrip2=$row['pro_descrip2'];
			$categoria=$row['pro_categoria'];
			$precio=$row['pro_margen_precio'];
			$undmed=$row['pro_unidadmed'];
			//echo $undmed;
		}
	}else{
		$codigo='';
	}
?>
<?php 
	$funciones=new Funciones_globales;
	$comboUndMed=$funciones->LoadComboUndMed();//con este metodo cargo los datoa para el multivaluada de unidad de medida
	$comboCategoria=$funciones->LoadComboCategoria();
	//print_r($funciones->LoadComboUndMed());
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
		<a href="index.php?c=productos&a=loadProducto" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
				<form action="index.php?c=productos&a=CrudProducto&id=<?php if($codigo!=''){echo '2'; } else {echo '1';}?>" method="POST">	
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Ingreso de productos</h4>
							<hr>
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Codigo:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCodigo" <?php if($codigo!=''){echo 'value="'.$codigo.'" readonly'; }?> >
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Estado:</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtEstado" maxlength="30"	 required>-->
									<select name="TxtEstado" id="TxtEstado" class="form-control" <?php if($codigo!=''){echo 'value="'.$estado.'"'; }?> >
									<?php 
										if($codigo!='')
											{ 
												
												if ($estado=='1') {
									?>
													<option value="1" selected="selected">Habilitado</option>
													<option value="0">Inhabilitado</option>
									<?php
												}else{
									?>
													<option value="1">Habilitado</option>
													<option value="0" selected="selected">Inhabilitado</option>
									<?php
												}
												
											}else{
									?>
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
									<?php
											}
									?>
										
										
									</select>
								</div>				
						</div>						
						<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Descripcion:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDescrip" <?php if($codigo!=''){echo 'value="'.$descrip.'"'; }?> maxlength="15">
								</div>				
						</div>	
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Descrip Fac:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDescrip2" <?php if($codigo!=''){echo 'value="'.$descrip2.'"'; }?> maxlength="20" required>
								</div>				
						</div>					
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Categoria:</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtCategoria" maxlength="20" required>-->
									<select name="TxtCategoria" id="TxtCategoria" class="form-control" <?php if($codigo!=''){echo 'value="'.$categoria.'"'; }?>>
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboCategoria)) {
												foreach ($comboCategoria as $row) {
										?>	
											<option value="<?=$row['nombre'];?>" <?php if($codigo!=''){ if($row['nombre']==$categoria){echo 'selected="selected" ';} }?> ><?="[".$row['nombre']."]-".$row['descripcion'];?></option>
										<?php
												}//fin foreach	
											}//fin if
										?>
									</select>
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Max. Precio:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCodLisPrecio" maxlength="20" <?php if($codigo!=''){echo 'value="'.$precio.'"'; }?>>
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Und. Medida:</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtUndMed" maxlength="20">-->
									<select name="TxtUndMed" id="TxtUndMed" class="form-control" <?php if($codigo!=''){echo 'value="'.$undmed.'"'; }?>>
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboUndMed)) {
												foreach ($comboUndMed as $row) {
										?>	
											<option value="<?=$row['umed_sigla'];?>" <?php if($codigo!=''){ if($row['umed_sigla']==$undmed){echo 'selected="selected" ';} }?> ><?=$row['umed_sigla']."-".$row['umed_descripcion'];?></option>
										<?php
												}//fin foreach	
											}//fin if
										?>
									</select>
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