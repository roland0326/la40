<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>
<!-- INGRESAMOS EL CODIGO DE NUSTRO CONTENEDOR -->

	<ol class="breadcrumb miga-pan">
			<li class="breadcrumb-item ">
				  <a href="index.php?c=clientes&a=LoadContenedorClientes">Modulo Clientes</a>
			</li>
			<li class="breadcrumb-item active">Documentos</li>
			<li class="breadcrumb-item active">Clientes</li>
	</ol>
	<div class="Menu-add d-flex flex-row-reverse bd-highlight">		
		<a href="index.php?c=clientes&a=CrudCliente&id=0" class="btn btn-success"><i class="fas fa-plus"></i></a>

	</div><!--Fin del boton add-->
	<div class="container-fluid">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">N° DOCUMENTO</th>													
							<th class="text-center">TIPO DE DOCUMENTO</th>							
							<th class="text-center">RAZON SOCIAL</th>	
							<th class="text-center">DIRECCIÓN</th>	
							<th class="text-center">TELEFONO</th>	
							<th class="text-center">CELULAR</th>
							<th class="text-center">CORREO</th>					
							<th class="text-center">CUIDAD</th>
							<th class="text-center">PAIS</th>
                            <th class="text-center">ESTADO</th>	
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
								<td class="text-center"><?=$row['cli_tipodocumento'];?></td>								
								<td class="text-center"><?=$row['cli_razonsocial'];?></td>	
								<td class="text-center"><?=$row['cli_direccion'];?></td>
								<td class="text-center"><?=$row['cli_telefono'];?></td>
								<td class="text-center"><?=$row['cli_celular'];?></td>							
								<td class="text-center"><?=$row['cli_correo'];?></td>								
								<td class="text-center"><?=$row['cli_ciudad'];?></td>
								<td class="text-center"><?=$row['cli_pais'];?></td>
								<td class="text-center"><?=$row['cli_estado'];?></td>
								<td class="text-center"><?=$row['cli_codlista'];?></td>

								<td class="text-center table-acciones">
									<a href="index.php?c=clientes&a=crud2Cliente&id=<?=$row['cli_documento'];?>&Funcion=1" class="btn btn-info">
										<i class="fas fa-user-edit"></i>
									</a>
									<a href="index.php?c=clientes&a=crud2Cliente&id=<?=$row['cli_documento'];?>&Funcion=2" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>							
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
                           <th class="text-center">N° DOCUMENTO</th>													
							<th class="text-center">TIPO DE DOCUMENTO</th>							
							<th class="text-center">RAZON SOCIAL</th>	
							<th class="text-center">DIRECCIÓN</th>	
							<th class="text-center">TELEFONO</th>	
							<th class="text-center">CELULAR</th>
							<th class="text-center">CORREO</th>					
							<th class="text-center">CUIDAD</th>
							<th class="text-center">PAIS</th>
                            <th class="text-center">ESTADO</th>	
                            <th class="text-center">ESPECIAL</th>

							<th class="text-center">PROCESOS</th>							
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>
<?php require_once 'views/inc/footer.php';//contiene las otras partes de los estructura ?>