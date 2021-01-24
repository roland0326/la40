<?php 
    require_once 'views/inc/main.php';//contiene las otras partes de los estructura
    require_once 'Funciones_globales/Funciones_globales.php'; 
	if (!empty($datos)) {
        //print_r($datos);
        foreach ($datos as $row) {
            $codigo=$row['pro_codigo'];
            $undmed=$row['pro_unidadmed'];
            $rango=$row['pro_margen_precio'];
        }
        
    }
    $funciones= new Funciones_globales;
    $comboprecios=$funciones->LoadComboMaePrecios();
    $datostable=$funciones->LoadTablePrecios($codigo,$undmed)
?>
    <!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->
	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=productos&a=LoadContenedorProductos">Modulo Productos</a>
			</li>
			<li class="breadcrumb-item active">Procesos</li>
			<li class="breadcrumb-item active">Asignar precio por producto</li>
	</ol>
	<div class="Menu-add d-flex justify-content-start">		
		<a href="index.php?c=productos&a=loadMovPrecios" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
				<form action="index.php?c=productos&a=InsertDetallePrecios" method="POST">	
					<div class="row">
						<div class="col-12">
							<h4 class="text-center">Ingreso de precio detallado</h4>
							<hr>
						</div>						
						<div class="col-xl-6 col-md-6 col-sm-12" >
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Producto:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCodigo" <?php if($codigo!=''){echo 'value="'.$codigo.'" readonly'; }?> maxlength="8" >
								</div>				
						</div>
												
						<div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Unidad Med:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtUnidadMed" <?php if($codigo!=''){echo 'value="'.$undmed.'" readonly'; }?> maxlength="30">
								</div>				
						</div>	
                        <div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Rango Maximo:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtRango" <?php if($codigo!=''){echo 'value="'.$rango.'" readonly'; }?> maxlength="30">
								</div>				
						</div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Maestro Precios:</strong></label>
									</div>
									<!--<input type="text" class="form-control" name="TxtCategoria" maxlength="20" required>-->
									<select name="TxtMaePrec" id="TxtMaePrec" class="form-control">
										<option value="0">--seleccion--</option>
										<?php
											if (!empty($comboprecios)) {
												foreach ($comboprecios as $row) {
										?>	
											<option value="<?=$row['encpre_codprecio'];?>" ><?="[".$row['encpre_codprecio']."]-".$row['encpre_descripcion'];?></option>
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
										<label class="btn btn-color"><strong>Cantidad:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtCantidad"  maxlength="30">
								</div>				
						</div>			
						<div class="col-xl-12 col-md-12 col-sm-12 text-center mt-4 mb-2">
								<input type="submit" class="btn btn-success" value="Guardar">
						</div>
					</div><!--Fin row-->
				</form>
                <?php 
                    require_once 'views/Productos/procesos/Frm_MovPrecios_Table.php';
                ?>
		</div>
	</div>

<?php 	require_once 'views/inc/footer.php';?>