<?php
	
	require_once('assets/tcpdf/tcpdf.php');
	require_once('Funciones_globales/Funciones_globales.php');
	$funciones= new Funciones_globales;
	$empresa=$funciones->LoadEmpresa();
	$count=count($empresa);//validamos si no me devuelve mas de un registro
	$productos=[];//objeto inicializado para cargar los productos
	$total=0;//variable para sumar el total del formato
	$cant_compra=0;
	if ($count>1) {
		$empresa=[];//vaciamos el objeto para no dejar que se desborden los datos por mas registros
	}
	if (!empty($datos)) {
		$productos=$funciones->LoadDatosCompra($datos['id']);
	}
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Roland duque');
	$pdf->SetTitle('');
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	
	$content .= '
					<div class="container">	
						<table  style="width: 60%">';
	if (!empty($empresa)) {
		//en caso de que traiga datos despues de validar que no sea superior a un registro
		foreach ($empresa as $row) {
	$content .= '			<tr>
								<td style="text-align: justify;">'.strtoupper($row['emp_razon_social']).'</td>
								<td style="text-align: right;">Nit:</td>
								<td style="text-align: left;">'.$row['documento'].'</td>
							</tr>
							<tr>								
								<td colspan="3" style="text-align: left;">DIR:'.strtoupper($row['emp_direccion']).'</td>
							</tr>
							<tr>								
								<td colspan="2" style="text-align: left;">TEL:'.strtoupper($row['emp_telefono']).'</td>
							</tr>
							<tr>
								<td colspan="3" style="text-align: center;">'.strtoupper($row['emp_correo']).'</td>
								
							</tr>
						
				';										
		}
	}else{
	$content .= '           <tr>
								<td>Hay mas de una empresa configurada o no se ha configurado esta'.$count.'</td>
							</tr>';
	}		
	$content .= '		</table>';
	$content .= '		<table  style="width: 60%">
							<tr>
								<td colspan="4" style="text-align: center;"><hr></td>								
							</tr>

							<tr>
								<td style="text-align: center;">CODIGO</td>
								<td style="text-align: center;">DESCRIPCIÓN</td>
								<td style="text-align: center;">CANTIDAD</td>
								<td style="text-align: center;">VALOR</td>
							</tr>
							<tr>
								<td colspan="4" style="text-align: center;"><hr></td>								
							</tr>';
	if (!empty($productos)) {
		$total=0;
		$cant_compra=0;
		foreach ($productos as $row) {
	$content .= '           <tr>
								<td>'.$row['detfac_pro_codigo'].'</td>
								<td>'.$row['detfac_pro_descrip2'].'</td>
								<td>'.$row['detfac_cantidad'].'</td>
								<td>$ '.$row['detfac_valor'].'</td>
							</tr>';	
			$total=$total+($row['detfac_cantidad']*$row['detfac_valor']);
			$cant_compra+=$row['detfac_cantidad'];
		}
	}
	
	$content .= '		
							<tr>
								<td colspan="4" style="text-align: center;"><hr></td>								
							</tr>
							<tr>
								<td colspan="2" style="text-align: right;">Cant_total:'.$cant_compra.'</td>
								<td colspan="2" style="text-align: right;">Total($):'.$total.'</td>														
																						
							</tr>
						</table>

					</div>	';

	
	$pdf->writeHTML($content, true, 0, true, 0);

    $pdf->lastPage();
   // Limpiar cualquier contenido del búfer de salida
    ob_end_clean();
    $pdf->output('Reporte.pdf', 'I');
   

?>