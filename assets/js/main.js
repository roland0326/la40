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
	$('.Modalproducto').click(function(e) {
			template=''; 
			let opc=1;
			$.ajax({
				url:'index.php?c=compras&a=ModalCompra',
				type:'POST',
				data:{opc},
				success:function(response){					
				datos=JSON.parse(response);
				//console.log(datos);//validacion de devolucion de objeto
				template+=`<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
    								<thead>
										<tr>
											<th class="text-center">CODIGO</th>
											<th class="text-center">DESCRIPCION</th>
											<th class="text-center">CATEGORIA</th>
											<th class="text-center">UNDMED</th>
											<th class="text-center">VALOR</th>`																																
				template+=`<th class="text-center">PROCESOS</th>
										</tr>
									</thead>
									<tbody>`
									
				if (datos!=null) {
					datos.forEach(dato=>{
						template+=`<tr>
											<td class="text-center">${dato.codigo}</td>
											<td class="text-center">${dato.descripcion}</td>
											<td class="text-center">${dato.categoria}</td>
											<td class="text-center">${dato.undmed}</td>
											<td class="text-center">${dato.valor}</td>`
											
				template+=`<td class="text-center table-acciones">
												<button type="submit" class="btn btn-primary" onclick="PopppupArticulo('${dato.codigo}','${dato.valor}','${dato.descripcion}')">
														<i class="fas fa-check-circle"></i>
												</button>							
											</td>
										</tr>`
									});
				}
				
							
				template+=`</tbody>
									<tfoot>
										<tr>
										<th class="text-center">CODIGO</th>
										<th class="text-center">DESCRIPCION</th>
										<th class="text-center">CATEGORIA</th>
										<th class="text-center">UNDMED</th>
										<th class="text-center">VALOR</th>`
																															
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
				
			});

		
			$('#Poppup').modal('toggle');	
			
	});

	
}//fin del function modal

function PopppupArticulo(Id,Precio,Descrip){
	document.getElementById('TxtProducto').value=Id;
	document.getElementById('TxtValor').value=Precio;
	document.getElementById('TxtDescrip').value=Descrip;	
	$('#Poppup').modal('hide');	
	document.getElementById('TxtCant').focus();
}



$(document).ready(function(){
	//cargamos los datos al presionar cargar
	$('#LoadTemp').click(function() {
		let nrodcto=document.getElementById('TxtNrodcto').value;
		let articulo=document.getElementById('TxtProducto').value;
		let cantidad=document.getElementById('TxtCant').value;
		let descrip=document.getElementById('TxtDescrip').value;
		let valor=document.getElementById('TxtValor').value;
		let identificacion=document.getElementById('TxtIdent').value;
		
				
		let mensaje="";
		//valimos los distintos campos
		if (articulo=='') {
			mensaje="No se ha cargado ningun producto";
		}else if(descrip==''){
				mensaje="No se cargo la descripcion del prodcuto";
			}else if(valor==''){
					mensaje="No tiene precio asignado";
				}else if(cantidad==''){
						mensaje="No se ha asignada la cantidad a comprar";
					}else if(nrodcto==''){
							mensaje="El documento no ha cargado consecutivo";
						}
		//validamos si hay una alerta en el mensaje
		if (mensaje!='') {
			alert(mensaje);
		}else{
			$.ajax({
				url:'index.php?c=compras&a=InsertDetalle',
				type:'POST',
				data:{nrodcto,articulo,cantidad,descrip,valor,identificacion},
				beforeSend: function () {
							$('#resultado').html("Estado insertado...");
						},
    			success:function(response){
    						$('#resultado').html(response);
    					}//fin succes
			});
			document.getElementById('TxtProducto').value='';
			document.getElementById('TxtValor').value='';
			document.getElementById('TxtDescrip').value='';
			document.getElementById('TxtCant').value='';
			document.getElementById('TxtProducto').focus();
		}//fin de la validacion del mensaje	
		$('#TxtValor').attr('readonly',true);
	});//fin del boton load
});//fin del ready para la lectura de la funcion 

