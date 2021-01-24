<div class="container-fluid">
		<div class="container">		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">#</th>													
							<th class="text-center">LISTA PRECIOS</th>													
							<th class="text-center">PRODUCTO</th>													
							<th class="text-center">UND.MED</th>
							<th class="text-center">FECHA</th>
							<th class="text-center">VALOR</th>
							<th class="text-center">PROCESOS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($datostable)) {					
							foreach ($datostable as $row) {
						?>
							<tr>
								<td class="text-center"><?=$row['detpre_id'];?></td>
								<td class="text-center"><?=$row['detpre_codprecio'];?></td>																				
								<td class="text-center"><?=$row['detpre_pro_codigo'];?></td>																				
								<td class="text-center"><?=$row['detpre_unidadmed'];?></td>																				
								<td class="text-center"><?=$row['detpre_fecha'];?></td>																				
								<td class="text-center"><?=$row['detpre_valor'];?></td>																				
								<td class="text-center table-acciones">									
									<a href="index.php?c=productos&a=DeleteDetallePrecios&id=<?=$row['detpre_id'];?>&codigo=<?=$row['detpre_pro_codigo'];?>" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>							
								</td>
							</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
							<th class="text-center">#</th>													
							<th class="text-center">LISTA PRECIOS</th>													
							<th class="text-center">PRODUCTO</th>													
							<th class="text-center">UND.MED</th>
							<th class="text-center">FECHA</th>
							<th class="text-center">VALOR</th>
							<th class="text-center">PROCESOS</th>							
						</tr>
						
					</tfoot>		
				</table>
			</div>
		</div>		
	</div>