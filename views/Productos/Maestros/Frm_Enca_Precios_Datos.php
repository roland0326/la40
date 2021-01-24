<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=productos&a=LoadContenedorProductos">Modulo Productos</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Maestros de listas de precios</li>
	</ol>
	<div class="Menu-add d-flex flex-row-reverse bd-highlight">		
		<a href="index.php?c=productos&a=CrudEncPrecios&id=0" class="btn btn-success"><i class="fas fa-plus"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">CODIGO_LISTA</th>													
							<th class="text-center">DESCRIPCION</th>													
							<th class="text-center">PROCESOS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($datos)) {					
							foreach ($datos as $row) {
						?>
							<tr>
								<td class="text-center"><?=$row['encpre_codprecio'];?></td>
								<td class="text-center"><?=$row['encpre_descripcion'];?></td>																				
								<td class="text-center table-acciones">
									<a href="index.php?c=productos&a=crud2EncPrecios&id=<?=$row['encpre_codprecio'];?>&Funcion=1" class="btn btn-info">
										<i class="fas fa-user-edit"></i>
									</a>
									<a href="index.php?c=productos&a=crud2EncPrecios&id=<?=$row['encpre_codprecio'];?>&Funcion=2" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>							
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
                            <th class="text-center">CODIGO_ÑISTA</th>													
							<th class="text-center">DESCRIPCION</th>													
							<th class="text-center">PROCESOS</th>								
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>
<?php require_once 'views/inc/footer.php';//contiene las otras partes de los estructura ?>