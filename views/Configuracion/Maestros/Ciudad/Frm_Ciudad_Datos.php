<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=configuracion&a=loadconfiguracion">Modulo Configuracion</a>
			</li>
			<li class="breadcrumb-item active">Maestros</li>
			<li class="breadcrumb-item active">Ciudad</li>
	</ol>
	<div class="Menu-add d-flex flex-row-reverse bd-highlight">		
		<a href="index.php?c=configuracion&a=CrudCiudad&id=0" class="btn btn-success"><i class="fas fa-plus"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">CODIGO CIUDAD</th>
							<th class="text-center">NOMBRE</th>							
							<th class="text-center">PROCESOS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($datos)) {					
							foreach ($datos as $row) {
						?>
							<tr>
								<td class="text-center"><?=$row['ciu_id'];?></td>
								<td class="text-center"><?=$row['ciu_nombre'];?></td>								
								<td class="text-center table-acciones">
									<a href="index.php?c=configuracion&a=crud2Ciudad&id=<?=$row['ciu_id'];?>&Funcion=1" class="btn btn-info">
										<i class="fas fa-user-edit"></i>
									</a>
									<a href="index.php?c=configuracion&a=crud2Ciudad&id=<?=$row['ciu_id'];?>&Funcion=2" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>							
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
                            <th class="text-center">CODIGO CIUDAD</th>
							<th class="text-center">NOMBRE</th>							
							<th class="text-center">PROCESOS</th>			
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>
<?php require_once 'views/inc/footer.php';//contiene las otras partes de los estructura ?>