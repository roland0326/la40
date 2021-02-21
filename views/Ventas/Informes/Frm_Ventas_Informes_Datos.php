<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=ventas&a=LoadContVentas">Modulo Ventas</a>
			</li>
			<li class="breadcrumb-item active">Informes</li>
			<li class="breadcrumb-item active">Relacion de Ventas</li>
	</ol>

	<div class="container-fluid mt-4">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">FECHA</th>													
							<th class="text-center">NUMERO_DOCUMENTO</th>	
							<th class="text-center">NIT</th>										
							<th class="text-center">NOMBRE_CLIENTE</th>                            	
                            <th class="text-center">DIRECCION</th>
							<th class="text-center">TOTAL</th>
							<th class="text-center">PROCESOS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($datos)) {					
							foreach ($datos as $row) {
						?>
							<tr>
								<td class="text-center"><?=$row['facven_fecha'];?></td>																
								<td class="text-center"><?=$row['Nrodcto'];?></td>	
								<td class="text-center"><?=$row['Nit'];?></td>															
								<td class="text-center"><?=$row['Nombre_Cliente'];?></td>								
								<td class="text-center"><?=$row['Direccion'];?></td>
								<td class="text-center"><?=$row['Total_Fac'];?></td>
								<td class="text-center table-acciones">
									<a href="index.php?c=compras&a=LoadFormatoImpresion&id=<?=$row['Nrodcto'];?>" class="btn btn-danger">
									<i class="fas fa-file-pdf"></i>
									</a>
																
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
							<th class="text-center">Fecha</th>													
							<th class="text-center">NUMERO_DOCUMENTO</th>	
							<th class="text-center">NIT</th>										
							<th class="text-center">NOMBRE_CLIENTE</th>                            	
                            <th class="text-center">DIRECCION</th>
							<th class="text-center">TOTAL</th>
							<th class="text-center">PROCESOS</th>													
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>
<?php require_once 'views/inc/footer.php';//contiene las otras partes de los estructura ?>