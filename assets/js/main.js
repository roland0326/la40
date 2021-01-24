	$(document).ready(function() {
	//tooltips	
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	
	});
	 //Lenguaje del datatable
	$('.AllDataTable').DataTable({
		language: {
			 	"sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar :",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
		}
	});

	// Validacion para deshabilitar el boton ingresar
	$("#password").keyup(function(event) {
		var fieldValue = event.target.value;
		if (fieldValue == 0) {
			$("#send").attr("disabled", "disabled");
		} else {
			$("#send").removeAttr("disabled", "disabled");
		}    
	});	

	$(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

});

$(document).ready(function()
	{
		$('.navbar-nav li a.dropdown-toggle').click(function(e)
		{
			e.preventDefault();
			$(this).parent().toggleClass('open');
		});
		$('[data-toggle="collapse"]').click(function()
		{
			var target = $(this).attr('data-target');
			$(target).toggleClass('in');
		});
	});

$(document).ready(main);
var contador=1;
function main() {
		$('.bt-menu').click(function() {
		if (contador==1) {
				$('.nav_menu').animate({
					left:'23'
				});
				contador=0;
		}else{
			contador=1;
			$('.nav_menu').animate({
					left:'-100%'
				});
		}
	});
	//mostramos y ocultamos submenus
	$('.submenu').click(function() {
		$(this).children('.children').slideToggle();
	});
}

$(document).ready(function() {
    $('#example').DataTable();   
} );

