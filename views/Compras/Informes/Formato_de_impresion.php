<?php
	
	require_once('assets/tcpdf/tcpdf.php');
	
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
		<table  style="width: 50%">
			<tr>
				<td>Razon social</td>
				<td>Nit:################</td>
			</tr>
		</table>
	</div>
	';

	
	$pdf->writeHTML($content, true, 0, true, 0);

    $pdf->lastPage();
   // Limpiar cualquier contenido del búfer de salida
    ob_end_clean();
    $pdf->output('Reporte.pdf', 'I');
   

?>