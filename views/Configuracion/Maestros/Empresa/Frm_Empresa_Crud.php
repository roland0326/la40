<?php 
	require_once 'views/inc/main.php';//contiene las otras partes de los estructura 
	require_once 'Funciones_globales/Funciones_globales.php';
	$funciones=new Funciones_globales;
?>
  <?php
//Validaciones para el manejo del insert y update en la misma vista
	if (!empty($datos)) {
		foreach ($datos as $row) {
			$id=trim($row['emp_id']);			
			$tipodoc=trim($row['emp_tipo_documento']);
			$nit=trim($row['emp_nit']);
			$razon=trim($row['emp_razon_social']);
			$direccion=trim($row['emp_direccion']);
			$telefono=trim($row['emp_telefono']);
			$celular=trim($row['emp_celular']);
			$correo=trim($row['emp_correo']);
			$url=trim($row['emp_url']);
			$logo=trim($row['emp_logo']);

		}
	}else{
		$id='';
	}
$comboTipodcto=$funciones->LoadComboTipodcto();

?>  
    <!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->
	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=configuracion&a=loadconfiguracion">
				  	Configuración</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Creacion de empresa</li>
	</ol>
	<div class="Menu-add d-flex justify-content-start">		
		<a href="index.php?c=configuracion&a=loadEmpresa" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
				<form action="index.php?c=configuracion&a=CrudEmpresa&id=<?php if($id!='') {echo '2';} else {echo '1';} ?>" method="POST">	
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Ingresando datos de la empresa</h4>
							<hr>
						</div>	
						<div class="col-xl-12 col-md-12 col-sm-12" <?php if($id==''){ echo 'hidden';}?> >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>ID:</strong></label>
									</div>
									<input type="text" class="form-control" name="ID" id="ID" <?php if($id!=''){ echo 'value="'.$id.'" readonly ';}?> >
								</div>				
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Tipo de documento:</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtTipodoc" <?php if($id!=''){ echo 'value="'.$tipodoc.'"';}?> style="text-transform:uppercase;">-->
									<select name="TxtTipodoc" id="TxtTipodoc" class="form-control" <?php if($id!=''){echo 'value="'.$tipodoc.'"'; }?>>
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboTipodcto)) {
												foreach ($comboTipodcto as $row) {
										?>	
											<option value="<?=$row['tipdoc_id'];?>" <?php if($id!=''){ if($row['tipdoc_id']==$tipodoc){echo 'selected="selected" ';} }?> ><?=$row['tipdoc_id']."-".$row['tipdoc_descripcion'];?></option>
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
										<label class="btn btn-color"><strong>Nit:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtNit" id="TxtNit" <?php if($id!=''){ echo 'value="'.$nit.'"';}?> style="text-transform:uppercase;"maxlength="15" required>
								</div>				
						</div>
						
						<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Razon social:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtRazon" <?php if($id!=''){ echo 'value="'.$razon.'"';}?> style="text-transform:uppercase;"maxlength="15" required>
								</div>				
						</div>	
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Dirección:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDirecc" <?php if($id!=''){ echo 'value="'.$direccion.'"';}?> style="text-transform:uppercase;" maxlength="20">
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Teléfono fijo:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtTelefono" <?php if($id!=''){ echo 'value="'.$telefono.'"';}?> style="text-transform:uppercase;"maxlength="30">
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Celular:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCelular" <?php if($id!=''){ echo 'value="'.$celular.'"';}?> style="text-transform:uppercase;"maxlength="20">
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Correo electronico</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCorreo" <?php if($id!=''){ echo 'value="'.$correo.'"';}?> style="text-transform:uppercase;"maxlength="50">
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Pagína web</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtPagina" <?php if($id!=''){ echo 'value="'.$url.'"';}?> style="text-transform:uppercase;"maxlength="50">
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Logo</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtLogo"<?php if($id!=''){ echo 'value="'.$logo.'"';}?> style="text-transform:uppercase;">
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