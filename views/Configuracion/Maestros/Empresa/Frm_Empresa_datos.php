<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=configuracion&a=loadconfiguracion">Modulo Configuracion</a>
			</li>
			<li class="breadcrumb-item active">Maestros</li>
			<li class="breadcrumb-item active">Empresa</li>
	</ol>
	<div class="Menu-add d-flex flex-row-reverse bd-highlight">		
		<a href="index.php?c=configuracion&a=CrudEmpresa&id=0" class="btn btn-success"><i class="fas fa-plus"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">TIPODCTO</th>
							<th class="text-center">NIT</th>
							<th class="text-center">RAZON SOCIAL</th>							
							<th class="text-center">DIRECCION</th>							
							<th class="text-center">TELEFONO</th>							
							<th class="text-center">CELULAR</th>							
							<th class="text-center">CORREO</th>
							<th class="text-center">URL</th>
							<th class="text-center">LOGO</th>
							<th class="text-center">PROCESOS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($datos)) {					
							foreach ($datos as $row) {
						?>
							<tr>
								<td class="text-center"><?=$row['emp_id'];?></td>
								<td class="text-center"><?=$row['emp_tipo_documento'];?></td>
								<td class="text-center"><?=$row['emp_nit'];?>
								</td>
								<td class="text-center"><?=$row['emp_razon_social'];?></td>								
								<td class="text-center"><?=$row['emp_direccion'];?></td>								
								<td class="text-center"><?=$row['emp_telefono'];?></td>								
								<td class="text-center"><?=$row['emp_celular'];?></td>								
								<td class="text-center"><?=$row['emp_correo'];?></td>								
								<td class="text-center"><?=$row['emp_url'];?></td>								
								<td class="text-center"><?=$row['emp_logo'];?></td>								
								<td class="text-center table-acciones">
									<a href="index.php?c=configuracion&a=crud2Empresa&id=<?=$row['emp_id'];?>&Funcion=1" class="btn btn-info" class="btn btn-info">
										<i class="fas fa-user-edit"></i>
									</a>
									<a href="index.php?c=configuracion&a=crud2Empresa&id=<?=$row['emp_id'];?>&Funcion=2" class="btn btn-danger" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>							
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
                            <th class="text-center">#</th>
							<th class="text-center">TIPODCTO</th>
							<th class="text-center">NIT</th>
							<th class="text-center">RAZON SOCIAL</th>					
							<th class="text-center">DIRECCION</th>						
							<th class="text-center">TELEFONO</th>						
							<th class="text-center">CELULAR</th>						
							<th class="text-center">CORREO</th>
							<th class="text-center">URL</th>
							<th class="text-center">LOGO</th>
							<th class="text-center">PROCESOS</th>		
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>
<?php require_once 'views/inc/footer.php';//contiene las otras partes de los estructura ?>