//elimina los datos de la tabla temporal
function Delete(IdTemp){
	let identificacion=document.getElementById('TxtIdent').value;
	$.ajax({
				url:'index.php?c=compras&a=DeleteDetalle',
				type:'POST',
				data:{IdTemp,identificacion},
				beforeSend: function () {
							$('#resultado').html("Estado insertado...");
						},
    			success:function(response){
					console.log(response);
    						$('#resultado').html(response);
    					}//fin succes
			});
}


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


	 $(document).ready(function(){
		//cargamos los datos al presionar cargar
		$('#precio').click(function() {			
			$('#TxtValor').removeAttr('readonly');
		});//fin del boton load
	});//fin del ready para la lectura de la funcion 

	function edittemp(IdTemp){			
		$('.Modaltemp').click(function(e) {
			let template=``;			
			$.ajax({
				url:'index.php?c=compras&a=Editcompra',
				type:'POST',
				data:{IdTemp},
				success:function(response){					
				datos=JSON.parse(response);
				console.log(datos);//validacion de devolucion de objeto
				datos.forEach(dato=>{		
				template+=`<div class="container-fluid">
								<div class="container">		
									<div class="row">
									<div class="col-xl-12 col-md-12 col-sm-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="btn btn-color"><strong>IdTemp:</strong></label>
												</div>
												<input type="text" class="form-control" name="Txidtemp" id="Txidtemp" value=${dato.detfac_com_id} readonly>
											</div>				
										</div>
										<div class="col-xl-12 col-md-12 col-sm-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="btn btn-color"><strong>Producto:</strong></label>
												</div>
												<input type="text" class="form-control" name="TxtProducto" id="TxtProducto" value=${dato.detfac_pro_codigo} readonly>
											</div>				
										</div>
										<div class="col-xl-12 col-md-12 col-sm-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="btn btn-color"><strong>Descripcion:</strong></label>
													</div>
													<input type="text" class="form-control" name="TxtDescrip"  id="TxtDescrip" value=${dato.detfac_pro_descrip2} readonly>
												</div>				
										</div>
										<div class="col-xl-12 col-md-12 col-sm-12 ">
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="btn btn-color" id="precio" ><strong>Precio:</strong></label>
													</div>
													<input type="text" class="form-control" name="TxtValortemp" id="TxtValortemp" value=${dato.detfac_valor} >
												</div>				
										</div>
										
										<div class="col-xl-12 col-md-12 col-sm-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="btn btn-color"><strong>Canitidad:</strong></label>
													</div>
													<input type="text" class="form-control" name="TxtCanttemp" id="TxtCanttemp" value=${dato.detfac_cantidad}>
												</div>				
										</div>
										<div class="text-center col-12 mt-4">
											
											<button type="submit" class="btn btn-danger" onclick="ActualizarTemp()">Actualizar</button>
										</div>
									</div>
								</div>
							</div>`																
						});																										
					
				$('.containertemp').html(template);
				}
				
			});

		
			$('#Poppuptemp').modal('toggle');	
			
	});
	}//fin modal temp
	
	function ActualizarTemp(){	
		let valor=document.getElementById('TxtValortemp').value;		
		let cantidad=document.getElementById('TxtCanttemp').value;
		let id=document.getElementById('Txidtemp').value;
		
		if (valor=='') {
			alert("el precio no puede ser vacio");
			document.getElementById('TxtValortemp').focus();
		}else if(cantidad==''){
			alert("cantidad no puede estar vacia");
			document.getElementById('TxtCanttemp').focus();
		}else
		{
			$.ajax({
				url:'index.php?c=compras&a=Actualizartemporal',
				data:{valor,cantidad,id},
				type:'POST',
				success:function(response){
					
						console.log(response);
						//window.location='index.php?c=compras&a=LoadDocCompras';
						location.reload();

				}
			});
		}		
		//alert(id);		
		//$('#Poppuptemp').modal('hide');	
		
	}

//codigo para abrir la ventana modal de las categorias por saldo
	$(document).ready(Modalcategoria);
