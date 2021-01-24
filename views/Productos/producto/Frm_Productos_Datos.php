<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=productos&a=LoadContenedorProductos">Modulo Productos</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Productos</li>
	</ol>
	<div class="Menu-add d-flex flex-row-reverse bd-highlight">		
		<a href="index.php?c=productos&a=CrudProducto&id=0" class="btn btn-success"><i class="fas fa-plus"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
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
									<a href="index.php?c=productos&a=crud2Producto&id=<?=$row['pro_codigo'];?>&Funcion=1" class="btn btn-info">
										<i class="fas fa-user-edit"></i>
									</a>
									<a href="index.php?c=productos&a=crud2Producto&id=<?=$row['pro_codigo'];?>&Funcion=2" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
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