$(document).ready(Modal);
function Modal(){
	
	var datos;
	var template='';
	var template2='';
	$('.ModalBodegas').click(function(e) {
			
    			$.ajax({
    				url:'../../../Tools/DatosModal',
    				type:'POST',
    				data:{"Opc":2},
    				success:function(response){
    					datos=JSON.parse(response);
    					template='';
    					template+=`<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
    								<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">NOMBRE</th>
											<th class="text-center">DIR</th>
											<th class="text-center">TELEFONO</th>
											<th class="text-center">ENCARGADO</th>
											<th class="text-center">ESTADO</th>
											<th class="text-center">PROCESOS</th>
										</tr>
									</thead>
									<tbody>`
									datos.forEach(dato=>{
										template+=`<tr>
														<td class="text-center">${dato.UBI_ID}</td>
														<td class="text-center">${dato.UBI_NOMBRE}</td>
														<td class="text-center">${dato.UBI_DIR}</td>
														<td class="text-center">${dato.UBI_TEL}</td>
														<td class="text-center">${dato.UBI_ENCARGADO}</td>
														<td class="text-center">${dato.UBI_ACTIVO}</td>
														<td class="text-center table-acciones">
															<button type="submit" class="btn btn-primary" onclick="PopppupBodega('${dato.UBI_ID}','${dato.UBI_NOMBRE}')">
																<i class="fas fa-check-circle"></i>
															</button>											
														</td>
													</tr>`
									});
							
						template+=`</tbody>
									<tfoot>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">NOMBRE</th>
											<th class="text-center">DIR</th>
											<th class="text-center">TELEFONO</th>
											<th class="text-center">ENCARGADO</th>
											<th class="text-center">ESTADO</th>
											<th class="text-center">PROCESOS</th>
										</tr>
									</tfoot>
								</table>
							</div>
						  	<script>
								$(document).ready(function() {
						   				$('#example').DataTable();   
								} );
									$('.AllDataTable').DataTable({
									language: {
										 	"sProcessing":     "Procesando...",
										    "sLengthMenu":     "Mostrar _MENU_ registros",
										    "sZeroRecords":    "No se encontraron resultados",
										    "sEmptyTable":     "Ningún dato disponible en esta tabla",
										    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
										    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
										    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
										    "sInfoPostFix":    "",
										    "sSearch":         "Buscar :",
										    "sUrl":            "",
										    "sInfoThousands":  ",",
										    "sLoadingRecords": "Cargando...",
										    "oPaginate": {
										        "sFirst":    "Primero",
										        "sLast":     "Último",
										        "sNext":     "Siguiente",
										        "sPrevious": "Anterior"
										    },
										    "oAria": {
										        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
										        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
										    }
									}
								});
							</script>`   			
    				$('.containermodal').html(template);
    				}
    		});
    			$('#Poppup').modal('toggle');
			
	});
	$('.ModalArticulo').click(function() { 
			template='';   
			let BodegEntrega=document.getElementById('TxtIdBodEntrega').value;
			let NomEntrega=document.getElementById('TxtNomBodEntrega').value;
			let Opc=1;
			$.ajax({
    				url:'../../../Tools/DatosModal',
    				type:'POST',
    				data:{Opc,BodegEntrega,NomEntrega},
    				success:function(response){
    					datos=JSON.parse(response);    					   					
    					template+=`<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
    								<thead>
										<tr>
											<th class="text-center">CODIGO</th>
											<th class="text-center">NOMBRE</th>
											<th class="text-center">MARCA</th>
											<th class="text-center">COLOR</th>
											<th class="text-center">MATERIAL</th>
											<th class="text-center">NOTA</th>`
											if (NomEntrega!='externos') {
												template+=`<th class="text-center">SALDO</th>`	
											}																					
											template+=`<th class="text-center">PROCESOS</th>
										</tr>
									</thead>
									<tbody>`
									datos.forEach(dato=>{
										template+=`<tr>
											<td class="text-center">${dato.CAT_CODIGO}</td>
											<td class="text-center">${dato.CAT_NOMBRE}</td>
											<td class="text-center">${dato.CAT_MARCA}</td>
											<td class="text-center">${dato.CAT_COLOR}</td>
											<td class="text-center">${dato.CAT_MATERIAL}</td>
											<td class="text-center">${dato.CAT_NOTA}</td>`
											if (NomEntrega!='externos') {
												template+=`<td class="text-center">${dato.saldo}</td>`	
											}
								 template+=`<td class="text-center table-acciones">
												<button type="submit" class="btn btn-primary" onclick="PopppupArticulo('${dato.CAT_CODIGO}','${dato.saldo}')">
														<i class="fas fa-check-circle"></i>
												</button>							
											</td>
										</tr>`
									});
							
						template+=`</tbody>
									<tfoot>
										<tr>
											<th class="text-center">CODIGO</th>																					
											<th class="text-center">NOMBRE</th>
											<th class="text-center">MARCA</th>
											<th class="text-center">COLOR</th>
											<th class="text-center">MATERIAL</th>
											<th class="text-center">NOTA</th>`
											if (NomEntrega!='externos') {
												template+=`<th class="text-center">SALDO</th>`	
											}																					
											template+=`<th class="text-center">PROCESOS</th>			
										</tr>
									</tfoot>
								</table>
							</div>
						  	<script>
								$(document).ready(function() {
						   				$('#example').DataTable();   
								} );
									$('.AllDataTable').DataTable({
									language: {
										 	"sProcessing":     "Procesando...",
										    "sLengthMenu":     "Mostrar _MENU_ registros",
										    "sZeroRecords":    "No se encontraron resultados",
										    "sEmptyTable":     "Ningún dato disponible en esta tabla",
										    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
										    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
										    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
										    "sInfoPostFix":    "",
										    "sSearch":         "Buscar :",
										    "sUrl":            "",
										    "sInfoThousands":  ",",
										    "sLoadingRecords": "Cargando...",
										    "oPaginate": {
										        "sFirst":    "Primero",
										        "sLast":     "Último",
										        "sNext":     "Siguiente",
										        "sPrevious": "Anterior"
										    },
										    "oAria": {
										        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
										        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
										    }
									}
								});
							</script>`	
						$('.containermodal').html(template);
    				}
    			});//Fin del ajax
    			
    			$('#Poppup').modal('toggle');

	});//fin de #BtnModalArticulo
	
}//fin del function modal

function PopppupArticulo(Id,saldo){
	document.getElementById('TxtIdArt').value=Id;
	document.getElementById('TxtSaldo').value=saldo;
	$('#Poppup').modal('hide');	
}

