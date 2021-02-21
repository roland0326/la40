<?php 
require_once 'Funciones_globales/Funciones_globales.php';//declaro las funciones basicas de datos
	$Func=new Funciones_globales;
	$table=[];
?>
	<script>
		var Var_JavaScript = document.getElementById('TxtIdent').value;    // declaración de la variable 
	</script>  
    <?php
        $var_PHP = "<script> document.writeln(Var_JavaScript); </script>"; // igualar el valor de la variable JavaScript a PHP 

    //echo $var_PHP;  // muestra el resultado 
	if (!empty($datos['identi'])) {
		$table= $Func->DatosTempVenta($datos['identi']);
	}
	
	//print_r($table);
	$count=0;
 ?>
 <div class="modal fade bd-example-modal-lg" id="PoppuptempVenta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-lg">
						    <div class="modal-content">
						      <div class="modal-content">
								      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalCenteredLabel">Edicion de temporales venta</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">×</span>
									        </button>
								      </div>
								      <div class="modal-body">
								        <div class="container-fluid">
											<div class="container containertemp">													
												
											</div>		
										</div>
								      </div>					      
							    </div>
						    </div>
						  </div>
					</div>

<div class="container mt-4">
					<div class="responsive">						
						<table class="table table-sm">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">ARTICULO</th>
									<th class="text-center">DESCRIPCION</th>
									<th class="text-center">CANTIDAD</th>
									<th class="text-center">VLR_UNIT</th>
									<th class="text-center">VLR_TOTAL</th>
									<th class="text-center">PROCESOS</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if (!empty($table)){
										$count=0;
										foreach ($table as $row) {
								?>
									<tr>
										<td class="text-center"><?=$row['detfac_ven_id'];?></td>
										<td class="text-center"><?=$row['detfac_ven_categoria'];?></td>                                        
										<td class="text-center"><?=$row['detfac_descrip'];?></td>
										<td class="text-center"><?=$row['cantidad'];?></td>
										<td class="text-center"><?=$row['detfac_ven_valor'];?></td>
										<td class="text-center"><?=$row['vlrtotal']; $count=$count+$row['vlrtotal'];?></td>
										<td class="text-center">										
												<button class="btn btn-info ModaltempVenta" onclick="edittempVenta('<?=$row['detfac_ven_id'];?>')"><i class="fas fa-user-edit"></i>
												</button>	
												<button class="btn btn-danger" onclick="DeleteVenta('<?=$row['detfac_ven_id'];?>')">		<i class="fas fa-trash-alt"></i>
												</button>						
										</td>

									</tr>
								<?php
										}//Fin foreach
									 }//Fin if
							 	?>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-xl-6 col-md-6 col-sm-12">
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
						<div class="input-group">
								<div class="input-group-prepend">
										<label class="btn btn-color"><strong>Neto:</strong></label>
									</div>
									<input type="text" class="form-control" name="TxtNeto" id="TxtNeto" value="<?php echo "$ ".$count;?>" readonly>
								</div>
						</div>								
					</div>
					<?php if (!empty($table)): ?>
						<div class="text-center mt-4">
							<button id="SaveTrasVentas" class="btn btn-success">Guardar</button>
						</div>
					
					<?php endif ?>
					<br>
				</div>
<script>
$(document).ready(function(){
		$('#SaveTrasVentas').click(function(){
			let cliente=document.getElementById('TxtIdent').value;
			let formapag=document.getElementById('Com_FormPago').value;

			if (formapag=='0') {
				alert("Selecione una forma de pago");
				document.getElementById('Com_FormPago').focus();
			}else{
				$.ajax({
					url:'index.php?c=ventas&a=InsertVentas',
					data:{cliente,formapag},
					type:'POST',
					success:function(response){
						
							console.log(response);
							window.location='index.php?c=ventas&a=LoadDocVentas';
							//location.reload();

					}
				});
			}

			
		});
		
	});

</script>