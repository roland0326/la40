<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=productos&a=LoadContenedorProductos">Modulo Productos</a>
			</li>
			<li class="breadcrumb-item active">Procesos</li>
			<li class="breadcrumb-item active">Asignar precios</li>
	</ol>
	
	<div class="container-fluid mt-4">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">CODIGO</th>													
							<th class="text-center">DESCRIPCION</th>							
							<th class="text-center">CATEGORIA</th>							
							<th class="text-center">UNIDAD MEDIDA</th>
                            <th class="text-center">ESTADO</th>								
							<th class="text-center">PROCESOS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($datos)) {					
							foreach ($datos as $row) {
						?>
							<tr>
								<td class="text-center"><?=$row['pro_codigo'];?></td>
								<td class="text-center"><?=$row['pro_descrip2'];?></td>								
								<td class="text-center"><?=$row['pro_categoria'];?></td>								
								<td class="text-center"><?=$row['pro_unidadmed'];?></td>								
								<td class="text-center"><?=$row['pro_estado'];?></td>														
								<td class="text-center table-acciones">
									<a href="index.php?c=productos&a=loadDetallePrecios&id=<?=$row['pro_codigo'];?>" class="btn btn-success">
                                    <i class="fas fa-dollar-sign"></i>
									</a>																
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
                            <th class="text-center">CODIGO</th>														
							<th class="text-center">DESCRIPCION</th>							
							<th class="text-center">CATEGORIA</th>							
							<th class="text-center">UNIDAD MEDIDA</th>
                            <th class="text-center">ESTADO</th>									
							<th class="text-center">PROCESOS</th>								
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>
<?php require_once 'views/inc/footer.php';//contiene las otras partes de los estructura ?>