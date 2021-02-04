<?php 
	require_once 'views/inc/main.php';//contiene las otras partes de los estructura 
	require_once 'Funciones_globales/Funciones_globales.php';//declaro las funciones basicas de datos
	if (!empty($datos)) {
		foreach ($datos as $row) {
			$Ident=$row['cli_documento'];
			$Nombre=$row['cli_razonsocial'];
			$Dir=$row['cli_direccion'];			
		}
	}else{
		$Ident='';
	}
$funciones = new Funciones_globales;
$comboFormPago=$funciones->ComboFormPago();
$nrodcto=$funciones->NrodctoCompra();

require_once 'views/Compras/Documentos/Modal/Modal_poppup.php';
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
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Creacion orden de compra</h4>
							<hr>
						</div>
						<div class="col-xl-12 col-md-12 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Numero Dcto:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtNrodcto" id="TxtNrodcto" value="<?php echo $nrodcto;?>" readonly>
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Fecha:</strong></label>
									</div>
									<input type="date" class="form-control" name="TxtDate" value="<?php echo date("Y-m-d");?>" readonly>
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Forma Pago:</strong></label>
									</div>									
									<select class="form-control" name="Com_FormPago" id="Com_FormPago">
										<option value="0">---Select---</option>
										<?php
											if (!empty($comboFormPago)) {
												foreach ($comboFormPago as $row) {
										?>
												<option value="<?=$row['for_pago_id'];?>"><?=$row['for_pago_id']."-".$row['for_pago_descripcion'];?></option>
										<?php
												}
											} 
										?>
									</select>
								</div>				
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Identificacion:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtIdent" id="TxtIdent" <?php if($Ident!=''){echo 'value="'.$Ident.'"'; }?> readonly>
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
									<input type="text" class="form-control" name="TxtDir" <?php if($Ident!=''){echo 'value="'.$Dir.'"'; }?> readonly maxlength="30">
								</div>				
						</div>	
						<div class="col-12 mb-4">
						<hr>
							<h4 class="text-center">Ingreso detalle de la compra</h4>
							
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color Modalproducto"><strong>Producto:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtProducto" id="TxtProducto"  maxlength="25">
								</div>				
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12 ">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color" id="precio" ><strong>Precio:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtValor" id="TxtValor"  readonly>
								</div>				
						</div>
						<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Descripcion:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtDescrip"  id="TxtDescrip" readonly>
								</div>				
						</div>
						<div class="col-xl-8 col-md-8 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Canitidad:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCant" id="TxtCant" >
								</div>				
						</div>
						<div class="col-xl-4 col-md-4 col-sm-12 ">								
									<button class="btn btn-primary" id="LoadTemp"><i class="fas fa-file-download"></i></button>		
							</div>
							<div id="resultado" class="col-xl-12 col-md-12 col-sm-12  mt-4">
								<?php require_once 'TableDetalle/Frm_Table_detalle.php'; ?>
							</div>

						
					</div><!--Fin row-->				
				
		</div>
	</div>
	

<?php 	require_once 'views/inc/footer.php';?>