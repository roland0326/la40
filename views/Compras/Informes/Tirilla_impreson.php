<?php 
	require_once 'views/inc/main.php';//contiene las otras partes de los estructura 
	require_once 'Funciones_globales/Funciones_globales.php';
	if (!empty($datos)) {
		foreach ($datos as $row) {
			$n_documento=$row['cli_documento'];
			$tipodoc=$row['cli_tipodocumento'];
			$razon=$row['cli_razonsocial'];
			$direccion=$row['cli_direccion'];
			$telefono=$row['cli_telefono'];
			$celular=$row['cli_celular'];
			$correo=$row['cli_correo'];
			$ciudad=$row['cli_ciudad'];
			$pais=$row['cli_pais'];
			$estado=$row['cli_estado'];
			$codlista=$row['cli_codlista'];
			
			
			
			//echo $undmed;
		}
	}else{
		$n_documento='';
	}
?>
<?php 
	$funciones=new Funciones_globales;
	$comboTipodoc=$funciones->LoadComboTipodcto();//con este metodo cargo los datoa para el multivaluada de tipo documento
	$comboCiudad=$funciones->LoadComboCiudad();
	$comboPais=$funciones->LoadComboPais();
	$comboLista=$funciones->LoadComboLista();
	//$comboCategoria=$funciones->LoadComboCategoria();
	//print_r($funciones->LoadComboUndMed());
?>
    <!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->
	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=clientes&a=LoadContenedorClientes">Modulo Clientes</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Creacion de clientes</li>
	</ol>
	<div class="Menu-add d-flex justify-content-start">		
		<a href="index.php?c=clientes&a=loadCliente" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
				<form action="index.php?c=clientes&a=CrudCliente&id=<?php if($n_documento!=''){echo '2'; } else {echo '1';}?>" method="POST">	
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Ingreso de Clientes</h4>
							<hr>
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>N° de Documento</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtNdoc" <?php if($n_documento!=''){echo 'value="'.$n_documento.'" readonly'; }?> >
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Tipo de documento</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtEstado" maxlength="30"	 required>-->
									<select name="TxtTipodoc" id="TxtTipodoc" class="form-control" <?php if($n_documento!=''){echo 'value="'.$tipodoc.'"'; }?>>
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboTipodoc)) {
												foreach ($comboTipodoc as $row) {
										?>	
											<option value="<?=$row['tipdoc_id'];?>" <?php if($n_documento!=''){ if($row['tipdoc_id']==$tipodoc){echo 'selected="selected" ';} }?> ><?="[".$row['tipdoc_id']."]-".$row['tipdoc_descripcion'];?></option>
										<?php
												}//fin foreach	
											}//fin if
										?>
									</select>
								</div>				
						</div>						
						<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Razon social</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtRazon" <?php if($n_documento!=''){echo 'value="'.$razon.'"'; }?> maxlength="45">
								</div>				
						</div>	
						<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Dirección</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDireccion" <?php if($n_documento!=''){echo 'value="'.$direccion.'"'; }?> maxlength="45">
								</div>				
						</div>	
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Telefono</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtTelefono" <?php if($n_documento!=''){echo 'value="'.$telefono.'"'; }?> maxlength="20" required>
								</div>				
						</div>					
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Celular</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCelular" <?php if($n_documento!=''){echo 'value="'.$celular.'"'; }?> maxlength="20" required>
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Correo electronico</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCorreo" maxlength="45" <?php if($n_documento!=''){echo 'value="'.$correo.'"'; }?>>
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Ciudad</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtUndMed" maxlength="20">-->
									<select name="TxtCiudad" id="TxtCiudad" class="form-control" <?php if($n_documento!=''){echo 'value="'.$ciudad.'"'; }?>>
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboCiudad)) {
												foreach ($comboCiudad as $row) {
										?>	
											<option value="<?=$row['ciu_id'];?>" <?php if($n_documento!=''){ if($row['ciu_id']==$ciudad){echo 'selected="selected" ';} }?> ><?=$row['ciu_id']."-".$row['ciu_nombre'];?></option>
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
										<label class="btn btn-color"><strong>Pais</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtUndMed" maxlength="20">-->
									<select name="TxtPais" id="TxtPais" class="form-control" <?php if($n_documento!=''){echo 'value="'.$pais.'"'; }?>>
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboPais)) {
												foreach ($comboPais as $row) {
										?>	
											<option value="<?=$row['pa_id'];?>" <?php if($n_documento!=''){ if($row['pa_id']==$pais){echo 'selected="selected" ';} }?> ><?=$row['pa_id']."-".$row['pa_nombre'];?></option>
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
										<label class="btn btn-color"><strong>Especial</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtUndMed" maxlength="20">-->
									<select name="TxtCodlista" id="TxtCodlista" class="form-control" <?php if($n_documento!=''){echo 'value="'.$codlista.'"'; }?>>
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboLista)) {
												foreach ($comboLista as $row) {
										?>	
											<option value="<?=$row['encpre_codprecio'];?>" <?php if($n_documento!=''){ if($row['encpre_codprecio']==$codlista){echo 'selected="selected" ';} }?> ><?=$row['encpre_codprecio']."-".$row['encpre_descripcion'];?></option>
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
										<label class="btn btn-color"><strong>Estado de cliente</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtUndMed" maxlength="20">-->
									<select name="TxtEstado" id="TxtEstado" class="form-control" <?php if($n_documento!=''){echo 'value="'.$estado.'"'; }?> >
									<?php 
										if($n_documento!='')
											{ 
												
												if ($estado=='1') {
									?>
													<option value="1" selected="selected">Activo</option>
													<option value="0">Inactivo</option>
									<?php
												}else{
									?>
													<option value="1">Activo</option>
													<option value="0" selected="selected">Inactivo</option>
									<?php
												}
												
											}else{
									?>
												<option value="1">Activo</option>
												<option value="0">Inactivo</option>
									<?php
											}
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