function PopppupBodega(Id,Nombre){
	var Valida=document.getElementById('TxtIdBodEntrega').value;
	if (Valida=='') {
		document.getElementById('TxtIdBodEntrega').value=Id;
		document.getElementById('TxtIdBodEntrega').readOnly=true;
		document.getElementById('TxtNomBodEntrega').value=Nombre;
		document.getElementById('TxtIdBodRecibe').focus();
		$('#Poppup').modal('hide');	
	}else{
		document.getElementById('TxtIdBodRecibe').value=Id;
		document.getElementById('TxtIdBodRecibe').readOnly=true;
		document.getElementById('TxtNomBodRecibe').value=Nombre;
		document.getElementById('TxtNota').focus();
		$('#Poppup').modal('hide');	
	}
}


$(document).ready(function(){
	//cargamos los datos al presionar cargar
	$('#LoadTemp').click(function() {
		let Tipodcto=document.getElementById('TxtTipodcto').value;
		let BodEntrega=document.getElementById('TxtIdBodEntrega').value;
		let BodRecibe=document.getElementById('TxtIdBodRecibe').value;
		let Codigo=document.getElementById('TxtIdArt').value;
		let Cantidad=document.getElementById('TxtCant').value;
		let Saldo= document.getElementById('TxtSaldo').value;
				
		let mensaje="";
		//valimos los distintos campos
		if (Tipodcto=='') {
			mensaje="No se ha cargado el tipo de documento";
		}else if(BodEntrega==''){
				mensaje="Cargar la bodega que entrega.";
			}else if(BodRecibe==''){
					mensaje="Cargar la bodega que recibe.";
				}else if(Codigo==''){
						mensaje="no ha seleccionado un articulo";
					}else if(Cantidad==''){
							mensaje="ingrese una cantidad";
						}else if(Saldo!='undefined'){
							//validamos la cantidad no se mayor a la solicitada.
							if(Cantidad>Saldo){
								mensaje="La cantidad ingresada es superior al saldo["+Saldo+"]";
								document.getElementById('TxtCant').value='';
								document.getElementById('TxtCant').focus();
							}
						}
		//validamos si hay una alerta en el mensaje
		if (mensaje!='') {
			alert(mensaje);
		}else{
			$.ajax({
				url:'../../../Tools/Too_Doc_Tra_Traslados',
				type:'POST',
				data:{"Opc":1,Tipodcto,BodEntrega,BodRecibe,Codigo,Cantidad},
				beforeSend: function () {
							$('#resultado').html("Estado insertado...");
						},
    			success:function(response){
    						$('#resultado').html(response);
    					}//fin succes
			});
			document.getElementById('TxtIdArt').value='';
			document.getElementById('TxtCant').value='';
			document.getElementById('TxtIdArt').focus();
		}//fin de la validacion del mensaje	
		
	});//fin del boton load
});//fin del ready para la lectura de la funcion 

//elimina los datos de la tabla temporal
function Delete(IdTemp){
	$.ajax({
				url:'../../../Tools/Too_Doc_Tra_Traslados',
				type:'POST',
				data:{"Opc":2,IdTemp},
				beforeSend: function () {
							$('#resultado').html("Estado insertado...");
						},
    			success:function(response){
    						$('#resultado').html(response);
    					}//fin succes
			});
}

$(document).ready(function(){
	$('#CargarSaldos').click(function(){
		let template='';
		let Bodega=document.getElementById('Bodeg').value;
		$.ajax({
			url:'../Tools/Too_Inf_ConsultasInformes',
			type:'POST',
			data:{"Opc":1,Bodega},
			success:function(response){
				datos=JSON.parse(response);
				template='';
				datos.forEach(dato=>{
					template+=`<tr>
								<td class="text-center">${dato.bodega}</td>
								<td class="text-center">${dato.producto}</td>
								<td class="text-center">${dato.nom_producto}</td>
								<td class="text-center">${dato.entradas}</td>
								<td class="text-center">${dato.salidas}</td>
								<td class="text-center">${dato.saldo}</td>
								<td class="text-center">${dato.vlrunit}</td>
								<td class="text-center">${dato.total}</td>
							</tr>`;
				});
					
					$('#ReturnSaldos').html(template);

			}

		});
	});
});

