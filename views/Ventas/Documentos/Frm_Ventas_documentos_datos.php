<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=ventas&a=LoadContVentas">Modulo Ventas</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Ventas</li>
	</ol>

	<div class="container-fluid mt-4">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">N° DOCUMENTO</th>													
							<th class="text-center">RAZON SOCIAL</th>	
							<th class="text-center">DIRECCIÓN</th>										
							<th class="text-center">CUIDAD</th>                            	
                            <th class="text-center">ESPECIAL</th>
							<th class="text-center">PROCESOS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($datos)) {					
							foreach ($datos as $row) {
						?>
							<tr>
								<td class="text-center"><?=$row['cli_documento'];?></td>																
								<td class="text-center"><?=$row['cli_razonsocial'];?></td>	
								<td class="text-center"><?=$row['cli_direccion'];?></td>															
								<td class="text-center"><?=$row['cli_ciudad'];?></td>								
								<td class="text-center"><?=$row['cli_codlista'];?></td>

								<td class="text-center table-acciones">
									<a href="index.php?c=ventas&a=CargarDetalleVenta&id=<?=$row['cli_documento'];?>" class="btn btn-info">
									<i class="fas fa-cash-register"></i>
									</a>
																
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
						<th class="text-center">N° DOCUMENTO</th>													
							<th class="text-center">RAZON SOCIAL</th>	
							<th class="text-center">DIRECCIÓN</th>										
							<th class="text-center">CUIDAD</th>                            	
                            <th class="text-center">ESPECIAL</th>
							<th class="text-center">PROCESOS</th>
													
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>
<?php require_once 'views/inc/footer.php';//contiene las otras partes de los estructura ?>