function Modalcategoria(){
	
	var datos;
	var template='';
	var template2='';
	$('.ModalCategoria').click(function(e) {
			template=''; 
			let opc=1;
			$.ajax({
				url:'index.php?c=ventas&a=ModalVenta',
				type:'POST',
				data:{opc},
				success:function(response){					
				datos=JSON.parse(response);
				console.log(datos);//validacion de devolucion de objeto
				template+=`<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered AllDataTable" style="width:100%">
    								<thead>
										<tr>
											<th class="text-center">CATGEORIA</th>
											<th class="text-center">COMPRAS</th>
											<th class="text-center">VENTAS</th>
											<th class="text-center">SALDO</th>`																																
				template+=`<th class="text-center">PROCESOS</th>
										</tr>
									</thead>
									<tbody>`
									
				if (datos!=null) {
					datos.forEach(dato=>{
						template+=`<tr>
											<td class="text-center">${dato.categoria}</td>
											<td class="text-center">${dato.compras}</td>
											<td class="text-center">${dato.ventas}</td>
											<td class="text-center">${dato.saldo}</td>`
											
				template+=`<td class="text-center table-acciones">
												<button type="submit" class="btn btn-primary" onclick="PopppupCategoria('${dato.categoria}','${dato.saldo}','${dato.categoria}')">
														<i class="fas fa-check-circle"></i>
												</button>							
											</td>
										</tr>`
									});
				}
				
							
				template+=`</tbody>
									<tfoot>
									<tr>
									<th class="text-center">CATGEORIA</th>
									<th class="text-center">COMPRAS</th>
									<th class="text-center">VENTAS</th>
									<th class="text-center">SALDO</th>`
																															
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
				
			});

		
			$('#PoppupCategoria').modal('toggle');	
			
	});	
}//fin del function modalcategorias

function PopppupCategoria(Id,saldo,Descrip){
	document.getElementById('TxtProducto').value=Id;
	document.getElementById('TxtSaldo').value=saldo;
	document.getElementById('TxtDescrip').value=Descrip;	
	$('#PoppupCategoria').modal('hide');	
	document.getElementById('TxtCant').focus();
}//fin de poppupCategoria

$(document).ready(function(){
	//cargamos los datos al presionar cargar
	$('#LoadTempVenta').click(function() {
		let nrodcto=document.getElementById('TxtNrodcto').value;
		let articulo=document.getElementById('TxtProducto').value;
		let saldo=document.getElementById('TxtSaldo').value;
		let cantidad=document.getElementById('TxtCant').value;
		let descrip=document.getElementById('TxtDescrip').value;
		let valor=document.getElementById('TxtValor').value;
		let identificacion=document.getElementById('TxtIdent').value;
		
				
		let mensaje="";
		//valimos los distintos campos
		if (articulo=='') {
			mensaje="No se ha cargado ningun producto";
		}else if(descrip==''){
				mensaje="No se cargo la descripcion del prodcuto";
			}else if(valor==''){
					mensaje="No tiene precio asignado";
				}else if(cantidad==''){
						mensaje="No se ha asignada la cantidad a comprar";
					}else if(nrodcto==''){
							mensaje="El documento no ha cargado consecutivo";
						}else if(parseFloat(cantidad) > parseFloat(saldo)){
							mensaje="La cantidad es superior al saldo del inventario";
						}
		//validamos si hay una alerta en el mensaje
		if (mensaje!='') {
			alert(mensaje);
		}else{
			$.ajax({
				url:'index.php?c=ventas&a=InsertDetalleVenta',
				type:'POST',
				data:{nrodcto,articulo,cantidad,descrip,valor,identificacion},
				beforeSend: function () {
							$('#resultado').html("Estado insertado...");
						},
    			success:function(response){
    						$('#resultado').html(response);
    					}//fin succes
			});
			document.getElementById('TxtProducto').value='';
			document.getElementById('TxtValor').value='';
			document.getElementById('TxtSaldo').value='';
			document.getElementById('TxtDescrip').value='';
			document.getElementById('TxtCant').value='';
			document.getElementById('TxtProducto').focus();
		}//fin de la validacion del mensaje	
		
	});//fin del boton load
});//fin del ready para la lectura de la funcion 


function edittempVenta(IdTemp){			
	$('.ModaltempVenta').click(function(e) {
		let template=``;			
		$.ajax({
			url:'index.php?c=ventas&a=EditVenta',
			type:'POST',
			data:{IdTemp},
			success:function(response){					
			datos=JSON.parse(response);
			console.log(datos);//validacion de devolucion de objeto
			datos.forEach(dato=>{		
			template+=`<div class="container-fluid">
							<div class="container">		
								<div class="row">
								<div class="col-xl-12 col-md-12 col-sm-12">
										<div class="input-group">
											<div class="input-group-prepend">
												<label class="btn btn-color"><strong>IdTemp:</strong></label>
											</div>
											<input type="text" class="form-control" name="Txidtemp" id="Txidtemp" value=${dato.detfac_ven_id} readonly>
										</div>				
									</div>
									<div class="col-xl-12 col-md-12 col-sm-12">
										<div class="input-group">
											<div class="input-group-prepend">
												<label class="btn btn-color"><strong>Producto:</strong></label>
											</div>
											<input type="text" class="form-control" name="TxtProducto" id="TxtProducto" value=${dato.detfac_ven_categoria} readonly>
										</div>				
									</div>
									<div class="col-xl-12 col-md-12 col-sm-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="btn btn-color"><strong>Descripcion:</strong></label>
												</div>
												<input type="text" class="form-control" name="TxtDescrip"  id="TxtDescrip" value=${dato.detfac_descrip} readonly>
											</div>				
									</div>
									<div class="col-xl-12 col-md-12 col-sm-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="btn btn-color"><strong>Saldo:</strong></label>
												</div>
												<input type="text" class="form-control" name="Txtsaldotemp"  id="Txtsaldotemp" value=${dato.saldo} readonly>
											</div>				
									</div>								
									<div class="col-xl-12 col-md-12 col-sm-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="btn btn-color"><strong>Canitidad:</strong></label>
												</div>
												<input type="text" class="form-control" name="TxtCanttemp" id="TxtCanttemp" value=${dato.detfac_ven_cant}>
											</div>				
									</div>
									<div class="col-xl-12 col-md-12 col-sm-12 ">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="btn btn-color" id="precio" ><strong>Precio:</strong></label>
												</div>
												<input type="text" class="form-control" name="TxtValortemp" id="TxtValortemp" value=${dato.detfac_ven_valor} >
											</div>				
									</div>
									<div class="text-center col-12 mt-4">
										
										<button type="submit" class="btn btn-danger" onclick="ActualizarTempVenta()">Actualizar</button>
									</div>
								</div>
							</div>
						</div>`																
					});																										
				
			$('.containertemp').html(template);
			}
			
		});

	
		$('#PoppuptempVenta').modal('toggle');	
		
});
}//fin modal edittempVenta

function ActualizarTempVenta(){	
	let valor=document.getElementById('TxtValortemp').value;		
	let cantidad=document.getElementById('TxtCanttemp').value;	
	let saldo=document.getElementById('Txtsaldotemp').value;	
	let id=document.getElementById('Txidtemp').value;
	
	if (valor=='') {
		alert("el precio no puede ser vacio");
		document.getElementById('TxtValortemp').focus();
	}else if(cantidad==''){
		alert("cantidad no puede estar vacia");
		document.getElementById('TxtCanttemp').focus();
	}else if(parseFloat(saldo) < parseFloat(cantidad)){
		alert("La cantidad es superior al saldo existente");
		document.getElementById('TxtCanttemp').focus();
	}else
	{
		$.ajax({
			url:'index.php?c=ventas&a=ActualizartemporalVentas',
			data:{valor,cantidad,id},
			type:'POST',
			success:function(response){
				
					console.log(response);
					
					location.reload();

			}
		});
	}	
}//ActualizarTempVenta
	
//elimina los datos de la tabla temporal
function DeleteVenta(IdTemp){
	let identificacion=document.getElementById('TxtIdent').value;
	$.ajax({
				url:'index.php?c=ventas&a=DeleteDetalleVenta',
				type:'POST',
				data:{IdTemp,identificacion},
				beforeSend: function () {
							$('#resultado').html("Estado insertado...");
						},
    			success:function(response){
					console.log(response);
    						$('#resultado').html(response);
    					}//fin succes
			});
}	
	




	
	
	