//Funciones encargadas de los permisos de usuarios
$(document).ready(function(){
	$('#OpUsuario').change(function(){
		CargarPermisos();
	});
});

function CargarPermisos(){
	let User= document.getElementById('OpUsuario').value;
	let template=``;
	let permiso;
			if(User=="0"){
				alert('Seleccione un usuario valido');
				document.getElementById('OpUsuario').focus();
				$('#result').html(template);
			}else{
				 $.ajax({
				 	url:'../Administracion/Con_Mae_Per_ajax',
				 	type:'POST',
					data:{User},
					success:function(response){
						//console.log(response);
							datos=JSON.parse(response);  
						// 	console.log(datos);
							template+=`<div class="table-responsive mt-4 mb-4">
									<table id="example" class="table table-striped table-bordered AllDataTable " style="width:100%">
    								<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">NOMBRE</th>
											<th class="text-center">DESCRIPCION</th>`																															
											template+=`<th class="text-center">PROCESOS</th>
										</tr>
									</thead>
									<tbody>`
									datos.forEach(dato=>{
										template+=`<tr>
													<td class="text-center">${dato.Id}</td>
													<td class="text-center">${dato.Nombre}</td>
													<td class="text-center">${dato.Descrip}</td>`
													permiso=dato.Permisos;
													if(permiso==0){
														template+=`<td class="text-center">
																		<button class="btn btn-primary" onclick="agregar('${dato.Id}')"><i class="fas fa-check"></i></button>
																	</td>`													
												   
													}else{
														template+=`<td class="text-center">																		
																		<button class="btn btn-danger" onclick="remover('${dato.Id}')"><i class="fas fa-times"></i></button>
																	</td>`
													}																							
									template+=`  </tr>`;
									});							
						template+=`</tbody>
									<tfoot>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">NOMBRE</th>
											<th class="text-center">DESCRIPCION</th>`																															
											template+=`<th class="text-center">PROCESOS</th>			
										</tr>
									</tfoot>
								</table>
							</div>
						  	<script>
								$(document).ready(function() {
						   				$('#example').DataTable();   
								} );
									$('.AllDataTable').DataTable({
									language: {
										 	"sProcessing":     "Procesando...",
										    "sLengthMenu":     "Mostrar _MENU_ registros",
										    "sZeroRecords":    "No se encontraron resultados",
										    "sEmptyTable":     "Ningún dato disponible en esta tabla",
										    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
										    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
										    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
										    "sInfoPostFix":    "",
										    "sSearch":         "Buscar :",
										    "sUrl":            "",
										    "sInfoThousands":  ",",
										    "sLoadingRecords": "Cargando...",
										    "oPaginate": {
										        "sFirst":    "Primero",
										        "sLast":     "Último",
										        "sNext":     "Siguiente",
										        "sPrevious": "Anterior"
										    },
										    "oAria": {
										        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
										        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
										    }
									}
								});
							</script>`
							$('#result').html(template);
					}
				 });
			}
}


	 function remover(id){
	 		let Id=id;
	 		let User=document.getElementById('OpUsuario').value;
	 		let Opc=1;
	 		//alert(Id);
	 		$.ajax({
	 			url:'../Administracion/Con_Mae_Per_Acciones',
	 			data:{Opc,Id,User},
	 			type:'POST',
	 			success:function(response){
	 				//valido que metodo ingreso y si se cumplio
	 				console.log(response);
	 				if(response==0){
	 					alert('No se pudo quitar el permiso seleccionado');
	 				}
	 			}
	 		});
	 		CargarPermisos();
	 }

	  function agregar(id){
	 		let Id=id;
	 		let User=document.getElementById('OpUsuario').value;
	 		let Opc=2;
	 		//alert(Id);	 			 		
	 		$.ajax({
	 			url:'../Administracion/Con_Mae_Per_Acciones',
	 			data:{Opc,Id,User},
	 			type:'POST',
	 			success:function(response){
	 				//valido que metodo ingreso y si se cumplio
	 				console.log(response);
	 				if(response==0){
	 					alert('No se pudo asignar el permiso');
	 				}
	 			}
	 		});
	 		CargarPermisos();
	 }






	
	
	



